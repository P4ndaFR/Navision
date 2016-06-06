	<ul class="collapsible popout" data-collapsible="accordion">
	<?php
		for ($i=0; $i < count($points) ; $i++)
		{
			$activity="";
			if (isset($_GET['selectedPoint']) && ($_GET['selectedPoint'] == $points[$i]['ID_PT']))
			{
				$activity = "active";
			}
			if($points[$i]['POI'] == 1)
			{
			echo ' <li id="'.$points[$i]['ID_PT'].'">
      					<div class="collapsible-header '.$activity.'">'.$points[$i]['NOM'].'</div>
      					<div class="collapsible-body">
      						<p>'.$points[$i]['DESCRIPTION'].'</p>
      						<a class="waves-effect waves-light btn red" href="index.php?page=etage&selectedPoint='.$points[$i]['ID_PT'].'">Voir sur la carte</a>
      						<a class="waves-effect waves-light btn red" href="index.php?page=scan&dest='.$points[$i]['ID_PT'].'">Aller à</a>
      					</div>
    				</li>';
    		}
    	}
	?>
	</ul>
	</body>
</html>
