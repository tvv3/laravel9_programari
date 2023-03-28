<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>
<div class="container mt-3">
<h1>Programeaza-te acum la o sedinta de consultanta !</h1>
<br><br>

<form action="{{route('create_programare')}}" method="get">


<button class="btn btn-primary" type="submit">Programare noua</button>

</form>

<br><br><br>

<form action="{{route('consultant.index')}}" method="get">

<button class="btn btn-primary" type="submit">Management consultanti</button>

</form>    
</div>
</body>
</html>


