<?php

declare(strict_types=1);

namespace ADP\DataTransferObject\Tests\Benchmark;

use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\Revs;
use Pushworld\DataTransferObject\Tests\Data\CastDTO;
use Pushworld\DataTransferObject\Tests\Data\JessengerDTO;
use Pushworld\DataTransferObject\Tests\Data\PushworldDTO;
use Pushworld\DataTransferObject\Tests\Data\SpatieDTO;

/**
 * @SuppressWarnings(PHPMD.StaticAccess)
 */
class DtoCreateBench
{
    /**
     * @Revs(1000)
     * @Iterations(5)
     */
    public function benchPushworldDto(): void
    {
        // @phpcs:ignore
        $dto = new PushworldDTO(
            [
                'checkoutId'    => 1,
                'completedAt'   => 2,
                'completedBy'   => 'Super User',
                'affectedUsers' => [1],
            ]
        );
    }

    /**
     * @Revs(1000)
     * @Iterations(5)
     */
    public function benchSpatieDto(): void
    {
        // @phpcs:ignore
        $dto = new SpatieDTO(
            [
                'checkoutId'    => 1,
                'completedAt'   => 2,
                'completedBy'   => 'Super User',
                'affectedUsers' => [1],
            ]
        );
    }

    /**
     * @Revs(1000)
     * @Iterations(5)
     */
    public function benchJessengerDto(): void
    {
        // @phpcs:ignore
        $dto = new JessengerDTO(
            [
                'checkoutId'    => 1,
                'completedAt'   => 2,
                'completedBy'   => 'Super User',
                'affectedUsers' => [1],
            ]
        );
    }

    /**
     * @Revs(1000)
     * @Iterations(5)
     */
    public function benchCastDto(): void
    {
        // @phpcs:ignore
        $dto = new CastDTO(
            [
                'checkoutId'    => 1,
                'completedAt'   => 2,
                'completedBy'   => 'Super User',
                'affectedUsers' => [1],
            ]
        );
    }
}
