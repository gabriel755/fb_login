<?php
    session_start();
    include('facebook-php-sdk/autoload.php');
    use Facebook\Facebook;
    use Facebook\Exceptions\FacebookResponseException;
    use Facebook\ExceptionsSDKException;

    $appId = '';//  <==  YOUR FB ID;
    $appSecret = ''; //  <== YOUR FB SECRET;
    $redirectUrl = 'http://localhost/web_service/fb_login/'; // Change to desired url.
    $fbPermission = array('email');

    $fb = new Facebook(array(
        'app_id' => $appId,
        'app_secret' => $appSecret,
        'default_graph_version' => 'v2.2'
    ));

    $helper = $fb->getRedirectLoginHelper();

    try{
        if(isset($_SESSION['facebook_access_token'])){
            $accessToken = $_SESSION['facebook_access_token'];
        }else{
            $accessToken = $helper->getAccessToken();
        }
    }catch(FacebookResponseException $e){

    }

?>