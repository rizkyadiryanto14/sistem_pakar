<?php

class ChatGpt extends CI_Controller
{
    public function index()
    {
        $this->load->library('ChatGpt');
        $response = $this->chatgpt->get_response('Hello, ChatGPt');
        echo $response;
    }
}
