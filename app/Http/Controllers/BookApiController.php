<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use JsonSchema\Uri\Retrievers\Curl;

class BookApiController extends Controller
{
    public function index()
    {
        $curl = new Curl();
        curl_setopt($curl,CURLOPT_URL,'http://127.0.0.1:8000/api/BookDetail/');
        curl_setopt($curl,CURLOPT_POST, true);
        curl_setopt($curl,CURLOPT_HTTPHEADER, ['content-type: application/json']);
        curl_setopt($curl,CURLOPT_POSTFIELDS, $request);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);


    }

    public function show($id)
    {
        $http_response_header = Http::get('https://jsonplaceholder.typicode.com/posts/'.$id);

        return $http_response_header->json();
    }
}
