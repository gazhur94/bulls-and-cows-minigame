<?php use minigame\view\helpers; ?>

<?php helpers::render('layouts/header'); ?>
		
        <form method='POST'>			
            <div class="countdown circled small" style="text-align:center">
                <input type = "submit" class="time days" style="width:320px; color:white" name="StartBotVSPlayer" value = "Відгадати число бота">
            </div>
			<div class="countdown circled small" style="text-align:center">
				<input type = "submit" class="time days" style="width:320px; color:white" name="StartPlayerVSBot" value = "Загадати боту число">
            </div>
		</form>		
		
		
<?php helpers::render('layouts/footer'); ?>