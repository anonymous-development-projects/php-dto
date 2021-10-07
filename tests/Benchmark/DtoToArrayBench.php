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
class DtoToArrayBench
{
    /** @var PushworldDTO */
    private $pushworldDTO;

    /** @var SpatieDTO */
    private $spatieDTO;

    /** @var JessengerDTO */
    private $jessengerDTO;

    /** @var CastDTO */
    private $castDTO;

    public function __construct()
    {
        $this->pushworldDTO = new PushworldDTO(
            [
                'checkoutId'    => 1,
                'completedAt'   => 2,
                'completedBy'   => 'Super User',
                'affectedUsers' => [1],
            ]
        );
        $this->spatieDTO = new SpatieDTO(
            [
                'checkoutId'    => 1,
                'completedAt'   => 2,
                'completedBy'   => 'Super User',
                'affectedUsers' => [1],
            ]
        );
        $this->jessengerDTO = new JessengerDTO(
            [
                'checkoutId'    => 1,
                'completedAt'   => 2,
                'completedBy'   => 'Super User',
                'affectedUsers' => [1],
            ]
        );
        $this->castDTO = new CastDTO(
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
