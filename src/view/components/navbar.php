<?php
    if (!isset($role)) {
        $role = $_SESSION['user']['role'] ?? 'guest';
    }
?>

<nav class="position-relative d-flex p-4">
    <h1>Touche pas au klaxon</h1>
    <?php
        switch ($role) {
            case 'admin':
                ?>
                <ul class="d-flex">
                    <button type="button" class="nav-btn" data-bs-toggle="button" onClick="showTable('users')">Utilisateurs</button>
                    <button type="button" class="nav-btn" data-bs-toggle="button" onClick="showTable('agencies')">Agences</button>
                    <button type="button" class="nav-btn active" data-bs-toggle="button"  onClick="showTable('rides')">Trajets</button>
                    <?php if (isset($_SESSION['user'])): ?>
                        <h2 class="end-0">
                            Bonjour <?= htmlspecialchars($_SESSION['user']['firstname']) ?>
                            <?= htmlspecialchars($_SESSION['user']['lastname']) ?>
                        </h2>
                    <?php endif; ?>
                    <a class='btn btn-dark position-absolute end-0 m-2' href='/logout'>Déconnexion</a>
                </ul>              
                <?php
            break;

            case 'employee':
                ?>
                <ul class="d-flex">
                    <button class="mx-5" data-bs-toggle='modal' data-bs-target='#createRideModal'>Créer un trajet</button>
                    <?php if (isset($_SESSION['user'])): ?>
                        <h2 class="end-0">
                            Bonjour <?= htmlspecialchars($_SESSION['user']['firstname']) ?>
                            <?= htmlspecialchars($_SESSION['user']['lastname']) ?>
                        </h2>
                    <?php endif; ?>
                    <a class='btn btn-dark position-absolute end-0 m-2' href='/logout'>Déconnexion</a>
                    </ul>          
                <?php
            break;

            case 'guest':
                ?>
                    <button data-bs-toggle='modal' data-bs-target='#loginModal' class='position-absolute end-0 m-2'>Connexion</button>
                <?php
            break;
        }
    ?>
</nav>

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
                        <select name="id_agency_departure" class="form-select" aria-label="Default select example">
                            <option selected>Ville de départ</option>
                            <?php if(isset($agencies)): ?>
                                <?php foreach ($agencies as $agency): ?>
                                    <option value="<?= htmlspecialchars($agency['id_agency']) ?>"><?= htmlspecialchars($agency['city']) ?></option>
                                <?php endforeach;?>
                            <?php endif;?>
                        </select required>
                    </div>
                    <div class="mb-3">
                        <label for="departure_date" class="form-label">Date de départ</label>
                        <input type="date" class="form-control" id="departure_date" name="departure_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="departure_time" class="form-label">Heure de départ</label>
                        <input type="time" class="form-control" id="departure_time" name="departure_time" required>
                    </div>
                    <div class="mb-3">
                        <select name="id_agency_arrival" class="form-select" aria-label="Default select example">
                            <option selected>Ville d'arrivée</option>
                            <?php if(isset($agencies)): ?>
                                <?php foreach ($agencies as $agency): ?>
                                    <option value="<?= htmlspecialchars($agency['id_agency']) ?>"><?= htmlspecialchars($agency['city']) ?></option>
                                <?php endforeach;?>
                            <?php endif;?>
                        </select required>
                    </div>
                    <div class="mb-3">
                        <label for="arrival_date" class="form-label">Date d'arrivée</label>
                        <input type="date" class="form-control" id="arrival_date" name="arrival_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="arrival_time" class="form-label">Heure d'arrivée</label>
                        <input type="time" class="form-control" id="arrival_time" name="arrival_time" required>
                    </div>
                    <div class="mb-3">
                        <label for="total_seat" class="form-label">Nombre total de place</label>
                        <input type="number" min="0" class="form-control" id="total_seat" name="total_seat" required>
                    </div>
                    <div class="mb-3">
                        <label for="available_seat" class="form-label">Places disponibles</label>
                        <input type="number" class="form-control" min="0" id="available_seat" name="available_seat" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Ajouter le trajet</button>
                </div>
            </form>
        </div>
    </div>
</div>