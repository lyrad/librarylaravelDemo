<?php
namespace Tests\Api\Library;

use App\Entities\Library;
use Illuminate\Support\Facades\Http;
use Tests\Api\BaseApiTestCase;

class AddressApiControllerTest extends BaseApiTestCase
{
    public function testShow(): void
    {
        $library = new Library();
        $library->setName('libraryName');
        $library->setAddressHouseNumber('1');
        $library->setAddressStreet('street');
        $library->setAddressPostalCode('750000');
        $library->setAddressCity('city');
        $em = app('em');
        $em->persist($library);
        $em->flush();

        // Test input filtering and validation.
        // TODO test id route parameter missing.
        // $response = Http::get(route('api.library.show', []));
        // $this->assertEquals(400, $response->status());
        $response = Http::get(route('api.library.show', ['id' => 'alpha']));
        $this->assertEquals(404, $response->status());


        $response = Http::get(route('api.library.show', ['id' => '12345']));
        $this->assertEquals(404, $response->status());
        $response = Http::get(route('api.library.show', ['id' => $library->getId()]));
        $this->assertEquals(200, $response->status());
        $this->assertJson($response->body());

        $expectedFields = ['id', 'name', 'addressHouseNumber', 'addressStreet', 'addressPostalCode', 'addressCity'];
        $this->assertArrayHasKeys($expectedFields, $response->json());

        $this->assertEquals($library->getId(), $response->json('id'));
        $this->assertEquals($library->getName(), $response->json('name'));
        $this->assertEquals($library->getAddressHouseNumber(), $response->json('addressHouseNumber'));
        $this->assertEquals($library->getAddressStreet(), $response->json('addressStreet'));
        $this->assertEquals($library->getAddressPostalCode(), $response->json('addressPostalCode'));
        $this->assertEquals($library->getAddressCity(), $response->json('addressCity'));
    }
}
