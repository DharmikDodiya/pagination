<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Datatable </title>
    {{-- <link
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"
      rel="stylesheet"
      
    /> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- bootstrap5 dataTables css cdn -->
    <link
      rel="stylesheet"
      href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap4.min.css"
    />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.2/umd/popper.min.js" integrity="sha512-aDciVjp+txtxTJWsp8aRwttA0vR2sJMk/73ZT7ExuEHv7I5E6iyyobpFOlEFkq59mWW8ToYGuVZFnwhwIUisKA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </head>

  <body>
    <h1 class="text text-center">using DataTable</h1>
    <div class="container mt-4">
      <table id="datatable" class="table table-dark table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>UserName</th>
            <th>Birth Date</th>
          </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->date_of_birth}}</td>
            </tr>
        @endforeach
        </tbody>
      </table>
   
    </div>
    <!-- bootstrap5 dataTables js cdn -->
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap4.min.js"></script>
    <script>
      $(document).ready(function () {
        $('#datatable').DataTable();
      });
    </script>
  </body>
</html>