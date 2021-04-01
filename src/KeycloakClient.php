<?php
namespace Keycloak;

use Exception;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;
use Keycloak\Exception\KeycloakCredentialsException;
use Keycloak\Exception\KeycloakException;
use League\OAuth2\Client\Provider\GenericProvider;
use Psr\Http\Message\ResponseInterface;

class KeycloakClient
{
    /**
     * @var GenericProvider
     */
    private $oauthProvider;

    /**
     * @var GuzzleClient
     */
    private $guzzleClient;

    /**
     * KeycloakClient constructor.
     * @param string $clientId
     * @param string $clientSecret
     * @param string $realm
     * @param string $url
     */
    public function __construct(
        string $clientId,
        string $clientSecret,
        string $realm,
        string $url
    ) {
        $this->oauthProvider = new GenericProvider([
            'clientId' => $clientId,
            'clientSecret' => $clientSecret,
            'urlAccessToken' => "$url/auth/realms/$realm/protocol/openid-connect/token",
            'urlAuthorize' => '',
            'urlResourceOwnerDetails' => ''
        ]);
        $this->guzzleClient = new GuzzleClient(['base_uri' => "$url/auth/admin/realms/$realm/"]);
    }

    /**
     * @param string $method
     * @param string $uri
     * @param mixed $body
     * @param array $headers
     * @return ResponseInterface
     * @throws KeycloakException
     */
    public function sendRequest(string $method, string $uri, $body = null, array $headers = []): ResponseInterface
    {
        try {
            $accessToken = $this->oauthProvider->getAccessToken('client_credentials');
        } catch (Exception $ex) {
            throw new KeycloakCredentialsException();
        }

        if ($body !== null) {
            $headers['Content-Type'] = 'application/json';
        }

        $request = $this->oauthProvider->getAuthenticatedRequest(
            $method,
            $uri,
            $accessToken,
            ['headers' => $headers, 'body' => json_encode($body)]
        );

        try {
            return $this->guzzleClient->send($request);
        } catch (GuzzleException $ex) {
            throw new KeycloakException(
                $ex->getMessage(),
                $ex->getCode(),
                $ex
            );
        }
    }

    /**
     * @return GenericProvider
     */
    public function getOAuthProvider(): GenericProvider
    {
        return $this->oauthProvider;
    }
}