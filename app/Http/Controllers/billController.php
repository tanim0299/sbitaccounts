<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use NumberToWords\NumberToWords;
class billController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $session_id = Session::getId();
        return view('Backend.User.Bill.make_bill',compact('session_id'));
    }

    public function getCurrentData(Request $request)
    {
        $session_id = Session::getId();
        $data = DB::table('current_data')
                ->where('session_id',$session_id)
                ->get();

        $total = DB::table('current_data')
                ->where('session_id',$session_id)
                ->sum('ammount');

        $sl=1;

        return view('Backend.User.Bill.get_current_data',compact('data','sl','total'));
    }
    public function storeCurrent(Request $request)
    {
        // echo $request->ammount;

        $insert = DB::table('current_data')->insert($request->except('_token'));

        if($insert)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
    }
    public function deleteCurrentData(Request $request)
    {
        $id = $request->id;

        $delete = DB::table('current_data')
                  ->where('id',$id)
                  ->delete();

        if($delete)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
    }

    public function invoice_store(Request $request)
    {
        $validated = $request->validate([
            'date'=>'required',
            'title'=>'required',
            'client_name'=>'required',
        ]);

        $session_id = Session::getId();

        $insert = DB::table('invoice_info')->insert([

            'date'=>$request->date,
            'invoice_id'=>$request->invoice_id,
            'client_name'=>$request->client_name,
            'title'=>$request->title,
            'url'=>$request->url,

        ]);

        if($insert)
        {
            $current_data = DB::table('current_data')->where('session_id',$session_id)->get();
            if($current_data)
            {
                foreach($current_data as $showcurrent_data)
                {
                    $insert_details = DB::table('invoice_details_info')
                                      ->insert([
                                        'invoice_fkid'=>$request->invoice_id,
                                        'description'=>$showcurrent_data->description,
                                        'ammount'=>$showcurrent_data->ammount,
                                      ]);
                }
            }

            Session::regenerate();

            DB::table('current_data')->where('session_id',$session_id)->delete();

            return redirect()->back()->with('success','Invoice Created Successfully');
        }
        else
        {
            return redirect()->back()->with('error','Invoice Created Unsuccesfully');
        }

     // return $insert->invoce_id;
    }

    public function viewInvoice()
    {
        $data = DB::table('invoice_info')->get();
        $sl=1;
        return view('Backend.User.Bill.view_invoice',compact('data','sl'));
    }
    public function getInvoice($id,$invoice_id)
    {
        $invoice_info = DB::table('invoice_info')->where('id',$id)->first();
        $invoice_detail = DB::table('invoice_details_info')->where('invoice_fkid',$invoice_id)->get();
        $sl=1;




        $total = DB::table('invoice_details_info')->where('invoice_fkid',$invoice_id)->sum('ammount');

        $numberToWords = new NumberToWords();

        // $numberTransformer->toWords(5120);

        $numberTransformer = $numberToWords->getNumberTransformer('en');

        $ammount_word = $numberTransformer->toWords($total);

        return view('Backend.User.Bill.invoicetab',compact('invoice_info','sl','invoice_detail','total','ammount_word'));
    }
    public function delete_invoice($id,$invoice_id)
    {
        DB::table('invoice_details_info')->where('invoice_fkid',$invoice_id)->delete();

        $delete = DB::table('invoice_info')->where('id',$id)->delete();

        if($delete)
        {
            return redirect()->back()->with('success','Data Delete Successfully');
        }
        else
        {
            return redirect()->back()->with('error','Data Delete Unsuccessfull');
        }
    }

}
