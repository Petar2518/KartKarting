<?php class Sport {

public $sportID = 0;
public $naziv = '';

public static function vratiSve($mysqli){
    $result =$mysqli->query('SELECT * FROM sport');

    $sportovi = array();

    while($row = $result->fetch_assoc()) {

        $sport = new Sport();
        $sport->sportID= $row['sportID'];
        $sport->naziv = $row['naziv'];


        array_push($sportovi, $sport);
    }

    return $sportovi;
}

} ?>
