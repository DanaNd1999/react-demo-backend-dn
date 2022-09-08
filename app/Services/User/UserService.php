<?php


namespace App\Services\User;

use App\Http\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserService {

    public function index() {

        $users = User::all();

        return UserResource::collection( $users );
    }

    public function add( $request ) {
        $user = User::create( array_merge($request->only( [ 'name', 'email', 'password' ] ), ['password' => $this->hashPassword($request->get('password'))]) );
        $user->roles()->attach( $request->only( [ 'roles' ] ) );

        return new UserResource( $user );
//        }
    }

    public function content( User $user ) {
        return new UserResource( $user );
    }

    public function update( $request, $user ) {
        $user->update( $request->only( [ 'name', 'email'] ) );
        if ($request->has('password')){
            $user->password = $this->hashPassword($request->get('password'));
            $user->save();
        }
        $user->roles()->sync( $request->get('roles') );

        return new UserResource($user);
    }

    public function delete( User $user ) {
        $user->delete();
    }

    public function hashPassword($password){
        return Hash::make( $password );
    }

}
