<?php
/**
 * Created by PhpStorm.
 * User: obana
 * Date: 07.06.16
 * Time: 15:27
 */

namespace Page;


class FiltersMowDirect
{

    public static $URL = '/';
    public static $lawnTractorsLocator = '//*[@id="wp-nav-container"]/nav/ul/li[2]';
    public static $heavyDutyTractors = '//*[@class="item2 active"]/nav/div[4]/h3/a';
    public static $assertHeavyDutyTractors = '//*[@class="mb-content"]//div/h1';





    protected $tester;


    public function __construct(\AcceptanceTester $I)

    {
        $this->tester = $I; // подкл. конструктора
    }

    public function filtersCheckbox() {

        $I = $this->tester;
        //$I->amOnPage(self::$URL);
        $I->amOnUrl('http://www.mowdirect.co.uk/');
        $I->moveMouseOver(self::$lawnTractorsLocator);
        $I->waitForElement(self::$heavyDutyTractors);
        $I->click(self::$heavyDutyTractors);
        $I->waitForElement(self::$assertHeavyDutyTractors);
        $I->see('Heavy-Duty Garden Tractors',self::$assertHeavyDutyTractors);

    }





}