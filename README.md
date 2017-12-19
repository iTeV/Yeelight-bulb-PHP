This little "framework" is a creation in PHP to work with [Yeelight Bulbs](https://www.yeelight.com/en_US/product/wifi-led-c).

# Usage
To find the Yeelight bulb in you're network, you can use the `detectYeelight` class. Here is an example:

```PHP
<?php

require_once 'src/detectYeelight.php';
$yeelight = new detectYeelight();
$yeelight->searchBulbs();
```

This snippet will output somewhat like the following output:

```
Array
(
    [0] => HTTP/1.1 200 OK
    [1] => Cache-Control: max-age=3600
    [2] => Date: 
    [3] => Ext: 
    [4] => Location: yeelight://192.168.178.69:55443
    [5] => Server: POSIX UPnP/1.0 YGLC/1
    [6] => id: 0x0000000000000000
    [7] => model: mono
    [8] => fw_ver: 42
    [9] => support: get_prop set_default set_power toggle set_bright start_cf stop_cf set_scene cron_add cron_get cron_del set_adjust set_name
    [10] => power: on
    [11] => bright: 100
    [12] => color_mode: 2
    [13] => ct: 4000
    [14] => rgb: 0
    [15] => hue: 0
    [16] => sat: 0
    [17] => name: 
    [18] => 
)
```

To control the bulb, you can use the `Yeelight` class. Here is an example:

```PHP
<?php
require_once 'src/yeelight.php';
$yeelight = new Yeelight("192.168.178.69",55443);
$yeelight->action(array('bright', 1));
```

This snippet will result into changing the brightness of you're yeelight bulb to 1%

Currently there are only 2 modules available, bright & toggle. However, feel free to add more by yourself using the [yeelight developer guide](https://www.yeelight.com/download/Yeelight_Inter-Operation_Spec.pdf).
