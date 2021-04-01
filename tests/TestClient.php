<?php

use Keycloak\KeycloakClient;
use Symfony\Component\Dotenv\Dotenv;

(new Dotenv(false))->loadEnv(__DIR__ . '/.env');

class TestClient
{
    public static function createClient(): KeycloakClient
    {
        $client = new KeycloakClient(
            $_SERVER['KC_CLIENT_ID'],
            $_SERVER['KC_CLIENT_SECRET'],
            $_SERVER['KC_REALM'],
            $_SERVER['KC_URL']
        );

        return $client;
    }
}

$client = TestClient::createClient();
