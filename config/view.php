<?php

return [

    /*
    |--------------------------------------------------------------------------
    | View Storage Paths
    |--------------------------------------------------------------------------
    |
    | Most templating systems load templates from disk. Here you may specify
    | an array of paths that should be checked for your views. Of course
    | the usual Laravel view path has already been registered for you.
    |
    */

    'paths' => [
        resource_path('views'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Compiled View Path
    |--------------------------------------------------------------------------
    |
    | This option determines where all the compiled Blade templates will be
    | stored for your application. Typically, this is within the storage
    | directory. However, as usual, you are free to change this value.
    |
    */

    'compiled' => env(
        'VIEW_COMPILED_PATH',
        realpath(storage_path('framework/views'))
    ),

    'path_logo' => 'https://s3.ap-southeast-1.amazonaws.com/uetlearn-documents/images/AeBX39ZZmBwHdRNVJaj3t1ALcDpCjUEZoy6gZkgt.jpg',

    'path_avatar' => 'https://s3.ap-southeast-1.amazonaws.com/uetlearn-documents/images/rkuAGftAjOwjvBRUZUOdIRf7oAlc9eqdFx0qMEj6.jpg',

];
