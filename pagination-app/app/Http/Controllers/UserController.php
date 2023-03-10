<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function getUser(){
        $userdata = User::sortable()->paginate(10);
        return view('userdata',compact('userdata'));
    }

    public function getData(){
        $users = User::all();

        return view('listuser', compact('users'));
        
    }

    public function index()
    {
        return view('userlist');
    }

    function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('users')
         ->where('name', 'like', '%'.$query.'%')
         ->orWhere('username', 'like', '%'.$query.'%')
         ->paginate(10);
         
      }
      else
      {
       $data = DB::table('users')
         ->orderBy('date_of_birth', 'desc')
         ->paginate(10);
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td class="fs-3">'.$row->name.'</td>
         <td class="fs-3">'.$row->email.'</td>
         <td class="fs-3">'.$row->username.'</td>
         <td class="fs-3">'.$row->date_of_birth.'</td>
        </tr>
        ';
       }
      
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }
    
   
    //Using Api

    public function showData(Request $request){

        $query = User::query();

        if($request->search){
           $query->where('name','LIKE','%'.$request->search.'%')
            ->orWhere('id',$request->search)->first()
           ->orWhere('username','LIKE','%'.$request->search.'%')
           ->orWhere('email','LIKE','%'.$request->search.'%');
          
        }

        if($request->sortbydob){
         $query->orderBy('date_of_birth',$request->sortbydob);
        }

        $data = $query->paginate($request->page);
        return response()->json([
            'message'       => 'list users',
            'data'          => $data
        ]);
    }

}
