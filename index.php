<?php
    include('config/konekcija.php');  

    $ime = $prezime = $email = $username = $password = $confirmpass = $drzava = "";
    $provera = array('ime' => '', 'prezime' => '', 'email' => '',     
        'username' => '', 'password' => '' , 'confirmpass' => '', 'drzava' => '');  

    if(isset($_POST['submit'])) {     

        if(empty($_POST['ime'])) {     
            $provera['ime'] = "Niste uneli ime! <br/>";   
        } else {
            $ime = $_POST['ime'];     
            if(!preg_match('/^[a-zA-Z\s]+$/', $ime)) {   
                $provera['ime'] = 'Ime je uneto u pogresnom formatu!';  
            } 
        }

        if(empty($_POST['prezime'])) {  
            $provera['prezime'] = "Niste uneli prezime! <br/>";   
        } else {
            $prezime = $_POST['prezime'];   
            if(!preg_match('/^[a-zA-Z\s]+$/', $prezime)) {   
                $provera['prezime'] = 'Prezime je uneto u pograsnom formatu';   
            } 
        }

        if(empty($_POST['email'])) {  
            $provera['email'] = "Neophodno je da unesete email <br/>";   
        } else {
            $email = $_POST['email'];   
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {    
                $provera['email'] = 'Pogresno uneta email adresa!';   
            }
        }

        if(empty($_POST['username'])) { 
            $provera['username'] = "Neophodno je da unesete korisnicko ime! <br/>";   
        } else {
            $username = $_POST['username'];  

            $query = "SELECT * FROM korisnik WHERE username = '$username'";    
            $rezultat = mysqli_query($mysqli, $query);     
            $korisnici = mysqli_fetch_assoc($rezultat);       
            mysqli_free_result($rezultat);               
            
            if($korisnici != null) {    
                $provera['username'] = "Vec postoji korisnik sa unetim korisnickim imenom <br/>";   
            } 
        }

        if(empty($_POST['password'])) {   
            $provera['password'] = "Niste uneli sifru! <br/>";  
        } else {
            $password = $_POST['password'];  
            if(strlen($password) < 6) {     
                $provera['password'] = "Sifra mora da sadrzi makar 6 karaktera! <br/>";   
            }
        }

        if(empty($_POST['confirmpass'])) {  
            $provera['confirmpass'] = "Unesite vasu sifru ponovo!<br/>";   
        } else {
            $confirmpass = $_POST['confirmpass'];   
            if($confirmpass != $password) {     
                $provera['password'] = "Uneli ste razlicite sifre! <br/>";  
                $provera['confirmpass'] = "Uneli ste razlicite sifre! <br/>";  
            }
        }

        include('provera/drzave.php');

        if(empty($_POST['drzava'])) {  
            $provera['drzava'] = "Niste uneli drzavu!<br/>";  
        } else {
            $drzava = $_POST['drzava'];  
            if(!in_array($drzava, $lista_drzava)) {  
                $provera['drzava'] = "Uneta drzava ne postoji!"; 
            }
        }

       


       

        if(!array_filter($provera)) {     
            $ime = mysqli_real_escape_string($mysqli, $_POST['ime']);
            $prezime = mysqli_real_escape_string($mysqli, $_POST['prezime']);
            $email = mysqli_real_escape_string($mysqli, $_POST['email']);
            $username = mysqli_real_escape_string($mysqli, $_POST['username']);
            $password = mysqli_real_escape_string($mysqli, $_POST['password']);
            $drzava = mysqli_real_escape_string($mysqli, $_POST['drzava']);
           

            $query = "INSERT INTO korisnik(name, lastname, email, username, password, country)   
                VALUES ('$ime', '$prezime', '$email', '$username', '$password', '$drzava')";    

            if(mysqli_query($mysqli, $query)) {     
                header('Location: login.php');
            } else {
                echo 'query error: '.mysqli_error($mysqli);   
            }
        }

        
    

    }
?>

<!DOCTYPE html>

    <script>
        
        function showSuggestion(str="") {   
            if(str.length == 0) {  
                document.getElementById("outputCountry").innerHTML = "";
            } else {  
                
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {    
                    if(this.readyState == 4 && this.status == 200) {   
                        document.getElementById("outputCountry").innerHTML = this.responseText;  
                    }
                }
                xmlhttp.open("GET", "provera/drzave.php?zahtev="+str, true);    
                xmlhttp.send();  
            }
        }
    </script>



<html lang="en">
    <?php include('design/header.php'); ?>   
    
    <section class="container grey-text">
        <h4 class="center">Register</h4>
        
        <form class="white credentials" action="" method="POST">
            <label for="">Ime:</label>
            <input type="text" name="ime" value="<?php echo htmlspecialchars($ime) ?>">
            <div class="red-text"><?php echo $provera['ime']; ?></div>       

            <label for="">Prezime:</label>
            <input type="text" name="prezime" value="<?php echo htmlspecialchars($prezime) ?>">
            <div class="red-text"><?php echo $provera['prezime']; ?></div>

            <label for="">Email Adresa:</label>
            <input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
            <div class="red-text"><?php echo $provera['email']; ?></div>

            <label for="">Korisnicko Ime:</label>
            <input type="text" name="username" value="<?php echo htmlspecialchars($username) ?>">
            <div class="red-text"><?php echo $provera['username']; ?></div>

            <label for="">Lozinka:</label>
            <input type="password" name="password" value="<?php echo htmlspecialchars($password) ?>">
            <div class="red-text"><?php echo $provera['password']; ?></div>

            <label for="">Potvrdite lozinku:</label>
            <input type="password" name="confirmpass" value="<?php echo htmlspecialchars($confirmpass) ?>">
            <div class="red-text"><?php echo $provera['confirmpass']; ?></div>

            <label for="">Drzava:</label>
            <input type="text" name="drzava" value="<?php echo htmlspecialchars($drzava) ?>" onkeyup="showSuggestion(this.value)">
            <div class="red-text"><?php echo $provera['drzava']; ?></div>
            <p><span id="outputCountry"></span></p>
            
            <div class="center">
                <input type="submit" name="submit" value="Register" class="btn brand z-depth-0 login">
            </div>
        </form>
    </section>

    <?php include('design/footer.php'); ?>
</html>