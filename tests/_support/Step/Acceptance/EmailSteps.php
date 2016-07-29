<?php
namespace Step\Acceptance;


use Exception;

class EmailSteps extends \AcceptanceTester
{

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

    public function loginEmail()
    {
        $I = $this;
        $I->amOnUrl("https://mail.yahoo.com");
        $I->fillField('//*[@id="login-username"]', 'test_mowdirect@yahoo.co.uk');
        $I->click('//*[@id="login-signin"]');
        $I->waitForElementVisible('//*[@id="login-passwd"]');
        $I->fillField('//*[@id="login-passwd"]', 'fJ4qEn5Y');
        $I->click('//*[@id="login-signin"]');

            $I->waitForElement('//div[contains(@class,"unread")]//div[2]//span[contains(text(),"wishlist")]');
            $I->click('//div[contains(@class,"unread")]//div[2]//span[contains(text(),"wishlist")]');
        try {

            $I->wait(2);
            $I->click('//div[contains(@class,"unread")]//div[2]//span[contains(text(),"wishlist")]');
        } catch (Exception $e){}

        $I->waitForText('Take a look at my wishlist from MowDirect.');
        $I->waitForText('Test');

        $I->waitForElement('//*[@class="icon-delete"]');
        $I->click('//*[@class="icon-delete"]');
        try {
            $I->waitForText('Your Inbox folder is empty');
        } catch (Exception $e){}

        $I->click('//*[@id="match-messagelist-sizing"]//label');
        $I->wait(1);
        $I->waitForElement('//*[@class="icon-delete"]');
        $I->click('//*[@class="icon-delete"]');
        try {$I->waitForElement('//div[@id="modalOverlay"]//button');
            $I->click('//div[@id="modalOverlay"]//button');} catch (Exception $e){}
        $I->waitForText('Your Inbox folder is empty');
        
    }





}