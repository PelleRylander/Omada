<?php
# Database Configuration
define( 'DB_NAME', 'wp_srgblender' );
define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', '' );
define( 'DB_HOST', '127.0.0.1' );
define( 'DB_HOST_SLAVE', '127.0.0.1' );
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', 'utf8_unicode_ci');
$table_prefix = 'wp_';

# Security Salts, Keys, Etc
define('AUTH_KEY',         'C%fXPjPfmw#Sz2z[T)K:#V@l}!(--7J>s-3#R%<05+GvQ{X7#V}`oN|^#R+RxAT-');
define('SECURE_AUTH_KEY',  '[-Imz=iq{D,3(k;Vw2#;gGC=s 3hWeE?AQ7C(4+I.f{ss<,Pppj=G:nk0hPiioNq');
define('LOGGED_IN_KEY',    '&!/G.{Fa<Z||JWl,Jp8WEbZ8:k#2|zfvdiGn[8}//xI+VY7$<-Twht]TGw{iIuN5');
define('NONCE_KEY',        'd?O_?0^`?jO-+YyUm!w`Ysp4w-CmvSsH&|K!y%cish4tM?9f8AyYF+F|5WTSUxrg');
define('AUTH_SALT',        'FT):8*+LseMlirZ6g;#$6F:|I,V[;~-nUIY7x:>k!Z*M($`R`+g|W6lVPwdr$FN>');
define('SECURE_AUTH_SALT', 'KIWNO)kR{+ RoPZpZBUgd#/r?b4!n:WZE8,%zS10DhYFPUj{6cU4~)Qv)+[9GSir');
define('LOGGED_IN_SALT',   '-SW4soo?_-[D*~Kt+h6M{K`^}24:#GOQTS;fRI@hn&s]B~j-ZI5QAxba<4Y,1/en');
define('NONCE_SALT',       '.k_?.9S=)x>#_+S:H+hzx;G)N3CNZ6)RsD-QiS-+^CQ1`&te;e!z:AMicv(DMgsg');


# Localized Language Stuff

define( 'WP_CACHE', TRUE );

define( 'WP_AUTO_UPDATE_CORE', false );

define( 'PWP_NAME', 'srgblender' );

define( 'FS_METHOD', 'direct' );

define( 'FS_CHMOD_DIR', 0775 );

define( 'FS_CHMOD_FILE', 0664 );

define( 'PWP_ROOT_DIR', '/nas/wp' );

define( 'WPE_APIKEY', '26c2cb845347ea20a905e56c3d46a70b5dd34faf' );

define( 'WPE_FOOTER_HTML', "" );

define( 'WPE_CLUSTER_ID', '42441' );

define( 'WPE_CLUSTER_TYPE', 'pod' );

define( 'WPE_ISP', true );

define( 'WPE_BPOD', false );

define( 'WPE_RO_FILESYSTEM', false );

define( 'WPE_LARGEFS_BUCKET', 'largefs.wpengine' );

define( 'WPE_SFTP_PORT', 2222 );

define( 'WPE_LBMASTER_IP', '45.33.53.147' );

define( 'WPE_CDN_DISABLE_ALLOWED', true );

define( 'DISALLOW_FILE_EDIT', FALSE );

define( 'DISALLOW_FILE_MODS', FALSE );

define( 'DISABLE_WP_CRON', false );

define( 'WPE_FORCE_SSL_LOGIN', false );

define( 'FORCE_SSL_LOGIN', false );

/*SSLSTART*/ if ( isset($_SERVER['HTTP_X_WPE_SSL']) && $_SERVER['HTTP_X_WPE_SSL'] ) $_SERVER['HTTPS'] = 'on'; /*SSLEND*/

define( 'WPE_EXTERNAL_URL', false );

define( 'WP_POST_REVISIONS', FALSE );

define( 'WPE_WHITELABEL', 'wpengine' );

define( 'WP_TURN_OFF_ADMIN_BAR', false );

define( 'WPE_BETA_TESTER', false );

umask(0002);

$wpe_cdn_uris=array ( );

$wpe_no_cdn_uris=array ( );

$wpe_content_regexs=array ( );

$wpe_all_domains=array ( 0 => 'srgblender.wpengine.com', );

$wpe_varnish_servers=array ( 0 => 'pod-42441', );

$wpe_special_ips=array ( 0 => '45.33.53.147', );

$wpe_ec_servers=array ( );

$wpe_largefs=array ( );

$wpe_netdna_domains=array ( );

$wpe_netdna_domains_secure=array ( );

$wpe_netdna_push_domains=array ( );

$wpe_domain_mappings=array ( );

$memcached_servers=array ( 'default' =>  array ( 0 => 'unix:///tmp/memcached.sock', ), );

define( 'WP_SITEURL', 'http://srgblender.wpengine.com' );

define( 'WP_HOME', 'http://srgblender.wpengine.com' );
define('WPLANG','');

# WP Engine ID


# WP Engine Settings






# That's It. Pencils down
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
require_once(ABSPATH . 'wp-settings.php');

$_wpe_preamble_path = null; if(false){}
