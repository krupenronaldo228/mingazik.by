<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['base_url'] = 'http://mingaz.narisuemvse.ru/';
$config['index_page'] = '';
$config['uri_protocol']	= 'REQUEST_URI';
$config['url_suffix'] = '';
$config['language']	= 'russian';
$config['charset'] = 'UTF-8';
$config['enable_hooks'] = FALSE;

$config['subclass_prefix'] = IS_ADMIN_PAGE ? 'ADMIN_' : 'SITE_';

$config['composer_autoload'] = FALSE;
$config['permitted_uri_chars'] = 'a-z 0-9~%.:_\-';

$config['allow_get_array'] = TRUE;
$config['enable_query_strings'] = FALSE;
$config['controller_trigger'] = 'c';
$config['function_trigger'] = 'm';
$config['directory_trigger'] = 'd';

$config['log_threshold'] = 0;
$config['log_path'] = '';
$config['log_file_extension'] = '';
$config['log_file_permissions'] = 0644;
$config['log_date_format'] = 'Y-m-d H:i:s';


$config['error_views_path'] = '';

$config['cache_path'] = '';
$config['cache_query_string'] = FALSE;

$config['encryption_key'] = '1234qwerasdfzxcv';


$config['sess_driver'] = 'files';
$config['sess_cookie_name'] = 'ci_session';
$config['sess_expiration'] = 7200;
$config['sess_save_path'] = NULL;
$config['sess_match_ip'] = FALSE;
$config['sess_time_to_update'] = 300;
$config['sess_regenerate_destroy'] = FALSE;

$config['cookie_prefix']	= '';
$config['cookie_domain']	= '';
$config['cookie_path']		= '/';
$config['cookie_secure']	= FALSE;
$config['cookie_httponly'] 	= FALSE;

$config['standardize_newlines'] = FALSE;

$config['global_xss_filtering'] = FALSE;

$config['csrf_protection'] = TRUE;
$config['csrf_token_name'] = 'csrf_test_name';
$config['csrf_cookie_name'] = 'csrf_cookie_name';
$config['csrf_expire'] = 7200;
$config['csrf_regenerate'] = FALSE;
$config['csrf_exclude_uris'] = [
	'login/social',
	'admin/files/upload',
	'admin/files/elfinder_init',
	'admin/files/[a-z]+',
];

$config['compress_output'] = FALSE;

$config['time_reference'] = 'local';

$config['rewrite_short_tags'] = FALSE;

$config['proxy_ips'] = '';

/*
| -------------------------------------------------------------------
| CMS INFO
| -------------------------------------------------------------------
|
|
*/

$config['cms_title'] = 'V-IX.CMS';
$config['cms_version'] = '2.5';

$config['cms_copyright'] = '2013-'.date('Y').' &copy; ???????????????????? ?????????? <a href="http://krupencarporation.by" target="_blank">Krupen.by</a>';
$config['cms_developer_email'] = 'foodkillerby@outlook.com';