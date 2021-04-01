<?php

namespace Keycloak\Client\Entity;

use Keycloak\JsonDeserializable;

/**
 * Class ProtocolMapperConfig
 * @package Keycloak\Client\Entity
 */
class ProtocolMapperConfig implements JsonDeserializable
{
    /**
     * @var string|null
     */
    public $userAttribute;

    /**
     * @var string|null
     */
    public $claimName;

    /**
     * @var string|null
     */
    public $type;

    /**
     * @var bool|null
     */
    public $userInfoTokenClaim;

    /**
     * @var bool|null
     */
    public $idTokenClaim;

    /**
     * @var bool|null
     */
    public $accessTokenClaim;

    /**
     * @var string|null
     */
    public $userSessionNote;

    /**
     * ProtocolMapperConfig constructor.
     * @param string $userAttribute
     * @param string $claimName
     * @param string $type
     * @param string|null $userSessionNote
     * @param bool $userInfoTokenClaim
     * @param bool $idTokenClaim
     * @param bool $accessTokenClaim
     */
    public function __construct(
        ?string $userAttribute,
        ?string $claimName,
        ?string $type,
        ?string $userSessionNote,
        ?bool $userInfoTokenClaim,
        ?bool $idTokenClaim,
        ?bool $accessTokenClaim
    ) {
        $this->userAttribute = $userAttribute;
        $this->claimName = $claimName;
        $this->type = $type;
        $this->userInfoTokenClaim = $userInfoTokenClaim;
        $this->idTokenClaim = $idTokenClaim;
        $this->accessTokenClaim = $accessTokenClaim;
        $this->userSessionNote = $userSessionNote;
    }

    /**
     * @param array|string $json
     * @return ProtocolMapperConfig
     */
    public static function fromJson($json): self
    {
        $arr = is_array($json) ? $json : json_decode($json, true);
        return new self(
            $arr['user.attribute'] ?? null,
            $arr['claim.name'] ?? null,
            $arr['jsonType.label'] ?? null,
            $arr['user.session.note'] ?? null,
            $arr['userinfo.token.claim'] ?? null,
            $arr['id.token.claim'] ?? null,
            $arr['access.token.claim'] ?? null
        );
    }
}