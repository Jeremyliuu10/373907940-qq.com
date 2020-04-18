@extends('layout')

@section('content')

   <!-- ajax    -->
<meta name="_token" content="{{ csrf_token() }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<!-- Tablesorter: required -->
<link rel="stylesheet" type="text/css" href="/css/theme.blue.css">
  <script type="text/javascript"  src="/js/jquery-ui-1.10.0.custom.min.js"></script>
  <script type="text/javascript" src="/js/jquery.tablesorter.js"></script>
  
<aside>
<!-- Main -->
<div id="main">
  <center>
    <table class="table table-striped" border="1px" width="80%">
      <thead>
         <tr>
          <td><label id="username" name="user">{{ Auth::user()->name }}'s content list</label></td>
          </tr>
          <tr>
          <td><label >if you want to change your content, please click the id or title☺</label></td>
           <td>
               <!-- <button type="button" id="MyContent" >Edit My Content</button> -->
                <button type="button" id="CreateNewOne">Create New One</button>
            </td>
        </tr>
             
    </table>

    <table id = "table-search" class="tablesorter table table-striped" width="80%">

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
      <tbody id = "search-list">
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

<script type="text/javascript">

      $("#table-search").tablesorter({ 
          theme: 'blue',
          sortInitialOrder: "asc",
          sortList: [[0,0]],
          header:{1:{sorter:false}}, 
      });
</script>


<!-- <script type="text/javascript">
    $("#MyContent").click(function(){
        
          window.location = '/travels/create';
         var username=document.getElementById("username").innerHTML;
        //  alter(username);
        //   $value = Auth::user()->name;
          $.ajax({
              type : 'get',
              url : '{{URL::to('user')}}',
              data:{'search':$usename},
              success:function(data){
                  $('#search-list').html(data);
                  $('#table-search').trigger("update");
              }
          });          
      });
  </script> 
</script>
  <script type="text/javascript">
  $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
  </script>-->

@endsection