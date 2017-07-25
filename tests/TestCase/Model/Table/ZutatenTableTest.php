<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ZutatenTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ZutatenTable Test Case
 */
class ZutatenTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ZutatenTable
     */
    public $Zutaten;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.zutaten',
        'app.zutaten_zu_information'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Zutaten') ? [] : ['className' => ZutatenTable::class];
        $this->Zutaten = TableRegistry::get('Zutaten', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Zutaten);

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
