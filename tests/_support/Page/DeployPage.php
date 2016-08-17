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
    public static $checkboxCommit = '//*[@class=\'deploy-container\']/form/div[2]//input';
    public static $createInstanceButton = '//*[@id="submitCreateInstance"]';

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

}