<?php
# 定义命名空间
namespace Ebsdk\Adapter\Sina\Auth;

# 包含依赖文件
require_once __DIR__ . '/../../../Auth.php';
require_once __DIR__ . '/../../../Auth/Oauth.php';

class Oauth implements \Ebsdk\Auth, \Ebsdk\Auth\Oauth
{
    public function getRequestToken($_callback)
    {
    }

    public function getAuthorizeURL($_token, $_sign_in_with_Weibo = TRUE , $_url)
    {
    }

    public function getAccessToken($_oauth_verifier = FALSE, $_oauth_token = false)
    {
    }

    public function setToken($_token)
    {
    }

    public function setTokenSecret($_token_secret)
    {
    }

    public function __construct(Array $_config)
    {
    }
}
