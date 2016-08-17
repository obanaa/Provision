<?php
/**
 * Created by PhpStorm.
 * User: obana
 * Date: 17.08.16
 * Time: 13:30
 */

namespace Page;
use Exception;

class InstancePage
{
    protected $tester;

    public function __construct(\AcceptanceTester $I)

    {
        $this->tester = $I; // подкл. конструктора
    }


    //SideBar
    public static $dashboardLink = './/*[@title="Dashboard"]';
    public static $deployLink = './/*[@title="Deploy"]';
    public static $instancesLink = './/*[@title="Instances"]';
    public static $usersLink = './/*[@title="Users"]';
    public static $settingsLink = './/*[@title="Settings"]';
    public static $titleText = './/*[@class="title"]';



    // Instance Page

    public static $testInstanceName = '//*[@title="master-test"]';
    public static $inProgressStatus = '//*[@class="ind-processing"]';
    public static $statusMasterTestRun = '//*[contains(@class, "ind-run")]/../../td[2]//a[text()="master-test"]';
    public static $statusMasterTestStop = '//*[contains(@class, "ind-fail")]/../../td[2]//a[text()="master-test"]';
    public static $settingsButton = '//tr[2]//a[2]/button';
    public static $viewButton = '//tr[2]//a[1]/button';
    public static $restartActionButton = '//*[@class="actions-div"]//li[1]/a';
    public static $stopActionButton = '//*[@class="actions-div"]//li[2]/a';
    public static $destroyActionButton = '//*[@class="actions-div"]//li[3]/a';




    public function stopTestInstance(){
        $I= $this ->tester;
        $I->waitForElementVisible(self::$statusMasterTestRun);
        $I->click(self::$settingsButton);
        $I->waitForElementVisible(self::$stopActionButton);
        $I->click(self::$stopActionButton);
        try {
            $I->waitForElementVisible(self::$statusMasterTestStop,10000);
        } catch (Exception $e){
            $I->click(self::$instancesLink);
            $I->waitForElementVisible(self::$statusMasterTestStop);
        }
    }

    public function startTestInstance(){
        $I= $this ->tester;
        $I->click(self::$instancesLink);
        $I->waitForElementVisible(self::$testInstanceName);
        $I->waitForElementVisible(self::$statusMasterTestStop);
        $I->click(self::$settingsButton);
        $I->waitForElementVisible(self::$stopActionButton);
        $I->click(self::$stopActionButton);
        try {
            $I->waitForElementVisible(self::$statusMasterTestRun,10000);
        } catch (Exception $e){
            $I->click(self::$instancesLink);
            $I->waitForElementVisible(self::$statusMasterTestRun);
        }
    }

    public function deleteTestInstance(){
        $I= $this ->tester;
        $I->click(self::$instancesLink);
        $I->waitForElementVisible(self::$testInstanceName);
        $I->waitForElementVisible(self::$statusMasterTestRun);
        $I->click(self::$settingsButton);
        $I->waitForElementVisible(self::$destroyActionButton);
        $I->click(self::$destroyActionButton);
        try {
            $I->acceptPopup();
        } catch (Exception $e){
            $I->acceptPopup();
            $I->waitForElementNotVisible(self::$testInstanceName,1000);
        }
        $I->waitForElementNotVisible(self::$testInstanceName,1000);
    }



// View Instance Page
    public static $viewStartButton = '//*[@class="row"]/div[1]/button[1]';
    public static $viewStopButton = './/*[@class="row"]/div[1]/button[2]';
    public static $viewRestartButton = './/*[@class="row"]/div[1]/button[3]';
    public static $viewDeleteButton = './/*[@class="row"]/div[1]/button[4]';
    public static $viewSnapshotButton = './/*[@class="row"]/div[1]/button[5]';
    public static $viewLogButton = './/*[@class="row"]/div[1]/button[6]';


    public function goToViewInstancePage (){
        $I = $this ->tester;
        $I->click(self::$viewButton);
        $I->waitForElementVisible(self::$viewStartButton);
    }

}