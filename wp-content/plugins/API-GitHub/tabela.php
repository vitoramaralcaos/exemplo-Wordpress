<?php
// *** VITOR AMARAL	09/04/2021
	
	require_once('../../../wp-load.php');
	
	require_once "api.php";
	$classe = new API_GitHub();	
	
	
	$termo_busca = $_POST["termo_busca"];
	
	
	$url = "https://api.github.com/search/users?q=".$termo_busca;
	$resultado = $classe->Get_Lista($url);

	
	//VERIFICANDO COMUNICACAO
	if(isset($resultado->total_count))
	{
		
		if($resultado->total_count == 0){
			echo "Não foi encontrado nenhum resultado com o termo: ".$termo_busca;
		}else{
			$tabela = "";
			
			
			$tabela .= "
						<table>
							<tr>
								<td></td>
								<td></td>
								<td>Login</td>
								<td>URL</td>
								<td> URL Repositório</td>
								<td></td>
							</tr>
			";
			$cont = 1;
			foreach ( $resultado->items as $e ){
						
				$tabela .= '
					<tr>
						<td>'.$cont.'</td>
						<td><img src="'.$e->avatar_url.'" width="40px" /></td>
						<td>'.$e->login.'</td>
						<td>'.$e->url.'</td>
						<td>'.$e->repos_url.'</td>
						<td>[<a href="javascript:Acessar_Repositorio(&quot;'.$e->login.'&quot;,&quot;'.$termo_busca.'&quot;);">Repositório</a>]</td>
					</tr>
				';
			$cont = $cont + 1;
			}
			$tabela .= "</table>";
		
			
			echo $tabela;
		}	
	}else{
		echo "
				Ocorreu algum problema na comunicação!
				<br /><br />
				Mensagem de erro: <br />
				<span style='font-size:14px; color:#FF0000'>".$resultado->message."</span>
		";
	}
	
	
	
	
	
	
	
?>