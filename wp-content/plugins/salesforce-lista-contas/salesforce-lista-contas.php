<?php
/*
* Plugin Name: Salesforce - Lista de Contas
* Plugin URI: 
* Description: Integração com Salesforce, para exibir a lista de Contas (Acesse em: Configurações > Salesforce Contas)
* Version: 1.9
* Author: Vitor Amaral
* Author URI:
* License: GPL2
*/

function minhas_configuracoes() {

	add_settings_section(
		'minha_secao',
		'Configuração: integração com Salesforce - Lista de Contas',
		function(){
			echo '<p>Insira aqui todas as informações necessárias</p>';
			echo '<p>Para usar o plugin, utilize o shortcode: [salesforce_contas]</p>';
		},
		'grupo_minhas_configuracoes'
	);

//****** VALIDACAO URL_TOKEN
	register_setting(
		'grupo_minhas_configuracoes',
		'url_token',
		[
			'sanitize_callback' => function( $value ) {
				if($value == ""){

					add_settings_error(
						'url_token',
						esc_attr('chave_api_minha_integracao_error'),
						'url_token não pode ser vazio.',
						'error'
					);

					return get_option('url_token');
				}
				return $value;
			},
		]
	);
//****** VALIDACAO URL_API
	register_setting(
		'grupo_minhas_configuracoes',
		'url_api',
		[
			'sanitize_callback' => function( $value ) {
				if($value == ""){

					add_settings_error(
						'url_api',
						esc_attr('chave_api_minha_integracao_error'),
						'url_api não pode ser vazio.',
						'error'
					);

					return get_option('url_api');
				}
				return $value;
			},
		]
	);
//****** VALIDACAO USERNAME
	register_setting(
		'grupo_minhas_configuracoes',
		'username',
		[
			'sanitize_callback' => function( $value ) {
				if($value == ""){

					add_settings_error(
						'username',
						esc_attr('chave_api_minha_integracao_error'),
						'username não pode ser vazio.',
						'error'
					);

					return get_option('username');
				}
				return $value;
			},
		]
	);
//****** VALIDACAO PASSWORD
	register_setting(
		'grupo_minhas_configuracoes',
		'password',
		[
			'sanitize_callback' => function( $value ) {
				if($value == ""){

					add_settings_error(
						'password',
						esc_attr('chave_api_minha_integracao_error'),
						'password não pode ser vazio.',
						'error'
					);

					return get_option('password');
				}
				return $value;
			},
		]
	);
//****** VALIDACAO CLIENTE_ID
	register_setting(
		'grupo_minhas_configuracoes',
		'cliente_id',
		[
			'sanitize_callback' => function( $value ) {
				if($value == ""){

					add_settings_error(
						'cliente_id',
						esc_attr('chave_api_minha_integracao_error'),
						'cliente_id não pode ser vazio.',
						'error'
					);

					return get_option('cliente_id');
				}
				return $value;
			},
		]
	);
//****** VALIDACAO CLIENTE_SECRET
	register_setting(
		'grupo_minhas_configuracoes',
		'client_secret',
		[
			'sanitize_callback' => function( $value ) {
				if($value == ""){

					add_settings_error(
						'client_secret',
						esc_attr('chave_api_minha_integracao_error'),
						'client_secret não pode ser vazio.',
						'error'
					);

					return get_option('client_secret');
				}
				return $value;
			},
		]
	);
//****** VALIDACAO filtros
	register_setting(
		'grupo_minhas_configuracoes',
		'filtros',
		[
			'sanitize_callback' => function( $value ) {
				
				return $value;
			},
		]
	);
//****** VALIDACAO logo_tipo_pdf
	register_setting(
		'grupo_minhas_configuracoes',
		'logo_tipo_pdf',
		[
			'sanitize_callback' => function( $value ) {
				if($value == ""){

					add_settings_error(
						'logo_tipo_pdf',
						esc_attr('chave_api_minha_integracao_error'),
						'logo_tipo_pdf não pode ser vazio. E precisa ser a URL de imagem válida',
						'error'
					);

					return get_option('logo_tipo_pdf');
				}
				return $value;
			},
		]
	);

//****** CAMPO URL_TOKEN
	add_settings_field(
		'url_token',
		'url_token:',
		function( $args ){
			$options = get_option( 'url_token' );
			?>
				<input 
					id="<?php echo esc_attr( $args['label_for'] ); ?>"
					type="text" 
					name="url_token"
					value="<?php echo esc_attr( $options ); ?>" 
					style="width: 700px;"
				>
				<p>Url oauth da API, para receber o Token.</p>
			<?php
		},
		'grupo_minhas_configuracoes',
		'minha_secao',
		[
			'label_for' => 'url_token_html_id',
			'class'		=> 'minha-class-url_token',
		]
	);
//****** CAMPO URL_API
	add_settings_field(
		'url_api',
		'url_api:',
		function( $args ){
			$options = get_option( 'url_api' );
			?>
				<input 
					id="<?php echo esc_attr( $args['label_for'] ); ?>"
					type="text" 
					name="url_api"
					value="<?php echo esc_attr( $options ); ?>"
					style="width: 700px;"
				>
				<p>Url da API com a Query de busca.</p>
			<?php
		},
		'grupo_minhas_configuracoes',
		'minha_secao',
		[
			'label_for' => 'url_api_html_id',
			'class'		=> 'minha-class-url_api',
		]
	);
//****** CAMPO USERNAME
	add_settings_field(
		'username',
		'username:',
		function( $args ){
			$options = get_option( 'username' );
			?>
				<input 
					id="<?php echo esc_attr( $args['label_for'] ); ?>"
					type="text" 
					name="username"
					value="<?php echo esc_attr( $options ); ?>"
					style="width: 700px;"
				>
				<p>Usuário de validação.</p>
			<?php
		},
		'grupo_minhas_configuracoes',
		'minha_secao',
		[
			'label_for' => 'username_html_id',
			'class'		=> 'minha-class-username',
		]
	);
//****** CAMPO PASSWORD
	add_settings_field(
		'password',
		'password:',
		function( $args ){
			$options = get_option( 'password' );
			?>
				<input 
					id="<?php echo esc_attr( $args['label_for'] ); ?>"
					type="password" 
					name="password"
					value="<?php echo esc_attr( $options ); ?>"
					style="width: 700px;"
				>
				<p>Senha de validação + token de segurança da conta. (tudo junto)</p>
			<?php
		},
		'grupo_minhas_configuracoes',
		'minha_secao',
		[
			'label_for' => 'password_html_id',
			'class'		=> 'minha-class-password',
		]
	);	
//****** CAMPO CLIENTE_ID
	add_settings_field(
		'cliente_id',
		'cliente_id:',
		function( $args ){
			$options = get_option( 'cliente_id' );
			?>
				<input 
					id="<?php echo esc_attr( $args['label_for'] ); ?>"
					type="text" 
					name="cliente_id"
					value="<?php echo esc_attr( $options ); ?>"
					style="width: 700px;"
				>
				<p>"cliente_id" de validação da API.</p>
			<?php
		},
		'grupo_minhas_configuracoes',
		'minha_secao',
		[
			'label_for' => 'cliente_id_html_id',
			'class'		=> 'minha-class-cliente_id',
		]
	);
//****** CAMPO CLIENTE_SECRET
	add_settings_field(
		'client_secret',
		'client_secret:',
		function( $args ){
			$options = get_option( 'client_secret' );
			?>
				<input 
					id="<?php echo esc_attr( $args['label_for'] ); ?>"
					type="text" 
					name="client_secret"
					value="<?php echo esc_attr( $options ); ?>"
					style="width: 700px;"
				>
				<p>"client_secret" de validação da API.</p>
			<?php
		},
		'grupo_minhas_configuracoes',
		'minha_secao',
		[
			'label_for' => 'client_secret_html_id',
			'class'		=> 'minha-class-client_secret',
		]
	);
//****** CAMPO filtros
	add_settings_field(
		'filtros',
		'filtros:',
		function( $args ){
			$options = get_option( 'filtros' );
			?>
				<input 
					id="<?php echo esc_attr( $args['label_for'] ); ?>"
					type="text" 
					name="filtros"
					value="<?php echo esc_attr( $options ); ?>"
					style="width: 700px;"
				>
				<p>Configure Filtros a sua escolha. Coloque separados por virgula. Exemplo: <b>OTA,Operadoras,PMS</b></p>
			<?php
		},
		'grupo_minhas_configuracoes',
		'minha_secao',
		[
			'label_for' => 'logo_tipo_pdf_html_id',
			'class'		=> 'minha-class-filtros',
		]
	);
//****** CAMPO logo_tipo_pdf
	add_settings_field(
		'logo_tipo_pdf',
		'logo_tipo_pdf:',
		function( $args ){
			$options = get_option( 'logo_tipo_pdf' );
			?>
				<input 
					id="<?php echo esc_attr( $args['label_for'] ); ?>"
					type="text" 
					name="logo_tipo_pdf"
					value="<?php echo esc_attr( $options ); ?>"
					style="width: 700px;"
				>
				<p>
					Coloque a URL da imagem do logotipo que deverá aparecer no PDF.<br /> 
					(Não precisa colocar o domínio principal <?php echo site_url(); ?>)
				</p>
			<?php
		},
		'grupo_minhas_configuracoes',
		'minha_secao',
		[
			'label_for' => 'logo_tipo_pdf_html_id',
			'class'		=> 'minha-class-logo_tipo_pdf',
		]
	);

}



add_action('admin_init','minhas_configuracoes');


function minhas_configuracoes_menu(){
	add_options_page(
		'Salesforce - integração - Lista de Contas',
		'Salesforce Contas',
		'manage_options',
		'minhas-configuracoes',
		'minhas_configuracoes_html'
	);
}

add_action('admin_menu', 'minhas_configuracoes_menu');

function minhas_configuracoes_html(){
	?>
		<div class="wrap">
			<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
			<form action="options.php" method="post">
				<?php
					settings_fields('grupo_minhas_configuracoes');
					do_settings_sections('grupo_minhas_configuracoes');
					submit_button();
				?>
			</form>	
		</div>
	<?php
}



function tabela_salesforce_contas(){

	//TRATANDO LOGOTIPO DENTRO DO PDF
	$b64image = '';
	if(get_option('logo_tipo_pdf') != ""){
		$url = get_option('logo_tipo_pdf');
		$image = file_get_contents(site_url().$url);
    	$b64image = 'data:image/jpg;base64,'.base64_encode($image);
	}


    //TRATANDO FILTROS DE BUSCA
    $filtros_txt = "";
    if(get_option('filtros') != ""){
    	$array = explode(',', get_option('filtros'));
		foreach($array as $valores)
		{

			$filtros_txt .= '
			 					{
					                text: "'.$valores.'",
					                action: function ( e, dt, node, config ) {
					                    table
					                        .search("")
					                        .columns(1)
					                        .search("'.$valores.'")
					                        .draw();
					                        $(".dt-buttons").find(".xselected").removeClass("xselected");
                        					node.addClass("xselected");
					                }
					            },
			'; 
		}
	}


	echo '
<link rel="stylesheet" type="text/css" href="'.plugins_url().'/salesforce-lista-contas/datatables/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="'.plugins_url().'/salesforce-lista-contas/datatables/dataTables.bootstrap.min.css"> 
<link rel="stylesheet" type="text/css" href="'.plugins_url().'/salesforce-lista-contas/tabela.css?v=1.3">
		<div id="tabela">
			<p>
				Aguarde o carregamento da tabela! <br />
				<img src="'.plugins_url().'/salesforce-lista-contas/assets/carregando.gif" width="50px" />
			</p>
		</div>



<script type="text/javascript" charset="utf8" src="'.plugins_url().'/salesforce-lista-contas/datatables/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="'.plugins_url().'/salesforce-lista-contas/datatables/jquery.dataTables.min.js?v=1"></script>
<script type="text/javascript" charset="utf8" src="'.plugins_url().'/salesforce-lista-contas/datatables/dataTables.bootstrap.min.js"></script>	
<script src="'.plugins_url().'/salesforce-lista-contas/datatables/dataTables.buttons.min.js"></script>
<script src="'.plugins_url().'/salesforce-lista-contas/libs/jszip.min.js"></script> 
<script src="'.plugins_url().'/salesforce-lista-contas/libs/pdfmake.min.js"></script>
<script src="'.plugins_url().'/salesforce-lista-contas/libs/vfs_fonts.js"></script>
<script src="'.plugins_url().'/salesforce-lista-contas/libs/buttons.html5.min.js"></script>
<script src="'.plugins_url().'/salesforce-lista-contas/libs/buttons.colVis.min.js"></script>

<script>
    	$.ajax({
			
		         url: "'.plugin_dir_url( __FILE__ ).'tabela.php",
				 type: "POST",
				 cache: false,
				 dataType: "html",
				 timeout: 40000,
				 data: {acao: "montar_lista"},
				 success: function(data, textStatus){
					 	//console.log(data);

					 	$("#tabela").html(data);

		                var table = $("#tabela_content").DataTable( {
					        dom: "Bfrtip",
					        select: true,
					        buttons: [
					        	 {
					        	 	text: "Exportar para PDF",
					        	 	className: "al-right",
					                extend: "pdfHtml5",
					                filename: "integracoes_salesforce",
					                orientation: "portrait",
					                pageSize: "A4",
					                title: "Integrações Sales Froce",
					                exportOptions: {
					                    columns: [ 0, 1 ]
					                },
					                customize: function (doc) {
										//Remove the title created by datatTables
										doc.content.splice(0,1);
										//Create a date string that we use in the footer. Format is dd-mm-yyyy
										var now = new Date();
										var jsDate = now.getDate()+"-"+(now.getMonth()+1)+"-"+now.getFullYear();
										// Its important to create enough space at the top for a header !!!
										doc.pageMargins = [20,60,20,30];
										// Set the font size fot the entire document
										doc.defaultStyle.fontSize = 7;
										// Set the fontsize for the table header
										doc.styles.tableHeader.fontSize = 7;
										// Create a header object with 3 columns
										// Left side: Logo
										// Middle: brandname
										// Right side: A document title
										doc["header"]=(function() {
											return {
												columns: [
													{
														image: "'.$b64image.'",
														width: 24
													},
													{
														alignment: "left",
														italics: true,
														text: "Integrações Sales Froce",
														fontSize: 18,
														margin: [10,0]
													},
													{
														alignment: "right",
														fontSize: 14,
														text: ""
													}
												],
												margin: 20
											}
										});
										// Create a footer object with 2 columns
										// Left side: report creation date

										// Change dataTable layout (Table styling)
										// To use predefined layouts uncomment the line below and comment the custom lines below
										// doc.content[0].layout = "lightHorizontalLines"; // noBorders , headerLineOnly
										var objLayout = {};
										objLayout["hLineWidth"] = function(i) { return .5; };
										objLayout["vLineWidth"] = function(i) { return .5; };
										objLayout["hLineColor"] = function(i) { return "#aaa"; };
										objLayout["vLineColor"] = function(i) { return "#aaa"; };
										objLayout["paddingLeft"] = function(i) { return 4; };
										objLayout["paddingRight"] = function(i) { return 4; };
										doc.content[0].layout = objLayout;
								} //FIM ******
					            },
					            {
					                text: "Todos",
					                className: "xselected",
					                action: function ( e, dt, node, config ) {
					                    table
					                        .search("")
					                        .columns(1)
					                        .search("") //TODOS OS REGISTROS
					                        .draw();
					                         $(".dt-buttons").find(".xselected").removeClass("xselected");
                        					node.addClass("xselected");
					                }
					            },
					            '.$filtros_txt.'

					        ],
					    responsive: true
					    } );

		               },
				 error: function(xhr,err){
				 		
				 		$("#tabela").html("Ocorreu um problema, por favor tente mais tarde!.....");

				 		
					  		console.log(xhr);
				       }
		});
</script>


	';


}
add_shortcode('salesforce_contas', 'tabela_salesforce_contas');

