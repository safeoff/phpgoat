<?php
header('Content-Type: text/html; charset=UTF-8');
session_start();

if (!isset($_SESSION['userid'])) {
    header("Location:login.php");
}

?>
<html>
<body>
<form action='' method='POST'>
    <input type='text' name='text'>
    <input type='submit' value='submit'>
</form>
<?php 

$text = $_POST['text'];
print <<< EOF
$text
EOF;
?>
