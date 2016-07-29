<?php
use \Step\Acceptance;

/**
 * @group wishlist
 */
class MyWishListCest
{

    function T994AddAWishList(Step\Acceptance\EmailSteps $I, \Page\MyWishList $myWishList)
    {
        $I->loginSuccess('test_mowdirect@yahoo.co.uk', '123456');
        $myWishList->addItemsInWishlist();
    }
    function T995T999CheckMyWishlist(Step\Acceptance\EmailSteps $I, \Page\MyWishList $myWishList)
    {
        $I->loginSuccess('test_mowdirect@yahoo.co.uk', '123456');
        $myWishList->wishList();
        $myWishList->checkItems();
        $myWishList->removeItemFromWishList();
        $myWishList->addComment();
        $myWishList->addShare();
        $I->loginEmail();
        $myWishList->removeItem();
    }







}

