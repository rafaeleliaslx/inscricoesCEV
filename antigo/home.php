<script type="text/javascript">
	var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
	document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
	try {
		var pageTracker = _gat._getTracker("UA-16287047-1");
		pageTracker._trackPageview();
	} catch(err) {}
</script>


<style type="text/css">
/*<![CDATA[*/
#nav{position: relative; top: -48px; display: block; height: 20px; padding: 10px; text-align: right; z-index: 99999;}
#nav a {background: #333; text-decoration: none; margin: 0 5px; padding: 5px 10px; color: #FFF; font-weight: bold; -moz-border-radius: 5px; -webkit-border-radius: 5px; font-size: 13px;}
#nav a.activeSlide {background: #EF9429;  }
#nav a:focus {outline: none;}
#banner{height: 160px; overflow: hidden;}
#banner img{z-index: -2000;}
#banner span{display: none; position: relative; top: -40px; height: 20px; padding: 10px; z-index: 1000; background: #000; opacity: 0.5; filter: alpha(opacity=50); font-size: 16px; font-weight: bold; color: #FFF;}
/*]]>*/
</style> 

    	<div class="destaque">
        	<div class="banner" id="banner">
                    
                    
                    
                    <div> <a href="http://www.grupocev.com/vestibulares/cevarada" title= "CEVARADA"> <img src="<?=SITE_URL?>/imagens/banner_radio_novo.jpg"  width="980" height="160"/><span>CEVARADA</span></a></div>
                    <div> <a href="http://www.grupocev.com/colegio/informativo-teste-seletivo" title= "Ensino Fundamental e medio"> <img src="<?=SITE_URL?>/imagens/outdoorDuplo.jpg" width="980" height="160" /><span>Ensino Fundamental e médio</span></a></div>
                    
                    
                    
                    <!--<div> <a href="http://www.grupocev.com/concursos/curso/29334+ASSESSOR+JURIDICO+DO+TJ+-+PROVA+PRATICA:+PARECER" title="RevisÃ£o OAB"> <img src="<?=SITE_URL?>/imagens/banner-parecer.gif" width="980" height="160" /><span>Revisão OAB</span></a></div>-->
            </div>
            <div id="nav"></div>
			


<?php
    //noticia destaque
   $result = @mysql_query("SELECT * FROM news ORDER BY id DESC LIMIT 0,1");
   $totalRow = @mysql_num_rows($result);
   //so entra no laço se existir algum registro
   if ($totalRow > 0){
        $row = @mysql_fetch_assoc($result)
?>

            <div class="item">
            	<div class="info vestibulares">
                    <h2><a href="<?=SITE_URL?>/vestibulares" title="Vestibulares">Vestibulares</a></h2>
                    <p><a href="<?=SITE_URL?>/vestibulares/noticia/<?php echo nome_url($row['id'], $row['titulo']); ?>"><?php echo substr(strip_tags($row['titulo']),0,30) . '...'; ?></a></p>
                    <a href="<?=SITE_URL?>/vestibulares" title="Entrar em CEV Vestibulares" class="botao">entrar</a>
                </div>
            </div>
<? } ?>

<?php
    //noticia destaque
   $result = @mysql_query("SELECT * FROM news_colegio ORDER BY id DESC LIMIT 0,1");
   $totalRow = @mysql_num_rows($result);
   //so entra no laço se existir algum registro
   if ($totalRow > 0){
        $row = @mysql_fetch_assoc($result)
?>
            <div class="item">
            	<div class="info colegio">
                    <h2><a href="<?=SITE_URL?>/colegio" title="Col&eacute;gio">Col&eacute;gio</a></h2>
                    <p><a href="<?=SITE_URL?>/colegio/noticia/<?php echo nome_url($row['id'], $row['titulo']); ?>"><?php echo substr(strip_tags($row['titulo']),0,30) . '...'; ?></a></p>
                    <a href="<?=SITE_URL?>/colegio" title="Entrar em CEV Col&eacute;gio" class="botao">entrar</a>
                </div>
            </div>
<? } ?>

<?php
    //noticia destaque
   $result = @mysql_query("SELECT * FROM news_concursos where local_noticia = '1' ORDER BY id DESC LIMIT 0,1");
   $totalRow = @mysql_num_rows($result);
   //so entra no laço se existir algum registro
   if ($totalRow > 0){
        $row = @mysql_fetch_assoc($result)
?>
            <div class="item">
            	<div class="info concursos">
                    <h2><a href="<?=SITE_URL?>/concursos" title="Concursos">Concursos</a></h2>
                    <p><a href="<?=SITE_URL?>/concursos/noticia/<?php echo nome_url($row['id'], $row['titulo']); ?>"><?php echo substr(strip_tags($row['titulo']),0,30) . '...'; ?></a></p>
                    <a href="<?=SITE_URL?>/concursos" title="Entrar em CEV Concursos" class="botao">entrar</a>
                </div>
            </div>
<? } ?>


<?php
    //noticia destaque
   $result = @mysql_query("SELECT * FROM news_ead ORDER BY id DESC LIMIT 0,1");
   $totalRow = @mysql_num_rows($result);
   //so entra no laço se existir algum registro
   if ($totalRow > 0){
        $row = @mysql_fetch_assoc($result)
?>
            <div class="item reset-margin">
            	<div class="info ead">
                    <h2><a href="<?=SITE_URL?>/ead" title="EaD">EaD</a></h2>
                    <p><a href="<?=SITE_URL?>/ead/noticia/<?php echo nome_url($row['id'], $row['titulo']); ?>"><?php echo substr(strip_tags($row['titulo']),0,30) . '...'; ?></a></p>
                    <a href="<?=SITE_URL?>/ead" title="Entrar em CEV EaD" class="botao">entrar</a>
                </div>
            </div>
            <div class="clear"></div>
        </div>
<? } ?>
<!--
<?php
    //noticia destaque
   $result = @mysql_query("SELECT * FROM news ORDER BY id DESC LIMIT 0,1");
   $totalRow = @mysql_num_rows($result);
   //so entra no laço se existir algum registro
   if ($totalRow > 0){
        $row = @mysql_fetch_assoc($result)
?>
            <div class="item reset-margin">
            	<div class="info Profissionalizante">
                    <h2><a href="<?=SITE_URL?>/Profissionalizante" title="EaD">Profissionalizante</a></h2>
                    <p><a href="<?=SITE_URL?>/Profissionalizante/noticia/<?php echo nome_url($row['id'], $row['titulo']); ?>"><?php echo substr(strip_tags($row['titulo']),0,30) . '...'; ?></a></p>
                    <a href="<?=SITE_URL?>/Profissionalizante" title="Entrar em CEV Profissionalizante" class="botao">entrar</a>
                </div>
            </div>
            <div class="clear"></div>
        </div>
<? } ?>
-->
     