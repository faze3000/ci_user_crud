<?php

use App\Models\UserModel;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;

class UserTest extends CIUnitTestCase
{
    use DatabaseTestTrait;

    protected $migrate     = true;
    protected $migrateOnce = false;
    protected $refresh     = true;
    protected $namespace   = 'Tests\Support';

    public function setUp(): void
    {
        parent::setUp();
        $this->migrateDatabase();
    }

    public function testCreateUser()
    {
        $userModel = new UserModel();

        $data = [
            'first_name' => 'joe',
            'last_name' => 'smith',
            'username' => 'joe_smith',
            'mobile' => '2934829834',
            'password' => 'password123',
            'email' => 'joe@test.com'
        ];

        $userId = $userModel->insert($data);

        $this->assertTrue($userId > 0);
    }

    public function testGetUser()
    {
        $userModel = new UserModel();

        $data = [
            'first_name' => 'joe',
            'last_name' => 'smith',
            'username' => 'joe_smith',
            'mobile' => '2934829834',
            'password' => 'password123',
            'email' => 'joe@test.com'
        ];

        $userId = $userModel->insert($data);

        $user = $userModel->find($userId);

        $this->assertEquals($data['username'], $user['username']);
        $this->assertEquals($data['email'], $user['email']);
    }

    public function testUpdateUser()
    {
        $userModel = new UserModel();

        $data = [
            'first_name' => 'david',
            'last_name' => 'balls',
            'username' => 'davidb',
            'mobile' => '2934829834',
            'password' => 'password123',
            'email' => 'davidb@test.com'
        ];

        $userId = $userModel->insert($data);

        $updatedData = [
            'email' => 'david.balls@example.com'
        ];

        $userModel->update($userId, $updatedData);

        $user = $userModel->find($userId);

        $this->assertEquals($updatedData['email'], $user['email']);
    }

    public function testDeleteUser()
    {
        $userModel = new UserModel();

        $data = [
            'username' => 'jim_green',
            'password' => 'password999',
            'email' => 'jim@example.com'
        ];

        $userId = $userModel->insert($data);

        $userModel->delete($userId);

        $user = $userModel->find($userId);

        $this->assertEmpty($user);
    }
}
