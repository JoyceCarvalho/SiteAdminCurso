<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-edit"></i> Cadastro de Cursos/Treinamentos</h1>
      <p>Área administrativa</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="<?=base_url("facilitador_list");?>"> Curso </a></li>
      <li class="breadcrumb-item">Cadastro de Cursos/Treinamentos</li>
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
            <?= form_open_multipart("curso_cad"); ?>
              <div class="form-group">
                <label class="col-form-label" for="inputDefault">Título:</label>
                <input class="form-control" name="titulo" id="inputDefault" type="text" placeholder="Título">
              </div>
              <div class="form-group">
                <label for="inputDefault">Sigla:</label>
                <input type="text" name="sigla" id="inputDefault" class="form-control" placeholder="Sigla">
              </div>
              <div class="form-group">
                <label class="col-form-label" for="inputDefault">Local:</label>
                <input class="form-control" name="local" id="inputDefault" type="text" placeholder="Local">
              </div>
              <div class="form-group">
                <label class="col-form-label" for="inputDefault">Horário:</label>
                <input class="form-control" name="horario" id="inputDefault" type="time">
              </div>
              <div class="form-group">
                <label for="inputDefault">Descrição:</label>
                <textarea name="descricao" id="descricao" cols="30" rows="10"></textarea>
              </div>  
              <div class="form-group">
                <label class="col-form-label" for="inputDefault">Facebook</label>
                <div class="input-group flex-nowrap">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping"><i class="fa fa-facebook"></i></span>
                  </div>
                  <input type="text" class="form-control" name="facebook" placeholder="https://link" aria-describedby="addon-wrapping">
                </div>
              </div>
              <div class="form-group">
                <label class="col-form-label" for="inputDefault">Linkedin</label>
                <div class="input-group flex-nowrap">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping"><i class="fa fa-linkedin"></i></span>
                  </div>
                  <input type="text" class="form-control" name="linkedin" placeholder="https://link" aria-describedby="addon-wrapping">
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Foto</label>
                <input class="form-control" type="file" name="foto_fac">
              </div>
              <div class="tile-footer">
                <a href="<?=base_url("curso_list");?>" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Listar Facilitadores</a>
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
        CKEDITOR.replace('descricao');
    };
</script>