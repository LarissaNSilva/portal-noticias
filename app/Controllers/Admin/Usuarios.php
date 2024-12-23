<?php namespace App\Controllers\Admin;
use \App\Controllers\BaseController;
use App\Models\UserModel;


class Usuarios extends BaseController
{
	public function index()
	{
		$model = new UserModel();

		$data = [
			'title'    => 'Usuários',
			'usuarios' => $model->paginate(10),
			'pager'    => $model->pager,
			'msg'      => ''
		];


		echo view('backend/templates/html-header', $data);
		echo view('backend/templates/header');
		echo view('backend/pages/usuarios/usuarios');
		echo view('backend/templates/footer');
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

			$data = [ 'title'    => 'Usuários', 
					  'usuarios' => $model->paginate(10),
					  'pager'    => $model->pager,
					  'msg'      => 'Usuário cadastrado com sucesso!'
					];

			echo view('backend/templates/html-header', $data);
			echo view('backend/templates/header');
			echo view('backend/pages/usuarios/usuarios', $data);
			echo view('backend/templates/footer');
			echo view('backend/templates/html-footer');

		} else {

			$data = [	'title'    => 'Usuários', 
						'usuarios' => $model->paginate(10),
						'pager'    => $model->pager,
						'msg'      => 'Erro ao cadastrar o usuário!'
					];

			echo view('backend/templates/html-header', $data);
			echo view('backend/templates/header');
			echo view('backend/pages/usuarios/usuarios', $data);
			echo view('backend/templates/footer');
			echo view('backend/templates/html-footer');
		}
		

	}

	public function excluir($id = null)
	{

		$model = new UserModel();

		$model->delete($id);

		return redirect()->to(base_url('admin/usuarios'));

	}

	public function editarSenha()
	{
		$model = new UserModel();

		$id = $this->request->getVar('id');

		$data = [
			'senha' => md5($this->request->getVar('senha'))
		];

		$model->update($id, $data);

		
		return redirect()->to(base_url('admin/usuarios'));

	}

}
