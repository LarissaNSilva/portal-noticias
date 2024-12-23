<?php
namespace App\Models;
use CodeIgniter\Model;

class NoticiaModel extends Model {

    //Atributos de Configuração
    protected $table = 'noticias';
    protected $allowedFields = ['cat', 'titulo', 'resumo', 'conteudo', 'destaque', 'img'];
    protected $primaryKey = 'id';

    protected $useSoftDeletes = true;
    protected $useTimestamps  = true;
    protected $dateFormat     = 'datetime';
    protected $createdField   = 'created_at';
    protected $updatedField   = 'updated_at';
    protected $deletedField   = 'deleted_at';

    public function getNoticias($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }

        return $this->asArray()
                    ->where(['id' => $id])
                    ->first();

    }

    public function getTotalNoticias()
    {
        return $this->countAllResults();
    }

    public function getNoticiaDestaqueMaisRecente()
    {
        return $this->where('destaque', 1)  
                    ->orderBy('created_at', 'desc') 
                    ->first(); 
    }

    public function getPorcentagemNoticiasPorCategoria()
    {
        // Obter o total geral de notícias
        $totalNoticias = $this->countAllResults();

        if ($totalNoticias == 0) {
            return []; // Retorna um array vazio se não houver notícias
        }

        $this->select('categoria.titulo as categoria_descricao, COUNT(*) as total')
         ->join('categoria', 'categoria.id = noticias.cat', 'inner')
         ->groupBy('categoria.titulo');
        $resultados = $this->findAll();

        // Calcular a porcentagem por categoria
        $porcentagens = [];
        foreach ($resultados as $resultado) {
            $descricaoCategoria = $resultado['categoria_descricao'];
            $totalCategoria = $resultado['total'];
            $porcentagem = ($totalCategoria / $totalNoticias) * 100;

            $porcentagens[] = [
                'categoria' => $descricaoCategoria,
                'porcentagem' => round($porcentagem, 2) // Arredondar para 2 casas decimais
            ];
        }

        return $porcentagens;

    }



  
}