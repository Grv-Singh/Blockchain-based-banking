<?php
//----------------------------------------------------------------------SECURE LOGIN--------------------------------------------------------------
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
 
if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title> Cryptocurrency based Banking System </title>
        <link rel="stylesheet" href="styles/main.css" />
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script> 
		<meta name="description" content="Minor Project"></meta>
	    <meta charset="UTF-8">
		<link rel="icon" href="favicon.ico" type="image/ico" >
		
//----------------------------------------------------------------------SCRIPT TOO ENSURE THE VIEW OF TITLE--------------------------------------------------------------
<script type="text/javascript">
var titleText = document.title;
function titleMarquee() {
 titleText = titleText.substring(1, titleText.length) + titleText.substring(0, 1);
 document.title = titleText;
 setTimeout("titleMarquee()", 1000);
 }
</script>
    </head>
	
    <body onload="titleMarquee()">
        <?php
        if (isset($_GET['error'])) {
            echo '<p class="error">Error Logging In!</p>';
        }
        ?> 
//----------------------------------------------------------------------NAVIGATION--------------------------------------------------------------
<table width=100% style="box-shadow: 5px 5px grey;background-color:#7cfc00;font-family:verdana;border-radius:5px;">
<tr cellspacing="5px" colspan=4>
<td background="untitled.png">
<h1>CRYPTOCURRENCY BASED BANKING SYSTEM</h1>
</td>
<td>
<font size="10">
<a href="index.html" style="text-decoration:none;color:white">A B O U T</a>
</font>
</td>
<td>
<?php if (login_check($mysqli) == true) : ?>
<p>Welcome <?php echo htmlentities($_SESSION['username']); ?>!</p>
<?php else : ?>
            <p>
                <a href="index.php">Login</a>
            </p>
        <?php endif; ?>
</td>
<td>
<a href="register.php">Register</a>
</td>
<td>
<a href="index.php"><img id="refresh"  height="20px" width="20px" src="refresh.gif" alt="Refreshing.."/></a>
</td>
<td>
<a href="logout.php">Logout</a>
</td>
</table>
//--------------------------------------------------------Login DIV---------------------------------------------------------------------------
<div id="login_div" style="background-color:red; ">
<br>
<br>
<center>

<form action="includes/process_login.php" method="post" name="login_form">                      
            ID: <input type="text" name="id" />
            Password: <input type="password" name="password" id="password"  placeholder="Your Password"/>
            <input type="button" value="Login" onclick="formhash(this.form, this.form.password);" style="background-color:white; color:red; font-style:bold; box-shadow: 5px 10px;"/> 
</form>

</center>
<br>
<br>
</div>

</body>
</html>
?>
