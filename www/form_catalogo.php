<?
require("funcoes.php");
require("conectar_mysql.php");
inicia_pagina();
monta_titulo_secao("Gera��o de Cat�logo", "home.php");
?>
<table width="100%">
	<tr>
		<td width="25%" valign="top" align="left">
			<? inicia_quadro_azul('width="100%"', "Cat�logos"); ?>
			<div style="width: 100%; text-align:justify;">
				<img align="absmiddle" src="imagens/info.gif">
				&nbsp;Tipos de m�dia n�o est�o apenas relacionados as m�dias em si (DVDs, CDs, MDs, Fitas), mas tamb�m est�o relacionados com os seus g�neros. Como a��o, terror, infantil ou Pop, Rock, Techno. Ent�o um exemplo de uso para este campo seria "DVDs Infantis".
			</div>
			<? termina_quadro_azul(); ?>
		</td>
		<td width="75%" align="center" valign="top">
			<? inicia_quadro_branco('width="90%"', "Configura��es"); ?>
			<form action="gera_catalogo.php" method="post" target="_blank">
			<center>
				<table width="90%" border="0" cellspacing="3">
					<tr>
						<td class="label" width="45%">Tipo de M�dia:</td>
						<td>
							<select name="id_tipo_media">
								<?php
								$query2 = "SELECT id_tipo_media, nome_tipo_media FROM tipo_media ORDER BY nome_tipo_media";
								$result = mysql_query($query2) or tela_erro("Erro na consulta ao Banco de dados: " . mysql_error(), false);
								while($registro = mysql_fetch_assoc($result)){
									echo('<option value="' . $registro["id_tipo_media"] . '"');
									if($registro["id_tipo_media"] == $id_tipo_media) echo(" selected");
									echo('>' . $registro["nome_tipo_media"] . '</option>');
								}
								require("desconectar_mysql.php");
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td class="label">Largura Capa no Cat�logo (pixels):</td>
						<td><input type="text" name="largura" value="<?=retorna_config("pixel_w_catalogo")?>" maxlength="4" class="input_text"></td>
					</tr>
					<tr>
						<td class="label">Quantidade de Capas por Linha no Cat�logo:</td>
						<td><input type="text" name="linha" value="<?=retorna_config("capas_linha_catalogo")?>" maxlength="5" class="input_text"></td>
					</tr>
					<tr>
						<td class="label">Tamanho da fonte do cat�logo em Pixels:</td>
						<td><input type="text" name="fonte" value="<?=retorna_config("tamanho_fonte_catalogo")?>" maxlength="5" class="input_text"></td>
					</tr>
					<tr>
						<td class="label">Quantidade de Linhas por P�gina do Cat�logo:</td>
						<td><input type="text" name="linha_pagina" value="<?=retorna_config("linhas_pagina_catalogo")?>" maxlength="5" class="input_text"></td>
					</tr>
					<tr>
						<td class="label">Cat�logo Completo:</td>
						<td align="left"><input type="checkbox" name="completo"></td>
					</tr>
					<tr>
						<td></td>
						<td align="right">
							<input type="submit" value="Proximo >>>" class="botao_aqua">
						</td>
					</tr>
				</table>
			</center>
			</form>
			<? termina_quadro_branco(); ?>
		</td>
	</tr>
</table>
<script language="javascript">
	document.forms[0].elements[0].focus();
</script>
<?
termina_pagina();
require("desconectar_mysql.php");
?>