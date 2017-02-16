<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('check for welcome message at /');
$I->amOnPage('/');
$I->see('Laravel 5');