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
        background: #C73B26;
        color: #fff;
    }

</style>
<!-- conteudo -->
<div id="conteudo">

    <!-- coluna-conteudo -->
    <div class="coluna-conteudo">

        <!-- In�cio Testes em Vestibulares-->
        <!-- coluna-centro -->
        <div class="coluna-centro">
            <div class="box">
                <div class="titulo">
                    <?
                    @require_once("inc/conecta_pro.php");
                    $id_noticia = tratar_titulo($url[3]);

                    $result = @mysql_query("SELECT * FROM teste_unificado WHERE id_teste = '$id_noticia' LIMIT 1");
                    $totalRow = @mysql_num_rows($result);

                    //so entra no laço se existir algum registro
                    if ($totalRow > 0) {
                        $row = @mysql_fetch_assoc($result);
                        ?>
                    <h2><div style="color:#C73B26;"><?echo $row[titulo];?></div></h2>
                </div>
                <div class="padding-20">
                    <div id="form-inscricao">
                        <b>Inscrição On-Line</b><br>
                        <a href="">Clique aqui para Efetuar sua inscrição on-line</a><br><br>
                        <b>Informações</b><br>
                        <?echo $row[informacoes];?><br>
                        <b>Período de Inscrição</b><br><?echo $row[periodo_inscricao];?><br><br>
                        <b>Data e Local da Prova</b><br><?echo $row[data_local_prova]?>
                    </div>
                    <br /><br /><br />
                </div>
            </div>
        </div>
            <?}?>
        <div class="clear"></div>

    </div>
    <!-- /coluna-centro-direita -->
    <div class="clear"></div>
</div>

