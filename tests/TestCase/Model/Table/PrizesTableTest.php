<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PrizesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PrizesTable Test Case
 */
class PrizesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PrizesTable
     */
    public $Prizes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.prizes',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Prizes') ? [] : ['className' => PrizesTable::class];
        $this->Prizes = TableRegistry::getTableLocator()->get('Prizes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Prizes);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
