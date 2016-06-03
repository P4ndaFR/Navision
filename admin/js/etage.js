$(document).ready(function()
{
	// Using leaflet.js to pan and zoom a big image.
	// See also: http://kempe.net/blog/2014/06/14/leaflet-pan-zoom-image.html

	// create the slippy map
	var map = L.map('mapid', {
	  minZoom: 1,
	  maxZoom: 4,
	  zoomControl : true,
	  center: [0, 0],
	  zoom: 1,
	  crs: L.CRS.Simple
	});
	var bat = document.getElementById('session').rows[0].cells[0].innerHTML;
			etage = document.getElementById('session').rows[0].cells[1].innerHTML;
	// dimensions of the image
	var w = 1600,
    	h = 1050,
    	url = 'data/etage'+etage+'.png';

	// calculate the edges of the image, in coordinate space
	var southWest = map.unproject([0, h], map.getMaxZoom()-1);
	var northEast = map.unproject([w, 0], map.getMaxZoom()-1);
	var bounds = new L.LatLngBounds(southWest, northEast);

	// add the image overlay,
	// so that it covers the entire map
	//L.marker([-50, 100	]).addTo(map);

	var arrayRows = document.getElementById("points").rows;
	var rowsNb = arrayRows.length;
	var tab_points = [];
	var j = 0;
	for(var i = 0 ; i < rowsNb; i++)
	{
			if(arrayRows[i].cells[5].innerHTML == bat && arrayRows[i].cells[6].innerHTML == etage){
				tab_points[j] = L.marker([-arrayRows[i].cells[1].innerHTML,arrayRows[i].cells[0].innerHTML],{title:arrayRows[i].cells[2].innerHTML}).addTo(map);
				tab_points[j].id = arrayRows[i].cells[2].innerHTML;
				tab_points[j].name = arrayRows[i].cells[3].innerHTML;
				tab_points[j].description = arrayRows[i].cells[4].innerHTML;
				j++;
			}
	}

	L.imageOverlay(url, bounds).addTo(map);

	// tell leaflet that the map is exactly as big as the image
	map.setMaxBounds(bounds);

    	/*for (var i = 0; i < j; i++)
    	{
				tab_points[i].addTo(map);
    		tab_points[i].on('click',function()
    		{
    			//location.href = "index.php?page=etage&drop=drop"+(this).id;
    			//info_card = document.createElement("div");
    			//container = document.getElementById("container");
    			//container.appendChild(info_card);
					alert(tab_points[i].id);
    		});
    	}*/
var qrcode = new QRCode(document.getElementById('qrcode'));
			for(var k=0;k<tab_points.length;k++){
				tab_points[k].on('click',function(d){
					qrcode.makeCode("?page=etage&location=true&selectedPoint="+this.id);
				});
			}

			//alert(tab_points.length);
});
