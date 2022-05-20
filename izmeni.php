<?php include 'config/konekcija.php'; 

session_start();

    ?>
    
<!DOCTYPE html>
 <html >
	<head>
	<?php include 'design/header-ulogovan.php'; ?>	
	<link rel="stylesheet" href="css/icomoon.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="js/modernizr-2.6.2.min.js"></script>
	</head>
	<body>
  <div id="glavni-wrapper">
		<div id="glavni-page">
		<div id="glavni-header">
      	<section class="container grey-text">
		  <h1 class="naslov text-center"> Izmeni cenu termina </h1>
          <form method="POST" action="promeni.php">

           <label for="id"></label>
            <input type="hidden" class="form-control"  name="id" id="id" value="<?php echo $_GET['id']; ?>">

            <label for="cena">Cena termina</label>
            <input type="cena" class="form-control" value="<?php echo $_GET['cena']; ?>"  name="cena" id="cena">

            <label for="dugme"></label>
            <input type="submit" class="form-control btn-primary" name="izmeni" id="dugme" value="Izmeni">
          </form>
			
		<?php include 'design/footer.php'; ?>


	</div>

	</div>

  
	</body>
</html>
