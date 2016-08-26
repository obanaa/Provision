<?php
use \Step\Acceptance;
/**
 * @group test
 */
class TestCest
{
    /**/
    function LOGIN4LoginInvalidCredentials(Step\Acceptance\PSLoginSteps $I)    {
        $I->invalidUserPassword('admin@admin.com', 'admin');    }

    function LOGIN5LoginMissingCredentials(Step\Acceptance\PSLoginSteps $I)    {
        $I->emptyPassword('admin@admin.com');    }
}