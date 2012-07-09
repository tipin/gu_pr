 //<![CDATA[
   var url = '';
    var customIcons = {
      skala: {
        icon: 'http://www.pruvodce.ic.cz/styly/img/skala.png',
      },
      boulder: {
        icon: 'http://www.pruvodce.ic.cz/styly/img/boulder.png',
      },
      stena: {
        icon: 'http://www.pruvodce.ic.cz/styly/img/stena.png',
      },
      led: {
        icon: 'http://www.pruvodce.ic.cz/styly/img/zima.png',
      }
    };

    function checkbox(){
         // získání údajů z checkboxů
   
       var checkboxy = new Array(); 
         //document.getElementById("checkbox_group")
         //if(document.legend.skala.checked){checkboxy['skala'] = '1'}else{checkboxy['skala'] = '0'}
         //if(document.legend.boulder.checked){checkboxy['boulder'] = '1'}else{checkboxy['boulder'] = '0'}
         //if(document.legend.stena.checked){checkboxy['stena'] = '1'}else{checkboxy['stena'] = '0'}
         //if(document.legend.led.checked){checkboxy['led'] = '1'}else{checkboxy['led'] = '0'}
          urll = 'area.xml';
        return urll
       };

    
    function load() {          
      var map = new google.maps.Map(document.getElementById("map"), {
        center: new google.maps.LatLng(50.2654, 17.1435),
        zoom: 11,
        mapTypeId: 'roadmap',
        panControl: false,
        mapTypeControl: true,
        mapTypeControlOptions: {
             style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR
        },
        zoomControlOptions: {
             style: google.maps.ZoomControlStyle.LARGE,
             position: google.maps.ControlPosition.RIGHT_TOP,
        },
        scaleControl: true,
        scaleControlOptions: {
             position: google.maps.ControlPosition.BOTTOM_LEFT
        },

      });
      var infoWindow = new google.maps.InfoWindow;
       
      checkbox();
      //var urll = checkbox;
      //alert(urll);
      //načtení dat
      downloadUrl(urll, function(data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName('marker');
        for (var i = 0; i < markers.length ; i++) {
          var name = markers[i].getAttribute('name');
          var type = markers[i].getAttribute('type');
	  var popis = markers[i].getAttribute('popis');
	  var id = markers[i].getAttribute('id');
          var point = new google.maps.LatLng(
              parseFloat(markers[i].getAttribute('lat')),
              parseFloat(markers[i].getAttribute('lng')));
          var html = '<a href="index.php?s=oblast&amp;obl=' + id + '"><b>' + name + '</b> <br>' + popis + '</a>';
          var icon = customIcons[type] || {};
          var marker = new google.maps.Marker({
            map: map,
            position: point,
            icon: icon.icon,
            shadow: icon.shadow
          });
          bindInfoWindow(marker, map, infoWindow, html);
        }
      });
    }
   
    function bindInfoWindow(marker, map, infoWindow, html) {
      google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent(html);
        infoWindow.open(map, marker);
      });
    }

    function downloadUrl(url, callback) {
      var request = window.ActiveXObject ?
          new ActiveXObject('Microsoft.XMLHTTP') :
          new XMLHttpRequest;

      request.onreadystatechange = function() {
        if (request.readyState == 4) {
          request.onreadystatechange = doNothing;
          callback(request, request.status);
        }
      };

      request.open('GET', url, true);
      request.send(null);
    }  
    function doNothing (){}
    //]]>

