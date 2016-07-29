<?php
namespace Step\Acceptance;

use Exception;

class LoginSteps extends \AcceptanceTester
{

    public function checkExistUser()
    {
        $I = $this;
        $grabMsg = $I->grabTextFrom('//ul[@class="messages"]');
        if (preg_match('/Thank you for registering with Denimio./i', $grabMsg) == 1) {
            $I->see('Thank you for registering with Denimio.', '//ul[@class="messages"]');
        } else {
            $I->see('There is already an account with this email address. ', '//ul[@class="messages"]');
        }
    }

   



        

    public function loginSuccess ($login,$pass)
    {
        $I = $this;
        $I->amOnUrl('http://www.mowdirect.co.uk/');
        $I->waitForElement('//div[@class="fright"]/ul/li[3]/a[1]');
        $I->click('//div[@class="fright"]/ul/li[3]/a[1]');
        $I->fillField('#email',$login);
        $I->fillField('#pass', $pass);
        $I->click('[name="send"] > span > span');
        $I->waitForElement('p.hello > strong');
       // $I->see('Hello    Test Test2', 'p.hello > strong');
    }





}