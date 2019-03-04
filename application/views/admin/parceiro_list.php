<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> Listar Facilitador</h1>
            <p>Área administrativa</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Facilitador</li>
            <li class="breadcrumb-item active"><a href="#">Listar Facilitador</a></li>
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
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Site</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if(isset($parceiro_dados)){
                                foreach ($parceiro_dados as $parceiro) {
                                    ?>
                                    <tr>
                                        <td><?=$parceiro->nome?></td>
                                        <td><a href="<?=$parceiro->site;?>" target="__blank"><?=$parceiro->site;?></a></td>
                                        <td>
                                            <div class="row col-sm-12">
                                            
                                                <form method="post" action="<?=base_url('parceiros_update');?>">
                                                    <input type="hidden" name="idparceiros" value="<?=$parceiro->id;?>">
                                                    <button type="submit" class="btn btn-sm btn-info"><i class="fa fa-edit"></i> Editar</button>
                                                </form>
                                                
                                                <button type="button" onclick="modalExcluir(<?=$parceiro->id?>)" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Excluir</button>
                                                
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    <!-- Modal-->
                    <div id="modal-exclusao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 id="exampleModalLabel" class="modal-title"></h4>
                                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                </div>
                                <form method="post" action="<?=base_url('parceiros_remove');?>">

                                    <input type="hidden" id="parceiros" name="idparceiros">
                                    
                                    <div class="modal-body">                                                
                                        <div class="form-group">
                                            <p> Tem certeza que deseja excluir esta informação? </p>
                                        </div>
                                    </div>
                                
                                    <div class="modal-footer">
                                        <button type="button" data-dismiss="modal" class="btn btn-secondary"><i class="fa fa-times"></i> Fechar</button>
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Excluir</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- Modal -->
                </div>
            </div>
        </div>
    </div>
</main>
<script type="text/javascript">    
    function modalExcluir(parceiros) {
        $("#modal-exclusao").modal("show");
        $("#parceiros").val(parceiros);
    }
</script>