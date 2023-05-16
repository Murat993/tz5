<?php

namespace Base;

class Response
{
    private $status = 200;
    private $headers = [];
    private $body = '';

    public function setHeader($name, $value)
    {
        $this->headers[$name] = $value;
        return $this;
    }

    public function json($data, $status = 200)
    {
        $this->setHeader('Content-Type', 'application/json');
        $this->body = json_encode($data);
        $this->status = $status;
        return $this;
    }

    public function send()
    {
        http_response_code($this->status);

        foreach ($this->headers as $name => $value) {
            header("$name: $value");
        }

        echo $this->body;
    }
}