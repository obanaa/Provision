<?php

/**
 * @group shoppingCart
 */
class ShoppingCartMowDirectCest
{

    function T1026MakeSugePurchase(Step\Acceptance\CheckoutSteps $I, \Page\Checkout $checkoutPage) {
        $I->addToBasketTractor();
        $checkoutPage->checkSugePurchase('mowdirect@gmail.com','123456', 'American Express', '378282246310005','1234');
    }
    
    function T1027PayPalPurchase(Step\Acceptance\CheckoutSteps $I, \Page\Checkout $checkoutPage) {
        $I->addToBasketTractor();
        $checkoutPage->payPalCheckout();
    }

    function T1266PayPalCredit(Step\Acceptance\CheckoutSteps $I, \Page\Checkout $checkoutPage) {
        $I->addToBasketTractor();
        $checkoutPage->payPalCredit();
    }

    function T1267PayPalCreditCheckout(Step\Acceptance\CheckoutSteps $I, \Page\Checkout $checkoutPage) {
        $I->addToBasketTractor();
        $checkoutPage->checkPayPalCredit('mowdirect@gmail.com','123456');
    }
    
    
    



}