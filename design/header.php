<head>
    <title>Karting Kart</title>
    <link rel="icon" href="images/logo.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style type="text/css">
        /* CSS */
        .header {
            background-color: #4797ca;
        }
        .brand {
            background: #228B22 !important;
        }
        .brand-text {
            color: #FFA500 !important;
        }
        .credentials {
            padding: 20px;
            margin-left: 12.5%;
            width: 75%;
            text-align: center;
        }
        .navul {
            margin-right: 75px;
        }
        .login {
            margin-top: 40px;
        }
        .logo {
            width: 100px;
            margin: 40px auto -30px;
            display: block;
            position: relative;
            top: -30px;
        }
    </style>
</head>

<!-- HTML HEADER -->

<body class="grey lighten-4">
    <!-- navigation menu -->
    <nav class="blue header z-depth-0">
        <div class="container">
            <a href="<?php echo $_SERVER['PHP_SELF'] ?>" class="brand-logo brand-text">KartKarting</a>
        </div>
        <ul id="nav-mobile" class="right hide-on-small-and-down navul">
            <li><a href="index.php" class="btn brand z-depth-0">Register</a></li>
            <li><a href="login.php" class="btn brand z-depth-0">Login</a></li>
        </ul>
    </nav>