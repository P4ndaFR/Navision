<script src="leaflet/leaflet.js"></script>
<script src="leaflet/leaflet.sprite.js"></script>
<script type="text/javascript" src="js/etage.js"></script>
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
                                echo '<td>'.$points[$i]['CODE_BAT'].'</td>';
                                echo '<td>'.$points[$i]['NIVEAU'].'</td>';
                                echo '</tr>';
                            }

                            echo
                            '<p id="selectedPoint" style="display:none;">'.$_GET['selectedPoint'].'</p>
                            <p id="location" style="display:none;">'.$_GET['location'].'</p>';


                            //echo '<pre>'.print_r($points).'</pre>';
                        ?>
                        <table id="session" style="display:none;">
  												<tr>
  													<td><?php echo $_SESSION['bat']?></td>
  													<td><?php echo $_SESSION['etage']?></td>
  												</tr>
  											</table>
                        <?php
                          if(isset($_SESSION['path'])){
                            $path = $_SESSION['path'];
                            echo '<table id="path">';
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
                </div>

</div>
</body>
</html>
