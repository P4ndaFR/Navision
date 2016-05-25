<?php
	function find_path($src,$dest){
		exec("java -jar ../java/Navision.jar $src $dest");
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
