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
                        <div class="row">
                            <div class="col s10 offset-s2" id="nextLevel"></div>
                        </div>
                </div>

</div>
</body>
</html>
