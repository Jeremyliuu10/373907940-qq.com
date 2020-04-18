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
                <td>Traveller</td>
                <td>{{ $travel->name }}</td>
              </tr>
              <tr>
                <td>Destination</td>
                <td>{{ $travel->city }}</td>
              </tr>
              <tr>
                <td>Tag</td>
                <td>{{ $travel->tag }}</td>
              </tr>
              <tr>
                <td>Description</td>
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
                <td>Image</td>
                <td><img src="/images/{{ $travel->tag}}.jpg" width='80%' /></td>
              </tr>
              <!-- TODO: Likes -->
              <tr>
                <td><i id="thumb" class="far fa-thumbs-up"></i></td>
                <td></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="col-4">
          <aside>在这里放API</aside>
          <!-- TODO: Hotel and Maps?? -->
        </div>
      </div>

      <script>
        //在document ready的时候获取点赞数据
        $(function() {

          $.ajax({
            url: "/likes",
            type: "get",
            data: {
              "id": $("#travel_post_id").val(),
              "user_name": $("#reviewer").val()
            },
            success: function(result) {
              console.log("Loading point> "+"id:" + $("#travel_post_id").val() + " user:" + $("#reviewer").val() + " result:" + result);
              if (result != "") {
                var i = document.getElementById("thumb");
                i.setAttribute("class", "fas fa-thumbs-up");
              } else {
                var i = document.getElementById("thumb");
                i.setAttribute("class", "far fa-thumbs-up");
              }
            }
          });
        });
        //点击点赞图标时发生的事
        $(document).on("click", "#thumb", function() {
          //console.log("click testing");
          //若当前用户未点赞过
          var like_status=document.getElementById("thumb").getAttribute("class");
          console.log("like_status before click: "+like_status);
          if (like_status=="far fa-thumbs-up") {
            //console.log("用户未点赞过，现在点赞啦！");
            $.ajax({
              url: "/likes",
              type: "get",
              data: {
                "id": $("#travel_post_id").val(),
                "user_name": $("#reviewer").val()
              },
              success: function(result) {
                if (result) {
                  var i = document.getElementById("thumb");
                  i.setAttribute("class", "fas fa-thumbs-up");
                }
              }
            });
          }
          //若当前用户已经点赞过，再次点击则取消
          else if(like_status=="fas fa-thumbs-up"){
            //console.log("用户点赞过，现在取消啦！");
            $.ajax({
              url: "/no_like",
              type: "get",
              data: {
                "id": $("#travel_post_id").val(),
                "user_name": $("#reviewer").val()
              },
              success: function(result) {
                if (result=="") {
                  console.log("into null");
                  var i = document.getElementById("thumb");
                  i.setAttribute("class", "far fa-thumbs-up");
                }
              }
            });
          }

        })
      </script>

      <div class="row">
        <div class="col-8">
          <h2>Comments</h2>
          <table class="table table-striped">
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
                success: function(data) {
                  $("#comments").html(data);
                  document.getElementById("comment").value = "";
                },
                error: function(xhr, textStatus, error) {
                  console.log(xhr.statusText);
                  console.log(textStatus);
                  console.log(error);
                }
              });
              //console.log("Testing after ajax()");
            }
            $(function(){
              setInterval(auto_pull_comments,1000);
              function auto_pull_comments(){
                $.ajax({
                type: "get",
                url: "/refresh_comments",
                data: {
                  "travel_post_id": $("#travel_post_id").val()
                },
                success: function(data) {
                  $("#comments").html(data);
                },
                error: function(xhr, textStatus, error) {
                  console.log(xhr.statusText);
                  console.log(textStatus);
                  console.log(error);
                }
              });
              }
            });
            
          </script>
        </div>

      </div>

    </div>
    @endsection