@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <center>
  <table class="table table-striped">
     <tbody>
        <tr><td>Traveller Name</td><td>{{ $travel->name }}</td></tr>
         <tr><td>Travel City</td><td>{{ $travel->city }}</td></tr>
        <tr><td>Travel Description</td> <td>{{ $travel->description }}</td></tr>
        <tr><td>Travel Image</td><td><img src='/{{ $travel->image_url }}' width='60%' /></td></tr>
    </tbody>
  </table>
  </center>
<div>
@endsection