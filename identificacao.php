<?
#print_r($_SESSION);
if (!empty($_REQUEST[acao])) {
     
     

    #usuarioEmail(
        if(!empty($_REQUEST[emailnovo])){
            $usuarioEmail = usuarioEmail($_REQUEST[emailnovo],$pdo);
            if (!empty($usuarioEmail[id])){
                echo("<script language='javascript'>location.href='" . site1 . "identificacao/erro'</script>");
                exit();
            }
        }

    if (!empty($_REQUEST[emailcad]) and empty($_REQUEST[emailnovo])) {

        $email = $_REQUEST[emailcad];
        $senha = $_REQUEST[senhacad];
        $stmte = $pdo->prepare("SELECT * FROM usuario WHERE email = :usuario and pw = :senha");
        $stmte->bindParam(':usuario', $email, PDO::PARAM_INT);
        $stmte->bindParam(':senha', $senha, PDO::PARAM_INT);
        $stmte->execute();
        $linha = $stmte->fetch(PDO::FETCH_ASSOC);
        #print_r($linha);
        if ($stmte) {
            session_start();

            if (!empty($linha[id])){


            $_SESSION["id"] = $linha[id];
            $_SESSION["email"] = $linha[email];
            $_SESSION["usuario"] = $linha[nome];
            $_SESSION["tipo"] = $linha[tipo];
                if (empty($url[3])) {
                    #echo("<script language='javascript'>location.href='" . site1 . "informacoes/14'</script>");
                    echo("<script language='javascript'>location.href='" . site1 . "'</script>");
                }else{
                    echo("<script language='javascript'>location.href='" . site1 . "passo01/" . $url[3]. "'</script>");
                }

            echo '<p class="bg-success">Dados inseridos com sucesso!</p>';
        }else{
            ?>
<div class="jumbotron " style="text-align: justify; background-color: #d9534f; color: #ffffff;">
    <div style="text-align: center; font-size: 16px; font-weight: bold">Login ou Senha errado!</div>
</div>
            <?
        }
            
        } else {
            echo '<p class="bg-danger">Erro ao inserir os dados</p>';
        }
    } elseif (empty($_REQUEST[emailcad]) and ! empty($_REQUEST[emailnovo])) {
        #print_r($_REQUEST);
        $email = $_REQUEST[emailnovo];
        $nome = "Complete seu cadastro";
        $st = "";
        $senha = $_REQUEST[senhanova];
        $tipo = $_REQUEST[tipo];
        try {

            $stmte = $pdo->prepare("INSERT INTO usuario (nome,email,pw) VALUES (:nome,:email,:senha)");
//        $stmte->bindParam(':nome', $nome, PDO::PARAM_INT);
            $stmte->bindParam(':nome', $nome, PDO::PARAM_INT);
            $stmte->bindParam(':email', $email, PDO::PARAM_INT);
            $stmte->bindParam(':senha', $senha, PDO::PARAM_INT);
//        $stmte->bindParam(':st', $st, PDO::PARAM_INT);
//        $stmte->bindParam(':tipo', $tipo, PDO::PARAM_INT);
            $executa = $stmte->execute();
           $last_id  = $pdo->lastInsertId();
         
        $idEx = $result["employee_id"]; 
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
            exit;
        }

//        $stmte = $pdo->prepare("INSERT INTO ins_sala(descricao, lotacao) VALUES (?,?)");
//        $stmte->bindParam(1, $_REQUEST['emailnovo'], PDO::PARAM_INT);
//        $stmte->bindParam(2, $_REQUEST['senhanovo'], PDO::PARAM_INT);
//        $executa = $stmte->execute();

        if ($executa) {
            #@session_start();
            $_SESSION["id"] = $last_id;
            $_SESSION["email"] = $email;
            $_SESSION["usuario"] = $nome;
            echo("<script language='javascript'>location.href='" . site1 . "dadospessoais'</script>");
        print_r($_SESSION);
            echo '<p class="bg-success">Dados inseridos com sucesso!!!!!!!!</p>';
        } else {
            echo '<p class="bg-danger">Erro ao inserir os dados</p>';
        }
    }
}

if($url[3]=='erro'){
    ?>
<div class="jumbotron " style="text-align: justify; background-color: #d9534f; color: #ffffff;">
    <div style="text-align: center; font-size: 16px; font-weight: bold">Email já cadastrado</div>
</div>
    <?
}
?>



<div class="jumbotron " style="text-align: justify">
    <div style="text-align: center; font-size: 16px; font-weight: bold">Identificação</div>
</div>
<form action="" method="POST">
    <div class="col-lg-6"><h2 style="color: #d9534f;">Já tem cadastro?</h2> <b> Acesse com seu e-mail e senha</b><br/>
        <p>&nbsp;</p>
        <div class="form-group">
            <label for="exampleInputEmail1">e-mail</label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Digite seu email" name="emailcad">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">senha</label>
            <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Digite sua senha" name="senhacad">
        </div>
        <p style="text-align: right"><a href="<?=site1;?>esqueci">Esqueci minha senha >></a></p>


    </div>
    <div class="col-lg-6" style="border-left: 1px black dotted">
        <h2 style="color: #d9534f;">Não tem cadastro?</h2><b> Faça aqui o seu.</b><br/>
        <p>&nbsp;</p>
        <!--<b>Quem vai fazer a inscrição?</b><br/>
        <input type="radio" name="tipo" value="1"/> Próprio aluno<br/>
        <input type="radio" name="tipo" value="2"/> Responsável pelo aluno<br/>-->
        <div class="form-group">
            <label for="exampleInputEmail1">e-mail</label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Digite seu email" name="emailnovo">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">senha para cadastro</label>
            <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Digite sua senha" name="senhanova">
        </div>     
    </div>
    <p>&nbsp;</p>
    <p style="text-align: center"> 
        <input type="submit" value="Continuar >>" class="btn btn-lg btn-success" role="button"/>
    </p>
    <input type="hidden" value="1" name="acao"/>


</form>
