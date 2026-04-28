<?php require_once '../comfpl/main.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo isset(FPLGlobal::$view_bag->title) ? FPLGlobal::$view_bag->title : 'Team Up'; ?></title>
    <?php require_once 'phpinclude/commonmeta.php'; ?>
    <?php require_once 'phpinclude/theme.php'; ?>
    <?php FPLGlobal::render_bundle_css(); ?>
    <?php FPLGlobal::render_bundle_script(); ?>
</head>
<body>
    <?php require_once 'phpinclude/navbar.php'; ?>
    <div class="container mt-4">
        <?php echo FPLGlobal::$view_result->content ?? ''; ?>
    </div>
</body>
</html>