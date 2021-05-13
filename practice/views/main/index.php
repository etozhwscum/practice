<?php

foreach ($data as $row) {
    ?>
    <div class="item-container">
        <br>
        <h3><?= $row['title']?></h3><br>
        <p><?= $row['text']?></p>
    </div>
    <?php
}