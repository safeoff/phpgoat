<?php
if (isset($_POST['logout'])) {
    $_SESSION = array();
    setcookie('PHPSESSID', '', time()-1800, '/');
    session_destroy();
    header("Location:login.php");
}

header('Content-Type: text/html; charset=UTF-8');
session_start();

if (!isset($_SESSION['userid'])) {
    header("Location:login.php");
}

$userid = $_SESSION['userid'];
?>
<html>
<body>
<form action='' method='POST'>
    <input type='hidden' name='logout'>
    <input type='submit' value='logout'>
</form>
<?php 
print <<< EOF
welcome $userid
EOF;
?>
<br><a href='xss1.php'>XSS practice 1</a>
</body>
</html>
