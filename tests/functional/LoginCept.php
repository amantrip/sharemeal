<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('Login to Share-A-Meal');

$I->amOnPage('/');

$I->fillField('email', 'akhimantripragada@gmail.com');
$I->fillField('password', '12345');
$I->click('Login');

$I->seeCurrentUrlEquals('/sessions');


