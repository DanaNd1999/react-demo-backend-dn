<?php

namespace App\Http\Controllers;

use App\Http\Requests\Role\RoleRequest;
use App\Http\Resources\Role\RoleResource;
use App\Models\Role;
use App\Services\Role\RoleService;

class RoleController extends Controller {
    protected $roleService;

    public function __construct( RoleService $roleService ) {
        $this->roleService = $roleService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index() {
        return $this->roleService->index();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return RoleResource
     */
    public function store( RoleRequest $request ) {
        return $this->roleService->add( $request );
    }

    /**
     * Display the specified resource.
     *
     * @param Role $role
     *
     * @return RoleResource
     */
    public function show( Role $role ) {
        return $this->roleService->content( $role );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RoleRequest $request
     * @param Role        $role
     *
     * @return RoleResource
     */
    public function update( Role $role,  RoleRequest $request ) {

        return $this->roleService->update( $role, $request );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Role $role
     *
     * @return void
     */
    public function destroy( Role $role ) {
        $this->roleService->delete( $role );
    }
}
