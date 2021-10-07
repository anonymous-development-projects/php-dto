<?php

declare(strict_types=1);

namespace ADP\DataTransferObject\Tests\Data;

use Spatie\DataTransferObject\DataTransferObject;

class SpatieDTO extends DataTransferObject
{
    /** @var int */
    public $checkoutId;

    /** @var int */
    public $completedAt;

    /** @var string */
    public $completedBy;

    /** @var array<int>|array */
    public $affectedUsers;

    /** @var null Свойство для тестирования */
    public static $staticProperty = null;

    /** @var null Свойство для тестирования */
    protected $protectedProperty = null;

    /**
     * @param array $params
     *
     * @return SpatieDTO
     */
    public static function fromWebhook(array $params): SpatieDTO
    {
        return new self(
            [
                'checkoutId'    => $params['id'],
                'completedAt'   => $params['completed_at'],
                'completedBy'   => $params['completed_by'],
                'affectedUsers' => $params['affected_users'] ?? [],
            ]
        );
    }
}
