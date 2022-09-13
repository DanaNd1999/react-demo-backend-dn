<?php


namespace App\Services\Permission;

use App\Models\Permission;

class PermissionService {

    public function index() {
        return Permission::paginate(5);
    }

    public function add( $request ) {
        return Permission::create( array_merge( $request->only( 'name' ), [ 'guard_name' => 'api' ] ) );
    }

    public function update( $request, $permission ) {
         $permission->update( $request->only( 'name' ) );
    }

    public function delete( $permission ) {
        $permission->delete();
    }

}
