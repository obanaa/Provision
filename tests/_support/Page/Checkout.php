<?php
namespace Page;


use Exception;

class Checkout
{

    //login

    public static $loginForm = '//div[@class="col-2"]';
    public static $email = '#login-email';
    public static $pass = '#login-password';
    public static $submit = '//div[@class="col-2"]//button/span';


    public static $processCheckout = '//ul[@class="checkout-types top"]//button';
    public static $continue = '//div[@id="billing-buttons-container"]//button';
    public static $formList = '//ul[@class="form-list"]';
    public static $deliver = '//ul[@class="form-list"]/li[3]/label[text()="Deliver to this address"]';
    public static $differentAddress = '//ul[@class="form-list"]/li[4]/label[text()="Deliver to different address"]';

    //delivery

    public static $showDelivery = '//*[@class="section allow active"]';
    public static $useAddress = '#co-shipping-form > ul.form-list > li.control > label';
    public static $continue2 = '//div[@id="shipping-buttons-container"]//button';

    // delivery method


    public static $showMethod = '//li[@id="opc-shipping_method"]';
    public static $continue3 = '//li[@id="opc-shipping_method"]//button';

    //payment info

    public static $showPayment = '//li[@id="opc-payment"]';
    public static $continue4 = '//li[@id="opc-payment"]//button';
    public static $bankTransfer = '//*[@id="co-payment-form"]//dl/dt[2]/input';


    //order

    public static $showOrder = '//li[@id="opc-review"]';
    public static $yourOrder = '//*[@id="md-checkout-cart"]';
    public static $productTable = '//*[@id="checkout-review-table"]';
    public static $agree = '//p[@class="agree"]/input';

    public static $continue5 = '//li[@id="opc-review"]//button';

    // after order

    public static $seeOrder = '//div[@class="page-title"]/h1';
    public static $keepContinue = '//div[@class="buttons-set"]/button';
    public static $mainPage = '//div[@class="page-header-container"]';


    // purchase optional

    public static $url = '/';
    public static $search = '#search';
    public static $clickSearch = '//button[@class="button search-button"]';
    public static $wait = '//div[@class="gsc-wrapper"]';
    public static $firstItem = '//div[@class="gsc-webResult gsc-result"]//a';
    public static $seeLink = '/lawnflite-703-rt-lawn-garden-tractor-ride-on-mower.html';
    public static $optional = '//div[@class="product-options"]';
    public static $input1 = '//dd[@class="last"]//li[1]/input';
    public static $input2 = '//dd[@class="last"]//li[2]/input';
    public static $input3 = '//dd[@class="last"]//li[3]/input';
    public static $input1Show = 'input.checkbox.change-container-classname.validation-passed';
    public static $input2Show = 'ul.options-list > li:nth-of-type(2) > input.checkbox.change-container-classname.validation-passed';
    public static $input3Show = 'ul.options-list > li:nth-of-type(3) > input.checkbox.change-container-classname.validation-passed';
    public static $addToCart = '//div[@class="add-to-cart-buttons"]/button';
    public static $specialProd = '//dl[@class="item-options"]/dt[text()="Exclusive Special Offer"]';
    public static $accessories = '//dl[@class="item-options"]//dd[text()="Free Lawnflite Trailer worth £199!                            "]';
    public static $move = '//*[@class="truncated"]';
    public static $waitAccessories = '//*[@class="truncated_full_value show"]';


    // pay pal

    public static $payPalLogo = '//*[@id="paypalLogo"]';
    public static $errorUnable = '//li[@class="error-msg"]';
    public static $emailField = '//*[@id="login_emaildiv"]/div[1]';
    public static $passwordField = '#password';
    public static $loginButton = '#btnLogin';

    public static $mowdirect = '//*[@id="header"]';
    public static $payPalCart = '//span[@id="transactionCart"]';
    public static $showPay = '//*[@class="transctionCartDetails ng-scope"]//h3/span[text()="MowDirect"]';

    //pay pal credit

    public static $payPalCheckoutLink = '//div[@id="cart_mobile"]//div[3]//ul/li//img';
    public static $payPalCredit = '//div[@id="cart_mobile"]//div[3]//ul/li[2]//img';

    public static $payPalCreditText = 'You will be redirected to the PayPal website.';
    public static $payPalCredit2 = '//*[@id="co-payment-form"]//dl/dt[4]/input';


    public static $payPalCheckoutLinkTablet = '//ul[@class="checkout-types bottom"]/li/p//img';
    public static $payPalCreditTablet = '//ul[@class="checkout-types bottom"]//li[3]//img';


    public static $removeItem2 = '//div[@id="cart_desktop"]//tbody//td[6]//a';
    // suge purchase


    public static $sugePurchase = '//*[@id="co-payment-form"]//dl/dt[1]/input';

    //suge switch on admin panel

    public static $inputNameCard = '//ul[@class="form-list paymentsage"]//li//input';
    public static $typeCreditCard = '//ul[@class="form-list paymentsage"]//li[2]//select';
    public static $cardNumber = '//ul[@class="form-list paymentsage"]//li[3]/div/input';
    public static $verificationNum = '//ul[@class="form-list paymentsage"]//li[5]/div//input';




    protected $tester;

    public function __construct(\AcceptanceTester $I)
    {
        $this->tester = $I;
    }


    public function loginInvalid($name, $password)
    {
        $I = $this->tester;
        $I->waitForElement(self::$loginForm);
        $I->fillField(self::$email, $name);
        $I->fillField(self::$pass, $password);
        $I->click(self::$submit);

        return $this;
    }


    /**
     * @param $name
     * @param $password
     */
    public function checkOrder($name, $password)
    {
        $I = $this->tester;
        $I->waitForElement(self::$processCheckout);
        $I->click(self::$processCheckout);
        try {
            self::loginInvalid($name, $password);
        } catch (Exception $e) {
        }

        $I->waitForText('Checkout');
        $I->getVisibleText('Billing Information');
        $I->seeElement(self::$formList);
        $I->seeElement(self::$deliver);
        $I->seeElement(self::$differentAddress);
        $I->waitForElement(self::$continue);
        $I->click(self::$continue);
        $I->waitForElementNotVisible('//*[@id="billing-please-wait"]');

        $I->waitForElement(self::$showDelivery);
        $I->waitForText('Delivery Information');
        $I->waitForElement(self::$useAddress);

        try {
            $I->waitForElement(self::$continue2);
            $I->click(self::$continue2);
        } catch (Exception $e) {
        }

        $I->waitForElement(self::$showMethod);
        $I->waitForText('Delivery Method');
        $I->wait(2);
        $I->waitForElement(self::$continue3);
        $I->click(self::$continue3);

        $I->waitForElement(self::$showPayment);
        $I->waitForText('Payment Information');
        $I->waitForElementVisible(self::$continue4);
    }

    public function checkPayment($name, $password)
    {

        self::checkOrder($name, $password);
        $I = $this->tester;
        $I->wait(2);
        $I->waitForElement(self::$bankTransfer);
        $I->click(self::$bankTransfer);
        $I->click(self::$continue4);

        $I->waitForElement(self::$showOrder);
        $I->waitForText('Order Review');
        $I->waitForElement(self::$yourOrder);
        $I->getVisibleText('YOUR SELECTION');
        $I->getVisibleText('INVOICE ADDRESS');
        $I->getVisibleText('DELIVERY ADDRESS');
        $I->getVisibleText('DELIVERY METHOD');
        $I->getVisibleText('PAYMENT METHOD');
        $I->getVisibleText('Cheque or Bank Transfer');
        $I->waitForElement(self::$productTable);
        try {
            $I->waitForElement('//dl[@class="item-options"]/dt[text()="Optional Accessories:"]');
        } catch (Exception $e) {
        }
        $I->waitForElement(self::$agree);
        $I->click(self::$agree);

        $I->waitForElementVisible(self::$continue5);

        $I->click(self::$continue5);
        $I->waitForText('Your order has been received.', 30);
        $I->see('Your order has been received.', self::$seeOrder);
        $I->getVisibleText('Thank you for your purchase!');
        $I->click(self::$keepContinue);
        $I->waitForElement(self::$mainPage);


    }

    public function payPalCheckout()
    {
        $I = $this->tester;
        try {
            $I->waitForElementVisible(self::$payPalCheckoutLink);
            $I->click(self::$payPalCheckoutLink);
        } catch (Exception $e) {
            $I->waitForElementVisible(self::$payPalCheckoutLinkTablet);
            $I->click(self::$payPalCheckoutLinkTablet);
        }
        try {
            $I->waitForElement(self::$errorUnable);
            $I->see('Unable to communicate with the PayPal gateway.', self::$errorUnable);
        } catch (Exception $e) {
            $I->see('Mowdirect', self::$mowdirect);
            $I->waitForElement(self::$payPalCart);
            $I->click(self::$payPalCart);
            $I->waitForElement(self::$showPay);
        }

    }


    public function payPalCredit()
    {
        $I = $this->tester;
        try {
            $I->waitForElementVisible(self::$payPalCredit);
            $I->click(self::$payPalCredit);
        } catch (Exception $e) {
            $I->waitForElementVisible(self::$payPalCreditTablet);
            $I->click(self::$payPalCreditTablet);
        }
        try {
            $I->waitForElement(self::$errorUnable);
            $I->see('Unable to communicate with the PayPal gateway.', self::$errorUnable);
        } catch (Exception $e) {

            $I->see('Mowdirect', self::$mowdirect);
            $I->waitForElement(self::$payPalCart);
            $I->click(self::$payPalCart);
            $I->waitForElement(self::$showPay);

        }
    }

    public function checkPayPalCredit($name, $password)
    {
        $I = $this->tester;
        self::checkOrder($name, $password);
        $I->waitForElement(self::$payPalCredit2);
        $I->wait(2);
        $I->click(self::$payPalCredit2);
        $I->getVisibleText(self::$payPalCreditText, 10);
        $I->wait(2);
        $I->click(self::$continue4);
        try {
            $I->waitForElement(self::$errorUnable);
            $I->see('Unable to communicate with the PayPal gateway.', self::$errorUnable);
            $I->click(self::$removeItem2);

            $I->waitForText('Your Basket is empty...');
        } catch (Exception $e) {
        }


    }

    /**
     * @param $name
     * @param $password
     * @param $card
     * @param $numCard
     * @param $verNum
     */
    public function checkSugePurchase($name, $password, $card, $numCard, $verNum)
    {
        $I = $this->tester;
        self::checkOrder($name, $password);
        $I->wait(2);
        $I->waitForElement(self::$sugePurchase);
        $I->click(self::$sugePurchase);
        $I->wait(2);
        try {
            $I->scrollTo(self::$continue4,100);
            $I->click(self::$continue4);
            $I->getVisibleText('This is a required field.');
            $I->getVisibleText('Card type doesn\'t match credit card number');
            $I->fillField(self::$inputNameCard, 'Test');
            $I->selectOption(self::$typeCreditCard, $card);
            $I->fillField(self::$cardNumber, $numCard);
            $I->fillField(self::$verificationNum, $verNum); } catch (Exception $e){}

        $I->click(self::$continue4);

        $I->waitForElement(self::$showOrder);
        $I->waitForText('Order Review');
        $I->waitForElement(self::$yourOrder);
        $I->getVisibleText('YOUR SELECTION');
        $I->getVisibleText('INVOICE ADDRESS');
        $I->getVisibleText('DELIVERY ADDRESS');
        $I->getVisibleText('DELIVERY METHOD');
        $I->getVisibleText('PAYMENT METHOD');
        $I->getVisibleText('Cheque or Bank Transfer');
        $I->waitForElement(self::$productTable);
        $I->waitForElement(self::$agree);
        $I->click(self::$agree);

        $I->waitForElementVisible(self::$continue5);

        $I->click(self::$continue5);

        try {
            $I->wait(5);
            $I->acceptPopup();
            $I->amOnPage('/checkout/cart/');
            $I->click(self::$removeItem2);
            $I->waitForText('Your Basket is empty...');
        } catch (Exception $e){

        }
    }
}




        /*
                    $I->waitForText('Your order has been received.', 30);
                    $I->see('Your order has been received.', self::$seeOrder);
                    $I->getVisibleText('Thank you for your purchase!');
                    $I->click(self::$keepContinue);
                    $I->waitForElement(self::$mainPage);
                }
        */





   

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
////////////////////////////////////////////////////////////////////////////////////

/*
    public static $registerAndCheckoutCheckbox = '//*[@class="col-1"]/ul/li[2]/input';
    public static $continueRegisterButton = '//*[@id="onepage-guest-register-button"]';

 // Billing Information
    public static $titleField = '//*[@class="fieldset"]/ul/li[1]/div/div[1]//input';
    public static $firstNameField = '//*[@class="fieldset"]/ul/li[1]/div/div[2]//input';
    public static $lastNameField = '//*[@class="fieldset"]/ul/li[1]/div/div[3]//input';
    public static $emailField = '//*[@class="fieldset"]/ul/li[2]/div/div[1]//input';
    public static $postCodeField = '//*[@id="billing:postcode"]';
    public static $addressField = '//*[@id="billing:street1"]';
    public static $townField = '//*[@id="billing:city"]';
    public static $mobileField = '//*[@id="billing:telephone"]';
    public static $password1 = '//*[@id="billing:customer_password"]';
    public static $password2 = '//*[@id="billing:confirm_password"]';
    public static $continueBillingButton = '//*[@id="submit_order_billing_button"]';

 // Delivery Method

    public static $assertDeliveryMethod = '//*[@class="sp-methods"]/dt';
    public static $continueDeliveryButton = '//*[@id="shipping-method-buttons-container"]/button';

 // Payment Information

    public static $chequeBankTransfer = '//*[@id="checkout-payment-method-load"]/dt[2]/label';
    public static $continuePaymentButton = '//*[@id="payment-save"]';

 // Order Review

    public static $acceptTerms = '//*[@id="agreement-1"]';
    public static $placeOrderButton = './/*[@id="review-buttons-container"]/button';
    public static $assertOrder = './/*[@class="page-title"]/h1';


    public function registerAndBuyOnCheckout($title,$firstName,$lastName,$email,$postCode,$address,$town,$mobile,$password )
    {
        $I = $this->tester;
        // $I->amOnPage(self::$url);
        $I->click(self::$registerAndCheckoutCheckbox);
        $I->click(self::$continueRegisterButton);
        $I->fillField(self::$titleField, $title);
        $I->fillField(self::$firstNameField, $firstName);
        $I->fillField(self::$lastNameField, $lastName);
        $I->fillField(self::$emailField, $email);
        $I->fillField(self::$postCodeField, $postCode);
        $I->fillField(self::$addressField, $address);
        $I->fillField(self::$townField, $town);
        $I->fillField(self::$mobileField, $mobile);
        $I->fillField(self::$password1, $password);
        $I->fillField(self::$password2, $password);
        $I->click(self::$continueBillingButton);

        $I->waitForElement(self::$assertDeliveryMethod);

        $I->see('Free Shipping to UK Mainland', self::$assertDeliveryMethod);
        $I->click(self::$continueDeliveryButton);
        $I->waitForElementVisible(self::$chequeBankTransfer);
        $I->click(self::$chequeBankTransfer);
        $I->click(self::$continuePaymentButton);
        $I->waitForElementVisible(self::$acceptTerms);
        $I->click(self::$acceptTerms);

        $I->click(self::$continue5);
        $I->waitForText('Your order has been received.',30);
        $I->see('Your order has been received.',self::$seeOrder);
        $I->getVisibleText('Thank you for your purchase!');
        $I->click(self::$keepContinue);
        $I->waitForElement(self::$mainPage);

    }

*/




    


