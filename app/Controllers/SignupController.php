<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Libraries\Password; 
  
class SignupController extends Controller
{
    public function index()
    {
        helper(['form']);
        $data = [];
        echo view('signup.php', $data);
    }
  
    public function store()
    {
        helper(['form']);
        $rules = [
            'name'          => 'required|min_length[2]|max_length[50]',
            'email'         => 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email]',
            'file' => 'uploaded[file]|is_image[file]|mime_in[file,image/jpg,image/jpeg,image/gif,image/png,image/webp]|max_size[file,10000]',
            'password'      => 'required|min_length[4]|max_length[50]',
            'confirmpassword'  => 'matches[password]'
        ];
        $pass = new Password();
          
        if($this->validate($rules)){
            $userModel = new UserModel();
            $imageFile = $this->request->getFile('file');
            $newName = $imageFile->getRandomName();
            $imageFile->move('../public/uploads',$newName);
            $data = [
                'name'     => $this->request->getVar('name'),
                'email'    => $this->request->getVar('email'),
                'file_name' =>  $newName,
                'file_type'  => $imageFile->getClientMimeType(),
                'password' => $pass->create_hash($this->request->getVar('password'), PASSWORD_BCRYPT)
            ];
            $userModel->save($data);
            return redirect()->to('/signin');
        }else{
            $data['validation'] = $this->validator;
            echo view('signup', $data);
        }
          
    }
  
}