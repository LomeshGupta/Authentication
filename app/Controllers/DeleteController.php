<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\UserModel;

class DeleteController extends Controller
{
    public function index()
    {
        $session = session();
        $id = $session->get('id');
        $userModel = new UserModel();
        $userModel->where('id',$id);
        $userModel->delete();
        $session->destroy();
        return redirect()->to('/signin');        
    }
}