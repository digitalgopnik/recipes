<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ZutatenZuInformationTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ZutatenZuInformationTable Test Case
 */
class ZutatenZuInformationTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ZutatenZuInformationTable
     */
    public $ZutatenZuInformation;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.zutaten_zu_information',
        'app.information',
        'app.bilder_zu_information',
        'app.bilders',
        'app.information_zu_kategorie',
        'app.kategories',
        'app.zubereitung_zu_information',
        'app.zubereitungs',
        'app.zutatens'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ZutatenZuInformation') ? [] : ['className' => ZutatenZuInformationTable::class];
        $this->ZutatenZuInformation = TableRegistry::get('ZutatenZuInformation', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ZutatenZuInformation);

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
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
