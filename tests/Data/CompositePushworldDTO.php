<?php

declare(strict_types=1);

namespace ADP\DataTransferObject\Tests\Data;

use Pushworld\DataTransferObject\DataTransferObject;

class CompositePushworldDTO extends DataTransferObject
{
    /** @var int */
    public $checkoutId;

    /** @var int */
    public $completedAt;

    /** @var string */
    public $completedBy;

    /** @var array<int> */
    public $affectedUsers;

    /** @var PushworldDTO */
    public $dto;

    /**
     * @param array $params
     *
     * @return CompositePushworldDTO
     */
    public static function fromWebhook(array $params): CompositePushworldDTO
    {
        return new self(
            [
                'checkoutId'    => $params['id'],
                'completedAt'   => $params['completed_at'],
                'completedBy'   => $params['completed_by'],
                'affectedUsers' => $params['affected_users'] ?? [],
                'dto'           => new PushworldDTO(
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
