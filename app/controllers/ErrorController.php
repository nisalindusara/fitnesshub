<?php

class ErrorController extends Controller
{
    public function pageNotFoundError404(): void
    {
        http_response_code(404);
        $this->render('errors/404', 'minimal');
    }

    public function accessDeniedError403(): void
    {
        http_response_code(403);
        $this->render('errors/403', 'minimal');
    }
}
