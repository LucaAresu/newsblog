<!doctype html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sezione Staff</title>
</head>
<body>
@foreach(\App\Role::all() as $role)
    {{$role->name}} <br>
    {{$role->users}}
    <hr>
@endforeach
</body>
</html>
