<script src="leaflet/leaflet.js"></script>
<script src="leaflet/leaflet.sprite.js"></script>
<script type="text/javascript" src="js/etage.js"></script>
<div class="container" id="container">

                <div class="card" id="map">
                        
                  
                        <?php
                          $_SESSION['selectedPoint']=$_GET['selectedPoint'];
                          $_SESSION['location']=$_GET['location'];
                          if(isset($_SESSION['path'])){
                            $path = $_SESSION['path'];
                            echo '<table id="path" style="display:none">';
                            for($i = 0;$i<count($path);$i++){
                              echo '<tr>';
                              echo '<td>'.$path[$i].'</td>';
                              echo '</tr>';
                            }
                            echo '</table>';
                          }
                        ?>

                        <div class="col s12">
                            <div id="mapid"></div>
                        </div>
                        <p id="test"></p>
                </div>

</div>
</body>
</html>
