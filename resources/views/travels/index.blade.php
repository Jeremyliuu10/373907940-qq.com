@extends('layout')

@section('content')
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<script src="https://cdn.bootcss.com/wordcloud2.js/1.1.0/wordcloud2.js"></script>
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>

<script src="/js/jquery-ui-1.10.0.custom.min.js"></script>
		<script type="text/javascript" src="/js/jquery-3.4.1.min.js"></script>
		<link rel="stylesheet" href="/css/theme.blue.css">
		<script src="/js/jquery.tablesorter.js"></script>


<!-- Main -->
<div id="main">

  <div class="row">
    <div class="col-8">
      <div id="canvas-container" align="center" width="80%">
        <h2>Cities in Top Searches</h2>
        <canvas id="canvas" width="600px" height="400px"></canvas>
      </div>
    </div>
    <div class="col-4"><a href="#content_1"><h1></br>Explore the magic⬇️</h1></a></div>
  </div>
  <div class="row">
    <div class="col-7" id="content_1">
      <center>
        @foreach($travels as $travel)
        <article>
          <header>
            <span class="date">start from {{$travel->start_date}} to {{$travel->end_date}}</span>
            <h2><a href="#">{{$travel->name}} in {{$travel->city}}</a></h2>
          </header>
          <a href="#"><img src="/images/{{ $travel->tag}}.jpg" width=60% alt="" /></a>
          <p style="text-align:center">{{$travel->description}}</p>
          <ul class="actions special">
            <li><a href="/travels/{{ $travel->id}}" class="button">Full Story</a></li>
          </ul>
        </article>
        @endforeach
      </center>
    </div>
    <div class="col-5">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3>Search by cities </h3>
        </div>
        <div class="panel-body">
          <div class="form-group">
            <input type="text" class="form-controller" id="search" name="search" placeholder="Input city name or tag"></input>
          
            <Center>
               <!-- <button type="button" id="MyContent" >Edit My Content</button> -->
                <button type="button" id="Part_search" style="margin:10px;border-radius:100%" >Part Search</button>
                <button type="button" id="Full_search" style="margin:10px;border-radius:100%">Full Search</button>


            </td>
            </Center>


          </div>
          <table id="myTable" class="tablesorter">
            <thead>
              <tr>
                <!-- <th>ID</th> -->
                <!-- <th>Title</th> -->
                <th>Name</th>
                <th>City</th>
                <th>Tag</th>
                <th>Start Date</th>
                <th>End Date</th>
              </tr>
            </thead>
            <tbody id="search_result" class="tablesorter">
              @foreach($travels as $travel)
              <tr>
                <!-- <td><a href="{{ route('travels.show',$travel->id)}}">{{$travel->id}}</a></td> -->
                <!-- <td><a href="{{ route('travels.show',$travel->id)}}">{{$travel->title}}</a></td> -->
                <td>{{$travel->name}}</td>
                <td>{{$travel->city}}</td>
                <td>{{$travel->tag}}</td>
                <td>{{$travel->start_date}}</td>
                <td>{{$travel->end_date}} <br /></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>

  <script type="text/javascript">
    // $('#search').on('keyup', function() 
    $("#Part_search").click(function()
    {
      $value = $('#search').val();
      $.ajax({
        type: 'get',
        url: '/search',
        data: {
          'search': $value
        },

        success: function(data) {
          $('#search_result').html(data);
          $("#myTable").trigger("update");
        }
      });
    })

    $("#Full_search").click(function()
    {
      $value = $('#search').val();
      $.ajax({
        type: 'get',
        url: '/fullsearch',
        data: {
          'search': $value
        },

        success: function(data) {
          $('#search_result').html(data);
          $("#myTable").trigger("update");
        }
      });
    })

    $("#myTable").tablesorter({
      sortInitialOrder: "asc",
      theme: "blue",
      sortList: [
        [0, 0]
      ],
      header: {
        1: {
          sorter: false
        }
      }
    });
  </script>
  <script type="text/javascript">
    $.ajaxSetup({
      headers: {
        'csrftoken': '{{ csrf_token() }}'
      }
    });
  </script>


  <!-- Posts -->
  <section class="posts">
  </section>
  <script>
    var options = eval({
      "list": [
        ['Hong Kong', 10],
        ['Bangkok', 9],
        ['London', 7],
        ['Macau', 6],
        ['Singapore', 4],
        ['Paris', 5],
        ['Dubai', 4],
        ['NYC', 3],
        ['Beijing', 3],
        ['Shenzhen', 3],
        ['Istanbul', 3],
        ['Delhi', 3],
        ['Antalya', 3],
        ['Kuala Lumpur', 3]
      ],
      "gridSize": 16, // size of the grid in pixels
      "weightFactor": 10, // number to multiply for size of each word in the list
      "fontWeight": 'normal', // 'normal', 'bold' or a callback
      "fontFamily": 'Times, serif', // font to use
      "color": 'random-light', // 'random-dark' or 'random-light'
      "backgroundColor": '#333', // the color of canvas
      "rotateRatio": 1 // probability for the word to rotate. 1 means always rotate
    });
    var canvas = document.getElementById('canvas');
    WordCloud(canvas, options);
  </script>


  <script type="text/javascript">
    $('#search').on('keyup', function() {
      $value = $(this).val();
      $.ajax({
        type: 'get',
        url: '{{URL::to('
        search ')}}',
        data: {
          'search': $value
        },

        success: function(data) {
          $('#search_result').html(data);
          $("#myTable").trigger("update");
        }
      });
    })


    $("#myTable").tablesorter({
      sortInitialOrder: "asc",
      theme: "blue",
      sortList: [
        [0, 0]
      ],
      header: {
        1: {
          sorter: false
        }
      }
    });
  </script>
  <script type="text/javascript">
    $.ajaxSetup({
      headers: {
        'csrftoken': '{{ csrf_token() }}'
      }
    });
  </script>



  @endsection