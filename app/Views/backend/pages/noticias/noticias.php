 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
    
     <div class="d-flex align-items-center">
        <h1 class="h3 mb-0 text-gray-800">Notícias</h1>
        <a href="/admin/noticias/adicionar" class="btn btn-info btn-circle ml-3">
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
                                <th class="sorting text-center" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                     aria-sort="ascending" aria-label="Name: activate to sort column descending">Imagem
                                 </th>
                                 <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                     aria-sort="ascending" aria-label="Name: activate to sort column descending">Título
                                 </th>
                                 <th class="sorting text-center" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                     aria-sort="ascending" aria-label="Name: activate to sort column descending">Data
                                 </th>
                                 <th class="sorting text-center" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                     aria-sort="ascending" aria-label="Name: activate to sort column descending">Destaque
                                 </th>
                                 <th class="sorting text-center" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                     aria-sort="ascending" aria-label="Name: activate to sort column descending">Ações
                                 </th>
                             </tr>
                         </thead>
                         <tbody>
                            <?php foreach($noticias as $noticia_item):?>

                             <tr role="row" class="odd">
                                    <td class="text-center">
                                        <?php if($noticia_item['img']) { ?>
                                            <img src="/img/noticias/<?= $noticia_item['img'] ?>" alt="" style="width:100px;">
                                        <?php } else {?>  
                                            <img src="/img/semfoto.jpg" alt="" style="width:100px;">
                                        <?php } ?> 
                                    </td>
                                    <td><?= $noticia_item['titulo'] ?></td>
                                    <td  width="100"class="text-center"><?= date("d/m/Y H:i", strtotime($noticia_item['created_at'])); ?></td>
                                    <td  width="50" class="text-center">
                                        <?php if($noticia_item['destaque'] == 1) { ?>
                                            <span class="text-success">SIM</span>
                                        <?php } else {?>  
                                            <span class="text-danger">NÃO</span>
                                        <?php } ?> 
                                    </td>
                                    <td width="100">
                                        <a class="text-info" href="/admin/noticias/editar/<?=$noticia_item['id'];?>"><i class="fas fa-edit"></i>Alterar</a>
                                        <a class="text-danger" href="/admin/noticias/excluir/<?=$noticia_item['id'];?>" onclick="return confirm('Deseja mesmo excluir a notícia?')"><i class="fas fa-trash"></i> Excluir</a>
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
 <script src="/js/tinymce/tinymce.min.js"></script>
 <script>
    tinymce.init({ 
        language: 'pt_BR',
        selector:'textarea',
        theme: 'modern',
        plugins: 'print preview fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount   imagetools contextmenu colorpicker textpattern code',
        toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat code',
        image_advtab: true,
        templates: [
            { title: 'Test template 1', content: 'Test 1' },
            { title: 'Test template 2', content: 'Test 2' }
        ],
        content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tinymce.com/css/codepen.min.css'
        ]
    });
</script>