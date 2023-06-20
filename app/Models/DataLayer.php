<?php

namespace App\Models;

class DataLayer
{
    // SEZIONE SWEET (user)
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

    // SEZIONE SWEET (admin)

    /**
     * Funzione che permette di aggiungere un nuovo dolce all'interno del database
     */
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

        move_uploaded_file($_FILES['image']['tmp_name'], $destination.$filename);
        
        $sweet->image = $filename;
        $sweet->save();
    }

    /**
     * Funzione che permette di modificare un dolce all'interno del database
     */
    public function modifySweet($id, $name, $category, $price, $description)
    {
        $sweet = Sweet::find($id);
        $sweet->name = $name;
        $sweet->category_id = $category;
        $sweet->price = $price;
        $sweet->description = $description;
        $sweet->save();
    }

    /**
     * Funzione che permette di rimuovere un dolce dal database
     */
    public function deleteSweet($id) {
        $sweet = Sweet::find($id);
        $sweet->delete();
    }


    // SEZIONE CATEGORY (user)

    /**
     * Funzione che restituisce tutte le categorie in ordine alfabetico
     */
    public function listCategory()
    {
        $categories = Category::orderBy('name','asc')->get();
        return $categories;
    }

    /**
     * Funzione he restituisce un elenco di dolci in base alla categoria
     */
    public function listSweetByCategoryName($category)
    {
        $sweets = Sweet::whereHas('category', function($query) use ($category) {
            $query->where('name', $category);
        })->orderBy('name','asc')->get();
        return $sweets;
    }

    // SEZIONE CATEGORY (admin)

    /**
     * Funzione che permette di aggiungere una nuova categoria al database
     */
    public function addCategory($name) {
        $category = new Category();
        $category->name = $name;

        $categories = Category::where('name',$name)->get();
        if(count($categories) > 0)
        {
            return;
        }

        mkdir("img/sweets/".strtolower($name));
        $category->save();
    }

    /**
     * Funzione che permette di modificare una categoria all'interno del database
     */
    public function modifyCategory($id, $name)
    {
        $category = Category::find($id);

        $oldPath = "img/sweets/".strtolower($category->name);
        $newPath = "img/sweets/".strtolower($name);
        rename($oldPath, $newPath);

        $category->name = $name;
        $category->save();
    }

    /**
     * Funzione che permette di rimuovere una categoria dal database
     */

     public function deleteCategory($id) {
        $category = Category::find($id);
        if($category != null)
        {
            $category->delete();

            // Cancella la cartella in /img/sweets con il nome della categoria e tutti i file al suo interno
            $path = "img/sweets/".strtolower($category->name);
            $files = glob($path.'/*');
            foreach($files as $file)
            {
                if(is_file($file))
                {
                    unlink($file);
                }
            }
            rmdir($path);
        }else
        {
            return;
        }
    }

    // SEZIONE USER

    /**
     * Funzione che verifica se l'utente è presente nel database e poi, se presente, verifica se la password è corretta
     */
    public function validUser($username, $password) {
        $users = User::where('email',$username)->get(['password']);
        
        if(count($users) == 0)
        {
            return false;
        }
        
        return (md5($password) == ($users[0]->password));
    }

    /**
     * Funzione che permette di aggiungere un utente al database
     */
    public function addUser($name, $password, $email) {
        $user = new User();
        $user->name = $name;
        $user->password = md5($password);
        $user->email = $email;
        $user->save();
    }


    /**
     * Funzione che permette di modificare un utente all'interno del database
     */
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
    
    /**
     * Funzione che permette di ottenere l'id di un utente passando la sua email
     */
    public function getUserID($email) {
        $users = User::where('email',$email)->get();
        return $users[0]->id;
    }

    /**
     * Funzione che permette di ottenere il nome di un utente passando la sua email
     */
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

    /**
     * Funzione che permette di ritornare le informazioni di una categoria in base all'id
     */
    public function getCategoryById($id) {
        $category = Category::find($id);
        return $category;
    }

    /**
     * Funzione che permette di ottenere l'id di una categoria passando il suo nome
     */
    public function getCategoryIdByName($category) {
        $categories = Category::where('name',$category)->get(['id']);
        return $categories[0]->id;
    }

    /**
     * Funzione che permette di ottenere i privilegi di un utente passando la sua email
     */
    public function getUserPrivilegies($email) {
        $users = User::where('email',$email)->get(['admin']);
        return ($users[0]->admin);
    }

    // SEZIONE CART

    
    /**
     * Funzione che permette di ritornare il carrello di un utente passando la sua email
     */
    public function getCart($email) 
    {
        $user = User::where('email',$email)->first();
        $carts = Cart::where('user_id',$user->id)->get();
        return $carts;
    }

    /**
     * Funzione che permette di aggiungere un dolce al carrello di un utente
     */
    public function addToCart($email, $sweet_id, $quantity) 
    {
        $user = User::where('email',$email)->first();
        $cart = new Cart();
        $cart->user_id = $user->id;
        $cart->sweet_id = $sweet_id;
        $cart->quantity = $quantity;
        $cart->save();
    }

    /**
     * Funzione che permette di rimuovere un dolce dal carrello di un utente
     */
    public function removeItem($email, $cartId) 
    {
        $user = User::where('email',$email)->first();
        $cart = Cart::where('user_id',$user->id)->where('id',$cartId)->first();
        $cart->delete();
    }

    public function deleteCart($email)
    {
        $user = User::where('email',$email)->first();
        $carts = Cart::where('user_id',$user->id)->get();
        foreach($carts as $cart)
        {
            $cart->delete();
        }
    }

    // SEZIONE ORDINI

    /**
     * Funzione che permette di aggiungere un ordine al database
     */
    public function insertOrder($email)
    {
        $user = User::where('email',$email)->first();
        $order = new Order();
        $order->user_id = $user->id;
        $order->payment_date = date('Y-m-d H:i:s');

        // Recupera tutti gli Sweet_id contenuti in carts dato l'id dell'utente
        $carts = Cart::where('user_id',$user->id)->get();
        foreach($carts as $cart)
        {
            $sweet = Sweet::find($cart->sweet_id);
            $order->sweets_list = $sweet->name . " (x" . $cart->quantity . ")";
        }
        $order->status = 0;
        $order->save();
    }

    /**
     * Funzione che permette di ottenere la lista di tutti gli ordini
     */
    public function listOrders()
    {
        $orders = Order::orderBy('id','desc')->get();
        return $orders;
    }

    /**
     * Funzione che permette di ottenere la lista di tutti gli ordini completati (status = 2)
     */
    public function listCompletedOrders()
    {
        $orders = Order::where('status',2)->orderBy('id','asc')->get();
        return $orders;
    }

    /**
     * Funzione che permette di ottenere la lista di tutti gli ordini iniziati ma non ancora terminati (status = 1)
     */
    public function listInPreparationOrders()
    {
        $orders = Order::where('status',1)->orderBy('id','asc')->get();
        return $orders;
    }

    /**
     * Funzione che permette di ottenere la lista di tutti gli ordini da fare (status = 0)
     */
    public function listToDoOrders()
    {
        $orders = Order::where('status',0)->orderBy('id','asc')->get();
        return $orders;
    }

    /**
     * Funzione che permette di ottenere la lista di tutti gli ordini di un utente
     */
    public function getOrders()
    {
        $user = User::where('email',$_SESSION['loggedEmail'])->first();
        $orders = Order::where('user_id',$user->id)->orderBy('payment_date','desc')->orderBy('id','desc')->get();
        return $orders;
    }
    
    /**
     * Funzione che permette di ottenere la lista di tutti gli ordini
     */
    public function getAllOrders()
    {
        $orders = Order::orderBy('payment_date','desc')->orderBy('id','desc')->get();
        return $orders;
    }

}