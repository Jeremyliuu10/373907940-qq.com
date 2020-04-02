
@extends('layout')
@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="title">
    Add a New Travel notes
</div>
<div class="message">
        @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
</div>
    <form method="post" action="{{ route('travels.store') }}">
        {{ csrf_field() }}
                <table class="table table-striped">
                <tbody>
                <tr>
                        <td><label for="name" >Traveller Name</label></td>
                        <td><input name="name" type="text" class="form-control"/></td>
                </tr>
        <tr>
                        <td><label for="name" >Travel City</label></td>
                        <td><input name="city" type="text" class="form-control"/></td>
                </tr>
                <tr>
                        <td><label for="name" >Travel Description</label></td>
                        <td><input name="description" type="text" class="form-control"/></td>
                </tr>
        <tr>
                        <td><label for="name" >Travel Image</label></td>
                        <td><input name="image_url" type="text" class="form-control"/></td>
                </tr>
                 <tr>
                        <td></td><td><button type="submit">Add</button></td>
                </tr>
        </tbody>
                </table>
    </form>
@endsection