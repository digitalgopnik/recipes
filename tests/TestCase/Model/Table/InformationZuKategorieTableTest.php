<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InformationZuKategorieTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InformationZuKategorieTable Test Case
 */
class InformationZuKategorieTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InformationZuKategorieTable
     */
    public $InformationZuKategorie;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.information_zu_kategorie',
        'app.information',
        'app.bilder_zu_information',
        'app.bilders',
        'app.zubereitung_zu_information',
        'app.zutaten_zu_information',
        'app.kategories'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('InformationZuKategorie') ? [] : ['className' => InformationZuKategorieTable::class];
        $this->InformationZuKategorie = TableRegistry::get('InformationZuKategorie', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->InformationZuKategorie);

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
