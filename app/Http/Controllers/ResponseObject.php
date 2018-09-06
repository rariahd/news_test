<?php
namespace App\Http\Controllers;

class ResponseObject
{
    const status_ok = true;
    const status_failed = false;
    const code_ok = 200;
    const code_failed = 400;
    const code_unauthorized = 403;
    const code_not_found = 404;
    const code_error = 500;

    public $success;

    public $code;

    public $messages = [];

    public $result = null;
}
