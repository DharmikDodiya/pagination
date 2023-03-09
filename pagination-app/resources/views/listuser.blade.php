<!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Laravel 8 Pagination Demo - codeanddeploy.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    </head>

    <body>
        <h1 class="text text-center">User List</h1>
        <div class="form-outline mb-4 container">
            <input type="search" class="form-control" id="datatable-search-input">
            <label class="form-label" for="datatable-search-input">Search</label>
          </div>
          <div id="datatable">
          </div>
        <div class="container mt-5">
            <table class="table table-success table-hover">
                <thead>
                <tr style="background-color: cadetblue">
                    <th scope="col" width="1%">#</th>
                    <th scope="col" width="5%">Name</th>
                    <th scope="col" width="5%">Email</th>
                    <th scope="col" width="5%">Username</th>
                    <th scope="col" width="5%">DateOfbirth</th>
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

            <div class="d-flex">
                {!! $users->links() !!}
            </div>
        </div>

        <div>
            <ul class="pagination">
                <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                <li class="active"><a href="#!">1</a></li>
                <li class="waves-effect"><a href="#!">2</a></li>
                <li class="waves-effect"><a href="#!">3</a></li>
                <li class="waves-effect"><a href="#!">4</a></li>
                <li class="waves-effect"><a href="#!">5</a></li>
                <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
              </ul>
        </div>
    </body>
</html>
