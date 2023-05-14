<?php

namespace App\Models;

class DataLayer
{
    public function listSweets()
    {
        $sweets = Sweet::orderBy('name','asc')->get();
        return $sweets;
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
}