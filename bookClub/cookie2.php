<?php
@ob_start();
session_start();

if (isset($_COOKIE['counter']))
    $count = $_COOKIE['counter'];
else
    $count = 0;

$count = $count + 1;
setcookie('counter', $count, time() + 24 * 3600, '/', 'localhost', false);
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Counting with a cookie</title>
    </head>
    <body>
        <FORM action="cookie2.php" method="GET">
            <INPUT type="submit" name="Count" value="Count">
            <?php
            echo "count is $count";
            ?>
        </FORM>
    </body>
</html>