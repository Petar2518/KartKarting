<?php class Termin {

public $terminID = 0;
public $trajanje = 0;
public $sport = 0;
public $rezervisao = '';
public $datumRezervacije = null;
public $cena = 0;

public static function vratiSve($mysqli)
{
    $result = $mysqli->query('SELECT * FROM termin2 t join sport s on t.sportID=s.sportID join trajanje tr on t.rb=tr.rb '); 

    $termini = array();
    while($row = $result->fetch_assoc()) {
        $sport = new Sport();
        $sport->sportID= $row['sportID'];
          $sport->naziv= $row['naziv'];

        $trajanje = new Trajanje();
        $trajanje->rb= $row['rb'];
        $trajanje->trajanje  = $row['trajanje'];
        


        $termin = new Termin();
        $termin->terminID= $row['terminID'];
        $termin->trajanje= $trajanje;
        $termin->sport = $sport;
        $termin->rezervisao= $row['rezervisao'];
        $termin->datumRezervacije= $row['datumRezervacije'];
        $termin->cena  = $row['cena'];
        
            array_push($termini, $termin);
    }

    return $termini;
} 


public static function vratiSveSortirano($mysqli,$sort)
{
    $result = $mysqli->query('SELECT * FROM termin2 t join sport s on t.sportID=s.sportID join trajanje tr on t.rb=tr.rb  order by cena '.$sort); 

    $termini = array();
    while($row = $result->fetch_assoc()) {
        $sport = new Sport();
        $sport->sportID= $row['sportID'];
          $sport->naziv= $row['naziv'];

        $trajanje = new Trajanje();
        $trajanje->rb= $row['rb'];
        $trajanje->trajanje  = $row['trajanje'];
        


        $termin = new Termin();
        $termin->terminID= $row['terminID'];
        $termin->sport= $sport;
        $termin->trajanje= $trajanje;
        $termin->rezervisao= trim($row['rezervisao']);
        $termin->datumRezervacije= $row['datumRezervacije'];
        $termin->cena  = $row['cena'];
  

        array_push($termini, $termin);
    }

    return $termini;
}       

public static function sacuvaj($mysqli,$sport,$trajanje,$rezervisao,$datumRezervacije,$cena){
    
$sport = mysqli_real_escape_string($mysqli,$sport);
$trajanje = mysqli_real_escape_string($mysqli,$trajanje);
$rezervisao = mysqli_real_escape_string($mysqli,$rezervisao);
$datumRezervacije = mysqli_real_escape_string($mysqli,$datumRezervacije);
$cena = mysqli_real_escape_string($mysqli,$cena);

    $result = $mysqli->query("INSERT INTO termin2 (sportID, rb, rezervisao, datumRezervacije, cena)
        VALUES ('$sport', '$trajanje', '$rezervisao' ,'$datumRezervacije', '$cena')");

    if ($result > 0) return true; else return false;
}
public static function izmeni($mysqli,$cena,$id){
$cena = mysqli_real_escape_string($mysqli,$cena);


$sql="UPDATE termin2 SET cena=".$cena." where terminID=".$id;
    $result = $mysqli->query($sql);

    return true;
}

public static function obrisi($mysqli,$id){

    $result = $mysqli->query("DELETE FROM termin2 where terminID=".$id);

    return true;
}

} ?>