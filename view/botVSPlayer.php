<?php use minigame\view\helpers; ?>

<?php helpers::render('layouts/header'); ?>
	
		<div class="container">
		<div class="row">
		<div class="col-9 offset-3" >
			
		
		
		<!-- Інфа з куків				 -->
					<?php if(isset($_COOKIE['turnId'])): ?>

						<?php for ($i=1;$i<=$_COOKIE['turnId']-1;$i++): ?>
							<div class="countdown circled small">
								<div class="text-left" >
									<?php 
										$turnId = $i;
										$currentTurn = unserialize($_COOKIE["turnb$turnId"]);
									?>

									<?php for ($j=1;$j<=4;$j++): ?>
									
										<div class="time days" style="text-align: center">
											<div class="value"><?php echo $currentTurn->{'num'."$j"}; ?></div>		
										</div>
									<?php endfor; ?>

									<?php for ($c=0; $c<$currentTurn->cows;$c++): ?>
											<span>
												<img src="/view/images/cow.png" alt="cow" style="width:70px; height:70px;">
											</span>
									<?php endfor; ?>

									<?php for ($b=0; $b<$currentTurn->bulls;$b++): ?>	
											<span>
												<img src="/view/images/bull.png" alt="bull" style="width:70px; height:70px;">
											</span>
									<?php endfor; ?>	
				
								</div>
							</div>
						<?php endfor; ?>
					<?php endif; ?>


								
			</div>
		</div>

	<!-- Форма вводу -->
			<?php
				if (isset($_COOKIE['turnId']))
				{
					$turnId = $_COOKIE['turnId']-1;
					$turn = unserialize($_COOKIE["turnb$turnId"]);
					$bulls = $turn->bulls;
				}

			?>
			<div>
				<div class="countdown circled small">
				<div class="text-left offset-3">
					<form method='POST'>
						<?php if (isset($bulls)): ?>
							<?php if ($bulls == 4): ?>
								<p><b style="color:green; font-size:40px; font-type:bold">Ви вгадали число за <?php echo $_COOKIE['turnId']-1 ?> спроб<b></p>
							<?php endif; ?>
						<?php endif; ?>

						<?php if (isset($_POST['showAnswer'])): ?>
							<p><b style="color:red; font-size:40px; font-type:bold">Ви програли. Загадане число: <?php echo $_SESSION['number']->numb[0].$_SESSION['number']->numb[1].$_SESSION['number']->numb[2].$_SESSION['number']->numb[3]; ?> <b></p>
						<?php endif; ?>

						<?php if  (!isset($bulls) || $bulls !=4): ?>
							<?php if ((!isset($_POST['showAnswer']))): ?>
									
								<?php if (isset($error)): ?>
									<p><b style="color:red; font-size:20px; font-type:bold"><?php echo $error; ?><b></p>
								<?php endif ?>	

								<?php for ($i=1;$i<=4;$i++): ?>
									<div class="time days" style="text-align:center">
										<div class="value"><input style ="width:40px; font-size:25px; height:45px" type="number" min="0" max="9"  autofocus="" name="<?php echo('num'."$i")  ?>" maxlength="1"></div>
										
									</div>
								<?php endfor; ?>

								<input type = "submit" class="time days" style="width:180px; color:white; background-color:blue" name="send_numbers" value = "Відправити">
									
							<?php endif; ?>
						<?php endif; ?>
						</div>

						<div class="countdown circled small" style="text-align:center">
							<br><br>
							<a href="/"><input class="time days" style="width:240px; color:white" value = "Головне меню"></a>
							
							<?php if (!isset($_POST['showAnswer']) && (!isset($bulls) || $bulls !=4)): ?>
								<input type = "submit" class="time days" style="width:450px; color:white" name="showAnswer" value = "Здатись / Показати відповідь">
							<?php endif; ?>
							
							<?php if (isset($_POST['showAnswer']) || (isset($bulls)) && ($bulls == 4)): ?>
								<input type = "submit" class="time days" style="width:150px; color:white" name="resetGame" value = "Спочатку">
							<?php endif; ?>
						</div>
					
					</form>		
				</div>		
				
			</div>	
<?php helpers::render('layouts/footer'); ?>