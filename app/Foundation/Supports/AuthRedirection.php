<?php

declare(strict_types=1);

namespace App\Foundation\Supports;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Shopify\Auth\OAuth;
use Shopify\Context;
use Shopify\Utils;

class AuthRedirection
{
    public static function redirect(Request $request, bool $isOnline = false): RedirectResponse
    {
        $shop = Utils::sanitizeShopDomain($request->route("shop"));

        if (Context::$IS_EMBEDDED_APP && $request->query("embedded", false) === "1") {
            $redirectUrl = self::clientSideRedirectUrl($shop, $request->query());
        } else {
            $redirectUrl = self::serverSideRedirectUrl($shop, $isOnline);
        }

        return redirect($redirectUrl);
    }

    private static function serverSideRedirectUrl(string $shop, bool $isOnline): string
    {
        return OAuth::begin(
            $shop,
            '/api/shopify/callback',
            $isOnline,
            'App\Foundation\Supports\CookieHandler::saveShopifyCookie',
        );
    }

    private static function clientSideRedirectUrl($shop, array $query): string
    {
        $appHost = Context::$HOST_NAME;
        $redirectUri = urlencode("https://$appHost/api/auth?shop=$shop");

        $queryString = http_build_query(array_merge($query, ["redirectUri" => $redirectUri]));
        return "/ExitIframe?$queryString";
    }
}
