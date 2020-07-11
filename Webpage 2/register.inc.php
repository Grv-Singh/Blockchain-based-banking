<?php
include_once 'db_connect.php';
include_once 'psl-config.php';
 
$error_msg = "";
 
if (isset($_POST['id'], $_POST['p'])) {
    // Sanitize and validate the data passed in
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
 
    $password = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);

    if (strlen($password) != 128) {
        // The hashed pwd should be 128 characters long.
        // If it's not, something really odd has happened
        $error_msg .= '<p class="error">Invalid password configuration.</p>';
    }
 
    // TODO: 
    // We'll also have to account for the situation where the user doesn't have
    // rights to do registration, by checking what type of user is attempting to
    // perform the operation.
 
    if (empty($error_msg)) {
 
        // Create hashed password using the password_hash function.
        // This function salts it with a random salt and can be verified with
        // the password_verify function.
        $password = password_hash($password, PASSWORD_BCRYPT);
 
        // Insert the new user into the database 
        if ($insert_stmt = $mysqli->prepare("INSERT INTO secure_login_db (id, password) VALUES (?, ?)")) {
            $insert_stmt->bind_param('ss', $id, $password);
            // Execute the prepared query.
            if (! $insert_stmt->execute()) {
                header('error.php?err=Registration failure: INSERT');
            }
        }
        header('register_success.php');
    }
}
?>

<html>
<head>
<title>
Register
</title>

//----------------------------------------------------------------------USER PROFILE PICTURE--------------------------------------------------------------
<script type="text/javascript">
if (window.FileReader) {
  //then your code goes here
} else {
  alert('This browser does not support FileReader');
}

document.getElementById('files').addEventListener('change', handleFileSelect, false);

function handleFileSelect(evt) {
        var files = evt.target.files;
        var f = files[0];
        var reader = new FileReader();

          reader.onload = (function(theFile) {
                return function(e) {
                  document.getElementById('cust_img').src=['"', e.target.result, '"'].join('');
                };
          })(f);

          reader.readAsDataURL(f);
}

</script>
</head>
<body>
<div id="add_div" style="background-color:red; ">
<br>
<br>
<center>
<table>
<th colspan=2>Add Customer Details</th>
<tr>
<td>
<font face="arial" style="color:white">&nbsp;Account Number&nbsp;</font><input id="acn" type="number" placeholder="7 digit Account no."/>
<br>
<font face="arial" style="color:white">&nbsp;Client Name&nbsp;</font><input id="clnt_name" type="text" placeholder="Name & Surname"/>
<font face="arial" style="color:white">&nbsp;Nominee Name&nbsp;</font><input id="nominee_name" type="text" placeholder="Name & Surname"/>
<br>
<font face="arial" style="color:white">&nbsp;Father Name&nbsp;</font><input id="father_name" type="text" placeholder="Name & Surname"/>
<font face="arial" style="color:white">&nbsp;Mother Name&nbsp;</font><input id="mother_name" type="text" placeholder="Name & Surname"/>
<br>
<font face="arial" style="color:white">&nbsp;Date Of Birth&nbsp;</font><input id="dob" type="date"/>
<form>
  <input type="radio" name="gender" value="male"> Male&nbsp;
  <input type="radio" name="gender" value="female"> Female&nbsp;
  <input type="radio" name="gender" value="other"> Other
</form>
<br>
<font face="arial" style="color:white">&nbsp;Address&nbsp;</font><input id="address" type="text" placeholder="Full Address"/>
<br>
<font face="arial" style="color:white">&nbsp;Email&nbsp;</font><input id="email" type="email"/>
<br>
<font face="arial" style="color:white">&nbsp;Contact&nbsp;</font><input id="contact" type="number"/>
<br>
<font face="arial" style="color:white">&nbsp;Pincode&nbsp;</font><input id="pincode" type="number"/>
<br>
<br>
</td>
<td valign="center">
<center>
<img src="" id="cust_img" alt="Customer Image" width="40px" height="40px"/>
<br>
<form action="index.php">
  <input type="file" id="files" name="Picture" accept="image/*">
  <input type="submit" value="Submit">
</form>
</center>
</td>
</tr>
<table>
</center>
</div>
</body>
</html>