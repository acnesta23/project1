<?php
########################################################
include_once("../inc/config.php");
include_once("../inc/function.php");
########################################################
$inputFBID=$_REQUEST['inputFBID'];
$inputEmail=$_REQUEST['inputEmail'];
$inputFullName=$_REQUEST['inputFullName'];
####################################################################
$SendRequest = array(
    'action' => "system_member.CheckLogIn",
	'inputFBID' => urlencode($inputFBID),
	'inputEmail' => urlencode($inputEmail),
	'inputFullName' => urlencode($inputFullName)
);
$Result=System_GetAPI($SendRequest);
$Row=$Result["Result"];
####################################################################
if($Result["Status"]=="Success") {
    // Clear old cookies --------------------------
    setcookie(SS.'-SystemMember_ID', null, -1, "/", SYSTEM_COOKIES_DOMAIN, 0);
    setcookie(SS.'-SystemMember_FBID', null, -1, "/", SYSTEM_COOKIES_DOMAIN, 0);
    setcookie(SS.'-SystemMember_Email', null, -1, "/", SYSTEM_COOKIES_DOMAIN, 0);
    setcookie(SS.'-SystemMember_ProfilePicture', null, -1, "/", SYSTEM_COOKIES_DOMAIN, 0);
    setcookie(SS.'-SystemMember_DisplayName', null, -1, "/", SYSTEM_COOKIES_DOMAIN, 0);
    setcookie(SS.'-SystemMember_Token', null, -1, "/", SYSTEM_COOKIES_DOMAIN, 0);
    //----------------------------------------------
    setcookie(SS.'-SystemMember_isCustomer', null, -1, "/", SYSTEM_COOKIES_DOMAIN, 0);
    setcookie(SS.'-SystemMember_isCompany', null, -1, "/", SYSTEM_COOKIES_DOMAIN, 0);
    setcookie(SS.'-SystemMember_isFreelance', null, -1, "/", SYSTEM_COOKIES_DOMAIN, 0);
    // Create new cookies --------------------------
    $SystemMember_ID=$Row["ID"];                         setcookie(SS.'-SystemMember_ID', $SystemMember_ID, time()+SYSTEM_COOKIES_TIME, "/", SYSTEM_COOKIES_DOMAIN, 0);
    $SystemMember_FBID=$Row["FBID"];                     setcookie(SS.'-SystemMember_FBID', $SystemMember_FBID, time()+SYSTEM_COOKIES_TIME, "/", SYSTEM_COOKIES_DOMAIN, 0);
    $SystemMember_Email=$Row["Email"];                   setcookie(SS.'-SystemMember_Email', $SystemMember_Email, time()+SYSTEM_COOKIES_TIME, "/", SYSTEM_COOKIES_DOMAIN, 0);
    $SystemMember_ProfilePicture=$Row["ProfilePicture"]; setcookie(SS.'-SystemMember_ProfilePicture',$SystemMember_ProfilePicture, time()+SYSTEM_COOKIES_TIME, "/", SYSTEM_COOKIES_DOMAIN, 0);
    $SystemMember_DisplayName=$Row["DisplayName"]; 		 setcookie(SS.'-SystemMember_DisplayName',$SystemMember_DisplayName, time()+SYSTEM_COOKIES_TIME, "/", SYSTEM_COOKIES_DOMAIN, 0);
    $SystemMember_Token=System_GenToken($SystemMember_ID); setcookie(SS.'-SystemMember_Token', $SystemMember_Token, time()+SYSTEM_COOKIES_TIME, "/", SYSTEM_COOKIES_DOMAIN, 0);
    //----------------------------------------------
    $SystemMember_isCustomer=$Row["isCustomer"]; 		 setcookie(SS.'-SystemMember_isCustomer',$SystemMember_isCustomer, time()+SYSTEM_COOKIES_TIME, "/", SYSTEM_COOKIES_DOMAIN, 0);
    $SystemMember_isCompany=$Row["isCompany"]; 		 	 setcookie(SS.'-SystemMember_isCompany',$SystemMember_isCompany, time()+SYSTEM_COOKIES_TIME, "/", SYSTEM_COOKIES_DOMAIN, 0);
    $SystemMember_isFreelance=$Row["isFreelance"]; 		 setcookie(SS.'-SystemMember_isFreelance',$SystemMember_isFreelance, time()+SYSTEM_COOKIES_TIME, "/", SYSTEM_COOKIES_DOMAIN, 0);
    //----------------------------------------------
	if($Row["isNewMember"]=='Yes') {
		echo "New";
		line_notify_message("สมาชิกใหม่\r\n".$SystemMember_DisplayName);
	} else {
		echo "Success";
	}
} else {
    echo "Failed";
}
####################################################################
?>