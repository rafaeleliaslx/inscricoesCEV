<?
session_start();
//Elimina os dados da sessão
#session_unregister($_SESSION['id']);
#2session_unregister($_SESSION['nome']);
#session_unregister($_SESSION['email']);

//Encerra a sessão
session_destroy();
//header("Location:login2.php");
echo("<script language='javascript'>location.href='".site1."'</script>");

?>
?>