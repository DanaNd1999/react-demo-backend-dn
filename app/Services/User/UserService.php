<?php


namespace App\Services\User;

use App\Models\User;

class UserService {

    public function index() {
       return User::paginate(5);
    }

    public function add( $request ) {
        $user = User::create( array_merge($request->only( [ 'name', 'email', 'password' ] ), ['password' => $request->get('password')]) );
        $user->roles()->attach( $request->only( [ 'roles' ] ) );

        return $user;
    }

    public function update( $request, $user ) {
        $user->update( $request->only( [ 'name', 'email'] ) );

        if ($request->has('password')){
            $user->password = $request->get('password');
            $user->save();
        }
        $user->roles()->sync( $request->get('roles') );

        return $user;
    }

    public function delete( User $user ) {
        $user->delete();
    }

}
