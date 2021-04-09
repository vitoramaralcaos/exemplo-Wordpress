<?php
// *** VITOR AMARAL	09/04/2021
	
	require_once('../../../wp-load.php');
	
	require_once "api.php";
	$classe = new API_GitHub();	
	
	
	$login = $_POST["login"];
	$termo_busca = $_POST["termo_busca"];
	
	$url = "https://api.github.com/users/".$login."/repos";
	$resultado = $classe->Get_Lista($url);


		
		if(count($resultado) == 0){
			echo '<p>
					Não foi encontrado nenhum repositórios com login: <b>'.$login.'</b>
					</p>
					<p>[<a href="javascript:Busca(&quot;'.$termo_busca.'&quot;);">Voltar para lista</a>]</p>
				';
		}else{
			$tabela = "";
			
			
			$cont = 1;
			foreach ( $resultado as $e ){
				if($cont == 1){
					$tabela .= '
						<table>
							<tr>
								<td style="text-align: center;"><img src="'.$e->owner->avatar_url.'" width="40px" /></td>
								<td>
									<b>Repositório: '.$login.'</b>
									<p>[<a href="javascript:Busca(&quot;'.$termo_busca.'&quot;);">Voltar para lista</a>]</p>	
								</td>

							</tr>
					';
				}
				
				
						
				$tabela .= '
					<tr>
						<td>'.$cont.'</td>
						<td>[<a href="https://github.com/marcocianci/'.$e->name.'" target="_blank">'.$e->name.'</a>]</td>
					</tr>
				';
			$cont = $cont + 1;
			}
			$tabela .= "</table>";
		
			
			echo $tabela;
		}	

	
	
	
	
	
	
	
?>