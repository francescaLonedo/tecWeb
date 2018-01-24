//Funzione Ajax che mi permette di richiedere al database se l'uesr è già stato inserito
 function isPresent(str){
  	var xhttp = new XMLHttpRequest();
    var risposta = false;
    if(this.responseText.length != 0 ){
      risposta = true;
    }
  xhttp.open("GET", "ajax_info.txt", true);
  xhttp.send();
  return risposta;
 }
 
 //Funzione AJAX per richiedere al database se l'user inserito è gia presente o no
 function showIsPossible(str){
    if (str.length == 0) { 
      document.getElementById("presente").innerHTML = "";
       document.getElementById("aiutoUsername").style.display="none";  
      return;
    }
 	var xmlhttp = new XMLHttpRequest();
  	xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        if(this.responseText != " "){
            document.getElementById("presente").innerHTML = this.responseText;
            //devo attivare l'aiuto alla navigazione
            document.getElementById("aiutoUsername").style.display="block";
        }
      	
    }
  };
  xmlhttp.open("GET", "register.php?q=" +str , true);
  xmlhttp.send();
}

function checkNome(nome){
	var nomeInserito = nome.value;
    if(nomeInserito.length == 0){
        mostraErrore(nome, "Il nome è richiesto");
         return false;
    }
	var pattern = new RegExp('^[a-zA-Z]{3,}$');
	if(pattern.test(nomeInserito)){
		togliErrore(nome);
		return true;
	}
	else{
		//Mostra Errore
		mostraErrore(nome, "Nome non inserito correttamente");
		return false;
	}
}

function checkCognome(cognome){
	var cog = cognome.value;
    if(cog.length == 0){
        mostraErrore(cognome, "Il cognome è richiesto");
         return false;
    }
	var pattern = new RegExp('^[a-zA-Z]{3,}$');
	if(pattern.test(cog)){
		togliErrore(cognome);
		return true;
	}
	else{
		//Mostra Errore
		mostraErrore(cognome, "Cognome non inserito correttamente");
		return false;
	}
}

function checkCity(citta){
	var city = citta.value;
    if(city.length == 0){
        mostraErrore(citta, "La città è richiesta");
         return false;
    }
	var pattern = new RegExp('^[a-zA-Z]{3,}$');
	if(pattern.test(city)){
		togliErrore(citta);
		return true;
	}
	else{
		//Mostra Errore
		mostraErrore(citta, "Città non valida");
		return false;
	}
}

function checkProv(provincia){
	var prov = provincia.value;
    if(prov.length == 0){
        mostraErrore(provincia, "La provincia è richiesta");
         return false;
    }
	var pattern = new RegExp('^[a-zA-Z]{3,}$');
	if(pattern.test(prov)){
		togliErrore(provincia);
		return true;
	}
	else{
		//Mostra Errore
		mostraErrore(provincia, "Provincia non valida");
		return false;
	}
     
}

function checkEmail(email){
	var em = email.value;
    if(em.length == 0){
        mostraErrore(email, "La email è richiesta");
         return false;
    }
	var pattern = new RegExp("^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$");
	if(pattern.test(em)){
		togliErrore(email);
		return true;
	}
	else{
		//Mostra Errore
		mostraErrore(email, "Formato della mail non è valido");
		return false;
	}
     
}

function checkTel(telefono){
    var tel = telefono.value;
    if(tel.length==0){
        togliErrore(telefono);
        return true;
    }
    var pattern = new RegExp("/^(d{10})+$/");
    if(pattern.test(tel)){
        togliErrore(telefono);
        return true;
    }
    else{
        mostraErrore(telefono, "Formato del numero di telefono non è corretto!")
        return false;
    }
    
}

function checkPassword(password){
    var psw = password.value;
    if(psw.length == 0){
        mostraErrore(password, "La password è richiesta");
        return false;
    }
    if(psw.length<=12){
        togliErrore(password);
        return true;
    }
    else{
        mostraErrore(password, "La password piò essere lunga fino a 12 caratteri ");
        return false;
    }
}

function mostraErrore(input, testo){
	togliErrore(input);
	var p = input.parentNode; //recupero il nodo padre 
	var e = document.createElement("strong"); //creo un nuovo elemento
	e.className = "err"; //assegno una classe
	e.appendChild(document.createTextNode(testo)); //crea un nodo di testo con questo testo
	p.appendChild(e); //appendo il testo dell'errore
}

function togliErrore(input){
	var p = input.parentNode;
	if(p.children.length == 2){
		p.removeChild(p.children[1]);
	}
}

//Funzione per verificare che una form sia completata nel modo corretto
 function correctForm(){
 	var user = document.forms["registerForm"]["us"];
    var password = document.forms["registerForm"]["psw"];
    var nome = document.forms["registerForm"]["nom"];
    var cognome = document.forms["registerForm"]["cogn"];
    var citt = document.forms["registerForm"]["citt"];
    var prov = document.forms["registerForm"]["prov"];
    var em = document.forms["registerForm"]["em"];
    var tel = document.forms["registerForm"]["tel"];
    var pass = document.forms["registerForm"]["psw"];
    
    
    var correct = checkNome(nome);
    var correctCog = checkCognome(cognome);
    var correctCity = checkCity(citt);
    var correctProv = checkProv(prov);
    var correctEmail = checkEmail(em);
    var correctTel = checkTel(tel);
    var correctPassword = checkPassword(pass);
     
   correct = correct && correctCog && correctCity && correctProv && correctEmail && correctTel && correctPassword;

     return correct;
 }

 function checkBook() {
    var isbn = document.forms["addBookForm"]["isbn"];
    var title = document.forms["addBookForm"]["title"];
    var author = document.forms["addBookForm"]["author"];
    var editor = document.forms["addBookForm"]["editor"];
    var year = document.forms["addBookForm"]["year"];
    var price = document.forms["addBookForm"]["price"];
    var kind = document.forms["addBookForm"]["kind[]"];
    var state = document.forms["addBookForm"]["state"];
    var cIsbn= checkIsbn(isbn);
    var cTitle= checkTitle(title);
    var cAuthor=checkAuthor(author);
    var cEditor=checkEditor(editor);
    var cYear=checkYear(year);
    var cPrice=checkPrice(price);
    var cKind=checkKind(kind);
    var cState=checkState(state);
    var cPhoto=checkPhoto();
    return cIsbn && cTitle && cAuthor && cEditor && cYear && cPrice && cKind && cState && cPhoto;
 }

function checkIsbn(isbn) {
    var tmp = isbn.value;
    if(tmp.length==0){
        mostraErrore(isbn, "Il codice ISBN è richiesto");
         return false;
    }
    var pattern = new RegExp("([0-9]){13}/g");
    if(pattern.test(tmp)){
        togliErrore(isbn);
        return true;
    }
    else{
        mostraErrore(isbn, "Formato del codice ISBN non è corretto! Inserire 13 caratteri numerici");
        return false;
    }
}
function checkTitle(title) {
    var ti=title.value;
    if(ti.length==0){
        mostraErrore(title, "Il titolo è richiesto");
        return false;
    }
    togliErrore(title);
    return true;
}
function checkAuthor(author) {
    var au=author.value;
    if(au.length==0){
        mostraErrore(author, "L'autore è richiesto");
         return false;
    }
    togliErrore(author);
    return true;
}
function checkEditor(editor) {
    var tmp=editor.value;
    if(tmp.length==0) {
        mostraErrore(editor, "Inserire l'editore");
        return false;
    }
    togliErrore(editor);
    return true;
}
function checkYear(year) {
   var tmp=year.value;
    if(tmp.length>0){
        var number = parseInt(tmp);
        if(isNaN(number)) {
            mostraErrore(year, "Inserire un numero");
             return false;
        }
        if(number > (new Date()).getFullYear() || number) {
            mostraErrore(year, "Il numero non è valido");
            return false;
        }
    }
    togliErrore(year);
    return true;
}
function checkPrice(price){
    var pr=price.value;
    if(pr.length==0) {
        mostraErrore(price, "Il prezzo è obbligatorio");
        return false;
    }
    var number = parseFloat(pr);
    if(isNaN(number)){
        mostraErrore(price, "Inserire un numero");
        return false;
    }
    if(number<0) {
        mostraErrore(price, "Il prezzo non può essere negativo");
        return false;
    }
    togliErrore(price);
    return true;
}
function checkKind(kind) {
    var counter=0;
    for (var i = 0; i < kind.length; i++)
        if(kind[i].checked)
            counter++;
    if(counter==0) {
        mostraErrore(kind[kind.length-1], "Selezionare almeno un genere");
        return false;
    }
    if(counter>3) {
        mostraErrore(kind[kind.length-1], "Selezionare al massimo 3 generi");
        return false;
    }
    togliErrore(kind[0]);
    return true;  
}
function checkState(state){
    var tmp=state.value;
    if(tmp.length==0){
        mostraErrore(state, "Selezionare lo stato");
        return false;
    }
    togliErrore(state);
    return true;
}
function checkPhoto() {
    var file = document.forms["addBookForm"].elements["photo"];
    if(file.value.length!=0) {
        var exts=['.jpg','.jpeg'];
        if((new RegExp('(' + exts.join('|').replace(/\./g, '\\.') + ')$')).test(file.value)) {
            togliErrore(file);
            return true;
        } else {
            mostraErrore(file, "Selezionare un file con estensione .jpg o .jpg");
            return false;
        } 
    }
    togliErrore(file);
    return true;
}