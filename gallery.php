<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>

<head>
 
<title>Miguelito Photography Cebu | Gallery</title>
	<?php 
		$active02 = "active";
		include('include/meta.php'); 
		include('include/connect2server.php');
		echo "Hello World!".$connect;
		
		if ($_GET['show'] == "All") {
			$as0 = "active_sub";
		}
		if ($_GET['show'] == "Gigs") {
			$as1 = "active_sub";
		}
		if ($_GET['show'] == "People") {
			$as2 = "active_sub";
		}
		if ($_GET['show'] == "Portrait") {
			$as3 = "active_sub";
		}
		if ($_GET['show'] == "Others") {
			$as4 = "active_sub";
		}
		if ($_GET['show'] == "Stock") {
			$as5 = "active_sub";
		}
		
	?>
	<?php include "include/styles.php"; ?>

 </head>

 <body>

	<div id="main">
	
		<?php include ('include/navbar.php'); ?>
			<br/><br/>
		<div id="page">
			<div class="dropdown" align="right">
			  <button class="dropbtn" >Choose from Category</button>
				<div class="dropdown-content">
					<a href="?show=All" class="<?php echo $as0; ?>">All</a>
					<a href="?show=Gigs" class="<?php echo $as1; ?>">Gigs</a>
					<a href="?show=People" class="<?php echo $as2; ?>">People</a>
					<a href="?show=Portrait" class="<?php echo $as3; ?>">Portrait</a>
					<a href="?show=Others" class="<?php echo $as4; ?>">Others</a>
					<a href="?show=Stock" class="<?php echo $as5; ?>">Stock</a>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				</div>
			</div>
			<br/><br/>
<ul id="thumbnails" class="thumbnails clearfix">
<?php

	$get = $_GET['show'];
	if ($_GET['show'] == "All") {
		$row11 = mysqli_query($connect,"SELECT * FROM tbl_gallery WHERE img_Thumb1 is not NULL");
		while ($row12=$row11->fetch_assoc()) {
?>	
			<li class="thumb">
				<a target="popup" onclick="window.open('viewer.php?img=<?php echo $row12['img_ID'];?>','popup','width=850px,height=850px'); return false;">
						<div class="thumb_overlay"></div>
						<img src="gallery/thumb/<?php echo $row12['img_FileName'];?>" alt="<?php echo $row12['img_Header']; ?>" />
					</a>
					<div class="thumb-info">
						<h3><?php echo $row12['img_Header']; ?></h3>
						<p><?php echo $row12['img_Description']; ?></p>
					</div>
			</li>	
<?php
		}
	}
	if ($_GET['show'] == $get) {
		$row21 = mysqli_query($connect,"SELECT * FROM tbl_gallery WHERE img_Category='$get' and img_Thumb1 is not NULL");
		while ($row22=$row21->fetch_assoc()) {
?>
			<li class="thumb">
				<a target="popup" onclick="window.open('viewer.php?img=<?php echo $row22['img_ID'];?>','popup','width=850px,height=850px'); return false;">
						<div class="thumb_overlay"></div>
						<img src="gallery/thumb/<?php echo $row22['img_FileName'];?>" alt="<?php echo $row22['img_Header']; ?>" />
					</a>
					<div class="thumb-info">
						<h3><?php echo $row22['img_Header']; ?></h3>
						<p><?php echo $row22['img_Description']; ?></p>
					</div>
			</li>
			
<?php		
		}
	}
	if ($_GET['show'] == "Stock") {
		$row31 = mysqli_query($connect,"SELECT * FROM tbl_gallery WHERE img_Stock is not NULL and img_Thumb1 is not NULL");
		while ($row32=$row31->fetch_assoc()) {
?>
			<li class="thumb">
				<a target="popup" onclick="window.open('viewer.php?img=<?php echo $row32['img_ID'];?>','popup','width=850px,height=850px'); return false;">
						<div class="thumb_overlay"></div>
						<img src="gallery/thumb/<?php echo $row32['img_FileName'];?>" alt="<?php echo $row32['img_Header']; ?>" />
					</a>
					<div class="thumb-info">
						<h3><?php echo $row32['img_Header']; ?></h3>
						<p><?php echo $row32['img_Description']; ?></p>
					</div>
			</li>			
<?php
		}
	}
?>

</ul></div>
 
	<?php include ('include/footer.php'); ?>
 
 </body>
 
 </html>