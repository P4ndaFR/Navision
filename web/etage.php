<script src="leaflet/leaflet.js"></script>
<script src="leaflet/leaflet.sprite.js"></script>
<script type="text/javascript" src="js/etage.js"></script>
<div class="container" id="container">

                <div class="card" id="map">
                        
                  
                        <?php
                          $_SESSION['selectedPoint']=$_GET['selectedPoint'];
                          $_SESSION['location']=$_GET['location'];
                         
                        ?>

                        <div class="col s12">
                            <div id="mapid"></div>
                        </div>
                        <div id="nextLevel"></div>
                </div>

</div>
</body>
</html>
