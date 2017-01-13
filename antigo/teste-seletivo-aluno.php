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

            if(document.getElementById('nome').value == ""){
                      document.getElementById('nome').focus();
                      alert("O campo NOME deve ser preenchido");
                      return false;
        	}
			
			if(document.getElementById('sexo').value == "0"){
                      document.getElementById('sexo').focus();
                      alert("O campo SEXO deve ser preenchido");
                      return false;
        	}
			
			//Validação de CPF
            /*var val = document.getElementById('cpf').value;
	        var base = val.substring(0, val.length-2);
            if(isCnpj(val)){
                 document.getElementById('cpf').value = formatCpfCnpj(val, true,true);
            }else{
              if(isCpf(val)){
                  document.getElementById('cpf').value = formatCpfCnpj(val, true);
              }else{
                    alert("CPF inválido");
                    document.getElementById('cpf').focus();
                    return false;
              }
            }*/
			
            if(document.getElementById('nascimento').value == ""){
                      document.getElementById('nascimento').focus();
                      alert("O campo NASCIMENTO deve ser preenchido");
                      return false;
        	}
			
			if(doDate(document.getElementById('nascimento').value, 4)){
				return false;
			}
			

            /*if(document.getElementById('logr').value == ""){
                      document.getElementById('logr').focus();
                      alert("O campo LOGRADOURO deve ser preenchido");
                      return false;
        	}

            if(document.getElementById('numero').value == ""){
                      document.getElementById('numero').focus();
                      alert("O campo NÚMERO deve ser preenchido");
                      return false;
        	}

            if(document.getElementById('bairro').value == ""){
                      document.getElementById('bairro').focus();
                      alert("O campo BAIRRO deve ser preenchido");
                      return false;
        	}

            if(document.getElementById('cep').value == ""){
                      document.getElementById('cep').focus();
                      alert("O campo CEP deve ser preenchido");
                      return false;
        	}*/

            if(document.getElementById('fone').value == ""){
                      document.getElementById('cod_area').focus();
                      alert("O campo TELEFONE deve ser preenchido");
                      return false;
        	}
			
			 if(document.getElementById('email').value == ""){
                      document.getElementById('email').focus();
                      alert("O campo EMAIL deve ser preenchido");
                      return false;
        	}

            return true;

    }
	
	var reDate4 = /^((0?[1-9]|[12]\d)\/(0?[1-9]|1[0-2])|30\/(0?[13-9]|1[0-2])|31\/(0?[13578]|1[02]))\/(19|20)?\d{2}$/;

	function doDate(pStr, pFmt)
	{
		eval("reDate = reDate" + pFmt);
		if (reDate.test(pStr)) {
			return false;
		} else if (pStr != null && pStr != "") {
			alert(pStr + " NÃO é uma data válida.");
			return true;
		}
	} // doDate
	
	function barra(objeto){
                if (objeto.value.length == 2 || objeto.value.length == 5 ){
                    objeto.value = objeto.value+"/";
                }
    }
	
	function traco(objeto){
                if (objeto.value.length == 4){
                    objeto.value = objeto.value+"-";
                }
    }
		
</script> 
	
	<?php @require_once("inc/conecta_pro.php"); 
	header("Content-Type: text/html; charset=utf-8",true);
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

		<form  name="form1" method="post" action="<?=SITE_URL?>/colegio/teste-seletivo-aluno-parte2" onsubmit="return doSubmit(event, this)">
			<fieldset style="border: 1px solid #cccccc; margin-left:10px;"><b><legend style="margin-left: 20px;">Dados pessoais</legend></b>
					<div class="nome">
						<span style="color:#ff0000;">*</span><label for="nome">Nome completo:</label><br/>
						<input type="text" name="nome" id="nome" size="54"  maxlength="60"><br/>
					</div>
					
					<div class="sexo">
						<span style="color:#ff0000;">*</span><label  for="sexo">Sexo:</label><span class="erro" id="span_curso" ></span><br/>
						<select name="sexo" id="sexo" ><br/>
							<option value="0"></option>
							<option value="F">Feminino</option>
							<option value="M">Masculino</option>
						</select>
					</div>

					<div class="cpf">
						<span style="color:#ff0000;"></span><label for="cpf">CPF:</label><br/>
						<input type="text" name="cpf" id="cpf" size="15"  maxlength="20"><br/>
					</div>
					
					
					<div class="nascimento">
						<span style="color:#ff0000;">*</span><label for="nascimento">Data nascimento:</label><br/>
						<input type="text" name="nascimento" id="nascimento" size="12" onkeyup="barra(this)" maxlength="10"><br/>
						<span style="color:#555555">Ex:04/11/1989</span>
					</div>
					
					<div class="logr">
						<span style="color:#ff0000;"></span><label  for="logr">Logradouro:</label><br/>
						<input type="text" name="logr" id="logr" size="40"  maxlength="40"><br/>
					</div>
					
					<div class="num">
						</span><span style="color:#ff0000;"></span><label  for="numero">Número:</label><br/>
						<input type="text" name="numero" id="numero" size="6"  maxlength="10"><br/>
					</div>
					
					<div class="compl">
						<label for="complemento">Complemento:</label></label><br/>
						<input type="text" name="complemento" id="complemento" size="54" maxlength="40"><br/>
					</div>
					
					
					<div class="bairro">
						<span style="color:#ff0000;"></span><label  for="bairro">Bairro:</label><br/>
						<input type="text" name="bairro" id="bairro" size="36"  maxlength="40"><br/>
					</div>

					<div class="cep">
						</span><span style="color:#ff0000;"></span><label  for="cep">CEP:</label><br/>	
						<input type="text" name="cep" id="cep" size="11"  maxlength="20"><br/>
					</div>
					
					<div class="cidade">
						<span style="color:#ff0000;"></span><label  for="cidade">Cidade:</label><br/>
						<input type="text" name="cidade" id="cidade" size="36"  maxlength="40"><br/>
					</div>

					<div class="estado">
						</span><span style="color:#ff0000;"></span><label  for="uf">Estado:</label><br/>	
						<input type="text" name="uf" id="uf" size="11"  maxlength="20"><br/>
					</div>
					
					<div class="fone1">
						<span style="color:#ff0000;">*</span><label for="cod_area">Telefone:</label><br/>
						<!--codigo da area-->( <input type="text" name="cod_area" id="cod_area"  size="1"  maxlength="2"> )
						<input type="text" name="fone" id="fone" size="10"  onkeyup="traco(this)" maxlength="9"><br/>
					</div>

					<div class="fone2">
						</span><label for="cod_area_fone2">Celular:</label><br/>
						<!--codigo da area-->( <input type="text" name="cod_area_fone2" id="cod_area_fone2"  size="1" maxlength="2"> )
						<input type="text" name="fone2" id="fone2" size="10" onkeyup="traco(this)" maxlength="9"><br/>
					</div>
					
					<div class="email">
						<label for="email"><span style="color:#ff0000;">*</span>Email:</label><br/>
						<input type="text" name="email" id="email" size="54"  maxlength="60"><br/>
					</div>
					<br/><br/><div class="msn_rodape"><span style="color:#ff0000;">*</span> Campos com preenchimento obrigatório</div><br/>
			</fieldset>	
			<div class="bt_enviar">
				<input type="submit" value="Próximo >>" />
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
            <!-- /coluna-direita -->

            <div class="clear"></div>

        </div>
    	<!-- /coluna-centro-direita -->