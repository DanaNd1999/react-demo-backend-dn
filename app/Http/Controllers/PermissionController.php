<?php

namespace App\Http\Controllers;

use App\Http\Requests\Permission\PermissionRequest;
use App\Http\Resources\Permission\PermissionResource;
use App\Models\Permission;
use App\Services\Permission\PermissionService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PermissionController extends Controller {
    protected PermissionService $permissionService;

    public function __construct( PermissionService $permissionService ) {
        $this->permissionService = $permissionService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection{
        $permissions =  $this->permissionService->index();

        return PermissionResource::collection( $permissions );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return PermissionResource
     */
    public function store( PermissionRequest $request ) : PermissionResource {
        $permission = $this->permissionService->add( $request);

        return new PermissionResource( $permission );
    }

    /**
     * Display the specified resource.
     *
     * @param Permission $permission
     *
     * @return PermissionResource
     */
    public function show( Permission $permission ) : PermissionResource {

        return new PermissionResource( $permission );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PermissionRequest $request
     * @param Permission        $permission
     *
     * @return PermissionResource
     */
    public function update( Permission $permission, PermissionRequest $request ) : void {
        $this->permissionService->update( $request, $permission );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Permission $permission
     *
     * @return void
     */
    public function destroy( Permission $permission ) {
        $this->permissionService->delete( $permission );
    }
}
