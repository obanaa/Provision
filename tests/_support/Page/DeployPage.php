<?php
/**
 * Created by PhpStorm.
 * User: obana
 * Date: 17.08.16
 * Time: 13:32
 */

namespace Page;
use Exception;

class DeployPage
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

    // DEPLOY PAGE

    public static $branchMasterTestDropDown = '//*[@id="select_branch"]/option[text()="master"]';
    public static $newBranchField = '//*[@id="newNameBranch"]';
    public static $createBranchButton = '//*[@id="newBranchId"]';
    public static $instanceNameField = '//*[@id="instance_name"]';
    public static $instanceDescriptionField = '//*[@id="instance_description"]';
    public static $existErrorBranch = '//*[@id="errorBranchName"]';
    public static $existErrorInstance = '//*[@id="errorInstancename"]';
    public static $checkboxCommit = '//*[@class="deploy-container"]/form/div[2]//input';
    public static $createInstanceButton = '//*[@id="submitCreateInstance"]';
    public static $showMoreCommitsButton = '//*[@class="deploy-footer"]/button[1]';
    public static $commitField = '//*[@class="deploy-container"]//tr[8]';

    // Instance Page

    public static $testInstanceName = '//*[@title="master-test"]';
    public static $inProgressStatus = '//*[@class="ind-processing"]';
    public static $statusMasterTestRun = '//*[contains(@class, "ind-run")]/../../td[2]//a[text()="master-test"]';
    public static $statusMasterTestStop = '//*[contains(@class, "ind-fail")]/../../td[2]//a[text()="master-test"]';


    public function createTestInstance($instanceName){
        $I= $this ->tester;
        $I->waitForElementVisible(self::$checkboxCommit);
        $I->click(self::$branchMasterTestDropDown);
        $I->fillField(self::$instanceNameField,$instanceName);
        try {
            $I->waitForElementNotVisible(self::$existErrorInstance);
            $I->click(self::$createInstanceButton);
            $I->waitForElementVisible(self::$inProgressStatus);
            $I->waitForElementVisible(self::$statusMasterTestRun,10000);
        }catch (Exception $e) {
            $I->waitForElementVisible(self::$existErrorInstance);
            $I->click(self::$instancesLink);
            $I->waitForElementVisible(self::$titleText);
            $I->see('Instances',self::$titleText);
            $I->waitForElementVisible(self::$testInstanceName);
        }
    }

    public function checkShowMoreCommit() {
        $I= $this ->tester;
        $I->waitForElementVisible(self::$checkboxCommit);
        $I->click(self::$showMoreCommitsButton);
        $I->waitForElementVisible(self::$commitField);
    }

    public static $errorNotificationMessage = '//*[@class="textoFull"]';
    public static $errorField = '//*[@id="errorInstancename"]';
    public static $launchButtonDisable = '//div/*[@disabled=\'\']';

    public function  checkInvalidInstanceName($empty,$space,$endDash,$endSpecSymbol,$startSpecSymbol,$symbolInText){
        $I= $this ->tester;
        $I->waitForElementVisible(self::$checkboxCommit);
        $I->click(self::$branchMasterTestDropDown);
    // Instance name with space
        $I->fillField(self::$instanceNameField,$space);
        $I->waitForElementVisible(self::$errorField);
        $I->waitForElementVisible(self::$launchButtonDisable);
    // Instance name with -
        $I->fillField(self::$instanceNameField,$endDash);
        $I->waitForElementVisible(self::$errorField);
        $I->waitForElementVisible(self::$launchButtonDisable);
    // Instance name with special symbol ->
        $I->fillField(self::$instanceNameField,$endSpecSymbol);
        $I->waitForElementVisible(self::$errorField);
        $I->waitForElementVisible(self::$launchButtonDisable);
    // Instance name with special symbol <-
        $I->fillField(self::$instanceNameField,$startSpecSymbol);
        $I->waitForElementVisible(self::$errorField);
        $I->waitForElementVisible(self::$launchButtonDisable);
    // Empty Instance name
        $I->fillField(self::$instanceNameField,$empty);
        $I->waitForElementVisible(self::$errorField);
        $I->waitForElementVisible(self::$launchButtonDisable);
    // Special Symbol in text
        $I->fillField(self::$instanceNameField,$symbolInText);
        $I->waitForElementVisible(self::$errorField);
        $I->waitForElementVisible(self::$launchButtonDisable);
    }




}