<?php
// Include Meta
require ('resources/includes/head.php');

// Include Header
require ('resources/views/header.php');

navigation($header);

// Old way from Beginning
//echo $content;

// Content - New way for Blogging
echo '<div class="content">';
echo '<h2>Alla blogginlägg</h2>';
//echo $error;

foreach ($model as $key => $value) {

?>
    <div class="post">
        <h3><?php echo $model[$key]['title']; ?></h3>
        <p class="author">Författare: <?php echo $model[$key]['author']; ?></p>
        <p class="date">Datum: <?php echo $model[$key]['date']; ?></p>
        <p class="message">Här kommer själva inlägget men inte i sin helhet...
            <a href="index.php?page=blogg&post=<?php echo $model[$key]['slug']; ?>">Läs mer</a></p>
    </div>
<?php
}
echo '</div>';



// Inlcude Footer
require ('resources/views/footer.php');
?>
