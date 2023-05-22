<?php

namespace App\Models;

class DataLayer
{
    public function listSweet()
    {
        $sweets = Sweet::orderBy('name','asc')->get();
        return $sweets;
    }

    public function listSweetByCategoryId($categoryId)
    {
        $sweets = Sweet::where('category_id', $categoryId)->orderBy('name','asc')->get();
        return $sweets;
    }
    public function listSweetByCategoryName($category)
    {
    // give me the list of sweets where the category name is equal to the variable $category
        $sweets = Sweet::whereHas('category', function($query) use ($category) {
            $query->where('name', $category);
        })->orderBy('name','asc')->get();
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

    public function modifyUser($name, $password) {
        $user = User::where('email',$_SESSION['loggedEmail'])->first();
        $user->name = $name;
        $user->password = md5($password);
        $user->save();
    }
    
    public function getUserID($username) {
        $users = User::where('email',$username)->get(['id']);
        return $users[0]->id;
    }

    public function getUserName($email) {

        $users = User::where('email',$email)->get(['name']);
        return $users[0]->name;      
    }

}