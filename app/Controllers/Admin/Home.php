<?php namespace App\Controllers\Admin;
use \App\Controllers\BaseController;
use App\Models\CategoriaModel;
use App\Models\NoticiaModel;

class Home extends BaseController
{
	public function index()
	{

		$model  = new NoticiaModel();
        $model2 = new CategoriaModel();


		$data = [
			'title'        => 'Home',
            'noticias'     => $model->getTotalNoticias(),
			'categorias'   => $model2->getTotalCategorias(),
			'estatisticas' => $model->getPorcentagemNoticiasPorCategoria(),
			'destaque'     => $model->getNoticiaDestaqueMaisRecente(),
			'pager'        => $model->pager,
			'msg'          => ''
		];

		echo view('backend/templates/html-header', $data);
		echo view('backend/templates/header');
		echo view('backend/pages/home');
		echo view('backend/templates/footer');
		echo view('backend/templates/html-footer');


	}

}
