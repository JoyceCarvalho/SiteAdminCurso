<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> Edição de usuários</h1>
            <p>Área Administrativa</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="<?=base_url("user_list");?>">Listar Usuários</a></li>
            <li class="breadcrumb-item">Edição de usuários</li>
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
                        <?= form_open("user_edit"); ?>
                            <input type="hidden" name="idusuario" value="<?=$dados_usuario->id?>">
                            <div class="form-group">
                                <label class="col-form-label" for="inputDefault">Nome Completo</label>
                                <input class="form-control" name="nome" id="inputDefault" type="text" value="<?=$dados_usuario->nome;?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input class="form-control" name="email" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" value="<?=$dados_usuario->email;?>">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label" for="inputDefault">Usuário</label>
                                <input class="form-control" name="usuario" id="inputDefault" type="text" value="<?=$dados_usuario->usuario?>">
                            </div>
                            <div class="form-group" style="text-align: right">
                                <button type="button" data-toggle="modal" data-target="#changePassword" class="btn btn-sm btn-success"><i class="fa fa-key"></i> Alterar senha</button>
                            </div>
                            <div class="tile-footer">
                                <button class="btn btn-primary" type="submit">Cadastrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal-->
        <div id="changePassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
            <div role="document" class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 id="exampleModalLabel" class="modal-title">Alterar Senha</h4>
                        <a type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></a>
                    </div>
                    <form action="<?=base_url("alterar_senha");?>" method="post" autocomplete="off">
                        <input type="hidden" name="usuario" value="<?=$dados_usuario->id;?>">
                        <div class="modal-body">                                                
                            <div class="form-group">
                                <label>Nova Senha</label>
                                <!--<input type="password" name="senha" placeholder="Nova senha" class="form-control">-->
                                <div class="input-group">
                                    <input id="input" type="text" name="senha" placeholder="Nova senha" class="form-control" aria-describedby="button-addon4">
                                    <div class="input-group-append" id="button-addon4">
                                        <span id="ver_senha" class="btn btn-outline-secondary" type="button"><i class="fa fa-eye"></i></span>
                                        <span id="gerar_senha" class="btn btn-outline-secondary" type="button">Gerar senha</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a type="button" data-dismiss="modal" class="btn btn-secondary"><i class="fa fa-times"></i> Fechar</a>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- Modal -->
    </div>
</main>
<script>
$("#ver_senha").click(function(){
    var senha = document.getElementById('input').type;
    
    if (senha == "text") {

        document.getElementById('input').type = "password";
        $("#ver_senha").html('<i class="fa fa-eye-slash"></i>');

    } else {

        document.getElementById('input').type = "text";
        $("#ver_senha").html('<i class="fa fa-eye"></i>');

    }
});
</script>