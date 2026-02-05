<?php

namespace PHPSTORM_META {
    // session() function
    \override(\session(), map([
        'cart' => \Illuminate\Session\Store::class,
    ]));

    // view() function
    \override(\view(), \Illuminate\View\View::class);

    // redirect() function
    \override(\redirect(), \Illuminate\Routing\Redirector::class);

    // asset() function
    \override(\asset(), \Illuminate\Contracts\Routing\UrlGenerator::class);

    // route() function
    \override(\route(), \Illuminate\Contracts\Routing\UrlGenerator::class);
}
