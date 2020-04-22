@extends('layout')

@section('content')

<aside>
<!-- Main -->
<div id="main">
  <center>
    <table class="table table-striped" border="1px" width="80%">
      <thead>
         <tr>
         <br/><h2>{{ Auth::user()->name }}'s content list</h2>
          </tr>
          <tr>
          <td><label >if you want to modify / delete your content, please click the id or title☺</label></td>
           <td>
                <button type="button" id="CreateNewOne">Create New One</button>
                <button class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}</button>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf</form>
            </td>
        </tr>
             
    </table>

    <table id = "mytable" width="80%">

        <tr>
          <td>ID</td>
          <td>Travel Note Title</td>
          <td>Traveller Name</td>
          <td>Travel City</td>
          <td>Travel Description</td>
          <td>Travel Start Date</td>
          <td>Travel End Date</td>
        </tr>
      </thead>
      <tbody id = "search-list" >
        @foreach($travels as $travel)
        <tr>
          <td><a href="{{ route('travels.edit',$travel->id)}}">{{$travel->id}}</a></td>
          <td><a href="{{ route('travels.edit',$travel->id)}}">{{$travel->title}}</a></td>
          <td>{{$travel->name}}</td>
          <td>{{$travel->city}}</td>
          <td>{{$travel->description}}</td>
          <td>{{$travel->start_date}}</td>
          <td>{{$travel->end_date}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </center>

</div>
</aside>


<script type="text/javascript">

      $("#CreateNewOne").click(function(){
        window.location = '/travels/create';
          });
</script>
     



@endsection