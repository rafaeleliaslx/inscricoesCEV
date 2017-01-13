<?
if(empty($_SESSION['id'])){
    echo("<script language='javascript'>location.href='" . site1 . "identificacao'</script>");
    exit();
}
#exit();
$sessaoAluno = $_SESSION['id'];

$dadosEvento = testeSeletivo($url[3], $pdo);
$dadosAluno = usuario($sessaoAluno, $pdo);



?>
<div class="jumbotron " style="text-align: justify">
    <div style="text-align: center; font-size: 16px; font-weight: bold"><?= $dadosEvento[titulo] ?></div>
</div>
<div class="col-lg-10">
  
    <p>
        <b>Nome </b><br/>
        <?= $dadosAluno[nome]; ?> 
    </p>   
     <p>
        <b>Data </b><br/>
        <?= mostraData($dadosEvento[aplicacao]); ?> 
    </p> 
        <p>
        <b>Colocação </b><br/>
                <?
 $rse = $pdo->query("SELECT * 
FROM  `resultado` 
WHERE idProva =  '$url[3]'
AND idALuno =  '$sessaoAluno' 
AND disciplina = 'colocao'")->fetchAll();

  if(!$rse){
     #echo "sfsfs";
   }

   foreach ($rse as $rege){
          echo "<span style='font-size: 18px'>".$rege['nota']."&ordm;</span>"; 
}

?>
    </p>
   

      
    <p>
        <b>Resultado</b><br/>
  

<table  class="table-bordered" width="100%">
    <thead>
        <tr>
            <th style="text-align: center;background-color: #cccccc">Disciplina</th>
            <th style="text-align: center;background-color: #cccccc">Nota</th>
            
        </tr>
        <?
 $rs = $pdo->query("SELECT * 
FROM  `resultado` 
WHERE idProva =  '$url[3]'
AND idALuno =  '$sessaoAluno' 
AND disciplina <> 'colocao'")->fetchAll();
 
   if(!$rs){
      #print_r($pdo->errorInfo());
   }
 
   foreach ($rs as $reg){
    if($reg['disciplina']=='Total'){
                $bg = 'background-color: #cccccc;font-weight: bold; font-size: 18px';
            }
       ?>
        <tr>
            <td style="text-align: center;<?=$bg?>"><?=$reg['disciplina'];?></td>
            
            <td style="text-align: center; <?=$bg?>"><?=$reg['nota'];?></td>
        </tr>

   <?
unset($bg);
}
?>
      
      </table>  
    </p>
 
</div>


</div>
