<?php

require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
        'base_uri' => 'https://dummyjson.com/'
]);

?> 

<html>
        <title>Search Products</title>
        <head>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        </head>
        <body>
        <div class="container text-center mt-5">
        <form action="search-product.php" method="POST">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search a product" name="search_product">
                <button class="btn btn-outline-secondary" type="submit" id="search">Search<i class="fas fa-search"></i</button>
            </div>
        </form>
                </div>  
        </body>
</html>

<?php

if (isset($_POST['search_product'])){

    $search_product = $_POST['search_product'];
    $response = $client->get('https://dummyjson.com/products/search?q='. $search_product);
    $code = $response->getStatusCode();
    $body = $response->getBody();
    $search_product = json_decode($body, true);
    //var_dump($search_product['products']);

?>

<html>
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
        <?php
        foreach ($search_product['products'] as $product){
        ?>
          <tr>
                <th scope="row" href="single-product.php"><?php echo $product['id'];?></th>
                <td><?php echo $product['title'];?></td>
                <td><?php echo $product['description'];?></td>
                <td><?php echo $product['price'];?></td>
                <td><?php echo $product['brand'];?></td>
                <td><?php echo $product['category'];?></td>
                <td><img src="<?php echo $product['thumbnail'];?>" height="200px"></td>
          </tr>
     <?php
     }
}
?>
        </tbody>
        </table>
   </body>
</html>