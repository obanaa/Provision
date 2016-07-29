<?php

/**
 * Created by PhpStorm.
 * User: obana
 * Date: 25.05.16
 * Time: 17:27
 */
class LoginMowDirectCest

{
    function loginLogoutSuccess(Step\Acceptance\Steps $I, \Page\LoginMowDirect $loginMowDirect) {
        $loginMowDirect->loginMowDirect('yf@itsvit.org', '123456');
        $loginMowDirect->logoutMowDirect();
    }

}