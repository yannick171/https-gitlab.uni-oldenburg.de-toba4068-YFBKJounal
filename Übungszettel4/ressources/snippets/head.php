<div class="login">
        <ul>
            <li class="nav-item">
              <button style="background:transparent; color:white;" type = "button" class= "btn" onclick = "location.href='registration.php'" id ="bigfont">
                <i class="material-icons">exit_to_app</i>  Registrieren
              </button>
            </li>
          <li class="nav-item">
            <button style="background:transparent; color:white;" type = "button" class= "btn" data-toggle= "modal" data-target= "#loginModal" id ="bigfont">
                <i class="material-icons">perm_identity</i> Anmelden
            </button>
          </li>
        </ul>
</div>

<header>
    <img id="titelbild" src="ressources/images/banner.jpg" alt="Titelbild">
</header>


<nav style="background: #1a75ff; color: white; font-size:1.2em;" class="navbar navbar-expand-lg">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <i style="color:white;" class="material-icons">reorder</i>
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
        </ul>
        <ul class="navbar-nav ml-md-auto">
            <li class="nav-item">
              <form class="form-inline my-2 my-sm-0" >
                  <button style="background: transparent; color: white; float:right;" class="btn my-2 my-sm-0" data-toggle= "modal" data-target= "#searchModal" type="button" aria-expanded="false"><i class="material-icons">search</i></button>
              </form>
            </li>

        </ul>
    </div>
</nav>

<!-- Beispiel Modal aus https://getbootstrap.com/docs/4.0/components/modal/#tooltips-and-popovers -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModallLongTitle">Anmeldung</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</sp1an>
                    </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                    <label for="email" class="col-form-label">
                        E-Mail:
                    </label>
                    <input type="email" class="form-control" id="usr">
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-form-label">
                            Passwort:
                        </label>
                        <input type="password" class="form-control" id="pwd">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button style="width:100%;" type="button" class="btn btn-primary">
                    Einloggen
                </button>
            </div>
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
              <input class="form-control mr-sm-2" type="search" placeholder="..." aria-label="Search">
            </div>
        </div>
    </div>
</div>
