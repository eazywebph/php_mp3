<?php
	include('include/connect2server.php');
	if ($_GET['album']) {
	$get_id = $_GET['album'];
	
	// Album fetcher //
	$q_album = mysqli_query($connect,"SELECT * FROM tbl_album WHERE gal_AlbumID='$get_id'");
	($album=$q_album->fetch_assoc());
	
	$album_id = $album['gal_GalleryID'];
	$album_album_id = $album['gal_AlbumID'];
	$album_name = $album['gal_Name'];
	$album_desc = $album['gal_Description'];
	
	// Image fetcher //
	$q_image = mysqli_query($connect,"SELECT * FROM tbl_gallery WHERE img_Album='$get_id'");
	$image_count = mysqli_num_rows($q_image);
		
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>

<title>Miguelito Photography Cebu | Album</title>
	<?php include "include/styles.php"; ?>
 </head>
 
  <body>

	<div id="main"><?php include ('include/navbar.php'); ?><div id="album">
	<?php
	if (mysqli_num_rows($q_album) != "") {
	?>
	
	<!-- Coding begins here... 
	I just wanted to expand this selection...
	To make this more noticeable...
	And to make this line attractive... 
	Okay, this is the last line. !-->
	<br/><br/>
	<h1><?php echo $album_name; ?></h1>
	<h2><?php echo $album_desc; ?></h2>
	<h3><i>(<?php echo $image_count; ?> photos)</i></h3> 
	
	<?php while($image=$q_image->fetch_assoc()) { 
		$filename = $image['img_FileName'];
		$id = $image['img_ID'];
	?>
		<a href="view.php?image=<?php echo $id;?>" target="_blank" ><img src="gallery/<?php echo $album_album_id."/".$image['img_FileName']; ?>" class="slide" ></a>
	<?php } ?>
	<br/><br/>
	<a href="#" class="top">Back to Top</a>
	
<!-- I gave up on this script.

	<div class="button_bg">
	<button class="nav_button" onclick="plusDivs(-1)">Back</button>
	<button class="nav_button" onclick="plusDivs(1)">Next</button>
	</div>
	
<div id="force_center">
<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("slide");
  
  if (n > x.length) {
	  slideIndex = 1
	}
    
  if (n < 1) {
	  slideIndex = x.length
	}
	
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";
  
}
</script>

I'm done with this. -->

</div>

<?php
		}
		else {
			echo "<br/><br/><h1>Sorry, we couldn't find that album.</h1>";
		}
	}
	else {
		header ('Location: index.php');
	}
?>
	
			</div>
	</div>
	
	<?php include ('include/footer.php'); ?>

  </body>
  
</html>

