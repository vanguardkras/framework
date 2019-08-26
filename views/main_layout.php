<!DOCTYPE html>
<html>
    <head>
        <title>MShaian</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="<?= $description ?>" />
        <meta name="keywords" content="<?= $keywords ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link type="text/css" rel="stylesheet" href="/css/main.css" />
        <script src="js/functions.js"></script>
    </head>
    <body>
        <div id="background"></div>
        <h3>MSHAIAN.COM</h3>
        <menu>
            <li><a href="/">Projects</a></li>
            <li><a href="/downloads">Download</a></li>
            <li><a href="/blogs">Blog</a></li>
            <li><a href="/about">About me</a></li>
        </menu>
        <div class="feedback">
            Contact form
        </div>
        <form name="feedback" action="" method="post">
            <h2>Contact form</h2>
            Your e-mail: <input type="email" name="email" placeholder="your@email.com" required>
            <p>Your message:</p>
            <textarea name="message" placeholder="Type your message here." required></textarea>
            <p><input type="submit" name="send" value="Send"></p>
        </form>
        <h1><?= $title ?></h1>
        <?= $content ?>
        <div class="footer">
            &copy;SHAIAN
        </div>
    </body>
</html>
