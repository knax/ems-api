<?php
use \ApiGuy;

class HomepageCest
{

	public function _before()
	{
	}

	public function _after()
	{
	}

	public function homepageWithAuthencation(ApiGuy $I) {
		$I->wantTo('see the homepage of the api with authencation');
		$I->amHttpAuthenticated('firstuser','first_password');
		$I->sendGET('');
		$I->seeResponseCodeIs(200);
		$I->seeResponseContainsJson(['error' => false, 'message' => 'welcome firstuser']);
	}

	public function homepageWithoutAuthencation(ApiGuy $I) {
		$I->wantTo('see the homepage of the api without authencation');
		$I->sendGET('');
		$I->seeResponseCodeIs(401);
		$I->seeResponseContainsJson(['error' => true, 'message' => 'Unauthorized request']);
	}
}