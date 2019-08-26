<div class="purchase">
    <?php foreach ($data as $d) { ?>
        <div class="element">
            <table>
                <?php foreach ($d['data'] as $key => $data) { ?>
                    <tr>
                        <td><?= $key ?>: </td>
                        <td><?= $data ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td>Price:</td>
                    <td class="green_font"><?= $d['price'] ?></td>
                </tr>
            </table>
            <?= $d['form'] ?>
        </div>
    <?php } ?>
</div>
<p class="center dark_blue_font">
    If you have any questions or suggestions. 
    Please, use the contact form on this site.
</p>
<p class="center dark_blue_font">
    During purchase process, input your email for receiving the product.
</p>

