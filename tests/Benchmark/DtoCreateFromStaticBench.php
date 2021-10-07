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
class DtoCreateFromStaticBench
{
    /**
     * @Revs(1000)
     * @Iterations(5)
     */
    public function benchPushworldDto(): void
    {
        // @phpcs:ignore
        $dto = PushworldDTO::fromWebhook(
            [
                'id'             => 1,
                'completed_at'   => 2,
                'completed_by'   => 'Super User',
                'affected_users' => [1],
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
        $dto = SpatieDTO::fromWebhook(
            [
                'id'             => 1,
                'completed_at'   => 2,
                'completed_by'   => 'Super User',
                'affected_users' => [1],
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
        $dto = JessengerDTO::fromWebhook(
            [
                'id'             => 1,
                'completed_at'   => 2,
                'completed_by'   => 'Super User',
                'affected_users' => [1],
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
        $dto = CastDTO::fromWebhook(
            [
                'id'             => 1,
                'completed_at'   => 2,
                'completed_by'   => 'Super User',
                'affected_users' => [1],
            ]
        );
    }
}
