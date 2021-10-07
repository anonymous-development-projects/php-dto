<?php

declare(strict_types=1);

namespace ADP\DataTransferObject\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Pushworld\DataTransferObject\Tests\Data\CompositeCastDTO;
use Pushworld\DataTransferObject\Tests\Data\CompositeJessengerDTO;
use Pushworld\DataTransferObject\Tests\Data\CompositePushworldDTO;
use Pushworld\DataTransferObject\Tests\Data\CompositeSpatieDTO;
use Pushworld\DataTransferObject\Tests\Data\PushworldDTO;

/**
 * @SuppressWarnings(PHPMD.StaticAccess)
 */
class DTOCompositeTest extends TestCase
{
    public function testCreateDto(): void
    {
        $dto = new CompositePushworldDTO(
            [
                'checkoutId'    => 1,
                'completedAt'   => 2,
                'completedBy'   => 'Super User',
                'affectedUsers' => [1, 2],
                'dto'           => new PushworldDTO([
                    'checkoutId'    => 1,
                    'completedAt'   => 2,
                    'completedBy'   => 'Super User',
                    'affectedUsers' => [1, 2],
                ]),
            ]
        );

        $this->assertEquals(1, $dto->dto->checkoutId);
        $this->assertEquals(2, $dto->dto->completedAt);
        $this->assertEquals('Super User', $dto->dto->completedBy);
    }

    public function testCreateDtoFromStatic(): void
    {
        $dto = CompositePushworldDTO::fromWebhook(
            [
                'id'           => 1,
                'completed_at' => 2,
                'completed_by' => 'Super User',
            ]
        );

        $this->assertEquals(1, $dto->dto->checkoutId);
        $this->assertEquals(2, $dto->dto->completedAt);
        $this->assertEquals('Super User', $dto->dto->completedBy);
    }

    public function testToArray(): void
    {
        $dto = new CompositePushworldDTO(
            [
                'checkoutId'    => 1,
                'completedAt'   => 2,
                'completedBy'   => 'Super User',
                'affectedUsers' => [1, 2],
                'dto'           => new PushworldDTO([
                    'checkoutId'    => 1,
                    'completedAt'   => 2,
                    'completedBy'   => 'Super User',
                    'affectedUsers' => [1, 2],
                ]),
            ]
        );

        $this->assertEquals([
            'checkoutId'    => 1,
            'completedAt'   => 2,
            'completedBy'   => 'Super User',
            'affectedUsers' => [1, 2],
            'dto'           => [
                'checkoutId'    => 1,
                'completedAt'   => 2,
                'completedBy'   => 'Super User',
                'affectedUsers' => [1, 2],
            ],
        ], $dto->toArray());
    }

    public function testToJson(): void
    {
        $dto = new CompositePushworldDTO(
            [
                'checkoutId'    => 1,
                'completedAt'   => 2,
                'completedBy'   => 'Super User',
                'affectedUsers' => [1, 2],
                'dto'           => new PushworldDTO([
                    'checkoutId'    => 1,
                    'completedAt'   => 2,
                    'completedBy'   => 'Super User',
                    'affectedUsers' => [1, 2],
                ]),
            ]
        );

        $this->assertEquals(
            '{"checkoutId":1,"completedAt":2,"completedBy":"Super User","affectedUsers":[1,2],"dto":{"checkoutId":1,"completedAt":2,"completedBy":"Super User","affectedUsers":[1,2]}}',
            $dto->toJson()
        );
    }

    public function testSpatieAlternativeCompositeDtoUsage(): void
    {
        $dto = CompositeSpatieDTO::fromWebhook(
            [
                'id'             => 1,
                'completed_at'   => 2,
                'completed_by'   => 'Super User',
                'affected_users' => [1, 2],
            ]
        );

        $this->assertEquals(1, $dto->dto->checkoutId);
        $this->assertEquals(2, $dto->dto->completedAt);
        $this->assertEquals('Super User', $dto->dto->completedBy);
        $this->assertEquals([1, 2], $dto->dto->affectedUsers);

        $this->assertEquals([
            'checkoutId'    => 1,
            'completedAt'   => 2,
            'completedBy'   => 'Super User',
            'affectedUsers' => [1, 2],
            'dto'           => [
                'checkoutId'    => 1,
                'completedAt'   => 2,
                'completedBy'   => 'Super User',
                'affectedUsers' => [1, 2],
            ],
        ], $dto->toArray());

        // Spatie doesn't have toJson() method
//        $this->assertEquals(
//            '{"checkoutId":1,"completedAt":2,"completedBy":"Super User","affectedUsers":[1,2],"dto":{"checkoutId":1,"completedAt":2,"completedBy":"Super User","affectedUsers":[1,2]}}',
//            $dto->toJson()
//        );
    }

    public function testJessengerAlternativeCompositeDtoUsage(): void
    {
        $dto = CompositeJessengerDTO::fromWebhook(
            [
                'id'             => 1,
                'completed_at'   => 2,
                'completed_by'   => 'Super User',
                'affected_users' => [1, 2],
            ]
        );

        $this->assertEquals(1, $dto->dto->checkoutId);
        $this->assertEquals(2, $dto->dto->completedAt);
        $this->assertEquals('Super User', $dto->dto->completedBy);
        $this->assertEquals([1, 2], $dto->dto->affectedUsers);

        // Jessenger doesn't convert nested dto model to array
//        $this->assertEquals([
//            'checkoutId'    => 1,
//            'completedAt'   => 2,
//            'completedBy'   => 'Super User',
//            'affectedUsers' => [1, 2],
//            'dto'           => [
//                'checkoutId'    => 1,
//                'completedAt'   => 2,
//                'completedBy'   => 'Super User',
//                'affectedUsers' => [1, 2],
//            ],
//        ], $dto->toArray());

        $this->assertEquals(
            '{"checkoutId":1,"completedAt":2,"completedBy":"Super User","affectedUsers":[1,2],"dto":{"checkoutId":1,"completedAt":2,"completedBy":"Super User","affectedUsers":[1,2]}}',
            $dto->toJson()
        );
    }

    public function testCastAlternativeCompositeDtoUsage(): void
    {
        $dto = CompositeCastDTO::fromWebhook(
            [
                'id'             => 1,
                'completed_at'   => 2,
                'completed_by'   => 'Super User',
                'affected_users' => [1, 2],
            ]
        );

        $this->assertEquals(1, $dto->dto->checkoutId);
        $this->assertEquals(2, $dto->dto->completedAt);
        $this->assertEquals('Super User', $dto->dto->completedBy);
        $this->assertEquals([1, 2], $dto->dto->affectedUsers);

        // Cast doesn't convert nested dto model to array
//        $this->assertEquals([
//            'checkoutId'    => 1,
//            'completedAt'   => 2,
//            'completedBy'   => 'Super User',
//            'affectedUsers' => [1, 2],
//            'dto'           => [
//                'checkoutId'    => 1,
//                'completedAt'   => 2,
//                'completedBy'   => 'Super User',
//                'affectedUsers' => [1, 2],
//            ],
//        ], $dto->toArray());

        $this->assertEquals(
            '{"checkoutId":1,"completedAt":2,"completedBy":"Super User","affectedUsers":[1,2],"dto":{"checkoutId":1,"completedAt":2,"completedBy":"Super User","affectedUsers":[1,2]}}',
            $dto->toJson()
        );
    }
}
