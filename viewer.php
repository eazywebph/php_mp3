<?php
	include('include/connect2server.php');
	if ($_GET['img']) {
	$image = $_GET['img'];
	$q_gal = mysqli_query($connect,"SELECT * FROM tbl_gallery WHERE img_ID='$image'");
	($row=$q_gal->fetch_assoc());
	$id = $row['img_ID'];
	$header = $row['img_Header'];
	$filename = $row['img_FileName'];
	$album = $row['img_Album'];
	$fs = "gallery/".$filename;
	$size = filesize($fs)/1024/1024;
	list($width,$height) = getimagesize($fs);
	$extension = pathinfo($fs,PATHINFO_EXTENSION);
	$description = $row['img_Description'];
	$datetaken = $row['img_Month']." ".$row['img_Day'].", ".$row['img_Year'];
	$sale = "";
	$print = "";
	if ($row['img_Sale'] == '1') {
		$sale = "<a href='purchase.php?image=$id'>Purchase</a>&nbsp;";
	}
	if ($row['img_Print'] == '1') {
		$print = "<a href='order.php?image=$id'>Order Print(s)</a>";
	}
	
	$q_alb = mysqli_query($connect,"SELECT * FROM tbl_album WHERE gal_AlbumID='$album'");
	($row1=$q_alb->fetch_assoc());
	$album_desc = $row1['gal_Name'];

	$exif_ifd0 = read_exif_data($fs ,'IFD0' ,0);      
	$exif_exif = read_exif_data($fs ,'EXIF' ,0);
	
		// Make
		if (@array_key_exists('Make', $exif_ifd0)) {
			$return['make'] = $exif_ifd0['Make'];
		}
		else {
			$exif_ifd0['Make'] = "";
		}

		// Model
		if (@array_key_exists('Model', $exif_ifd0)) {
			$return['model'] = $exif_ifd0['Model'];
		}
		else {
			$exif_ifd0['Model'] = "";
		}

		// Exposure
		if (@array_key_exists('ExposureTime', $exif_ifd0)) {
			$return['exposure'] = $exif_ifd0['ExposureTime'];
		}
		else {
			$exif_ifd0['ExposureTime'] = "";
		}

		// Aperture
		if (@array_key_exists('ApertureFNumber', $exif_ifd0['COMPUTED'])) {
			$return['aperture'] = $exif_ifd0['COMPUTED']['ApertureFNumber'];
		}
		else {
			$exif_ifd0['COMPUTED']['ApertureFNumber'] = "";
		}

		// ISO
		if (@array_key_exists('ISOSpeedRatings',$exif_exif)) {
			$return['iso'] = $exif_exif['ISOSpeedRatings'];
		}
		else {
			$exif_exif['ISOSpeedRatings'] = "";
		}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>Miguelito Photography : <?php echo $header; ?></title>
	<?php include "include/styles.php"; ?>
	<script>
      function disableClick(){
        document.onclick=function(event){
          if (event.button == 2) {
            alert('Please, no unauthorized usage of this website\'s images. All images and gallery contents found on this website is copyrighted.\n\n\n\nThank you!\n\nMiguelito Photography\nmiguelitophotography.com');
            return false;
          }
        }
      }
    </script>
</head>	
<body onLoad="disableClick()" oncontextmenu="return false">

<div id="viewer">
<img src="gallery/<?php echo $filename; ?>" >
	<div class="navigator">
		<a href="album.php?album=<?php echo $album;?>" target="_blank" onclick="self.close()">View Full Album</a>
		<a href="#" onclick="self.close()">Close this Window</a>
	</div>

<p>
Name: <?php echo $header; ?><br/>
Date: <?php echo $datetaken; ?><br/>
Description: <?php echo $description; ?><br/>
Album ID: <?php echo $album_desc; //" <small>(".$album.")</small>"; ?><br/><br/><br/>

<?php echo $sale; ?>
<?php echo $print; ?>

<br/><br/>
File Size: <?php echo round($size,2)." MB"; ?><br/>
File Type: <font style="text-transform:uppercase"><?php echo $extension; ?></font><br/>
Image Dimensions: <?php echo $width." x ".$height; ?><br/>

Camera: <?php echo $exif_ifd0['Make']." ".$exif_ifd0['Model']; ?><br/>
Exposure: <?php echo $exif_ifd0['ExposureTime']; ?><br/>
ISO: <?php echo $exif_exif['ISOSpeedRatings']; ?><br/>
Aperture: <?php echo $exif_ifd0['COMPUTED']['ApertureFNumber']; ?><br/>

</p>

</div>
	<?php include ('include/footer.php'); ?>
</body>
</html>
<?php
	}
	else {
		header('Location: gallery.php?show=All');
	}
?>