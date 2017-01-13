<div class="col-lg-12 ">
    <?php
         
         if($url[2]=="up"){

            echo "<h2>Cadastro efetuado, prossiga com a escolha do curso !</h2>";

         }

    ?>
    
</div>
<div class="col-lg-6 ">
    <!--<p>
        <img src="http://www.grupocev.com/imagens/banner226.jpg" width="320px"/>
    </p>-->

    <h4 style="background-color:  #5cb85c; padding: 5px; color: #ffffff;">Colégio</h4>
    <table class="table table-striped">
         <!--<tr><td><a href="http://www.grupocev.com/colegio/informacoes/35+5o.+Teste+Seletivo+CEV+Colegio+2015" style="color: red">5º Teste Seletivo CEV Colégio 2015</a></td></tr>-->
        <?
        $id = 1;
        $hoje = date("Y-m-d");
        $stmte = $pdo->prepare("SELECT * FROM testeseletivo WHERE segmento = :idEvento and id not in(27) order by id desc");
        $stmte->bindParam(':idEvento', $id, PDO::PARAM_INT);
        
        $stmte->execute();
        while ($linha = $stmte->fetch(PDO::FETCH_ASSOC)) {

            
            $data=$linha[fim];

            /*if($hoje < $data){

                $color = 'style="color: green"';
                $st = ' - EM ANDAMENTO';

            }elseif ($hoje > $data) {
                $color = 'style="color: #FF0000"';
                $st = ' - ENCERRADO';
            }*/


            #Testa o status para definir a situação do teste
            
            if ($linha[status]==1) {
                    
                    $color = 'style="color: green"';
                    $st = ' - EM ANDAMENTO';
            
            }elseif ($linha[status]==2) {
                    
                    $color = 'style="color: #FF0000"';
                    $st = ' - ENCERRADO';
            }else{

                    $color = 'style="color: #000; "';
                    $st=' - NOVO';
            }


                 
            

            if($url[2]=="up"){
            ?>

           

            <tr><td><a href="<?= site1; ?>passo02/<?= $linha[id] ?>" <?=$color?> ><?= $linha[titulo]; ?><?=$st?></a></td></tr>
            
            <?
            }else{ 
            ?>
            <tr>
                <td>
                    <center>
                     
                     <?=$linha[img]?>

                     <!--<?if($linha[id] == 41) { ?>
                        
                        <a href="<?= site1; ?>informacoes/<?= $linha[id] ?>" <?=$color?>  ><img src="<?= site1; ?>img/11.12.png" width="300px"/></a><br>

                     <? }else{?>
                  
                      <a href="<?= site1; ?>informacoes/<?= $linha[id] ?>" <?=$color?>  ><img src="<?= site1; ?>img/teste-cev.png" width="300px"/></a><br>
                    
                    <? } ?>-->

                    <div style="padding: 10px">
                    <a href="<?= site1; ?>informacoes/<?= $linha[id] ?>" <?=$color?>  ><?= $linha[titulo]; ?><?=$st?></a>
                </div>
                </center>
                    <div class="row" style="padding: 15px; margin-top:-13px">
                        <div class="col-md-12" style="font-size: 12px; background-color: #f1a547; color: #fff; text-align: center;padding: 10px">DATA DO TESTE: <?= mostraData($linha[aplicacao]); ?></div>
                    </div>
                   
</div>
                </td>
            </tr>
            <?

           }

        }
        ?>
    <!--<tr><td>1Âº Teste Seletivo CEV ColÃ©gio 2015   <strong style="color: #5cb85c">(Aprovados para a Fase de Entrevistas)</strong> </td></tr>-->
    </table>
</div>

<div class="col-lg-6">
    <!--<p>
        <img src="http://www.grupocev.com/imagens/banner187a.jpg" width="320px"/>
    </p>-->
    <h4 style="background-color:  #d9534f; padding: 5px; color: #ffffff;">Vestibulares</h4>
    <table class="table table-striped">
                 <tr>
                <!--<td>
                    <a href="http://grupocev.com/inscricoes/informacoes/14"  >SUPER SIMULADO CEV FACID 2015.2 (SAÚDE)  - RESULTADO</a>
                                   
                </td>--> 
            </tr>
        <?
        
        

        $id = 2; #Ocultar testes vestibulares mudando o valor do id 5.
        $stmte->bindParam(':idEvento', $id, PDO::PARAM_INT);
        $stmte->execute();
        while ($linha = $stmte->fetch(PDO::FETCH_ASSOC)) {
            if($linha[id]=='14'){
                break;
            }
            
            
            $data = $linha[fim];
            
           
            /*if (date('Y-m-d') < $data){

                $color = 'style="color: #008B00"';
                $st = ' - EM ANDAMENTO';
            
             }else if (date('Y-m-d') > $data ) {

                $color = 'style="color: #FF0000"';
                $st = ' - ENCERRADO';
                 
             }*/

         

            #Testa o status para definir a situação do teste

             if ($linha[status]==1) {
                    
                    $color = 'style="color: green"';
                    $st = ' - EM ANDAMENTO';
            
             }elseif ($linha[status]==2) {
                    
                    $color = 'style="color: #FF0000"';
                    $st = ' - ENCERRADO';
             }else{

                    $color = 'style="color: blue"';
                    $st=' - NOVO';
            }





             
              
             if($url[2]=="up"){
            ?>
            <tr><td><a href="<?= site1; ?>passo02/<?= $linha[id] ?>" <?=$color?> ><?= $linha[titulo]; ?> <?=$st?></a></td></td></tr>
            
            <?
            }else{ 
            ?>

             

            <tr>
                <td>
                    <center>
                     <?=$linha[img]?>   
                    <!--<a href="<?= site1; ?>informacoes/<?= $linha[id] ?>" <?=$color?>  ><img src="<?= site1; ?>img/vestibular.jpg" width="300px"/></a><br><br>-->    
                    <a href="<?= site1; ?>informacoes/<?= $linha[id] ?>" <?=$color?> ><?= $linha[titulo]; ?> <?=$st?></a> 
                    </center>
                    <?if (($linha[id]== 14 ) and (!empty($_SESSION[id]))){?>
                    
                    <a href="<?= site1; ?>resultado/<?= $linha[id] ?>" target="_black" tile="Resultado"><img src="<?=site1;?>img/resultado.png" /></a>   
                    <?}?>
                    <div class="row" style="padding: 15px; margin-top:-13px">
                        <div class="col-md-12" style="font-size: 12px; background-color: #f1a547; color: #fff; text-align: center;padding: 10px">DATA DO TESTE: <?= mostraData($linha[aplicacao]); ?></div>
                    </div>
                </td>
            </tr>
            <?
}
           unset($red);
           unset($end);
        }
        ?>
    </table>
</div>
