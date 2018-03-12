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
	</div>

    <div class="splash" >
	
		<div class="countdown text-left  circled small">
				<form method='POST'>			
				
					<?php if(isset($_COOKIE['turnId'])): ?>
						<?php for ($i=1;$i<=$_COOKIE['turnId']-1;$i++): ?>
							<div class="countdown circled small">
									
								<?php 
										$turnId = $i;
										$currentTurn = unserialize($_COOKIE["turn$turnId"]);
								?>
								

								<?php for ($j=1;$j<=4;$j++): ?>
									<div class="time days">
										<div class="value"><?php echo $currentTurn->{'num'."$j"}; ?></div>		
									</div>
								<?php endfor; ?>				
				
							</div>
						<?php endfor; ?>
				

						<?php if (!isset($_POST['win']) && !isset($_POST['loose'])):	 ?>		
							<input type = "submit" class="time days" style="width:140px; color:white; background-color:green" name="win" value = "Вгадав">
							<input type = "submit" class="time days" style="width:170px; color:white; background-color:red" name="loose" value = "Не вгадав">
						<?php endif; ?>	
					<?php else: ?>
					

						<div class="countdown circled small">
					

							<?php for ($j=1;$j<=4;$j++): ?>
								<div class="time days">
									<div class="value"><?php echo ${'num'."$j"} ?></div>		
								</div>
							<?php endfor; ?>

							<?php if (!isset($_POST['win']) && !isset($_POST['loose'])):	 ?>		
								<input type = "submit" class="time days" style="width:140px; color:white; background-color:green" name="win" value = "Вгадав">
								<input type = "submit" class="time days" style="width:170px; color:white; background-color:red" name="loose" value = "Не вгадав">
							<?php endif; ?>			


					<?php endif; ?>		
				</form>					
		</div>

		<?php if (isset($_POST['loose'])): ?>
			<div class="countdown text-left  circled small">
				<form method='POST'>
					<img src="/view/images/cow.png" alt="cow" style="width:70px; height:70px;">
					<b style="color:white; font-size:40px; font-type:bold">: </b>
					<input style ="width:30px; font-size:25px" type="number" min="0" max="4"  autofocus="" name="cows" maxlength="1">
					<img src="/view/images/bull.png" alt="bull" style="width:70px; height:70px;">
					<b style="color:white; font-size:40px; font-type:bold">: </b>
					<input style ="width:30px; font-size:25px" type="number" min="0" max="4"  name="cows" maxlength="1">
					<input type = "submit" class="time days" style="width:180px; color:white" name="sendCowsBulls" value = "Відправити">
				</form>	
			</div>
		<?php endif; ?>

		<?php if (isset($_POST['win'])): ?>
			<div class="countdown text-left  circled small">
				<p><b style="color:green; font-size:40px; font-type:bold">Я вгадав<b></p>
			</div>
		<?php endif; ?>	
		
		
        <form method='POST'>			
			<div class="countdown circled small" style="text-align:center">
						<br><br>
						<input type = "submit" class="time days" style="width:240px; color:white" name="goToMain" value = "Головне меню">
						<input type = "submit" class="time days" style="width:170px; color:white" name="resetGame2" value = "Спочатку">
			</div>
		</form>		
		
		
	</div>
	
	
	

	


</body>
</html>