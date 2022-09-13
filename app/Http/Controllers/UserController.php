<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use App\Services\User\UserService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use phpDocumentor\Reflection\Types\Resource_;

class UserController extends Controller {
    protected UserService $userService;

    public function __construct( UserService $userService ) {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection {
        $users = $this->userService->index();

        return UserResource::collection( $users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return UserResource
     */
    public function store( UserRequest $request ): UserResource{
        $user = $this->userService->add( $request );

        return new UserResource( $user );
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     *
     * @return UserResource
     */
    public function show( User $user ) : UserResource{
        return new UserResource( $user );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param User        $user
     * @param UserRequest $request
     *
     * @return UserResource
     */
    public function update( User $user, UserRequest $request ) : void {
        $this->userService->update( $request, $user );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     *
     * @return void
     */
    public function destroy( User $user ) : void {
        $this->userService->delete( $user );
    }
}
