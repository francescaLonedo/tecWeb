<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
	session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it" >
    <head>   
	<title> Login - ScambioLibriVi </title>
    	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="title" content="Scambio Libri Vi" />
        <meta name="description" content="Sito dedicato allo scambio di libri usati, pensato per la provincia di Vicenza e dintorni" />
		<link rel="stylesheet" type="text/css" href="style/style.css" media="handheld, screen"/>
		<link  rel = "stylesheet" type="text/css" href="small.css" media= "handheld, screen and (max-width:480px), only screen and (max-device-width:480px)" />
		<link rel = "stylesheet" type="text/css"  href="print.css" media="print"/> 
     </head>
     <body>
     
	<div id="header">
    <div id="titolo">
		 <h1> Scambio Libri VI </h1>
		 <h2> La più semplice piattaforma per lo scambio dei libri, nella provincia di Vicenza  </h2>
    </div>
    <div id="logOut">
    	<a href="logout.php"> Logout </a>
    </div>
  	</div>
  	 <div id="where">
        <p> Ti trovi in: <a href="index.php"> Home </a> - Login </p>
     </div>
     <div id = "menu">
        <ul>
            <li id="current">  <a href="index.php"> <span xml:lang="en"> Home </a></span>  </li>
            <li class="centrali">  <a href="chisiamo.html">Chi Siamo </a></li>
            <li class="centrali">  <a href="contact.html"> Contattaci </a> </li>
            <li class="ultimo"> <a href="catalogo.html"> Catalogo </a> </li>
        </ul>
    </div>
    <div id="corpo">
    <?php
    	require_once 'connectDB.php';
        $log = new connectDB();
        $openConnection = $log -> accessDB();
        if(!$openConnection){
        	die("Errore nell'aprire il database");
        }
        else{
        	//Devo andare a farmi dare la connessione
            $connection = $log -> getConnection();
            //Vado ad includere i file dove sono contenute le funzioni per verificare se un utente è valido
            require_once "connectLogin.php";
            //creo il nuovo oggetto 
            $acceptUs = new acceptUser();
        	//Devo innanzitutto verificare che i contenuti siano validi
            $user = $_POST["us"];
            $password = $_POST["psw"];
            $loggati = $acceptUs -> acceptLogin($user, $password, $connection);
            if($loggati){
            	header("Location: userHome.php");
       		}
            else{
            	echo'<p> Non sei registrato! <a href="register.html"> Registrati</a>! <br/> Oppure torna alla <a href="index.php"> Home </a> </p>';
            }
        }
      //Una volta completate tutte le operazioni devo sloggarmi dal database
      $log -> closeConnection();
    ?>
    </div>
    <div id="footer">
    	 <img id="imgValidCode" src="images/valid-xhtml10.png" alt="Html validation"/>
        <img id="imgValidCSS" src="images/vcss-blue.gif" alt ="cssValidation"/>
        <p> Il sito &egrave; creato come progetto nell'ambito del corso di <a href="http://informatica.math.unipd.it/laurea/tecnologieweb.html" title="Pagina web del corso di Tecnlogie web" >Tecnologie web </a> e non rappresenta quindi alcuna associazione esistente. Francesca Lonedo, Marco Giollo, Luca Allegro - <span xml:lang="en">All right reserved </span></p>
    </div>
 </body>
</html>