<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
  
class LogoutController extends Controller
{
    public function index()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/signin');        
    }
}