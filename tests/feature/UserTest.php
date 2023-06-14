<?php

namespace App;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use CodeIgniter\Test\FeatureTestTrait;

class UserTest extends CIUnitTestCase
{
    use DatabaseTestTrait;
    use FeatureTestTrait;

    protected $migrate     = true;
    protected $migrateOnce = false;
    protected $refresh     = true;
    protected $namespace   = 'Tests\Support';

    protected function setUp(): void
    {
        parent::setUp();

    }

    protected function tearDown(): void
    {
        parent::tearDown();

    }

    public function testCreateUser()
    {
        $data = [
            'first_name' => 'joe',
            'last_name' => 'smith',
            'username' => 'joe_smith',
            'mobile' => '2934829834',
            'password' => 'password123',
            'email' => 'joe@test.com'
        ];

        $this->call('POST', 'user/create', $data);

        $this->seeInDatabase('users', [
            'username' => 'joe_smith',
            'email' => 'joe@test.com'
        ]);
    }

    public function testUpdateUser()
    {
        $data = [
            'username' => 'joe_smith_updated',
            'password' => 'password123_updated',
            'email' => 'joe@test.com_updated'
        ];

        $this->call('POST', 'user/update/1', $data);

        $this->seeInDatabase('users', [
            'id' => 1,
            'username' => 'joe_smith_updated',
            'password' => 'password123_updated',
            'email' => 'joe@test.com_updated'
        ]);
    }

    public function testDeleteUser()
    {
        $this->call('GET', 'user/delete/1');

        $this->dontSeeInDatabase('users', ['id' => 1]);
    }
}
