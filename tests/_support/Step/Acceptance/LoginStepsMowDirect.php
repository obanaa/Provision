<?php
/**
 * Created by PhpStorm.
 * User: obana
 * Date: 31.05.16
 * Time: 12:56
 */

namespace Step\Acceptance;



class LoginStepsMowDirect extends \AcceptanceTester
{

    public function loginSuccess ($login,$pass)
    {
        $I = $this;
        //$I->amOnPage('/');
        $I->amOnUrl('https://www.mowdirect.co.uk');
        $I->waitForElement('//div[@class="fright"]/ul/li[3]/a[1]');
        $I->click('//div[@class="fright"]/ul/li[3]/a[1]');
        $I->fillField('#email',$login);
        $I->fillField('#pass', $pass);
        $I->click('[name="send"] > span > span');
        $I->waitForElement('p.hello > strong');
        $I->see('Hello    Test Test1 Test2', 'p.hello > strong');
    }

    ///////////////////////////////////////////////////////////////////////////////////

    public static $LawnTractorsLocator = '//*[@id="wp-nav-container"]/nav/ul/li[2]';
    public static $HeavyDutyTractors = '//*[@class="item2 active"]/nav/div[4]/h3/a';
    public static $assertHeavyDutyTractors = '//*[@class="mb-content"]//div/h1';
    public static $addToBasket1Button = '//*[@class="category-products"]//li[1]/div[2]/div/div[3]/p[1]';
    public static $headerBasket = '//*[@class="header-minicart"]/a';
    public static $headerPayPal = '//*[@id="ec_shortcut_cf93769374aae8421f6c6663213e364d"]/img';
    public static $buttonProceedToCheckout = './/*[@id="cart_desktop"]/div[1]/div[3]//button';
    public static $assertCheckout = '//*[@id="page-title-scroll"]/h1';
    public static $emailField = '//*[@class="col-2"]//li[1]/div/input';
    public static $passwordField = './/*[@class="col-2"]//li[2]/div/input';
    public static $LoginButton = '//*[@class="col-2"]//button';
    public static $myAccount = '//*[@class="fright"]/ul/li[3]/a[1]';

    public function loginSuccessCheckoutPage ($login,$pass)
    {
        $I = $this;
        $I->amOnUrl('https://www.mowdirect.co.uk');
        $I->moveMouseOver(self::$LawnTractorsLocator);
        $I->waitForElement(self::$HeavyDutyTractors);
        $I->click(self::$HeavyDutyTractors);
        $I->waitForElement(self::$assertHeavyDutyTractors);
        $I->click(self::$addToBasket1Button);
        $I->waitForElement(self::$buttonProceedToCheckout);
        $I->click(self::$buttonProceedToCheckout);
        $I->waitForElement(self::$assertCheckout);
        $I->see('Checkout',self::$assertCheckout);
        $I->fillField(self::$emailField,$login);
        $I->fillField(self::$passwordField, $pass);
        $I->click(self::$LoginButton);
        $I->see('My Account', self::$myAccount);

    }


    public function addItemCheckout ()
    {
        $I = $this;
        $I->amOnPage('/');
        $I->moveMouseOver(self::$LawnTractorsLocator);
        $I->waitForElement(self::$HeavyDutyTractors);
        $I->click(self::$HeavyDutyTractors);
        $I->waitForElement(self::$assertHeavyDutyTractors);
        $I->click(self::$addToBasket1Button);
        $I->waitForElement(self::$buttonProceedToCheckout);
        $I->click(self::$buttonProceedToCheckout);
        $I->waitForElement(self::$assertCheckout);
        $I->see('Checkout',self::$assertCheckout);


    }

}