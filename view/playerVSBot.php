<?php use minigame\view\helpers; ?>

<?php helpers::render('layouts/header'); ?>

<div class="container">
	<div class="row">
		<div class="col-9 offset-3" >
			
			<?php if(isset($_COOKIE['turnpId'])): ?>
						<?php if (isset($_POST['loose'])): ?>
							
							<?php for ($i=1;$i<=$_COOKIE['turnpId'];$i++): ?>
							<div class="text-left" >

									<?php 
										$turnpId = $i;
										$turnpIdbc = $i;
										$currentTurn = unserialize($_COOKIE["turnp$turnpId"]); 
									?>
										
											<div class="countdown circled small text-left"  >
											
													
														<?php for ($j=1;$j<=4;$j++): ?>
														
														<div class="time days" style="text-align: center">
															<div class="value"><?php echo $currentTurn->{'num'."$j"}; ?></div>		
														</div>
														<?php endfor; ?>
														<?php if (isset($_COOKIE["bc$turnpIdbc"])): ?>
														<?php $currentBC = unserialize($_COOKIE["bc$turnpIdbc"]); ?>

															<?php for ($c=0; $c<$currentBC->cows;$c++): ?>
																	<span>
																		<img src="/view/images/cow.png" alt="cow" style="width:70px; height:70px;">
																	</span>
															<?php endfor; ?>

															<?php for ($b=0; $b<$currentBC->bulls;$b++): ?>	
																	<span>
																		<img src="/view/images/bull.png" alt="bull" style="width:70px; height:70px;">
																	</span>
															<?php endfor; ?>
													
														<?php endif; ?>
											</div>	
										

								</div>
								<?php endfor; ?>
						<?php else: ?>		
								
						
						
							<?php for ($i=1;$i<=$_COOKIE['turnpId']-1;$i++): ?>		
							<?php 
								$turnpId = $i;
								$turnpIdbc = $i;
								$currentTurn = unserialize($_COOKIE["turnp$turnpId"]);
								if (isset($_COOKIE["bc$turnpIdbc"]))
								{
									$currentBC = unserialize($_COOKIE["bc$turnpIdbc"]);
								}
								
							?>
								<div class="countdown circled small text-left">
								

									<?php for ($j=1;$j<=4;$j++): ?>
									
										<div class="time days" style="text-align: center">
											<div class="value"><?php echo $currentTurn->{'num'."$j"}; ?></div>		
										</div>
									<?php endfor; ?>

									<?php if (isset($_COOKIE["bc$turnpIdbc"])): ?>
										<?php if ($i != $_COOKIE['turnpId']): ?>
											<?php for ($c=0; $c<$currentBC->cows;$c++): ?>
													<span>
														<img src="/view/images/cow.png" alt="cow" style="width:70px; height:70px;">
													</span>
											<?php endfor; ?>

											<?php for ($b=0; $b<$currentBC->bulls;$b++): ?>	
													<span>
														<img src="/view/images/bull.png" alt="bull" style="width:70px; height:70px;">
													</span>
											<?php endfor; ?>
										<?php endif; ?>
									<?php endif; ?>
								</div>
							<?php endfor; ?>
				
						
						<?php endif; ?>				
					
			<?php endif; ?>

			

		
			<div class="countdown text-left  circled small">
					<form method='POST'>			
					
						<?php if(!isset($error)): ?>
							<?php if(isset($_SESSION['turnpId']) && (!isset($_POST['loose']))): ?>
								<div class="countdown circled small">
								<?php 
									$turnpId = ($_SESSION['turnpId']-1);
									$currentTurn = unserialize($_COOKIE["turnp$turnpId"]);
									
								
								?>
								
									<?php for ($j=1;$j<=4;$j++): ?>
										<div class="time days " style="text-align: center">
											<div class="value"><?php echo $currentTurn->{'num'."$j"}; ?></div>		
										</div>
									<?php endfor; ?>

									<?php if (!isset($_POST['win']) && !isset($_POST['loose'])):	 ?>		
										<input type = "submit" class="time days" style="width:140px; color:white; background-color:green" name="win" value = "Вгадав">
										<input type = "submit" class="time days" style="width:170px; color:white; background-color:red" name="loose" value = "Не вгадав">
									<?php endif; ?>			
						<?php endif; ?>
						

		
					</form>					
					<?php endif; ?>	
			</div>

			<?php if (isset($error)): ?>
				<p><b style="color:red; font-size:20px; font-type:bold"><?php echo $error; ?><b></p>
			<?php endif ?>
			
			<?php if ((isset($_POST['loose'])) || (isset($_POST['sendCowsBulls']) && (isset($error)))) : ?>
				<div class="countdown text-left  circled small">
					<form method='POST'>
						<img src="/view/images/cow.png" alt="cow" style="width:70px; height:70px;">
						<b style="color:white; font-size:40px; font-type:bold">: </b>
						<input style ="width:40px; font-size:25px" type="number" min="0" max="4"  autofocus="" name="cows" maxlength="1">
						<img src="/view/images/bull.png" alt="bull" style="width:70px; height:70px;">
						<b style="color:white; font-size:40px; font-type:bold">: </b>
						<input style ="width:40px; font-size:25px" type="number" min="0" max="4"  name="bulls" maxlength="1">
						<input type = "submit" class="time days" style="width:180px; color:white" name="sendCowsBulls" value = "Відправити">
					</form>	
				</div>
			<?php endif; ?>

			</div>
			</div>
			</div>	

			<?php if (isset($_POST['win']) || (isset($_POST['bulls']) && $_POST['bulls'] == 4)): ?>
				<div class="countdown text-left  circled small">
					<p><b style="color:green; font-size:40px; font-type:bold">Я вгадав<b></p>
				</div>
			<?php endif; ?>	
			
			
			<form method='POST'>			
				<div class="countdown circled small" style="text-align:center">
							<br><br>
							<a href="/"><input class="time days" style="width:240px; color:white" name="goToMain" value = "Головне меню"></a>
							<input type = "submit" class="time days" style="width:170px; color:white" name="resetGame2" value = "Спочатку">
				</div>
			</form>		
		</div>
	</div>
</div>

<?php helpers::render('layouts/footer'); ?>