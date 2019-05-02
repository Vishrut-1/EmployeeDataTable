
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>datatable</title>
    
    <script src="{{asset('js/jquery-3.3.1.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('datatables.min.css') }}">
   
   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    
 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <script  src="{{ asset('datatables.min.js') }}"> </script>  
   
    
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  
        

    </head>
    <body>

        


     {{-- datatable --}}
            <table class='table1' id='table' >
                <thead>

                    <tr>
                           
                            <th class= "text-center">id</th>
                            <th class= "text-center">Name</th>
                            <th class= "text-center">Salary</th>
                            <th class= "text-center">Address</th>
                            <th class= "text-center">Email</th>
                            <th class= "text-center">PhoneNo</th>
                            <th class="text-center">Action</th>

                    </tr>   
                
                    
                </thead>  

                    <tbody>
 
                        @foreach ($employeedata as $data)

                            
                       

                         <tr>
                            <td><center>{{$data->id}}<center></td>
                            <td><center>{{$data->Name}}<center></td>
                            <td><center>{{$data->Salary}}<center></td>
                            <td><center>{{$data->Address}}<center></td>
                            <td><center>{{$data->Email}}<center></td>
                            <td><center>{{$data->PhoneNo}}<center></td>
                             
                             <td>
                            
                       <input type="button" value="Delete" class="btn btn-primary"  id="dl" onclick="return deleteEntry({{$data->id}})">   
                       <input type="button" value="Edit" class="btn btn-primary" id="edit" onclick="return editdata({{$data->id}})"> 
                                    {{-- <a href="/edit/{id}" class="btn btn-primary">Edit</a>                             --}}
                                    
                            </td>
                        </tr>    

                        @endforeach 
                    </tbody>



            </table>

            
            
    </body>



        <script type="text/javascript">

        $(document).ready(function () {
        $('#table').DataTable({
            dom:'Bfrtip',
            buttons: [
          
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2,3,4,5]
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [0,1,2,3,4,5]
                }
            },
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [ 0, ':visible' ]
                }
            },
            
        ]
    });
});
    
           function deleteEntry(id){
                    
                    alert(id);
                     $.ajax({

                     url: 'datatable/delete/'+id, 
                     type: 'DELETE',
                     data:{"_token": "{{ csrf_token() }}",id:id},
                     dataType:'json',

                    success:function(data){
                    console.log(data);
                    
                   
                    return false;
                    
                 }

                });

                $(document).ajaxStop(function(){
                window.location.reload('datatable');
            });

           }
        function editdata(id){


            $.ajax({
                
                
                url: 'datatable/edit/'+id, 
                     type: 'POST',
                     data:{"_token": "{{ csrf_token() }}",id:id},
                     dataType:'json',

                    success:function(data){
                    console.log(data);
                    
                   
                    return false;
 
                    }

            });

        }
        
           
      
    </script> 



</html>


  <html>   

       
    <body>
        
           

  <div style="height:100px">

  </div>
  
  <div class='input-daterange'>
   
  <p>FromDate: <input type="text  " id="from_date"></p>
  <p>ToDate: <input type="text" id="to_date"></p>

  </div>

  <div class="col-md-2">
    <button type="button" name="filter" id="filter" class="btn btn-info btn-sm">Filter</button>
  
  </div>
 

      
    <center><label for="Search">Search :</label> <input type="text" name='search' placeholder='search' id='search'></center><br><br><br><br>
   
    <table class=table width=100%>


                    <thead>

                     <tr>

                             <th class= "text-center">id</th>
                             <th class= "text-center">Name</th>
                             <th class= "text-center">Salary</th>
                             <th class= "text-center">Address</th>
                             <th class= "text-center">Email</th>
                             <th class= "text-center">PhoneNo</th>
                             <th calss= "text-center">Date</th>

                     </tr>

                    </thead>


        
                    <tbody id="ele">
 
                            
                    </tbody>   


    </table>




   </div>

  
    <script>
    
    
        $(document).ready(function(){

            // var date=new Date();

            // $('.inputrange').datepicker({


            //     todaybtn:'linked',
            //     format:'yyyy-mm-dd',
            //     autoclose:true

            // })

          fetch_employeedata();

        });

        function fetch_employeedata(query='')
        
        {
 
            $.ajax({

                url: '{{URL::to('search')}}',
                method:'GET',
                data:{query:query},
                dataType:'json',

                success:function(data){

                    $('#ele').html(data.table_data);
                   // $('#total_records').text(data.total_data);

                }

            });
        } 

        $(document).on('keyup','#search',function(){

            var query=$(this).val();

            fetch_employeedata(query);


        });

            
        $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } 
        
        
        });
        
        
     
    // $(document).ready(function(){
    
    // var date = new Date();
   
    // $('.input-daterange').datepicker({
    //  todayBtn: 'linked',
    //  format: 'yyyy-mm-dd',
    //  autoclose: true
    // });


    // function fetch_employeedata();

    // var _token = $('input[name="_token"]').val();


    // function fetch_employeedata(query='',from_date='',to_date=''){

    //    $.ajax({

    //    url:"/daterange/fetch_data",
    //    method:"POST",
    //    data:{query=query,from_date:from_date, to_date:to_date, _token:_token},
    //    dataType:"json",
    //    success:function(data)
    //    {
          
    //        $('#ele').html(output);
    //    }
    //    });
    //    }

    //    $('#filter').click(function(){

    //    var from_date = $('#from_date').val();

    //    var to_date = $('#to_date').val();

    //    if(from_date != '' &&  to_date != '')
    //    {

    //    fetch_data(from_date, to_date);

    //    }
    //    else
    //    {
    //    alert('Both Date is required');
    //    }
    //    });

      


    //    });


       </script>


        
   

    
    

    

    </html> 