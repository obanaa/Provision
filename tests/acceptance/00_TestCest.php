<?php
use \Step\Acceptance;

/**
 * @group test
 */
class TestCest
{

    function T0InvalidAuthorization(Step\Acceptance\PSLoginSteps $I)    {
        $I->invalidAuthorization('admin@admin.com', '5l8lZbklgx', '123@ya.ru' , '');
    }
/**/

    function T1Authorization(Step\Acceptance\PSLoginSteps $I)    {
            $I->loginProvSystem('admin@admin.com', '5l8lZbklgx');
    }

    function T2CheckSideBarLinks(Step\Acceptance\PSLoginSteps $I, \Page\PSDeployPage $deployPage) {
        $I->loginProvSystem('admin@admin.com', '5l8lZbklgx');
        $deployPage->goToDeployPage();
        $deployPage->goToInstancesPage();
        $deployPage->goToSettingsPage();
        $deployPage->goToUsersPage();
        $deployPage->goToDashboardPage(); }

    function T3CreateTestInstance(Step\Acceptance\PSLoginSteps $I, \Page\PSDeployPage $deployPage){
        $I->loginProvSystem('admin@admin.com', '5l8lZbklgx');
        $deployPage->goToDeployPage();
        $deployPage->createTestInstance('master-test');
        $deployPage->goToViewInstancePage();
    }


    function T4StopTestInstance(Step\Acceptance\PSLoginSteps $I, \Page\PSDeployPage $deployPage){
        $I->loginProvSystem('admin@admin.com', '5l8lZbklgx');
        $deployPage->goToInstancesPage();
        $deployPage->stopTestInstance();
    }

    function T5StartTestInstance(Step\Acceptance\PSLoginSteps $I, \Page\PSDeployPage $deployPage){
        $I->loginProvSystem('admin@admin.com', '5l8lZbklgx');
        $deployPage->goToDeployPage();
        $deployPage->goToInstancesPage();
        $deployPage->startTestInstance();
    }


    function T6DeleteTestInstance(Step\Acceptance\PSLoginSteps $I, \Page\PSDeployPage $deployPage){
        $I->loginProvSystem('admin@admin.com', '5l8lZbklgx');
        $deployPage->goToInstancesPage();
        $deployPage->deleteTestInstance();
    }

}

