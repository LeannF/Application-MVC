<div>
    <h2>Pannel Admin</h2>
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
                        <form method="POST" action="/ride/delete" onsubmit="return confirm('Supprimer ce trajet ?');">
                            <input type="hidden" name="id_ride" value="<?= $ride['id_ride'] ?>">
                            <button class="table-btn" type="submit"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>                
    </table>
</div>

<div class="modal" id="editRideModal" tabindex="-1" aria-labelledby="editRideModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/ride" method="post">
                <div class="modal-header">
                    <h2 class="modal-title" id="editRideModal">Ajout de trajet</h2>
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
                        <label for="available_seat" class="form-label">Places disponibles</label>
                        <input type="number" class="form-control" id="available_seat" name="available_seat" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Ajouter le trajet</button>
                </div>
            </form>
        </div>
    </div>
</div>