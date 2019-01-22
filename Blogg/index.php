<?php
/*
This is my solution for the laboration that Niklas Mårdby share on his wiki Porkforge.
I've used this laboration to show my pupils how you can work with PHP in developement.
http://porkforge.mardby.se/index.php?title=PHP_Laboration_2_-_Projektstart,_require_och_GET
*/

// We tell the page to require a file called view
require ('resources/includes/view.php');

require ('resources/includes/model.php');

// if($users->is_logged_in() ){ header('Location: ?page=profil'); }

// Set header correct without using HTML
header("Content-type: text/html; charset=utf-8");

$error = ' ';
$content = ' ';

// Get value from url for key page
$page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_URL);

if(empty($page)) {
	$header = 'Start';
    $content = 'Välkommen till Labb 2! Här övar vi på PHP för att bli duktiga webbserverprogrammerare. Detta är andra labben men första labben i en serie labbar som tillsammans bygger vidare på detta projekt som vi påbörjar här. Ett enkelt PHP-projekt men väl strukturerat och genomtänkt konstruerat.';
    require ('resources/templates/page-template.php');
}
elseif($page == "blogg") {
    $header = 'Blogg';
	$post = filter_input(INPUT_GET, 'post', FILTER_SANITIZE_URL);
	$template = 'all-blog-posts';


	if (!empty($post)) {
		foreach ($model as $key => $value) {
			if ($model[$key]['slug']) {
			$template = 'single-blog-post';
			$title = $model[$key]['title'];
			$author = $model[$key]['author'];
			$date = $model[$key]['date'];
			$message = $model[$key]['message'];
		}

		else {
			$error = 'Inlägget existerar inte längre';
		}
		}
	}

	elseif (empty($post)) {
	}

	require ('resources/templates/'. $template .'-template.php');

	}


elseif($page == "profil") {
	$header = 'Login';
	$content = 'Logga in!';
	// if(isset) {
	// 	// code...
	// }
	require ('resources/templates/login-template.php');

}

elseif($page == "signup") {
	$header = 'Signup';
	$content = 'Skapa konto!';
	// if(isset) {
	// 	// code...
	// }
	require ('resources/templates/skapa-konto-template.php');

}

elseif($page == "kontakt") {
	$header = 'Kontakt';
    $content = 'Du når oss på epost@labb2.se';
    require ('resources/templates/page-template.php');
}
else {
	echo "Den sökta sidan finns inte";
}


?>
