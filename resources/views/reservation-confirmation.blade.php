<div style="font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 30px;">
    <div style="max-width: 600px; margin: auto; background-color: #ffffff; border-radius: 10px; padding: 20px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">

        <h2 style="color: #2c3e50;">Merci pour votre réservation !</h2>
        <p style="font-size: 16px; color: #333333;">Voici les détails de votre réservation :</p>

        <ul style="list-style-type: none; padding: 0;">
            <li style="margin-bottom: 10px;">
                <strong>Véhicule :</strong> {{ $vehicule->brand }} {{ $vehicule->model }}
            </li>
            <li style="margin-bottom: 10px;">
                <strong>Date de début de location:</strong> {{ $reservation['start_date'] }}
            </li>
            <li style="margin-bottom: 10px;">
                <strong>Date de fin de location:</strong> {{ $reservation['end_date'] }}
            </li>
            <li style="margin-bottom: 10px;">
                <strong>Prix total :</strong> {{ $reservation['total_price'] }} €
            </li>
        </ul>

        <p style="font-size: 16px; color: #333333;">Nous restons à votre disposition pour toute question ou information complémentaire.</p>

        <p style="font-size: 14px; color: #999999; margin-top: 30px;">Cordialement,<br>L'équipe de réservation</p>
    </div>
</div>
