<?php

namespace Keycloak\Client\Entity;

use Keycloak\JsonDeserializable;

/**
 * Class ProtocolMapper
 * @package Keycloak\Client\Entity
 */
class ProtocolMapper implements JsonDeserializable
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var ProtocolMapperConfig
     */
    public $config;

    /**
     * @var string
     */
    public $protocol;

    /**
     * @var string
     */
    public $protocolMapper;

    /**
     * @var bool
     */
    public $consentRequired;

    /**
     * ProtocolMapper constructor.
     * @param string $id
     * @param string $name
     * @param ProtocolMapperConfig $config
     * @param string $protocol
     * @param string $protocolMapper
     * @param bool $consentRequired
     */
    public function __construct(
        string $id,
        string $name,
        ProtocolMapperConfig $config,
        string $protocol = 'openid-connect',
        string $protocolMapper = 'oidc-usermodel-attribute-mapper',
        bool $consentRequired = false
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->config = $config;
        $this->protocol = $protocol;
        $this->protocolMapper = $protocolMapper;
        $this->consentRequired = $consentRequired;
    }


    /**
     * @param string|array $json
     * @return ProtocolMapper
     */
    public static function fromJson($json): self
    {
        $arr = is_array($json) ? $json : json_decode($json, true);
        return new self(
            $arr['id'],
            $arr['name'],
            ProtocolMapperConfig::fromJson($arr['config']),
            $arr['protocol'],
            $arr['protocolMapper'],
            $arr['consentRequired']
        );
    }
}