# # TerminalDevice

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Unique identifier for this terminal device. Use this as the device_id when initiating payments. |
**device_name** | **string** | Friendly name assigned to this device (e.g., &#39;Front Desk Terminal&#39;) |
**terminal_serial** | **string** | Serial number of the paired PAX terminal hardware |
**terminal_ip** | **string** | The LAN IP address of the terminal as seen by the connector on the merchant&#39;s local network. This is not a publicly reachable address — all commands flow through the RevKeen cloud. |
**platform** | **string** | Operating system of the machine running the Terminal Connector application |
**status** | **string** | Device connectivity status. online: connector connected and heartbeat within 5 minutes. offline: heartbeat stale or connector disconnected. pairing: connector registered but terminal not yet paired. |
**terminal_paired** | **bool** | Whether a PAX terminal has been paired to this connector device. Must be true to accept payments. |
**terminal_reachable** | **bool** | Whether the connector can currently reach the PAX terminal on the local network |
**app_version** | **string** | Version of the Terminal Connector application |
**last_heartbeat_at** | **string** | ISO 8601 timestamp of the last heartbeat received from this device. Devices with no heartbeat in 5 minutes are considered offline. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
