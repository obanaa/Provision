<?php

/**
 * @group filter
 */
class FiltersMowDirectCest
{


    function T992CheckboxFilter(Step\Acceptance\FiltersSteps $I, \Page\FiltersMowDirect $filtersMowDirect) {
        $filtersMowDirect->filtersCheckbox();
        $I->checkFilters();
    }

}