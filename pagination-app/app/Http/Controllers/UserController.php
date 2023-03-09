<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use DataTables;

class UserController extends Controller
{
    public function showData(){
        $users = User::latest()->paginate(20);

        return view('listuser', compact('users'));
    }

    public function searchUser($name){
        $searchuser = User::where('name','LIKE','%'.$name.'%')->paginate(10);

        return view('listuser',compact('users'));
    }

    public function getData(){
        $users = User::latest()->paginate(20);

        return response()->json([
            'message'       => 'list users',
            'data'          => $users
        ]);
    }

    public function searchData($name){  
        $searchuser = User::where('name','LIKE','%'.$name.'%')->paginate(10);
        if(count($searchuser)){
            return response()->json([
                'message'       => 'get user by searching name',
                'User Data'     => $searchuser
            ]);
        }
    }

    public function sortDate(){
        $sortBirthDate = User::orderBy('date_of_birth','desc')->paginate(10);

        if(count($sortBirthDate)){
            return response()->json([
                'message'       => 'get user by sorting date',
                'User Data'     => $sortBirthDate
            ]);
        }
    }


    public function getUser(Request $request)
    {
          $query = $request->get('query');
          $filterResult = User::where('name', 'LIKE', '%'. $query. '%')->get();
          return response()->json($filterResult);
          //return view('')
    } 

    public function index()
    {
        return view('userlist');
    }

}
