@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
<<<<<<< HEAD
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
=======
  <div class="alert alert-success">
    {{ session()->get('success') }}
  </div><br />
>>>>>>> 2ea147acad9dbd35fcfa8cc3fa05fbd6c8148872
  @endif
  <center>
    <table class="table table-striped" border="1px" style="margin: 50px;">
      <thead>
        <tr>
          <td>ID</td>
          <td>Traveller Name</td>
          <td>Travel City</td>
          <td>Travel Description</td>
        </tr>
      </thead>
      <tbody>
        @foreach($travels as $travel)
        <tr>
          <td><a href="{{ route('travels.show',$travel->id)}}">{{$travel->id}}</a></td>
          <td><a href="{{ route('travels.show',$travel->id)}}">{{$travel->name}}</a></td>
          <td>{{$travel->city}}</td>
          <td>{{$travel->description}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </center>
<<<<<<< HEAD
<div>
@endsection
=======
  <div>
    @endsection
>>>>>>> 2ea147acad9dbd35fcfa8cc3fa05fbd6c8148872
