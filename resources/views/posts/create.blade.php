@extends('layouts.app')


@section('content')

<div class="container">

   <div class="row justify-content-center">

       <div class="col-md-8">

           <h1>Novo POST</h1>

<form method="POST" enctype="multipart/form-data" action="/posts">
   @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Legenda</label>
    <textarea class="form-control" name="description" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Coloque sua legenda!"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Filter</label>
    <input type="text" name="filter" class="form-control" id="exampleInputPassword1" placeholder="Escolha seu filtro!">
  </div>
  <label for="foto">Foto</label>
  <input id="foto" type="file" name="image_path">
    
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

       </div>

   </div>

</div>





@endsection