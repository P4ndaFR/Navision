<script type="text/javascript" src="js/etage.js"></script>
<script src="leaflet/leaflet.js"></script>
<script src="leaflet/sprite.js"
<div class="container" id="container">
        
                <div class="card" id="map">
                        <?php
                            echo '<table id="points" style="display:none;">';
                            for($i = 0 ; $i < count($points) ; $i++)
                            {
                                echo '<tr>';
                                echo '<td>'.$points[$i]['X'].'</td>';
                                echo '<td>'.$points[$i]['Y'].'</td>';
                                echo '<td>'.$points[$i]['ID_PT'].'</td>';
                                echo '<td>'.$points[$i]['NOM'].'</td>';
                                echo '<td>'.$points[$i]['DESCRIPTION'].'</td>';
                                echo '<td>'.$points[$i]['NIVEAUX'].'</td>';
                                echo '</tr>';
                            }
                            echo '</table>';
                            //echo '<pre>'.print_r($points).'</pre>';
                        ?>
<<<<<<< HEAD
=======

>>>>>>> 922d76664219f33ea841228c213a3cd9b2169778
                        <div class="col s12">
                            <div id="mapid"></div>
                        </div>    
                </div>
        
</div>
</body>
</html>
