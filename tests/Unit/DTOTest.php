<?php

declare(strict_types=1);

namespace ADP\DataTransferObject\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Pushworld\DataTransferObject\DataTransferObject;
use Pushworld\DataTransferObject\DTOInterface;
use Pushworld\DataTransferObject\Tests\Data\CastDTO;
use Pushworld\DataTransferObject\Tests\Data\JessengerDTO;
use Pushworld\DataTransferObject\Tests\Data\PushworldDTO;
use Pushworld\DataTransferObject\Tests\Data\SpatieDTO;

use function strval;

/**
 * @SuppressWarnings(PHPMD.StaticAccess)
 */
class DTOTest extends TestCase
{
    public function testCreateDto(): void
    {
        $dto = new PushworldDTO(
            [
                'checkoutId'      => 1,
                'completedAt'     => 2,
                'completedBy'     => 'Super User',
                'affectedUsers'   => [1],
                'unused_property' => 3,
            ]
        );

        $this->assertInstanceOf(DTOInterface::class, $dto);
        $this->assertInstanceOf(DataTransferObject::class, $dto);
        $this->assertEquals(1, $dto->checkoutId);
        $this->assertEquals(2, $dto->completedAt);
        $this->assertEquals('Super User', $dto->completedBy);
        $this->assertEquals([1], $dto->affectedUsers);
    }

    public function testCreateFromStaticDto(): void
    {
        $dto = PushworldDTO::fromWebhook(
            [
                'id'              => 1,
                'completed_at'    => 2,
                'completed_by'    => 'Super User',
                'affected_users'  => [1],
                'unused_property' => 3,
            ]
        );

        $this->assertEquals(1, $dto->checkoutId);
        $this->assertEquals(2, $dto->completedAt);
        $this->assertEquals('Super User', $dto->completedBy);
        $this->assertEquals([1], $dto->affectedUsers);
    }

    public function testToArray(): void
    {
        $dto = new PushworldDTO(
            [
                'checkoutId'      => 1,
                'completedAt'     => 2,
                'completedBy'     => 'Super User',
                'affectedUsers'   => [1],
                'unused_property' => 3,
            ]
        );

        $this->assertEquals([
            'checkoutId'    => 1,
            'completedAt'   => 2,
            'completedBy'   => 'Super User',
            'affectedUsers' => [1],
        ], $dto->toArray());
    }

    public function testToJson(): void
    {
        $dto = new PushworldDTO(
            [
                'checkoutId'      => 1,
                'completedAt'     => 2,
                'completedBy'     => 'Super User',
                'affectedUsers'   => [1],
                'unused_property' => 3,
            ]
        );

        $this->assertEquals(
            '{"checkoutId":1,"completedAt":2,"completedBy":"Super User","affectedUsers":[1]}',
            $dto->toJson()
        );
    }

    public function testToString(): void
    {
        $dto = new PushworldDTO(
            [
                'checkoutId'      => 1,
                'completedAt'     => 2,
                'completedBy'     => 'Super User',
                'affectedUsers'   => [1],
                'unused_property' => 3,
            ]
        );

        $this->assertEquals(
            '{"checkoutId":1,"completedAt":2,"completedBy":"Super User","affectedUsers":[1]}',
            strval($dto)
        );
    }

    public function testGetAttributes(): void
    {
        $dto = new PushworldDTO(
            [
                'checkoutId'      => 1,
                'completedAt'     => 2,
                'completedBy'     => 'Super User',
                'affectedUsers'   => [1],
                'unused_property' => 3,
            ]
        );

        $this->assertEquals([
            'checkoutId',
            'completedAt',
            'completedBy',
            'affectedUsers',
        ], $dto->getAttributes());
    }

    public function testSpatieDtoUsage(): void
    {
        $dto = SpatieDTO::fromWebhook(
            [
                'id'              => 1,
                'completed_at'    => 2,
                'completed_by'    => 'Super User',
                'affected_users'  => [1],
                'unused_property' => 3,
            ]
        );

        $this->assertEquals(1, $dto->checkoutId);
        $this->assertEquals(2, $dto->completedAt);
        $this->assertEquals('Super User', $dto->completedBy);
        $this->assertEquals([
            'checkoutId'    => 1,
            'completedAt'   => 2,
            'completedBy'   => 'Super User',
            'affectedUsers' => [1],
        ], $dto->toArray());
        // Spatie doesn't have toJson() method
//        $this->assertEquals('{"checkoutId":1,"completedAt":2,"completedBy":"Super User","affectedUsers":[1]}', $dto->toJson());
    }

    public function testJessengerDtoUsage(): void
    {
        $dto = JessengerDTO::fromWebhook(
            [
                'id'              => 1,
                'completed_at'    => 2,
                'completed_by'    => 'Super User',
                'affected_users'  => [1],
                'unused_property' => 3,
            ]
        );

        $this->assertEquals(1, $dto->checkoutId);
        $this->assertEquals(2, $dto->completedAt);
        $this->assertEquals('Super User', $dto->completedBy);
        $this->assertEquals([
            'checkoutId'    => 1,
            'completedAt'   => 2,
            'completedBy'   => 'Super User',
            'affectedUsers' => [1],
        ], $dto->toArray());

        $this->assertEquals(
            '{"checkoutId":1,"completedAt":2,"completedBy":"Super User","affectedUsers":[1]}',
            $dto->toJson()
        );
    }

    public function testCastDtoUsage(): void
    {
        $dto = CastDTO::fromWebhook(
            [
                'id'              => 1,
                'completed_at'    => 2,
                'completed_by'    => 'Super User',
                'affected_users'  => [1],
                'unused_property' => 3,
            ]
        );

        $this->assertEquals(1, $dto->checkoutId);
        $this->assertEquals(2, $dto->completedAt);
        $this->assertEquals('Super User', $dto->completedBy);
        $this->assertEquals([
            'checkoutId'    => 1,
            'completedAt'   => 2,
            'completedBy'   => 'Super User',
            'affectedUsers' => [1],
        ], $dto->toArray());

        $this->assertEquals(
            '{"checkoutId":1,"completedAt":2,"completedBy":"Super User","affectedUsers":[1]}',
            $dto->toJson()
        );
    }
}
