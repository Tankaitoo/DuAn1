<?php

namespace App;

class Route
{

    private static $routes = [];
    public static function get($url, $controllerMethod)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET')
            self::$routes[$url] = $controllerMethod;
    }
    public static function post($url, $controllerMethod)
    {
        if (isset($_POST['method']))
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['method'] == 'POST')
                self::$routes[$url] = $controllerMethod;
    }
    public static function put($url, $controllerMethod)
    {
        if (isset($_POST['method']))
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['method'] == 'PUT')
                self::$routes[$url] = $controllerMethod;
    }
    public static function delete($url, $controllerMethod)
    {
        if (isset($_POST['method']))
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['method'] == 'DELETE')
                self::$routes[$url] = $controllerMethod;
    }

    public static function dispatch($uri)
    {
        // echo "<pre>";

        // var_dump($uri);

        if ($uri != '/') {
            // tách thành mảng nếu có ? trên URL
            $uri = explode('?', $uri);

            // var_dump($uri);
            // var_dump($uri);
            // var_dump(self::$routes);

            // lấy phần tử đầu tiên của URL
            // Vd: $_SERVER['REQUEST_URI']=/admin/categories/1?search=Category1 => chỉ lấy /admin/categories/1
            $uri = $uri[0];

            // cắt dấu / nếu xuất hiện ở cuối uri
            $uri = rtrim($uri, '/');

            // đảo ngược uri $reversedUri = 1/seirogetac/nimda/
            $reversedUri = strrev($uri);
            // var_dump($reversedUri);
            // tách url thành mảng 2 phần tử cách nhau bằng dấu /
            $parts = explode('/', $reversedUri, 2);

            // đảo ngược để lấy từng phần
            // phần 1: /admin/categories/
            $part1 = strrev($parts[1]);
            // phần 2: 1 => ép thành kiểu int
            $part2 = (int) strrev($parts[0]);
        }


        // kiểm tra $uri có trùng với route đã định nghĩa ko ?
        if (array_key_exists($uri, self::$routes)) {
            // Vd: GET /categories (lấy danh sách loại sản phẩm) => Route::get("/categories", "App\Controllers\Client\CategoryController@index");
            // $uri = /categories
            // self::$routes[$uri] = self::$routes['/categories'] = App\Controllers\Client\CategoryController@index
            $controllerMethod = self::$routes[$uri];

            // dùng list để gán giá trị cho biến $controller, $method khi tách $controllerMethod thành 2 phần
            list($controller, $method) = explode("@", $controllerMethod);

            // Vd: $controller = App\Controllers\Client\CategoryController
            $controllerInstance = new $controller();

            // Vd: $method = index
            $controllerMethod = $controllerInstance->$method();
        }
        // kiểm tra $uri có trùng với route đã định nghĩa với id được truyền vào ? và $part2 sau khi ép kiểu int có null ko ?
        elseif (array_key_exists($part1 . '/{id}', self::$routes) && $part2) {
            // Vd: GET /categories/{id} (lấy chi tiết loại sản phẩm với category_id cụ thể) Route::get("/categories/{id}", "App\Controllers\Client\CategoryController@edit");
            // Vd: Truy cập: 127.0.0.1:8080/categories/1 
            // $uri = /categories/1 
            // => $part1 = /categories, $part2 = 1
            // gán giá trị cho biến $id
            $id = $part2;

            // $part1 . '/{id}' = /categories/{id} 
            // self::$routes[$part1 . '/{id}'] = self::$routes['/categories/{id}'] = App\Controllers\Client\CategoryController@edit
            $controllerMethod = self::$routes[$part1 . '/{id}'];

            // dùng list để gán giá trị cho biến $controller, $method khi tách $controllerMethod thành 2 phần
            list($controller, $method) = explode("@", $controllerMethod);

            // Vd: $controller = App\Controllers\Client\CategoryController
            $controllerInstance = new $controller();

            // Vd: $method = edit($id) = edit(1)
            $controllerMethod = $controllerInstance->$method($id);
        }
        // không khớp với route đã định nghĩa
        else {
            echo 'not found';
        }
    }
}
