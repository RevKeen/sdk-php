<?php

namespace RevKeen\TerminalDevices\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\TerminalDevices\Types\ListTerminalDevicesRequestStatus;

class ListTerminalDevicesRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<ListTerminalDevicesRequestStatus> $status Filter by device status
     */
    public ?string $status;

    /**
     * @var ?bool $terminalPaired Filter by terminal pairing status
     */
    public ?bool $terminalPaired;

    /**
     * @param array{
     *   status?: ?value-of<ListTerminalDevicesRequestStatus>,
     *   terminalPaired?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->status = $values['status'] ?? null;
        $this->terminalPaired = $values['terminalPaired'] ?? null;
    }
}
