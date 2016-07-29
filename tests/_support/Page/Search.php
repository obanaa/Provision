<?php
namespace Page;


class Search
{

    public static $URL = '/';
    public static $search = '#search';
    public static $clickSearch = '//button[@class="button search-button"]';
    public static $wait = '//div[@class="std"]';

    protected $tester;

    public function __construct(\AcceptanceTester $I)
    {
        $this->tester = $I;
    }



    public function search()
    {
        $I = $this->tester;
        $I->amOnPage(self::$URL);

    }

    public function searchInvalid($search)
    {
        $I = $this->tester;
        $I->fillField(self::$search, $search);
        $I->click(self::$clickSearch);
        $I->waitForElement(self::$wait);
    }


    ///////////////////////////////////////////////////////////////////////////

    public static $searchField = '//*[@id="search"]';
    public static $searchField2 = '//*[@id="gsc-i-id1"]';
    public static $searchButton = '//*[@id="search_mini_form"]/div[1]/button';
    public static $searchButton2 = '//*[@id="___gcse_0"]/div/div/form/table[1]/tbody/tr/td[2]/input';
    public static $searchResultLink = '//*[@class="gsc-results gsc-webResult"]/div[1]/div[1]/div[1]/a';
    public static $noResult = '//*[@class="gsc-wrapper"]/div[2]/div/div/div[1]/div/div';


    public function searchMisspelling($searchData1)
    {
        $I= $this ->tester;
        $I->fillField(self::$searchField,$searchData1);
        $I->click(self::$searchButton);
        $I->see('Husqvarna 321',self::$searchResultLink);
        $I->click(self::$searchResultLink);
        return $this;
    }



}