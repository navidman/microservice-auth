<?php

return [
    'jwt_secret' => env('JWT_SECRET', 'GKPMVOCKpMCDJQ3GprVA0EfTKGJiTEAImjeKN009Vndls6oRD6raawkRzDoB97AI'),

    'token_lifetime' => env('JWT_LIFETIME', 2) ,// in daysHS256
    'jwt_algorithm' => env('jwt_algorithm', 'HS256')
];
