<?php
    
    include('config/konekcija.php');

    $username = $password = "";  
    $provera = array('username' => '', 'password' => '');  

    if(isset($_POST['submit'])) {  

       

        if(empty($_POST['username'])) {  
            $provera['username'] = "Neophodno je da unesete korisnicko ime! <br/>";  
        } else {
            $username = $_POST['username'];  
            $query = "SELECT * FROM korisnik WHERE username = '$username'";   
            $rezultat = mysqli_query($mysqli, $query);   
            $korisnici = mysqli_fetch_assoc($rezultat);    
            mysqli_free_result($rezultat);             
            mysqli_close($mysqli);                    
            
            if($korisnici == null) {  
                $provera['username'] = "Ne postoji korisnik sa ovim korisnickim imenom! <br/>";  
            } elseif (empty($_POST['password'])) {  
                $provera['password'] = "Niste uneli lozinku! <br/>"; 
            } else { 
                $password = $_POST['password'];  

                if(strcmp($password, $korisnici['password'])) {    
                    $provera['password'] = "Pogresna lozinka! <br/>";  
                } else {
                    session_start();    
                    $_SESSION['name'] = $_POST['username'];   
                    
                }
            }
        }


    }

?>



<!DOCTYPE html>
<html lang="en">

    <?php include('design/header.php'); ?>


    <section class="container grey-text">
        <h4 class="center">Login</h4>
        <form class="white credentials" action="" method="POST">
            <label for="">Korisnicko Ime:</label>
            <input type="text" name="username" value="<?php echo htmlspecialchars($username) ?>">
            <div class="red-text"><?php echo $provera['username']; ?></div>

            <label for="">Lozinka:</label>
            <input type="password" name="password" value="<?php echo htmlspecialchars($password) ?>">
            <div class="red-text"><?php echo $provera['password']; ?></div>

            <div class="center">
                <input type="submit" name="submit" value="LOGIN" class="btn brand z-depth-0 login">
            </div>
        </form>
    </section>

    <?php include('design/footer.php'); ?>

</html>