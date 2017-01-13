<?php
@include("inc/topo.php");
?>


<!-- conteudo -->
<div id="conteudo">
    <?php

    /*
		INSCRIÇÕES
        script responsavel por incluir as paginas chamadas pela variavel P=
        esta variavel sofre um tratamento antinject no topo do site
        e so as paginas previamente liberadas podem ser exibidas
    */

    if(($pagina <> 'home') AND ($pagina <> '')) {
        //verifica se a pagina é permitida
        $paginas_encontradas='0';
        foreach ($paginas_liberadas as $pag_aux) {
            if ($pagina==$pag_aux) {
                $paginas_encontradas='1';
            }
        }
    }
    //inclui caso a pagina esteja liberada
    if ($paginas_encontradas=='1') {
        $pag_lik = anti_injection($url[1]);
        $pagina_interna = anti_injection($url[2]);
        if(empty ($pagina_interna)) {
            $pagina = ($_SERVER["DOCUMENT_ROOT"]."/inscricoes/inscricoes.php");
            @include $pagina ;
        }else{
            $pagina = ($_SERVER["DOCUMENT_ROOT"]."/inscricoes/".$pagina_interna.".php");
            @include $pagina ;
        }
    }
    ?>
</div>
<!-- /conteudo -->


<?php
@include("inc/menu.php");
include("inc/rodape.php");
@mysql_close();
?>
