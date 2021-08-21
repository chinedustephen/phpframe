<?php
require_once ('vendor/autoload.php');

use App\Application;

// composer autoload should be used to load all classes
// structure your code into namespaces

/**
 *
You have a mini web framework that is incomplete. Your task is to make the following incomplete code functional. To get it to work, complete the implementation of the Application class and add any required classes.

Read the body of each route to find instructions that are relative to the route.  We have left some comments to help you figure out what needs to happen in each route.

Rules: No external libraries. Use composer to load your classes and use namespace.


 */


//prevents you from creating multiple instance of the application
$app = Application::instance(); // Application class should be a singleton

$app->get('/', function ($req, $res) {
    $res->send('Hello world'); // This should be printed to the browser window
});

//
$app->get('/contact', function ($req, $res) {
    // load contact.php from a templates/ folder, pass the data to the template
    // in  contact.php, create a box at the middle of the page (use css to style it) and place your form in it.
    $res->render('contact.php', ['siteName' => 'decagon', 'toEmail' => 'info@example.com']); // This line displays the compiled contact.php
});

$app->get('/services', function ($req, $res){

    $html  = $res->render('services.php', [], false);

    echo $html;
    // $html now holds the content of services.html. You can echo it
});


$app->get('/users', function ($req, $res) {

    $data = [
        [
            'id' => 1,
            'name' => 'decagon',
            'age' => 2,
        ],

        [
            'id' => 2,
            'name' => 'John',
            'age' => 20
        ],
        [
            'id' => 3,
            'name' => 'John',
            'age' => 15
        ],
    ];

    $sortBy = $req->input('sort');
    $direction = $req->input('direction'); // asc & desc


    $result = [];

    if($sortBy === 'name') {
        // sort $data by name, also, take into account, the direction
        foreach ($data as $value){
            $result[strtolower($value[$sortBy]).$value['id']] = $value;
        }

    } elseif ($sortBy === 'age') {
        foreach ($data as $value){
            $result[$value[$sortBy]] = $value;
        }

    } else {
        // do nothing
    }

    $direction === 'desc' ? arsort($result) : ksort($result);

    $valueResult = array_values($result);


    $res->sendJson($valueResult); // return json response  (Content-type should be application/json)
});

$app->post('/users', function ($req, $res) {

    $data = $req->formData();
    file_put_contents(__DIR__.'/input.txt', $data);
    // Write the data to a text file (you can post maybe two fields like name & email and write the content to a text file then redirect

    $res->redirect('/'); // Redirect to the homepage. Remember to send 302
});