
@extends('layout')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h3>Search by cities </h3>
    </div>
    <div class="panel-body">
        <div class="form-group">
            <input type="text" class="form-controller" id="search" name="search"></input>
        </div>
        <table id="myTable" class="tablesorter">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Travel Note Title</th>
                    <th>Traveller Name</th>
                    <th>Travel City</th>
                    <th>Travel Description</th>
                    <th>Travel Start Date</th>
                    <th>Travel End Date</th>
                </tr>
            </thead>
            <tbody id="search_result" class="tablesorter">
                @foreach($travels as $travel)
                <tr>
                    <td><a href="{{ route('travels.show',$travel->id)}}">{{$travel->id}}</a></td>
                    <td><a href="{{ route('travels.show',$travel->id)}}">{{$travel->title}}</a></td>
                    <td>{{$travel->name}}</td>
                    <td>{{$travel->city}}</td>
                    <td>{{$travel->description}}</td>
                    <td>{{$travel->start_date}}</td>
                    <td>{{$travel->end_date}} <br /></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript">
    $('#search').on('keyup', function() {
        $value = $(this).val();
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
