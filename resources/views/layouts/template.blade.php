<!doctype html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Newsblog</title>
</head>
<body>
    @auth
        @if(Auth::user()->isStaff())
            <a href="{{route('staff_index')}}">Sezione Staff</a>
        @else
            plebbino
        @endif
    @else
        no registrato
    @endauth


</body>
</html>
