<?php

declare(strict_types=1);

namespace ADP\DataTransferObject\Tests\Data;

use Spatie\DataTransferObject\DataTransferObject;

class CompositeSpatieDTO extends DataTransferObject
{
    /** @var int */
    public $checkoutId;

    /** @var int */
    public $completedAt;

    /** @var string */
    public $completedBy;

    /** @var array<int>|array */
    public $affectedUsers;

    /** @var \Pushworld\DataTransferObject\Tests\Data\SpatieDTO */ // @phpcs:ignore
    public $dto;

    /**
     * @param array $params
     *
     * @return CompositeSpatieDTO
     */
    public static function fromWebhook(array $params): CompositeSpatieDTO
    {
        return new self(
            [
                'checkoutId'    => $params['id'],
                'completedAt'   => $params['completed_at'],
                'completedBy'   => $params['completed_by'],
                'affectedUsers' => $params['affected_users'] ?? [],
                'dto'           => new SpatieDTO(
                    [
                        'checkoutId'    => $params['id'],
                        'completedAt'   => $params['completed_at'],
                        'completedBy'   => $params['completed_by'],
                        'affectedUsers' => $params['affected_users'] ?? [],
                    ]
                ),
            ]
        );
    }
}
