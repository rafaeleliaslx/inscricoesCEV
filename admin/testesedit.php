<?

error_reporting(0);

$id = $url[4];
if (!empty($_REQUEST[acao])) {

    try {

        $conteudo = $_REQUEST['conteudo'];

        // echo $conteudo;

        //Recebe o valor do radio button

        $status=$_REQUEST['status'];

        foreach($status as $situacao){
                
            //echo "=>".$situacao;

        }

        //Testa se existe algum valor no radio senão ele atribui valor 0
        if(empty($situacao)){
            $situacao="0";
            //echo "=>".$situacao;
        }

        $sql = "UPDATE testeseletivo SET titulo = :titulo, conteudo = :conteudo , aplicacao = :aplicacao , inicio = :inicio , fim = :fim , remover = :remover , horario = :horario , segmento = :segmento , status = :status 
            WHERE id = :id";

                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':titulo', $_REQUEST['titulo'], PDO::PARAM_STR);
                $stmt->bindParam(':conteudo', $conteudo, PDO::PARAM_STR);
                $stmt->bindParam(':aplicacao', gravaData($_REQUEST['aplicacao']), PDO::PARAM_STR);
                $stmt->bindParam(':inicio', gravaData($_REQUEST['insInicio']), PDO::PARAM_STR);
                $stmt->bindParam(':fim', gravaData($_REQUEST['insFim']), PDO::PARAM_STR);
                $stmt->bindParam(':remover', $_REQUEST['remove'], PDO::PARAM_STR);
                $stmt->bindParam(':horario', $_REQUEST['horario'], PDO::PARAM_STR);
                $stmt->bindParam(':segmento', $_REQUEST['segmento'], PDO::PARAM_STR);
                $stmt->bindParam(':status', $situacao, PDO::PARAM_STR); 
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $executa = $stmt->execute();

            if ($executa) {
                echo 'Dados inseridos com sucesso';
            } else {
                echo 'Erro ao inserir os dados';
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
}

$stmte = $pdo->prepare("SELECT * FROM testeseletivo WHERE id = :id");
$stmte->bindParam(':id', $id, PDO::PARAM_INT);
$stmte->execute();
$linha = $stmte->fetch(PDO::FETCH_ASSOC);

?>
  <script type="text/javascript">
    $(function() {
      $('.summernote').summernote({
        height: 200
      });

      
    });
  </script>

<h2>Editar Teste</h2>
<form action="" method="POST" class="form-horizontal" role="form">
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Titulo</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id="inputEmail3" placeholder="Titulo" name="titulo" value="<?=$linha[titulo]?>">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Data do Evento</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id="inputEmail3" placeholder="Data do Evento" name="aplicacao"value="<?=mostraData($linha[aplicacao]);?>">
        </div>
    </div>    
        <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Horário</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id="inputEmail3" placeholder="00:00:00" name="horario" value="<?=$linha[horario]?>">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Inscricoes inicio</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id="inputEmail3" placeholder="Data inicio inscricoes" name="insInicio"value="<?=mostraData($linha[inicio]);?>">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Inscricoes fim</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id="inputEmail3" placeholder="Data Fim Inscricoes" name="insFim"value="<?=mostraData($linha[fim]);?>">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Botão Remover</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id="inputEmail3"   name="remove"value="<?=$linha[remover];?>"> 0 = exibir, 1 = ocultar
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Segmento</label>
        <div class="col-sm-5">
            <select class="form-control" name="segmento" >
                <option>-- selecione um segmento --</option>
                <option value="1" <?if (1 == $linha[segmento]){echo"selected";}?>>Colégio</option>
                <option value="2" <?if (2 == $linha[segmento]){echo"selected";}?>>Vestibular</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Status</label>
            <div class="col-sm-5">
                  
                  <input type="radio" value="1" name="status[]"  <?if (1 == $linha[status]){echo"checked";}?>> Em Andamento
                  <input type="radio" value="2" name="status[]" <?if (2 == $linha[status]){echo"checked";}?>> Encerrado
           </div>
    </div>

    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Informações</label>
        <?
            $rs = $pdo->query("SELECT * FROM ins_informacoes")->fetchAll();
            if(!$rs){
                #print_r($pdo->errorInfo());
            }
            foreach ($rs as $reg){
                ?>
                <div class="col-sm-5">
                    <input type="radio"   value="<?=$reg[id]?>" name="informacao" required <?if ($reg[id] == $linha[informacao]){echo"checked";}?>/> <?=$reg['descricao'];?> <hr>
                </div>
            <?}?>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Conteudo</label>
        <div class="col-sm-10">
            <textarea class="summernote"rows="3" name="conteudo">
                <?

                #$conteudo= str_replace('"="','', $linha[conteudo]);
                #$conteudo= str_replace('\&quot;','"', $linha[conteudo]);
                echo $linha[conteudo];
                #echo htmlentities($conteudo);
                #echo  html_entity_decode($conteudo);
                #echo strip_tags($conteudo);



                ?></textarea>
        </div>
    </div>
    <div class="form-group">
            <input type="hidden" name="acao" value="1"/>
            <button type="submit" class="btn btn-default">Editar</button>
    </div>
    
</form>