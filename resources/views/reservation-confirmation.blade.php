<div style="font-family: Arial, sans-serif; background-color: #f4f6f8; padding: 40px;">
    <div style="max-width: 600px; margin: auto; background-color: #ffffff; border-radius: 12px; padding: 30px; box-shadow: 0 4px 12px rgba(0,0,0,0.08);">

        <h2 style="color: #2c3e50; font-size: 24px; margin-bottom: 10px;">Merci pour votre réservation !</h2>
        <p style="font-size: 16px; color: #555555; margin-bottom: 25px;">
            Voici un récapitulatif de votre réservation :
        </p>

        <ul style="list-style: none; padding: 0; font-size: 16px; color: #333;">
            <li style="margin-bottom: 12px;">
                <strong>Véhicule :</strong> {{ $vehicule->brand }} {{ $vehicule->model }}
            </li>
            <li style="margin-bottom: 12px;">
                <strong>Date de début de location:</strong> {{ $reservation['start_date'] }}
            </li>
            <li style="margin-bottom: 12px;">
                <strong>Date de fin de location:</strong> {{ $reservation['end_date'] }}
            </li>
            <li style="margin-bottom: 12px;">
                <strong>Prix total :</strong> {{ $reservation['total_price'] }} €
            </li>
        </ul>

        <p style="font-size: 16px; color: #444444; margin-top: 30px;">
            Nous restons à votre disposition pour toute question ou précision complémentaire.
        </p>

        <p style="font-size: 14px; color: #999999; margin-top: 35px; text-align: right;">
            Cordialement,<br>
            <strong>L'équipe de réservation</strong>
        </p>
    </div>
</div>
