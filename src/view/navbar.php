<?php
    session_start();
    $role = $_SESSION['user']['role'] ?? 'guest';
?>

<nav class="position-relative">
    <h1>Touche pas au klaxon</h1>
    <?php switch ($role) {
        case 'admin':
            echo "<button>Utilisateurs</button>";
            echo "<button>Agences</button>";
            echo "<button>Trajets</button>";
            echo "Bonjour";
            echo "<button><a href='/logout'>Déconnexion</a></button>";
        break;
        
        case 'employee':
            echo "<button data-bs-toggle='modal' data-bs-target='#loginModal'>Créer un trajet</button>";
            echo "Bonjour";
            echo "<button><a href='/logout'>Déconnexion</a></button>";
        break;
        case 'guest':
            echo "<button data-bs-toggle='modal' data-bs-target='#loginModal' class='position-absolute end-0'>Connexion</button>";
        break;        
    } ?>
    <div class="modal" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="/login" method="post">
                    <div class="modal-header">
                        <h2 class="modal-title" id="loginModalLabel">Connexion</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="email" class="form-label">Adresse e-mail</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Se connecter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
   
    <div class="modal" id="createRideModal" tabindex="-1" aria-labelledby="createRideModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="/ride" method="post">
                    <div class="modal-header">
                        <h2 class="modal-title" id="createRideModalLabel">Ajout de trajet</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Ville de départ</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Date de départ</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Heure de départ</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Ville d'arrivée</option>
                                <?php foreach ($agencies as $agency): ?>
                                    <option value="1"><?= htmlspecialchars($agency['city']) ?></option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                <?php endforeach;?>
                            </select required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Date d'arrivée</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Heure d'arrivée</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Places disponibles</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Ajouter le trajet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</nav>