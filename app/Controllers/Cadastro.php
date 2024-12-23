<?php namespace App\Controllers;
use \App\Controllers\BaseController;
use App\Models\UserModel;

class Cadastro extends BaseController
{
	public function index()
	{

		$data['title'] = 'Cadastro';

		echo view('backend/templates/html-header', $data);
		echo view('backend/pages/cadastro');
		echo view('backend/templates/html-footer');

	}

    public function gravar()
	{
		$model = new UserModel();

		helper('form');

		if($this->validate([
			'user' => ['label' => 'Usuários', 'rules' => 'required|min_length[3]|is_unique[usuarios.user]'],
			'senha' => ['label' => 'Senha', 'rules' => 'required|min_length[6]'],
		])){

			$user = $this->request->getVar('user');
			$senha = md5($this->request->getVar('senha'));

			$model->save([
				'user' => $user,
				'senha' => $senha
			]);

			return redirect()->to(base_url('login'));

		} else {

			return redirect()->to(base_url('login'));

		}
		
	}


}
