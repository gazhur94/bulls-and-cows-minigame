<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bull and Cows Supergame</title>
	<!-- Modernizr -->
	<script src="/view/js/modernizr.js"></script>
	<!-- Open Sans from Google Webfonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<!-- Main styles file -->
	<link rel="stylesheet" href="/view/css/style.css" />
	<!-- Icons via Font Awesome -->
	<link rel="stylesheet" href="/view/css/font-awesome.min.css" />
</head>
<body >

	<div class="bg-img" style="width: 100%; height: 100%; position: fixed; background: url(/view/images/hongkong-bg.jpg) no-repeat center center; background-size: cover; "></div>
	<!-- First screen -->
	<div class="splash" >
		
	
		<div class="containter">
						
			<div class="row">
				<div class="col-3"></div>
				<div class="col-6">
						
					<?php if(isset($_COOKIE['turnId'])): ?>

						<?php for ($i=1;$i<=$_COOKIE['turnId']-1;$i++): ?>
							<div class="countdown text-left circled small">
								<?php 
									$turnId = $i;
									
									$currentTurn = unserialize($_COOKIE["turn$turnId"]);
									
									
								?>
								<?php for ($j=1;$j<=4;$j++): ?>
								
									<div class="time text-center days">
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
						<?php endfor; ?>
						<?php endif; ?>

						<?php if (!isset($_POST['resetGame'])): ?>
						<?php if ((isset($_POST['num1'])) && (isset($_POST['num2'])) && (isset($_POST['num3'])) && (isset($_POST['num4'])) ): ?>
							<?php if (!isset($error)): ?>
								<div class="countdown text-left  circled small">
													
										<?php for ($i=1;$i<=4;$i++): ?>
												
										<div class="time  text-center days">
											<div class="value"><?php echo $_POST['num'."$i"]; ?></div>
													
										</div>
							
										<?php endfor; ?>

											
										<?php for ($i=0; $i<$cows;$i++): ?>
											<span>
												<img src="/view/images/cow.png" alt="cow" style="width:70px; height:70px;">
											</span>
										<?php endfor; ?>	
										<?php for ($i=0; $i<$bulls;$i++): ?>	
											<span>
												<img src="/view/images/bull.png" alt="bull" style="width:70px; height:70px;">
											</span>
										<?php endfor; ?>
								</div>
							<?php endif; ?>	
						<?php endif; ?>
					<?php endif; ?>

				</div>
				<div class="col-3"></div>
			</div>
		
		<div>

	</div>
		<form method='POST'>
			<?php if (isset($bulls)): ?>
				<?php if ($bulls == 4): ?>
					<p><b style="color:green; font-size:40px; font-type:bold">Ви вгадали число за <?php echo $_COOKIE['turnId'] ?> спроб<b></p>
				<?php endif; ?>
			<?php endif; ?>

			<?php if  (!isset($bulls) || $bulls !=4): ?>

				<div class="countdown circled small">
					
					<?php if (isset($error)): ?>
						<p><b style="color:red; font-size:20px; font-type:bold"><?php echo $error; ?><b></p>
					<?php endif ?>		
					<?php for ($i=1;$i<=4;$i++): ?>
					
						<div class="time days">
							<div class="value"><input style ="width:30px; font-size:25px" type="number" min="0" max="9"  autofocus="" name="<?php echo('num'."$i")  ?>" maxlength="1"></div>
							
						</div>

					<?php endfor; ?>

					<input type = "submit" class="time days" style="width:180px; color:white" name="send_numbers" value = "Відправити">
					
				</div>
			<?php endif; ?>
				<div class="countdown circled small" style="text-align:center">
					<br><br>
					<input type = "submit" class="time days" style="width:240px; color:white" name="goToMain" value = "Головне меню">
					<input type = "submit" class="time days" style="width:120px; color:white" name="resetGame" value = "Заново">
				</div>
		</form>		
		
		
	</div>
	


</body>
</html>