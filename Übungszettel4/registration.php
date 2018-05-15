<!DOCTYPE html>
<html>
    <head>
        <title>Registration</title>
        <?php include("ressources/snippets/globalsources.php");?>
        <link rel = "stylesheet" type="text/css" href = "ressources/registrierungsseite/registrierung_style_sheet.css">
    </head>
    <body>
        <?php include ("ressources/snippets/head.php");?>
        <main class="defaultstyle">
            <div class ="container">
                <h2>Registration</h2>
                <form action="/action_page.php">
                    <div class="form-group">
                        <label for="Name">Name:</label>
                        <input type="text" class="form-control" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="Vorname">Vorname:</label>
                        <input type="text" class="form-control" placeholder="Vorname">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password wiederholen:</label>
                        <input type="password" class="form-control" id="pwd" placeholder="Retype password" name="pswd">
                    </div>
                    <p>
                    </p>
                    <button type="submit" class="btn btn-success">
                        Registrieren
                    </button>
                </form>
            </div>
        </main>
        <?php include ("ressources/snippets/footer.php") ;?>
        <?php include ("ressources/snippets/loadjavascript.php") ;?>
    </body>
</html>
