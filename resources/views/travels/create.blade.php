@extends('layout')
@section('content')

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
                                <td><label for="name">Title</label></td>
                                <td><input name="title" type="text" class="form-control" /></td>
                        </tr>
                        <tr>
                                <td><label for="name">Traveller Name</label></td>
                                <td><input name="name" type="text" class="form-control" /></td>
                        </tr>
                        <tr>
                                <td><label for="name">Travel City</label></td>
                                <td><input name="city" type="text" class="form-control" /></td>
                        </tr>
                        <tr>
                                <td><label for="name">Travel Description</label></td>
                                <td><input name="description" type="text" class="form-control" /></td>
                        </tr>

                        <tr>
                                <td><label for="name">Start Date</label></td>
                                <td><input name="start_date" type="date" class="form-control" /></td>
                        </tr>
                        <tr>
                                <td><label for="name">End Date</label></td>
                                <td><input name="end_date" type="date" class="form-control" /></td>
                        </tr>

                        <tr>
                                <td></td>
                                <td><button type="submit">Add</button></td>
                        </tr>
                </tbody>
                <!-- TODO:URL->TAGS;  -->
        </table>
</form>
@endsection