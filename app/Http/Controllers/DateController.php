<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\date;

use App\EmployeeData;

class DateController extends Controller
{
    //

     public function index(){

        
        return view('date');

     }

     
        function fetch_data(Request $request)
        {

         if($request->ajax())

         {

            $output='';

            if($request->from_date != '' && $request->to_date != '')
            {

                $data = DB::table('employeedata')
               ->whereBetween('date', array($request->from_date, $request->to_date))
               ->get();

          }
          else
          {

           $data = DB::table('employeedata')->orderBy('id')->get();
           
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
                       <td>'.$row->Date.'</td>
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

          

         public function showfile(){

               return view('FileUpload');


         }
            

        

}            