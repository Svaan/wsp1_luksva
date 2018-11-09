<?php
//Include Meta
require ('resources/includes/head.php');

//Include Header
require ('resources/views/header.php');

navigation($header);

//Content
foreach ($model as $key => $value) {
if ($model[$key]['slug'] == $post) {
    // code...

?>
<div class="content">
    <h2><?php echo $model[$key]['title']; ?></h2>
    <p class="author">Författare: <?php echo $model[$key]['author']; ?></p>
    <p class="date">Datum: <?php echo $model[$key]['date']; ?></p>
    <p class="message"><?php echo $model[$key]['text']; ?></p>

</div>

<?php
}
}
//Inlcude Footer
require ('resources/views/footer.php');
?>
