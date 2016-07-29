<?php
use \Step\Acceptance;

/**
 * @group search
 */
class SearchCest
{

    function T985SearchTops10(Page\Search $search, \AcceptanceTester $I) {
        $search->search();
        $search->searchInvalid('Top10');
        $I->seeElement('//a[@class="gs-title"]/b[text()="Top 10"]');

    }

    function T986SearchNoResult(Page\Search $search, \AcceptanceTester $I) {
        $search->search();
        $search->searchInvalid('invalid');
        $I->see('No Results', '//div[@class="gs-snippet"]');
    }

    function T987SearchPlural(Page\Search $search, \AcceptanceTester $I) {
        $search->searchInvalid('Lawnflite Mini Rider 60RDE Ride-On Mower');
        $I->seeElement('//div[@class="gsc-result-info"]');
        $I->see('Lawnflite Mini Rider 60RDE Ride','//div[@class="std"]');
    }


    function T988SearchMisspelling(Page\Search $search, \AcceptanceTester $I) {
        $search->searchInvalid('Lawn7Garden');
        $I->see('Showing results for Lawn 7 Garden', '//div[@class="gsc-webResult gsc-result"]');
        $I->see('Search instead for Lawn7Garden', '//div[@class="gsc-webResult gsc-result"]');
    }

    function T989SearchFewResult(Page\Search $search, \AcceptanceTester $I) {
        $search->searchInvalid('Lawn Garden Tractors');
        $I->seeElement('//div[@class="gsc-result-info"]');
        $I->see('Lawn Garden Tractors','//div[@class="std"]');
    }











}

