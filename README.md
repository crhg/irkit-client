# irkit-client

## Overview
php client library for irkit api

## Usage

```php
$client = new Clinet($config);
$client->send('light', 'on');
```

## Install

## Configuration

| key    | type   | description  |
|:--|:---|:----------|
| host | array | key-value pair of host name and host definition |
| host.\<host name\>.uri | string | uri of IRKit server |
| host.\<host name\>.http_option | array | http option. passed to GazzleHttp client |
| accessory | array | key-value pair of accessory name and its definition |
| accessory.\<accessory name\>.host | string | specifity host which accssesory belongs to |
| accessory.\<accessory name\>.command | array | key-value pair of command name and command data |
| accessory.\<accessory name\>.command.\<command name\> | array | command data. converted to json and posted to IRKit's messages API | 
