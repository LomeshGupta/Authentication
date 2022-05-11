<?php

class User extends CI_Controller {

public function __construct(){

        parent::__construct();
        $this->load->helper('url');
        $this->load->model('user_model');
        $this->load->library('session');
                        $config['upload_path']  = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png|exe|xls|doc|docx|xlsx|rar|zip';
                $config['max_size']      = '8192999'; 

                $this->load->library('upload', $config);

}

public function index()
{
  $this->load->view("register.php");
}

public function edit()
{
  $this->load->view('edit.php'); 
}

public function del(){
  $this->load->view('delete.php');
}

public function delete()
{
  $name = array('name'=>$this->input->post('name'));
  $this->user_model->delete($name['name']);
  $this->session->set_flashdata('success_msg', 'deleted successfully.Now login to your account.');
  redirect('user/login_user');
}

public function update()
{
if ( ! $this->upload->do_upload('pic'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        var_dump($error);
                }
                else
                {
                $n = $this->input->post('oldname');
                $user= array(
                                              'name'=>$this->input->post('newname'),
                                              'email'=>$this->input->post('email'),
                                              'dob'=>$this->input->post('dob'),
                                              'phone'=>$this->input->post('phone'),
                                              'pass'=>password_hash("$this->input->post('pass')", PASSWORD_BCRYPT),
                                              'pic'=>$this->upload->data('file_name'),
                                                );
                $user = $this->security->xss_clean($user);
                $this->user_model->edit($n,$user);
                redirect('user/login_user');
              }
}

public function register_user(){

                if ( ! $this->upload->do_upload('pic'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        var_dump($error);
                }
                else
                {
                    $user=array(
                                'name'=>$this->input->post('name'),
                                'email'=>$this->input->post('email'),
                                'dob'=>$this->input->post('dob'),
                                'phone'=>$this->input->post('phone'),
                                'pass'=>password_hash("$this->input->post('pass')", PASSWORD_BCRYPT),
                                'pic'=>$this->upload->data('file_name'),
                                  );
                    $user = $this->security->xss_clean($user);
                              $this->user_model->register_user($user);
                              
                              $this->session->set_flashdata('success_msg', 'Registered successfully.Now login to your account.');
                              redirect('user/login_view');
                }

}

public function login_view(){

$this->load->view("login.php");

}



function login_user(){ 
   $email = $this->input->post('email');
   $pass = $this->input->post('pass');
                              
   $user_login = $this->security->xss_clean($email,$pass);
    $data['users']=$this->user_model->login_user($email,$pass);
    var_dump($data);
      /*if($user_login['email']==$data['users'][0]['email'])
      {
      
        $this->session->set_userdata('id',$data['users'][0]['id']);
        $this->session->set_userdata('email',$data['users'][0]['email']);
        $this->session->set_userdata('name',$data['users'][0]['name']);
        $this->session->set_userdata('dob',$data['users'][0]['dob']);
        $this->session->set_userdata('phone',$data['users'][0]['phone']);
        $this->session->set_userdata('pic', $data['users'][0]['pic']);
    echo $this->session->set_userdata('id');
        $this->load->view('user_profile.php',$data);

      }
      else{
        $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
        $this->load->view("login.php");

      }*/


}

function user_profile(){

$this->load->view('user_profile.php');

}
public function user_logout(){

  $this->session->sess_destroy();
  redirect('user/login_view', 'refresh');
}

}

?>