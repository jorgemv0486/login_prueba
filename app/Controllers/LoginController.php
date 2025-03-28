<?php
namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class LoginController extends BaseController {
    protected $user;
    protected $session;

    public function __construct() {
        $this->session = session(); // Inicializar la sesión
        $this->user = new UserModel();
    }



    public  function validar()
    {

        $data = $this->request->getJSON(true);

        $user = $this->user
            ->where('name', $data['nombre'])
            ->where('password', $data['clave'])
            ->first();


        if(isset($user)){
            $this->session->set([
                'usuario_id' => $user['id'],
                'usuario_nombre' => $user['name'],
                'logged_in' => true
            ]);
            return $this->response->setJSON(['message' => 'OK', 'user' => $user]);

        }else{

            $this->session->set([
                'usuario_id' => null,
                'usuario_nombre' => null,
                'logged_in' => false
            ]);
            return $this->response->setJSON(['message' => 'Usuario no encontrado']);
        }


    }

    public function index(): string
    {
        return view('login/index');
    }
}
