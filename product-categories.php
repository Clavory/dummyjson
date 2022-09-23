<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
        'base_uri' => 'https://dummyjson.com/'
]);

$response = $client->get('https://dummyjson.com/products/category/smartphones');
$code = $response->getStatusCode();
$body = $response->getBody();
$product_category= json_decode($body, true);

   //var_dump($product_category['products']);
?>


<html>
<title>Product Category</title>
<head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
        <?php
        foreach ($product_category['products'] as $product){
        ?>
          <tr>
            <th scope="row" href="single-product.php"><?php echo $product['id']; ?></th>
            <td><?php echo $product['title']; ?></td>
            <td><?php echo $product['description']; ?></td>
            <td><?php echo $product['price']; ?></td>
            <td><?php echo $product['brand']; ?></td>
            <td><?php echo $product['category']; ?></td>
            <td><img src="<?php echo $product['thumbnail']; ?>" height="200px"></td>
          <tr>
     <?php
     }
?>
        </tbody>
      </table>
</body>
</html>