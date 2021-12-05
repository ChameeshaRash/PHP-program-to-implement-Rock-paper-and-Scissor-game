<?php // Do not put any HTML above this line

if ( isset($_POST['cancel'] ) ) {
    // Redirect the browser to game.php
    header("Location: $url/index.php");
    return;
}



$failure = false;  // If we have no POST data
//$salt = 'XyZzy12*_*';
$stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';

$salt = 'XyZzy12*_';

    


// Check to see if we have some POST data, if we do process it
if ( isset($_POST["who"]) && isset($_POST['pass']) ) {
   
//$stored_hash = 'a8609e8d62c043243c4e201cbb342862';
   
    $md5 = hash("md5", $salt . $_POST["pass"]);

    
    if ($md5 == $stored_hash) {
        header("Location: game.php?name=" . urlencode($_POST['who']));
        die();
    }
    if (strlen($_POST["who"]) < 1 || strlen($_POST['pass']) < 1) {
        $failure = "User name and password are required";
    } else {
        if ($_POST['who']!="who" || $_POST['pass']!="meow123" ) {
             $failure = "Incorrect password";
        }
        // $failure = "Incorrect password";
        // header("Location: login.php?name=" . urlencode($_GET['who']));
        
    }
}

// Fall through into the View
?>
<!DOCTYPE html>
<html>
<head>
<?php require_once "bootstrap.php"; ?>
<title>Chameesha Rashani</title>
</head>
<body>
<div class="container">
<h1>Please Log In</h1>
<?php
// Note triple not equals and think how badly double
// not equals would work here...
if ( $failure !== false ) {
    // Look closely at the use of single and double quotes
    echo('<p style="color: red;">'.htmlentities($failure)."</p>\n");
}
?>
<form method="POST">
<label for="nam">User Name</label>
<input type="text" name="who" id="nam"><br/>
<label for="id_1723">Password</label>
<input type="text" name="pass" id="id_1723"><br/>
<input type="submit" value="Log In">
<input type="submit" name="cancel" value="Cancel">
<input type="submit" name="play" value="Play">
</form>
<p>
For a password hint, view source and find a password hint
in the HTML comments.
<!-- Hint: The password is the three character programming language( first char p)
makes (all lower case) followed by 123. -->
</p>
</div>
</body>

