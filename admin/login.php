
<?php
include ('inc_session.php');

if (($_SESSION['login']) == "1") {
	header ('Location:index.php');
}

?>

<html>
<head><title>MP Admin Login</title></head>
<body>

<h2>MP Admin Login</h2>
<?php
date_default_timezone_set('Asia/Manila');
echo date('M')." ".date('d').", ".date('Y')." - ".date('g').":".date('i')." ".date('A');
?>
&nbsp;&nbsp;<a href="../index.php">Back</a>
<hr/>

<?php
if (isset($_POST['txt_Username']) && !empty($_POST['txt_Username'])) {
	$username = $_POST['txt_Username'];
	$password = $_POST['txt_Password'];
	if (($username=="admin") && ($password=="Password0521!")) {
		$_SESSION['login'] = "1";
	}
	else {
?>
		<font color="red">Incorrect username or password.</font>
		<form name="frm_Login" method="POST" action="login.php">
		Username: <input type="text" name="txt_Username" maxlength="50" size="25" />			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		Password: <input type="password" name="txt_Password" maxlength="50" size="25" />		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="submit" value="Login" />
		<input type="reset" value="Clear" />
		</form>
		<hr/>
<?php	
	}
}
else {
?>
	<br/>
	<form name="frm_Login" method="POST" action="login.php">
	Username: <input type="text" name="txt_Username" maxlength="50" size="25" />			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	Password: <input type="password" name="txt_Password" maxlength="50" size="25" />		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="submit" value="Login" />
	<input type="reset" value="Clear" />
	</form>
	<hr/>
<?php
}
?>

</body>
</html>