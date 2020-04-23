
@extends('layout')

@section('content')

<link rel="stylesheet" href="//code.jquery.com/ui/1.8.24/themes/base/jquery-ui.css">
<script type="text/javascript" src="//code.jquery.com/jquery-1.8.2.js"></script>
<script type="text/javascript" src="//code.jquery.com/ui/1.8.24/jquery-ui.js"></script>



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

<div id="main">
        <center>
                <table class="table table-striped" border="1px" width="80%">
                        <thead>
                                <tr>
                                         <br/><h2>Welcome! {{ Auth::user()->name }} </h2>
                                        <td><label id="username" name="user">you can record your new travel story☺ All blanks need to be filled in</label></td>
                                </tr>
                </table>
                <form method="post" action="{{ route('travels.store') }}">
                        {{ csrf_field() }}

                        <table class="table table-striped">
                                <tbody>
                                        <tr>
                                                <td width="20%"><label for="name">Title</label></td>
                                                <td><input name="title" type="text" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                                <td><label for="name">Traveller Name</label></td>
                                                <td><input name="name" type="text" class="form-control" readonly="readonly" value="{{ Auth::user()->name }}" /></td>
                                        </tr>
                                        <tr>
                                                <td><label for="name">Travel City</label></td>
                                                <td><input name="city" type="text" class="form-control" />                                        </tr>
                                        <tr>
                                                <td><label for="name">Tag</label></td>
                                                <td>
                                                        <select id="tag" name="tag">
                                                                <option value="0" selected="selected">Please choose one tag</option>
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
                                                </td>
                                        </tr>
                                        <tr>
                                                <td><label for="name">Travel Description</label></td>
                                                <td><input name="description" type="text" class="form-control" line-height="30px" /></td>
                                        </tr>

                                        <tr>
                                                <td><label for="name">Start Date</label></td>
                                                <td><input name="start_date" id="datepicker" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                                <td><label for="name">End Date</label></td>
                                                <td><input name="end_date" id="datepicker2" class="form-control" /></td>
                                        </tr>

                                        <tr>
                                                <td></td>
                                                <td><button type="submit">Add</button></td>
                                        </tr>
                                </tbody>
                        </table>

                </form>
        </center>

</div>

<script>
        $("#datepicker").datepicker({
                dateFormat: "yy-mm-dd"
        });
        $("#datepicker2").datepicker({
                dateFormat: "yy-mm-dd"
        });
</script>

@endsection
