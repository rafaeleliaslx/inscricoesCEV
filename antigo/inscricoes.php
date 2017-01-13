<script type="text/javascript">
    function exibe(id) {
        if(document.getElementById(id).style.display=="none") {
            document.getElementById(id).style.display = "inline";
        }
        else {
            document.getElementById(id).style.display = "none";
        }
    }
</script>

<style type="text/css">
    *.box {
        width:950px;
        padding:0;
        margin-left:-210px;
    }

    table{
        border-collapse: collapse;
        border-bottom: 40px;
    }
    table th, td{
        border: 1px solid #c9c9c9;
        padding: 5px 10px;
    }
    table .col_vestibulares{
        font-weight: bold;
        font-size: 13px;
        background: #444C6B;
        color: #fff;
    }

    table .col_colegio{
        font-weight: bold;
        font-size: 13px;
        background: #444C6B;
        color: #fff;
    }

    table .col_concursos{
        font-weight: bold;
        font-size: 13px;
        background: #444C6B;
        color: #fff;
    }

    table .col_ead{
        font-weight: bold;
        font-size: 13px;
        background: #444C6B;
        color: #fff;
    }


</style>

<?
@require_once("inc/conecta_pro.php");
//variavel dos links
$pag_lik = anti_injection($url[1]);
define('SITE_URL', 'http://www.grupocev.com');
?>


<!-- conteudo -->
<div id="conteudo">

    <!-- coluna-conteudo -->
    <div class="coluna-conteudo">

        <!-- Início Testes em Vestibulares-->
        <!-- coluna-centro -->
        <div class="coluna-centro">
            <div class="box">
                <div class="titulo">
                    <h2><div style="color:#C73B26;">Vestibulares</div></h2>
                </div>
                <div class="padding-20">
                    <div id="form-inscricao">
                        <!--Início Cabeçalho da Tabela-->
                        <table cellspacing="0" cellpadding="0" width="100%">
                            <thead>
                            <th class="col_vestibulares" colspan="3"><a href="#" onclick="javascript: exibe('1');"><div style="color:#fff;">Testes em Andamento</div></a></th>
                            </thead>
                        </table>

                        <div id="1" style="display:none;">

                            <!--Div de espaçamento entre os dados-->
                            <div style="margin: 5px;"></div>
                            <?php
                            //noticia destaque
                            $result = @mysql_query("SELECT * FROM teste_unificado WHERE status='1' and publico = '1' and tipo='vestibular' ORDER BY id_teste DESC LIMIT 0,5");
                            $totalRow = @mysql_num_rows($result);
                            //so entra no laço se existir algum registro
                            if ($totalRow > 0) {
                                while($row = @mysql_fetch_assoc($result)) {
                                    ?>

                            <a href="<?=SITE_URL?>/<?php echo $pag_lik;?>/informacoes/<?php echo $row['id_teste'] ?>"><?echo $row[titulo]?></a><br>

                                    <? }
                            }
                            ?>
                        </div>

                        <!--Div de espaçamento entre os dados-->
                        <div style="margin: 5px;"></div>

                        <!--Início Cabeçalho da Tabela-->
                        <table cellspacing="0" cellpadding="0" width="100%">
                            <thead>
                            <th class="col_vestibulares" colspan="3"><a href="#" onclick="javascript: exibe('2');"><div style="color:#fff;">Testes Encerrados</div></a></th>
                            </thead>
                        </table>

                        <!--Div de espaçamento entre os dados-->
                        <div id="2" style="display:none;">
                            <div style="margin: 5px;"></div>
                            <?php
                            //noticia destaque
                            $result = @mysql_query("SELECT * FROM teste_unificado WHERE status='0' and publico = '1' and tipo='vestibular' ORDER BY id_teste DESC LIMIT 0,5");
                            $totalRow = @mysql_num_rows($result);
                            //so entra no laço se existir algum registro
                            if ($totalRow > 0) {
                                while($row = @mysql_fetch_assoc($result)) {
                                    ?>

                            <a href="<?=SITE_URL?>/<?php echo $pag_lik;?>/informacoes/<?php echo $row['id_teste'] ?>"><?echo $row[titulo]?></a><br>

                                    <? }
                            }
                            ?>
                        </div>

                    </div>
                    <br /><br /><br />
                </div>
            </div>
        </div>
        <!-- /coluna-conteudo -->
        <!-- Fim Testes em Vestibulares-->


        <!-- Início Testes em Colégio-->
        <!-- coluna-centro -->
        <div class="coluna-centro">
            <div class="box">
                <div class="titulo">
                    <h2><div style="color:#0E7215;">ColÃ©gio</div></h2>
                </div>
                <div class="padding-20">

                    <p>
                    </p>

                    <div id="form-inscricao">

                        <!--Início Cabeçalho da Tabela-->
                        <table cellspacing="0" cellpadding="0" width="100%">
                            <thead>
                            <th class="col_colegio" colspan="3"><a href="#" onclick="javascript: exibe('3');"><div style="color:#fff;">Testes em Andamento</div></a></th>
                            </thead>
                        </table>

                        <div id="3" style="display:none;">

                            <!--Div de espaçamento entre os dados-->
                            <div style="margin: 5px;"></div>

                            <a href="">Teste Bolsa PrÃ©-Vestibular</a><br>
                            <a href="">1Âº Teste Seletivo</a>
                        </div>

                        <!--Div de espaçamento entre os dados-->
                        <div style="margin: 5px;"></div>

                        <!--Início Cabeçalho da Tabela-->
                        <table cellspacing="0" cellpadding="0" width="100%">
                            <thead>
                            <th class="col_colegio" colspan="3"><a href="#" onclick="javascript: exibe('4');"><div style="color:#fff;">Testes Encerrados</div></a></th>
                            </thead>
                        </table>

                        <!--Div de espaçamento entre os dados-->
                        <div id="4" style="display:none;">

                            <div style="margin: 5px;"></div>
                            <a href="">Teste Bolsa PrÃ©-Vestibular</a><br>
                            <a href="">1Âº Teste Seletivo</a>
                        </div>
                    </div>
                    <br /><br /><br />
                </div>
            </div>
        </div>
        <!-- /coluna-conteudo -->
        <!-- Fim Testes em Colégio-->


        <!-- Início Testes em Concursos-->
        <!-- coluna-centro -->
        <div class="coluna-centro">
            <div class="box">
                <div class="titulo">
                    <h2><div style="color:#2662C7;">Concursos</div></h2>
                </div>
                <div class="padding-20">
                    <div id="form-inscricao">

                        <!--Início Cabeçalho da Tabela-->
                        <table cellspacing="0" cellpadding="0" width="100%">
                            <thead>
                            <th class="col_concursos" colspan="3"><a href="#" onclick="javascript: exibe('5');"><div style="color:#fff;">Testes em Andamento</div></a></th>
                            </thead>
                        </table>

                        <div id="5" style="display:none;">

                            <!--Div de espaçamento entre os dados-->
                            <div style="margin: 5px;"></div>

                            <?php
                            //noticia destaque
                            $result = @mysql_query("SELECT * FROM teste_unificado WHERE status='1' and publico = '1' and tipo ='concurso' ORDER BY id_teste DESC LIMIT 0,5");
                            $totalRow = @mysql_num_rows($result);
                            //so entra no laço se existir algum registro
                            if ($totalRow > 0) {
                                while($row = @mysql_fetch_assoc($result)) {
                                    ?>

                            <a href="<?=SITE_URL?>/<?php echo $pag_lik;?>/informacoes/<?php echo $row['id_teste'] ?>"><?echo $row[titulo]?></a><br>

                                    <? }
                            }
                            ?>
                        </div>

                        <!--Div de espaçamento entre os dados-->
                        <div style="margin: 5px;"></div>

                        <!--Início Cabeçalho da Tabela-->
                        <table cellspacing="0" cellpadding="0" width="100%">
                            <thead>
                            <th class="col_concursos" colspan="3"><a href="#" onclick="javascript: exibe('6');"><div style="color:#fff;">Testes Encerrados</div></a></th>
                            </thead>
                        </table>

                        <!--Div de espaçamento entre os dados-->
                        <div id="6" style="display:none;">

                            <div style="margin: 5px;"></div>
                            <?php
                            //noticia destaque
                            $result = @mysql_query("SELECT * FROM teste_unificado WHERE status='0' and publico = '1' and tipo='concurso' ORDER BY id_teste DESC LIMIT 0,5");
                            $totalRow = @mysql_num_rows($result);
                            //so entra no laço se existir algum registro
                            if ($totalRow > 0) {
                                while($row = @mysql_fetch_assoc($result)) {
                                    ?>

                            <a href="<?=SITE_URL?>/<?php echo $pag_lik;?>/informacoes/<?php echo $row['id_teste'] ?>"><?echo $row[titulo]?></a><br>

                                    <? }
                            }
                            ?>
                        </div>
                    </div>
                    <br /><br /><br />
                </div>
            </div>
        </div>
        <!-- /coluna-conteudo -->
        <!-- Fim Testes em Concursos-->



        <!-- Início Testes em ead-->
        <!-- coluna-centro -->
        <div class="coluna-centro">
            <div class="box">
                <div class="titulo">
                    <h2><div style="color:#E4861D;">EAD</div></h2>
                </div>
                <div class="padding-20">
                    <div id="form-inscricao">

                        <!--Início Cabeçalho da Tabela-->
                        <table cellspacing="0" cellpadding="0" width="100%">
                            <thead>
                            <th class="col_ead" colspan="3"><a href="#" onclick="javascript: exibe('5');"><div style="color:#fff;">Testes em Andamento</div></a></th>
                            </thead>
                        </table>

                        <div id="5" style="display:none;">

                            <!--Div de espaçamento entre os dados-->
                            <div style="margin: 5px;"></div>

                            <a href="">Teste Bolsa PrÃ©-Vestibular</a><br>
                            <a href="">1Âº Teste Seletivo</a>
                        </div>

                        <!--Div de espaçamento entre os dados-->
                        <div style="margin: 5px;"></div>

                        <!--Início Cabeçalho da Tabela-->
                        <table cellspacing="0" cellpadding="0" width="100%">
                            <thead>
                            <th class="col_ead" colspan="3"><a href="#" onclick="javascript: exibe('6');"><div style="color:#fff;">Testes Encerrados</div></a></th>
                            </thead>
                        </table>

                        <!--Div de espaçamento entre os dados-->
                        <div id="6" style="display:none;">

                            <div style="margin: 5px;"></div>
                            <a href="">Teste Bolsa PrÃ©-Vestibular</a><br>
                            <a href="">1Âº Teste Seletivo</a>
                        </div>
                    </div>
                    <br /><br /><br />
                </div>
            </div>
        </div>
        <!-- Fim Testes em ead-->
        <!-- /coluna-conteudo -->

        <div class="clear"></div>

    </div>
    <!-- /coluna-centro-direita -->
    <div class="clear"></div>
</div>

