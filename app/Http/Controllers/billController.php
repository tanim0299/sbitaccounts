<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class billController extends Controller
{
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
        
    }

}
