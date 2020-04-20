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

<!-- map -->
<script src="/js/jquery-3.4.1.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBrO-0MRJlfXpiiDWz-Fgl-Xhno73cUoek"></script>
<script src="/js/map.js"></script>

<center>
</center>



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


<center>
<div id="main" class="row">
        <div class="col-7">
                <table class="table table-striped" border="1px" width="80%">
                        <thead>
                        <tr><td><label id="username" name="user">dear {{ Auth::user()->name }},  you can edit your content☺ </label></td></tr>  
                </table>

                <form method="post" action="{{ route('travels.update', $travel->id) }}" >
                        @method('PATCH')
                        @csrf
                        <table class="table table-striped" >
                                <tbody style="width: 400px;">
                                        <tr width="400px">
                                                <td width="20%"><label for="name">Title</label></td>
                                                <td><input name="title" type="text" value="{{ $travel->title }}" class="form-control" /></td>
                                        </tr>
                                
                                        <tr>
                                                <td><label for="name">Traveller Name</label></td>
                                                <td><input name="name" type="text" value="{{ $travel->name }}" readonly="readonly" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                                <td><label for="name">Travel City</label></td>
                                                <td><input id="city" name="city" type="text" value="{{ $travel->city }}" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                                <td><label for="name" >Tag</label></td>
                                                <td><input name="ex_tag" type="text" value="{{ $travel->tag }}" readonly="readonly" class="form-control" />
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
                                                <img src="/images/{{ $travel->tag}}.jpg" width="500" alt="" /> 

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
        <div class="col-5">
                <form method="get" action="/delete">
                        <table class="table table-striped" border="1px" width="80%">
                                <thead>
                                <tr>
                                <td>
                                        <label>if you want to delete this content, please click</label>
                                        <button type="submit" id="Delete">delete</button>
                                        <input name="id" type="hidden" value="{{ $travel->id }}" class="form-control" />
                                </td>
                                </tr>          
                        </table>
                </form>
                <aside>Destination Map</aside>
                <div id="map"style="width: 300px; height: 400px;"></div>

                <div style="width: 300px; height: 100px;"></div>
                
                <aside>Destination Weather</aside>
                <div style="width: 300px; height: 400px; background-color: #fff;">
                        <iframe style="overflow:hidden;border:none" allowtransparency="true" width="300" height="205" src="https://www.weather-forecast.com/locations/{{ $travel->city }}/forecasts/latest/threedayfree" scrolling="no" frameborder="0" marginwidth="0" marginheight="0"></iframe>
                        <div style="width: 300px; height: 50px">
                                <p style="text-align: left; color: #690; font-size: 12px;" id="cmt">
                                        <a href="https://www.weather-forecast.com/locations/{{ $travel->city }}/forecasts/latest" rel="nofollow">
                                        <img height="37" width="130" border="0" alt="Weather Forecast" src="https://www.weather-forecast.com/images/weatherlogo_130.gif" style="float: left; width: 130px; height: 37px; margin: 0 5px 0 8px;"/>
                                        </a>
                                        <!-- <a style="color: #690; text-decoration: underline;" href="https://www.weather-forecast.com/locations/Tokyo-1/forecasts/latest" rel="nofollow">View Detailed 10 Day Weather Forecast for Tokyo, webcams, weather maps & more at Weather-Forecast.com
                                        </a> -->
                                </p>
                        </div>
                </div>
        </div>

</div>

</center>

<script>
        $( "#datepicker" ).datepicker({dateFormat: "yy-mm-dd"});
        $( "#datepicker2" ).datepicker({dateFormat: "yy-mm-dd"});
</script>


@endsection