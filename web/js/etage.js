$(document).ready(function()
{
	// Using leaflet.js to pan and zoom a big image.
	// See also: http://kempe.net/blog/2014/06/14/leaflet-pan-zoom-image.html

	// create the slippy map
	var map = L.map('mapid', {
	  minZoom: 1,
	  maxZoom: 4,
	  center: [0, 0],
	  zoom: 1,
	  crs: L.CRS.Simple
	});

	// dimensions of the image
	var w = 2000,
    	h = 1500,
    	url = 'data/etage1.png';

	// calculate the edges of the image, in coordinate space
	var southWest = map.unproject([0, h], map.getMaxZoom()-1);
	var northEast = map.unproject([w, 0], map.getMaxZoom()-1);
	var bounds = new L.LatLngBounds(southWest, northEast);

	// add the image overlay, 
	// so that it covers the entire map
	L.imageOverlay(url, bounds).addTo(map);

	// tell leaflet that the map is exactly as big as the image
	map.setMaxBounds(bounds);
});
	/*
	var img_map = document.getElementById("img_map");
	var map = document.getElementById("map");
	var calque = document.createElement("canvas");

	calque.id = "calque";
	calque.height = img_map.height;
	calque.width = img_map.width;
	calque.style.position = "absolute";
	calque.style.top = 0;
	calque.style.left = 0;
	calque.style.zIndex = 3;
	calque.style.border = "solid black 1px";

	map.appendChild(calque);

	var arrayRows = document.getElementById("points").rows;
	var rowsNb = arrayRows.length;
	
	for(var i = 0 ; i < rowsNb; i++)
	{
		
		for(var j = 0; j < arrayRows[i].cells.length; j++)
		{
			alert(arrayRows[i].cells[j].innerHTML);
		}

	}

});

$(window).resize(function()
{
	alert("PANDA");
});
*/