<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BilderTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BilderTable Test Case
 */
class BilderTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BilderTable
     */
    public $Bilder;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.bilder',
        'app.bilder_zu_information'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Bilder') ? [] : ['className' => BilderTable::class];
        $this->Bilder = TableRegistry::get('Bilder', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Bilder);

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
