<!DOCTYPE html>
	<html lang="en-GB"> 
	<head>
		<title>kjs :: Leaflet</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<!-- Le styles -->
		<link href="/assets/bootstrap/css/bootstrap.css" rel="stylesheet">
		<style type="text/css">
		  body {
			padding-top: 60px;
			padding-bottom: 40px;
		  }
		  .sidebar-nav {
			padding: 9px 0;
		  }

		  @media (max-width: 980px) {
			/* Enable use of floated navbar text */
			.navbar-text.pull-right {
			  float: none;
			  padding-left: 5px;
			  padding-right: 5px;
			}
		  }
		</style>
		<link href="/assets/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="/assets/bootstrap/js/html5shiv.js"></script>
		<![endif]-->
		<!-- Fav and touch icons -->
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/assets/bootstrap/ico/apple-touch-icon-144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/assets/bootstrap/ico/apple-touch-icon-114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/assets/bootstrap/ico/apple-touch-icon-72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="/assets/bootstrap/ico/apple-touch-icon-57-precomposed.png">
		<link rel="shortcut icon" href="/assets/bootstrap/ico/favicon.png">
		<meta name="geo.placename" content="Nottinghamshire, United Kingdom" />
		<meta name="geo.position" content="52.931373; -1.125981" />
		<meta name="geo.region" content="GB-NTT" />
		<meta name="ICBM" content="52.931373, -1.125981" />
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		
		 <link rel="stylesheet" href="/assets/leaflet/leaflet.css" />
		 <!--[if lte IE 8]>
			 <link rel="stylesheet" href="/assets/leaflet/leaflet.ie.css" />
		 <![endif]-->
		<script src="/assets/leaflet/leaflet.js"></script>
		<script src="/assets/jquery/jquery-1.9.1.min.js"></script>
		
		
		<link href="/assets/jquery-ui/css/smoothness/jquery-ui-1.10.1.custom.css" rel="stylesheet">
		<script src="/assets/jquery-ui/js/jquery-1.9.1.js"></script>
		<script src="/assets/jquery-ui/js/jquery-ui-1.10.1.custom.js"></script>
		
		<script src="/assets/pines-notify/jquery.pnotify.js"></script>
		<link rel="stylesheet" href="/assets/pines-notify/jquery.pnotify.default.css"></script>
		
		
		
		<!--
		<script src="/assets/bootstrap/js/jquery.js"></script>
		<script src="/assets/bootstrap/js/bootstrap-transition.js"></script>
		<script src="/assets/bootstrap/js/bootstrap-alert.js"></script>
		<script src="/assets/bootstrap/js/bootstrap-modal.js"></script>
		<script src="/assets/bootstrap/js/bootstrap-dropdown.js"></script>
		<script src="/assets/bootstrap/js/bootstrap-scrollspy.js"></script>
		<script src="/assets/bootstrap/js/bootstrap-tab.js"></script>
		<script src="/assets/bootstrap/js/bootstrap-tooltip.js"></script>
		<script src="/assets/bootstrap/js/bootstrap-popover.js"></script>
		<script src="/assets/bootstrap/js/bootstrap-button.js"></script>
		<script src="/assets/bootstrap/js/bootstrap-collapse.js"></script>
		<script src="/assets/bootstrap/js/bootstrap-carousel.js"></script>
		<script src="/assets/bootstrap/js/bootstrap-typeahead.js"></script>
		-->
		
		<style type="text/css">
			#map { height: 500px; }
		</style>
		
		<script type="text/javascript">
		// <![CDATA[
			function init()
			{
				//var map = L.map('map').setView([52.931373, -1.125981], 13);
				
				
				openstreetmap = L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', 
					{
						attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',
						maxZoom: 18
					}
				);
				
				mapquest = L.tileLayer('http://otile{s}.mqcdn.com/tiles/1.0.0/osm/{z}/{x}/{y}.png', 
					{
							subdomains: '1234',
						attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, imagry &copy; MapQuest Open',
						maxZoom: 18
					}
				);
				
				var baseMaps = {
					"MapQuest Open": mapquest,
					"Open Street Map": openstreetmap
				};

				var map = L.map(
					'map', 
					{
					center 	: new L.LatLng(52.931373, -1.125981),
					zoom 	: 13,
					layers	: [mapquest] // Pass in only the default basemap!
					}
				);
					
				L.control.layers(baseMaps).addTo(map);
				
				/*var littleton = L.marker([39.61, -105.02]).bindPopup('This is Littleton, CO.'),
				denver    = L.marker([39.74, -104.99]).bindPopup('This is Denver, CO.'),
				aurora    = L.marker([39.73, -104.8]).bindPopup('This is Aurora, CO.'),
				golden    = L.marker([39.77, -105.23]).bindPopup('This is Golden, CO.');*/
	
	
				var marker = L.marker([52.93, -1.13]).addTo(map);
				
				var circle = L.circle([52.925, -1.13], 500, {
					color: 'red',
					fillColor: '#f03',
					fillOpacity: 0.5
				}).addTo(map);

				var polygon = L.polygon([
					[51.52063, -0.09163],
					[51.52051, -0.09078],
					[51.5202, -0.09092],
					[51.52041, -0.09173]
				]).addTo(map);
				
				marker.bindPopup("<b>Hello world!</b><br>I am a popup.").openPopup();
				circle.bindPopup("I am a circle.");
				polygon.bindPopup("<b>PHP UK Conference 2013</b><br>22 - 23 February 2013");
				
				map.on('click', onMapClick);
				//$.pnotify.defaults.styling = "jqueryui";
			}
			
			
			function onMapClick(e) 
			{
				
				$(function(){
					$.pnotify({
						title: 'Map Click',
						text: "You clicked the map at " + e.latlng,
						 type: 'info'
					});
				});
				
				
			}


		// ]]>
		</script>
	</head>
	<body onload="init()">

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">Leaflet Demonstration</a>
          <!--<div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
            </ul>
          </div>
		  -->
        </div>
      </div>
    </div>
	
	<div id="map"></div>
	
	<div id="notes"></div>

 </body>
</html>
