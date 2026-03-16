<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class TerminalDevice extends JsonSerializableType
{
    /**
     * @var string $id Unique identifier for this terminal device. Use this as the device_id when initiating payments.
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var ?string $deviceName Friendly name assigned to this device (e.g., 'Front Desk Terminal')
     */
    #[JsonProperty('device_name')]
    public ?string $deviceName;

    /**
     * @var ?string $terminalSerial Serial number of the paired PAX terminal hardware
     */
    #[JsonProperty('terminal_serial')]
    public ?string $terminalSerial;

    /**
     * @var ?string $terminalIp The LAN IP address of the terminal as seen by the connector on the merchant's local network. This is not a publicly reachable address — all commands flow through the RevKeen cloud.
     */
    #[JsonProperty('terminal_ip')]
    public ?string $terminalIp;

    /**
     * @var ?value-of<TerminalDevicePlatform> $platform Operating system of the machine running the Terminal Connector application
     */
    #[JsonProperty('platform')]
    public ?string $platform;

    /**
     * @var value-of<TerminalDeviceStatus> $status Device connectivity status. online: connector connected and heartbeat within 5 minutes. offline: heartbeat stale or connector disconnected. pairing: connector registered but terminal not yet paired.
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var bool $terminalPaired Whether a PAX terminal has been paired to this connector device. Must be true to accept payments.
     */
    #[JsonProperty('terminal_paired')]
    public bool $terminalPaired;

    /**
     * @var ?bool $terminalReachable Whether the connector can currently reach the PAX terminal on the local network
     */
    #[JsonProperty('terminal_reachable')]
    public ?bool $terminalReachable;

    /**
     * @var ?string $appVersion Version of the Terminal Connector application
     */
    #[JsonProperty('app_version')]
    public ?string $appVersion;

    /**
     * @var ?string $lastHeartbeatAt ISO 8601 timestamp of the last heartbeat received from this device. Devices with no heartbeat in 5 minutes are considered offline.
     */
    #[JsonProperty('last_heartbeat_at')]
    public ?string $lastHeartbeatAt;

    /**
     * @param array{
     *   id: string,
     *   status: value-of<TerminalDeviceStatus>,
     *   terminalPaired: bool,
     *   deviceName?: ?string,
     *   terminalSerial?: ?string,
     *   terminalIp?: ?string,
     *   platform?: ?value-of<TerminalDevicePlatform>,
     *   terminalReachable?: ?bool,
     *   appVersion?: ?string,
     *   lastHeartbeatAt?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->deviceName = $values['deviceName'] ?? null;
        $this->terminalSerial = $values['terminalSerial'] ?? null;
        $this->terminalIp = $values['terminalIp'] ?? null;
        $this->platform = $values['platform'] ?? null;
        $this->status = $values['status'];
        $this->terminalPaired = $values['terminalPaired'];
        $this->terminalReachable = $values['terminalReachable'] ?? null;
        $this->appVersion = $values['appVersion'] ?? null;
        $this->lastHeartbeatAt = $values['lastHeartbeatAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
