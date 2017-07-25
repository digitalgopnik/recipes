<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InformationTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InformationTable Test Case
 */
class InformationTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InformationTable
     */
    public $Information;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.information',
        'app.bilder_zu_information',
        'app.information_zu_kategorie',
        'app.zubereitung_zu_information',
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
        $config = TableRegistry::exists('Information') ? [] : ['className' => InformationTable::class];
        $this->Information = TableRegistry::get('Information', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Information);

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
