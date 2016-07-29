<?php
/**
 * Created by PhpStorm.
 * User: obana
 * Date: 09.06.16
 * Time: 10:58
 */

namespace Page;


class GmailPage
{

    public static $URL = 'http://gmail.com';
    public static $emailField = '//*[@id="Email"]';
    public static $nextButton = '//*[@id="next"]';
    public static $passField = '//*[@id="Passwd"]';
    public static $sigInButton = '//*[@id="signIn"]';
    public static $FirstLetter = './/*[@class="aeF"]//div[7]/div/div[1]/div[2]//td[6]';

    public static $assertEmail = './/*[@id=":6m"]/div[2]//h1';
    public static $deleteEmailButton = './/*[@gh="tm"]/div[1]//div[2]/div[3]';




    protected $tester;


    public function __construct(\AcceptanceTester $I)

    {
        $this->tester = $I; // подкл. конструктора
    }


    public function checkMessageOnMailBox($email,$pass) {

        $I = $this->tester;
        $I->amOnUrl(self::$URL);
        $I->fillField(self::$emailField, $email);
        $I->click(self::$nextButton);
        $I->waitForElement(self::$passField);
        $I->fillField(self::$passField, $pass);
        $I->click(self::$sigInButton);
        $I->waitForElement(self::$FirstLetter);
        $I->see('Private Sales Site',self::$FirstLetter);
        $I->click(self::$FirstLetter);
       // $I->waitForElement(self::$assertEmail);
      //  $I->see('Please accept this invitation to join MowDirect',self::$assertEmail);
        $I->click(self::$deleteEmailButton);

    }





}