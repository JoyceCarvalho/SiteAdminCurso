<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-edit"></i> Edição de parceiros</h1>
      <p>Área administrativa</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="<?=base_url("facilitador_list");?>"> Parceiros</a></li>
      <li class="breadcrumb-item">Edição de Parceiros</li>
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
    <?php if($this->session->flashdata('warning') == TRUE): ?>
        <div class="col-md-12">
            <div class="alert alert-warning" role="alert">
                <?= $this->session->flashdata('warning'); ?>
            </div>
        </div>
    <?php endif; ?>
    <div class="col-md-12">
      <div class="tile">
        <div class="row">
          <div class="col-lg-12">
            <?= form_open_multipart("parceiros_edit"); ?>
              <input type="hidden" name="idparceiros" value="<?=$parceiros->id?>">
              <div class="form-group">
                <label class="col-form-label" for="inputDefault">Nome</label>
                <input class="form-control" name="nome" id="inputDefault" type="text" value="<?=$parceiros->nome;?>">
              </div>
              <div class="form-group">
                <label class="col-form-label" for="inputDefault">Site</label>
                <div class="input-group flex-nowrap">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping"><i class="fa fa-link"></i></span>
                  </div>
                  <input type="text" class="form-control" name="site" value="<?=$parceiros->site?>" aria-describedby="addon-wrapping">
                </div>
              </div>
              <div class="row col-sm-12">
                <div class="form-group col-sm-6">
                    <label for="exampleInputPassword1">Logo</label>
                    <input class="form-control" type="file" name="logo">
                    <input type="hidden" name="old_logo" value="<?=$parceiros->fk_idfoto?>">
                </div>
                <div class="form-group col-sm-6">
                    <img class="img embed-responsive" src="<?=base_url("imagem/".$parceiros->fk_idfoto)?>">
                </div>
              </div>
              <div class="tile-footer">
                <a href="<?=base_url("parceiros_list");?>" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Listar Facilitadores</a>
                <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Cadastrar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>