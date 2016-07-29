<?php
/**
 * Created by PhpStorm.
 * User: obana
 * Date: 07.06.16
 * Time: 16:58
 */

namespace Page;


use Exception;

class ShoppingCartMowDirect
{



    public static $URL = '/';
    public static $URL1 = '/checkout/cart/';
    public static $LawnTractorsLocator = '//*[@id="wp-nav-container"]/nav/ul/li[2]';
    public static $HeavyDutyTractors = '//*[@class="item2 active"]/nav/div[4]/h3/a';
    public static $assertHeavyDutyTractors = '//*[@class="mb-content"]//div/h1';
    public static $addToBasket1Button = '//*[@class="category-products"]//li[1]/div[2]/div/div[3]/p[1]';
    public static $headerBasket = '//*[@class="header-minicart"]/a';
    public static $headerPayPal = './/*[@id="ec_shortcut_cf93769374aae8421f6c6663213e364d"]/img';
    // Shopping Cart

  //  public static $assertYourBasket = '//*[@id="cart_desktop\"]/div[1]/div[1]/h1';
    public static $payPalCheckoutLink = '//ul[@class="checkout-types bottom"]/li/p//img';
    public static $payPalCredit = '//ul[@class="checkout-types bottom"]//li[3]//img';


    //PayPal Page
    public static $payPalLogo = '//*[@id="paypalLogo"]';
    public static $errorUnable = '//li[@class="error-msg"]';
    public static $emailField = '//*[@id="login_emaildiv"]/div[1]';
    public static $passwordField = '#password';
    public static $loginButton = '#btnLogin';

    public static $mowdirect = '//*[@id="header"]';
    public static $payPalCart = '//span[@id="transactionCart"]';
    public static $showPay = '//*[@class="transctionCartDetails ng-scope"]//h3/span[text()="MowDirect"]';


    protected $tester;
    public function __construct(\AcceptanceTester $I)

    {
        $this->tester = $I; // подкл. конструктора
    }

    public function addItemToCart() {
        $I = $this->tester;
        $I->amOnPage(self::$URL);
        //$I->amOnUrl('http://www.mowdirect.co.uk/');
        $I->moveMouseOver(self::$LawnTractorsLocator);
        $I->waitForElement(self::$HeavyDutyTractors);
        $I->click(self::$HeavyDutyTractors);
        $I->waitForElement(self::$assertHeavyDutyTractors);
        $I->click(self::$addToBasket1Button);
        $I->waitForElement(self::$payPalCheckoutLink);
        }



    public function payPalCheck(){
        $I = $this->tester;
        $I->waitForElementVisible(self::$payPalCheckoutLink);
        $I->click(self::$payPalCheckoutLink);
        try {
            $I->waitForElement(self::$errorUnable);
            $I->see('Unable to communicate with the PayPal gateway.',self::$errorUnable);
        } catch (Exception $e) {
            $I->see('Mowdirect', self::$mowdirect);
            $I->waitForElement(self::$payPalCart);
            $I->click(self::$payPalCart);
            $I->waitForElement(self::$showPay);
        }
        
        $I->click(self::$payPalCredit);
        $I->waitForElement(self::$errorUnable);
        $I->see('Unable to communicate with the PayPal gateway.',self::$errorUnable);

    }




}