<?php
	// $src et $dest sont les ids des points
	function find_path($src,$dest){
		exec("java -jar ../java/Navision.jar $src $dest home.apremel.fr:3306 Navision Navision Navision");
	}
	function read_path(){
		$file = fopen("path.txt","r");
		$i=0;
		while(!feof($file)){
			$path[$i] = fgets($file);
			$i++;
		}
		fclose($file);
		return $path;
	}
?>
