<?php

//Give Active Navigation the class="highligt"
function navigation($highlight) {
    $start = '';
    $kontakt = '';
    $blogg = '';
    $profil = '';


    if($highlight == 'Start') {
        $start = 'class="highlight"';
    }
    elseif($highlight == 'Kontakt') {
        $kontakt = 'class="highlight"';
    }
    elseif($highlight == 'Blogg') {
        $blogg = 'class="highlight"';
    }
    elseif($highlight == 'Profil') {
        $profil = 'class="highlight"';
    }

    echo '
        <nav>
            <ul>
                <li><a ' . $start . ' href="index.php">Start</a></li>
			    <li><a ' . $blogg . ' href="index.php?page=blogg">Blogg</a></li>
			    <li><a ' . $kontakt . ' href="index.php?page=kontakt">Kontakt</a></li>
                <li><a ' . $profil . ' href="index.php?page=profil">Profil</a></li>
		    </ul>
	    </nav>';
}

//Function for Copyright
function echoYear(){
    $year = date('Y');

    if ($year == 2017) {
        echo 'copyright 2017';
    }
    else {
        echo 'copyright 2017-' . $year;
    }
}

function shorttext($text){
    $shorttext = implode(' ', array_slice(explode(' ',$text),0,10));

    echo $shorttext;
}

?>
