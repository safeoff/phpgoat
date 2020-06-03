<?php
header('Content-Type: text/html; charset=UTF-8');
session_start();

if (isset($_POST['userid']) && isset($_POST['password'])) {
    $userid = $_POST['userid'];
    $passwd = $_POST['password'];
    $db = new SQLite3("db/db.sqlite");
    $sql = "SELECT count(*) FROM users WHERE userid='$userid' AND password='$passwd'";
    $result = $db->query($sql);

    if ($result->fetchArray()['count(*)'] > 0) {
        setcookie('userid', $userid);
        $ssid = $_COOKIE['PHPSESSID'];
        $sql = "UPDATE users SET ssid='$ssid' WHERE userid='$userid'";
        echo $sql;
        $db->exec($sql);
        #header("Location:mypage.php");
    } else {
        echo 'user ID or password is incorrect.';
    }
} else {
    echo 'Please login';
}

?>
<html>
<body>
<form action='' method='POST'>
user ID:<br><input type='text' name='userid'><br>
password:<br><input type='password' name='password'><br>
<input type='submit' value='login'>
<?php phpinfo(); ?>
</body>
</html>
