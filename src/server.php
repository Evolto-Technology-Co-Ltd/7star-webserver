<?php
require '../vendor/autoload.php';

class GreeterService extends helloworld\GreeterService
{
    public function SayHello(\helloworld\HelloRequest $request): \helloworld\HelloResponse
    {
        $name = $request->getName();
        $message = "Hello, $name!";
        
        $response = new \helloworld\HelloResponse();
        $response->setMessage($message);
        
        return $response;
    }
}

$server = new \Grpc\Server();
$server->addService(helloworld\GreeterService::class, new GreeterService());
$server->start();
