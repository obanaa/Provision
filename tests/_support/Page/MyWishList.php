<?php
namespace Page;

use Exception;

class MyWishList
{

    public static $clickWishList = 'div.main > div.col-left.sidebar.col-left-first > div.block.block-account > div.block-content > ul > li:nth-of-type(6) > a';
    public static $seeEmptyList = '//div[@class="fieldset"]/p';
    public static $back = '//p[@class="back-link"]';
    public static $url = '/';
    public static $urlWishlist = 'https://www.mowdirect.co.uk/wishlist';

    // add item

    public static $ourTops = '//*[@id="md-recommendations"]/div/div//div[6]//div[2]/a';
    public static $seeAddToWishList = '//div[@class="actions"]/ul/li[1]';
    public static $successMsg = '//li[@class="success-msg"]';
    public static $here = '//li[@class="success-msg"]//a';
    public static $addNewItem = '//li[@class="item first"]';
    public static $seeLastEven = '//tr[@class="last even"]';

    // add to basket

    public static $addBasket = '//div[@class="buttons-set buttons-set2"]/button[2]';
    public static $removeFromCart = '//td[@class="a-center product-cart-remove last"]/a';

    //remove

    public static $clickRemove = '//tr[@class="last even"]/td[6]/a';
    public static $clickRemoveFirst = '//tr[@class="first last odd"]/td[6]/a';

    // add comment

    public static $textarea = '//tr[@class="first last odd"]//textarea';
    public static $updateComment = '//tr[@class="first last odd"]/td[2]/div[2]/button';

    // add share

    public static $clickShare = '//div[@class="buttons-set buttons-set2"]/button';
    public static $inputEmail = '//ul[@class="form-list"]//textarea';
    public static $inputComment = '//ul[@class="form-list"]/li[2]//textarea';
    public static $shareWishlist = '//*[@class="buttons-set form-buttons"]/button';


    protected $tester;

    public function __construct(\AcceptanceTester $I)
    {
        $this->tester = $I;
    }

    public function wishList(){
        $I = $this->tester;
        $I->waitForElement(self::$clickWishList);
        $I->click(self::$clickWishList);
        $I->waitForElement(self::$seeEmptyList);
        $I->see('You have no items in your wishlist.',self::$seeEmptyList);
        $I->click(self::$back);

    }


    public function checkItems(){
        $I = $this->tester;
        $I->amOnPage(self::$url);
        $I->scrollDown(300);
        $I->waitForElement(self::$ourTops);
        $I->wait(2);
        $I->click(self::$ourTops);
        $I->waitForElement(self::$seeAddToWishList);
        $I->click(self::$seeAddToWishList);
        $I->getVisibleText('My Wishlist');
        $I->waitForElement(self::$successMsg);
        $I->click(self::$here);
        $I->waitForElement(self::$addNewItem);
        $I->click(self::$addNewItem);
        $I->waitForElement(self::$seeAddToWishList);
        $I->click(self::$seeAddToWishList);
        $I->waitForElement(self::$successMsg);
        $I->waitForElement(self::$seeLastEven);
        
    }


    public function removeItemFromWishList(){
        $I = $this->tester;
        $I->waitForElement(self::$clickRemove);
        $I->click(self::$clickRemove);
        $I->acceptPopup();
        $I->waitForElementNotVisible(self::$seeLastEven);
        $I->dontSeeElement(self::$seeLastEven);
    }


    public function addComment(){
        $I =$this->tester;
        $I->waitForElement(self::$textarea);
        $I->fillField(self::$textarea, 'Test');
        $I->click(self::$updateComment);
        $I->getVisibleText(self::$textarea, 'Test');
    }

    public function addShare(){
        $I = $this->tester;
        $I->waitForElement(self::$clickShare);
        $I->click(self::$clickShare);
        $I->waitForText('Share Your Wishlist');
        $I->click(self::$shareWishlist);
        $I->getVisibleText('This is a required field.');

        $I->waitForElement(self::$inputEmail);
        $I->fillField(self::$inputEmail, 'test_mowdirect@yahoo.co.uk');
        $I->fillField(self::$inputComment, 'Test');
        $I->click(self::$shareWishlist);
        $I->waitForElement(self::$successMsg);
        $I->see('Your Wishlist has been shared.',self::$successMsg);
        
    }

    public function removeItem(){
        $I = $this->tester;
        $I->amOnUrl(self::$urlWishlist);
        $I->waitForElement(self::$clickRemoveFirst);
        $I->click(self::$clickRemoveFirst);
        $I->acceptPopup();
        $I->waitForElement(self::$seeEmptyList);
        $I->see('You have no items in your wishlist.',self::$seeEmptyList);
    }

    public function addItemsInWishlist(){
        $I = $this->tester;
        self::checkItems();
        $I->waitForElement(self::$addBasket);
        $I->click(self::$addBasket);
        $I->waitForElement(self::$successMsg);
        $I->see('2 product(s) have been added to shopping basket:',self::$successMsg);

        $I->waitForElement(self::$removeFromCart);
        $I->click(self::$removeFromCart);
        $I->waitForElement(self::$removeFromCart);
        $I->click(self::$removeFromCart);

        $I->waitForText('Your Basket is empty...');


        
    }



    


}