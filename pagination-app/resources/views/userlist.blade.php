<!DOCTYPE html>
<html>
 <head>
  <title>search in laravel using AJAX</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
 </head>
 <body>
  <br />
  <div class="container box">
   <h3 align="center">Live search in laravel using AJAX</h3><br />
   <div class="panel panel-default">
    <div class="panel-heading fs-3">Search User Data</div>
    <div class="panel-body">
     <div class="form-group">
      <input type="text" name="search" id="search" class="form-control" placeholder="Search User Data" />
     </div>
     <div class="table-responsive">
      <h3 align="center">Total Data : <span id="total_records"></span></h3>
      <table class="table table-dark">
       <thead>
        <tr>
         <th class="fs-3">Name</th>
         <th class="fs-3">Email</th>
         <th class="fs-3">Username</th>
         <th class="fs-3">BirthDate</th>
        </tr>
       </thead>
       <tbody>

       </tbody>
      </table>
    </div>
    </div>    
   </div>
  </div>
 </body>

</html>

<script>
$(document).ready(function(){

 fetch_customer_data();

 function fetch_customer_data(query = '')
 {
  $.ajax({
   url:"{{ route('userlist') }}",
   method:'GET',
   data:{query:query},
   dataType:'json',
   success:function(data)
   {
    $('tbody').html(data.table_data);
    $('#total_records').text(data.total_data);
   }
  })
 }

 $(document).on('keyup', '#search', function(){
  var query = $(this).val();
  fetch_customer_data(query);
 });
});
</script>