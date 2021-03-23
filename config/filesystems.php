<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DRIVER', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Default Cloud Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Many applications store files both locally and in the cloud. For this
    | reason, you may specify a default "cloud" driver here. This driver
    | will be bound as the Cloud disk implementation in the container.
    |
    */

    'cloud' => env('FILESYSTEM_CLOUD', 's3'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
        ],
 

    'sftp' => [
            'driver' => 'sftp',
            'host' => env('FTP_HOST'),
            'port' => env('FTP_PORT'),
            'username' => env('FTP_USERNAME'),
            'password' => env('FTP_PASSWORD'),
            //'privateKey' => 'path/to/or/contents/of/privatekey',
            'root' => env('FTP_PATH'),
            'timeout' => env('FTP_TIMEOUT'),
    ],
    'ftp' => [
		'driver' => 'ftp',
		'host' => env('FTP_HOST'),
		'username' => env('FTP_USERNAME'),
		'password' => env('FTP_PASSWORD'),
		'passive'  => true,
		'port' => 21,
		
		/*'driver'   => 'curl-ftp',
        'host' =>  env('FTP_HOST'),
        'username' => env('FTP_USERNAME'),
        'password' => env('FTP_PASSWORD'),*/
 
        /** optional config settings */
        //'port' => env('FTP_PORT'),
        //'root' => env('FTP_PATH'),
        //'utf8' => true,
        //'ssl' => true,
		/*'passive' => true,
        'timeout' => env('FTP_TIMEOUT'),   // connect timeout
        'sslVerifyPeer' => 0, // using 0 is insecure, use it only if you know what you're doing
        'sslVerifyHost' => 0, // using 0 is insecure, use it only if you know what you're doing
        */
        /** proxy settings */
        /*'proxyHost' => 'proxy-server.example.com',
        'proxyPort' => 80,
        'proxyUsername' => 'proxyuser',
        'proxyPassword' => 'proxypassword',*/
    ],
 

        ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],
];
