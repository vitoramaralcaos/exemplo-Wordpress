<?php
/*
* Plugin Name: API Git Hub - Lista de repositórios
* Description: Integração com Git Hub, para busca de repositórios, Utilize o Shortcode: [github_repositorios]
* Version: 1.0
* Author: Vitor Amaral
* Author URI:
* License: GPL2
*/








function tabela_git(){
	echo '
		<div>
			<p>
				Busca de repositórios Git Hub: <input type="text" id="termo_busca" name="termo_busca">
				<br />
			</p>
		</div>
		<div id="resultado"></div>
		
		
		<script type="text/javascript" charset="utf8" src="'.plugins_url().'/API-GitHub/js/jquery.min.js"></script>
		<script>
		$(document).ready(function()
	    {
	        $("#termo_busca").keyup(function()
	        {
		        
		       	Busca($("#termo_busca").val());
 
	        });
	
	    });
	    
	    function Busca(termo_busca)
	    {
		    if(termo_busca.length >= 5){ 
			       $("#resultado").html("aguarde.......<br /><img src=\"'.plugins_url().'/API-GitHub/assets/carregando.gif\" width=\"50px\" />");
			     
					$.ajax({
					
				         url: "'.plugin_dir_url( __FILE__ ).'tabela.php",
						 type: "POST",
						 cache: false,
						 dataType: "html",
						 timeout: 40000,
						 data: {termo_busca: termo_busca},
						 success: function(data, textStatus){
							 	
							 	$("#resultado").html(data);
								
				               
				               },
						 error: function(xhr,err){
						 		
						 		$("#resultado").html("Ocorreu algum problema na comunicação!");
						 		
						 		}
				    });
				}else{
					$("#resultado").html("<p>Digite 5 ou mais caracteres para buscar</p>");
				}
	    }
	    
	    function Acessar_Repositorio(login,termo_busca)
	    {
		        
		        $("#resultado").html("aguarde o carregamento do repositório.......<br /><img src=\"'.plugins_url().'/API-GitHub/assets/carregando.gif\" width=\"50px\" />");
		        
		        	$.ajax({
					
				         url: "'.plugin_dir_url( __FILE__ ).'tabela_repositorio.php",
						 type: "POST",
						 cache: false,
						 dataType: "html",
						 timeout: 40000,
						 data: {login: login, termo_busca: termo_busca},
						 success: function(data, textStatus){
							 	
							 	$("#resultado").html(data);
								
				               
				               },
						 error: function(xhr,err){
						 		
						 		$("#resultado").html("Ocorreu algum problema na comunicação!");
						 		
						 		}
				    });
		        
	    }
	        
		</script>
	
	';
	

}
add_shortcode('github_repositorios', 'tabela_git');

