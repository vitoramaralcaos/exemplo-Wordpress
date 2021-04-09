<?php
/// VITOR AMARAL - 25/01/2021 ******


	

require_once('../../../wp-load.php');
	
	$status = "ok";
	
	require_once "api.php";
	$classe = new API_SalesForce();	
	$resultado_token = $classe->Get_Token(get_option('url_token'),get_option('username'),get_option('password'),get_option('cliente_id'),get_option('client_secret'));
	
	if(isset($resultado_token->error)){
		$status = "erro";
	}else{
		
		
		$resultado_lista = $classe->Get_Lista(get_option('url_api'),$resultado_token->access_token);
		if(isset($resultado_lista->errorCode)){
			$status = "erro";
		}	
	}
	//echo $resultado_token->access_token;

	
	$tabela = "";
	if($status == "ok"){
		
		try{
			
			if(isset($resultado_lista->totalSize)){
			$tabela .= '
				<table id="tabela_content" class="table table-striped table-bordered" style="width:100%">
				        <thead>
				            <tr>
				                <th>Nome</th>
				                <th>Tipo de Parceiro</th>
				            </tr>
				        </thead>
				        <tbody>
				';
						$exibir = "";
				        foreach ( $resultado_lista->records as $e ){

					
								$tabela .= '
									<tr>
										<td><p class="p1">'.$e->Name.'</p></td>
										<td><p class="p1">'.$e->Type.'</p></td>
									</tr>
								';

						}
			$tabela .= '
				        </tbody>
				        <tfoot>
				            <tr>
				                <th>Nome</th>
				                <th>Tipo de Parceiro</th>
				            </tr>
				        </tfoot>
				    </table>
			';
		}else{
			$status = "erro";
		}
			
		}catch(Exception $e){
			 
		 	$status = "erro";
		 	
		}
	

	}
	
	
	if($status == "ok"){
		echo $tabela;
	}else{
		echo "Ocorreu um problema, por favor tente mais tarde!.....";
	}
	die();
	
?>