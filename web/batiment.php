
                        <form>
                      		<div class="row">
                      			<div class="input-field col s6 offset-s3">
                      				<select name="etage" id="id" class="red-text">
                      					<?php
                      						foreach(get_bats() as $bat){
                      							echo '<optgroup  label="'.$bat['NOM_BAT'].'" value='.$bat['NOM_BAT'].'>';
                      							echo $bat['NOM_BAT'];
                      							foreach(get_etages($bat['NOM_BAT']) as $etage){
                      								echo '<option class="red_color" value='.$etage['NIVEAU'].','.$bat['CODE_BAT'].'>'.$etage['NOM'].'</option>';
                      							}
                      							echo "</optgroup>";
                      						}
                      					?>
                      				</select>
                      				<label>Choisissez un étage</label>
                      			</div>
                      		</div>
                      		<div class="row">
                      			<div class="col s4 offset-s4">
                      				<button id="submit" class="btn waves-effect waves-light red" type="submit" name="page" value="etage">Afficher
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
