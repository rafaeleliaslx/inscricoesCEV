<?php
$link_s = @mysql_connect('internal-db.s98296.gridserver.com', 'db98296', 'novodb2015');
if (!$link_s) {
    die('Internet com problemas 001: ' );
}
@mysql_select_db('db98296_cev_site')
?>
