<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it" >
    <head>   
	<title> Contattaci - ScambioLibriVi </title>
    	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="title" content="Scambio Libri Vi" />
        <meta name="description" content="Sito dedicato allo scambio di libri usati, pensato per la provincia di Vicenza e dintorni" />
		<link rel="stylesheet" type="text/css" href="style/style.css" media="handheld, screen"/>
		<link  rel = "stylesheet" type="text/css" href="style/small.css" media= "handheld, screen and (max-width:480px), only screen and (max-device-width:480px)" />
		<link rel = "stylesheet" type="text/css"  href="style/print.css" media="print"/> 
     </head>
     <body>
    <div id="header">
     <div id="titolo">
		 <h1> Scambio Libri VI </h1>
		 <h2> La più semplice piattaforma per lo scambio dei libri, nella provincia di Vicenza  </h2>
     </div>
     <div>
        <a href="#logForm" class="aiuti">Passa al form di login</a>
        <a href="#menu" class="aiuti">Passa al men&ugrave;</a>
        <a href="#corpo" class="aiuti"> Passa al contenuto della pagina</a>
        <a href="register.html" class="aiuti"> Passa alla pagina di registrazione </a>
     </div>
    <?php
          session_start();
          if(!isset($_SESSION["user"])){
            echo'    <div id="logForm">
                 <form id="loginForm" method="post" action="actionLogin.php">
                    <fieldset>
                        <legend> Login Area </legend>
                        <label> User  </label> <br/>
                        <input  name="us" type="text" title="Inserisci User"/> <br/>
                        <label> Password </label> <br/>
                        <input name="psw" type="password" title="Inserici la password"/> <br/>
                        <input type="submit" value="Accedi" title="Clicca per accedere" /> <br/>
                        <a id="linkregistrati" href="register.html" title="Oppure Registrati"> Registrati </a>
                    </fieldset>
                 </form>
            </div>';
          }
        else
            echo '<a class="abutt" id="aPers" href="userHome.php" title="Vai alla tua pagina personale"> Pagina Personale </a> </br>
                  <a class="abutt" id="logout" href="logout.php" title="Esci"> Logout </a>'
     ?>
  </div>
  	 <div id="where">
        <p> Ti trovi in: <a href="index.php"> Home </a> - Contattaci </p>
     </div>
     <div id = "menu">
        <ul>
            <li> <a href="index.php"> <span xml:lang="en"> Home </span> </a> </li>
            <li class="centrali">  <a href="chisiamo.php">Chi Siamo </a></li>
            <li class="centrali" id="current"> Contattaci </li>
            <li class="ultimo"> <a href="catalogo.php"> Catalogo </a> <li>
        </ul>
    </div>
    <div id="corpo">
    
    	<h1> Contatti </h1>
    	<dl id="dlContact">
        	<dt>Sede</dt> <dd>Via Trieste, 63 - 35121 Padova (Italy)</dd>
            <dt>Chiamaci</dt> <dd>(+39) 0444 999 999</dd>
            <dt>Mail</dt> <dd><a href="mailto:scambiolibrivi@gmail.com">scambiolibrivi@gmail.com</a></dd>
        </dl>
    </div>
    <div id="footer">
    	 <img id="imgValidCode" src="images/valid-xhtml10.png" alt="Html validation"/>
        <img id="imgValidCSS" src="images/vcss-blue.gif" alt ="cssValidation"/>
        <p> Il sito &egrave; creato come progetto nell'ambito del corso di <a href="http://informatica.math.unipd.it/laurea/tecnologieweb.html" title="Pagina web del corso di Tecnlogie web" >Tecnologie web </a> e non rappresenta quindi alcuna associazione esistente. Francesca Lonedo, Marco Giollo, Luca Allegro - <span xml:lang="en">All right reserved </span></p>
    </div>
    
	<body>


</body>