<?php

class Response {

    // use of _ before variable name is is to used to define instance varaibles
    private $_success;
    private $_httpStatusCode;
    private $_messages = array();
    private $_data;
    private $_toCache = false;
    private $_responseData = array();

    public function setSuccess($success) {
        $this->_success = $success;
    }

    public function setHttpStatusCode($httpStatusCode) {
        $this->_httpStatusCode = $httpStatusCode;
    }

    public function addMessage($message) {
        $this->_messages[] = $message;
    }

    public function setData($data) {
        $this->_data = $data;
    }

    public function setCache($toCache) {
        $this->_toCache = $toCache;
    }

    public function send() {
        // tells the client the type of data we are sending it and the character set
        header('Content-type: application/json;charset=utf-8');

        if($this->_toCache === true) {
            // tell the client to store the data in the cache for 60 seconds
            header('Cache-control: max-age=60');
        } else {
            // tell the client to not cache or store any of the data on the server
            header('Cache-control: no-cache, no-store');
        }

        // response is not valid or we don't have a http status code
        if(($this->_success !== false && $this->_success !== true) || !is_numeric($this->_httpStatusCode)) {
            // send error code to the client
            http_response_code(500);
            // generate default error response
            $this->_responseData['statusCode'] = 500;
            $this->_responseData['success'] = false;
            $this->addMessage('Response creation error');
            $this->_responseData['messages'] = $this->_messages;
        } else {
            http_response_code($this->_httpStatusCode);
            $this->_responseData['statusCode'] = $this->_httpStatusCode;
            $this->_responseData['success'] = $this->_success;
            $this->_responseData['messages'] = $this->_messages;
            $this->_responseData['data'] = $this->_data;
        }

        echo json_encode($this->_responseData);
    }
}