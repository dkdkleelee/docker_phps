<?php
if (!defined('_CSTMSG_')) exit;
define('G5_MYSQL_HOST', getenv('MYSQL_HOST') ?: 'localhost');
define('G5_MYSQL_USER', 'cstmsg');
define('G5_MYSQL_PASSWORD', 'cstmsg!@34qwer@@');
define('G5_MYSQL_DB', 'cstmsg');
define('G5_MYSQL_SET_MODE', true);

define('G5_TABLE_PREFIX', 'cstmsg_');

define('G5_TOKEN_ENCRYPTION_KEY', 'afdf45afed43984287d64700117a791d'); // 토큰 암호화에 사용할 키


$g5['comm_domain'] = G5_TABLE_PREFIX.'comm_domain';
$g5['config_table'] = G5_TABLE_PREFIX.'config';

$g5['crm_aft_ad_file'] = G5_TABLE_PREFIX.'crm_aft_ad_file';
$g5['crm_api_auth'] = G5_TABLE_PREFIX.'crm_api_auth';
$g5['crm_api_resv'] = G5_TABLE_PREFIX.'crm_api_resv';
$g5['crm_api_send'] = G5_TABLE_PREFIX.'crm_api_send';
$g5['crm_banip'] = G5_TABLE_PREFIX.'crm_banip';
$g5['crm_common'] = G5_TABLE_PREFIX.'crm_common';
$g5['crm_db_file'] = G5_TABLE_PREFIX.'crm_db_file';
$g5['crm_db_share'] = G5_TABLE_PREFIX.'crm_db_share';
$g5['crm_dbhist'] = G5_TABLE_PREFIX.'crm_dbhist';
$g5['crm_depart'] = G5_TABLE_PREFIX.'crm_depart';
$g5['crm_design'] = G5_TABLE_PREFIX.'crm_design';
$g5['crm_landing'] = G5_TABLE_PREFIX.'crm_landing';
$g5['crm_landing_sms'] = G5_TABLE_PREFIX.'crm_landing_sms';
$g5['crm_meet_mng'] = G5_TABLE_PREFIX.'crm_meet_mng';
$g5['crm_page'] = G5_TABLE_PREFIX.'crm_page';
$g5['crm_page_bk'] = G5_TABLE_PREFIX.'crm_page_bk';
$g5['crm_page_script'] = G5_TABLE_PREFIX.'crm_page_script';
$g5['crm_partner'] = G5_TABLE_PREFIX.'crm_partner';
$g5['crm_partner_hist'] = G5_TABLE_PREFIX.'crm_partner_hist';
$g5['crm_signup'] = G5_TABLE_PREFIX.'crm_signup';
$g5['crm_sms'] = G5_TABLE_PREFIX.'crm_sms';
$g5['crm_sms_mng'] = G5_TABLE_PREFIX.'crm_sms_mng';
$g5['crm_vaca_mng'] = G5_TABLE_PREFIX.'crm_vaca_mng';
$g5['crm_whiteip'] = G5_TABLE_PREFIX.'crm_whiteip';

$g5['login_table'] = G5_TABLE_PREFIX.'login';
$g5['mail_table'] = G5_TABLE_PREFIX.'mail';
$g5['member_table'] = G5_TABLE_PREFIX.'member';
$g5['memo_table'] = G5_TABLE_PREFIX.'memo';
$g5['menu_table'] = G5_TABLE_PREFIX.'menu';

$g5['record_hist'] = G5_TABLE_PREFIX.'record_hist';

$g5['ven_ip'] = G5_TABLE_PREFIX.'ven_ip';

$g5['visit_sum_table'] = G5_TABLE_PREFIX.'visit_sum';
$g5['visit_table'] = G5_TABLE_PREFIX.'visit';


?>