//Variables that can be reused in this page
var map;
var geocoder;
var directionsService = new google.maps.DirectionsService();
var directionsDisplay;

//Document ready event to call init and load initial data.

$(function() {
    initMap();
});

var latitude = '22.317733';
var longtitude = '114.168816';//初始定位香港

function  initMap(){
    var latlng = new google.maps.LatLng(latitude, longtitude);

    //定义MapOptions对象属性            
    var myOptions = {
        zoom: 9,   
        center: latlng,    //中心点！重要！center不对地图无法显示
        mapTypeId: google.maps.MapTypeId.ROADMAP   //地图(ROADMAP)、卫星(SATELLITE)、混合(HYBRID)、地形(TERRAIN)
    }

    map = new google.maps.Map(document.getElementById("map"), myOptions);  //创建map
    //geocoder
    geocoder = new google.maps.Geocoder(); 
    codeAddress();
}

function codeAddress() {    
    var address = document.getElementById("city").value;;      
    geocoder.geocode({    
        'address' : address    
    }, function(results, status) {    
        if (status == google.maps.GeocoderStatus.OK) {      
            map.setCenter(results[0].geometry.location);    //地图中心点  
            var marker = new google.maps.Marker({    
                map : map,    
                position : results[0].geometry.location,    
                title : address,    
                animation : google.maps.Animation.DROP    
            });    
            var display = "地址: " + results[0].formatted_address;  
            var infowindow = new google.maps.InfoWindow({    
                content : "<span style='font-size:11px'><b>名称: </b>"    
                        + address + "<br>" + display + "</span>",    
                pixelOffset : 0,                    //坐标偏移量   
                position : results[0].geometry.location    

            });    
            infowindow.open(map, marker);                //默认打开信息窗 
            google.maps.event.addListener(marker, 'click', function() {    
                infowindow.open(map, marker);    
            });    
        } else {    
            alert("Geocode was not successful for the following reason: " + status);    
        }    
    });    
}    