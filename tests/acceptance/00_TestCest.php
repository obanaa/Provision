<?php
use \Step\Acceptance;
/**
 * @group test
 */
class TestCest
{

    function T1InvalidAuthorization(Step\Acceptance\PSLoginSteps $I)    {
        $I->invalidAuthorization('admin@admin.com', '5l8lZbklgx', '123@ya.ru' , '');    }

    function T2SuccessfullyLoginLogout(Step\Acceptance\PSLoginSteps $I)    {
        $I->loginProvSystem('admin@admin.com', '5l8lZbklgx');
        $I->logoutProvSystem();    }

    function T3CheckSideBarLinks(Step\Acceptance\PSLoginSteps $I, \Page\PSDeployPage $PSDeployPage) {
        $I->loginProvSystem('admin@admin.com', '5l8lZbklgx');
        $PSDeployPage->goToDeployPage();
        $PSDeployPage->goToInstancesPage();
        $PSDeployPage->goToSettingsPage();
        $PSDeployPage->goToUsersPage();
        $PSDeployPage->goToDashboardPage();
        $PSDeployPage->minimizeSidebar();}

    function T4DeployPageInvalidDataCheck(Step\Acceptance\PSLoginSteps $I, \Page\DeployPage $deployPage , \Page\PSDeployPage $PSDeployPage , \Page\InstancePage $instancePage){
        $I->loginProvSystem('admin@admin.com', '5l8lZbklgx');
        $PSDeployPage->goToDeployPage();
        $deployPage-> checkInvalidInstanceName('','test instance','test-','test@','@test','te:st');
        $deployPage->checkInvalidBranchName ('TestInstanceName', '','test branch','branch-','branch@','@branch','br:nch');
        $deployPage->checkShowMoreCommit();    }

    function T5CreateTestInstance(Step\Acceptance\PSLoginSteps $I, \Page\DeployPage $deployPage , \Page\PSDeployPage $PSDeployPage , \Page\InstancePage $instancePage){
        $I->loginProvSystem('admin@admin.com', '5l8lZbklgx');
        $PSDeployPage->goToDeployPage();
        $deployPage->createTestInstance('master-test');
        $instancePage->goToViewInstancePage();    }

    function T6RestartTestInstance(Step\Acceptance\PSLoginSteps $I, \Page\PSDeployPage $PSDeployPage , \Page\InstancePage $instancePage ){
        $I->loginProvSystem('admin@admin.com', '5l8lZbklgx');
        $PSDeployPage->goToInstancesPage();
        $instancePage->restartTestInstance();    }

    function T7StopTestInstance(Step\Acceptance\PSLoginSteps $I, \Page\PSDeployPage $PSDeployPage , \Page\InstancePage $instancePage ){
        $I->loginProvSystem('admin@admin.com', '5l8lZbklgx');
        $PSDeployPage->goToInstancesPage();
        $instancePage->stopTestInstance();    }

    function T8StartTestInstance(Step\Acceptance\PSLoginSteps $I, \Page\PSDeployPage $PSDeployPage, \Page\InstancePage $instancePage){
        $I->loginProvSystem('admin@admin.com', '5l8lZbklgx');
        $PSDeployPage->goToInstancesPage();
        $instancePage->startTestInstance();    }

    function T9DeleteTestInstance(Step\Acceptance\PSLoginSteps $I, \Page\PSDeployPage $PSDeployPage , \Page\InstancePage $instancePage){
        $I->loginProvSystem('admin@admin.com', '5l8lZbklgx');
        $PSDeployPage->goToInstancesPage();
        $instancePage->deleteTestInstance();    }






}