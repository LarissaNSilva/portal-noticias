 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
    <div class="d-flex align-items-center">
        <h1 class="h3 mb-0 text-gray-800">Categorias</h1>
        <a href="/admin/categorias/adicionar" class="btn btn-info btn-circle ml-3">
            <i class="fas fa-plus"></i>
        </a>
    </div>

     <?php if(!empty($msg)) : ?>
        <div class="p-3 my-3 alert-info">
            <?= $msg?>
        </div>
    <?php endif;?>

     <div class="p-1 my-3 text-danger">
         <?= \Config\Services::validation()->listErrors(); ?>
     </div>

     <div class="row">
         <div class="col-md-12">
            <div class="card mb-4 py-3 border-left-info">
                 <div class="card-body">
                     <table class="table table-bordered dataTable table-striped" id="dataTable" width="100%"
                         cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                         <thead>
                             <tr role="row">
                                 <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                     aria-sort="ascending" aria-label="Name: activate to sort column descending">Descrição
                                 </th>
                                 <th class="sorting text-center" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                     aria-sort="ascending" aria-label="Name: activate to sort column descending" width="100">Ações
                                 </th>
                             </tr>
                         </thead>
                         <tbody>
                            <?php foreach($categorias as $categorias_item):?>

                             <tr role="row" class="odd">
                                 <td class="sorting_1"><?= $categorias_item['titulo'] ?></td>
                                 <td class="text-center">
                                    <a class="text-info" href="/admin/categorias/editar/<?=$categorias_item['id'];?>"><i class="fas fa-edit"></i>Alterar</a>
                                    <a class="text-danger" href="/admin/categorias/excluir/<?=$categorias_item['id'];?>" onclick="return confirm('Deseja mesmo excluir a categoria?')"><i class="fas fa-trash"></i> Excluir</a>
                                </td>
                             </tr>
                             <?php endforeach ?>
                         </tbody>
                     </table>
                        <?= $pager->links() ?>                    
                 </div>
             </div>
         </div>

     </div>

 </div>
 <!-- /.container-fluid -->