<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\EmployeeData;
use Datatables;
use DB;
use Illuminate\Support\Facades\Redirect;
class EmployeeController extends Controller

{
    //

     public function index(){

        return view('EmployeeDetails');

     }

      public function show(){

          return view ('search');
      }

      public function showview(){

     
          return view('layouts.datarange');

      }

      public function display(){

        $employeedata=EmployeeData::all();
        return view('DataTable')->withemployeedata($employeedata);
              
          
      }

    
        public function store(Request $request){
  
            $this->validate($request,[
    
                    'Name'=>'required |max:255',
                    'Salary'=>'required | numeric',
                    'Address'=>'required |max:50 ',
                    'Email'=>'required|email|unique:users',
                    'PhoneNo'=>'required|numeric|min:10',
                                     
                ]);
       
                

                $employee=new EmployeeData();

                $employee->Name=$request->input('Name');
                $employee->Salary=$request->input('Salary');
                $employee->Address=$request->input('Address');
                $employee->Email=$request->input('Email');
                $employee->PhoneNo=$request->input('PhoneNo');
                $employee->Date=$request->input('Date');  

                $employee->save();

    
                
         }

         public function edit($id){
          
           $employeedata=EmployeeData::find($id);
              

             return view('editdata');           

                  
         }


         
          public function delete($id){
            //echo $id;exit;
           EmployeeData::find($id)->delete($id);
            echo response()->json([
              'success' => 'Record has been deleted successfully!'
          ]);

          }


          public function search(Request $request)
          
          {

            if($request->ajax())

              {

                $output='';

                $query=$request->get('query');
                

                {

                    $data=DB::table('employeedata')->where('id','like','%'.$query.'%')
                                                   ->orWhere('Name','like','%'.$query.'%')
                                                   ->orWhere('Salary','like','%'.$query.'%')
                                                   ->orWhere('Address','like','%'.$query.'%')
                                                   ->orWhere('Email','like','%'.$query.'%')
                                                   ->orWhere('PhoneNo','like','%'.$query.'%')->get();


                }

              }
                
                else
                
                {

                  $data=DB::table('employeedata')->orderBy('id')->get();

                }

              $total_row = $data->count(); 

              if($total_row > 0) 
                { 
                    foreach($data as $row) 
                        { 
                          $output .= '
                          <tr>
                           <td>'.$row->id.'</td>
                           <td>'.$row->Name.'</td>
                           <td>'.$row->Salary.'</td>
                           <td>'.$row->Address.'</td>
                           <td>'.$row->Email.'</td>
                           <td>'.$row->PhoneNo.'</td>
                           
                          </tr>

                          ';
                        
                        } 

                      } 

                else 

                    { 
                      
                       $output = 'No Data Found';
                  
                    } 

                $data = array( 'table_data' => $output, 'total_data' => $total_row ); 

                echo json_encode($data); 


            }
    } 

  
          
  
  

            
        
              
                