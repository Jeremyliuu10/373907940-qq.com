
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
                                        <td><label id="username" name="user">Welcome! {{ Auth::user()->name }} ,you can record your new travel story☺ </label></td>
                                </tr>
                </table>
                <form method="post" action="{{ route('travels.store') }}">
                        {{ csrf_field() }}

                        <!-- <table class="table table-striped" border="1px" style="margin: 50px;"> -->
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
                                                        <!-- <INPUT type="hidden" id="tag" >  -->
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
                                <!-- TODO:URL->TAGS;  -->
                        </table>

                </form>
        </center>

</div>


<div style="width: 475px; background-color: #fff;">
        <iframe style="overflow:hidden;border:none" allowtransparency="true" width="475" height="205" src="https://www.weather-forecast.com/locations/Tokyo-1/forecasts/latest/threedayfree" scrolling="no" frameborder="0" marginwidth="0" marginheight="0"></iframe>
        <div style="width: 475px; height: 50px">
                <p style="text-align: left; color: #690; font-size: 12px;" id="cmt">
                        <a href="https://www.weather-forecast.com/locations/Tokyo-1/forecasts/latest" rel="nofollow">
                        <img height="37" width="130" border="0" alt="Weather Forecast" src="https://www.weather-forecast.com/images/weatherlogo_130.gif" style="float: left; width: 130px; height: 37px; margin: 0 5px 0 8px;"/>
                        </a>
                        <a style="color: #690; text-decoration: underline;" href="https://www.weather-forecast.com/locations/Tokyo-1/forecasts/latest" rel="nofollow">View Detailed 10 Day Weather Forecast for Tokyo, webcams, weather maps & more at Weather-Forecast.com
                        </a>
                </p>
        </div>
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
