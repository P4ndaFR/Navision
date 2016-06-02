<script type="text/javascript" src="js/etage.js"></script>
<script src="leaflet/leaflet.js"></script>
<div class="container">
        <div class="row">
                <div class="card" id="map">
                        <?php
                            echo '<table id="points" style="display:none;">';
                            for($i = 0 ; $i < count($points) ; $i++)
                            {
                                echo '<tr>';
                                echo '<td>'.$points[$i]['X'].'</td>';
                                echo '<td>'.$points[$i]['Y'].'</td>';
                                echo '</tr>';
                            }
                            echo '</table>';
                            //echo '<pre>'.print_r($points).'</pre>';
                        ?>

                        <div class="col s12">
                            <div id="mapid"></div>
                        </div>
                </div>
        </div>
</div>
</body>
</html>
