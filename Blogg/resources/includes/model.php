<?php
//Require databas connections
require ('resources/includes/db_conn.php');


if($pdo) {
    $model = array();

    $sql = 'SELECT Posts.ID AS ID, Slug, Headline, Username, Creation_time, Text AS Message FROM Posts JOIN Users ON Posts.User_ID = Users.ID';
    $sql2 = 'SELECT * FROM Users';

    $order = 'ASC';
    $text = '';


    if(isset($_POST['search'])) {
        $text = $_POST['text'];
        $order = $_POST['orderby'];

        if (!empty($text)) {
            // Lägg till LIKE och $text i slutet av $sql
            $sql .= ' WHERE Text LIKE "%' . $text . '%"';
        }

        // Lägg till vald sortering i slutet av $sql.
        $sql .= ' ORDER BY Creation_time ' . $order;
    }
    else {
        // Lägg till standard sortering i slutet av $sql
        $sql .= ' ORDER BY Creation_time ' . $order;
    }

    foreach($pdo->query($sql) as $row) {
        $model += array(
            $row['ID'] => array(
                'slug' => $row['Slug'],
                'title' => $row['Headline'],
                'author' => $row['Username'],
                'date' => $row['Creation_time'],
                'message' => $row['Message']
            )
        );
    }

} else {
print_r($pdo->errorInfo());
}

$login_error_message = '';
$register_error_message = '';

if (isset($_POST["login-submit"])){

    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username == "") {
            $login_error_message = 'Username field is required!';
        } else if ($password == "") {
            $login_error_message = 'Password field is required!';
        } else {
            $user_id = $app->Login($username, $password); // check user login
            if($user_id > 0)
            {
                $_SESSION['ID'] = $user_id; // Set Session
                header("Location: ?page=profil"); // Redirect user to the profile.php
            }
            else
            {
                $login_error_message = 'Invalid login details!';
            }
        }
    }




if (isset($_POST["signup-submit"])){
$conn = '';

    $First_name = $_POST["first_name"];
    $Last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $password_match = $_POST["password_match"];

    try {
        // set the PDO error mode to exception
        if (!$password == $password_match) {
            echo "Lösenordet matchar ej";
            return;
        }

        if ($result = $pdo->query("SELECT * FROM Users WHERE mail ='$_POST[mail]'"))
            {
                if (mysqli_num_rows($result) > 0)
                {
                    $error = "Epost-adressen är redan registrerad!";
                }
            }


        $sql2 = "INSERT INTO Users SET first_name='$First_name', last_name='$Last_name', email='$email', username='$username', password='$password'";
        // use exec() because no results are returned
        $conn->exec($sql2);
        echo "hahaha!";
        }
        catch(PDOException $e)
        {
        echo $sql . "<br>" . $e->getMessage();
        }
    $conn = null;

}

?>
