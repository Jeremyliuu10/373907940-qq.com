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
                                <td><label for="name">Title</label></td>
                                <td><input name="title" type="text" value="{{ $travel->title }}" class="form-control" /></td>
                        </tr>
                
                        <tr>
                                <td><label for="name">Traveller Name</label></td>
                                <td><input name="name" type="text" value="{{ $travel->name }}" class="form-control" /></td>
                        </tr>
                        <tr>
                                <td><label for="name">Travel City</label></td>
                                <td><input name="city" type="text" value="{{ $travel->city }}" class="form-control" /></td>
                        </tr>
                        
                        <tr>
                                <td><label for="name">Travel description</label></td>
                                <td><input name="description" type="text" value="{{ $travel->description }}" class="form-control" /></td>
                        </tr>

                        <tr>
                                <td><label for="name">Start Date</label></td>
                                <td><input name="start_date" type="date" value="{{ $travel->start_date }} class="form-control" />{{ $travel->start_date }}</td>
                        </tr>
                        <tr>
                                <td><label for="name">End Date</label></td>
                                <td><input name="end_date" type="date"  value="{{ $travel->end_date }} class="form-control" />{{ $travel->end_date }}</td>
                        </tr>

                        <tr>
                                <td></td>
                                <td><button type="submit">Update</button></td>
                        </tr>
                </tbody>
        </table>
</form>

@endsection