<?
$dadosEvento = testeSeletivo($url[4], $pdo);
?>
<div class="jumbotron " style="text-align: justify">
    <div style="text-align: center; font-size: 16px; font-weight: bold"><?= $dadosEvento[titulo] ?></div>
</div>
<div class="col-lg-10">
    <p>
        <b>Periodo de Inscri��es</b><br/>
        <?= mostraData($dadosEvento[inicio]); ?> at� <?= mostraData($dadosEvento[fim]); ?>
    </p>
    <p>
        <b>Data  da Prova</b><br/>
        <?= mostraData($dadosEvento[aplicacao]); ?> 
    </p>
    <p>
        <b>Local da Prova</b><br/>
       Conforme descrito no comprovante de inscri��o. 
    </p>    
    <p>
        <b>Informa��es</b><br/>
        <?= $dadosEvento[conteudo] ?>
    </p>
  
</div>

<h4></h4>
</div>
