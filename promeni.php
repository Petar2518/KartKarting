<?php
include 'config/konekcija.php';
include 'domen/sport.php';
include 'domen/trajanje.php';
include 'domen/termin.php';


  $id = trim($_POST['id']);
  $cena = trim($_POST['cena']);

 Termin::izmeni($mysqli,$cena,$id);

  header("Location: pocetna.php");


 ?>