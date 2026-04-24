<?php

if (!defined('_GNUBOARD_')) exit;

// .env 파일이 있으면 로컬, 없으면 운영 기본값 사용
$_env_file = dirname(__DIR__) . '/.env';
if (file_exists($_env_file)) {
    foreach (file($_env_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $_line) {
        if (strpos(trim($_line), '#') === 0) continue;
        [$_k, $_v] = explode('=', $_line, 2);
        $_ENV[trim($_k)] = trim($_v);
    }
}
unset($_env_file, $_line, $_k, $_v);

define('G5_MYSQL_HOST',     $_ENV['DB_HOST']     ?? 'localhost');
define('G5_MYSQL_USER',     $_ENV['DB_USER']     ?? 'withus');
define('G5_MYSQL_PASSWORD', $_ENV['DB_PASSWORD'] ?? 'with!@34qwer@@');
define('G5_MYSQL_DB',       $_ENV['DB_NAME']     ?? 'withus');
define('G5_MYSQL_SET_MODE', true);

define('G5_TABLE_PREFIX', 'gnp_');

define('G5_TOKEN_ENCRYPTION_KEY', 'dcac8d65c6861b67610d8398d59d31cb'); // 토큰 암호화에 사용할 키

$g5['write_prefix'] = G5_TABLE_PREFIX.'write_'; // 게시판 테이블명 접두사

$g5['auth_table'] = G5_TABLE_PREFIX.'auth'; // 관리권한 설정 테이블
$g5['config_table'] = G5_TABLE_PREFIX.'config'; // 기본환경 설정 테이블
$g5['group_table'] = G5_TABLE_PREFIX.'group'; // 게시판 그룹 테이블
$g5['group_member_table'] = G5_TABLE_PREFIX.'group_member'; // 게시판 그룹+회원 테이블
$g5['board_table'] = G5_TABLE_PREFIX.'board'; // 게시판 설정 테이블
$g5['board_file_table'] = G5_TABLE_PREFIX.'board_file'; // 게시판 첨부파일 테이블
$g5['board_good_table'] = G5_TABLE_PREFIX.'board_good'; // 게시물 추천,비추천 테이블
$g5['board_new_table'] = G5_TABLE_PREFIX.'board_new'; // 게시판 새글 테이블
$g5['login_table'] = G5_TABLE_PREFIX.'login'; // 로그인 테이블 (접속자수)
$g5['mail_table'] = G5_TABLE_PREFIX.'mail'; // 회원메일 테이블
$g5['member_table'] = G5_TABLE_PREFIX.'member'; // 회원 테이블
$g5['memo_table'] = G5_TABLE_PREFIX.'memo'; // 메모 테이블
$g5['poll_table'] = G5_TABLE_PREFIX.'poll'; // 투표 테이블
$g5['poll_etc_table'] = G5_TABLE_PREFIX.'poll_etc'; // 투표 기타의견 테이블
$g5['point_table'] = G5_TABLE_PREFIX.'point'; // 포인트 테이블
$g5['popular_table'] = G5_TABLE_PREFIX.'popular'; // 인기검색어 테이블
$g5['scrap_table'] = G5_TABLE_PREFIX.'scrap'; // 게시글 스크랩 테이블
$g5['visit_table'] = G5_TABLE_PREFIX.'visit'; // 방문자 테이블
$g5['visit_sum_table'] = G5_TABLE_PREFIX.'visit_sum'; // 방문자 합계 테이블
$g5['uniqid_table'] = G5_TABLE_PREFIX.'uniqid'; // 유니크한 값을 만드는 테이블
$g5['autosave_table'] = G5_TABLE_PREFIX.'autosave'; // 게시글 작성시 일정시간마다 글을 임시 저장하는 테이블
$g5['cert_history_table'] = G5_TABLE_PREFIX.'cert_history'; // 인증내역 테이블
$g5['qa_config_table'] = G5_TABLE_PREFIX.'qa_config'; // 1:1문의 설정테이블
$g5['qa_content_table'] = G5_TABLE_PREFIX.'qa_content'; // 1:1문의 테이블
$g5['content_table'] = G5_TABLE_PREFIX.'content'; // 내용(컨텐츠)정보 테이블
$g5['faq_table'] = G5_TABLE_PREFIX.'faq'; // 자주하시는 질문 테이블
$g5['faq_master_table'] = G5_TABLE_PREFIX.'faq_master'; // 자주하시는 질문 마스터 테이블
$g5['new_win_table'] = G5_TABLE_PREFIX.'new_win'; // 새창 테이블
$g5['menu_table'] = G5_TABLE_PREFIX.'menu'; // 메뉴관리 테이블
$g5['social_profile_table'] = G5_TABLE_PREFIX.'member_social_profiles'; // 소셜 로그인 테이블
$g5['member_cert_history_table'] = G5_TABLE_PREFIX.'member_cert_history'; // 본인인증 변경내역 테이블
$g5['crm_common'] = G5_TABLE_PREFIX.'crm_common'; // CRM:코드관리
$g5['crm_depart'] = G5_TABLE_PREFIX.'crm_depart'; // CRM:부서관리
$g5['crm_partner'] = G5_TABLE_PREFIX.'crm_partner'; // CRM:파트너관리
$g5['crm_partner_hist'] = G5_TABLE_PREFIX.'crm_partner_hist'; // CRM:파트너히스토리
$g5['crm_signup'] = G5_TABLE_PREFIX.'crm_signup'; // CRM:파트너임시회원가입
$g5['crm_design'] = G5_TABLE_PREFIX.'crm_design'; // CRM:디자인관리
$g5['crm_page'] = G5_TABLE_PREFIX.'crm_page'; // CRM:페이지관리
$g5['crm_page_script'] = G5_TABLE_PREFIX.'crm_page_script'; // CRM:페이지스크립트관리
$g5['crm_landing'] = G5_TABLE_PREFIX.'crm_landing'; // CRM:랜딩페이지
$g5['crm_dbhist'] = G5_TABLE_PREFIX.'crm_landing'; // CRM:랜딩백업


$g5['crm_api_resv'] = G5_TABLE_PREFIX.'crm_api_resv'; // CRM:api받기
$g5['crm_api_send'] = G5_TABLE_PREFIX.'crm_api_send'; // CRM:api보내기
$g5['crm_api_auth'] = G5_TABLE_PREFIX.'crm_api_auth'; // CRM:api인증

?>