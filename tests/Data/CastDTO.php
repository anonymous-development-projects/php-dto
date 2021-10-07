<?php

declare(strict_types=1);

namespace ADP\DataTransferObject\Tests\Data;

use Cast\Model\Model;

/**
 * @property int $checkoutId
 * @property int $completedAt
 * @property string $completedBy
 * @property array<int> $affectedUsers
 */
class CastDTO extends Model
{
    /** @var null Свойство для тестирования */
    public static $staticProperty = null;

    /** @var null Свойство для тестирования  */
    protected $protectedProperty = null;

    /** @var array */
    protected $attributes = [
        'checkoutId'    => null,
        'completedAt'   => null,
        'completedBy'   => null,
        'affectedUsers' => null,
    ];

    /**
     * @param array $params
     *
     * @return CastDTO
     */
    public static function fromWebhook(array $params): CastDTO
    {
        return new self(
            [
                'checkoutId'    => $params['id'],
                'completedAt'   => $params['completed_at'],
                'completedBy'   => $params['completed_by'],
                'affectedUsers' => $params['affected_users'],
            ]
        );
    }
}
