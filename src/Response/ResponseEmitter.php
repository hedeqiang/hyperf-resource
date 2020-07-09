<?php
declare(strict_types=1);

namespace Fangx\Resource\Response;

use Fangx\Resource\Resource;
use Psr\Http\Message\ResponseInterface;
use Swoole\Http\Response;

class ResponseEmitter extends \Hyperf\HttpServer\ResponseEmitter
{
    public function emit(ResponseInterface $response, Response $swooleResponse, bool $withContent = true)
    {
        if ($response instanceof Resource) {
            $response = $response->toResponse();
        }

        return parent::emit($response, $swooleResponse, $withContent);
    }
}