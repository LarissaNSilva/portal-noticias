 <!-- Begin Page Content -->
 <div class="container-fluid">
     <!-- Page Heading -->
     <div class="d-flex align-items-center">
         <h1 class="h3 mb-0 text-gray-800">Usuários</h1>
         <a href="#" data-toggle="modal" data-target="#ModalAdicionar" class="btn btn-info btn-circle ml-3">
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
                                     aria-sort="ascending" aria-label="Name: activate to sort column descending">Usuário
                                 </th>
                                 <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                     aria-sort="ascending" aria-label="Name: activate to sort column descending">Ações
                                 </th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php foreach($usuarios as $usuarios_item):?>

                             <tr role="row" class="odd">
                                 <td class="sorting_1"><?= $usuarios_item['user'] ?></td>
                                 <td width="150">
                                     <a class="text-info" href="#" data-toggle="modal"
                                         data-target="#Modal<?=$usuarios_item['id'];?>"><i class="fas fa-key"></i>Mudar
                                         Senha</a>
                                     <a class="text-danger" href="/admin/usuarios/excluir/<?=$usuarios_item['id'];?>"
                                         onclick="return confirm('Deseja mesmo excluir o usuário?')"><i
                                             class="fas fa-trash"></i> Excluir</a>
                                 </td>
                             </tr>

                             <!-- Alterar Senha Modal-->
                             <div class="modal fade" id="Modal<?=$usuarios_item['id'];?>" tabindex="-1" role="dialog"
                                 aria-hidden="true">
                                 <div class="modal-dialog" role="document">
                                     <div class="modal-content">
                                         <div class="modal-header">
                                             <h5 class="modal-title">Alterar Senha do Usuário</h5>
                                             <button class="close" type="button" data-dismiss="modal"
                                                 aria-label="Close">
                                                 <span aria-hidden="true">x</span>
                                             </button>
                                         </div>
                                         <div class="modal-body">
                                             <form action="<?= base_url('admin/usuarios/editarSenha') ?>" method="post">
                                                 <div class="form-group">
                                                     <label for="senha">Nova Senha</label>
                                                     <input class="form-control" type="password" name="senha" />
                                                     <input type="hidden" name="id" value="<?=$usuarios_item['id'];?>">
                                                 </div>
                                                 <?= csrf_field(); ?>
                                         </div>
                                         <div class="modal-footer">
                                             <button class="btn btn-secondary" type="button"
                                                 data-dismiss="modal">Cancelar</button>
                                             <input type="submit" name="submit" class="btn btn-info" value="Alterar" />
                                             </form>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <?php endforeach ?>
                         </tbody>
                     </table>
                     <?= $pager->links() ?>
                 </div>
             </div>
         </div>
     </div>
     <!-- Adicionar -->
     <div class="modal fade" id="ModalAdicionar" tabindex="-1" role="dialog" aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title">Alterar Senha do Usuário</h5>
                     <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">x</span>
                     </button>
                 </div>
                 <form action="<?= base_url('admin/usuarios/gravar')?>" method="post">
                     <div class="modal-body">
                         <div class="form-group">
                             <label for="user">Usuário</label>
                             <input class="form-control" type="input" name="user" />
                         </div>
                         <div class="form-group">
                             <label for="senha">Senha</label>
                             <input class="form-control" type="password" name="senha" />
                         </div>
                         <?= csrf_field(); ?>
                     </div>
                     <div class="modal-footer">
                         <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                         <input type="submit" name="submit" class="btn btn-info" value="Inserir" />
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>
 <!-- /.container-fluid -->