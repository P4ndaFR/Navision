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
                        ?>
                        <table id="session" style="display:none;">
  												<tr>
  													<td><?php echo $_SESSION['bat']?></td>
  													<td><?php echo $_SESSION['etage']?></td>
  												</tr>
  											</table>
                        <form>
                      		<div class="row">
                      			<div class="input-field col s4 offset-s4">
                      				<select name="etage" id="id">
                      					<?php
                      						foreach(get_bats() as $bat){
                      							echo "<optgroup label=\"".$bat['NOM_BAT']."\"value=\"".$bat['NOM_BAT']."\">";
                      							echo $bat['NOM_BAT'];
                      							foreach(get_etages($bat['NOM_BAT']) as $etage){
                      								echo "<option value=\"".$etage['NIVEAU'].",".$bat['CODE_BAT']."\">".$etage['NOM']."</option>";
                      							}
                      							echo "</optgroup>";
                      						}
                      					?>
                      				</select>
                      				<label>Choisissez un étage</label>
                      			</div>
                      		</div>
                      		<div class="row">
                      			<div class="col s2 offset-s5">
                      				<button class="btn waves-effect waves-light" type="submit" name="page" value="etage">Submit
                      					<i class="material-icons right">send</i>
                      				</button>
                      			</div>
                      		</div>
                      	</form>
                      	<script>
                      	$(document).ready(function() {
                              	$('select').material_select();
                      	});
                      	</script>
</body>
</html>
