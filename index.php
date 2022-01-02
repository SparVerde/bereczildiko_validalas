<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

<?php
//adatbázis osztály létrehozása a mysqli-ből és hol található a server, a felhasználó, a password, adatbázis neve

$conn = new mysqli('localhost','root','','bankszamala_validalas');
//megnézzük létre jött-e a kapcsolat
if($conn->errno > 0){
    //script futás leállítása
    die('Az adatbázis nem elérhető!');
} 
//a conn ellenőrzése, sikerült-e kapcsolódni?
mysqli_select_db($conn, "bankszamala_validalas") or die ( "Can not connect to database" );


$conn->set_charset("utf8"); //-- lekerdezés adatai is utf8 kód


if(filter_input(INPUT_POST, "regisztracio", FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE)){
    $vanlogin = true;
    $vanpassword = true;
    $vanszul = true;
    $vangiro = true;
    $vanbankk = true;
    $loginname = filter_input(INPUT_POST, "loginname", FILTER_SANITIZE_STRING);
    if (strlen($loginname)<3) {
        $err = true;
        $vanlogin = false;
        $errors = array();
        array_push( $errors, "Túl rövid vagy túl hosszú a név");
        $erlogin = "Túl rövid a név";
        var_dump($erlogin);
    }
    
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING, FILTER_VALIDATE_INT);
    if(strlen($password)<6){
        $err = true;
        $vanpassword = false;
        $erpasword = "Nem megfelelő password";
        //array_push( $errors, "Nem megfelelő password");
        var_dump($erpasword);

    }
    $password = password_hash(filter_input(INPUT_POST, "password"), PASSWORD_BCRYPT);
    
    $szuletesiido = filter_input(INPUT_POST, "szuletesiido", FILTER_VALIDATE_INT);
   if ($age = date("Y") - $szuletesiido<18||$age = date("Y") - $szuletesiido>150){
            $vanszul = false;
            $err = true;
            $erszul = "Nem vagy megfelelő korú";
            //array_push( $errors, "Nem vagy még 18 éves");
            var_dump($erszul);
        }
    //var_dump($szuletesiido);
    $giro = filter_input(INPUT_POST, "giro", FILTER_SANITIZE_STRING);
    if (Strlen($giro)>36){
        $err = true;
        $vangiro = false;
        //array_push( $errors, "Nem megfelelőGIRO szám");
        $ergiro = "Nem megfelelő GIRO szám";
        var_dump($ergiro);}

    $bankkartya = filter_input(INPUT_POST, "bankkartya", FILTER_SANITIZE_STRING);
    if (Strlen($giro)>34){
        $vanbankk = false;
        $err = true;
        //array_push( $errors, "Nem megfelelő bankkártyaszám");
        $erbankk = "Nem megfelelő bankkártyaszám";
        var_dump($erbankk);
        }

    
    if($vanlogin == true && $vanpassword == true && $vanszul == true && $vangiro == true && $vanbankk == true){

    $sql = "INSERT INTO `szamlak` (`loginname`, `password`, `szuletesiido` ,`giro` ,`bankkartya`) VALUES (?,?,?,?,?)";
    
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("sssss", $loginname, $password, $szuletesiido, $giro, $bankkartya);

    //majd a statement-et lefuttatjuk execute() metódussal, ami logikia értéket ad vissza, ha true Sikeres regisztráció...
    if($stmt->execute()){
        echo '<div class="alert alert-succes">
        <strong>Sikeres rözítés!</strong>
        </div>';
    }
    } else {
        echo '<div class="alert alert-danger">
        <strong>A rögzítés sikertelen!</strong>
        </div>';
        //var_dump(array());
        //var_dump($van);
        //var_dump($stmt->execute());
        //var_dump($erlogin);
        

    }

        //var_dump($vanlogin);
        //var_dump($vanpassword);
        //var_dump($vanszul);
        //var_dump($vangiro);
        //var_dump($vanbankk);
        //var_dump($stmt->execute());
        ?>
        <a class="nav-link" href="index2.php">Új regisztráció</a>
        <?php


}
else {
    

    ?>
    
    <h1>regisztráció</h1>
    <!--a name érték megadása a php miatt kell ott a name értéket használjuk, és bootstrap osztályt használtunk class=-->
    <form method="POST">
          <div class="form-group">
                <label for="loginname">Felhasználó név</label>
                <input type="text" class="form-control" id="loginname" name="loginname" 
                required pattern="^[a-zA-Z]{3,70}" title="Only latin letters,min 3 max 70 caracters"
                value="<?php echo isset($loginname)?$loginname:""; ?>">
          </div>
          <div class="form-group">
            <label for="password">Jelszó</label>
            <input type="password" class="form-control" id="password" name="password" required 
            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters"
            >
           
            
      </div>
      <div class="form-group">
            <label for="vnev">Születesi év</label>
            <input type="number" class="form-control" id="szuletesiido" name="szuletesiido" required
            pattern = "[0-9]{4}"
            value="<?php echo isset($szuletesiido)?$szuletesiido:"";?>">
      </div>
      <div class="form-group">
            <label for="giro">GIRO</label>
            <input type="text" class="form-control" id="giro" name="giro"  required 
            pattern = "^[A-Z]{2}[0-9]{8}([ -]?[0-9]{8}){1,2}$" title="Az IBAN max 34 caracters first two caracters is the country code with capital letters"
            value="<?php echo isset($giro)?$giro:""; ?>">
      </div>
      <div class="form-group">
            <label for="cim">Bankkártyaszám</label>
            <input type="text" class="form-control" id="bankkartya" name="bankkartya" required 
            pattern = "[0-9]{4}-[0-9]{4}-[0-9]{4}-[0-9]{4}"
            value="<?php echo isset($bankkartya)?$bankkartya:""; ?>">
      </div>

    <!--a button-nak valut kell adnunk-->
        <button type="submit" class="btn btn-primary" name="regisztracio" value="true">Regisztráció</button>
    </form>
    <?php
    //megjelenítés, hogy kapott-e adatot:
    //var_dump($_POST);
    //pattern = "^[0-9]{16,}$"
    //
}