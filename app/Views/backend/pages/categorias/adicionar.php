 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800">Adicionar Categoria</h1>

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
                    <form action="<?= base_url('admin/categorias/gravar')?>" method="post">
                        <div class="form-group">
                            <label for="titulo">Título</label>
                            <input class="form-control" type="input" name="titulo" />
                        </div>
                        <div class="form-group">
                            <label for="resumo">Resumo</label>
                            <textarea class="form-control" name="resumo" ></textarea>
                        </div>
                        <input type="hidden" name="id" value="">
                        <?= csrf_field(); ?>
                        <a href="/admin/categorias" class="btn btn-secondary btn-icon-split float-right">
                            <span class="text">Cancelar</span>
                        </a>
                        <input type="submit" name="submit" class="btn btn-info float-right mr-2" value="Adicionar" />
                    </form>
                 </div>
             </div>
         </div>
     </div>

 </div>
 <!-- /.container-fluid -->