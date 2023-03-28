<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Consultanti</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

<div class="container mt-3">
<a class="btn btn-primary" href="/">Inapoi la pagina principala</a>


<br><br><br>

<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Consultantii</h2>
</div>
<div class="pull-right mb-2">
<a class="btn btn-success" href="{{ route('consultant.create') }}"> Creeaza Consultant</a>
</div>
</div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
<tr>
<th>Nr</th>
<th>Consultant</th>
<th>Action</th>
</tr>
@foreach ($consultanti as $consultant)
<tr>
<td>{{ $consultant->id }}</td>
<td>{{ $consultant->nume }}</td>

<td>
<form action="{{ route('consultant.destroy',$consultant->id) }}" method="Post">
<a class="btn btn-primary" href="{{ route('consultant.edit', $consultant->id) }}">Edit</a>
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger">Delete</button>
</form>
</td>
</tr>
@endforeach
</table>
{!! $consultanti->links() !!}
</div>
</body>
</html>