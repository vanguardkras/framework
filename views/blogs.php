<?php foreach ($list as $l) { ?>

<div class="element">
    <h2><?= $l['header'] ?></h2>
    <p class="date"><?= $l['publish_date'] ?></p>
    <div class="preview"><?= $l['preview'] ?></div>
    <p class="right"><a href="/blog/<?= $l['id'] ?>">Continue...</a></p>
</div>
<?php } ?>
<div class="paginator"><?= $paginator ?></div>

