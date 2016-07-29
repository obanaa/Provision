<?php
use \Step\Acceptance;

/**
 * @group categoryNavigation
 */
class CategoryNavigationCest
{

    function T1024Top10Products(Page\CategoryNavigation $category, \Step\Acceptance\ProductsSteps $I) {
        $category->home();
        $category->checkTop10();
        $I->amountTopCategories10();
    }

    function T1025SaleDepartments(Page\CategoryNavigation $category, \Step\Acceptance\ProductsSteps $I) {
        $category->home();
        $category->checkTop25();
        $I->amountTopCategories25();
    }








}

