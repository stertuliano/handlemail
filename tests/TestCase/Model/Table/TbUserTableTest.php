<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TbUserTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TbUserTable Test Case
 */
class TbUserTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TbUserTable
     */
    public $TbUser;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tb_user'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TbUser') ? [] : ['className' => 'App\Model\Table\TbUserTable'];
        $this->TbUser = TableRegistry::get('TbUser', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TbUser);

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
