<?php
//Require Head
require ('resources/includes/head.php');

//Require Header
require ('resources/views/header.php');

//Require Comments
require ('resources/includes/comments.php');

navigation($header);

//Content
foreach ($model as $key => $value) {
if ($value['slug'] == $post) {

?>
<div class="content">
    <h2><?php echo $value['title']; ?></h2>
    <p class="author">Författare: <?php echo $value['author']; ?></p>
    <p class="date">Datum: <?php echo $value['date']; ?></p>
    <p class="message"><?php echo $value['message']; ?></p>

<h3>Kommentarer</h3>
        <?php
        foreach ($comments as $key => $value) {
        ?>
    <div class="comments">
        <p class="author">Användarnamn: <?php echo $value['author']; ?></p>
        <p class="date">Datum: <?php echo $value['date']; ?></p>
        <p class="message"><?php echo $value['text']; ?></p>
    </div>
    <?php
     }
    ?>
</div>

<?php
}
}



//Inlcude Footer
require ('resources/views/footer.php');
?>
