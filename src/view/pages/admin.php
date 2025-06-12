<?php require_once __DIR__ .'/../components/modals.php'; ?>

<div>
    <h2>Tableau de bord de l’administrateur</h2>
    <table id="rides" class="table-section">
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
            <?php foreach ($adminRide as $ride): ?> 
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

<div id="agencies" class="table-section" style="display: none;">
    <button data-bs-toggle='modal' data-bs-target='#createAgencyModal'>Ajouter une ville</button>
    <table>
        <thead>
            <tr>
                <td>Ville</td>
                <td></td>
            </tr>
        </thead>
        <tbody>       
            <?php foreach ($agencies as $agency): ?> 
                <tr >
                    <td><?= htmlspecialchars($agency['city']) ?></td>
                    <td>
                        <button class="edit-btn" data-id="<?= $agency['id_agency'] ?>" data-bs-toggle='modal' data-bs-target='#editAgencyModal'>
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        <form method="post" action="/agency/delete" onsubmit="return confirm('Supprimer cette ville ?');">
                            <input type="hidden" name="id_agency" value="<?= $agency['id_agency'] ?>">
                            <button class="table-btn" type="submit"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>  
    </table>
</div>

<div  id="users" class="table-section" style="display: none;">
    <table>
        <thead>
            <tr>
                <td>Prénom</td>
                <td>Nom</td>
                <td>Télephone</td>
                <td>Email</td>
                <td>Rôle</td>
            </tr>
        </thead>
        <tbody>       
            <?php foreach ($users as $user): ?> 
                <tr>
                    <td><?= htmlspecialchars($user['firstname']) ?></td>
                    <td><?= htmlspecialchars($user['lastname']) ?></td>
                    <td><?= htmlspecialchars($user['phonenumber']) ?></td>
                    <td><?= htmlspecialchars($user['email']) ?></td>
                    <td><?= htmlspecialchars($user['role']) ?></td>
                </tr>
            <?php endforeach;?>
        </tbody>  
    </table>
</div>