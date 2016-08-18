<?php
use \Step\Acceptance;

/**
 * @group test
 */
class TestCest
{
/**/
    function T0InvalidAuthorization(Step\Acceptance\PSLoginSteps $I)    {
        $I->invalidAuthorization('admin@admin.com', '5l8lZbklgx', '123@ya.ru' , '');    }

    function T1LoginLogout(Step\Acceptance\PSLoginSteps $I)    {
        $I->loginProvSystem('admin@admin.com', '5l8lZbklgx');
        $I->logoutProvSystem();    }

    function T2CheckSideBarLinks(Step\Acceptance\PSLoginSteps $I, \Page\PSDeployPage $PSDeployPage) {
        $I->loginProvSystem('admin@admin.com', '5l8lZbklgx');
        $PSDeployPage->goToDeployPage();
        $PSDeployPage->goToInstancesPage();
        $PSDeployPage->goToSettingsPage();
        $PSDeployPage->goToUsersPage();
        $PSDeployPage->goToDashboardPage();
        $PSDeployPage->minimizeSidebar();}

    function T3DeployPageInvalidDataCheck(Step\Acceptance\PSLoginSteps $I, \Page\DeployPage $deployPage , \Page\PSDeployPage $PSDeployPage , \Page\InstancePage $instancePage){
        $I->loginProvSystem('admin@admin.com', '5l8lZbklgx');
        $PSDeployPage->goToDeployPage();
        $deployPage-> checkInvalidInstanceName('','test instance','test-','test@','@test','te:st');
        $deployPage->checkShowMoreCommit();    }

    function T4CreateTestInstance(Step\Acceptance\PSLoginSteps $I, \Page\DeployPage $deployPage , \Page\PSDeployPage $PSDeployPage , \Page\InstancePage $instancePage){
        $I->loginProvSystem('admin@admin.com', '5l8lZbklgx');
        $PSDeployPage->goToDeployPage();
        $deployPage->createTestInstance('master-test');
        $instancePage->goToViewInstancePage();    }

    function T5RestartTestInstance(Step\Acceptance\PSLoginSteps $I, \Page\PSDeployPage $PSDeployPage , \Page\InstancePage $instancePage ){
        $I->loginProvSystem('admin@admin.com', '5l8lZbklgx');
        $PSDeployPage->goToInstancesPage();
        $instancePage->restartTestInstance();    }

    function T6StopTestInstance(Step\Acceptance\PSLoginSteps $I, \Page\PSDeployPage $PSDeployPage , \Page\InstancePage $instancePage ){
        $I->loginProvSystem('admin@admin.com', '5l8lZbklgx');
        $PSDeployPage->goToInstancesPage();
        $instancePage->stopTestInstance();    }

    function T7StartTestInstance(Step\Acceptance\PSLoginSteps $I, \Page\PSDeployPage $PSDeployPage, \Page\InstancePage $instancePage){
        $I->loginProvSystem('admin@admin.com', '5l8lZbklgx');
        $PSDeployPage->goToInstancesPage();
        $instancePage->startTestInstance();    }

    function T8DeleteTestInstance(Step\Acceptance\PSLoginSteps $I, \Page\PSDeployPage $PSDeployPage , \Page\InstancePage $instancePage){
        $I->loginProvSystem('admin@admin.com', '5l8lZbklgx');
        $PSDeployPage->goToInstancesPage();
        $instancePage->deleteTestInstance();    }
    /* */
}

