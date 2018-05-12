
  <div class="login">
      <ul>
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
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Schließen</button>
            <button type="button" class="btn btn-primary">Einloggen</button>
          </div>
        </div>
      </div>
    </div>


<nav class="nav_main">
<div class="defaultstyle">
      <ul>
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
