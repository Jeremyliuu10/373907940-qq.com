@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="title">
    Edit the travel-notes
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
    <form method="post" action="{{ route('travels.update', $travel->id) }}">
        @method('PATCH')
        @csrf
                <table class="table table-striped">
                <tbody>
                <tr>
                        <td><label for="name" >Traveller Name</label></td>
                        <td><input name="name" type="text" value="{{ $travel->name }}" class="form-control" /></td>
                </tr>
        <tr>
                        <td><label for="name" >city </label></td>
                        <td><input name="city" type="text" value="{{ $travel->city }}" class="form-control"/></td>
                </tr>
                <tr>
                                <td><label for="name" > title</label></td>
                                <td><input name="title" type="text" value="{{ $travel->title }}" class="form-control"/></td>
                        </tr>
                <tr>
                        <td><label for="name" >Travel description</label></td>
                        <td><input name="description" type="text" value="{{ $travel->description }}" class="form-control"/></td>
                </tr>

                 <tr><td></td><td><button type="submit">Update</button></td></tr>
        </tbody>
                </table>
    </form>

@endsection
