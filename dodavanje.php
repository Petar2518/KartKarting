<?php include 'config/konekcija.php'; 
if(isset($_GET['user'])) {   
        $username = mysqli_real_escape_string($mysqli, $_GET['user']);  
    }

    ?>
    
<!DOCTYPE html>
 <html >
	<head>
	
	<link rel="stylesheet" href="css/bootstrap.css">

<link rel="shortcut icon" type="image/x-icon" href="https://www.formula1.com/etc/designs/fom-website/favicon.ico">

	<script src="js/modernizr-2.6.2.min.js"></script>

	</head>
	<body>
		<div id="glavni-wrapper">
		<div id="glavni-page">
		<div id="glavni-header">

      <?php include 'design/header-ulogovan.php'; ?>

      <section class="container grey-text">
      <h4 class="center">Dodaj termin</h4>
          <form method="POST" action="dodaj.php">
          <input type="hidden" name="username" id="username" value=<?php echo $username?>>
            <label for="rezervisao">Rezervisano na ime</label>
            <input type="text" class="form-control" placeholder="Ime i prezime" name="rezervisao" id="rezervisao">
            <label for="datumRezervacije">Datum rezervacije</label>
            <input type="date" class="form-control" name="datumRezervacije" id="datumRezervacije">
            <label for="cena">Cena</label>
            <input type="number" class="form-control" placeholder="Unesite cenu termina" name="cena" id="cena">
            <label for="sport">Sport</label>
            <select class="form-control"name="sport" id="sport">
            </select>
            <label for="trajanje">Trajanje termina</label>
            <select class="form-control"name="trajanje" id="trajanje">
            </select>
            <label for="dugme"></label>
            <input type="submit" class="form-control btn-primary" name="sacuvaj" id="dugme" value="Sacuvaj">
            
          </form>
			
		<?php include 'design/footer.php'; ?>


	</div>

	</div>



	<script src="js/jquery.min.js"></script>

  <script>
    function popuniSport(){
      var zahtev = $.ajax({
          url: "kontroler.php",
          method: "GET",
          data: { opcija : 'sport' }
          });

        zahtev.done(function( json ) {
          var nalepi='';


          $.each($.parseJSON(json), function(idx, obj) {
                  nalepi += '<option value="'+obj.sportID+'">'+obj.naziv+'</option>';
              });
          $("#sport").html(nalepi);

        });

    }

  </script>
  <script>
    function popuniTrajanje(){
      var zahtev = $.ajax({
          url: "kontroler.php",
          method: "GET",
          data: { opcija : 'trajanje' }
          });

        zahtev.done(function( json ) {
          var nalepi='';


          $.each($.parseJSON(json), function(idx, obj) {
                  nalepi+='<option value="'+obj.rb+'">'+obj.trajanje+'</option>';
              });
          $("#trajanje").html(nalepi);

        });

    }

  </script>
  <script>
    popuniSport();
    popuniTrajanje();
  </script>

	</body>
</html>
