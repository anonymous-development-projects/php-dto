<?php

declare(strict_types=1);

namespace ADP\DataTransferObject\Tests\Data;

use Cast\Model\Model;

/**
 * @property int $checkoutId
 * @property int $completedAt
 * @property string $completedBy
 * @property array<int> $affectedUsers
 * @property CastDTO $dto
 */
class CompositeCastDTO extends Model
{
    /** @var array */
    protected $attributes = [
        'checkoutId'    => null,
        'completedAt'   => null,
        'completedBy'   => null,
        'affectedUsers' => null,
        'dto'           => null,
    ];

    /**
     * @param array $params
     *
     * @return CompositeCastDTO
     */
    public static function fromWebhook(array $params): CompositeCastDTO
    {
        return new self(
            [
                'checkoutId'    => $params['id'],
                'completedAt'   => $params['completed_at'],
                'completedBy'   => $params['completed_by'],
                'affectedUsers' => $params['affected_users'] ?? [],
                'dto'           => new CastDTO(
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
