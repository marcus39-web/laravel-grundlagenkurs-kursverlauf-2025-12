<?php

// Diese Konfigurationsdatei speichert die Zugangsdaten und Einstellungen für Drittanbieter-Dienste.
// Hier werden z.B. API-Keys für Mailgun, Postmark, AWS, Slack usw. zentral verwaltet.
// Die Werte werden meist aus der .env-Datei gelesen, können aber auch direkt hier gesetzt werden.

return [

    // Zugangsdaten für Postmark (E-Mail-Dienst)
    'postmark' => [
        'key' => env('POSTMARK_API_KEY'),
    ],

    // Zugangsdaten für Resend (E-Mail-Dienst)
    'resend' => [
        'key' => env('RESEND_API_KEY'),
    ],

    // Zugangsdaten für Amazon SES (Simple Email Service)
    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    // Zugangsdaten für Slack-Benachrichtigungen
    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

];
