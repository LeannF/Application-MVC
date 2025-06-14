<div>
    <h2>Pour obtenir plus d'informations sur un trajet, veuillez vous connecter</h2>
    <table class="m-auto">
        <thead>
            <tr>
                <td>Départ</td>
                <td>Date</td>
                <td>Heure</td>
                <td>Destination</td>
                <td>Date</td>
                <td>Heure</td>
                <td>Places disponibles</td>
            </tr>
        </thead>
        <tbody>       
            <?php if(!empty($rides)) : ?>
                <?php foreach ($rides as $ride): ?>
                    <tr>
                        <td><?= htmlspecialchars($ride['departure_city']) ?></td>
                        <td><?= htmlspecialchars($ride['departure_date']) ?></td>
                        <td><?= htmlspecialchars($ride['departure_time']) ?></td>
                        <td><?= htmlspecialchars($ride['arrival_city']) ?></td>
                        <td><?= htmlspecialchars($ride['arrival_date']) ?></td>
                        <td><?= htmlspecialchars($ride['arrival_time']) ?></td>
                        <td><?= htmlspecialchars($ride['available_seat']) ?></td>
                    </tr>
                <?php endforeach; ?> 
            <?php endif; ?>
        </tbody>                
    </table>                
</div>