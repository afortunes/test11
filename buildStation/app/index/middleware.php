<?php

return [
    // 接口中间件
    \app\index\middleware\ApiMiddleware::class,
    // 会员Token中间件
    \app\index\middleware\MemberTokenMiddleware::class,
    // 会员日志中间件
    \app\index\middleware\MemberLogMiddleware::class,
    // 接口速率中间件
    \app\index\middleware\ApiRateMiddleware::class,
];
