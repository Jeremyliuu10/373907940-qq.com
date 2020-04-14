<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=gbk" />
    <title>google地图api调用测试</title>

    <script src="http://maps.google.com/maps?file=api&v=2" type="text/javascript"></script>

    <script type="text/javascript">
    <!--   
    function load() {   
      if (GBrowserIsCompatible()) {   
        var map = new GMap2(document.getElementById("map"));   
  
        map.enableScrollWheelZoom(); // 开启鼠标滚轮放大功能   
  
        map.addControl(new GLargeMapControl()); // 添加一个带有可在四个方向平移、放大、缩小的按钮以及缩放滑块的控件。   
        map.addControl(new GMapTypeControl());  // 添加一个地图类型的控制条（位于右上方）   
        map.addControl(new GOverviewMapControl());  // 在主地图的一角创建可折叠的迷你型概览地图，以便通过拖动提供位置参考和导GOverviewMapControl 创建单像素黑边界的概览地图。注意：与其他控件不同，您只能将此控件放在地图的右下角 (G_ANCHOR_BOTTOM_RIGHT) 
        // map.addControl(new GScaleControl()); // 创建显示地图比例尺的控件。   
       var center = new GLatLng(31.342660073054077,121.59584283828735);　//创建一个坐标
       var marker = new GMarker(center, {draggable:false});    //创建一个标注　并启动它的拖拽功能
       GEvent.addListener(marker, "mouseover", function () {//当鼠标经过标注时发生
       marker.openInfoWindow("<div style='font-size:9pt;'>公司名称：<span style='color:green;'><a target='_blank' href='http://www.mdsets.com'>宇达电脑(上海)有限公司</a></span><br><span>公司地址:上海市浦东新区外高桥保税区富特北路129号</span></div>");
            });
           
        GEvent.addListener(marker, "dragstart", function() {   
            map.closeInfoWindow();   
        });   
        GEvent.addListener(marker, "dragend", function() {   
            var lat = marker.getLatLng().lat();   
            var lng = marker.getLatLng().lng();   
            marker.openInfoWindowHtml("<b>纬度：</b>" + lat + "<br/><b>经度：</b>" + lng + "<br/><b>坐标值：</b>(" + lat + ", " + lng + ")");   
        });   
  
        map.addOverlay(marker);   
  
        GEvent.addListener(map, "moveend", function() {   
          var center = map.getCenter();   
          document.getElementById("message").innerHTML = center.toString();   
        });   
  
        map.setCenter(center, 15);   
  
        window.setTimeout(function() {   
          map.panTo(center);   
        }, 1000);   
      }   
    }   
// -->
    </script>

</head>
<body onload="load()" onunload="GUnload()">
    <div id="map" style="width: 600px; height: 400px; margin: 5em auto 0 auto;">
    </div>
    <div style="margin: 1em auto 0 auto; text-align: center;margin: 1em auto 0 auto;text-align:center;" >
        地图中心点经纬度：<span id="message"></span></div>
</body>
</html>