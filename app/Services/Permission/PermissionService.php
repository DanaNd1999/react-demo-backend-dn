<?php


namespace App\Services\Permission;


use App\Http\Resources\Permission\PermissionResource;
use App\Models\Permission;

class PermissionService {

    public function index() {
        $permissions = Permission::all();

        return PermissionResource::collection( $permissions );
    }

    public function add($request){
        $permission = Permission::create(array_merge($request->only( 'name'), ['guard_name' => 'api']));

        return new PermissionResource($permission);
    }

    public function content($permission){
        return new PermissionResource( $permission );
    }

    public function update($request, $permission){
        $permission->update( $request->only( 'name', 'guard_name' ) );
        return new PermissionResource( $permission );
    }

    public function delete($permission){
        $permission->delete();
    }

}
