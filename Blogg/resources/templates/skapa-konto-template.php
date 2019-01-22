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
        <input type="text" name="first_name" placeholder="Förnamn">
        <input type="text" name="last_name" placeholder="Efternamn">
        <br>
        <br>
        <input type="text" name="username" placeholder="Username">
        <input type="text" name="mail" placeholder="E-mail">
        <br>
        <br>
        <input type="password" name="password" placeholder="Lösenord">
        <br>
        <br>
        <input type="password" name="password_match" placeholder="Upprepa lösenord">
        <br>
        <button type="submit" name="signup-submit">Skapa konto!</button>
        <br>
    </form>
</div>
</header>
<?php
if(isset($_GET['action']) && $_GET['action'] == 'joined'){
  echo "<h2 class='bg-success'>Registration successful, please check your email to activate your account.</h2>";
}

include ('resources/views/footer.php');

//check for any errors
if(isset($error)){
  foreach($error as $error){
    echo '<p class="bg-danger">'.$error.'</p>';
  }
}

//if form has been submitted process it
if(isset($_POST['submit'])){}

if(strlen($_POST['username']) < 3){
    $error[] = 'Username is too short.';
} else {
    $stmt = $db->prepare('SELECT username FROM members WHERE username = :username');
    $stmt->execute(array(':username' => $_POST['username']));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if(!empty($row['username'])){
        $error[] = 'Username provided is already in use.';
    }

}

if(strlen($_POST['password']) < 3){
    $error[] = 'Password is too short.';
}

if(strlen($_POST['passwordConfirm']) < 3){
    $error[] = 'Confirm password is too short.';
}

if($_POST['password'] != $_POST['passwordConfirm']){
    $error[] = 'Passwords do not match.';
}

//email validation
if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    $error[] = 'Please enter a valid email address';
} else {
    $stmt = $db->prepare('SELECT email FROM Users WHERE email = :email');
    $stmt->execute(array(':email' => $_POST['email']));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if(!empty($row['email'])){
        $error[] = 'Email provided is already in use.';
    }

}
?>
