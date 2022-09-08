<?php


namespace App\Services\Role;


use App\Http\Resources\Role\RoleResource;
use App\Models\Role;

class RoleService {

    public function index() {
        $roles = Role::all();

        return RoleResource::collection( $roles );
    }

    public function add( $request ) {
        $role = Role::create( array_merge($request->only( 'name'), ['guard_name' => 'api']));

        return new RoleResource( $role );
    }

    public function content( $role ) {
        return new RoleResource($role );
    }

    public function update( $role, $request) {
        $role->update( $request->only( ['name'] ) );
        $role->permissions()->sync( $request->get( 'permissions' ) );

        return new RoleResource( $role );
    }

    public function delete( $role ) {
        $role->delete();
    }

}
