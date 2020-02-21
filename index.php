<?php require_once "logica.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Lottery</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
	<style>
		input[type=submit] { margin-bottom: 25px }
		#table { margin-bottom: 0px }
		.table td, .table th { padding: .75rem 8px }
		#table td, #table th { padding: .5rem 8px }
		.recado {
		    clear: both;
		    display: block;
		    font-size: 13px;
		    margin: 4px 0;
		    font-weight: 100;
		}
	</style>
</head>
<body>
	<div class="container" style="clear: both;display: block;max-width: 100%">
		<div class="row">
			<div class="col-7">
				<?php 
					echo "<h2 style='margin-top:20px;margin-bottom:20px'>Jogos ..</h2>";
					echo ((isset($grupo)) ? $grupo . "<br>" : "");
				?>
			</div>
			<div class="col-5">
				<form action="https://palhocasites.com.br/lottery/index.php" method="POST" enctype="application/x-www-form-urlencoded">
					<h2 style="margin-top:20px;margin-bottom:20px">Escolha os números ..</h2>
					<div class="row">
						<div class="col-12">
							<h5>Número de Jogos .. <span class="recado">Não funciona se tiver combinações de MANTER e REMOVER</span></h5>
							<table id="table" class="table"><tr><td></td></tr></table>
							<input name="times" id="" class="form-control" value="<?php echo ((isset($_SESSION['times'])) ? $_SESSION['times'] : 100) ?>" style="margin-bottom:20px" />
							<h5>Número de Dezenas ..</h5>
							<table id="table" class="table"><tr><td></td></tr></table>
							<select name="qty" id="" class="form-control" style="margin-bottom:20px">
								<option <?php echo ((isset($_SESSION['qty']) && $_SESSION['qty'] == 11) ? "selected='selected'": "") ?> value="11">11</option>
								<option <?php echo ((isset($_SESSION['qty']) && $_SESSION['qty'] == 12) ? "selected='selected'": "") ?> value="12">12</option>
								<option <?php echo ((isset($_SESSION['qty']) && $_SESSION['qty'] == 13) ? "selected='selected'": "") ?> value="13">13</option>
								<option <?php echo ((isset($_SESSION['qty']) && $_SESSION['qty'] == 14) ? "selected='selected'": "") ?> value="14">14</option>
								<option <?php echo ((isset($_SESSION['qty']) && $_SESSION['qty'] == 15) ? "selected='selected'": "") ?> value="15">15</option>
								<option <?php echo ((isset($_SESSION['qty']) && $_SESSION['qty'] == 16) ? "selected='selected'": "") ?> value="16">16</option>
								<option <?php echo ((isset($_SESSION['qty']) && $_SESSION['qty'] == 17) ? "selected='selected'": "") ?> value="17">17</option>
								<option <?php echo ((isset($_SESSION['qty']) && $_SESSION['qty'] == 18) ? "selected='selected'": "") ?> value="18">18</option>
							</select>
							<h5>Manter .. <span class="recado"><?php echo ((isset($_SESSION['inc'])) ? count($_SESSION['inc']) . " números estão marcados." : ""); ?></span></h5>
							<table class="table">
								<tr>
									<td><input name="include[]" type="checkbox" value="1" <?php  echo (( isset($_SESSION['inc']) && is_array($_SESSION['inc']) && in_array(1, $_SESSION['inc']) ) ? "checked": "") ?>>01</td>
									<td><input name="include[]" type="checkbox" value="2" <?php  echo (( isset($_SESSION['inc']) && is_array($_SESSION['inc']) && in_array(2, $_SESSION['inc']) ) ? "checked": "") ?>>02</td>
									<td><input name="include[]" type="checkbox" value="3" <?php  echo (( isset($_SESSION['inc']) && is_array($_SESSION['inc']) && in_array(3, $_SESSION['inc']) ) ? "checked": "") ?>>03</td>
									<td><input name="include[]" type="checkbox" value="4" <?php  echo (( isset($_SESSION['inc']) && is_array($_SESSION['inc']) && in_array(4, $_SESSION['inc']) ) ? "checked": "") ?>>04</td>
									<td><input name="include[]" type="checkbox" value="5" <?php  echo (( isset($_SESSION['inc']) && is_array($_SESSION['inc']) && in_array(5, $_SESSION['inc']) ) ? "checked": "") ?>>05</td>
									<td><input name="include[]" type="checkbox" value="6" <?php  echo (( isset($_SESSION['inc']) && is_array($_SESSION['inc']) && in_array(6, $_SESSION['inc']) ) ? "checked": "") ?>>06</td>
									<td><input name="include[]" type="checkbox" value="7" <?php  echo (( isset($_SESSION['inc']) && is_array($_SESSION['inc']) && in_array(7, $_SESSION['inc']) ) ? "checked": "") ?>>07</td>
									<td><input name="include[]" type="checkbox" value="8" <?php  echo (( isset($_SESSION['inc']) && is_array($_SESSION['inc']) && in_array(8, $_SESSION['inc']) ) ? "checked": "") ?>>08</td>
									<td><input name="include[]" type="checkbox" value="9" <?php  echo (( isset($_SESSION['inc']) && is_array($_SESSION['inc']) && in_array(9, $_SESSION['inc']) ) ? "checked": "") ?>>09</td>
									<td><input name="include[]" type="checkbox" value="10" <?php echo (( isset($_SESSION['inc']) && is_array($_SESSION['inc']) && in_array(10, $_SESSION['inc']) ) ? "checked": "") ?>>10</td>
									<td><input name="include[]" type="checkbox" value="11" <?php echo (( isset($_SESSION['inc']) && is_array($_SESSION['inc']) && in_array(11, $_SESSION['inc']) ) ? "checked": "") ?>>11</td>
									<td><input name="include[]" type="checkbox" value="12" <?php echo (( isset($_SESSION['inc']) && is_array($_SESSION['inc']) && in_array(12, $_SESSION['inc']) ) ? "checked": "") ?>>12</td>
									<td><input name="include[]" type="checkbox" value="13" <?php echo (( isset($_SESSION['inc']) && is_array($_SESSION['inc']) && in_array(13, $_SESSION['inc']) ) ? "checked": "") ?>>13</td>
								</tr>
								<tr>
									<td><input name="include[]" type="checkbox" value="14" <?php echo (( isset($_SESSION['inc']) && is_array($_SESSION['inc']) && in_array(14, $_SESSION['inc']) ) ? "checked": "") ?>>14</td>
									<td><input name="include[]" type="checkbox" value="15" <?php echo (( isset($_SESSION['inc']) && is_array($_SESSION['inc']) && in_array(15, $_SESSION['inc']) ) ? "checked": "") ?>>15</td>
									<td><input name="include[]" type="checkbox" value="16" <?php echo (( isset($_SESSION['inc']) && is_array($_SESSION['inc']) && in_array(16, $_SESSION['inc']) ) ? "checked": "") ?>>16</td>
									<td><input name="include[]" type="checkbox" value="17" <?php echo (( isset($_SESSION['inc']) && is_array($_SESSION['inc']) && in_array(17, $_SESSION['inc']) ) ? "checked": "") ?>>17</td>
									<td><input name="include[]" type="checkbox" value="18" <?php echo (( isset($_SESSION['inc']) && is_array($_SESSION['inc']) && in_array(18, $_SESSION['inc']) ) ? "checked": "") ?>>18</td>
									<td><input name="include[]" type="checkbox" value="19" <?php echo (( isset($_SESSION['inc']) && is_array($_SESSION['inc']) && in_array(19, $_SESSION['inc']) ) ? "checked": "") ?>>19</td>
									<td><input name="include[]" type="checkbox" value="20" <?php echo (( isset($_SESSION['inc']) && is_array($_SESSION['inc']) && in_array(20, $_SESSION['inc']) ) ? "checked": "") ?>>20</td>
									<td><input name="include[]" type="checkbox" value="21" <?php echo (( isset($_SESSION['inc']) && is_array($_SESSION['inc']) && in_array(21, $_SESSION['inc']) ) ? "checked": "") ?>>21</td>
									<td><input name="include[]" type="checkbox" value="22" <?php echo (( isset($_SESSION['inc']) && is_array($_SESSION['inc']) && in_array(22, $_SESSION['inc']) ) ? "checked": "") ?>>22</td>
									<td><input name="include[]" type="checkbox" value="23" <?php echo (( isset($_SESSION['inc']) && is_array($_SESSION['inc']) && in_array(23, $_SESSION['inc']) ) ? "checked": "") ?>>23</td>
									<td><input name="include[]" type="checkbox" value="24" <?php echo (( isset($_SESSION['inc']) && is_array($_SESSION['inc']) && in_array(24, $_SESSION['inc']) ) ? "checked": "") ?>>24</td>
									<td><input name="include[]" type="checkbox" value="25" <?php echo (( isset($_SESSION['inc']) && is_array($_SESSION['inc']) && in_array(25, $_SESSION['inc']) ) ? "checked": "") ?>>25</td>									
								</tr>
							</table>								
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<h5>Remover ...<span class="recado"><?php echo ((isset($_SESSION['exc'])) ? count($_SESSION['exc']) . " números estão marcados." : ""); ?></span></h5>
							<table class="table">
								<tr>
									<td><input name="exclude[]" type="checkbox" value="1" <?php echo  (( isset($_SESSION['exc']) && is_array($_SESSION['exc']) && in_array(1, $_SESSION['exc']) ) ? "checked": "") ?>>01</td>
									<td><input name="exclude[]" type="checkbox" value="2" <?php echo  (( isset($_SESSION['exc']) && is_array($_SESSION['exc']) && in_array(2, $_SESSION['exc']) ) ? "checked": "") ?>>02</td>
									<td><input name="exclude[]" type="checkbox" value="3" <?php echo  (( isset($_SESSION['exc']) && is_array($_SESSION['exc']) && in_array(3, $_SESSION['exc']) ) ? "checked": "") ?>>03</td>
									<td><input name="exclude[]" type="checkbox" value="4" <?php echo  (( isset($_SESSION['exc']) && is_array($_SESSION['exc']) && in_array(4, $_SESSION['exc']) ) ? "checked": "") ?>>04</td>
									<td><input name="exclude[]" type="checkbox" value="5" <?php echo  (( isset($_SESSION['exc']) && is_array($_SESSION['exc']) && in_array(5, $_SESSION['exc']) ) ? "checked": "") ?>>05</td>
									<td><input name="exclude[]" type="checkbox" value="6" <?php echo  (( isset($_SESSION['exc']) && is_array($_SESSION['exc']) && in_array(6, $_SESSION['exc']) ) ? "checked": "") ?>>06</td>
									<td><input name="exclude[]" type="checkbox" value="7" <?php echo  (( isset($_SESSION['exc']) && is_array($_SESSION['exc']) && in_array(7, $_SESSION['exc']) ) ? "checked": "") ?>>07</td>
									<td><input name="exclude[]" type="checkbox" value="8" <?php echo  (( isset($_SESSION['exc']) && is_array($_SESSION['exc']) && in_array(8, $_SESSION['exc']) ) ? "checked": "") ?>>08</td>
									<td><input name="exclude[]" type="checkbox" value="9" <?php echo  (( isset($_SESSION['exc']) && is_array($_SESSION['exc']) && in_array(9, $_SESSION['exc']) ) ? "checked": "") ?>>09</td>
									<td><input name="exclude[]" type="checkbox" value="10" <?php echo (( isset($_SESSION['exc']) && is_array($_SESSION['exc']) && in_array(10, $_SESSION['exc']) ) ? "checked": "") ?>>10</td>
									<td><input name="exclude[]" type="checkbox" value="11" <?php echo (( isset($_SESSION['exc']) && is_array($_SESSION['exc']) && in_array(11, $_SESSION['exc']) ) ? "checked": "") ?>>11</td>
									<td><input name="exclude[]" type="checkbox" value="12" <?php echo (( isset($_SESSION['exc']) && is_array($_SESSION['exc']) && in_array(12, $_SESSION['exc']) ) ? "checked": "") ?>>12</td>
									<td><input name="exclude[]" type="checkbox" value="13" <?php echo (( isset($_SESSION['exc']) && is_array($_SESSION['exc']) && in_array(13, $_SESSION['exc']) ) ? "checked": "") ?>>13</td>
								</tr>
								<tr>
									<td><input name="exclude[]" type="checkbox" value="14" <?php echo (( isset($_SESSION['exc']) && is_array($_SESSION['exc']) && in_array(14, $_SESSION['exc']) ) ? "checked": "") ?>>14</td>
									<td><input name="exclude[]" type="checkbox" value="15" <?php echo (( isset($_SESSION['exc']) && is_array($_SESSION['exc']) && in_array(15, $_SESSION['exc']) ) ? "checked": "") ?>>15</td>
									<td><input name="exclude[]" type="checkbox" value="16" <?php echo (( isset($_SESSION['exc']) && is_array($_SESSION['exc']) && in_array(16, $_SESSION['exc']) ) ? "checked": "") ?>>16</td>
									<td><input name="exclude[]" type="checkbox" value="17" <?php echo (( isset($_SESSION['exc']) && is_array($_SESSION['exc']) && in_array(17, $_SESSION['exc']) ) ? "checked": "") ?>>17</td>
									<td><input name="exclude[]" type="checkbox" value="18" <?php echo (( isset($_SESSION['exc']) && is_array($_SESSION['exc']) && in_array(18, $_SESSION['exc']) ) ? "checked": "") ?>>18</td>
									<td><input name="exclude[]" type="checkbox" value="19" <?php echo (( isset($_SESSION['exc']) && is_array($_SESSION['exc']) && in_array(19, $_SESSION['exc']) ) ? "checked": "") ?>>19</td>
									<td><input name="exclude[]" type="checkbox" value="20" <?php echo (( isset($_SESSION['exc']) && is_array($_SESSION['exc']) && in_array(20, $_SESSION['exc']) ) ? "checked": "") ?>>20</td>
									<td><input name="exclude[]" type="checkbox" value="21" <?php echo (( isset($_SESSION['exc']) && is_array($_SESSION['exc']) && in_array(21, $_SESSION['exc']) ) ? "checked": "") ?>>21</td>
									<td><input name="exclude[]" type="checkbox" value="22" <?php echo (( isset($_SESSION['exc']) && is_array($_SESSION['exc']) && in_array(22, $_SESSION['exc']) ) ? "checked": "") ?>>22</td>
									<td><input name="exclude[]" type="checkbox" value="23" <?php echo (( isset($_SESSION['exc']) && is_array($_SESSION['exc']) && in_array(23, $_SESSION['exc']) ) ? "checked": "") ?>>23</td>
									<td><input name="exclude[]" type="checkbox" value="24" <?php echo (( isset($_SESSION['exc']) && is_array($_SESSION['exc']) && in_array(24, $_SESSION['exc']) ) ? "checked": "") ?>>24</td>
									<td><input name="exclude[]" type="checkbox" value="25" <?php echo (( isset($_SESSION['exc']) && is_array($_SESSION['exc']) && in_array(25, $_SESSION['exc']) ) ? "checked": "") ?>>25</td>									
								</tr>						
							</table>
						</div>
					</div>
					<input type="submit" class="btn btn-success btn-block" value="Generate" />
				</form>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>	
</body>
</html>