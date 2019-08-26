<div class="content">
    <div class="element">
        <h2><?= $about['name'] ?></h2>
        <img class="about_me" src="<?= $about['photo_link'] ?>">
        <p>
            <?= $about['description'] ?>
        </p>
        <div class="contacts">
            <p>
                E-mail: <a href="mailto:<?= $about['email'] ?>"><?= $about['email'] ?></a>
            </p>
            <p>
                Telegram: <a href="https://t.me/<?= $about['telegram'] ?>" target="_blank">@<?= $about['telegram'] ?></a>
            </p>
            <p>
                Skype: <a href="skype:<?= $about['skype'] ?>?userinfo"><?= $about['skype'] ?></a>
            </p>
            <p>
                Phone: <?= $about['phone'] ?>
            </p>
        </div>
    </div>
</div>