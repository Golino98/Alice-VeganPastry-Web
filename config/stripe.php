<?php

return [
    'sk' => env('STRIPE_SECRET_KEY'),
    'pk' => env('STRIPE_PUBLIC_KEY'),
    'payment_method_types' => ['card', 'paypal'],
    'language' => 'it',
    'currency' => 'eur'
];

?>