<?php
require_once '../comfpl/main.php';  
require_once 'config.php';          
require_once 'service/userservice.php';
require_once 'models/userentity.php';

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['utilisateur_nom']);
    $login = trim($_POST['utilisateur_login']);
    $pwd = $_POST['utilisateur_pwd'];
    $email = trim($_POST['utilisateur_email']);
    $date_creation = date('Y-m-d H:i:s');

    if (!empty($nom) && !empty($login) && !empty($pwd) && !empty($email)) {
        $user = new UserEntity();
        $user->utilisateur_nom = $nom;
        $user->utilisateur_login = $login;
        $user->utilisateur_pwd = $pwd;
        $user->utilisateur_email = $email;
        $user->utilisateur_creation = $date_creation;

        $service = new UserService();
        $service->adduser($user);
        $message = '<div class="alert alert-success">Utilisateur ajouté avec succès.</div>';
    } else {
        $message = '<div class="alert alert-danger">Tous les champs sont obligatoires.</div>';
    }
}
?>
<html>

<head>
    <title>Ajouter un utilisateur</title>
    <?php require_once 'phpinclude/commonmeta.php'; ?>
    <?php require_once 'phpinclude/theme.php'; ?>
    <?php FPLGlobal::render_bundle_css(); ?>
    <?php FPLGlobal::render_bundle_script(); ?>
</head>

<body>
    <?php require_once 'phpinclude/navbar.php'; ?>
    <div class="container">
        <h2>Ajouter un utilisateur</h2>
        <?php echo $message; ?>
        <form method="post" action="adduser.php">
            <div class="form-group">
                <label for="utilisateur_nom">Nom</label>
                <input type="text" class="form-control" id="utilisateur_nom" name="utilisateur_nom" required>
            </div>
            <div class="form-group">
                <label for="utilisateur_login">Login</label>
                <input type="text" class="form-control" id="utilisateur_login" name="utilisateur_login" required>
            </div>
            <div class="form-group">
                <label for="utilisateur_pwd">Mot de passe</label>
                <input type="password" class="form-control" id="utilisateur_pwd" name="utilisateur_pwd" required>
            </div>
            <div class="form-group">
                <label for="utilisateur_email">Email</label>
                <input type="email" class="form-control" id="utilisateur_email" name="utilisateur_email" required>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
            <a href="utilisateurs.php" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</body>

</html>