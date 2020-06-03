<?php
header('Content-Type: text/html; charset=UTF-8');

$can = false;
if (isset($_COOKIE['PHPSESSID'])) {
    $ssid = $_COOKIE['PHPSESSID'];
    $db = new SQLite3("db/db.sqlite");
    $sql = "SELECT userid FROM users WHERE ssid='$ssid'";
    $result = $db->query($sql);

    echo $ssid;
    if ($result->fetchArray()['userid'] != '') {
        $can = true;
        $userid = $result->fetchArray()['userid'];
    }
}

if (!$can) {
    #header("Location:login.php");
}

$userid = $_COOKIE['userid'];
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
