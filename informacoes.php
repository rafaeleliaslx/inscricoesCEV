<?

$dadosEvento = testeSeletivo($url[3], $pdo);
?>
<!--<img src="<?= site1; ?>img/teste-cev22.png" width="700px" class="img-responsive"/>-->
<div class="jumbotron " style="text-align: justify">
    <div style="text-align: center; font-size: 16px; font-weight: bold"><?= $dadosEvento[titulo] ?></div>
</div>
<div class="row">
<div class="col-lg-6">
    <p>
        <b>Periodo de Inscri��es</b><br/>
        <?= mostraData($dadosEvento[inicio]); ?> at� <?= mostraData($dadosEvento[fim]); ?>
    </p>
    <p>
        <b>Data </b><br/>
        <?= mostraData($dadosEvento[aplicacao]); ?> 
    </p>
    <p>
        <b>Hor�rio </b><br/>
        <?=($dadosEvento[horario]); ?> 
    </p>
</div>
<div class="col-lg-6" style="text-align:right" >
    
        <? 

    if (empty($_SESSION[id]) and  empty($_SESSION[usuario])) { 
     $hj = date('Y-m-d') ;
        if ($dadosEvento[fim] < $hj ){
            ?><p><a class="btn btn-lg btn-warning" href="" role="button">Incri��es Encerradas</a></p><?
        }else{
        ?> <form action="<?= site1; ?>identificacao/<?= $dadosEvento[id] ?>" method="POST">    
        <input type="hidden" name="eventoS" value="<?= $dadosEvento[id] ?>" />
        <input type="submit" value="Incri��es On-line aqui" class="btn btn-lg btn-success" style="text-aling:right"/>
    </form>
    <? } ?>
   
    <!--<p><a class="btn btn-lg btn-success" href="<?= site1; ?>identificacao" role="button">Incri��es On-line aqui</a></p>-->
    <? } else { 
        $hj = date('Y-m-d') ;
        if ($dadosEvento[fim] < $hj ){
            ?><p><a class="btn btn-lg btn-warning" href="" role="button">Incri��es Encerradas</a></p><?
        }else{
        ?><p><a class="btn btn-lg btn-success" href="<?= site1; ?>passo01/<?= $dadosEvento[id] ?>" role="button">Incri��es On-line aqui</a></p>
    <? } }

    ?>
</div>
</div>
<div class="col-lg-12">
    <!--<p>
        <b>Local</b><br/>
       Conforme descrito no comprovante de inscri��o. 
    </p> -->
    <p>
        
        <?
                $conteudo= str_replace('\"','"', $dadosEvento[conteudo] );
                $conteudo= str_replace('\&quot;','"', $conteudo);
                echo $conteudo
        ?>
    </p>

       
    <?
   # include('resultado.php');
    ?>

</div>

<h4></h4>
</div>
