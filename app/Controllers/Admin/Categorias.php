<?php namespace App\Controllers\Admin;
use \App\Controllers\BaseController;
use App\Models\CategoriaModel;


class Categorias extends BaseController
{
	public function index()
	{
		$model = new CategoriaModel();

		$data = [
			'title'      => 'Categorias',
			'categorias' => $model->paginate(10),
			'pager'      => $model->pager,
			'msg'        => ''
		];


		echo view('backend/templates/html-header', $data);
		echo view('backend/templates/header');
		echo view('backend/pages/categorias/categorias');
		echo view('backend/templates/footer');
		echo view('backend/templates/html-footer');
	}

	public function adicionar()
	{
		$model = new CategoriaModel();

		$data = [
			'title'      => 'Categorias',
			'categorias' => $model->paginate(10),
			'pager'      => $model->pager,
			'msg'        => ''
		];


		echo view('backend/templates/html-header', $data);
		echo view('backend/templates/header');
		echo view('backend/pages/categorias/adicionar');
		echo view('backend/templates/footer');
		echo view('backend/templates/html-footer');
	}

    public function editar($id = null)
    {
        $model = new CategoriaModel();

		$data = [
			'title'      => 'Editar Categorias',
			'categorias' => $model->getCategorias($id),
			'msg'        => ''
		];

        if(empty($data['categorias']))
        {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Não é possível encontrar a categoria com id: '. $id);
            
        }

		echo view('backend/templates/html-header', $data);
		echo view('backend/templates/header');
		echo view('backend/pages/categorias/editar');
		echo view('backend/templates/footer');
		echo view('backend/templates/html-footer');
    }

	public function gravar()
	{

		$model = new CategoriaModel();

		helper('form');

		if($this->validate([
			'titulo' => ['label' => 'Título', 'rules' => 'required|min_length[3]'],
			'resumo' => ['label' => 'Resumo', 'rules' => 'required|min_length[3]'],
		])){

            $id = $this->request->getVar('id');
			$titulo = $this->request->getVar('titulo');
			$resumo = $this->request->getVar('resumo');

			$model->save([
                'id'     => $id,
				'titulo' => $titulo,
				'resumo' => $resumo
			]);

			$data = [ 'title'      => 'Categoria', 
					  'categorias' => $model->paginate(10),
					  'pager'      => $model->pager,
					  'msg'        => $id == null ? 'Categoria cadastrada com sucesso!' : 'Categoria atualizada com sucesso!'
					];

			echo view('backend/templates/html-header', $data);
			echo view('backend/templates/header');
			echo view('backend/pages/categorias/categorias', $data);
			echo view('backend/templates/footer');
			echo view('backend/templates/html-footer');

		} else {

			$data = [	'title'      => 'Categoria', 
						'categorias' => $model->paginate(10),
						'pager'      => $model->pager,
						'msg'        => 'Erro ao cadastrar a categoria!'
					];

			echo view('backend/templates/html-header', $data);
			echo view('backend/templates/header');
			echo view('backend/pages/categorias/categorias', $data);
			echo view('backend/templates/footer');
			echo view('backend/templates/html-footer');
		}
		

	}

	public function excluir($id = null)
	{

		$model = new CategoriaModel();

		$model->delete($id);

		return redirect()->to(base_url('admin/categorias'));

	}

}
