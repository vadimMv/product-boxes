<?php
abstract class Handler
{
    abstract public function jsonResponse($id);
    abstract public function isAjax();
}

class RequestHandler extends Handler
{
    public function getQueryString()
    {
        return $_GET['box'] ?? '';
    }
    
    public function isAjax()
    {

        return (isset($_SERVER['HTTP_X_REQUESTED_WITH'])
            && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
    }

    public function getContent($id)
    {
        $options = include 'options.php';
        return $options[$id]['content'];
    }

    public function jsonResponse($boxId)
    {
        $content = $this->getContent($boxId);
        echo json_encode(['content' => $content]);
    }

}
