<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthRestfulModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'users'; //'authrestfuls';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ["name", "email", "password"];

    // Dates
    protected $useTimestamps        = true;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $deletedField         = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks       = true;
    protected $beforeInsert         = [];
    protected $afterInsert          = [];
    protected $beforeUpdate         = [];
    protected $afterUpdate          = [];
    protected $beforeFind           = [];
    protected $afterFind            = [];
    protected $beforeDelete         = [];
    protected $afterDelete          = [];

    public function __construct()
    {
        parent::__construct();
    }

    public function getAuthRestfuls()
    {
        return $this->findAll();
    }

    public function getAuthRestful($id)
    {
        return $this->find($id);
    }

    public function login($email, $password)
    {
        $user = $this->where('email', $email)->first();
        if ($user) {
            if (password_verify($password, $user['password'])) {
                return $user;
            } else {
                return "Email id or password is incorrect";
            }
        }
        return "User not found";
    }
}
