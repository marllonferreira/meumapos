<!DOCTYPE html>
<html>

<head>
    <title>MAPOS</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fullcalendar.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/blue.css" class="skin-color" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body style="background-color: transparent">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <?= $topo ?>
                    <div class="widget-title">
                        <h4 style="text-align: center">Vendas</h4>
                    </div>
                    <div class="widget-content nopadding tab-content">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="font-size: 1.2em; padding: 5px;">Cliente</th>
                                    <th style="font-size: 1.2em; padding: 5px;">Total</th>
                                    <th style="font-size: 1.2em; padding: 5px;">Data</th>
                                    <th style="font-size: 1.2em; padding: 5px;">Vendedor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($vendas as $c) {
                                    echo '<tr>';
                                    echo '<td>' . $c->nomeCliente . '</td>';
                                    echo '<td>R$ ' . number_format($c->valorTotal, 2, ',', '.') . '</td>';
                                    echo '<td>' . date('d/m/Y', strtotime($c->dataVenda)) . '</td>';
                                    echo '<td>' . $c->nome . '</td>';
                                    echo '</tr>';
                                }
                                ?>

                                <tr>
                                    <td colspan="8"></td>
                                </tr>

                                <tr style="background-color: gainsboro;">
                                    <td colspan="1"></td>
                                    <td><small>R$ <?= number_format($total_vendas, 2, ',', '.') ?></small></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <h5 style="text-align: right">Data do Relatório: <?php echo date('d/m/Y'); ?>
                </h5>
            </div>
        </div>
    </div>
</body>

</html>
