
<!--  <div class="login">
      <ul class="defaultstyle">
        <div class="defaultstyle">
        <li>
          <a data-toggle="modal" data-target="#exampleModalCenter"> Anmelden</a>
        </li>
        <li>
          <a href="registration.php"> Registrieren</a>
        </li>
      </ul>
    </div>
    </div>
-->
    <header>
      <img id="titelbild" src="ressources/images/banner.jpg" alt="Titelbild">
    </header>

    <!-- Beispiel Modal aus https://getbootstrap.com/docs/4.0/components/modal/#tooltips-and-popovers -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Anmeldung</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
            <label for="email" class="col-form-label">E-Mail:</label>
            <input type="email" class="form-control" id="usr">
          </div>
          <div class="form-group">
            <label for="password" class="col-form-label">Passwort:</label>
            <input type="password" class="form-control" id="pwd"></textarea>
          </div>
        </form>
          </div>
          <div class="modal-footer">
            <button style="width:100%;" type="button" class="btn btn-primary">Einloggen</button>
          </div>
        </div>
      </div>
    </div>
<!--
<nav class="nav_main">
<div id="navigation" class="defaultstyle">
      <ul>
        <li>
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        </li>
        <li>
          <a href="startseite.php">
                    Startseite
                </a>
        </li>
        <li>
          <a href="about.php">
                      Über uns
                  </a>
        </li>
        <li>
          <a href="archiv.php">
                      Archiv
                  </a>
        </li>
        <li>
          <a href="autor.php">
                      Profil
                  </a>
        </li>
        <li style="float:right;">
          <form>
            <button style="" class="btn btn-primary" type="button"> <i class="material-icons">search</i> </button>
          </form>
        </li>
      </ul>
</div>
</nav>
-->
<!-- navbar-dark bg-primary -->
<nav style="background: #1a75ff; color: white; font-size:1.2em;" class="navbar navbar-expand-lg">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse defaultstyle" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="startseite.php">Startseite<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="archiv.php">Archiv</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="autor.php">Profil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">Über uns</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="registration.php"> Registrieren</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="modal" href="#" data-target="#exampleModalCenter"> Anmelden</a>
      </li>

      <form class="form-inline my-2 my-lg-0">
        <button style="background: #1a75ff; color: white;" class="btn my-2 my-sm-0" type="submit"><i class="material-icons">search</i></button>
      </form>

    </ul>
  </div>
</nav>
