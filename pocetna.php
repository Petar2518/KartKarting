<?php

    include('config/konekcija.php');

    if(isset($_GET['user'])) {  // getting the user that is logged in 
        $username = mysqli_real_escape_string($mysqli, $_GET['user']);  // setting the user
    }



?>
<!DOCTYPE html>
<html>
	<body>


      <?php include 'design/header-ulogovan.php'; ?>

		
			<div class="container">
          <h1 align=center> Zakazani termini </h1>
          <div id="ponuda">
          </div>
			</div>
		</div>
		<?php include 'design/footer.php'; ?>


	</div>

	</div>



	<script src="js/jquery.min.js"></script>






  <script>
    function vratiPodatke(){
      var zahtev = $.ajax({
          url: "kontroler.php",
          method: "GET",
          data: { opcija : 'termin' }
          });

        zahtev.done(function( json ) {
          var nalepi='<table class="table table-hover">';
          nalepi+='<thead>';
          nalepi+='<tr>';
          nalepi+='<th>Naziv sporta</th>';
          nalepi+='<th>Trajanje</th>'; 
          nalepi+='<th>Rezervisao</th>';
          nalepi+='<th>Datum Rezervacije</th>';
          nalepi+='<th>Cena termina</th>';

          nalepi+='</tr>';
          nalepi+='</thead>';
          nalepi+='<tbody>';

          $.each($.parseJSON(json), function(idx, obj) {
                  nalepi+='<tr>';
                 
                  nalepi+='<td>'+obj.sport.naziv+'</td>';
                  nalepi+='<td>'+obj.trajanje.trajanje+'</td>'; 
                  nalepi+='<td>'+obj.rezervisao+'</td>';
                  nalepi+='<td>'+obj.datumRezervacije+'</td>';
                  nalepi+='<td>'+obj.cena+'</td>';
                  nalepi+='</tr>';
              });

          nalepi+='</tbody>';
          nalepi+='</table>';

          $("#ponuda").html(nalepi);

        });

    }

  </script>
  <script>
    vratiPodatke();

  </script>

	</body>
</html>