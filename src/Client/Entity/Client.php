<?php

namespace Keycloak\Client\Entity;

use Keycloak\JsonDeserializable;

class Client implements JsonDeserializable
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $clientId;

    /**
     * @var bool
     */
    public $enabled;

    /**
     * @var array
     */
    public $attributes;

    /**
     * @var array
     */
    public $webOrigins;

    /**
     * @var array
     */
    public $redirectUris;

    /**
     * @var ProtocolMapper[]
     */
    public $protocolMappers;

    /**
     * Client constructor.
     * TODO: this obviously isn't everything yet.
     * @param string $id
     * @param string $clientId
     * @param bool $enabled
     * @param array $attributes
     * @param array $webOrigins
     * @param array $redirectUris
     * @param ProtocolMapper[] $protocolMappers
     */
    public function __construct(
        string $id,
        string $clientId,
        bool $enabled,
        array $attributes,
        array $webOrigins,
        array $redirectUris,
        array $protocolMappers
    ) {
        $this->id = $id;
        $this->clientId = $clientId;
        $this->enabled = $enabled;
        $this->attributes = $attributes;
        $this->webOrigins = $webOrigins;
        $this->redirectUris = $redirectUris;
        $this->protocolMappers = $protocolMappers;
    }

    /**
     * @param string|array $json
     * @return Client
     */
    public static function fromJson($json): Client
    {
        $arr = is_array($json) ? $json : json_decode($json, true);
        return new self(
            $arr['id'],
            $arr['clientId'],
            $arr['enabled'],
            $arr['attributes'] ?? [],
            $arr['webOrigins'],
            $arr['redirectUris'],
            array_map([ProtocolMapper::class, 'fromJson'], $arr['protocolMappers'] ?? [])
        );
    }
}