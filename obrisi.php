<?php
include 'config/konekcija.php';
include 'domen/sport.php';
include 'domen/trajanje.php';
include 'domen/termin.php';

  Termin::obrisi($mysqli,$_GET['id']);

  header("Location: pocetna.php");


 ?>
