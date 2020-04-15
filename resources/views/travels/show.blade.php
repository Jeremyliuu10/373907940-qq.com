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
<div class="" id="main">
  <div class="container-fluid">

    <div class="message">
      @if(session()->get('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}
      </div><br />
      @endif
      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div><br />
      @endif

      <div class="row">
        <div class="col-8">
          <table class="table table-striped" border="1px" width="80%">
            <thead>
              <tr>
                <td><label id="username" name="user">This is a post from {{$travel->name}} </label></td>
              </tr>
          </table>
          <!-- < class="table table-striped" border="1px" style="margin: 50px;"> -->
          <table class="table table-striped" width="80%">
            <tbody>
              <tr>
                <td>Title</td>
                <td>{{ $travel->title }}</td>
              </tr>
              <tr>
                <td>Traveller Name</td>
                <td>{{ $travel->name }}</td>
              </tr>
              <tr>
                <td>Travel City</td>
                <td>{{ $travel->city }}</td>
              </tr>
              <tr>
                <td>Tag</td>
                <td>{{ $travel->tag }}</td>
              </tr>
              <tr>
                <td>Travel Description</td>
                <td>{{ $travel->description }}</td>
              </tr>
              <tr>
                <td>Start Date</td>
                <td>{{ $travel->start_date }}</td>
              </tr>
              <tr>
                <td>End Date</td>
                <td>{{ $travel->end_date}}</td>
              </tr>
              <tr>
                <td>Travel Image</td>
                <td><img src="/images/{{ $travel->tag}}.jpg" width='60%' /></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="col-4">
          <aside>在这里放API</aside>
          <!-- TODO: Hotel and Weather and Maps?? -->
        </div>
      </div>

      <!-- TODO: Likes -->

      <div class="row">
        <div class="col-8">
          <h2>Comments</h2>
          <table>
            <tbody id="comments">
              @foreach($comments as $comment)
              <tr>
                <td>{{$comment->reviewer}}: {{$comment->comment}}
                <td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

      <div class="row">
        <div class="col-6 off-2">
          <h3>Add your comments</h3>
        </div>
      </div>


      <div class="row">
        <div class="col-8">
            <table>
              <tbody>
                <tr>
                  <td><label for="reviewer">From:</label></td>
                  <td><input id="reviewer" name="reviewer" readonly="readonly" type="text" class="form-control" value="{{Auth::user()->name}}" /></td>
                </tr>
                <tr>
                  <td><label for="reviewee">To:</label></td>
                  <td><input id="reviewee" name="reviewee" readonly="readonly" type="text" class="form-control" value="{{$travel->name}}" /></td>
                </tr>
                <tr>
                  <td><label for="travel_post_id">Post ID:</label></td>
                  <td><input id="travel_post_id" name="travel_post_id" readonly="readonly" type="text" class="form-control" value="{{$travel->id}}" /></td>
                </tr>
                <tr>
                  <td><label for="comment">Content:</label></td>
                  <td><textarea id="comment" name="comment" class="form-control" rows="4"></textarea></td>
                </tr>
                <tr>
                  <td></td>
                  <td><button type="submit" onclick="submit_comment()">Add</button></td>
                </tr>
              </tbody>
            </table>
          <script>
            function submit_comment() {
              $.ajax({
                type: "get",
                url: "/comments",
                data: {
                  "reviewer": $("#reviewer").val(),
                  "reviewee": $("#reviewee").val(),
                  "travel_post_id": $("#travel_post_id").val(),
                  "comment": $("#comment").val()
                },
                success: function(data,textStatus,jqxhr) {
                  //console.log("Ajax success branch");
                  //console.log(data);
                  $("#comments").html(data);
                  document.getElementById("comment").value="";
                },
                error: function(xhr, textStatus, error) {
                  console.log(xhr.statusText);
                  console.log(textStatus);
                  console.log(error);
                }
              });
              //console.log("Testing after ajax()");
            }
          </script>
        </div>

      </div>

    </div>
    @endsection