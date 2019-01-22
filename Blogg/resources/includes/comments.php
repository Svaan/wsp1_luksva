<?php
//Require databas connections
require ('resources/includes/db_conn.php');

if ($pdo) {
    $comments = array();

    $sql = 'SELECT c.ID, u.Username, c.Creation_time, c.Text FROM Comments AS c JOIN Users AS u ON u.ID = c.User_ID WHERE Post_ID = (SELECT ID FROM Posts WHERE Slug ="' . $post . '") ORDER BY c.Creation_time DESC';

foreach($pdo->query($sql) as $com) {
    $comments += array(
        $com['ID'] => array(
            'author' => $com['Username'],
            'date' => $com['Creation_time'],
            'text' => $com['Text']
        )
    );
}
}
?>
