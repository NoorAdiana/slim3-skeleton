<?php

namespace App\Middleware;

class InputMiddleware extends Middleware
{
    public function __invoke($request, $response, $next)
    {
        $this->view->getEnvironment()->addGlobal('input', $_SESSION['input']);
        $_SESSION['input'] = $request->getParams();
        
        $response = $next($request, $response);
        return $response;
    }
}