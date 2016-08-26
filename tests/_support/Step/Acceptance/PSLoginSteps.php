<?php
/**
 * Created by PhpStorm.
 * User: obana
 * Date: 20.07.16
 * Time: 13:04
 */

namespace Step\Acceptance;
use Exception;

class PSLoginSteps extends \AcceptanceTester
{

    public static $URL = '/';
    public static $emailField = './/*[@type="email"]';
    public static $passwordField = './/*[@type="password"]';
    public static $submitButton = './/button';
    public static $titleText = './/*[@class="title"]';
    public static $errorPassword = './/*[@for="password"]';
    public static $errorEmail = './/*[@for="email"]';
    public static $logOutButton = './/*[@class="pull-left logout"]';


    public function loginProvSystem($login,$pass){
        $I = $this;
        try{
        $I->amOnPage(self::$URL);
        $I->fillField(self::$emailField, $login);
        $I->fillField(self::$passwordField, $pass);
        $I->click(self::$submitButton);
        $I->waitForElementVisible(self::$titleText);
        $I->see('Dashboard',self::$titleText);
    } catch (Exception $e){
        $I->waitForElementVisible(self::$titleText);
        }
    }

    public function logoutProvSystem(){
        $I = $this;
        $I -> click(self::$logOutButton);
        $I->waitForElementVisible(self::$emailField);

    }

    public function invalidAuthorization($login,$pass,$wrong,$empty){
        $I = $this;
        $I->amOnPage(self::$URL);
        $I->fillField(self::$emailField, $login);
        $I->click(self::$submitButton);
        $I->waitForElementVisible(self::$errorPassword);
        $I->fillField(self::$emailField, $empty);
        $I->fillField(self::$passwordField,$pass);
        $I->click(self::$submitButton);
        $I->waitForElementVisible(self::$errorEmail);
        $I->waitForElementNotVisible(self::$errorPassword);
        $I->fillField(self::$emailField, $login);
        $I->fillField(self::$passwordField,$empty);
        $I->click(self::$submitButton);
        $I->waitForElementVisible(self::$errorPassword);
        $I->fillField(self::$emailField, $wrong);
        $I->fillField(self::$passwordField, $wrong);
        $I->click(self::$submitButton);
        $I->waitForElementVisible(self::$emailField);



    }


    public static $userNameField = './/*[@name="username"]';
    public static $password1Field = './/*[@name="password"]';
    public static $submit1Button = './/*[@type="submit"]';
    public static $errorMessage = './/*[@class="error message nobackground"]';





    public function invalidUserPassword($invalidLogin,$nvalidPass){
        $I = $this;
        $I->amOnPage(self::$URL);
        $I->fillField(self::$userNameField, $invalidLogin);
        $I->fillField(self::$password1Field, $nvalidPass);
        $I->click(self::$submit1Button);
        $I->waitForElementVisible(self::$errorMessage);
        $I->see('Invalid username or password',self::$errorMessage);
    }

    public function emptyPassword($invalidLogin){
        $I = $this;
        $I->amOnPage(self::$URL);
        $I->fillField(self::$userNameField, $invalidLogin);
        $I->click(self::$submit1Button);
        $I->click(self::$submit1Button);
        $I->waitForElementVisible(self::$errorMessage);
        $I->see('Password required',self::$errorMessage);
    }






}