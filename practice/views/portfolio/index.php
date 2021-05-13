<div class="portfolio">
    <h1>Portfolio</h1><br>
    <div class="current_port">
        <?php foreach ($data as $row) : ?>
        <h3 class="portfolio__title"><?=$row['title']?></h3>
        <p class="portfolio__description"><?=$row['text']?></p>
        <?php endforeach; ?>
    </div> 
</div>