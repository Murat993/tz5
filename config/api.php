<?php

use Base\Router;

return static function (Router $router) {
    // Регистрируем маршруты для контроллера TicketController
    $router->register('GET', '/tickets/:status', 'TicketController', 'ticketList');
    $router->register('POST', '/tickets/create', 'TicketController', 'createTicket');
    $router->register('PUT', '/tickets/work/:id', 'TicketController', 'ticketWork');
    $router->register('DELETE', '/tickets/:id', 'TicketController', 'ticketDelete');

// Регистрируем маршруты для контроллера CommentController
    $router->register('POST', '/comments/create', 'CommentController', 'createComment');
    $router->register('GET', '/comments/', 'CommentController', 'commentList');
};
