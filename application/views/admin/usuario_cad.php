<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> Cadastro de usuários</h1>
            <p>Área Administrativa</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Usuários</li>
            <li class="breadcrumb-item"><a href="#">Cadastro de usuários</a></li>
        </ul>
    </div>
    <div class="row">
        <?php if (validation_errors()) : ?>
          <div class="col-md-12">
            <div class="alert alert-danger" role="alert">
                <?= validation_errors() ?>
            </div>
          </div>
        <?php endif; ?>
        <?php if($this->session->flashdata('error') == TRUE): ?>
            <div class="col-md-12">
                <div class="alert alert-danger" role="alert">
                    <?= $this->session->flashdata('error'); ?>
                </div>
            </div>
        <?php endif; ?>
        <?php if($this->session->flashdata('success') == TRUE): ?>
            <div class="col-md-12">
                <div class="alert alert-success" role="alert">
                    <?= $this->session->flashdata('success'); ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="col-md-12">
            <div class="tile">
                <div class="row">
                    <div class="col-lg-12">
                        <?= form_open("user_cad"); ?>
                            <div class="form-group">
                                <label class="col-form-label" for="inputDefault">Nome Completo</label>
                                <input class="form-control" name="nome" id="inputDefault" type="text" placeholder="Nome">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input class="form-control" name="email" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label" for="inputDefault">Usuário</label>
                                <input class="form-control" name="usuario" id="inputDefault" type="text" placeholder="Usuário">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Senha</label>
                                <input class="form-control" name="senha" id="exampleInputPassword1" type="password" placeholder="Senha">
                            </div>
                            <div class="tile-footer">
                                <button class="btn btn-primary" type="submit">Cadastrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>