<?php
namespace Page;


class CategoryNavigation
{

    // Top 10

    public static $URL = 'http://testing:Da1mat1an5@testupgrade.ee12test.mowdirect.co.uk/';
    public static $waitDeals = '//nav[@class="product-navigation"]/ul/li[10]';
    public static $moveDeals = '//nav[@class="product-navigation"]/ul/li[10]';
    public static $top10 = '//li[@class="item10 active"]//nav/div[4]//li/a[text()="Top 10 Hedgetrimmer Deals"]';
    public static $category = '//div[@class="category-products"]';
    public static $amount10 = '//p[@class="amount amount--no-pages"]/strong[text()="10 Item(s)"]';

    // Sale department

    public static $top25 = '//li[@class="item10 active"]//nav/div[2]//li/a[text()="Top 25 Ride-on Mowers"]';
    public static $click25 = '//div[@class="limiter"]/select';
    public static $select25 = '//div[@class="limiter"]/select/option[5]';
    public static $amount25 = '//p[@class="amount amount--no-pages"]/strong[text()="25 Item(s)"]';


    protected $tester;

    public function __construct(\AcceptanceTester $I)
    {
        $this->tester = $I;
    }



    public function home()
    {
        $I = $this->tester;
        $I->amOnPage('/');

    }

    public function checkTop10()
    {
        $I = $this->tester;
        $I->waitForElement(self::$waitDeals);
        $I->moveMouseOver(self::$moveDeals);
        $I->wait(2);
        $I->waitForElementVisible(self::$top10);
        $I->click(self::$top10);
        $I->waitForElement(self::$category);
        $I->waitForElement(self::$amount10);

    }

    public function checkTop25()
    {
        $I = $this->tester;
        $I->waitForElement(self::$waitDeals);
        $I->moveMouseOver(self::$moveDeals);
        $I->waitForElementVisible(self::$top25);
        $I->click(self::$top25);
        $I->waitForElement(self::$category);

        $I->amOnUrl('http://testupgrade.ee12test.mowdirect.co.uk/sale-begins-now/ride-on-mowers-only/show/25');
/*
        $I->click(self::$click25);
        $I->waitForElement(self::$select25);
        $I->click(self::$select25);
  */
        $I->waitForElement(self::$amount25);


    }






}