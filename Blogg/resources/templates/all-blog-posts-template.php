<?php
// Require head
require ('resources/includes/head.php');

// Require Header
require ('resources/views/header.php');

navigation($header);

// Content - New way for Blogging
echo '<div class="content">';
echo '<h2>Alla blogginlägg</h2>';
?>
<form class="search" method="POST">
    <input type="text" name="text" placeholder="Söka Inlägg">
    <input type="radio" name="orderby" value="ASC" checked="checked"> Stigande
    <input type="radio" name="orderby" value="DESC"> Fallande
    <button type="submit" name="search">Sök</button>
</form>
<br>

<form class="skapa" method="post">
    <input type="text" name="username" placeholder="Användarnamn"><br>
    <input type="text" name="header" placeholder="Rubrik"><br>
    <textarea name="text" rows="8" cols="30" placeholder="Text"></textarea><br>
    <button type="button" name="SkapaInlagg">Skapa inlägg</button>

</form>
<br>

<?php


foreach ($model as $key => $value) {

?>
    <div class="post">
        <h3><?php echo $value['title']; ?></h3>
        <p class="author">Författare: <?php echo $value['author']; ?></p>
        <p class="date">Datum: <?php echo $value['date']; ?></p>
        <p class="message"><?php shorttext($value['message']); ?>...
            <a href="index.php?page=blogg&post=<?php echo $value['slug']; ?>">Läs mer</a></p>
    </div>
<?php
}
echo '</div>';



// Require Footer
require ('resources/views/footer.php');
?>
