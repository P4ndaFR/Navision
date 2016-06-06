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
	  zoom: 0.1,
	  crs: L.CRS.Simple
	});
	// dimensions of the image
	var bat = document.getElementById('session').rows[0].cells[0].innerHTML;
	//alert(bat);
	var	etage = document.getElementById('session').rows[0].cells[1].innerHTML;
	//alert(etage);

	var w = 1600,
    	h = 1050,
    	url = 'data/etage'+etage+'.png';

	// calculate the edges of the image, in coordinate space
	var southWest = map.unproject([0, h], map.getMaxZoom()-1);
	var northEast = map.unproject([w, 0], map.getMaxZoom()-1);
	var bounds = new L.LatLngBounds(southWest, northEast);

	// add the image overlay,
	// so that it covers the entire map
	//L.marker([-50, 100	]).addTo(map)
	//Récupération points depuis html + création des marqueurs
	var arrayRows = document.getElementById("points").rows;
	var rowsNb = arrayRows.length;
	var points = [];
	var j = 0;
	for(var i = 0 ; i < rowsNb; i++)
	{
			//alert(arrayRows[i].cells[5].innerHTML);
			//alert(arrayRows[i].cells[6].innerHTML);

			if(arrayRows[i].cells[5].innerHTML == bat && arrayRows[i].cells[6].innerHTML == etage){
				points[j] = L.marker([-arrayRows[i].cells[1].innerHTML,arrayRows[i].cells[0].innerHTML],{title:arrayRows[i].cells[2].innerHTML}).addTo(map);
				points[j].y = arrayRows[i].cells[1].innerHTML;
				points[j].x = arrayRows[i].cells[0].innerHTML;
				points[j].id = arrayRows[i].cells[2].innerHTML;
				points[j].name = arrayRows[i].cells[3].innerHTML;
				points[j].description = arrayRows[i].cells[4].innerHTML;
				j++;
			}
	}

	L.imageOverlay(url, bounds).addTo(map);

	var path = document.getElementById("path").rows;
	var nbpoints = path.length;
	var tab_points = [];
	for(var k = 0; k<nbpoints; k++){
		tab_points[k] = new Object();
		for(i = 0; i<points.length;i++){
			if(Number(path[k].cells[0].innerHTML) == Number(points[i].id)){
				tab_points[k].src = points[i].getLatLng();
			}
		}
		for(i = 0; i<points.length;i++){
			//alert(Number(path[k+1].cells[0].innerHTML) == Number(points[i].id));
			if(path[k+1] != 'undefined' && (Number(path[k+1].cells[0].innerHTML) == Number(points[i].id))){
				tab_points[k].dest = points[i].getLatLng();
			}
		}
		if(typeof tab_points[k].src != 'undefined' && typeof tab_points[k].dest != 'undefined'){
			var polygon = L.polygon([tab_points[k].src,tab_points[k].dest]).addTo(map);
		}
	}

	// tell leaflet that the map is exactly as big as the image
	map.setMaxBounds(bounds);

	//génération des popups
    var selectedPoint = document.getElementById("selectedPoint");
    var location = document.getElementById("location");
    for (var i = 0; i < points.length; i++)
    {
    	points[i].bindPopup(points[i].name + '<br/><a class="waves-effect waves-light btn white-text red" href="index.php?page=poi&selectedPoint='+points[i].id+'#'+points[i].id+'">Détails</a>');
    	//alert(location.innerHTML);
    	if( location.innerHTML != 'undefined' && location.innerHTML == "true" && points[i].id == selectedPoint.innerHTML )
    		{
    		//alert("test");
    		//Ici on modifie la couleur du marqueur
    		var x = points[i].x;
    		var y = points[i].y;
    		var name = points[i].name;
    		map.removeLayer(points[i]);
    		points[i] = L.marker([-y,x], {
  				icon: L.spriteIcon('red')
			}).addTo(map);
    		//Ici on modifie le contenu du popup
    		//popup = points[i].bindPopup('Vous êtes ici :<br/>'+name);
    		var popup = L.popup({offset : [1,-24]})
    			.setLatLng(points[i].getLatLng())
    			.setContent('Vous êtes ici :<br/>'+name)
    			.openOn(map);
    		//points[i].openPopup();
		}
   		if( points[i].id == selectedPoint.innerHTML )
   		{
   			points[i].openPopup();
   		}
	}
});
