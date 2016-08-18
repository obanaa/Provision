<?php
/**
 * Created by PhpStorm.
 * User: obana
 * Date: 20.07.16
 * Time: 13:27
 */

namespace Page;
use Exception;


class PSDeployPage
{

    protected $tester;

    public function __construct(\AcceptanceTester $I)

    {        $this->tester = $I; // подкл. конструктора
            }
//SideBar
    public static $dashboardLink = './/*[@title="Dashboard"]';
    public static $deployLink = './/*[@title="Deploy"]';
    public static $instancesLink = './/*[@title="Instances"]';
    public static $usersLink = './/*[@title="Users"]';
    public static $settingsLink = './/*[@title="Settings"]';
    public static $titleText = './/*[@class="title"]';
    public static $minimizeButton = '//*[@id="minimized"]';
    public static $footerText = './/*[@class="footer"]/span';

    public function goToDeployPage(){
        $I= $this ->tester;
        $I->click(self::$deployLink);
        $I->waitForElementVisible(self::$titleText);
        $I->see('Deploy',self::$titleText);    }

    public function goToInstancesPage(){
        $I= $this ->tester;
        $I->click(self::$instancesLink);
        $I->waitForElementVisible(self::$titleText);
        $I->see('Instances',self::$titleText);    }

    public function goToUsersPage(){
        $I= $this ->tester;
        $I->click(self::$usersLink);
        $I->waitForElementVisible(self::$titleText);
        $I->see('Users',self::$titleText);    }

    public function goToSettingsPage(){
        $I= $this ->tester;
        $I->click(self::$settingsLink);
        $I->waitForElementVisible(self::$titleText);
        $I->see('Settings',self::$titleText);    }

    public function goToDashboardPage(){
        $I= $this ->tester;
        $I->click(self::$dashboardLink);
        $I->waitForElementVisible(self::$titleText);
        $I->see('Dashboard',self::$titleText);    }

    public function minimizeSidebar(){
        $I= $this ->tester;
        $I->click(self::$minimizeButton);
        $I->waitForElementNotVisible(self::$footerText);
        $I->click(self::$minimizeButton);
        $I->waitForElementVisible(self::$footerText);    }

}