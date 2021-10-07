<?php

declare(strict_types=1);

namespace ADP\DataTransferObject\Tests\Data;

use Jenssegers\Model\Model;

/**
 * @property int $checkoutId
 * @property int $completedAt
 * @property string $completedBy
 * @property array<int> $affectedUsers
 * @property JessengerDTO $dto
 */
class CompositeJessengerDTO extends Model
{
    /** @var array<string>  */
    protected $casts = [
        'checkoutId'    => 'integer',
        'completedAt'   => 'integer',
        'completedBy'   => 'string',
        'affectedUsers' => 'array',
    ];

    /**
     * @param array $params
     *
     * @return CompositeJessengerDTO
     */
    public static function fromWebhook(array $params): CompositeJessengerDTO
    {
        return new self(
            [
                'checkoutId'    => $params['id'],
                'completedAt'   => $params['completed_at'],
                'completedBy'   => $params['completed_by'],
                'affectedUsers' => $params['affected_users'] ?? [],
                'dto'           => new JessengerDTO(
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
