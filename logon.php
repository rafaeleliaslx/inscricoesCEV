<?
session_start();
//Elimina os dados da sess�o
#session_unregister($_SESSION['id']);
#2session_unregister($_SESSION['nome']);
#session_unregister($_SESSION['email']);

//Encerra a sess�o
session_destroy();
//header("Location:login2.php");
echo("<script language='javascript'>location.href='".site1."'</script>");

?>
?>