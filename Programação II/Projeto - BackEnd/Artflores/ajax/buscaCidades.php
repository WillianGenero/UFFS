<?php
if(!isset($_GET['regiao']) || !in_array($_GET['regiao'], array("CH", "CO", "XA", "NO")))
	die();
else{
	if($_GET['regiao'] == "CH"){
		echo "<option>Águas de Chapecó</option>
			<option>Águas Frias</option>
			<option>Bom Jesus do Oeste</option>
			<option>Caibi</option>
			<option>Campo Erê</option>
			<option>Caxambu do Sul</option>
			<option>Chapecó</option>
			<option>Cordilheira Alta</option>
			<option>Coronel Freitas</option>
			<option>Cunha Porã</option>
			<option>Cunhataí</option>
			<option>Guatambu</option>
			<option>Maravilha</option>
			<option>Nova Erechim</option>
			<option>Nova Itaberaba</option>
			<option>Palmitos</option>
			<option>Pinhalzinho</option>
			<option>Planalto Alegre</option>
			<option>Quilombo</option>
			<option>São Carlos</option>
			<option>Saudades</option>
			<option>Serra Alta</option>
			<option>Outra</option>";
	}elseif($_GET['regiao'] == "CO"){
		echo "<option>Alto Bela Vista</option>
			<option>Arabutã</option>
			<option>Arvoredo</option>
			<option>Concórdia</option>
			<option>Ipira</option>
			<option>Ipumirim</option>
			<option>Irani</option>
			<option>Itá</option>
			<option>Lindóia do Sul</option>
			<option>Paial</option>
			<option>Seara</option>
			<option>Xavantina</option>
			<option>Outra</option>";
	}elseif($_GET['regiao'] == "XA"){
		echo "<option>Abelardo Luz</option>
			<option>Bom Jesus</option>
			<option>Entre Rios</option>
			<option>Faxinal dos Guedes</option>
			<option>Ipuaçu</option>
			<option>Lajeado Grande</option>
			<option>Ponte Serrada</option>
			<option>São Domingos</option>
			<option>Vargeão</option>
			<option>Xanxerê</option>
			<option>Xaxim</option>";
	 }elseif($_GET['regiao'] == "NO"){
	 	echo "<option>Nonoai</option>
			<option>Erechim</option>
			<option>Faxinalzinho</option>
			<option>Gramado dos Loureiros</option>
			<option>Trindade do Sul</option>
			<option>Benjamin Constant do Sul</option>
			<option>São Valentim</option>
			<option>Três Palmeiras</option>
			<option>Planalto</option>
			<option>Alpestre</option>
			<option>Ametista do Sul</option>
			<option>Iraí</option>
			<option>Outra</option>";
	 }
}
?>

