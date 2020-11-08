<?php 

namespace App\Models;

use CodeIgniter\Model;


class LoginModel extends Model {
    protected $table = 'user';

    protected $allowedFields = ['id','username','password','firstname','lastname'];

    public function getTodos() {
        return $this->findAll();
    }

    
    public function check($username, $password) {
        $this->where('username',$username); //Create where part to the select
        $query = $this->get(); // Execute select where part defined
        // print $this->getLastQuery(); -> this might be user for debugging
        $row = $query->getRow();
        if ($row) { // If row was returned based on username...
            // Check if secured password is equal with password entered by user
            if (password_verify($password,$row->password)) {
                return $row; // return row (user object)
            }
        }
        return null; // Return null, because username and/or password is incorrect
    }
}