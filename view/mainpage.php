<?php use minigame\view\helpers; ?>

<?php helpers::render('layouts/header'); ?>
		
        <form method='POST'>			
            <div class="countdown circled small" style="text-align:center">
                <a href="/botVSplayer" class="time days" style="width:320px; color:white" >Відгадати число бота</a>
            </div>
			<div class="countdown circled small" style="text-align:center">
				<a href="/playerVSbot" class="time days" style="width:320px; color:white" >Загадати боту число</a>
            </div>
		</form>		
		
		
<?php helpers::render('layouts/footer'); ?>