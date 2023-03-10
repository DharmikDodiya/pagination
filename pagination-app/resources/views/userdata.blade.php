<!DOCTYPE html>
<html>
<head>
    <title>Column sorting with pagination </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
    crossorigin="anonymous"
  />
</head>
<body>


<div class="container">
    <h1 class="text-center" > Column sorting with pagination </h1>
    <table class="table table-dark">
        <tr>
            <th width="80px" class="fs-3">@sortablelink('id')</th>
            <th class="fs-3">@sortablelink('name')</th>
            <th class="fs-3">@sortablelink('email')</th>
            <th class="fs-3">@sortablelink('username')</th>
            <th class="fs-3">@sortablelink('date_of_birth')</th>
        </tr>
        @if($userdata->count())
            @foreach($userdata as $key => $user)
                <tr>
                    <td class="fs-3">{{ $user->id }}</td>
                    <td class="fs-3">{{ $user->name }}</td>
                    <td class="fs-3">{{ $user->email }}</td>
                    <td class="fs-3">{{ $user->username }}</td>
                    <td class="fs-3">{{ $user->date_of_birth }}</td>
                </tr>
            @endforeach
        @endif
    </table>
    {!! $userdata->appends(\Request::except('page'))->render() !!}
</div>


</body>


</html>