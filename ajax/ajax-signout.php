<?php
########################################################
include_once("../inc/config.php");
include_once("../inc/function.php");
########################################################
// Clear old cookies --------------------------
setcookie(SS.'-SystemMember_ID', null, -1, "/", SYSTEM_COOKIES_DOMAIN, 0);
setcookie(SS.'-SystemMember_FBID', null, -1, "/", SYSTEM_COOKIES_DOMAIN, 0);
setcookie(SS.'-SystemMember_Email',null, -1, "/", SYSTEM_COOKIES_DOMAIN, 0);
setcookie(SS.'-SystemMember_Token',null, -1, "/", SYSTEM_COOKIES_DOMAIN, 0);
setcookie(SS.'-SystemMember_ProfilePicture', null, -1, "/", SYSTEM_COOKIES_DOMAIN, 0);
setcookie(SS.'-SystemMember_DisplayName',null, -1, "/", SYSTEM_COOKIES_DOMAIN, 0);
//----------------------------------------------
setcookie(SS.'-SystemMember_isCustomer', null, -1, "/", SYSTEM_COOKIES_DOMAIN, 0);
setcookie(SS.'-SystemMember_isCompany', null, -1, "/", SYSTEM_COOKIES_DOMAIN, 0);
setcookie(SS.'-SystemMember_isFreelance', null, -1, "/", SYSTEM_COOKIES_DOMAIN, 0);
####################################################################
echo "OK";
?>