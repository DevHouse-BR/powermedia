<?php
$db = mysql_connect("localhost", "root", "vertrigo") or tela_erro("Erro de conex�o com o banco: " . mysql_error(),true);
mysql_select_db ("powermedia");
?>