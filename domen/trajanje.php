<?php class Trajanje {

public $rb = 0;
public $trajanje = '';


public static function vratiSve($mysqli){
    $rezultat = $mysqli->query('SELECT * FROM trajanje');

    $trajanja = array();

    while($row = $rezultat->fetch_assoc()) {

        $trajanje = new Trajanje();
        $trajanje->rb= $row['rb'];
        $trajanje->trajanje  = $row['trajanje'];

        array_push($trajanja, $trajanje);
    }

    return $trajanja;
}

} ?>
