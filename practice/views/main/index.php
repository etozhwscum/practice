<?php

foreach ($data as $row) {
    ?>
    <div class="item-container">
        <h3><?= $row['title']?></h3>
        <p><?= $row['text']?></p>
    </div>
    <?php
}