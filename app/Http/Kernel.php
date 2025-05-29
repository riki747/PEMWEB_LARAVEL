protected $routeMiddleware = [
    // Middleware bawaan Laravel
    'auth' => \App\Http\Middleware\Authenticate::class,
    // Middleware custom kamu
    'check_customer_login' => \App\Http\Middleware\CheckCustomerLogin::class,
];