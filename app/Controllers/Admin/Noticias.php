<?php namespace App\Controllers\Admin;
use \App\Controllers\BaseController;
use App\Models\CategoriaModel;
use App\Models\NoticiaModel;


class Noticias extends BaseController
{
	public function index()
	{
		$model  = new NoticiaModel();
        $model2 = new CategoriaModel();

		$data = [
			'title'      => 'Noticias',
            'noticias'   => $model->paginate(10),
			'categorias' => $model2->getCategorias(),
			'pager'      => $model->pager,
			'msg'        => ''
		];


		echo view('backend/templates/html-header', $data);
		echo view('backend/templates/header');
		echo view('backend/pages/noticias/noticias');
		echo view('backend/templates/footer');
		echo view('backend/templates/html-footer');
	}

    public function adicionar()
	{
		$model  = new NoticiaModel();
        $model2 = new CategoriaModel();

		$data = [
			'title'      => 'Noticias',
            'noticias'   => $model->paginate(10),
			'categorias' => $model2->getCategorias(),
			'pager'      => $model->pager,
			'msg'        => ''
		];


		echo view('backend/templates/html-header', $data);
		echo view('backend/templates/header');
		echo view('backend/pages/noticias/adicionar');
		echo view('backend/templates/footer');
		echo view('backend/templates/html-footer');
	}

    public function editar($id = null)
    {
        $model  = new NoticiaModel();
        $model2 = new CategoriaModel();

        $data = [
			'title'      => 'Noticias',
            'noticias'   => $model->getNoticias($id),
			'categorias' => $model2->getCategorias(),
			'msg'        => ''
		];

        if(empty($data['noticias']))
        {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Não é possível encontrar a notícia com id: '. $id);
            
        }

        echo view('backend/templates/html-header', $data);
		echo view('backend/templates/header');
		echo view('backend/pages/noticias/editar');
		echo view('backend/templates/footer');
		echo view('backend/templates/html-footer');
    }

	public function gravar()
	{

		$model  = new NoticiaModel();
        $model2 = new CategoriaModel();

		helper('form');

		if($this->validate([
			'titulo'    => ['label' => 'Título', 'rules' => 'required|min_length[3]'],
			'resumo'    => ['label' => 'Resumo', 'rules' => 'required|min_length[3]'],
            'conteudo'  => ['label' => 'Conteúdo', 'rules' => 'required|min_length[3]'],
            //'categoria' => ['label' => 'Categoria', 'rules' => 'required|min_length[3]'],

		])){

            $id        = $this->request->getVar('id');
            $categoria = $this->request->getVar('categoria');
            $destaque  = $this->request->getVar('destaque');
			$titulo    = $this->request->getVar('titulo');
			$resumo    = $this->request->getVar('resumo');
            $conteudo  = $this->request->getVar('conteudo');
            $img       = $this->request->getFile('img');

            if(!$img->isValid()) {

                $model->save([

                    'id'         => $id,
                    'cat'        => $categoria,
                    'destaque'   => $destaque,
                    'titulo'     => $titulo,
                    'resumo'     => $resumo,
                    'conteudo'   => $conteudo
                ]);
    
                $data = [
                    'title'      => 'Noticias',
                    'noticias'   => $model->paginate(10),
                    'categorias' => $model2->getCategorias(),
                    'pager'      => $model->pager,
                    'msg'        => 'Notícia cadastrada com sucesso!'
                ];
    
                echo view('backend/templates/html-header', $data);
                echo view('backend/templates/header');
                echo view('backend/pages/noticias/noticias', $data);
                echo view('backend/templates/footer');
                echo view('backend/templates/html-footer');

            } else {

                $validacaoIMG =  $this->validate([
                    'img' => [
                        'uploaded[img]',
                        'mime_in[img,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                        'max_size[img,4096]',
                    ]
                ]);


                if($validacaoIMG){

                    $novoNome = $img->getRandomName();
                    $img->move('img/noticias', $novoNome);

                    $model->save([

                        'id'         => $id,
                        'cat'        => $categoria,
                        'destaque'   => $destaque,
                        'titulo'     => $titulo,
                        'resumo'     => $resumo,
                        'conteudo'   => $conteudo,
                        'img'        => $novoNome
                    ]);
        
                    $data = [
                        'title'      => 'Noticias',
                        'noticias'   => $model->paginate(10),
                        'categorias' => $model2->getCategorias(),
                        'pager'      => $model->pager,
                        'msg'        => 'Notícia cadastrada com sucesso!'
                    ];
        
                    echo view('backend/templates/html-header', $data);
                    echo view('backend/templates/header');
                    echo view('backend/pages/noticias/noticias', $data);
                    echo view('backend/templates/footer');
                    echo view('backend/templates/html-footer');

                }


            }
            
		} else {

            $data = [
                'title'      => 'Noticias',
                'noticias'   => $model->paginate(10),
                'categorias' => $model2->getCategorias(),
                'pager'      => $model->pager,
                'msg'        => 'Erro ao cadastrar noticias!'
            ];

            echo view('backend/templates/html-header', $data);
            echo view('backend/templates/header');
            echo view('backend/pages/noticias/noticias', $data);
            echo view('backend/templates/footer');
            echo view('backend/templates/html-footer');
		}
		

	}

	public function excluir($id = null)
	{

		$model = new NoticiaModel();

		$model->delete($id);

		return redirect()->to(base_url('admin/noticias'));

	}



}
