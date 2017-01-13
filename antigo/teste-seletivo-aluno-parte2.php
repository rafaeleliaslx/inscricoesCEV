<script>
	
    //função para validar os campos
   function doSubmit(pEvent, pForm){
            var campo = "null";

            var todos_elementos = document.getElementsByTagName('*');
            for (var i=0; i<todos_elementos.length; i++){
                 var el = todos_elementos[i];
                 if (el.className == 'erro'){
                    el.innerHTML = " ";
                 }
            }
			
			if(document.getElementById('serie').value == "0"){
                      document.getElementById('serie').focus();
                      alert("O campo SÉRIE deve ser preenchido");
                      return false;
        	}

           if(document.getElementById('cev').value == "0"){
                      document.getElementById('cev').focus();
                      alert("O campo CURSO deve ser preenchido");
                      return false;
        	}	

            return true;

    }
	
	function traco(objeto){
                if (objeto.value.length == 4){
                    objeto.value = objeto.value+"-";
                }
    }
		
</script> 

<?php
	header('Content-Type: text/html; charset=iso 8859-1');
	
	function gravaData ($data) {
    if ($data != '') {
        return (substr($data,6,4).'-'.substr($data,3,2).'-'.substr($data,0,2));
    }
    else {
        return '';
    }
}

function mostraData ($data) {
    if ($data!='') {
        return (substr($data,8,2).'/'.substr($data,5,2).'/'.substr($data,0,4));
    }
    else {
        return '';
    }
}
	
	@require_once("inc/conecta_pro.php"); 
	
    $operacao=$_POST['operacao'];

	if ($operacao == 'cadastrar'){
	    //dados aluno
        $nome_aluno = utf8_decode(anti_injection($_POST['aluno']));
		$sexo = anti_injection($_POST['sexo_aluno']);
        $cpf_aluno = anti_injection($_POST['cpf_aluno']);
		$nascimento = gravaData (anti_injection($_POST['nascimento']));
		$logr_aluno = utf8_decode(anti_injection($_POST['logr_aluno']));
        $numero_aluno = anti_injection($_POST['num_aluno']);
		$complemento_aluno = utf8_decode(anti_injection($_POST['compl_aluno']));
        $bairro_aluno = utf8_decode(anti_injection($_POST['bairro_aluno']));
		$cep_aluno = anti_injection($_POST['cep_aluno']);
		$cidade_aluno = utf8_decode(anti_injection($_POST['cidade_aluno']));
		$estado_aluno = utf8_decode(anti_injection($_POST['uf_aluno']));
       
        $cod_fone_aluno = anti_injection($_POST['cod_area_aluno']);
        $fone_aluno = anti_injection($_POST['fone_aluno']);
        
		$cod_cel_aluno = anti_injection($_POST['cod_cel_aluno']);
        $cel_aluno = anti_injection($_POST['cel_aluno']);
		
		$email_aluno = anti_injection($_POST['email_aluno']);
		
		//dados Acadêmicos
		
		$colegio_estuda = utf8_decode(anti_injection($_POST['colegio']));
		$serie_pretendida = utf8_decode(anti_injection($_POST['serie']));
		$cev = anti_injection($_POST['cev']);
       

        //dados representante
        $nome_resp = utf8_decode(anti_injection($_POST['nome']));
        $cpf_resp = anti_injection($_POST['cpf']);
        $rg_resp = anti_injection($_POST['rg']);
		
		$cod_fone_resp = anti_injection($_POST['cod_area']);
        $fone_resp = anti_injection($_POST['fone']);
		
		$cod_fone2_resp = anti_injection($_POST['cod_area_fone2']);
        $fone2_resp = anti_injection($_POST['fone2']);
        

        $data = date('Y/m/d');

   		$sql_aluno = "INSERT INTO teste_seletivo2 (nome,sexo,dta_nascimento,cpf,logradouro,numero,complemento,bairro,cep,cidade,estado,telefone,celular,email,colegio_estuda,serie_pretendida,conheceu_cev,inscricao,nome_resp,cpf_resp,rg_resp,fone_resp,cel_resp) 
		VALUES ('$nome_aluno','$sexo','$nascimento','$cpf_aluno','$logr_aluno', '$numero_aluno', '$complemento_aluno', '$bairro_aluno', '$cep_aluno','$cidade_aluno','$estado_aluno','($cod_fone_aluno) $fone_aluno', '($cod_cel_aluno) $cel_aluno', '$email_aluno', '$colegio_estuda', '$serie_pretendida','$cev','$data',
		'$nome_resp','$cpf_resp','$rg_resp','($cod_fone_resp) $fone_resp','($cod_fone2_resp) $fone2_resp')";
		
        $aluno = mysql_query($sql_aluno);
        if($aluno){
			include('envio.php');
	    }
	}
?>
	<!-- conteudo -->
    <div id="conteudo">

    	<!-- coluna-conteudo -->
        <div class="coluna-conteudo">

    <!-- coluna-centro -->
    <div class="coluna-centro">
    	<div class="box">
        	<div class="titulo">
                <h2>3º Teste Seletivo 2011</h2>
            </div>
            <div class="padding-20">

			  <p>
              </p>

	<div id="form-inscricao">

		<form  name="form1" method="post" action="" onsubmit="return doSubmit(event, this)">
			<fieldset style="border: 1px solid #cccccc; margin-left:10px;"><b><legend style="margin-left: 20px;">Dados do Responsável</legend></b>
					<div class="nome">
						<span style="color:#ff0000;"></span><label for="nome">Nome completo:</label><br/>
						<input type="text" name="nome" id="nome" size="54"  maxlength="60"><br/>
					</div>

					<div class="cpf">
						<span style="color:#ff0000;"></span><label for="cpf">CPF:</label><br/>
						<input type="text" name="cpf" id="cpf" size="15"  maxlength="20"><br/>
					</div>
					
					<div class="rg">
						<span style="color:#ff0000;"></span><label for="rg">RG:</label><br/>
						<input type="text" name="rg" id="rg" size="15"  maxlength="20"><br/>
					</div>
					
					<div class="fone1">
						<span style="color:#ff0000;"></span><label for="cod_area">Telefone:</label><br/>
						<!--codigo da area-->( <input type="text" name="cod_area" id="cod_area"  size="1" maxlength="2"> )
						<input type="text" name="fone" id="fone" size="10" onkeyup="traco(this)" maxlength="9"><br/>
					</div>

					<div class="fone2">
						</span><label for="cod_area_fone2">Celular:</label><br/>
						<!--codigo da area-->( <input type="text" name="cod_area_fone2" id="cod_area_fone2"  size="1" maxlength="2"> )
						<input type="text" name="fone2" id="fone2" size="10"  onkeyup="traco(this)" maxlength="9"><br/>
					</div>
			</fieldset>
			<br/>
			<fieldset style="border: 1px solid #cccccc; margin-left:10px;"><b><legend style="margin-left: 20px;">Dados Acadêmicos</legend></b>
				<div class="nome">
						<span style="color:#ff0000;"></span><label for="colegio">Colégio onde estuda atualmente:</label><br/>
						<input type="text" name="colegio" id="colegio" size="54"  maxlength="60"><br/>
				</div>
				
				<div class="curso">
						<span style="color:#ff0000;">*</span><label  for="sexo">Série:</label><span class="erro" id="span_curso" ></span><br/>
						<select name="serie" id="serie" ><br/>
							<option value="0">------------ Série Pretendida ------------</option>
							<option value="1º ano">1º ano</option>
							<option value="2º ano">2º ano</option>
							<option value="3º ano manhã">3º ano manhã</option>
							<option value="3º ano tarde">3º ano tarde</option>
							<option value="6º ano">6º ano</option>
							<option value="7º ano">7º ano</option>
							<option value="8º ano">8º ano</option>	
							<option value="9º ano">9º ano</option>	
						</select>
				</div>
				
				<div class="curso">
						<span style="color:#ff0000;">*</span><label  for="cev">Como tomou conhecimento do CEV:</label><span class="erro" id="span_curso" ></span><br/>
						<select name="cev" id="cev" ><br/>
							<option value="0">-------- Como conheceu o CEV ---------</option>
							<option value="Panfleto">Panfleto</option>
							<option value="Outdoor">Outdoor</option>
							<option value="Jornal">Jornal</option>
							<option value="Radio">Rádio</option>
							<option value="Internet">Internet</option>
							<option value="Outros">Outros</option>	
						</select>
				</div>
				
					<input type="hidden" name="operacao" value="cadastrar">
				
					<input type="hidden" name="aluno" value="<?php echo $_POST['nome']?>">
                    <input type="hidden" name="sexo_aluno" value="<?php echo $_POST['sexo']?>">
                    <input type="hidden" name="cpf_aluno" value="<?php echo $_POST['cpf']?>">
                    <input type="hidden" name="logr_aluno" value="<?php echo $_POST['logr']?>">
                    <input type="hidden" name="num_aluno" value="<?php echo $_POST['numero']?>">
                    <input type="hidden" name="compl_aluno" value="<?php echo $_POST['complemento']?>">
                    <input type="hidden" name="bairro_aluno" value="<?php echo $_POST['bairro']?>">
                    <input type="hidden" name="cep_aluno" value="<?php echo $_POST['cep']?>">
                    <input type="hidden" name="cidade_aluno" value="<?php echo $_POST['cidade']?>">
                    <input type="hidden" name="uf_aluno" value="<?php echo $_POST['estado']?>">
                    <input type="hidden" name="cod_area_aluno" value="<?php echo $_POST['cod_area']?>">
                    <input type="hidden" name="fone_aluno" value="<?php echo $_POST['fone']?>">
                    <input type="hidden" name="cod_cel_aluno" value="<?php echo $_POST['cod_area_fone2']?>">
                    <input type="hidden" name="cel_aluno" value="<?php echo $_POST['fone2']?>">
                    <input type="hidden" name="email_aluno" value="<?php echo $_POST['email']?>">
                    <input type="hidden" name="nascimento" value="<?php echo $_POST['nascimento']?>">
				
				<br/><br/><div class="msn_rodape"><span style="color:#ff0000;">*</span> Campos com preenchimento obrigatório</div><br/>
			</fieldset>
			<div class="bt_enviar">
				<input type="submit" value="Cadastrar" />
			</div>
		</form>

	</div>
	<br /><br /><br />
            </div>
          </div>
      </div>
      <!-- /coluna-conteudo -->


            <!-- coluna-direita -->
            <div class="coluna-direita">
            	<div class="box">
                	<div class="titulo">
                        <h2>Equipe</h2>
                    </div>
                    <div class="padding-10">
                        <div class="item">
                        	<img src="<?=SITE_URL?>/imagens/img-destaque-direita.gif" width="198" height="100" />
                            <h3><a href="equipe-professores">Equipe de Professores</a></h3>
                            <p>Conhe&ccedil;a os professores do CEV Profissionalizante e entenda porque nosso ensino &eacute; de qualidade.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /coluna-direita --->

            <div class="clear"></div>

        </div>
    	<!-- /coluna-centro-direita -->