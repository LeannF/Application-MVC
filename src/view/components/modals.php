<div class="modal" id="createRideModal" tabindex="-1" aria-labelledby="createRideModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/ride/add" method="post">
                <div class="modal-header">
                    <h2 class="modal-title" id="createRideModalLabel">Ajout de ville</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="city" class="form-label">Ville à ajouter</label>
                        <input type="text" class="form-control" id="city" name="city" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Ajouter la ville</button>
                </div>
            </form>
        </div>
    </div>
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

<div class="modal" id="editAgencyModal" tabindex="-1" aria-labelledby="editAgencyModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
             <form action="/agency/edit" method="post">
                <input type="hidden" name="id_agency" id="edit-agency-id" value="<?= $agency['id_agency'] ?>">
                <div class="modal-header">
                    <h2 class="modal-title" id="createAgencyModalLabel">Modification de ville</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="city" class="form-label">Nouvelle Ville</label>
                        <input type="text" class="form-control" id="city" name="city" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Modifier la ville</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal" id="createAgencyModal" tabindex="-1" aria-labelledby="createAgencyModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/agency" method="post">
                <div class="modal-header">
                    <h2 class="modal-title" id="createAgencyModalLabel">Ajout de ville</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="city" class="form-label">Ville à ajouter</label>
                        <input type="text" class="form-control" id="city" name="city" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Ajouter la ville</button>
                </div>
            </form>
        </div>
    </div>
</div>