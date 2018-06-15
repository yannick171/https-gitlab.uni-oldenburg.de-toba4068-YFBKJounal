//Validiert die Registrierung
function validateForm()
{
	//Alles eingegeben?
	if(	document.getElementById("fname").value.length == 0 || 
		document.getElementById("lname").value.length == 0 ||
		document.getElementById("email").value.length == 0 ||
		document.getElementById("pwd2").value.length == 0 ||
		document.getElementById("pwdcnf").value.length == 0)
	{
		document.getElementById("error").innerHTML = "Bitte alle Felder ausfüllen!";
		document.getElementById("error").style="color:red;";
	}
	else
	{
		boolean emmailerr = true;
		
		if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.getElementById("email").value))
		{
			emmailerr = false;
		}
 
		if(emailerr)
		{
			document.getElementById("error").innerHTML = "Bitte eine echte Email eingeben!";
			document.getElementById("error").style="color:red;";
		}
		else if(document.getElementById("pwd2").value.length < 6)
		{
			document.getElementById("error").innerHTML = "Das Passwort muss mindestens 6 Zeichen lang sein!";
			document.getElementById("error").style="color:red;";
		}
		else if(document.getElementById("pwd2").value != document.getElementById("pwdcnf").value)
		{
			document.getElementById("error").innerHTML = "Die Passwörter stimmen nicht überein!";
			document.getElementById("error").style="color:red;";
		}
		else
		{
			document.getElementById("registerform").submit()
		}
	}
}