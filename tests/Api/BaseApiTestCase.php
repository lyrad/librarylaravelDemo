<?php
namespace Tests\Api;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Support\Facades\App;
use Tests\TestCase;

class BaseApiTestCase extends TestCase
{
    protected EntityManagerInterface $em;

    public function setUp(): void
    {
        parent::setUp();
    }

    public function tearDown(): void
    {
        parent::tearDown();
    }

    protected function assertArrayHasKeys(array $keys, array|ArrayAccess $array, string $message = ''): void
    {
        foreach ($keys as $key) {
            $this->assertArrayHasKey($key, $array, $message);
        }
    }
}
