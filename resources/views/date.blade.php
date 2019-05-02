<!DOCTYPE html>
<html>
 <head>
  <title>Date Range Fiter Data in Laravel using Ajax</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/locale/af.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>





  
 </head>
 <body>
  <br />
  <div class="container box">
   <h3 align="center">Date Range Fiter Data in Laravel using Ajax</h3><br />
   <div class="panel panel-default">
    <div class="panel-heading">
     <div class="row">
      <div class="col-md-5">Sample Data - Total Records - <b><span id="total_records"></span></b></div>
      <div class="col-md-5">
       <div class="input-group input-daterange">
           <input type="text" name="from_date" id="from_date" readonly class="form-control" />
           <div class="input-group-addon">to</div>
           <input type="text"  name="to_date" id="to_date" readonly class="form-control" />
       </div>
      </div>
      <div class="col-md-2">
       <button type="button" name="filter" id="filter" class="btn btn-info btn-sm">Filter</button>
       <button type="button" name="refresh" id="refresh" class="btn btn-warning btn-sm">Refresh</button>
      </div>
     </div>
    </div>
    <div class="panel-body">
     <div class="table-responsive">
      <table class="table">
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
       <tbody id='ele'>
       
       </tbody>
      </table>
      {{ csrf_field() }}
     </div>
    </div>
   </div>
  </div>
 </body>
</html>

<script>
    $(document).ready(function(){
    
     var date = new Date();
    
     $('.input-daterange').datepicker({
      todayBtn: 'linked',
      format: 'yyyy-mm-dd',
      autoclose: true
     });


     function fetch_data();

     var _token = $('input[name="_token"]').val();


     function fetch_data(query='',rom_date='',to_date=''){

        $.ajax({

        url:"/daterange/fetch_data",
        method:"POST",
        data:{query=query,from_date:from_date, to_date:to_date, _token:_token},
        dataType:"json",
        success:function(data)
        {
           
            $('#ele').html(output);
        }
        });
        }

        $('#filter').click(function(){

        var from_date = $('#from_date').val();

        var to_date = $('#to_date').val();

        if(from_date != '' &&  to_date != '')
        {

        fetch_data(from_date, to_date);

        }
        else
        {
        alert('Both Date is required');
        }
        });

        $('#refresh').click(function(){
        $('#from_date').val('');
        $('#to_date').val('');
        fetch_data();
        });


        });
        </script>






            

            