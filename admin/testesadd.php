<?
if (!empty($_REQUEST[acao])) {

    try {
                $conteudo=  html_entity_decode($conteudo);
                $conteudo= str_replace('\"','"', $conteudo);

     $stmte = $pdo->prepare("INSERT INTO `testeseletivo` (id, `titulo`, `conteudo`, `aplicacao`, `inicio`, `fim`, `horario`, `segmento`, `informacao`) VALUES (NULL,?,?,?,?,?,?,?,? )");
       
        #$stmte = $pdo->prepare("INSERT INTO testeseletivo(descricao, lotacao) VALUES (?,?)");
        $stmte->bindParam(1, $_REQUEST['titulo'], PDO::PARAM_INT);
        $stmte->bindParam(2, $_REQUEST['conteudo'], PDO::PARAM_INT);
        $stmte->bindParam(3, gravaData($_REQUEST['aplicacao']), PDO::PARAM_INT);
        $stmte->bindParam(4, gravaData($_REQUEST['insInicio']), PDO::PARAM_INT);
        $stmte->bindParam(5, gravaData($_REQUEST['insFim']), PDO::PARAM_INT);
        $stmte->bindParam(6, $_REQUEST['horario'], PDO::PARAM_INT);
        $stmte->bindParam(7, $_REQUEST['segmento'], PDO::PARAM_INT);
        $stmte->bindParam(8, $_REQUEST['informacao'], PDO::PARAM_INT);
        $executa = $stmte->execute();
        if ($executa) {
            echo 'Dados inseridos com sucesso';
        } else {
            echo 'Erro ao inserir os dados';
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>
  <script type="text/javascript">
    $(function() {
      $('.summernote').summernote({
        height: 200
      });

      
    });
  </script>
<h2>Cadastrar Teste</h2>
<form action="" method="POST" class="form-horizontal" role="form">
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Titulo</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id="inputEmail3" placeholder="Titulo" name="titulo">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Data do Evento</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id="inputEmail3" placeholder="Data do Evento" name="aplicacao">
        </div>
    </div>    
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Horário</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id="inputEmail3" placeholder="00:00:00" name="horario">
        </div>
    </div>        
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Inscricoes inicio</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id="inputEmail3" placeholder="Data inicio inscricoes" name="insInicio">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Inscricoes fim</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id="inputEmail3" placeholder="Data Fim Inscricoes" name="insFim">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Segmento</label>
        <div class="col-sm-5">
            <select class="form-control" name="segmento" >
                <option>-- selecione um segmento --</option>
                <option value="1">Colégio</option>
                <option value="2">Vestibular</option>
            </select>
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
            <input type="radio"   value="<?=$reg[id]?>" name="informacao" required> <?=$reg['descricao'];?> <hr>
        </div>
   <?}?>
        
        
        
    </div>      
    
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Conteudo</label>
        <div class="col-sm-10">
            <textarea class="summernote"rows="3" name="conteudo"></textarea>
        </div>
    </div>
    <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input type="hidden" name="acao" value="1"/>
      <button type="submit" class="btn btn-default">Cadastrar</button>
    </div>
  </div>
    
</form>