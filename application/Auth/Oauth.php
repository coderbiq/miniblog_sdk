<?php
# 定义命名空间
namespace Ebsdk\Auth;

/**
 * 接口 Oauth 定义oauth授权接口的公共行为
 * 
 * @package Ebsdk\Auth
 * @version 0.1
 * @copyright 2010 www.dwenzi.com
 * @author elvis <elvis@dwenzi.com> 
 * @license New BSD License  {@link http://creativecommons.org/licenses/by-nc-sa/2.5/cn/}
 */
interface Oauth
{
    public function getRequestToken($_callback);
    public function getAuthorizeURL($_token, $_sign_in_with_Weibo = TRUE , $_url);
    public function getAccessToken($_oauth_verifier = FALSE, $_oauth_token = false);
    public function setToken($_token, $_token_secret);
}
