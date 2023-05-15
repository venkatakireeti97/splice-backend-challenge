<?php

namespace App\Http\Controllers;

use App\Foundation\Supports\AuthRedirection;
use App\Foundation\Supports\FileSessionStorage;
use App\Services\ShopifyService;
use Illuminate\Http\Request;
use Shopify\Context;

class ShopifyController extends Controller
{
    public function __construct(protected ShopifyService $shopifyService)
    {
        Context::initialize(
            apiKey: env('SHOPIFY_API_KEY'),
            apiSecretKey: env('SHOPIFY_API_SECRET'),
            scopes: env('SHOPIFY_APP_SCOPES'),
            hostName: env('SHOPIFY_APP_HOST_NAME'),
            sessionStorage: new FileSessionStorage(),
            apiVersion: '2023-04',
            isEmbeddedApp: true,
            isPrivateApp: false,
        );
    }

    /**
     * Install shopify app.
     */
    public function __invoke(Request $request)
    {
        $this->shopifyService->install($request);

        return AuthRedirection::redirect($request);
    }

    /**
     * Shopify callback.
     */
    public function callback(Request $request)
    {
        $redirectUrl = $this->shopifyService->callback($request);

        return redirect($redirectUrl);
    }
}
