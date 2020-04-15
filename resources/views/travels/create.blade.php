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
                                                <td><input name="name" type="text" class="form-control" value="{{ Auth::user()->name }}" /></td>
                                        </tr>
                                        <tr>
                                                <td><label for="name">Travel City</label></td>
                                                <td><input name="city" type="text" class="form-control" /></td>
                                        </tr>
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

<script>
        $("#datepicker").datepicker({
                dateFormat: "yy-mm-dd"
        });
        $("#datepicker2").datepicker({
                dateFormat: "yy-mm-dd"
        });
</script>

<!-- <div id="map">
<table class="table table-striped" >
                <tbody>
                        <tr>
                                <td width="20%"><label for="name">Add a map</label></td>
                        </tr>
                <tbody>
</table>
</div>

<head>
         <meta http-equiv="Content-Type" content="text/html; charset=gb2312">
        <title>创建Google地图实例</title>
        <style type="text/css">
                html{height:100%}
                body{height:100%;margin:0px;padding:0px}
                #map{height:100%}
        </style>
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
        <script type="text/javascript" src="http://code.google.com/apis/gears/gears_init.js"></script>
        <script language="javascript">
                var map; //定义一个Map对象
                        //初始化一个最简单的地图
                window.onload=function()
                {
                                //实例化LatLng，LatLng是标注经纬度的对象，用它来控制地图中心显示的坐标
                var latlng = new google.maps.LatLng(31.88311, 117.315724);
                                //定义MapOptions对象属性
                var myOptions =
                {
                zoom: 14,               //地图缩放级别
                center: latlng,         //中心点坐标
                mapTypeId: google.maps.MapTypeId.ROADMAP //地图显示的类型。有地图(ROADMAP)、卫星(SATELLITE)、混合(HYBRID)、地形(TERRAIN)四种类型
                }
                        //创建地图。构造器中有两个参数。第一个参数是显示层div的对象。第二个参数是myOptions
                map = new google.maps.Map(document.getElementById("map"), myOptions);
                }
        </script>
</head> -->


<!-- 
<script type="text/javascript">
$(document).ready(function () {
     var url="·····/compare/test"; //访问后台去数据库查询select的选项,此处需填写后台接口路径
    $.ajax({
        type:"get",
        url:url,
        success:function(userList){
            var unitObj=document.getElementById("mySelect"); //页面上的<html:select>元素
            if(userList!=null){ //后台传回来的select选项
                for(var i=0;i<userList.length;i++){
                    //遍历后台传回的结果，一项项往select中添加option
                    unitObj.options.add(new Option(userList[i].name,userList[i].name));
                }
            }
        },
        error:function(){
            J.alert('Error');
        }
    })
})
</script> -->


@endsection