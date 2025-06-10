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
                        <a><i class="bi bi-eye"></i></a>
                        <a><i class="bi bi-pencil-square"></i></a>
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