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
class CompositeDtoToArrayBench
{
    /** @var CompositePushworldDTO */
    private $pushworldDTO;

    /** @var CompositeSpatieDTO */
    private $spatieDTO;

    /** @var CompositeJessengerDTO  */
    private $jessengerDTO;

    public function __construct()
    {
        $this->pushworldDTO = CompositePushworldDTO::fromWebhook(
            [
                'id'             => 1,
                'completed_at'   => 2,
                'completed_by'   => 'Super User',
                'affected_users' => [1],
            ]
        );
        $this->spatieDTO = CompositeSpatieDTO::fromWebhook(
            [
                'id'             => 1,
                'completed_at'   => 2,
                'completed_by'   => 'Super User',
                'affected_users' => [1],
            ]
        );
        $this->jessengerDTO = CompositeJessengerDTO::fromWebhook(
            [
                'id'             => 1,
                'completed_at'   => 2,
                'completed_by'   => 'Super User',
                'affected_users' => [1],
            ]
        );
        $this->castDTO = CompositeCastDTO::fromWebhook(
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
    public function benchPushworldDto(): void
    {
        $this->pushworldDTO->toArray();
    }

    /**
     * @Revs(1000)
     * @Iterations(5)
     */
    public function benchSpatieDto(): void
    {
        $this->spatieDTO->toArray();
    }

    /**
     * @Revs(1000)
     * @Iterations(5)
     */
    public function benchJessengerDto(): void
    {
        $this->jessengerDTO->toArray();
    }

    /**
     * @Revs(1000)
     * @Iterations(5)
     */
    public function benchCastDto(): void
    {
        $this->castDTO->toArray();
    }
}
