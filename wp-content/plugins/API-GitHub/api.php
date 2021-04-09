<?php
// *** VITOR AMARAL	09/04/2021
	
	class API_GitHub
	{
		
		function Get_Lista($parametro)
		{
			
			$url = str_replace(" ", "+", $parametro);
			$cabecalho = array(
						  "Accept: application/vnd.github.v3+json",
						  'Content-Type: application/x-www-form-urlencoded',
						  "User-Agent: Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 YaBrowser/16.3.0.7146 Yowser/2.5 Safari/537.36"
						 );
			$conteudo = null;
			$tpRequisicao = 'GET';
			$resposta = $this->Comunicacao_API($url, $cabecalho, $conteudo, $tpRequisicao);
			
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