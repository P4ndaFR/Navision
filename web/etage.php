<script type="text/javascript" src="js/etage.js"></script>
<div class="container">
        <div class="row">
            <div class="col m12">
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
                        ?>
                        <img class="responsive-img" id="img_map" src="data/etage1.png">
                </div>
            </div>
        </div>
</div>
</body>
</html>