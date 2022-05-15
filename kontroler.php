<?php
  include 'config/konekcija.php';
  include 'domen/sport.php';
  include 'domen/trajanje.php';
  include 'domen/termin.php';

  if(isset($_GET['opcija'])){

      if($_GET['opcija'] == 'termin'){
          echo json_encode(Termin::vratiSve($mysqli));
      }

  }

 ?>
