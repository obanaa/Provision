<?php
namespace Step\Acceptance;

use Exception;

class ProductsSteps extends \AcceptanceTester
{

    /**
     * Tractor layout
     */

    public function productsLayout(){
        $I = $this;

        $I->amOnPage('/');
        $I->waitForElement('//nav[@class="product-navigation"]/ul/li[2]');
        $I->moveMouseOver('//nav[@class="product-navigation"]/ul/li[2]');
        $I->waitForElementVisible('//li[@class="item2 active"]//nav/div[7]//li/a[text()="Trailers"]');
        $I->click('//li[@class="item2 active"]//nav/div[7]//li/a[text()="Trailers"]');
        $I->waitForElement('//div[@class="category-products"]');
        $I->waitForElement('//*[@class="item odd"]//a/img');
        $I->click('//*[@class="item odd"]//a/img');
        $I->scrollDown(200);
        $I->waitForElement('//*[@class="toggle-tabs"]');
        $count = count($I->grabMultiple('//*[@class="toggle-tabs"]/li'));
        for ($l = 1; $l <=$count; $l++){
            $I->click('//*[@class="toggle-tabs"]/li['.$l.']');

            switch ($l){
                case 1:
                    $I->waitForElement('//*[@class="product-attributes-container"]');
                    break;
                case 2:
                    $I->waitForElement('//*[@class="tab-container current"]');
                    break;
                case 3:
                    $I->waitForElement('//*[@class="tab-container current"]');
                    break;
                case 4:
                    $I->waitForElement('//*[@class="tab-container last current"]');
                    break;
            }
        }


        $I->scrollUp(200);
        

    }


    public function productsLayoutCustomOptions(){
        $I = $this;
        $I->waitForElement('//div[@class="gsc-results gsc-webResult"]//a');
        $I->click('//div[@class="gsc-results gsc-webResult"]//a');
        $I->waitForElement('//div[@class="category-products"]');
        $I->click('//*[@class="products-list"]/li//a');
        $I->waitForElement('//*[@id="product-collateral-id"]');
        $I->waitForElement('//*[@class="toggle-tabs"]');
        $count = count($I->grabMultiple('//*[@class="toggle-tabs"]/li'));
        for ($l = 1; $l <=$count; $l++){
            $I->click('//*[@class="toggle-tabs"]/li['.$l.']');

            switch ($l){
                case 1:
                    $I->waitForElement('//*[@class="product-attributes-container"]');
                    break;
                case 2:
                    $I->waitForElement('//*[@class="tab-container current"]');
                    break;
                case 3:
                    $I->waitForElement('//*[@class="tab-container current"]');
                    break;
                case 4:
                    $I->waitForElement('//*[@class="tab-container current"]');
                    break;
                case 5:
                    $I->waitForElement('//*[@class="box-collateral box-reviews"]');
                    break;
                case 6:
                    $I->waitForElement('//*[@class="tab-content"]');
                    $I->waitForElement('//div[@id="params"]');
                    $I->selectOption('//div[@id="params"]//select', '12 Months Classic Credit (19.5% APR)');
                    $I->fillField('//div[@id="params"]/div[3]/input', '20');
                    $I->click('//div[@id="params"]/div[5]/input');

                    $I->waitForElement('//span[@id="cost_of_goods"]');
                    $I->waitForElement('//span[@id="deposit_percentage"]');
                    $I->waitForElement('//span[@id="deposit_amount"]');
                    $I->waitForElement('//span[@id="credit_amount"]');
                    $I->waitForElement('//span[@id="finance_term"][text()="12 months"]');
                    $I->waitForElement('//span[@id="apr"]');
                    $I->waitForElement('//span[@id="cost_per_month"]');
                    $I->waitForElement('//span[@id="monthly_repayment"]');
                    $I->waitForElement('//span[@id="total"]');
                    $I->waitForElement('//span[@id="loan_cost"]');
                    $I->waitForElement('//span[@id="loan_true_cost"]');



            }
        }



    }


    public function productsLayoutBannerAdvert(){
        $I = $this;
        $I->waitForElement('//div[@class="gsc-results gsc-webResult"]//a');
        $I->click('//div[@class="gsc-results gsc-webResult"]//a');
        $I->waitForElement('//*[@class="lead-article pod"]//div[2]//figcaption/a');
        $I->click('//*[@class="lead-article pod"]//div[2]//figcaption/a');
        $I->waitForElement('//div[@class="widget widget-banner"]/ul/li/img');
        $I->getVisibleText('New and Exclusive');
    }


    /**
     * Category Navigation
     */

    public function amountTopCategories10()
    {
        $I = $this;
        for ($a = 1; $a <= 10; $a++) {
            $I->waitForElement('//*[@class="products-list"]/li[' . $a . ']');
        }
    }

    public function amountTopCategories25()
    {
        $I = $this;
        for ($a = 1; $a <= 25; $a++) {
            $I->waitForElement('//*[@class="products-list"]/li[' . $a . ']');
        }
    }

        







}