<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ZubereitungZuInformationTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ZubereitungZuInformationTable Test Case
 */
class ZubereitungZuInformationTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ZubereitungZuInformationTable
     */
    public $ZubereitungZuInformation;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.zubereitung_zu_information',
        'app.zubereitungs',
        'app.information',
        'app.bilder_zu_information',
        'app.bilders',
        'app.information_zu_kategorie',
        'app.kategories',
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
        $config = TableRegistry::exists('ZubereitungZuInformation') ? [] : ['className' => ZubereitungZuInformationTable::class];
        $this->ZubereitungZuInformation = TableRegistry::get('ZubereitungZuInformation', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ZubereitungZuInformation);

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
