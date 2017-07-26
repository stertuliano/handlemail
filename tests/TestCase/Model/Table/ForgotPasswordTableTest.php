<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ForgotPasswordTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ForgotPasswordTable Test Case
 */
class ForgotPasswordTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ForgotPasswordTable
     */
    public $ForgotPassword;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.forgot_password'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ForgotPassword') ? [] : ['className' => ForgotPasswordTable::class];
        $this->ForgotPassword = TableRegistry::get('ForgotPassword', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ForgotPassword);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
