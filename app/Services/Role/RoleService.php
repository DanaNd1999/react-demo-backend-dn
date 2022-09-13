<?php


namespace App\Services\Role;


use App\Models\Role;

class RoleService {

    public function index() {
        return Role::paginate(5);
    }

    public function add( $request ) {
        return Role::create( array_merge( $request->only( 'name' ), [ 'guard_name' => 'api' ] ) );
    }


    public function update( $role, $request ) {
        $role->update( $request->only( [ 'name' ] ) );
        $role->permissions()->sync( $request->get( 'permissions' ) );

        return $role;
    }

    public function delete( $role ) {
        $role->delete();
    }

}
