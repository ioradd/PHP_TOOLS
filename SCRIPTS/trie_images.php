<?php 

include 'functions.php';

$pdo = connect_pdo_mysql();

$stmt = $pdo->query('SELECT * FROM images ORDER BY uploaded_date DESC');

$images = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<a href="upload.php" class="upload-image">Upload Image</a>
<div>
    <?php foreach ($images as $image) :?>
    <?php if (file_exists($image['filepath'])) :?>
    <img src="<?=$image['filepath']?>" alt="<?=$image['description']?>" data-id="<?=$image['id']?>"
        data-title="<?=$image['title']?>" width="100" height="62">
    <span><?=$image['description']?></span>
    <br>
    <?php endif;?>
    <?php endforeach ;?>
</div>