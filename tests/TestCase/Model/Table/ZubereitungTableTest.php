<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ZubereitungTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ZubereitungTable Test Case
 */
class ZubereitungTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ZubereitungTable
     */
    public $Zubereitung;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.zubereitung',
        'app.zubereitung_zu_information'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Zubereitung') ? [] : ['className' => ZubereitungTable::class];
        $this->Zubereitung = TableRegistry::get('Zubereitung', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Zubereitung);

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
