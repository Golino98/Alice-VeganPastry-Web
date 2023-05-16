<?php

namespace App\Models;

class DataLayer
{
    // TODO chiedere al profe come prendere in ingresso il nome della categoria per fare un filtering 
    public function listSweet($category)
    {
        if(empty($category))
        {
        $sweets = Sweet::where('category', $category)->orderBy('name','asc')->get();
        return $sweets;
        }
        else
        {
            $sweets = Sweet::orderBy('name','asc')->get();
            return $sweets;
        }
    }

    public function validUser($email, $password) 
    {
        // Mi ritorna la psw dentro il database che è stata cifrata
        $users = User::where('email', $email)->get(['password']);

        if(count($users)==0)
        {
            return false;
        }
        //Faccio il confronto fra la psw nel databade e quella inserita dall'utente (dopo averla cifrata)
        return(md5($password) == $users[0]->password);
    }        

    public function getUserName($email)
    {
        $users = User::where('email', $email)->get();
        
        //Ritorno il nome dell'utente, è un array, ma so che l'unico che viene trovato è quello con l'email inserita, quindi prendo il primo elemento dell'array
        return $users[0]->name;                
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
}