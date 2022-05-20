<?php

    include('config/konekcija.php');

   

    $korisnik=$_SESSION['name'];

?>


<head>
<title>Karting Kart</title>
<link rel="icon" href="images/logo.jpg">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style type="text/css">
        
        .header {
            background-color: #4797ca;
        }
        .brand {
            background: #228B22 !important;
        }
        .brand-text {
            color: #FFA500 !important;
        }
        .form {
            padding: 20px;
            margin-left: 12.5%;
            width: 75%;
            text-align: center;
        }
        .navul {
            margin-right: 25px;
        }
        .logo {
            width: 100px;
            margin: 40px auto -30px;
            display: block;
            position: relative;
            top: -30px;
        }
        .dets {
            padding-bottom: 20px;
        }
    </style>
</head>
<body class="green lighten-4">

    
    <nav class="blue header z-depth-0">
        <div class="container">
            
        <a href="pocetna.php" class="brand-logo brand-text">KartKarting</a>
            <ul id="nav-mobile" class="right hide-on-small-and-down navul">
            <li style="color:White" ><?php echo $korisnik; ?></li>
                <li><a href="dodavanje.php" class="btn brand z-depth-0">Dodaj termin</a></li>
                <li><a href="upravljanje.php" class="btn brand z-depth-0">Izmeni termine</a></li>
                <li><a href="login.php" class="btn brand z-depth-0">Logout</a></li>
            </ul>
        </div>
    </nav>
