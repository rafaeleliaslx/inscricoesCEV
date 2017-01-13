<?php
if (!empty($_REQUEST[acao])) {
    $email = $_REQUEST[log];
    
   $stmte = $pdo->prepare("SELECT * FROM usuario WHERE email = :usuario ");
        $stmte->bindParam(':usuario', $email, PDO::PARAM_INT);
        
        $stmte->execute();
        $linha = $stmte->fetch(PDO::FETCH_ASSOC);

        if(!empty($linha)){



    $mensagem = "Prezado(a),<br/><br/>";

    $mensagem .= "Segue abaixo os dados para acesso a central de inscrições do Grupo Educacional CEV. <br><br>";
    $mensagem .= "Login: <b>" . $linha[email] . "</b><br>";
    $mensagem .= "Senha: <b>" . $linha[pw] . "</b><br><br>";
    $mensagem .= "<b>Grupo Educacional CEV</b>";
    $headers = "From: Grupo Educacional CEV <tecnologia@grupocev.com>\r\n";
    $headers .= "Reply-To: tecnologia@grupocev.com\r\n";
    $headers .= "Return-Path: tecnologia@grupocev.com\r\n";
    $headers .= "X-Mailer: Drupal\n";
    $headers .= 'MIME-Version: 1.0' . "\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= "X-MSMail-Priority: Normal\r\n";
    $headers .= "X-Mailer: Microsoft Office Outlook, Build Build 10.0.2627\r\n";
    $headers .= "X-MimeOLE: Produced By Microsoft MimeOLE V6.00.2900.2670\r\n";
    $headers .= "X-MS-TNEF-Correlator: 000000001FAFEF0164F948428AF85FFB8E5FA93BE4422D00\r\n";

    if (@mail($email, 'Senha Grupo Educacional CEV', $mensagem, $headers)) {
        $msg = 1;
    } else {
        $msg = 2;
    }

    ?>

<div class="jumbotron " style="text-align: justify; background-color: #5cb85c; color: #ffffff;">
    <div style="text-align: center; font-size: 16px; font-weight: bold">Login e senha enviado para <?=$email;?> </div>
</div>
<?
}else{
?>

<div class="jumbotron " style="text-align: justify; background-color: #d9534f; color: #ffffff;">
    <div style="text-align: center; font-size: 16px; font-weight: bold">Email não encontrado.</div>
</div>
<?

}
}
?>
 
            <form ACTION=""   id="loginform" method="POST"  >
                <center>
                 <div class="col-lg-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Recupera&ccedil;&atilde;o de Senha</label>
                    Digite seu <b>email</b> para ser enviado uma nova senha.<br/>
                    <input type="email" class="form-control"name="log" id="user_login" class="input"   tabindex="10" required/>
                    <input type="hidden" name="acao" id="user_login" class="input" size="20" tabindex="10" value="1" class="form-control"/>

                </div>
                <p class="submit">

                    <input type="submit" name="wp-submit" id="wp-submit" value="Entrar &raquo;" tabindex="100" />
                </p>
            </div>
        </center>

      

            </form>
 