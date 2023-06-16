<?php

namespace App\Models;

class DataLayer
{
    public function listSweet()
    {
        $sweets = Sweet::orderBy('name','asc')->get();
        return $sweets;
    }

    public function getSweetById($id)
    {
        $sweet = Sweet::find($id);
        return $sweet;
    }

    public function listCategory()
    {
        $categories = Category::orderBy('name','asc')->get();
        return $categories;
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

    public function addSweet($name, $category, $price, $description, $image) {
        $dl = new DataLayer();
        $categoryId = $dl->getCategoryIdByName($category);

        $sweet = new Sweet();
        $sweet->name = $name;
        $sweet->category_id = $categoryId;
        $sweet->price = $price;
        $sweet->description = $description;

        $destination = "img/sweets/".strtolower($category)."/";
        $filename = $_FILES['image']['name'];

        // Save the uploaded file in the destination folder
        move_uploaded_file($_FILES['image']['tmp_name'], $destination.$filename);
        
        $sweet->image = $filename;
        $sweet->save();
    }

    public function addCategory($name) {
        $category = new Category();
        $category->name = $name;
        $category->save();
    }

    public function modifySweet($id, $name, $category, $price, $description)
    {
        $sweet = Sweet::find($id);
        $sweet->name = $name;
        $sweet->category_id = $category;
        $sweet->price = $price;
        $sweet->description = $description;
        $sweet->save();
    }

    public function modifyCategory($id, $name)
    {
        $category = Category::find($id);
        $category->name = $name;
        $category->save();
    }

    public function deleteSweet($id) {
        $sweet = Sweet::find($id);
        $sweet->delete();
    }

    public function deleteCategory($id) {
        $category = Category::find($id);
        $category->delete();
    }

    public function modifyUser($name, $password,$conf_password) {
        $user = User::where('email',$_SESSION['loggedEmail'])->first();
        $user->name = $name;
        if($password == $conf_password)
        {
            $user->password = md5($password);
            $user->save();
        }
        else
        {
            throw new \ErrorException();
        }        
    }
    
    public function getUserID($email) {
        $users = User::where('email',$email)->get(['id']);
        return $users[0]->id;
    }

    public function getUserName($email) {
        $users = User::where('email',$email)->get(['name']);
        try{
            return $users[0]->name;      
        }
        catch(\Exception $e)
        {
            $_SESSION['errorMessage'] = "l'email inserita non è presente nel nostro database!";
            return view('auth.authErrorPage');
        }
    }

    public function getCategoryById($id) {
        $category = Category::find($id);
        return $category;
    }

    public function getCategoryIdByName($category) {
        $categories = Category::where('name',$category)->get(['id']);
        return $categories[0]->id;
    }

    public function getUserPrivilegies($email) {
        $users = User::where('email',$email)->get(['admin']);
        return ($users[0]->admin);
    }

    public function getCart($email) 
    {
        $user = User::where('email',$email)->first();
        // crea una lista di tutti i carrelli che han come user_id l'id dell'utente loggato
        $carts = Cart::where('user_id',$user->id)->get();
        return $carts;
    }
}