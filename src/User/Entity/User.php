<?php
namespace Keycloak\User\Entity;

use JsonSerializable;
use Keycloak\JsonDeserializable;

/**
 * Class User
 * @package Keycloak\User\Entity
 */
class User implements JsonSerializable, JsonDeserializable
{
    /**
     * @var string|null
     */
    public $id;

    /**
     * @var string|null
     */
    public $username;

    /**
     * @var string|null
     */
    public $firstName;

    /**
     * @var string|null
     */
    public $lastName;

    /**
     * @var string|null
     */
    public $email;

    /**
     * @var bool|null
     */
    public $enabled;

    /**
     * @var bool|null
     */
    public $totp;

    /**
     * @var bool|null
     */
    public $emailVerified;

    /**
     * @var int|null
     */
    public $createdTimestamp;

    /**
     * @var int|null
     */
    public $notBefore;

    /**
     * @var array
     */
    public $attributes;

    /**
     * @var array
     */
    public $requiredActions;

    /**
     * @var array
     */
    public $access;

    /**
     * @var array
     */
    public $disableableCredentialTypes;

    /**
     * User constructor.
     * @param string|null $id
     * @param string|null $username
     * @param string|null $firstName
     * @param string|null $lastName
     * @param string|null $email
     * @param bool|null $enabled
     * @param bool|null $totp
     * @param bool|null $emailVerified
     * @param int|null $createdTimestamp
     * @param int|null $notBefore
     * @param array $attributes
     * @param array $requiredActions
     * @param array $access
     * @param array $disableableCredentialTypes
     */
    public function __construct(
        ?string $id,
        ?string $username,
        ?string $firstName,
        ?string $lastName,
        ?string $email,
        ?bool $enabled,
        ?bool $totp,
        ?bool $emailVerified,
        ?int $createdTimestamp,
        ?int $notBefore,
        array $attributes,
        array $requiredActions,
        array $access,
        array $disableableCredentialTypes
    ) {
        $this->id = $id;
        $this->username = $username;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->enabled = $enabled;
        $this->totp = $totp;
        $this->emailVerified = $emailVerified;
        $this->createdTimestamp = $createdTimestamp;
        $this->notBefore = $notBefore;
        $this->attributes = $attributes;
        $this->requiredActions = $requiredActions;
        $this->access = $access;
        $this->disableableCredentialTypes = $disableableCredentialTypes;
    }

    /**
     * @return User
     */
    public function jsonSerialize(): User
    {
        return $this;
    }

    /**
     * @param string|array $json
     * @return User
     */
    public static function fromJson($json): self
    {
        $arr = is_array($json) ? $json : json_decode($json, true);
        return new self(
            $arr['id'] ?? null,
            $arr['username'] ?? null,
            $arr['firstName'] ?? null,
            $arr['lastName'] ?? null,
            $arr['email'] ?? null,
            $arr['enabled'] ?? null,
            $arr['totp'] ?? null,
            $arr['emailVerified'] ?? null,
            $arr['createdTimestamp'] ?? null,
            $arr['notBefore'] ?? null,
            $arr['attributes'] ?? [],
            $arr['requiredActions'] ?? [],
            $arr['access'] ?? [],
            $arr['disableableCredentialTypes'] ?? []
        );
    }
}