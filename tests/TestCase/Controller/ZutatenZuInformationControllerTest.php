<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ZutatenZuInformationController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\ZutatenZuInformationController Test Case
 */
class ZutatenZuInformationControllerTest extends IntegrationTestCase
{

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
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
