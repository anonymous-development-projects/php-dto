<?php

declare(strict_types=1);

namespace ADP\DataTransferObject\Tests\Benchmark;

use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\Revs;
use Pushworld\DataTransferObject\Tests\Data\CompositeCastDTO;
use Pushworld\DataTransferObject\Tests\Data\CompositeJessengerDTO;
use Pushworld\DataTransferObject\Tests\Data\CompositePushworldDTO;
use Pushworld\DataTransferObject\Tests\Data\CompositeSpatieDTO;

/**
 * @SuppressWarnings(PHPMD.StaticAccess)
 */
class CompositeDtoCreateFromStaticBench
{
    /**
     * @Revs(1000)
     * @Iterations(5)
     */
    public function benchPushworldDto(): void
    {
        // @phpcs:ignore
        $dto = CompositePushworldDTO::fromWebhook(
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
        $dto = CompositeSpatieDTO::fromWebhook(
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
        $dto = CompositeJessengerDTO::fromWebhook(
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
        $dto = CompositeCastDTO::fromWebhook(
            [
                'id'             => 1,
                'completed_at'   => 2,
                'completed_by'   => 'Super User',
                'affected_users' => [1],
            ]
        );
    }
}
