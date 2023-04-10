<?php

class ChatGpt
{
    private $endpoint;
    private $api_key;

    public function __construct()
    {
        $this->endpoint = 'https://api.openai.com/v1/engines/davinci-codex/completions';
        $this->api_key = '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';
    }

    public function get_response($prompt)
    {
        $data = array(
            'prompt' => $prompt,
            'max_tokens' => 60,
            'temperature' => 0.5,
            'n' => 1,
            'stop' => '\n'
        );

        $headers = array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->api_key
        );

        $curl = curl_init($this->endpoint);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($curl);
        curl_close($curl);

        return json_decode($response)->choices[0]->text;
    }
}
