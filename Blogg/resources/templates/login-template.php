<?php
include ('resources/includes/head.php');

include ('resources/views/header.php');

require ('resources/includes/model.php');

navigation($header);
echo '<div class="content">';
echo $error;
echo $content;
?>
<div class="login">
    <form method="post">
        <input type="text" name="username" placeholder="Username">
        <br>
        <input type="password" name="password" placeholder="Lösenord">
        <br>
        <button type="submit" name="login-submit">Logga in</button>
        <br>
    </form>
    <a href="?page=signup">Skapa konto</a>
    <form action="index.php" method="post">
        <button type="submit" name="logout-submit">Logga ut</button>
    </form>
</div>
</header>
<?php
echo '</div>';
include ('resources/views/footer.php');
?>
