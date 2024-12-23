<body class="bg-gradient-info">
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <a href="login" class="btn btn-info btn-circle float-right mt-2 mr-2">
                            <i class="fas fa-arrow-right"></i>
                        </a>
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Crie sua conta</h1>
                            </div>
                            <form action="<?= base_url('cadastro/gravar')?>" method="post">
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
                                 
                                    <input type="submit" name="submit" class="btn btn-info btn-block" value="INSERIR" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body>