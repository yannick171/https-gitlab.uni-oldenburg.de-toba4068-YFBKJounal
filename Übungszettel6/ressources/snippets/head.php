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

<div class="login">
        <ul>
            <li class="nav-item">
              <button style="background:transparent; color:white;" type = "button" class= "btn" onclick = "location.href='registration.php'" id ="bigfont">
                <i class="material-icons">exit_to_app</i>  Registrieren
              </button>
            </li>
            <?php
            if (isset($_SESSION["loggedIn"])){
              echo '<li class="nav-item" id ="logout-Button" >';
              echo '<a href="ressources/snippets/logout.php" style="color:white;" >';
              echo '<i class="material-icons">perm_identity</i> Abmelden</a></li>';
              echo 'Willkommen '. $_SESSION["vorname"] ." " . $_SESSION["nachname"];
            }else{
            echo '<li id="login-button">';
            echo '<button style="background:transparent; color:white;" type = "button" class= "btn" data-toggle= "modal" data-target= "#login-modal" id ="bigfont">';
            echo '<i class="material-icons">perm_identity</i> Anmelden</button>';
            }
            ?>
        </ul>
</div>

<header>
    <img id="titelbild" src="ressources/images/banner.jpg" alt="Titelbild">
</header>

<nav style="background: #1a75ff; color: white; font-size:1.2em;" class="navbar navbar-expand-lg sticky-top">
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
            <?php if (isset($_SESSION["loggedIn"])) {echo '<li class="nav-item" id = "Profil"><a class="nav-link" href="autor.php">Meine Beiträge</a></li>'; }?>
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
              <form action="ressources/snippets/loginvalidation.php" method="post">
                <div class="form-group">
                  <label for="email" class="col-form-label">
                      E-Mail:
                  </label>
                  <input type="email" class="form-control" id="usr" name="email">
                </div>
                <div class="form-group">
                  <label for="password" class="col-form-label">
                      Passwort:
                  </label>
                  <input type="password" class="form-control" id="pwd" name="pw">
                </div>
            </div>
                <div class="g-recaptcha" data-sitekey="6Ldb3mEUAAAAAM1xksEH_K2uy4EvTwMgvrCd2LoK"></div>
            <div class="modal-footer">
              <input type="submit" id="loginButton">
            </div>
          </form>
        </div>
    </div>
</div>

<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="searchModalLongTitle">Suche im Archiv nach..</h6>
            </div>
            <div class="modal-body">
			  <form method="get" action="archiv.php">
                <input class="form-control mr-sm-2" name="search" type="search" placeholder="...">

                  <a href="#" onclick="$(this).closest('form').submit()"> Bestätigen </a>
              </form>
			</div>
        </div>
    </div>
</div>
