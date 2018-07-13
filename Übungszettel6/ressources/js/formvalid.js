//Validiert die Registrierung
//es funktioniert so:
//Funktion ermittelt alle Elemente die der Klasse "toCheck" angehören -> Selbsterklärend
//Es wird kontrolliert ob die Elemente leer sind -> Error

function validateForm()
{
	var elements = document.getElementsByClassName("toCheck");
    var isvalid;

	for (i=0;i<elements.length;i++){
		if (elements[i].value == 0){
            document.getElementById("error").innerHTML = "Bitte alle Felder ausfüllen!";
            document.getElementById("error").style="color:red;";
            return false;
            isvalid = false;
            break;
		}else{
			isvalid = true;
		}
	} 
	if(isvalid){
		var emailerr = true;
		var nameerr = false;
		if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.getElementById("email").value))
		{
			emailerr = false;
		}

		if (/[^a-zA-Z]/.test(document.getElementById("fname").value) || /[^a-zA-Z]/.test(document.getElementById("lname").value)){
            document.getElementById("error").innerHTML = "Dein Name enthält bestimmt keine Sonderzeichen!";
            document.getElementById("error").style="color:red;";
            nameerr = true;
            return false;
        }

		if(emailerr == true)
		{
			document.getElementById("error").innerHTML = "Bitte eine echte Email eingeben!";
			document.getElementById("error").style="color:red;";
		}

		if (document.getElementById("pwd2") != null) {
            if (!sicherheit(document.getElementById("pwd2").value) ) {
                document.getElementById("error").innerHTML = "Das Passwort muss mindestens 6 Zeichen lang sein!";
                document.getElementById("error").style = "color:red;";
            }
            else if (!comparePasswords(document.getElementById("pwd2").value , document.getElementById("pwdcnf").value)) {
                document.getElementById("error").innerHTML = "Die Passwörter stimmen nicht überein!";
                document.getElementById("error").style = "color:red;";
            }
            else {
                document.getElementById("error").innerHTML = "";
                return true;
            }
        }else{
            //document.getElementById("error").innerHTML = "Erfolgreich";
            document.getElementById("error").style="color:green;";
            return true;
		}
	}
}

//liefert true, wenn das Password "sicher" ist
function sicherheit(pw) {
    return (pw.length >= 6);
}

//liefert true wenn beide Parameter gleich sind
function comparePasswords(pw1 , pw2) {
    return (pw1 == pw2);
}