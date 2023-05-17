<?php

namespace App\Models;

class DataLayer
{
    // TODO chiedere al profe come prendere in ingresso il nome della categoria per fare un filtering 
    // public function listSweet($category)
    // {
    //     if(!empty($category))
    //     {
    //     $sweets = Sweet::where('category', $category)->orderBy('name','asc')->get();
    //     return $sweets;
    //     }
    //     else
    //     {
    //         $sweets = Sweet::orderBy('name','asc')->get();
    //         return $sweets;
    //     }
    // }

    public function listSweet()
    {
        $sweets = Sweet::orderBy('name','asc')->get();
        return $sweets;
    }

    public function listSweetByCategory($category)
    {
        $sweets = Sweet::where('category_id', $category)->orderBy('name','asc')->get();
        return $sweets;
    }
    public function validUser($username, $password) {
        $users = User::where('email',$username)->get(['password']);
        
        if(count($users) == 0)
        {
            return false;
        }
        
        return (md5($password) == ($users[0]->password));
    }

    public function addUser($name, $password, $email) {
        $user = new User();
        $user->name = $name;
        $user->password = md5($password);
        $user->email = $email;
        $user->save();
    }
    
    public function getUserID($username) {
        $users = User::where('email',$username)->get(['id']);
        return $users[0]->id;
    }

    public function getUserName($email) {
        $users = User::where('email',$email)->get();
        return $users[0]->name;
    }

}