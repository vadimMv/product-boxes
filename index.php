<?php
require 'request.php';
$handler = new RequestHandler();
if ($handler->isAjax()) {
    $boxId = $handler->getQueryString();
    $handler->jsonResponse($boxId);
} else {
    include_once 'layout/index.php';
}

