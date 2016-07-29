<?php
use \Step\Acceptance;

/**
 * @group products
 */
class ProductsCest
{

    /**
     * @param Acceptance\ProductsSteps $I
     * @param \Page\Checkout $checkoutPage
     * T917_View a standard Product Layout
     */


    function T980StandardProductLayout(\Step\Acceptance\ProductsSteps $I, \Page\Checkout $checkoutPage){
        $I->productsLayout();
    }

    /**
     * @param Acceptance\ProductsSteps $I
     * @param \Page\Search $search
        T_934_View a Product layout with custom options
     */

    function T981ViewCustomOptions(\Step\Acceptance\ProductsSteps $I, \Page\Search $search){
        $search->search();
        $search->searchInvalid('optional accessories');
        $I->productsLayoutCustomOptions();
    }

    /**
     * @param Acceptance\ProductsSteps $I
     * @param \Page\Search $search
     * T935_View a Product Layout with a Banner advert
     */

    function T982ViewBannerAdvert(\Step\Acceptance\ProductsSteps $I, \Page\Search $search){
        $search->search();
        $search->searchInvalid('Exclusive rear-roller');
        $I->productsLayoutBannerAdvert();
    }


    

    
    
    



    

}

