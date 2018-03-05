<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Launch Soon | Home</title>
	<!-- Modernizr -->
	<script src="/view/js/modernizr.js"></script>
	<!-- Open Sans from Google Webfonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<!-- Main styles file -->
	<link rel="stylesheet" href="/view/css/style.css" />
	<!-- Icons via Font Awesome -->
	<link rel="stylesheet" href="/view/css/font-awesome.min.css" />
</head>
<body class="color-scheme-neue">

	<div class="bg-img" style="width: 100%; height: 100%; position: fixed; background: url(/images/hongkong-bg.jpg) no-repeat center center; background-size: cover; "></div>
	<!-- First screen -->
	<div class="splash">
	
	<div>
	<div class="countdown circled small">
					
		
			
			<?php for ($i=1;$i<=4;$i++): ?>
					
			<div class="time days">
				<div class="value"><?php echo $_POST['num'."$i"]; ?></div>
						
					</div>

				<?php endfor; ?>
	</div>
	
	<div>

	</div>
		<form method='POST'>			
				<div class="countdown circled small">
					
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