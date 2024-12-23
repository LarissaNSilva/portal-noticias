<body class="bg-gradient-info">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <?php if(!empty($msg)) : ?>
                        <div class="p-3 my-3 alert-info">
                            <?= $msg?>
                        </div>
                        <?php endif;?>
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Portal de Notícias</h1>
                                    </div>
                                    <form class="user" action="login/entrar" method="post">
                                        <div class="form-group">
                                            <label for="user">Login</label>
                                            <input class="form-control" type="input" name="user" />
                                        </div>
                                        <div class="form-group">
                                            <label for="senha">Senha</label>
                                            <input class="form-control" type="password" name="senha" />
                                        </div>
                                        <?= csrf_field(); ?>
                                        <input type="submit" name="submit" class="btn btn-info btn-block"
                                            value="ENTRAR" />
                                        <hr>
                                    </form>
                                    <div class="text-center">
                                        <a class="small" href="/cadastro">Crie sua conta</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>