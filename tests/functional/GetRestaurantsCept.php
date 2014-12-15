<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('Enter Zip Code and Select Restaurants');

$I->amOnPage('/');
$I->fillField('email', 'akhimantripragada@gmail.com');
$I->fillField('password', '12345');
$I->click('Login');

$I->seeCurrentUrlEquals('/sessions');

$I->fillField('zipcode', '10025');

$I->checkOption('indian');
$I->click('Get Restaurants');

$I->seeCurrentUrlEquals('/results');
