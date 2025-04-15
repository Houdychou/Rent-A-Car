<div style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f6f8; padding: 40px;">
    <div style="max-width: 600px; margin: auto; background-color: #ffffff; border-radius: 12px; padding: 30px; box-shadow: 0 4px 12px rgba(0,0,0,0.08);">

        <div style="text-align: center; margin-bottom: 30px;">
            <img src="https://img.freepik.com/vecteurs-premium/louer-logo-entreprise-voiture_647963-155.jpg?w=996" alt="Logo entreprise" style="max-width: 160px; border-radius: 8px;">
        </div>

        <p style="background: #eafaf1; color: #27ae60; padding: 10px 16px; border-radius: 8px; font-weight: 600; text-align: center; margin: 15px 0 25px 0;">
            Votre réservation a bien été confirmée
        </p>

        <h2 style="color: #2c3e50; font-size: 24px; margin-bottom: 10px; text-align: center;">
            Merci pour votre réservation !
        </h2>

        <p style="font-size: 16px; color: #555555; margin-bottom: 25px; text-align: center;">
            Voici un récapitulatif de votre réservation :
        </p>

        <ul style="list-style: none; padding: 0; font-size: 16px; color: #333; line-height: 1.6;">
            <li><strong>Véhicule :</strong> {{ $vehicule->brand }} {{ $vehicule->model }} ({{ $vehicule->year }})</li>
            <li><strong>Carburant :</strong> {{ ucfirst($vehicule->fuel_type) }}</li>
            <li><strong>Transmission :</strong> {{ ucfirst($vehicule->transmission) }}</li>
            <li><strong>Portes :</strong> {{ $vehicule->doors ?? 'Non spécifié' }}</li>
            <li><strong>Places :</strong> {{ $vehicule->seats ?? 'Non spécifié' }}</li>
            <li><strong>Climatisation :</strong> {{ $vehicule->air_conditioning ? 'Incluse' : 'Non incluse' }}</li>
            <li><strong>Date de début de location :</strong> {{ $reservation['start_date'] }}</li>
            <li><strong>Date de fin de location :</strong> {{ $reservation['end_date'] }}</li>
            <li><strong>Prix total à payer :</strong> {{ $reservation['total_price'] }} €</li>
        </ul>

        <p style="font-size: 16px; color: #444444; margin-top: 30px;">
            Pour récupérer votre véhicule, veuillez présenter cet email à l'agence de location.<br>
            Nous restons à votre disposition pour toute question ou précision complémentaire.
        </p>

        <p style="font-size: 14px; color: #999999; margin-top: 35px; text-align: right;">
            Cordialement,<br>
            <strong>L'équipe de réservation</strong>
        </p>
    </div>
</div>
