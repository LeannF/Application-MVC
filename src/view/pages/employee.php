<div>
    <h2>Trajets proposés</h2>
    <table>
        <thead>
            <tr>
                <td>Départ</td>
                <td>Date</td>
                <td>Heure</td>
                <td>Destination</td>
                <td>Date</td>
                <td>Heure</td>
                <td>Places</td>
                <td></td>
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
                    <td>
                        <button data-bs-toggle='modal' data-bs-target='#infoRideModal'><i class="bi bi-eye"></i></button>
                        
                        <?php if (!empty($_SESSION['user']['id_user']) && $_SESSION['user']['id_user'] === $ride['id_user']): ?>
                            <button class="" data-bs-toggle='modal' data-bs-target='#editRideModal'>
                                <i class="bi bi-pencil-square"></i>
                            </button>
                        
                            <form method="POST" action="/ride/delete" onsubmit="return confirm('Supprimer ce trajet ?');">
                                <input type="hidden" name="id_ride" value="<?= $ride['id_ride'] ?>">
                                <button class="table-btn" type="submit"><i class="bi bi-trash"></i></button>
                            </form>
                        <?php endif ?>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>                
    </table>
</div>

<?php /** MODAL TO EDIT A RIDE */ ?>
<div class="modal" id="editRideModal" tabindex="-1" aria-labelledby="editRideModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/ride/edit" method="post">
                <div class="modal-header">
                    <h2 class="modal-title" id="editRideModal">Modifier votre trajet</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="arrival_date" class="form-label">Ville de départ <?php htmlspecialchars($ride['departure_city']) ?></label>
                        <select name="id_agency_departure" class="form-select" aria-label="Default select example">
                            <option selected>Ville de départ</option>
                            <?php if(isset($agencies)): ?>
                                <?php foreach ($agencies as $agency): ?>
                                    <option value="<?= htmlspecialchars($agency['id_agency']) ?>"><?= htmlspecialchars($agency['city']) ?></option>
                                <?php endforeach;?>
                            <?php endif;?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="departure_date" class="form-label">Date de départ <?php ?></label>
                        <input type="date" class="form-control" id="departure_date" name="departure_date">
                    </div>
                    <div class="mb-3">
                        <label for="departure_time" class="form-label">Heure de départ <?php ?></label>
                        <input type="time" class="form-control" id="departure_time" name="departure_time">
                    </div>
                    <div class="mb-3">
                        <label for="arrival_date" class="form-label">Ville d'arrivée <?php ?></label>
                        <select name="id_agency_arrival" class="form-select" aria-label="Default select example">
                            <option selected>Ville d'arrivée</option>
                            <?php if(isset($agencies)): ?>
                                <?php foreach ($agencies as $agency): ?>
                                    <option value="<?= htmlspecialchars($agency['id_agency']) ?>"><?= htmlspecialchars($agency['city']) ?></option>
                                <?php endforeach;?>
                            <?php endif;?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="arrival_date" class="form-label">Date d'arrivée <?php ?></label>
                        <input type="date" class="form-control" id="arrival_date" name="arrival_date">
                    </div>
                    <div class="mb-3">
                        <label for="arrival_time" class="form-label">Heure d'arrivée <?php ?></label>
                        <input type="time" class="form-control" id="arrival_time" name="arrival_time">
                    </div>
                    <div class="mb-3">
                        <label for="available_seat" class="form-label">Places disponibles <?php ?></label>
                        <input type="number" class="form-control" id="available_seat" name="available_seat">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Modifier le trajet</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php /** MODAL TO SEE THE CONTACT'S INFORMATIONS */ ?>
<div class="modal" id="infoRideModal" tabindex="-1" aria-labelledby="infoRideModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <div class="mb-3">
                        <span>Auteur :</span>
                        <p><?php ?></p>
                    </div>
                    <div class="mb-3">
                        <span>Télephone :</span>
                        <p><?php ?></p>
                    </div>
                    <div class="mb-3">
                        <span>Email :</span>
                        <p><?php ?></p>
                    </div>
                    <div class="mb-3">
                        <span>Nombre total de places :</span>
                        <p><?php ?></p>
                    </div>
            <div class="modal-footer">
                <button type="button" data-bs-dismiss="modal" class="btn btn-secondary">Fermer</button>
            </div>
        </div>
    </div>
</div>