<?php
$I = new ApiGuy($scenario);
$I->wantTo('see the homepage of the api');
$I->sendGET('/');
$I->dontSeeResponseCodeIs(404);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 'success'));