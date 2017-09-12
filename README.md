# irkit-client

## Overview
php client library for irkit api

## Usage

```php
use Crhg\IRKit\Client;

$client = new Clinet($config);
$client->send('light', 'on');
```

## Install

```json
{
    "repositories": [
        { "type": "vcs", "url": "https://github.com/crhg/irkit-client" }
    ],
    "require": {
        "crhg/irkit-client": "master@dev"
    },
}
```

## Configuration

| key    | type   | description  |
|:--|:---|:----------|
| host | array | key-value pair of host name and host definition |
| host.\<host name\>.uri | string | uri of IRKit server |
| host.\<host name\>.http_option | array | http option. passed to GazzleHttp client |
| host.\<host name\>.retry | int | retry count |
| accessory | array | key-value pair of accessory name and its definition |
| accessory.\<accessory name\>.host | string | specifity host which accssesory belongs to |
| accessory.\<accessory name\>.command | array | key-value pair of command name and command data |
| accessory.\<accessory name\>.command.\<command name\> | array | command data. converted to json and posted to IRKit's messages API | 

### Example
```php
$config = [
    'host' => [
        'host1' => [
            'uri' => 'http://10.0.1.2',
            'http_option' => [
                'version' => 1.0,
                'headers' => ['X-Requested-With' => 'curl',],
            ],
            'retry' => 3,
        ],
    ],
    'accessory' => [
        'light' => [
            'host' => 'host1',
            'command' => [
                'on' => [
                    'format' => 'us',
                    'freq' => 38,
                    'data' => [8858, 4574, 554, 577,],
                ],
            ],
        ],
    ],
];
```
