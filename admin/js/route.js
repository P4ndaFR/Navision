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
			pt = document.getElementById('session').rows[0].cells[2].innerHTML;
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
				tab_points[j] = L.marker([-arrayRows[i].cells[1].innerHTML,arrayRows[i].cells[0].innerHTML],{title:arrayRows[i].cells[2].innerHTML,draggable:true}).addTo(map);
				tab_points[j].id = arrayRows[i].cells[2].innerHTML;
				tab_points[j].name = arrayRows[i].cells[3].innerHTML;
				tab_points[j].description = arrayRows[i].cells[4].innerHTML;
				j++;
			}
	}

	L.imageOverlay(url, bounds).addTo(map);

	var liaisons = document.getElementById("liaisons").rows;
	var nbliaisons = liaisons.length;
	var tab_liaisons = [];
	for(var k = 0; k<nbliaisons; k++){
		tab_liaisons[k] = new Object();
		for(i = 0; i<tab_points.length;i++){
			if(liaisons[k].cells[0].innerHTML == tab_points[i].id){
				tab_liaisons[k].src = tab_points[i].getLatLng();
			}
		}
		for(i = 0; i<tab_points.length;i++){
			if(liaisons[k].cells[1].innerHTML == tab_points[i].id){
				tab_liaisons[k].dest = tab_points[i].getLatLng();
			}
		}
		if(typeof tab_liaisons[k].src != 'undefined' && typeof tab_liaisons[k].dest != 'undefined'){
			var polygon = L.polygon([tab_liaisons[k].src,tab_liaisons[k].dest]).addTo(map);
		}
	}

	// tell leaflet that the map is exactly as big as the image
	map.setMaxBounds(bounds);

});
