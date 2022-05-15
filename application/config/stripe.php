<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
/* 
| ------------------------------------------------------------------- 
|  Stripe API Configuration 
| ------------------------------------------------------------------- 
| 
| You will get the API keys from Developers panel of the Stripe account 
| Login to Stripe account (https://dashboard.stripe.com/) 
| and navigate to the Developers » API keys page 
| Remember to switch to your live publishable and secret key in production! 
| 
|  stripe_api_key            string   Your Stripe API Secret key. 
|  stripe_publishable_key    string   Your Stripe API Publishable key. 
|  stripe_currency           string   Currency code. 
*/ 
$config['stripe_api_key']         = 'sk_test_51JmR86DkL9Vu9lzoY3BZYzvaRiP29PWRa43Vtr3IpWI5FKTUujK9XrDYmhtwrB886pHS6WVUmmNhBkr8vfYKKxiX00RxnGX04Q';
$config['stripe_publishable_key'] = 'pk_test_51JmR86DkL9Vu9lzoh3hR3yC6hBThCiUHEN8YeLPpQc0zUsZyLT2hUnq0ykXQzz3SV0OkNh2FBn58feZdIDr3fygX00N8RQj2AA'; 
$config['stripe_currency']        = 'usd';