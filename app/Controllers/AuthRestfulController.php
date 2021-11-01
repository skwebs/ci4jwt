<?php

namespace App\Controllers;

use App\Models\AuthRestfulModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;
use Firebase\JWT\JWT;

class AuthRestfulController extends ResourceController
{

    private $AuthModel;
    private $db;
    private $secretKeY  = 'bGS6lzFqvvSQ8ALbOxatm7/Vk7mLQyzqaS34Q4oR1ew=';
    private $algorithm  = 'HS512';
    use ResponseTrait;

    public function __construct()
    {
        $this->AuthModel = new AuthRestfulModel;
        $this->db = \Config\Database::connect();
    }


    public function register()
    {
        $email = $this->request->getVar('email');
        $user = $this->AuthModel->where('email', $email)->first();
        if ($user) {
            return $this->failUnauthorized('Email already registered');
        };

        $data = [
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
        ];

        $user = $this->AuthModel->save($data);
        if ($user) {
            $response = [
                "status" => 201,
                "success" => 201,
                "messages" => [
                    "success" => "User created"
                ]
            ];
            return $this->respondCreated($response);
        } else {
            return $this->failUnauthorized('User not created');
        }
    }

    public function login()
    {
        $password = $this->request->getVar('password');
        $email = $this->request->getVar('email');
        $user = $this->AuthModel->where('email', $email)->first();
        if ($user) {
            if (password_verify($password, $user['password'])) {
                $token = [
                    'email' => $user['email'],
                    'name' => $user['name'],
                    'iat' => time(),
                    'exp' => time() + (60 * 60 * 24 * 7)
                ];
                $jwt = JWT::encode($token, $this->secretKeY, $this->algorithm);
                $response = [
                    "status" => 200,
                    "success" => 200,
                    "messages" => [
                        "success" => "User logged in",
                        "token" => $jwt
                    ]
                ];
                return $this->respond($response);
            } else {
                return $this->failUnauthorized('Wrong password');
            }
        } else {
            return $this->failUnauthorized('User does not exist');
        };
    }


    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        //
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        //
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
