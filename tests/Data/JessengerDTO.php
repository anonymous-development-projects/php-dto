<?php

declare(strict_types=1);

namespace ADP\DataTransferObject\Tests\Data;

use Jenssegers\Model\Model;

/**
 * @property int $checkoutId
 * @property int $completedAt
 * @property string $completedBy
 * @property array<int> $affectedUsers
 */
class JessengerDTO extends Model
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
     * @return JessengerDTO
     */
    public static function fromWebhook(array $params): JessengerDTO
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
