<?php
namespace Keycloak;

/**
 * Interface JsonDeserializable
 * @package Keycloak
 */
interface JsonDeserializable
{
    /**
     * @param string|array $json
     * @return mixed Should always return an instance of the class that implements this interface.
     */
    public static function fromJson($json);
}