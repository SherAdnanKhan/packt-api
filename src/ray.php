<?php

return [
    /*
     * This settings controls whether data should be sent to Ray.
     *
     * By default, `ray()` will only transmit data in non-production environments.
     */
    'enable' => true,

    /*
     * When enabled, all things logged to the application log
     * will be sent to Ray as well.
     */
    'send_log_calls_to_ray' => true,

    /*
     * When enabled, all things passed to `dump` or `dd`
     * will be sent to Ray as well.
     */
    'send_dumps_to_ray' => true,

    /*
     *  The host used to communicate with the Ray app.
     */
    'host' => 'host.docker.internal',

    /*
     *  The port number used to communicate with the Ray app.
     */
    'port' => 23517,
];
