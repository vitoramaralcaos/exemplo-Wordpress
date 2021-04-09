<?php
// VITOR AMARAL - 23/01/2020	
	
	class API_SalesForce
	{
		
		function Get_Token($url_token,$username,$password,$cliente_id,$client_secret)
		{
	
				$api = $url_token;
				$conteudo = [
				    'username' => $username,
				    'password' => $password,
				    'grant_type' => 'password',
				    'client_id' => $cliente_id,
				    'client_secret' => $client_secret,
				];
	
			$cabecalho = array(
						 'Content-Disposition: form-data'
						 );
	
			
			$tpRequisicao = 'POST';
			$resposta = $this->Comunicacao_API($api, $cabecalho, $conteudo, $tpRequisicao);
			
			$obj = json_decode($resposta);
			
			return $obj;
		}
		function Get_Lista($url, $token)
		{
			$api = $url;
			$cabecalho = array(
						 'Content-Type: application/json',
						 'Authorization: Bearer '.$token.''
						 );
			$conteudo = null;
			$tpRequisicao = 'GET';
			$resposta = $this->Comunicacao_API($api, $cabecalho, $conteudo, $tpRequisicao);
			
			$obj = json_decode($resposta);
			
			return $obj;
		}
		
		
		//****************** MODULO DE COMUNICACAO ****************
		private function Comunicacao_API($api, $cabecalho = array(), $conteudoAEnviar, $tpRequisicao) {
			 
			 try{
	
				 $ch = curl_init($api);
	
				 if ($tpRequisicao == 'POST') {
				 	curl_setopt($ch, CURLOPT_POST, 1);
				 
				 	curl_setopt($ch, CURLOPT_POSTFIELDS, $conteudoAEnviar);
				 }
	
				 if (!empty($cabecalho)) {
				 	curl_setopt($ch, CURLOPT_HTTPHEADER, $cabecalho);
				 }
	
				 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	
				 $resposta = curl_exec($ch);
				 
				 //Fecha a conexão
				 curl_close($ch);
				 
			 }catch(Exception $e){
				 
			 	return $e->getMessage();
			 	
			 }
		 
		 return $resposta;
		}
		
		
		
	}
	
	
?>