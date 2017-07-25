<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BilderZuInformationTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BilderZuInformationTable Test Case
 */
class BilderZuInformationTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BilderZuInformationTable
     */
    public $BilderZuInformation;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.bilder_zu_information',
        'app.bilders',
        'app.information',
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
        $config = TableRegistry::exists('BilderZuInformation') ? [] : ['className' => BilderZuInformationTable::class];
        $this->BilderZuInformation = TableRegistry::get('BilderZuInformation', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BilderZuInformation);

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
