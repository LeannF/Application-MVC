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

<?php /** MODAL TO EDIT A RIDE */ ?>
<div class="modal" id="editRideModal" tabindex="-1" aria-labelledby="editRideModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/ride/edit" method="post">
                <input type="hidden" name="id_ride" value="<?= $ride['id_ride'] ?>">
                <div class="modal-header">
                    <h2 class="modal-title" id="editRideModal">Modifier votre trajet</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="id_agency_departure" class="form-label">Ville de départ</label>
                        <select name="id_agency_departure" class="form-select">
                            <option value="" selected disabled hidden>Ville de départ</option>
                            <?php if(isset($agencies)): ?>
                                <?php foreach ($agencies as $agency): ?>
                                    <option value="<?= htmlspecialchars($agency['id_agency']) ?>"><?= htmlspecialchars($agency['city']) ?></option>
                                <?php endforeach;?>
                            <?php endif;?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="departure_date" class="form-label">Date de départ</label>
                        <input type="date" class="form-control" name="departure_date">
                    </div>
                    <div class="mb-3">
                        <label for="departure_time" class="form-label">Heure de départ</label>
                        <input type="time" class="form-control" name="departure_time">
                    </div>
                    <div class="mb-3">
                        <label for="id_agency_arrival" class="form-label">Ville d'arrivée</label>
                        <select name="id_agency_arrival" class="form-select">
                            <option value="" selected disabled hidden>Ville d'arrivée</option>
                            <?php if(isset($agencies)): ?>
                                <?php foreach ($agencies as $agency): ?>
                                    <option value="<?= htmlspecialchars($agency['id_agency']) ?>"><?= htmlspecialchars($agency['city']) ?></option>
                                <?php endforeach;?>
                            <?php endif;?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="arrival_date" class="form-label">Date d'arrivée </label>
                        <input type="date" class="form-control" name="arrival_date">
                    </div>
                    <div class="mb-3">
                        <label for="arrival_time" class="form-label">Heure d'arrivée </label>
                        <input type="time" class="form-control" name="arrival_time">
                    </div>
                    <div class="mb-3">
                        <label for="available_seat" class="form-label">Places disponibles</label>
                        <input type="number" min="0" class="form-control" name="available_seat">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Modifier le trajet</button>
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