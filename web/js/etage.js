$(document).ready(function()
{
	// Using leaflet.js to pan and zoom a big image.
	// See also: http://kempe.net/blog/2014/06/14/leaflet-pan-zoom-image.html
	function ajax(callback)
	{
		var xhttp = new XMLHttpRequest();
  		xhttp.onreadystatechange = function() 
  		{
  			//Si la requête est prête( readystate à 4) et la page est trouvée ( HTTP status à 200)
     	 	if (xhttp.readyState == 4 && xhttp.status == 200)
    		{
    			//Conversion de l'objet JSON en chaine de caractère
				console.log(xhttp.responseText);
				var parsed = JSON.parse(xhttp.responseText);
				//Affichage d'un élement du tableau,ici le 10ème.
        		callback(parsed);
    		}
  		};	
 		xhttp.open("GET", "data.php", true);
 		xhttp.send();
    	
	};

	function createMap(points)
	{
		console.log(points);
	// create the slippy map
	var map = L.map('mapid', {
	  minZoom: 1,
	  maxZoom: 4,
	  zoomControl : false,
	  center: [0, 0],
	  zoom: 0.1,
	  crs: L.CRS.Simple
	});

	var bat = points[points.length-5];
	var	etage = points[points.length-4];
	var selectedPoint = points[points.length-3];
    var location = points[points.length-2];
    var path = points[points.length-1];

    console.log(path);
	// dimensions of the image
	var w = 1600,
    	h = 1050,
    	url = 'data/etage'+etage+'.png';

	// calculate the edges of the image, in coordinate space
	var southWest = map.unproject([0, h], map.getMaxZoom()-1);
	var northEast = map.unproject([w, 0], map.getMaxZoom()-1);
	var bounds = new L.LatLngBounds(southWest, northEast);

	//Récupération points depuis JSON (taille du tableau -4 pour les 4 datas à la fin du tableau)
	var marker = [];
	var j = 0;
	for(var i = 0 ; i < points.length-5; i++)
	{
			if(points[i]['CODE_BAT'] == bat && points[i]['NIVEAU'] == etage)
			{
				marker[j] = L.marker([-points[i]['Y'],points[i]['X']],{title:points[i]['ID_PT']});
				marker[j].addTo(map);
				
				marker[j].y = points[i]['Y'];
				marker[j].x = points[i]['X'];
				marker[j].id = points[i]['ID_PT'];
				marker[j].name = points[i]['NOM'];
				marker[j].description = points[i]['DESCRIPTION'];
				marker[j].poi = points[i]['POI'];
				marker[j].niveau = points[i]['NIVEAU'];
				j++;
			}
	}

	L.imageOverlay(url, bounds).addTo(map);

	if( path != null)
	{
		var firstPoint = 1;
		var nbpoints = path.length;
		var tab_points = [];
		for(var k = 0; k<nbpoints; k++)
		{
			tab_points[k] = new Object();
			for(i = 0; i<marker.length;i++)
			{
				if(Number(path[k]) == Number(marker[i].id) && firstPoint == 0){
					tab_points[k].src = marker[i].getLatLng();
				}else if(Number(path[k]) == Number(marker[i].id) && firstPoint == 1){
					tab_points[k].src = marker[i].getLatLng();
					var x = marker[i].x;
					var y = marker[i].y;
						map.removeLayer(marker[i]);
						marker[i] = L.marker([-y,x], {
						icon: L.spriteIcon('red')
					}).addTo(map);
					firstPoint = 0;
				}
			}
			for(i = 0; i<marker.length;i++)
			{
				//alert(Number(path[k+1].cells[0].innerHTML) == Number(points[i].id));
				if(path[k+1] != 'undefined' && (Number(path[k+1]) == Number(marker[i].id))){
					tab_points[k].dest = marker[i].getLatLng();
				}
			}
			if(typeof tab_points[k].src != 'undefined' && typeof tab_points[k].dest != 'undefined'){
				var polygon = L.polygon([tab_points[k].src,tab_points[k].dest]).addTo(map);
			}
		}
		if(tap_points[nbpoints-1].etage != etage)
		{
			alert("poney");
		}
	}
	// tell leaflet that the map is exactly as big as the image
	map.setMaxBounds(bounds);

	

    for (var i = 0; i < marker.length; i++)
    {
    	if(marker[i].name)
    	{
    		marker[i].bindPopup(marker[i].name + '<br/><a class="waves-effect waves-light btn white-text red" href="index.php?page=poi&selectedPoint='+marker[i].id+'#'+marker[i].id+'">Détails</a>');
    	}
    	if( location == "true" && marker[i].id == selectedPoint )
    		{
    		//alert("test");
    		//Ici on modifie la couleur du marqueur
    		var x = marker[i].x;
    		var y = marker[i].y;
    		map.removeLayer(marker[i]);
    		marker[i] = L.marker([-y,x], {
  				icon: L.spriteIcon('red')
			}).addTo(map);
    		//Ici on modifie le contenu du popup
    		//popup = points[i].bindPopup('Vous êtes ici :<br/>'+name);
    		var popup = L.popup({offset : [1,-24]})
    			.setLatLng(marker[i].getLatLng())
    			.setContent('Vous êtes ici :<br/>')
    			.openOn(map);
    		//points[i].openPopup();
		}
   		if(  marker[i].id == selectedPoint )
   		{
   			marker[i].openPopup();
   		}
	}
	};

	ajax(createMap);
});
