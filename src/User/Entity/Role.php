<?php

namespace Keycloak\User\Entity;

use JsonSerializable;
use Keycloak\JsonDeserializable;

class Role implements JsonSerializable, JsonDeserializable
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
     * @var string|null
     */
    public $description;

    /**
     * @var bool
     */
    public $composite;

    /**
     * @var bool
     */
    public $clientRole;
    
    /**
     * @var string|null
     */
    public $clientId;

    /**
     * Role constructor.
     * @param string $id
     * @param string $name
     * @param string|null $description
     * @param bool $composite
     * @param bool $clientRole
     * @param string|null $clientId
     */
    public function __construct(
        string $id,
        string $name,
        ?string $description,
        bool $composite,
        bool $clientRole,
        ?string $clientId
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->clientRole = $clientRole;
        $this->clientId = $clientId;
        $this->composite = $composite;
    }

    /**
     * @return Role
     */
    public function jsonSerialize(): Role
    {
        return $this;
    }

    /**
     * @param string|array $json
     * @return mixed Should always return an instance of the class that implements this interface.
     */
    public static function fromJson($json): Role
    {
        $arr = is_array($json) ? $json : json_decode($json, true);
        return new self(
            $arr['id'],
            $arr['name'],
            $arr['description'] ?? null,
            $arr['composite'] ?? false,
            $arr['clientRole'],
            $arr['clientId']
        );
    }
}