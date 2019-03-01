<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-edit"></i> Cadastro de Parceiros</h1>
      <p>Área administrativa</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="<?=base_url("facilitador_list");?>"> Parceiros </a></li>
      <li class="breadcrumb-item">Cadastro de Parceiros</li>
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
            <?= form_open_multipart("parceiro_cad"); ?>
              <div class="form-group">
                <label class="col-form-label" for="inputDefault">Nome</label>
                <input class="form-control" name="nome" id="inputDefault" type="text" placeholder="Nome">
              </div>
              <div class="form-group">
                <label class="col-form-label" for="inputDefault">Site</label>
                <input class="form-control" name="nome" id="inputDefault" type="text" placeholder="Nome">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Foto</label>
                <input class="form-control" type="file" name="foto">
              </div>
              <div class="tile-footer">
                <a href="<?=base_url("facilitador_list");?>" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Listar Facilitadores</a>
                <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Cadastrar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<script src="<?=base_url("assets/ckeditor/ckeditor.js");?>"></script>
<script type="text/javascript">
	    window.onload = function () {
		    CKEDITOR.replace('formacao');
	    };
	</script>