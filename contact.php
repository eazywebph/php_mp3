<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>

<head>
 
<title>Miguelito Photography Cebu | About</title>
	<?php 
		$active04 = "active";
	?>
	<?php include('include/meta.php'); ?>
	<?php include "include/styles.php"; ?>
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<div id="fb-root"></div>
	<script src="script/fb.js" type="text/javascript"></script>
</head>

 <body>

	<div id="main" align="center">
	
		<?php include ('include/navbar.php'); ?>
		
		<div id="page">
			<div id="contact">
				<h1>Send me a message</h1>
				<?php
				
					if ($_GET['captcha'] == 'fail') {
						echo "<font color='red'>Captcha failed. Please try again.</font>";
					}
					
					if ($_GET['captcha'] == 'sent') {
						echo "<font color='blue'>Your message has been sent. Thank you!</font>";
					}
					
					if ($_GET['captcha'] == 'incomplete') {
						echo "<font color='red'>Please fill up subject and message!</font>";
					}
					
					
				?>
				<form method="post" action="send.php" name="frm_Contact">
					Your Name<br/><input type="text" name="txt_name" class="input" maxlength="50" /><br/>
					Your Email<br/><input type="text" name="txt_email" class="input" maxlength="50" /><br/>
					Phone Number<br/><input type="text" name="txt_phone" class="input" maxlength="50" /><br/>
					<br/><br/>
					Subject<br/><input type="text" name="txt_subject" class="input" maxlength="500" /><br/>
					Message<br/><textarea name="txt_message" class="textarea" maxlength="2500" /></textarea><br/><br/>
					<div class="g-recaptcha" data-sitekey="6LeUKCMUAAAAABJKvaHfeUz8wt2moX7vA-jpB5WY"></div>
					<input name="btn_Send" type="submit" value="Send Message" class="button" />
					<input name="btn_Cancel" type="reset" value="Cancel" class="button" />
				</form>
			
				<div class="contact_details">
				<p>
				Name: Miguel Batiquin<br/>
				Cellphone: (+63) 923 271 8989<br/>
				Phone: (032) 406 4348<br/>
				Email: <a href="mailto:miguel@miguelitophotography.com">miguel@miguelitophotography.com</a><br/>
				Facebook: <a href="https://www.facebook.com/MiguelitoPhotography">@MiguelitoPhotography</a><br/>
				Address: IT Park, Apas, Cebu City.<br/>
				</p>
				<p><small>Google Map</small></p>
				<a href="https://www.google.com.ph/maps/place/IT+Park/@10.3312613,123.9054733,17z/data=!3m1!4b1!4m5!3m4!1s0x33a99921dc1502cd:0x2a368d4399f7bd0!8m2!3d10.331256!4d123.907662?hl=en" target="_blank"><img src="img/IT_map.JPG"></a>
				<p><small>Facebook Page Comment</small></p>
				<div class="fb-comments" data-href="https://www.facebook.com/MiguelitoPhotography/" data-numposts="5" data-width="500" ></div>
				<br/>
				
				</div>

			</div>
		</div>
		
		<?php include ('include/footer.php'); ?>
		
	</div>
 
 </body>
 
 </html>