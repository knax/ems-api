<?php
use \ApiGuy;

class HomepageCest
{

	private $username = 'someuser';

	private $password = 'somepass';

	private $hashedPassword = '';

	public function _before()
	{
		$this->hashedPassword = password_hash($this->password, PASSWORD_BCRYPT, array('cost' => 10));
	}

	public function _after()
	{
	}

	public function homepageWithAuthencation(ApiGuy $I) {
		$I->haveInDatabase('users', array('username' => $this->username, 'password' => $this->hashedPassword));
		$I->wantTo('see the homepage of the api with authencation');
		$I->amHttpAuthenticated($this->username, $this->password);
		$I->sendGET('');
		$I->seeResponseCodeIs(200);
		$I->seeResponseContainsJson(['error' => false, 'message' => 'welcome '.$this->username]);
	}

	public function homepageWithoutAuthencation(ApiGuy $I) {
		$I->wantTo('see the homepage of the api without authencation');
		$I->sendGET('');
		$I->seeResponseCodeIs(401);
		$I->seeResponseContainsJson(['error' => true, 'message' => 'Unauthorized request']);
	}
}