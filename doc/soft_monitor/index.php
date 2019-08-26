<?php
    $browser_lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    $lang = $browser_lang == 'ru' ? 'ru' : 'en';
    if (isset($_POST['change_lang'])) {
        $lang = $_POST['lang'];
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Soft Monitor</title>
        <script src="js/functions.js"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
        <meta name="description" content="Soft monitor documentation." >
        <link type="text/css" rel="stylesheet" href="css/main.css" >
    </head>
    <body>
        <form action="" method="post">
            <select name="lang">
                <option value="en">English</option>
                <option value="ru">Русский</option>
            </select>
            <input type="submit" name="change_lang" Value="Change">
        </form>
<?php
    include_once 'doc_' . $lang . '.php';
?>
        <div class="footer">
            <h3>SNMP Soft monitoring system.</h3>
            <p>Software product. &copy;SHAIAN</p>
        </div>
    </body>
</html>

