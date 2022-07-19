
<?php
include ('inc_session.php');
if ($_SESSION['login'] == "1") {
include ('inc_connect.php');
$q_msg = mysqli_query($connect,"SELECT * FROM tbl_message");
$c_msg = mysqli_num_rows($q_msg);
?>

<html>
<head>
	<?php include('inc_style.php'); ?>
	<title>Admin - Miguelito Photography</title>
</head>
<body>
<div id="wrap">

<h1>MP Admin Login</h1>
<?php
date_default_timezone_set('Asia/Manila');
echo date('M')." ".date('d').", ".date('Y')." - ".date('g').":".date('i')." ".date('A');
?>
<br/>
<a href="../index.php" target="new">Home</a>
&nbsp;&nbsp;<a href="../gallery.php?show=All" target="new">Gallery</a>
&nbsp;&nbsp;<a href="logout.php">Logout</a>
<br/><br/>
<hr/>

<br/>
<h2>Admin Links</h2>
Manage:&nbsp;&nbsp;&nbsp;
<a href="add_album.php">Add Album</a>&nbsp;&nbsp;&nbsp;
<a href="add_image.php">Add Image</a>&nbsp;&nbsp;&nbsp;
<a href="add_categories.php">Add Category</a>&nbsp;&nbsp;&nbsp;
<a href="messages.php">Messages (<?php echo $c_msg; ?>)</a>&nbsp;&nbsp;&nbsp;
<br/><br/>
<hr/>

<br/>
<h2>Database Overview</h2>

<?php
$q_cat = mysqli_query($connect,"SELECT * FROM tbl_category");
$q_gal = mysqli_query($connect,"SELECT * FROM tbl_gallery ORDER BY img_Album ASC");
$q_alb = mysqli_query($connect,"SELECT * FROM tbl_album");

$c_cat = mysqli_num_rows($q_cat);
$c_gal = mysqli_num_rows($q_gal);
$c_alb = mysqli_num_rows($q_alb);
?>
<div id="table">
	
	<!-- This is for Gallery -->
	<table>Images: <?php echo $c_gal; ?><a name="images" class="anchor">&nbsp;</a><br/>
		<tr> <!-- 7 rows -->
			<th>ID</th>
			<th>Album</th>
			<th>Category</th>
			<th>File Name</th>
			<th>Description</th>
			<th>Date</th>
			<th>Stock</th>
			<th>Sale</th>
			<th>Print</th>
			<th>Thumbnail</th>
			<th>Operation</th>
		</tr>
	<?php
		while ($q_gal_row=$q_gal->fetch_assoc()) {
	?>
		<tr>
			<td><a name="img<?php echo $q_gal_row['img_ID']; ?>" class="anchor"><?php echo $q_gal_row['img_ID']; ?></a></td>
			<td><?php echo $q_gal_row['img_Album']; ?></td>
			<td><?php echo $q_gal_row['img_Category']; ?></td>
			<td><?php echo $q_gal_row['img_FileName']; ?></td>
			<td><?php echo $q_gal_row['img_Description']; ?></td>
			<td><?php echo $q_gal_row['img_Month']." ".$q_gal_row['img_Day']." ".$q_gal_row['img_Year']; ?></td>
			<td><?php echo $q_gal_row['img_Stock']; ?></td>
			<td><?php echo $q_gal_row['img_Sale']; ?></td>
			<td><?php echo $q_gal_row['img_Print']; ?></td>
			<td>
			<?php
			if ($q_gal_row['img_Thumb1'] == "") {
				echo "None";
			} 
			else {
			?>
			<img src="../gallery/thumb/<?php echo $q_gal_row["img_Thumb1"]; ?>">
			<?php
			}
			?></td>
			<td>
				<a href="">Modify</a>
				<a href="">Delete</a>
			</td>
		</tr>

		<?php 
		}
		?>
	</table>

	<br/><br/> <!-- This is the separator -->
	
	<!-- This is the Album !-->
	<table>Albums: <?php echo $c_alb; ?><a name="albums" class="anchor">&nbsp;</a>
		<tr>
			<th>ID</th>
			<th>Album ID</th>
			<th>Name</th>
			<th>Desckritption</th>
			<th>Operation</th>
		</tr>
	<?php
		while ($q_alb_row=$q_alb->fetch_assoc()) {
	?>	
		<tr>
			<td><a name="alb<?php echo $q_alb_row['gal_GalleryID']; ?>" class="anchor"><?php echo $q_alb_row['gal_GalleryID']; ?></a></td>
			<td><?php echo $q_alb_row['gal_AlbumID']; ?></td>
			<td><?php echo $q_alb_row['gal_Name']; ?></td>
			<td><?php echo $q_alb_row['gal_Description']; ?></td>
			<td>
				<a href="">Modify</a>
				<a href="">Delete</a>
			</td>
		</tr>
	<?php
		}
	?>
	</table>
	
	<br/><br/> <!-- This is the separator -->

	<!-- This is for Categories -->
	<table>Image Category: <?php echo $c_cat; ?><a name="categories" class="anchor">&nbsp;</a>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Description</th>
			<th>Operation</th>
		</tr>
	<?php 
		while ($q_cat_row=$q_cat->fetch_assoc()) {
	?>
		<tr>
			<td><a name="cat<?php echo $q_cat_row['cat_CategoryID']; ?>" class="anchor"><?php echo $q_cat_row['cat_CategoryID']; ?></a></td>
			<td><?php echo $q_cat_row['cat_CategoryName']; ?></td>
			<td><?php echo $q_cat_row['cat_CategoryDescription']; ?></td>
			<td>
				<a href="">Modify</a>
				<a href="">Delete</a>
			</td>
		</tr>
	<?php
		}
	?>
	</table>
	</div>
</div>

<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
</body>

</html>

<?php
}
else {
header ('Location:login.php');
}
?>