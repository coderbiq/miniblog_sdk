<?php
# 定义命名空间
namespace Ebsdk\Adapter\Tencent\Auth;

# 包含依赖文件
require_once __DIR__ . '/../../../Auth.php';
require_once __DIR__ . '/../../../Auth/Oauth.php';
require_once __DIR__ . '/../sdk/opent.php';

class Oauth implements \Ebsdk\Auth, \Ebsdk\Auth\Oauth
{
    protected $_tencent_auth;
    protected $_config = array(
        'return_format' => 'json'
    );

    public function getDriver()
    {
        return $this->_tencent_auth;
    }

    public function getRequestToken($_callback)
    {
        return $this->_tencent_auth->getRequestToken($_callback);
    }

    public function getAuthorizeURL($_token, $_sign_in_with_weibo = TRUE , $_url)
    {
        return $this->_tencent_auth->getAuthorizeURL($_token, $_sign_in_with_weibo, $_url);
    }

    public function getAccessToken($_oauth_verifier = FALSE, $_oauth_token = false)
    {
        return $this->_tencent_auth->getAccessToken($_oauth_verifier, $_oauth_token);
    }

    public function setToken($_token, $_token_secret)
    {
        $this->_tencent_auth->token = new \OauthConsumer($_token, $_token_secret);

        return $this;
    }

    public function __construct(Array $_config)
    {
        if(isset($_config['driver']))
            $this->_tencent_auth = $_config['driver'];

        else
        {
            $this->_config = array_merge($this->_config, $_config);

            $this->_tencent_auth = new \MBOpenToAuth(
                $this->_config['app_key'], $this->_config['app_secret']
            );

            $this->_tencent_auth->format = $this->_config['return_format'];
        }
    }
}
