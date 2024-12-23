 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800">Editar Notícia</h1>

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
                    <form action="<?= base_url('admin/noticias/gravar')?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="destaque" class="form-check-label text-gray-800" value="1" <?= $noticias['destaque'] == 1 ? 'checked': ''; ?>> Notícia de Destaque?
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="titulo" class="text-gray-800">Título</label>
                                <input class="form-control" type="input" name="titulo" value="<?= $noticias['titulo'] ?>"/>
                            </div>
                            <div class="form-group">
                                <label for="categoria" class="text-gray-800">Categoria</label>
                                <div class="form-group">
                                    <select name="categoria" class="form-control" tabindex="-1">
                                        <option value="">Escolha a Categoria</option>
                                        <?php foreach ($categorias as $categoria_item) { ?>
                                            <option value="<?= $categoria_item['id'] ?>" <?=  $noticias['cat'] == $categoria_item['id'] ?  'selected': ''; ?>><?= $categoria_item['titulo'] ?></option>
                                        <?php } ?>
                                    <select>
                                </div>                               
                            </div>
                            <div class="form-group">
                                <label for="resumo" class="text-gray-800">Resumo</label>
                                <input class="form-control" type="input" name="resumo" value="<?= $noticias['resumo'] ?>"/>
                            </div>
                            <div class="form-group">
                                <label for="conteudo" class="text-gray-800">Conteúdo</label>
                                <textarea name="conteudo" class="form-control" rows="10"><?= $noticias['conteudo'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="img" class="text-gray-800">Imagens</label>
                                <input class="form-control" type="file" name="img"/>
                            </div>                        
                            <input type="hidden" name="id" value="<?= $noticias['id'] ?>">
                            <?= csrf_field(); ?>
                            <a href="/admin/noticias" class="btn  btn-secondary btn-icon-split float-right">
                                <span class="text">Cancelar</span>
                            </a>
                            <input type="submit" name="submit" class="btn btn-info mr-2 float-right" value="Atualizar" />
                    </form>
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