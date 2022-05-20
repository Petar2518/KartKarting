<?php
include 'config/konekcija.php';
include 'domen/sport.php';
include 'domen/trajanje.php';
include 'domen/termin.php';


  $rezervisao = trim($_POST['rezervisao']);
  $sport = trim($_POST['sport']);
  $trajanje = trim($_POST['trajanje']);
  $datumRezervacije = trim($_POST['datumRezervacije']);
  $cena = trim($_POST['cena']);

  Termin::sacuvaj($mysqli,$sport,$trajanje,$rezervisao,$datumRezervacije,$cena);

  header("Location: pocetna.php");


 ?>