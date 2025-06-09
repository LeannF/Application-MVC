<!DOCTYPE html>
<html lang = "fr" >
    <head>
        <meta charset="utf-8">
        <title>Touche pas au klaxon</title>
        <link rel="stylesheet" href="/style/bootstrap.min.css">
        <link rel="stylesheet" href="/style/style.css">
    </head>
    <body>
        <header>
            <?php require_once __DIR__ . '/navbar.php';?>
        </header>
        <main class="text-center">
            <h2>Pour obtenir plus d'informations sur un trajet, veuillez vous connecter</h2>
            <table>
                <thead>
                    <tr class="bg-dark">
                        <td>Départ</td>
                        <td>Date</td>
                        <td>Heure</td>
                        <td>Destination</td>
                        <td>Date</td>
                        <td>Heure</td>
                        <td>Places</td>
                        <?php
                            if($role == 'employee'){
                               print("<td></td>") ;
                            }
                        ?>
                    </tr>
                </thead>
                <tbody>       
                    <?php foreach ($rides as $ride): ?>
                        <tr>
                            <td><?= htmlspecialchars($ride['departure_city']) ?></td>
                            <td><?= htmlspecialchars($ride['departure_date']) ?></td>
                            <td><?= htmlspecialchars($ride['departure_time']) ?></td>
                            <td><?= htmlspecialchars($ride['arrival_city']) ?></td>
                            <td><?= htmlspecialchars($ride['arrival_date']) ?></td>
                            <td><?= htmlspecialchars($ride['arrival_time']) ?></td>
                            <td><?= htmlspecialchars($ride['available_seat']) ?></td>
                            <?php if ($role === 'employee'): ?>
                                <td>
                                    <a href="view.php?id=<?= urlencode($ride['id']) ?>" title="Voir le trajet">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="edit.php?id=<?= urlencode($ride['id']) ?>" title="Éditer le trajet">
                                        <!-- icône crayon -->
                                    </a>
                                    <a href="delete.php?id=<?= urlencode($ride['id']) ?>" title="Supprimer le trajet" onclick="return confirm('Confirmer la suppression ?');">
                                        <!-- icône poubelle -->
                                    </a>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?> 
                </tbody>                
            </table>
        </main>
        <footer class="position-absolute bottom-50 translate-middle">© 2024 - CENEF - MVC PHP</footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>