<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLayer;
use Illuminate\Support\Facades\Redirect;

class authController extends Controller
{
    // Crea una stringa privata non modificabile
    private $ERRORE_CREDENZIALI = "le credenziali inserite sono errate!";
    private $ERRORE_PRIVILEGI = "non hai i privilegi necessari per accedere a questa pagina!";
    private $ERRORE_PSW_NON_UGUALI = "le password inserite non coincidono!";
    private $ERRORE_PSW_VUOTE = "le password inserite non possono essere vuote!";
    private $ERRORE_MAIL_DUPLICATA = "l'email inserita è già presente nel nostro database!";
    public function authentication() 
    {
        $dl = new DataLayer();
        $categories = $dl->listCategory();
        return view('auth.auth')->with('categories', $categories);
    }

    public function login(Request $req) {
        session_start();
        $dl = new DataLayer();
        $user_name = $dl->getUserName($req->input('username'));
        $categories = $dl->listCategory();

        if ($dl->validUser($req->input('username'), $req->input('password'))) 
        {
            $_SESSION['logged'] = true;
            $_SESSION['loggedName'] = $user_name;
            $_SESSION['loggedEmail'] = $req->input('username');
            $_SESSION['privilege'] = $dl->getUserPrivilegies($req->input('username'));

            // Torna alla pagina precedente

            return Redirect::to(route('sweet.index'))->with('categories', $categories);
        }
        $_SESSION['errorMessage'] = $this->ERRORE_CREDENZIALI;
        return view('auth.authErrorPage');
    }
        
    public function registration() {
        $dl = new DataLayer();
        $categories = $dl->listCategory();
        return view('auth.register')->with('categories', $categories);
     }

     public function admin()
     {
        session_start();
        if(isset($_SESSION['logged']) && $_SESSION['logged'] == true && $_SESSION['privilege'] == 1)
        {
            $dl = new DataLayer();
            $orders = $dl->listOrders();
            // Per ogni ordine voglio sapere l'email di chi lo ha ordinato
            
            return view('admin.adminControlSystem')->with('orders', $orders);
        }
        else
        {
            $_SESSION['errorMessage'] = $this->ERRORE_PRIVILEGI;
            return view('auth.authErrorPage');
        }
     }

     public function register(Request $req) {
        $dl = new DataLayer();    
        session_start();
        try
        {
            if($req->input('password') != $req->input('conf_password'))
            {
                throw new \ErrorException();
            }else if($req->input('password') == null || $req->input('conf_password') == null)
            {
                throw new \InvalidArgumentException();
            }
            $dl->addUser($req->input('name'), $req->input('password'), $req->input('email'));
            $_SESSION['logged'] = true;
            $_SESSION['loggedName'] = $req->input('name');
            $_SESSION['loggedEmail'] = $req->input('email');
            $_SESSION['privilege'] = $dl->getUserPrivilegies($req->input('email'));
            return Redirect::to(route('home'));
        }
        catch(\ErrorException $e)
        {
            $_SESSION['errorMessage'] = $this->ERRORE_PSW_NON_UGUALI;     
            return view('auth.authErrorPage'); 
        }
        catch(\InvalidArgumentException $e)
        {
            $_SESSION['errorMessage'] = $this->ERRORE_PSW_VUOTE;     
            return view('auth.authErrorPage'); 
        }
        catch(\Exception $e)
        {
            $_SESSION['errorMessage'] = $this->ERRORE_MAIL_DUPLICATA;     
            return view('auth.authErrorPage'); 
        }
    }
    public function modification() {
        $dl = new DataLayer();
        $categories = $dl->listCategory();
        return view('auth.modify')->with('categories', $categories);
    }
    public function modify(Request $req)
    {
        $dl = new DataLayer();
        session_start();

        try
        {
            $dl->modifyUser($req->input('name'), $req->input('password'), $req->input('conf_password'));
            return Redirect::to(route('home'))->with($_SESSION['loggedName'] = $req->input('name'));
        }catch(\Exception $e)
        {
            $_SESSION['errorMessage'] = $this->ERRORE_PSW_NON_UGUALI;     
            return view('auth.authErrorPage');      
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        return Redirect::to(route('home'));
    }    

}
