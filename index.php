<?php
//header ('Location: gallery.php?show=All');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>

 <head>
 
<title>Miguelito | Cebu Music Photographer</title>
	<?php 
		$active01 = "active";
	?>
	<?php include('include/meta.php'); ?>
	<link rel="stylesheet" type="text/css" media="screen and (min-width: 600px)" href="style/global.css" />
	<link rel="stylesheet" type="text/css" media="screen and (max-width: 599px)" href="style/mobile.css">
 </head>

 <body>

	<div id="main" align="center">
	
		<?php include ('include/navbar.php'); ?>
		
		<div id="home">
			
			<video poster="bg/006.jpg" playsinline autoplay muted loop>>
				<source src="bg/bg.mp4" type="video/mp4" />
			</video>

			<div id="polina">
			<h1>Welcome</h1>
			<p>Miguelito | Cebu Music Photographer</p>
			<p>Hello! My name is Miguel and I'm from Cebu. I'm a Photographer and a Web Designer. I created this website and all of the photos here was captured by me.</p>
			<p>Please allow me to say this in R&B; baby! I wanna take a photo of you! Let me say this in Rock; can I take a picture of you? Let me say this in Metal; I shall take photographs of your existence. Whatever your genre is! I'll capture it, my desire is to capture your precious musical moments.</p>
			<p>Stick around and let me know. Thanks for dropping by. Rock on! Peace! Love!</p>
			<p>&nbsp;</p>
			<p>Migoy / Migoy</p>
			</div>
		
		</div>
		
		<?php include ('include/footer.php'); ?>
		
	</div>
 
 </body>
 
 </html>