
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Modifica consultantul</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">

<div class="pull-right mb-3">
<a class="btn btn-primary" href="{{ route('consultant.index') }}" enctype="multipart/form-data"> Inapoi</a>
</div>

<div class="pull-left mb-3">
<h2>Modifica consultantul</h2>
</div>

</div>
</div>
@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
{{ session('status') }}
</div>
@endif
<form action="{{ route('consultant.update', $consultant->id) }}" method="POST" 
enctype="multipart/form-data">
@csrf
@method('PUT')
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Nume:</strong>
<input type="text" name="nume" value="{{ $consultant->nume }}" class="form-control" 
placeholder="Nume">
@error('nume')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<div class="row mt-3">
<div class="col-xs-12 col-sm-12 col-md-12">
<button type="submit" class="btn btn-primary ml-3">Submit</button>
</div>
</div>
</div>
</form>
</div>
</body>
</html>