<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('Logout of Share-A-Meal');

$I->amOnPage('/');

$I->fillField('email', 'akhimantripragada@gmail.com');
$I->fillField('password', '12345');
$I->click('Login');

$I->seeCurrentUrlEquals('/sessions');

$I->click('Logout');
$I->seeCurrentUrlEquals('');
