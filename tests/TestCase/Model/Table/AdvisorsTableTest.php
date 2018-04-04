<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdvisorsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdvisorsTable Test Case
 */
class AdvisorsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AdvisorsTable
     */
    public $Advisors;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.advisors',
        'app.customers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Advisors') ? [] : ['className' => AdvisorsTable::class];
        $this->Advisors = TableRegistry::get('Advisors', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Advisors);

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
