<?php
namespace Keycloak\User\Entity;

use JsonSerializable;

/**
 * Class NewUser
 * @package Keycloak\User\Entity
 */
class NewUser implements JsonSerializable
{
    /**
     * @var string
     */
    public $username;

    /**
     * @var string
     */
    public $firstName;

    /**
     * @var string
     */
    public $lastName;

    /**
     * @var string
     */
    public $email;

    /**
     * @var bool
     */
    public $enabled;

    /**
     * @var array|null
     */
    public $attributes;

    /**
     * @var array|null
     */
    public $requiredActions;

    /**
     * NewUser constructor.
     * @param string $username
     * @param string $firstName
     * @param string $lastName
     * @param string $email
     * @param bool $enabled
     * @param array|null $attributes
     * @param array $requiredActions
     */
    public function __construct(
        string $username,
        string $firstName,
        string $lastName,
        string $email,
        bool $enabled = true,
        array $attributes = [],
        array $requiredActions = []
    ) {
        $this->username = $username;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->enabled = $enabled;
        $this->attributes = $attributes;
        $this->requiredActions = $requiredActions;
    }

    /**
     * @return NewUser
     */
    public function jsonSerialize(): NewUser
    {
        return $this;
    }
}
