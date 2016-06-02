$(document).ready(function()
{
	// Using leaflet.js to pan and zoom a big image.
	// See also: http://kempe.net/blog/2014/06/14/leaflet-pan-zoom-image.html

	// create the slippy map
	var map = L.map('mapid', {
	  minZoom: 1,
	  maxZoom: 4,
	  zoomControl : false,
	  center: [0, 0],
	  zoom: 1,
	  crs: L.CRS.Simple
	});
	// dimensions of the image
	var w = 1600,
    	h = 1050,	
    	url = 'data/etage1.png';

	// calculate the edges of the image, in coordinate space
	var southWest = map.unproject([0, h], map.getMaxZoom()-1);
	var northEast = map.unproject([w, 0], map.getMaxZoom()-1);
	var bounds = new L.LatLngBounds(southWest, northEast);

	// add the image overlay, 
	// so that it covers the entire map
	//L.marker([-50, 100	]).addTo(map);

	var arrayRows = document.getElementById("points").rows;
	var rowsNb = arrayRows.length;
	var points = [];
	for(var i = 0 ; i < rowsNb; i++)
	{
			//alert(arrayRows[i].cells[0].innerHTML);
			//alert(arrayRows[i].cells[2].innerHTML);
			points[i] = L.marker([-arrayRows[i].cells[1].innerHTML,arrayRows[i].cells[0].innerHTML],{title:arrayRows[i].cells[2].innerHTML}).addTo(map);
			//tab_points[i].id = arrayRows[i].cells[2].innerHTML;
			points[i].name = arrayRows[i].cells[3].innerHTML;
			points[i].description = arrayRows[i].cells[4].innerHTML;
			points[i].id = i;
	}

	L.imageOverlay(url, bounds).addTo(map);

	// tell leaflet that the map is exactly as big as the image
	map.setMaxBounds(bounds);
	
	var markers = document.getElementsByClassName("leaflet-marker-icon leaflet-zoom-animated leaflet-clickable");
    for (var i = 0; i < points.length; i++)
    { 
    	//alert(markers[i].className);
    	points[i].bindPopup(points[i].name + '<br/><button action="index.php?page=poi&">More</button>');
    	points[i].on('click',function()
    	{
    		//alert(this.id);
    		//(this).bindPopup((this).name + "<br/><button>More</button>");
   		});
   	}
	/*	
		map.on('click', function(e)
		{
			location.href = "index.php?page=etage";
			var info_card;
		});
	*/
	

});

