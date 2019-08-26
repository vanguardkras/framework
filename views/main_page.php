<div class="content">
    <?php foreach ($products as $p) { ?>
        <div>
            <div class="element">
                <h2><?= $p['name'] ?></h2>
                <img src="<?= $p['picture_link'] ?>">
                <p>
                    <?= $p['description'] ?>
                </p>
            </div>
            <div class="element links">
                <a href="/doc/<?= $p['doc_link'] ?>/">Documentation</a>
                <a href="/downloaded/<?= $p['id'] ?>">Download</a>
                <a target="_blank" href="<?= $p['github_link'] ?>">GitHub</a>
                <a target="_blank" class="special" href="purchase/<?= $p['id'] ?>">
                    <?= $p['purchase_button_text'] ?> ($<?= $p['price'] ?>)
                </a>
            </div>
        </div>
    <?php } ?>
</div>