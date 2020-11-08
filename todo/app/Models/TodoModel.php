<?php 

namespace App\Models;

use CodeIgniter\Model;

class TodoModel extends Model {
    protected $table = 'task';

    protected $allowedFields = ['title','description','user_id'];

    /**
     * Retrieve all rows from task table
     */
    /**
     * Alla oleva koodi tuottaa siis seuraavan SQL-lauseen:
     * SELECT title, description, firstname, lastname, task.id AS id from task INNER JOIN user ON task.user_id = user.id
     */

    public function getTodos() {
        $this->table('task');
        $this->select('title, description, firstname, lastname, task.id AS id');
        $this->join('user','user.id = task.user_id');
        $query = $this->get();

        return $query->getResultArray();
        //return $this->findAll();
    }

    public function remove($id) {
        $this->where('id',$id);
        $this->delete();
    }
}

class LoginModel extends Model {
    protected $table = 'user';

    protected $allowedFields = ['id','username','password','firstname','lastname'];

    public function getTodos() {
        return $this->findAll();
    }

    
}