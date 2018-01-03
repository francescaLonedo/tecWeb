<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it" >
    <head>   
	<title> Modifica Profilo - ScambioLibriVi </title>
    	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="title" content="Scambio Libri Vi" />
        <meta name="description" content="Sito dedicato allo scambio di libri usati, pensato per la provincia di Vicenza e dintorni" />
		<link rel="stylesheet" type="text/css" href="style/style.css" media="handheld, screen"/>
		<link  rel = "stylesheet" type="text/css" href="small.css" media= "handheld, screen and (max-width:480px), only screen and (max-device-width:480px)" />
		<link rel = "stylesheet" type="text/css"  href="print.css" media="print"/> 
        <script src="functions.js"></script>
     </head>
     <body>
     
	<div id="header">
     <div id="titolo">
		 <h1> Scambio Libri VI </h1>
		 <h2> La più semplice piattaforma per lo scambio dei libri, nella provincia di Vicenza  </h2>
     </div>
     
     <div id="logForm" method ="post" action="actionLogin.php">
         <form id="loginForm">
         	<fieldset>
            	<legend> Login Area </legend>
                <label> User  </label> <br/>
                <input type="text" title="Inserisci User"/> <br/>
                <label> Password </label> <br/>
                <input type="password" title="Inserici la password"/> <br/>
                <input type="submit" value="Accedi" title="Clicca per accedere" /> <br/>
            </fieldset>
         </form>
	</div>
  </div>
  	 <div id="where">
        <p> Ti trovi in: <a href="index.php"> Home </a> - <a href="userHome.php"> Area Riservata </a> - Modifica Profilo </p>
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
                $user=$_SESSION["user"];
                $psw=$_POST["psw"];
                $citta = $_POST["citta"];
                $provincia = $_POST["prov"];
                $email = $_POST["em"];
                $tel = $_POST["tel"];
        	//Devo andare a farmi dare la connessione
                $connection = $log -> getConnection();
                $query="UPDATE utente SET password=\"$psw\", citta=\"$citta\", provincia=\"$provincia\", email=\"$email\", numeroTelefono=\"$tel\" WHERE username=\"$user\";";
                if($connection->query($query))
                    echo "Aggiornamento avvenuto con successo";
                else
                    echo "Errore!";
            }
            $log->closeConnection();
         ?>
         
    </div>
    <div id="footer">
    	 <img id="imgValidCode" src="images/valid-xhtml10.png" alt="Html validation"/>
        <img id="imgValidCSS" src="images/vcss-blue.gif" alt ="cssValidation"/>
        <p> Il sito &egrave; creato come progetto nell'ambito del corso di <a href="http://informatica.math.unipd.it/laurea/tecnologieweb.html" title="Pagina web del corso di Tecnlogie web" >Tecnologie web </a> e non rappresenta quindi alcuna associazione esistente. Francesca Lonedo, Marco Giollo, Luca Allegro - <span xml:lang="en">All right reserved </span></p>
    </div>
   </body>
</html>