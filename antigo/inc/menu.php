
<div class="menu">
  	<div>
      	<h2>menu</h2>
          <ul>

<?php

    switch($url[1]){

      case 'vestibulares' :
?>
          	<li><a href="<?=SITE_URL?>/vestibulares" title="Inicial de Concursos" class="<?php if($menu=='vestibulares'){echo 'select';}  ?>">Inicial de Vestibulares</a></li>
          	<li><a href="<?=SITE_URL?>/vestibulares/noticias" title="Not&iacute;cias" class="<?php  if(($menu=='noticias') OR ($menu=='noticia')){echo 'select';}  ?>">Not&iacute;cias</a></li>
          	<li><a href="<?=SITE_URL?>/vestibulares/cursos" title="Cursos" class="<?php  if(($menu=='cursos') OR ($menu=='curso')){echo 'select';}  ?>">Cursos</a></li>
          	<li><a href="<?=SITE_URL?>/vestibulares/estrutura" title="Estrutura" class="<?php  if($menu=='estrutura'){echo 'select';}  ?>">Conhe&ccedil;a o CEV</a></li>
          	<li><a href="<?=SITE_URL?>/vestibulares/resultados" title="Nossos Resultados" class="<?php  if($menu=='resultados'){echo 'select';}  ?>">Nossos Resultados</a></li>
          	<li><a href="<?=SITE_URL?>/vestibulares/localizacao" title="Localiza&ccedil;&atilde;o" class="<?php  if($menu=='localizacao'){echo 'select';}  ?>">Localiza&ccedil;&atilde;o</a></li>
          	<li><a href="<?=SITE_URL?>/vestibulares/midia" title="Contato" class="<?php  if($menu=='midia'){echo 'select';}  ?>">CEV na midia</a></li>
          	<li><a href="<?=SITE_URL?>/vestibulares/fotos" title="Contato" class="<?php  if(($menu=='fotos') OR ($menu=='foto')){echo 'select';}  ?>">Galeria de Fotos</a></li>
         </ul>
         <div>
            <h2 style=" padding: 6px 20px 6px 20px; ">servi&ccedil;os on-line</h2>
            <ul>
            <li><a href="<?=SITE_URL?>/vestibulares/faleconosco" title="Contato" class="<?php  if($menu=='faleconosco'){echo 'select';}  ?>">Fale conosco</a></li>
          	<li><a href="<?=SITE_URL?>/vestibulares/matricula" title="" class="<?php  if($menu=='matricula'){echo 'select';}  ?>">Matr&iacute;cula on-line</a></li>
          	<li><a href="<?=SITE_URL?>/vestibulares/teste-seletivo" title="Teste Seletivo" class="<?php  if($menu=='teste-seletivo'){echo 'select';}  ?>">Teste Seletivo</a></li>
          	<li><a href="<?=SITE_URL?>/aluno/?tipo=vest" title="" class="<?php  if($menu=='aluno'){echo 'select';}  ?>">Aluno on-line</a></li>
          	<li><a href="<?=SITE_URL?>/vestibulares/aluno-cursos" title="" class="<?php  if($menu=='aluno'){echo 'select';}  ?>">Downloads</a></li>
            </ul>
         </div>

         <div>
            <h2 style=" padding: 6px 20px 6px 20px; ">vestibulares</h2>
            <ul>
          	<li><a href="<?=SITE_URL?>/vestibulares/resolve" title="" class="<?php  if($menu=='resolve'){echo 'select';}  ?>">CEV resolve</a></li>
<!--        <li><a href="<?=SITE_URL?>/vestibulares/obras" title="" class="<?php  if($menu=='obras'){echo 'select';}  ?>">Resumo de obras</a></li>
          	<li><a href="<?=SITE_URL?>/vestibulares/concorrencia" title="" class="<?php  if($menu=='concorrencia'){echo 'select';}  ?>">Concorr&ecirc;ncias</a></li> -->
          	<li><a href="<?=SITE_URL?>/vestibulares/links" title="" class="<?php  if($menu=='links'){echo 'select';}  ?>">Links &Uacute;teis</a></li>
          	<li><a href="<?=SITE_URL?>/vestibulares/provas" title="Aluno on-line" class="<?php  if($menu=='provas'){echo 'select';}  ?>">Provas</a></li>
          	<li><a href="<?=SITE_URL?>/vestibulares/cevarada" title="" class="<?php  if($menu=='cevarada'){echo 'select';}  ?>">Cevarada</a></li>
            </ul>
         </div>
<!--
         <div>
            <h2 style=" padding: 6px 20px 6px 20px; ">se&ccedil;&otilde;es especiais</h2>
            <ul>
          	<li><a style="font-weight: normal;" href="http://www.etapa.com.br/" target="_blank" title="" class="<?php  if($menu==''){echo 'select';}  ?>" >ETAPA sistema did&aacute;tico</a></li>
          	<li><a href="<?=SITE_URL?>/vestibulares/cevada" title="" class="<?php  if($menu=='cevada'){echo 'select';}  ?>">Programa Cevarada</a></li>
          	<li><a href="<?=SITE_URL?>/vestibulares/sacocheio" title="" class="<?php  if($menu=='sacocheio'){echo 'select';}  ?>">Semana do saco cheio</a></li>
            </ul>
         </div>
-->
<?php
      break;
      case 'colegio' :
?>
          	<li><a href="<?=SITE_URL?>/colegio" title="Inicial de Concursos" class="<?php if($menu=='colegio'){echo 'select';}  ?>">Inicial de Colegio</a></li>
            <li><a href="<?=SITE_URL?>/colegio/noticias" title="Not&iacute;cias" class="<?php  if(($menu=='noticias') OR ($menu=='noticia')){echo 'select';}  ?>">Not&iacute;cias</a></li>
          	<li><a href="<?=SITE_URL?>/colegio/apresentacao" title="Apresenta&ccedil;&atilde;o" class="<?php  if($menu=='apresentacao'){echo 'select';}  ?>">Apresenta&ccedil;&atilde;o</a></li>
          	<li><a href="<?=SITE_URL?>/colegio/localizacao" title="Localização" class="<?php  if($menu=='localizacao'){echo 'select';}  ?>">Localização</a></li>			
          	<li><a href="<?=SITE_URL?>/colegio/midia" title="Mídia" class="<?php  if($menu=='midia'){echo 'select';}  ?>">M&iacute;dia</a></li>
          	<li><a href="<?=SITE_URL?>/aluno/?tipo=col" title="Aluno on-line" class="<?php  if($menu=='aluno'){echo 'select';}  ?>">Aluno on-line</a></li>
          	<li><a href="<?=SITE_URL?>/colegio/resultados" title="Nossos Resultados" class="<?php  if($menu=='resultados'){echo 'select';}  ?>">Nossos Resultados</a></li>
          	<li><a href="<?=SITE_URL?>/colegio/teste-seletivo" title="Teste Seletivo" class="<?php  if($menu=='resultados'){echo 'select';}  ?>">Teste Seletivo</a></li>
			<li><a href="<?=SITE_URL?>/colegio/faleconosco" title="Contato" class="<?php  if($menu=='faleconosco'){echo 'select';}  ?>">Fale conosco</a></li>
            </ul >
<?php
      break;
      case 'concursos' :
?>
          	<li><a href="<?=SITE_URL?>/concursos" title="Inicial de Concursos" class="<?php if($menu=='concursos'){echo 'select';}  ?>">Inicial de Concursos</a></li>
          	<li><a href="<?=SITE_URL?>/concursos/noticias" title="Not&iacute;cias" class="<?php  if(($menu=='noticias') OR ($menu=='noticia')){echo 'select';}  ?>">Not&iacute;cias</a></li>
          	<li><a href="<?=SITE_URL?>/concursos/cursos" title="Cursos" class="<?php   if(($menu=='cursos') OR ($menu=='curso')){echo 'select';}  ?>">Cursos</a></li>
          	<li><a href="<?=SITE_URL?>/concursos/cursos" title="Aluno on-line" class="<?php  if($menu=='aluno'){echo 'select';}  ?>">Aluno on-line</a></li>
          	<li><a href="<?=SITE_URL?>/concursos/estrutura" title="Estrutura" class="<?php  if($menu=='estrutura'){echo 'select';}  ?>">Estrutura</a></li>
          	<li><a href="<?=SITE_URL?>/concursos/resultados" title="Nossos Resultados" class="<?php  if($menu=='resultados'){echo 'select';}  ?>">Nossos Resultados</a></li>
          	<li><a href="<?=SITE_URL?>/concursos/localizacao" title="Localiza&ccedil;&atilde;o" class="<?php  if($menu=='localizacao'){echo 'select';}  ?>">Localiza&ccedil;&atilde;o</a></li>
          	<li><a href="<?=SITE_URL?>/concursos/faleconosco" title="Contato" class="<?php  if($menu=='faleconosco'){echo 'select';}  ?>">Fale conosco</a></li>
            </ul >
         <div>
            <h2 style=" padding: 6px 20px 6px 20px; ">servi&ccedil;os on-line</h2>
            <ul>
                <li><a href="<?=SITE_URL?>/concursos/inscricoes" title="Inscrições" class="<?php  if($menu=='inscricoes'){echo 'select';}  ?>">Inscrições</a></li>
          	<li><a href="<?=SITE_URL?>/concursos/downloads" title="" class="<?php  if($menu=='downloads'){echo 'select';}  ?>">Downloads</a></li>
            </ul>
         </div>
<?php
      break;
      case 'ead' :
?>
          	<li><a href="<?=SITE_URL?>/ead" title="Inicial de EAD" class="<?php if($menu=='ead'){echo 'select';}  ?>">Inicial de Ead</a></li>
          	<!--<li><a href="http://www.ead.cursocev.com.br/" title="cev on-line" class="<?php  if($menu=='on-line'){echo 'select';}  ?>">CEV On-line</a></li>
          	<li><a href="<?=SITE_URL?>/ead/downloads" title="cev on-line" class="<?php  if($menu=='downloads'){echo 'select';}  ?>">Downloads</a></li>-->
          	<li><a href="<?=SITE_URL?>/ead/videos" title="videos" class="<?php  if($menu=='videos'){echo 'select';}  ?>">Videos</a></li>
          	<li><a href="<?=SITE_URL?>/ead/noticias" title="Not&iacute;cias" class="<?php  if(($menu=='noticias') OR ($menu=='noticia')){echo 'select';}  ?>">Not&iacute;cias</a></li>

                <li><a href="<?=SITE_URL?>/ead/franquia" title="Franquias" class="<?php if(($menu=='franquia') OR ($menu=='franquia')){echo 'select';}  ?>">Franquia on-line</a></li>

          	<li><a href="<?=SITE_URL?>/ead/cursos" title="Cursos" class="<?php if(($menu=='cursos') OR ($menu=='curso')){echo 'select';}  ?>">Cursos</a></li>
          	<li><a href="<?=SITE_URL?>/ead/polos" title="Polos" class="<?php  if($menu=='polos'){echo 'select';}  ?>">Polos parceiros</a></li>
          	<li><a href="<?=SITE_URL?>/ead/faleconosco" title="Contato" class="<?php  if($menu=='faleconosco'){echo 'select';}  ?>">Fale conosco</a></li>
            </ul >
<?php
      break;
      case 'profissionalizante' :
?>
          	<li><a href="<?=SITE_URL?>/profissionalizante" title="Inicial de profissionalizante" class="<?php if($menu=='profissionalizante'){echo 'select';}  ?>">Inicial</a></li>
          	<li><a href="<?=SITE_URL?>/profissionalizante/cursos" title="cursos" class="<?php  if($menu=='cursos'){echo 'select';}  ?>"> Cursos</a></li>
          	<li><a href="#" title="Pré-ncriçoes" class="<?php  if($menu=='pres-inscricao'){echo 'select';}  ?>">Pré-inscrição</a></li>
          	<li><a href="<?=SITE_URL?>/profissionalizante/noticias" title="Not&iacute;cias" class="<?php  if(($menu=='noticias') OR ($menu=='noticia')){echo 'select';}  ?>">Not&iacute;cias</a></li>
          	<li><a href="<?=SITE_URL?>/profissionalizante/curriculos" title="Banco de currículos" class="<?php if($menu=='curriculo'){echo 'select';}  ?>">Banco de Currículos</a></li>
          	<li><a href="<?=SITE_URL?>/profissionalizante/estrutura" title="Estrutura" class="<?php  if($menu=='estrutura'){echo 'select';}  ?>">Estrutura</a></li>
          	<li><a href="<?=SITE_URL?>/profissionalizante/localizacao" title="localização" class="<?php  if($menu=='localizacao'){echo 'select';}  ?>">Localização</a></li>
          	<li><a href="<?=SITE_URL?>/profissionalizante/faleconosco" title="Contato" class="<?php  if($menu=='faleconosco'){echo 'select';}  ?>">Fale conosco</a></li>
            </ul >
<?php

    } //fim switch

?>



    </div>
  	  <div>
      	<h2>institucional</h2>
          <ul>
          	<li><a href="<?=SITE_URL?>/<?php echo $url[1]; ?>/equipe-professores" title="Equipe de Professores" class="<?php  if($menu=='equipe-professores'){echo 'select';} ?>" >Equipe de Professores</a></li>
          	<!--<li><a href="<?=SITE_URL?>/<?php echo $url[1]; ?>/equipe-execultiva" title="Equipe de T&eacute;cnica"  class="<?php  if($menu=='equipe-execultiva'){echo 'select';} ?>" >Equipe de T&eacute;cnica</a></li>-->
          </ul>
      </div>
  </div>