<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use App\Services\User\UserService;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Role;

class UserController extends Controller {
    protected $userService;

    public function __construct( UserService $userService ) {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index() {
        return $this->userService->index();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return UserResource
     */
    public function store( UserRequest $request ) {
        return $this->userService->add( $request );
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     *
     * @return UserResource
     */
    public function show( User $user ) {
        return $this->userService->content( $user );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param User        $user
     * @param UserRequest $request
     *
     * @return UserResource
     */
    public function update( User $user, UserRequest $request ) {
        return $this->userService->update( $request, $user );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     *
     * @return void
     */
    public function destroy( User $user ) {
        $this->userService->delete( $user );
    }
}
