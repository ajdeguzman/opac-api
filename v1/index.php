<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
require_once '../includes/db_handler.php';

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true
    ]
]);

/**
 * Listing single restaurant menu
 * method GET
 * url /books/:title
 */
$app->get('/books/title/{title}', function (Request $request, Response $oldResponse) {
    $response = array();
    $db = new DbHandler();

    $title = $request->getAttribute('title');
    $result = $db->getBooksByTitle($title);

    $response["error"] = count($result) > 0;
    $response["title"] = $title;
    $response["books"] = array();
    if ($result != null) {
        while ($menu = $result->fetch_assoc()) {
            $tmp                   = array();
            $tmp["book_list"]   = $menu["book_list"];
            $tmp["book_list_accessno"]   = $menu["book_list_accessno"];
            $tmp["book_list_babarcode"]   = $menu["book_list_babarcode"];
            $tmp["book_list_class"] = $menu["book_list_class"];
            $tmp["book_list_completecn"] = $menu["book_list_completecn"];
            $tmp["book_list_copies"] = $menu["book_list_copies"];
            $tmp["book_list_csection"] = $menu["book_list_csection"];
            $tmp["book_list_edition"] = $menu["book_list_edition"];
            $tmp["book_list_cyear"] = $menu["book_list_cyear"];
            $tmp["book_list_format"] = $menu["book_list_format"];
            $tmp["book_list_pages"] = $menu["book_list_pages"];
            $tmp["book_list_publisher"] = $menu["book_list_publisher"];
            $tmp["book_list_title"] = $menu["book_list_title"];
            $tmp["book_list_author"] = $menu["book_list_author"];
            $tmp["book_list_volume"] = $menu["book_list_volume"];
            array_push($response["books"], $tmp);
        }
        return $oldResponse->withJson($response, 201);
    } else {
        $response["error"]   = true;
        $response["message"] = "The requested resource doesn't exists";
        return $oldResponse->withJson($response, 201);
    }
});
/**
 * Listing single restaurant menu
 * method GET
 * url /books/:author
 */
$app->get('/books/author/{author}', function (Request $request, Response $oldResponse) {
    $response = array();
    $db = new DbHandler();

    $author = $request->getAttribute('author');
    $result = $db->getBooksByTitle($author);

    $response["error"] = count($result) > 0;
    $response["author"] = $author;
    $response["books"] = array();
    if ($result != null) {
        while ($menu = $result->fetch_assoc()) {
            $tmp                   = array();
            $tmp["book_list"]   = $menu["book_list"];
            $tmp["book_list_accessno"]   = $menu["book_list_accessno"];
            $tmp["book_list_babarcode"]   = $menu["book_list_babarcode"];
            $tmp["book_list_class"] = $menu["book_list_class"];
            $tmp["book_list_completecn"] = $menu["book_list_completecn"];
            $tmp["book_list_copies"] = $menu["book_list_copies"];
            $tmp["book_list_csection"] = $menu["book_list_csection"];
            $tmp["book_list_edition"] = $menu["book_list_edition"];
            $tmp["book_list_cyear"] = $menu["book_list_cyear"];
            $tmp["book_list_format"] = $menu["book_list_format"];
            $tmp["book_list_pages"] = $menu["book_list_pages"];
            $tmp["book_list_publisher"] = $menu["book_list_publisher"];
            $tmp["book_list_title"] = $menu["book_list_title"];
            $tmp["book_list_author"] = $menu["book_list_author"];
            $tmp["book_list_volume"] = $menu["book_list_volume"];
            array_push($response["books"], $tmp);
        }
        return $oldResponse->withJson($response, 201);
    } else {
        $response["error"]   = true;
        $response["message"] = "The requested resource doesn't exists";
        return $oldResponse->withJson($response, 201);
    }
});
$app->run();
