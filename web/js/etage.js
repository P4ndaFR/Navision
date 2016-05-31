$(document).ready(function()
{
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