@extends('layout')

@section('content')

<link rel="stylesheet" href="//code.jquery.com/ui/1.8.24/themes/base/jquery-ui.css">
  <script type="text/javascript" src="//code.jquery.com/jquery-1.8.2.js"></script>
  <script type="text/javascript" src="//code.jquery.com/ui/1.8.24/jquery-ui.js"></script>

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
<div id="main">
<center>
<table class="table table-striped" border="1px" width="80%">
      <thead>
         <tr>
          <td><label id="username" name="user">dear {{ Auth::user()->name }},  you can edit your content☺ </label></td>
          </tr>          
</table>
<form method="post" action="{{ route('travels.update', $travel->id) }}">
        @method('PATCH')
        @csrf
        <table class="table table-striped">
                <tbody>
                        <tr>
                                <td width="20%"><label for="name">Title</label></td>
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
                                <td><label for="name" >Tag</label></td>
                                <td><input name="ex_tag" type="text" value="{{ $travel->tag }}" class="form-control" />
                                <select id="tag" name="tag">
                                        <option value="0">「if you want to change tag, please click here」</option>
                                        <option value="Modern city">Modern city</option>
                                        <option value="Idyllic scenery">Idyllic scenery</option>
                                        <option value="Historic sites">Historic sites</option>
                                        <option value="Secondary element">Secondary element</option>
                                        <option value="Exotic landscape">Exotic landscape</option>
                                        <option value="Ancient town">Ancient town</option>
                                        <option value="Seascape">Seascape</option>
                                        <option value="Valley">Valley</option>
                                        <option value="Desert">Desert</option>
                                </select>
                                <img src="/images/{{ $travel->tag}}.jpg" alt="" /> 

			</td>
                        </tr>
                        <tr>
                                <td><label for="name">Travel description</label></td>
                                <td><input name="description" type="text" value="{{ $travel->description }}" class="form-control" /></td>
                        </tr>

                        <tr>
                                <td><label for="name">Start Date</label></td>
                                <td><input name="start_date" id="datepicker" value="{{ $travel->start_date }}" class="form-control" /></td>
                        </tr>
                        <tr>
                                <td><label for="name">End Date</label></td>
                                <td><input name="end_date" id="datepicker2"  value="{{ $travel->end_date }}" class="form-control" /></td>
                        </tr>

                        <tr>
                                <td></td>
                                <td><button type="submit">Update</button></td>
                        </tr>
                </tbody>
        </table>
</form>
</div>
</center>

<script>
        $( "#datepicker" ).datepicker({dateFormat: "yy-mm-dd"});
        $( "#datepicker2" ).datepicker({dateFormat: "yy-mm-dd"});
</script>

@endsection