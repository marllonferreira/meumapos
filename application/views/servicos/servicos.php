<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'aServico')) { ?>
    <a href="<?php echo base_url() ?>index.php/servicos/adicionar" class="btn btn-success"><i class="icon-plus icon-white"></i> Adicionar Serviço</a>
<?php } ?>

<div class="widget-box">
    <div class="widget-title">
        <span class="icon">
            <i class="fas fa-wrench"></i>
        </span>
        <h5>Serviços</h5>
    </div>
    <div class="widget-content nopadding tab-content">
        <table id="tabela" class="table table-bordered ">
            <thead>
                <tr style="backgroud-color: #2D335B">
                    <th>Cod. Serviço</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if (!$results) {
                        echo '<tr>
                                <td colspan="5">Nenhum Serviço Cadastrado</td>
                              </tr>';
                    }
                    foreach ($results as $r) {
                        echo '<tr>';
                        echo '<td>' . $r->idServicos . '</td>';
                        echo '<td>' . $r->nome . '</td>';
                        echo '<td>' . number_format($r->preco, 2, ',', '.') . '</td>';
                        echo '<td>' . $r->descricao . '</td>';
                        echo '<td>';
                        if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eServico')) {
                            echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/servicos/editar/' . $r->idServicos . '" class="btn btn-info tip-top" title="Editar Serviço"><i class="fas fa-edit"></i></a>';
                        }
                        if ($this->permission->checkPermission($this->session->userdata('permissao'), 'dServico')) {
                            echo '<a href="#modal-excluir" role="button" data-toggle="modal" servico="' . $r->idServicos . '" class="btn btn-danger tip-top" title="Excluir Serviço"><i class="fas fa-trash-alt"></i></a>  ';
                        }
                        echo '</td>';
                        echo '</tr>';
                    } ?>
            </tbody>
        </table>
    </div>
</div>
<?php echo $this->pagination->create_links(); ?>

<!-- Modal -->
<div id="modal-excluir" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form action="<?php echo base_url() ?>index.php/servicos/excluir" method="post">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h5 id="myModalLabel">Excluir Serviço</h5>
        </div>
        <div class="modal-body">
            <input type="hidden" id="idServico" name="id" value="" />
            <h5 style="text-align: center">Deseja realmente excluir este serviço?</h5>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
            <button class="btn btn-danger">Excluir</button>
        </div>
    </form>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', 'a', function(event) {
            var servico = $(this).attr('servico');
            $('#idServico').val(servico);
        });
    });
</script>
