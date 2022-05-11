<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
  
class ProfileController extends Controller
{
    public function index()
    {
        $session = session();
        $data['user'] = array(
            'name' => $session->get('name'),
            'email' => $session->get('email'),
            'file_name' => $session->get('file_name'),
        );
        echo view('profile',$data);
    }
}