<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
        'base_uri' => 'https://dummyjson.com/'
]);

// Handling HTTP Response
$products = [
	'json' => ['id' => '31',
  'title' => 'Iphone X',
  'description' => 'Iphone X is a great phone',
  'price' => '599',
  'brand' => 'Apple',
  'category' => 'smartphones',
  'thumbnail' => 'thumbnail.jpg'
	]
];

$response = $client->post('https://dummyjson.com/products/add', $products);
$code = $response->getStatusCode();
$body = $response->getBody();
$product = json_decode($body);
//var_dump(json_decode($body))
?>

<!DOCTYPE html>
    <head>
        <title>Add Product</title>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    </head>
    <body>
        <div class = "container"> 
        <table class="table table-striped">
                <thead>
                        <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Price</th>
                                <th scope="col">Brand</th>
                                <th scope="col">Category</th>
                                <th scope="col">Thumbnail</th>
                        </tr>
                </thead>
                <tbody>
                  <tr>
                  <th scope="row" href="single-product.php"><?php echo $product->id ?></th>
                  <td><?php echo $product->title?></td>
                  <td><?php echo $product->description?></td>
                  <td><?php echo $product->price?></td>
                  <td><?php echo $product->brand?></td>
                  <td><?php echo $product->category?></td>
                  <td><img src="<?php echo $product->thumbnail?>"></td>
                  </tr>
                </tbody>
        </table>
        </div>
    </body>
</html>