<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Create new user
     * 
     * @param string $firstName user first name
     * @param string $lastName user last name
     * @param string $pronoun user pronouns
     * @param string $email user email
     * @param string $phone user phone number
     * @param string $state user state
     * @param string $password user password
     * 
     * @return bool
     */
    public function new($firstName, $lastName, $pronoun, $email, $phone, $state, $password)
    {
        $user = new User();
        $user->first_name = $firstName;
        $user->last_name = $lastName;
        $user->pronoun = $pronoun;
        $user->email = $email;
        $user->phone = $phone;
        $user->state = $state;
        $user->password = Hash::make($password);
        $user->save();
        return $user->id;
    }

    /**
     * Make user organizer
     * 
     * @param integer $id user id
     * 
     * @return bool
     */
    public function makeOrganizer($id)
    {
        return User::where('id', $id)->update(['organizer'=>1]);
    }

    /**
     * Make user admin
     * 
     * @param integer $id user id
     * 
     * @return bool
     */
    public function makeAdmin($id)
    {
        return User::where('id', $id)->update(['admin'=>1]);
    }

    /**
     * Get users
     * 
     * @return object
     */
    public function allUsers()
    {
        return User::where('admin', 0)->get();
    }

    /**
     * Get organizers
     * 
     * @return object
     */
    public function organizers()
    {
        return User::where('organizer', 1)->get();
    }

    /**
     * Get users
     * 
     * @return object
     */
    public function users()
    {
        return User::where('admin', 0)->where('organizer', 0)->get();
    }

    /**
     * Return a user
     * 
     * @param integer $id user id
     * 
     * @return object
     */
    public function getUser($id)
    {
        return User::find($id);
    }
}
