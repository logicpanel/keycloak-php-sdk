<?php
namespace Keycloak\User\Entity\Transformer;

use Keycloak\User\Entity\Role;

class RoleTransformer
{
    /**
     * @param string|null $clientId
     * @return callable
     */
    public static function createRoleTransformer(?string $clientId): callable
    {
        return static function(array $role) use ($clientId): Role {
            $role['clientId'] = $clientId;
            return Role::fromJson($role);
        };
    }

    /**
     * @param Role[] $roles
     * @param array $client
     * @return Role[]
     */
    public static function transformClientRoles(array $roles, array $client): array
    {
        $clientRoles = array_map(self::createRoleTransformer($client['id']), $client['mappings']);
        return array_merge($roles, $clientRoles);
    }

    /**
     * @param Role $role
     * @return array
     */
    public static function toMinimalIdentifiableRole(Role $role): array
    {
        return [
            'id' => $role->id,
            'name' => $role->name
        ];
    }
}