<!DOCTYPE html>
<html>
    <head>
        <title>Registration</title>
        <?php include("ressources/snippets/globalsources.php") ?>

        <link rel = "stylesheet" type="text/css" href = "ressources/registrierungsseite/registrierung_style_sheet.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    </head>
    <body>

          <?php include ("ressources/snippets/head.php") ;?>

        <main class="defaultstyle">
            <h2>Registration</h2>
            <form>
                <p>
                    <label><b>Andrede:</b><br>
                        <select id = "formInput" name="andrede" size="1">
                            <option value="herr" selected>Herr</option>
                            <option value="frau">Frau</option>
                        </select>
                    </label>
                </p>
                <p>
                    <label><b>Name:</b>
                        <input id = "formInput" name="name" type="text" size="30" maxlength="30">
                    </label>
                </p>
                <p>
                    <label><b>Vorname:</b>
                        <input id = "formInput" name="vorname" type="text" size="30" maxlength="30">
                    </label>
                </p>

                <p>
                    <label><b>E-Mail:</b>
                        <input id = "formInput" name="email" type="email" size="30" maxlength="30">
                    </label>
                </p>

                <p>
                    <label><b>Setze Passwort</b>
                        <input id = "formInput" name="pw" type="password" size="30" maxlength="30">
                    </label>
                </p>
                <p>
                    <label><b>Passwort wiederholen</b>
                        <input id = "formInput" name="pwwdh" type="password" size="30" maxlength="30">
                    </label>
                </p>
                <br>
                <input id = "formInput" class = "roundCorner" type="submit" value="Anmelden">
            </form>

        </main>
        <footer>
            <address>
                Hier steht so footer-typisches Zeug und so..
                Hier steht so footer-typisches Zeug und so..
                Hier steht so footer-typisches Zeug und so..
                Hier steht so footer-typisches Zeug und so..
                Hier steht so footer-typisches Zeug und so..
                Hier steht so footer-typisches Zeug und so..
                Hier steht so footer-typisches Zeug und so..
            </address>
        </footer>
    </body>
</html>
