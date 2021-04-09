<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'db_moovenconsulting' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', 'root' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'SQ0]vPa:j61:U}x]ZI$Ov0`qAe-_`We~J;bm,_u}}`ypX+5+t#*zg`TGC(h8hnhT' );
define( 'SECURE_AUTH_KEY',  '_:hna[NNLpL~>!S6j2;_[l[A_QJtBim>r4/+EeT/.`;-D|gtG7Pi?,(>Sncr!Y@N' );
define( 'LOGGED_IN_KEY',    'csVmG9:w2VR|kOOwz gV(pk`. xz,LWOE(1in*jJmzC:tZbx7q!a9Y-Rg_]?<(15' );
define( 'NONCE_KEY',        '0tJir_&qB#7x4Sa)#Xpt0OJ/O/lNJwBQEfZK<5>i!mJ]uxo<iP[o8C<aJPQ}D][-' );
define( 'AUTH_SALT',        'K1tWs@g;nQ2%0$:B1?NH.Ddywq;f#$E AHp1?6;1139?FYmA^.m=]qe^yQ;}q h^' );
define( 'SECURE_AUTH_SALT', 'b!6><W7phcH).>-|&.Bz&V9GSvOKst,G3/,QTYuFa8zpGk0zR}fXs)tgrZ_!es`#' );
define( 'LOGGED_IN_SALT',   'PG!qv?VQ88R,%js3]_dIo=`ihXP9z0X;bNNk~? HC^?L3Q`^.vE9a=Ot8E4I~I5]' );
define( 'NONCE_SALT',       '^G/ErFJc84(8F$MR+.Od8cZY&H3#v{X_9HC8W71RINiKP 9fsGIY,7yHi!3`|e!}' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';
