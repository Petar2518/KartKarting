<?php

    include('config/konekcija.php');

    session_start();
    $username=$_SESSION['name'];
    



?>
<!DOCTYPE html>
<html>
    
<?php include 'design/header-ulogovan.php'; ?>	
	<link rel="stylesheet" href="css/icomoon.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
  
	<body>


      

		
		<div class="container">
          <h1 align=center> Upravljanje terminima </h1>
          
          <button class="btn btn-primary" onclick="vratiPodatke('asc')" >Sortiraj rastuce</button>
          <button class="btn btn-primary" onclick="vratiPodatke('desc')" >Sortiraj opadajuce</button>
          <div id="ponuda">  
        </div>
			</div>
		</div>
		<?php include 'design/footer.php'; ?>


	</div>

	</div>



	<script src="js/jquery.min.js"></script>





  <script>
    function vratiPodatke(sort){
      var zahtev = $.ajax({
          url: "kontroler.php",
          method: "GET",
          data: { opcija : 'sort' , sort: sort }
          });

        zahtev.done(function( json ) {
            var nalepi='<table class="table table-hover">';
          nalepi+='<thead>';
          nalepi+='<tr>';
          nalepi+='<th>Rezervisao</th>';
          nalepi+='<th>Trajanje</th>';
          nalepi+='<th>Sport</th>';
    nalepi+='<th>Datum rezervacije</th>';
          
          nalepi+='<th>Cena</th>';
          nalepi+='<th>Izmeni</th>';
          nalepi+='<th>Obrisi</th>';
          nalepi+='</tr>';
          nalepi+='</thead>';
          nalepi+='<tbody>';

          $.each($.parseJSON(json), function(idx, obj) {
                  nalepi+='<tr>';
                  nalepi+='<td>'+obj.rezervisao+'</td>';
                  nalepi+='<td>'+obj.trajanje.trajanje+'</td>';
                  nalepi+='<td>'+obj.sport.naziv+'</td>';
                  nalepi+='<td>'+obj.datumRezervacije+' </td>';
                  nalepi+='<td>'+obj.cena+' din </td>';
                  
                  nalepi+='<td><a href="izmeni.php?id='+obj.terminID+'&cena='+obj.cena+'" class="btn btn-info"><i class="icon-refresh2"></i></a></td>';
                  nalepi+='<td><a href="obrisi.php?id='+obj.terminID+'" class="btn btn-danger"><i class="icon-trash2"></i></a></td>';
               
                  nalepi+='</tr>';
              });

          nalepi+='</tbody>';
          nalepi+='</table>';

          $("#ponuda").html(nalepi);

        });

    }

  </script>
  <script>
    vratiPodatke('asc');

  </script>

	</body>
</html>
