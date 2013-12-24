<?php

return array(
    'library'     => 'gd',
    'upload_path' => public_path() . '/uploads',
    'quality'     => 85,
 
    'dimensions' => array(
        'thumb'  => array(64, 64, true,  95),
        'medium' => array(600, 400, false, 90),
    ),
);