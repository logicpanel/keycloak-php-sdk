<?php
namespace Keycloak\Exception;

use Throwable;

/**
 * Class KeycloakCredentialsException
 * @package Keycloak\Exception
 */
class KeycloakCredentialsException extends KeycloakException
{
    private const DEFAULT_CREDENTIALS_EXCEPTION = 'Invalid client credentials. Please check clientId, clientSecret, realm and url.';

    /**
     * KeycloakCredentialsException constructor.
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($message = self::DEFAULT_CREDENTIALS_EXCEPTION, $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}