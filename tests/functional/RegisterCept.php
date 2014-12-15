<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('Register with Share-A-Meal');

$I->amOnPage('/');
$I->click('Don\'t have an account?');
$I->seeCurrentUrlEquals('/register');

$I->fillField('email', 'akhimantrip@gmail.com');
$I->fillField('password', '12345');
$I->selectOption('gender', 'male');
$I->click('Register');

$I->seeCurrentUrlEquals('/verify');


