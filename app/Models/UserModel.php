<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class UserModel extends Model{
    protected $table = 'users';
    
    protected $allowedFields = [
        'name',
        'email',
        'file_name',
        'file_type',
        'password',
        'created_at'
    ];
}