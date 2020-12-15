<?php

/**
 * To create new API calls, you have to instanciate the API controller and start adding endpoints
*/
$api = new \WPAS\Controller\WPASAPIController([ 
    'version' => '1', 
    'application_name' => 'sample_api', 
    'namespace' => 'Rigo\\Controller\\' 
]);


/**
 * Then you can start adding each endpoint one by one
*/
// $api->get([ 'path' => '/course', 'controller' => 'SampleController:getCourses' ]); 
$api->get([ 'path' => '/course/(?P<id>[\d]+)', 'controller' => 'SampleController:getSingleCourse' ]); 
$api->delete([ 'path' => '/course/(?P<id>[\d]+)', 'controller' => 'SampleController:deleteCourse' ]); 
$api->post([ 'path' => '/course', 'controller' => 'SampleController:createCourse' ]); 
$api->get([ 'path' => '/course', 'controller' => 'SampleController:getCoursesWithCustomFields' ]); 

// $api->get([ 'path' => '/quote/(?P<useremail>[\s]+)', 'controller' => 'QuoteController:getSingleQuote' ]); 
$api->post([ 'path' => '/quotes', 'controller' => 'QuoteController:getSingleQuote' ]); 
$api->get([ 'path' => '/quote', 'controller' => 'QuoteController:getAllQuote' ]);
$api->post([ 'path' => '/quote', 'controller' => 'QuoteController:createQuote' ]);
$api->delete([ 'path' => '/quote/(?P<id>[\d]+)', 'controller' => 'QuoteController:deleteQuote' ]);