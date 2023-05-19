<?php
require '../vendor/autoload.php';

$client = new helloworld\GreeterClient('localhost:50051', [
    'credentials' => Grpc\ChannelCredentials::createInsecure(),
]);

$request = new helloworld\HelloRequest();
$request->setName('Alice');

$response = $client->SayHello($request);

echo $response->getMessage();
