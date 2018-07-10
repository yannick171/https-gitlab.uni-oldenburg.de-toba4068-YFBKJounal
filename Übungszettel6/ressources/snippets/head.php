<!-- google Captcha -->
<script src='https://www.google.com/recaptcha/api.js'></script>

<!-- Start Cookie Plugin -->
<script type="text/javascript">
  window.cookieconsent_options = {
  message: 'Diese Website nutzt Cookies, um bestmögliche Funktionalität bieten zu können.',
  dismiss: 'Ok, verstanden',
  learnMore: 'Mehr Infos',
  link: 'https://website-tutor.com/datenschutz',
  theme: 'dark-top'
 };
</script>
<script type="text/javascript" src="//s3.amazonaws.com/valao-cloud/cookie-hinweis/script-v2.js"></script>
<!-- Ende Cookie Plugin -->

<div style="font-weight: bold; background-color: #1a75ff; color: white; padding: 0.8%" class="container-fluid">
    <div class="row defaultstyle">
        <?php
            if (isset($_SESSION["loggedIn"])){
                echo '<div class="col-sm-3">Willkommen ' . $_SESSION["vorname"]. ' ' . $_SESSION["nachname"] .  '</div>';
                echo '<div class="col-sm-1 offset-8"><a href="ressources/snippets/logout.php">Abmelden</a></div>';
            }else{
                echo '<div class="col-sm-1 offset-9">';
                //echo '<button type = "button" data-toggle= "modal" data-target= "#login-modal" id ="bigfont">';
                echo '<a href="#" data-toggle= "modal" data-target= "#login-modal">Anmelden</a></div>';
                echo '<div class="col-sm-1 offset-1"><a href="registration.php"> Registrieren</a></div>';
            }
        ?>
    </div>
</div>

<header>
    <img id="titelbild" src="ressources/images/banner.jpg" alt="Titelbild">
</header>

<nav style="font-weight: bold; background: #1a75ff; color: white; font-size:1.2em;" class="navbar navbar-expand-lg sticky-top">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <i style="color:white;" class="material-icons">reorder</i>
  </button>
    <div class="collapse navbar-collapse defaultstyle" id="navbarSupportedContent">
        <ul style="" class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="startseite.php">Startseite<span class="sr-only">(current)</span></a>
            </li>
            <li style="" class="nav-item">
                <a class="nav-link" href="archiv.php">Archiv</a>
            </li>
            <li  style="" class="nav-item">
                <a class="nav-link" href="about.php">Über uns</a>
            </li>
            <?php
                if (isset($_SESSION["loggedIn"])) {
                    if($_SESSION['userId']==0){
                        echo '<li class="nav-item"><a class="nav-link" href="redakteur.php">Verwaltung</a></li>';
                    }else{
                        echo '<li class="nav-item" id = "Profil"><a class="nav-link" href="autor.php">Meine Beiträge</a></li>';
                    }
                }?>
        </ul>
        <ul class="navbar-nav ml-md-auto">
            <li class="nav-item">
              <form style="display: block !important" class="form-inline my-2 my-sm-0" >
                  <button style=" background: transparent; color: white; float:right;" class="btn my-2 my-sm-0" data-toggle= "modal" data-target= "#searchModal" type="button" aria-expanded="false"><i class="material-icons">search</i></button>
              </form>
            </li>
        </ul>
    </div>
</nav>

<!-- Beispiel Modal aus https://getbootstrap.com/docs/4.0/components/modal/#tooltips-and-popovers-->
<!-- loginmodal -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="loginModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModallLongTitle">Anmeldung</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            <div class="modal-body">
              <form onsubmit="validateLogin()">
                <div class="form-group">
                  <label for="email" class="col-form-label">
                      E-Mail:
                  </label>
                  <input type="email" class="form-control" id="usr" name="loginemail">
                </div>
                <div class="form-group">
                  <label for="password" class="col-form-label">
                      Passwort:
                  </label>
                  <input type="password" class="form-control" id="pwd" name="loginpw">
                </div>
            </div>
                <!--div require class="g-recaptcha" data-sitekey="6Ldb3mEUAAAAAM1xksEH_K2uy4EvTwMgvrCd2LoK"></div-->
            <div class="modal-footer">
                <div id="loginmessage"></div>
              <input type="submit" id="loginButton">
            </div>
          </form>
        </div>
    </div>
</div>

<script>
    //Skript zur login validierung

    var box = document.getElementById("loginmessage");

    function validateLogin() {
        event.preventDefault();

        var pwelement = document.getElementById("pwd");
        var loginelement = document.getElementById("usr");
        var xmlhttp = new XMLHttpRequest();

        xmlhttp.open("POST", "ressources/snippets/userDb_server.php",true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("context=login&email="+loginelement.value+ "&pw=" + pwelement.value);

        xmlhttp.onreadystatechange = function () {
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                var response = xmlhttp.responseText;
                if (response == 0){
                    box.innerHTML = "Falsche Daten";
                }
                if (response == 1){
                    location.reload();
                }
            }
        }
    }
</script>

<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="searchModalLongTitle">Suche im Archiv nach..</h6>
            </div>
            <div class="modal-body">
			  <form method="get" action="archiv.php">
                    <table width="100%">
                        <tr>
                            <td>
                                <b>Titel:</b>
                            </td>
                            <td >
                                <input class="form-control mr-sm-2" name="search" type="search" placeholder="...">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Autor:</b>
                            </td>
                            <td>
                                <input class="form-control mr-sm-2" name="author" type="text" placeholder="...">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Erscheinungsjahr:</b>
                            </td>
                            <td>
                                <input class="form-control mr-sm-2" name="uploadDate" type="text" placeholder="...">
                            </td>
                        </tr>
                    </table>
                  <div class="modal-footer">
                      <a href="#" onclick="$(this).closest('form').submit()"> Bestätigen </a>
                  </div>
              </form>
			</div>
        </div>
    </div>
</div>
