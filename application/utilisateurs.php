<?php
                require_once '../comfpl/main.php';               require_once 'config.php';
                require_once 'service/userservice.php';
$filtrenom = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['filtrenom'])) {
    $filtrenom = trim($_POST['filtrenom']);
}

$service = new UserService();
$liste = $service->getuserlist($filtrenom);
?>
<html>

<head>
    <title>Liste des utilisateurs</title>
    <?php require_once 'phpinclude/commonmeta.php'; ?>
    <?php require_once 'phpinclude/theme.php'; ?>
    <?php FPLGlobal::render_bundle_css(); ?>
    <?php FPLGlobal::render_bundle_script(); ?>
</head>

<body>
    <?php require_once 'phpinclude/navbar.php'; ?>
    <div class="container">
        <h2>Liste des utilisateurs</h2>
        <form method="post" action="utilisateurs.php" class="form-inline mb-3">
            <input type="text" name="filtrenom" class="form-control mr-2" placeholder="Filtrer par nom" value="<?php echo htmlspecialchars($filtrenom); ?>">
            <button type="submit" class="btn btn-primary">Filtrer</button>
            <a href="utilisateurs.php" class="btn btn-secondary ml-2">Réinitialiser</a>
        </form>
        <a href="adduser.php" class="btn btn-success mb-3">Ajouter un utilisateur</a>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Login</th>
                    <th>Email</th>
                    <th>Date création</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($liste as $user): ?>
                    <tr>
                        <td><?php echo $user->id_utilisateur; ?></td>
                        <td><?php echo htmlspecialchars($user->utilisateur_nom); ?></td>
                        <td><?php echo htmlspecialchars($user->utilisateur_login); ?></td>
                        <td><?php echo htmlspecialchars($user->utilisateur_email); ?></td>
                        <td><?php echo $user->utilisateur_creation; ?></td>
                    </tr>
                <?php endforeach; ?>
                <?php if (count($liste) === 0): ?>
                    <tr>
                        <td colspan="5">Aucun utilisateur trouvé.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>

</html>