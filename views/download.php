<div class="content">
<?php foreach($downloads as $d) { ?>
    <div class="element">
        <ul>
            <li>
                <a href="/downloaded/<?= $d['id'] ?>">
                    <h4><?= $d['name'] ?></h4>
                </a>
            </li>
        </ul>
    </div>
<?php } ?>
</div>