<!DOCTYPE html>
<html lang = "fr" >
    <head>
        <meta charset="utf-8">
        <title>Touche pas au klaxon</title>
        <link rel="stylesheet" href="/style/bootstrap.min.css">
        <link rel="stylesheet" href="/style/style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    </head>
    <body>
        <header>
            <?php require_once __DIR__ . '/components/navbar.php';?>
        </header>
        <main class="text-center">
           <?php
                if (isset($view)) {
                    if (file_exists($view)) {
                        include $view;
                    } else {
                        echo "<p>Erreur : vue '$view' introuvable.</p>";
                    }
                } else {
                    echo "<p>Erreur : aucune vue définie (variable \$view absente).</p>";
                }
            ?>
        </main>
        <footer>© 2024 - CENEF - MVC PHP</footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="/js/script.js"></script>
    </body>
</html>