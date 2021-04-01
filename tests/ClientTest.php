<?php

use Keycloak\Client\Api as ClientApi;
use Keycloak\Client\Entity\Client;
use Keycloak\User\Entity\CompositeRole;
use PHPUnit\Framework\TestCase;

require_once 'TestClient.php';

class ClientTest extends TestCase
{
    /**
     * @var ClientApi
     */
    protected $clientApi;

    protected function setUp(): void
    {
        global $client;
        $this->clientApi = new ClientApi($client);
    }

    public function testFindAll(): void
    {
        $allClients = $this->clientApi->findAll();
        $this->assertNotEmpty($allClients);
    }

    public function testFind(): void
    {
        // account is a standard client that should always exist
        $client = $this->clientApi->findByClientId('account');
        $this->assertInstanceOf(Client::class, $client);
        $this->assertInstanceOf(Client::class, $this->clientApi->find($client->id));
    }

    public function testFindNothing(): void
    {
        $this->assertNull($this->clientApi->findByClientId('blipblop'));
        $this->assertNull($this->clientApi->find('blipblop'));
    }

    public function testGetProtocolMappers(): void
    {
        $client = $this->clientApi->findByClientId('realm-management');
        $this->assertNotEmpty($client->protocolMappers);
    }

    public function testGetCompositeRolesWithPermissions(): void
    {
        $compositeRoles = $this->clientApi->getCompositeRolesWithPermissions('07e9ea75-b6f0-40b7-9bd3-b2d591b37e47');
        $this->assertNotEmpty($compositeRoles);
        $this->assertInstanceOf(CompositeRole::class, $compositeRoles[0]);
    }

}
