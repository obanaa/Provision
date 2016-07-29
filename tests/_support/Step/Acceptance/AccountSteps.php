<?php
namespace Step\Acceptance;


use Exception;

class AccountSteps extends \AcceptanceTester
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
        $I->see('Hello', 'p.hello > strong');
    }
    
    
    public function cycleRate ()
    {
        $I = $this;
        $I->amOnPage('/');
        //$I->amOnUrl('http://www.mowdirect.co.uk/');
        $I->waitForElement('//nav[@class="product-navigation"]/ul/li[2]');
        $I->moveMouseOver('//nav[@class="product-navigation"]/ul/li[2]');
        $I->waitForElementVisible('//div[@class="category"]//ul//a');
        $I->click('//div[@class="category"]//ul//a');
        $I->waitForElement('//div[@class="category-products"]');
        $I->click('//div[@class="product-primary"]//p/a[2]');
        $I->waitForElement('//div[@id="customer-reviews"]');
        $rate = count($I->grabMultiple('//*[@class="form-list"]//tbody/tr'));
        for($r=1;$r <= $rate; $r++){
            $I->click('//*[@class="form-list"]//tbody/tr['.$r.']/td['.rand(2,$rate).']/input');
            $I->wait(1);
        }


        $I->fillField('//*[@class="box-content"]//ul[2]/li//input', 'Test');
        $I->getVisibleText('Test');
        $I->fillField('//*[@class="box-content"]//ul[2]/li[2]//input','Test2');
        $I->getVisibleText('Test2');
        $I->fillField('//textarea[@id="review_field"]','Test3');
        $I->getVisibleText('Test3');
        try {
            $I->waitForElement('//div[@class="sweetcaptcha ltr"]');
        } catch (Exception $e) {
            $I->click('//*[@class="buttons-set form-buttons btn-only"]/div');
            $I->waitForElement('//li[@class="success-msg"]');
            $I->see('Your review has been accepted for moderation.', '//li[@class="success-msg"]');


            $I->waitForElement('//*[@class="fright"]//li[3]/a');
            $I->click('//*[@class="fright"]//li[3]/a');
            $I->waitForElement('//*[@class="main"]//ul/li[5]');
            $I->click('//*[@class="main"]//ul/li[5]');
            $I->waitForElement('//table[@class="data-table"]');
            $I->click('//table[@class="data-table"]//td[5]/a');
            $I->waitForElement('//div[@class="product-review"]');
            $I->waitForElement('//div[@class="product-review"]//table');
            $I->getVisibleText('FEATURES');
            $I->getVisibleText('BUILD QUALITY');
            $I->getVisibleText('ASSEMBLY');
            $I->getVisibleText('PERFORMANCE');
            $I->getVisibleText('Test');
        }

    }

    public function waitAlertWindow ()
    {
        $I = $this;
        $count = count($I->grabMultiple('//*[@class="col-2 addresses-additional"]/ol/li'));
        for ($d = $count; $d > 0; $d--) {
            $I->scrollDown(1000);
            $I->click('//*[@class="col-2 addresses-additional"]/ol/li['.$d.']/p/a[2]');
            $I->acceptPopup();
            $I->waitForElement('li.success-msg');
        }
    }





}