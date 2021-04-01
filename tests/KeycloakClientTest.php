<?php

use Keycloak\Exception\KeycloakCredentialsException;
use Keycloak\KeycloakClient;
use PHPUnit\Framework\TestCase;

require_once 'TestClient.php';

/**
 * Class ClientTest
 */
final class KeycloakClientTest extends TestCase
{
    public function testInvalidKeycloakClient(): void
    {
        $brokenClient = new KeycloakClient('this', 'client', 'is', 'http://broken.com');
        $this->expectException(KeycloakCredentialsException::class);
        $brokenClient->sendRequest('GET', '/');
    }

    public function testValidKeycloakClient(): void
    {
        global $client;
        $res = $client->sendRequest('GET', '/');
        $this->assertEquals(200, $res->getStatusCode());
    }
}

