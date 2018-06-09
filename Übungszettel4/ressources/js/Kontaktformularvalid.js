//Validiert Kontaktausfüllung
function validateForm()
{
	//Alles eingegeben?
	if(	document.getElementById("fname").value.length == 0 || 
		document.getElementById("lname").value.length == 0 ||
		document.getElementById("email").value.length == 0 ||
		document.getElementById("StraßHausnummer").value.length == 0 ||
	   document.getElementById("PLZ").value.length == 0 ||
		document.getElementById("Anrede").value.length == 0 ||
		document.getElementById("Geburtsdatum").value.length == 0 ||
	   document.getElementById("Yes").value.length != 0 ||
	   document.getElementById("No").value.length != 0 ||)
			
	{
		document.getElementById("error").innerHTML = "Bitte alle Felder ausfüllen!";
		document.getElementById("error").style="color:red;";
	}
	else
	{
		else
		{
			document.getElementById("registerform").submit()
		}
	}
}