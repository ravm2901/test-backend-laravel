<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use JWTAuth;
use JWTAuthException;



class usersController extends Controller
{


    public function showAll(){
      $users = User::all();

      return $users;
    }



    public function getRawQuery(){
      $users = DB::select('SELECT * from users');

      return $users;
    }


    /***********************************************************/

    public function addUser(Request $request){

      try{
        $user = new User;

        $user->fill($request->all());

        //Validate database.Check if email exists BD

        $user->save();
        //User::create($user);
        return $user;
      }
      catch(\Exception $e){
        return $e->getMessage();
      }
    }




    public function getUser($id){
        $user = User::find($id);

        return $user;
    }





    public function getAllUsers(){
      return $this->getRawQuery();
    }




    public function updateUser($id, Request $request){
      $user = $this->getUser($id);

      $user->fill($request->all())->save();

      return $user;
    }




    public function deleteUser($id){
      $user = $this->getUser($id);

      $user->delete();

      return $user;
    }
}
