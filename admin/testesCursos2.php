<?
error_reporting(0);

$dados = testeSeletivo($url[4], $pdo);

#Verifica o segmento do curso
//echo $dados['segmento'];

$cores = array('3366cc|','dc3912|','ff9900|','109618|','990099|','0099c6|','dd4477|','66aa00|','b82e2e|','316395|','994499|','22aa99');
#print_r($dados);
#echo $dados;
 
 date_default_timezone_set('America/Sao_Paulo');
?>
<div style="text-align:center"><img src="http://www.9rup0c3v.com/img/grupo.png" ></div>
<h3 style="text-align:center"><?= $dados[titulo]; ?></h3>

<p>
 <a href="<?=site;?>testesCursos2/<?=$url[4]?>/email" class="btn btn-primary">Enviar E-mail</a>
<table class="table table-striped">

    <tr>
        <th>Curso</th>

        <?php if($dados['segmento']==2){ ?>

        <th  style="text-align: center">Geral</th>

        <?php }elseif($dados['segmento']==1){ ?>

        <th  style="text-align: center">Geral</th>
        <th  style="text-align: center">Frei Serafim</th>
        <th  style="text-align: center">Kennedy</th>

        <?php } ?>
        
    </tr>

    <?
    $stmte = $pdo->prepare("SELECT * FROM testeseletivocursos WHERE idEvento = :idEvento");
    $stmte->bindParam(':idEvento', $url[4], PDO::PARAM_INT);
    $stmte->execute();
    while ($linha = $stmte->fetch(PDO::FETCH_ASSOC)) {
        $dadosCurso = cursos($linha['idCurso'],$pdo);
        ?>
        <tr>
            <td>
            <?
            echo $dadosCurso['descricao'];
            $nome[] = $dadosCurso['descricao'];

             ?>
         </td>

            <?php if($dados['segmento']==2){ ?>

            <td  style="text-align: center"><?
            $qnt =  usuarioTesteCurso($url[4],$linha['idCurso'],$pdo);
               #print_r($qnt);
            $geral[] = $qnt[id];
               echo $qnt[id];
            ?></td>
            
            <?php }elseif ($dados['segmento']==1){?>
          
            <td  style="text-align: center"><?
            $qnt =  usuarioTesteCurso($url[4],$linha['idCurso'],$pdo);
               #print_r($qnt);
            $geral[] = $qnt[id];
               echo $qnt[id];
            ?></td>

            <td  style="text-align: center"><?
            $qnt1 =  usuarioTesteCursoUnidade(1,$url[4],$linha['idCurso'],$pdo);
            $frei[] = $qnt1[id];
               #print_r($qnt1);
               echo $qnt1[id];
            ?></td>

            <td  style="text-align: center"><?
            $qnt2 =  usuarioTesteCursoUnidade(2,$url[4],$linha['idCurso'],$pdo);
            $kn[] = $qnt2[id];
               #print_r($qnt2);
               echo $qnt2[id];
            ?></td>

           <?
             }
         ?>

          <?php } ?>

        

        <tr>
            <td ><b>Total</b></td>
            
            <?php if($dados['segmento']==2){ ?>

            <td style="text-align: center; font-weight: bold"><?=array_sum($geral);?></td>
            
            <?php }elseif($dados['segmento']==1){ ?>
            
            <td style="text-align: center; font-weight: bold"><?=array_sum($geral);?></td>  
            <td style="text-align: center; font-weight: bold"><?=array_sum($frei);?></td>
            <td style="text-align: center; font-weight: bold"><?=array_sum($kn);?></td>
            
            <?php } ?>
</table>


               

<?

        if($dados['segmento']==2){

          foreach ($nome as $key => $value) {
              #echo "['".$value."', ".$frei[$key]."],";
              $chd .= $geral[$key].",";
             
                          
              
              $nome2 = substr($value, 2);
              $nome1 =  substr($value, 0,1);
              $nomes = $nome1.$nome2;
              $chdl .= $nomes."|";
              $soma = array_sum($geral);
              $por = ($geral[$key]/$soma)*100;
              $chl .= $geral[$key]." - ".arredonda($por)."%|";
              $chco .= $cores[$key];
          }
          $chd = substr($chd , 0, -1);
          $chdl = substr($chdl, 0, -1);
          $chl = substr($chl, 0, -1);

      

$graficoGr .= "<center><b>Geral</b></center>";
 $graficoGr .= "<div style='text-align:center'><img src='https://chart.googleapis.com/chart?cht=p&chd=t:$chd&chs=900x320&chl=$chl&chdl=$chdl&chco=$chco' ></div>";
 echo $graficoGr;
unset($chdl,$chd,$chl,$chco);

  
  }elseif($dados['segmento']==1){ 

        
         foreach ($nome as $key => $value) {
              #echo "['".$value."', ".$frei[$key]."],";
              $chd .= $geral[$key].",";
             
                          
              
              $nome2 = substr($value, 2);
              $nome1 =  substr($value, 0,1);
              $nomes = $nome1.$nome2;
              $chdl .= $nomes."|";
              $soma = array_sum($geral);
              $por = ($geral[$key]/$soma)*100;
              $chl .= $geral[$key]." - ".arredonda($por)."%|";
              $chco .= $cores[$key];
          }
          $chd = substr($chd , 0, -1);
          $chdl = substr($chdl, 0, -1);
          $chl = substr($chl, 0, -1);

      

        $graficoGr .= "<center><b>Geral</b></center>";
         $graficoGr .= "<div style='text-align:center'><img src='https://chart.googleapis.com/chart?cht=p&chd=t:$chd&chs=900x320&chl=$chl&chdl=$chdl&chco=$chco' ></div>";
         echo $graficoGr;
        unset($chdl,$chd,$chl,$chco);





          foreach ($nome as $key => $value) {
              #echo "['".$value."', ".$frei[$key]."],";
              $chd .= $frei[$key].",";
             
                          
              
              $nome2 = substr($value, 2);
              $nome1 =  substr($value, 0,1);
              $nomes = $nome1.$nome2;
              $chdl .= $nomes."|";
              $soma = array_sum($frei);
              $por = ($frei[$key]/$soma)*100;
              $chl .= $frei[$key]." - ".arredonda($por)."%|";
              $chco .= $cores[$key];
          }
          $chd = substr($chd , 0, -1);
          $chdl = substr($chdl, 0, -1);
          $chl = substr($chl, 0, -1);
           



$graficoFr .= "<hr><center><b>Frei Serafim</b></center>";
 $graficoFr .="<div style='text-align:center'><img src='https://chart.googleapis.com/chart?cht=p&chd=t:$chd&chs=900x320&chl=$chl&chdl=$chdl&chco=$chco' ></div>";
 echo $graficoFr;
 unset($chdl,$chd,$chl,$chco);

 
          foreach ($nome as $key => $value) {
              #echo "['".$value."', ".$frei[$key]."],";
              $chd .= $kn[$key].",";
             
                          
              
              $nome2 = substr($value, 2);
              $nome1 =  substr($value, 0,1);
              $nomes = $nome1.$nome2;
              $chdl .= $nomes."|";
              $soma = array_sum($frei);
              $por = ($kn[$key]/$soma)*100;
              $chl .= $kn[$key]." - ".arredonda($por)."%|";
              $chco .= $cores[$key];
          }
          $chd = substr($chd , 0, -1);
          $chdl = substr($chdl, 0, -1);
          $chl = substr($chl, 0, -1);


           

$graficoKn .= "<hr><center><b>Kennedy</b></center>";
 $graficoKn .= "<div style='text-align:center'><img src='https://chart.googleapis.com/chart?cht=p&chd=t:$chd&chs=900x320&chl=$chl&chdl=$chdl&chco=$chco' ></div>";
 echo $graficoKn;

}


unset($geral,$frei,$kn);




if($url[5] == "email"){
$html .= '<style type="text/css">
table  {border-collapse: collapse;}

table  tr td {border:1px solid #ff0000;}
}
</style>';

$html .= '<div style="text-align:center"><img src="http://www.9rup0c3v.com/img/grupo.png" ></div>';


$html .= '<h3 style="text-align:center"><?= $dados[titulo]; ?></h3>';
$html .= '<p>';
 
$html .= '<table width=100%>';

$html .= '    <tr>';
$html .= '        <th style="  background-color:#cdcdcd">Curso</th>';

if($dados['segmento']==2){

$html .= '        <th  style="text-align: center; background-color:#cdcdcd">Geral</th>';

}elseif($dados['segmento']==1){

$html .= '        <th  style="text-align: center; background-color:#cdcdcd">Geral</th>';  

$html .= '        <th  style="text-align: center; background-color:#cdcdcd">Frei Serafim</th>';
        
$html .= '        <th  style="text-align: center; background-color:#cdcdcd">Kennedy</th>';
   
}        
$html .= '    </tr>';

    
    $stmte = $pdo->prepare("SELECT * FROM testeseletivocursos WHERE idEvento = :idEvento");
    $stmte->bindParam(':idEvento', $url[4], PDO::PARAM_INT);
    $stmte->execute();
    while ($linha = $stmte->fetch(PDO::FETCH_ASSOC)) {
        $dadosCurso = cursos($linha['idCurso'],$pdo);
        
       $html .= ' <tr>';
       $html .= '         <td style=" background-color:#f1f2f2">';
            
            $html .= $dadosCurso['descricao'];
            $nome[] = $dadosCurso['descricao'];

             
         $html .= '</td>';
            
            if($dados['segmento']==2){
          
            $html .= '<td  style="text-align: center; background-color:#f1f2f2">';
            $qnt =  usuarioTesteCurso($url[4],$linha['idCurso'],$pdo);
               #print_r($qnt);
            $geral[] = $qnt[id];
               $html .=  $qnt[id];
            $html .= '</td>';

            }elseif($dados['segmento']==1){


            $html .= '<td  style="text-align: center; background-color:#f1f2f2">';
            $qnt =  usuarioTesteCurso($url[4],$linha['idCurso'],$pdo);
               #print_r($qnt);
            $geral[] = $qnt[id];
               $html .=  $qnt[id];
            $html .= '</td>';            

         
            $html .= '<td  style="text-align: center; background-color:#f1f2f2">';
            $qnt1 =  usuarioTesteCursoUnidade(1,$url[4],$linha['idCurso'],$pdo);
            $frei[] = $qnt1[id];
               #print_r($qnt1);
               $html .=  $qnt1[id];
            $html .= '</td>';


            $html .= '<td  style="text-align: center; background-color:#f1f2f2">';
            $qnt2 =  usuarioTesteCursoUnidade(2,$url[4],$linha['idCurso'],$pdo);
            $kn[] = $qnt2[id];
               #print_r($qnt2);
               $html .=  $qnt2[id];
            $html .= '</td>';
           
            
            }
            
            
             
        }
 
        
            $html .= '<tr>';
            $html .= '<td style="  background-color:#cdcdcd"><b>Total</b></td>';

            if($dados['segmento']==2){
            
            $html .= '<td style="text-align: center; font-weight: bold;background-color:#cdcdcd">'.array_sum($geral).'</td>';

            }elseif($dados['segmento']==1){
            
            $html .= '<td style="text-align: center; font-weight: bold;background-color:#cdcdcd">'.array_sum($geral).'</td>';
            $html .= '<td style="text-align: center; font-weight: bold;background-color:#cdcdcd">'.array_sum($frei).'</td>';
            $html .= '<td style="text-align: center; font-weight: bold;background-color:#cdcdcd">'.array_sum($kn).'</td>';
            
            }
            
$html .= '</table>';

if($dados['segmento']==2){

$html .= $graficoGr;
$html .= "<p>.</p>";

}elseif($dados['segmento']==1){

$html .= $graficoGr;
$html .= "<p>.</p>";
$html .= $graficoFr;
$html .= $graficoKn;

}


$html .='<p style="font-size: 10px; font-weight: bold; text-align:center">
    Software House - Grupo Educacional CEV
</p>';


include("/nfs/c07/h01/mnt/98296/domains/cer.9rup0c3v.com/html/PHPMailer/class.phpmailer.php");

$mail             = new PHPMailer(); // defaults to using php "mail()"

$mail->IsSendmail(); // telling the class to use SendMail transport

#$body             = file_get_contents('contents.html');
$body             = $html;
#$body             = eregi_replace("[\]",'',$body);

$mail->AddReplyTo("contato@grupocev.com","Grupo Educacional CEV");

$mail->SetFrom("contato@grupocev.com","Grupo Educacional CEV");
$mail->AddReplyTo("contato@grupocev.com","Grupo Educacional CEV");

$address = "haerto@gmail.com";
$mail->AddAddress($address, "Haerto Quadros");
//$mail->AddAddress( 'fabricio_arjo@globomail.com', "Fabricio");

$mail->AddAddress( 'alvaronolleto@gmail.com', "Alvaro Noleto");
$mail->AddAddress( 'rafaelfonteles@yahoo.com.br', "Rafael Fonteles");
$mail->AddAddress( 'fonteles13@gmail.com', "Jose Nazareno Fonteles");

$mail->AddAddress( 'brunololiveira2@gmail.com', "Bruno CEV");
$mail->AddAddress( 'agrelio@gmail.com', "Bruno Agrelio");
$mail->AddAddress( 'vitornunessantos@gmail.com', "Vitor Nunes");
$mail->AddAddress( 'wellnolleto@gmail.com', "Wellina Nolleto");
$mail->AddAddress( 'kaliandra_brandao@hotmail.com', "Kaliandra");
$mail->AddAddress( 'kaliandra_brandao@hotmail.com', "Kaliandra");
$mail->AddAddress( 'kaliandra_brandao@hotmail.com', "Kaliandra");
$mail->AddAddress( 'ricardomarketing@hotmail.com', "Ricardo");
$mail->AddAddress( 'r2rogeriorodrigues@gmail.com', "Rogerio");

 
 
$aplicacao =  explode("-",$dados[aplicacao]); 
#print_r($aplicacao);#
 


$mail->Subject    = "Inscritos ".$dados[titulo]." ".$aplicacao[2]."/".$aplicacao[1]." - ".date("d/m/Y")." - ".date("H:i");

$mail->AltBody    = "Inscritos ".$dados[titulo]." ".$aplicacao[2]."/".$aplicacao[1]." - ".date("d/m/Y")." - ".date("H:i"); // optional, comment out and test

$mail->MsgHTML($body);

#$mail->AddAttachment("images/phpmailer.gif");      // attachment
#$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "
  <div class='success' style='padding: 10px'>
  <h1>Email enviado com sucesso!!!!</h1>
  </div>";
}
}
?>