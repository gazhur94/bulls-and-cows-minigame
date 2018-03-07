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
	<!-- Main styles file -->
	<link rel="stylesheet" href="/view/css/style.css" />
	<!-- Icons via Font Awesome -->
	<link rel="stylesheet" href="/view/css/font-awesome.min.css" />
</head>
<body >

	<div class="bg-img" style="width: 100%; height: 100%; position: fixed; background: url(/view/images/hongkong-bg.jpg) no-repeat center center; background-size: cover; "></div>
	<!-- First screen -->
	<div class="splash" >
	
	<div >
					
		
		<?php if(isset($_COOKIE['turnId'])): ?>

			<?php for ($i=1;$i<=$_COOKIE['turnId']-1;$i++): ?>
				<div class="countdown circled small">
					<?php 
						$turnId = $i;
						
						$currentTurn = unserialize($_COOKIE["turn$turnId"]);
						
						
					?>
					<?php for ($j=1;$j<=4;$j++): ?>
					
						<div class="time days">
							<div class="value"><?php echo $currentTurn->turn['num'."$j"]; ?></div>		
						</div>
					<?php endfor; ?>
					<?php for ($c=0; $c<$currentTurn->turn["cows"];$c++): ?>
							<span>
								<img src="/view/images/cow.png" alt="cow" style="width:70px; height:70px;">
							</span>
					<?php endfor; ?>
					<?php for ($b=0; $b<$currentTurn->turn["bulls"];$b++): ?>	
							<span>
								<img src="/view/images/bull.png" alt="bull" style="width:70px; height:70px;">
							</span>
					<?php endfor; ?>	
	
				</div>
			<?php endfor; ?>
		<?php endif; ?>

		<?php if ((isset($_POST['num1'])) && (isset($_POST['num2'])) && (isset($_POST['num3'])) && (isset($_POST['num4'])) ): ?>
			<?php if (!isset($error)): ?>
				<div class="countdown circled small">
									
						<?php for ($i=1;$i<=4;$i++): ?>
								
						<div class="time days">
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

	
	<div>

	</div>
		<form method='POST'>			
				<div class="countdown circled small">
					
					<?php if (isset($error)): ?>
						<p><b style="color:red; font-size:20px; font-type:bold"><?php echo $error; ?><b></p>
					<?php endif ?>		
					<?php for ($i=1;$i<=4;$i++): ?>
					
						<div class="time days">
							<div class="value"><input style ="width:30px; font-size:25px" type="number" min="0" max="9"  autofocus="" name="<?php echo('num'."$i")  ?>" maxlength="1"></div>
							
						</div>

					<?php endfor; ?>

					<input type = "submit" name="send_numbers" value = "Відправити">
					
				</div>
		</form>		
		
		
	</div>
	


</body>
</html>