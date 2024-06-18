<?php
    require_once __DIR__ .'/vendor/autoload.php';
    use PhpPdo\Mruruc\service\ProductService;
    use PhpPdo\Mruruc\config\ConfigDb;
    use PhpPdo\Mruruc\model\Product;

    $product1 = new Product(1, 'iPhone 13',799.99,'The latest iPhone with A15 Bionic chip.', new DateTime());


    echo json_encode($product1);


   /* $product2 = new Product(2, 'Samsung Galaxy S21', 699.99, 'High-end Android smartphone with advanced camera.', new DateTime());
    $product3 = new Product(3, 'MacBook Air',  999.99, 'Lightweight and powerful laptop with M1 chip.',new DateTime());
    $product4 = new Product(4, 'Sony WH-1000XM4', 349.99,'Industry-leading noise cancelling headphones.',  new DateTime());
    $product5 = new Product(5, 'GoPro HERO9', 399.99, 'Waterproof action camera with 5K video.',  new DateTime());

    $service = new ProductService(ConfigDb::getConnection());

    $service->delete(31);
*/
    /*
    
    $service->save($product1);
    $service->save($product2);
    $service->save($product3);
    $service->save($product4);
    $service->save($product5);
*/
 //   $products=$service->findAll();


 /*


    $product1 = new Product(1, 'iPhone 13', 'The latest iPhone with A15 Bionic chip.', 799.99, new DateTime());
    $product2 = new Product(2, 'Samsung Galaxy S21', 'High-end Android smartphone with advanced camera.', 699.99, new DateTime());
    $product3 = new Product(3, 'MacBook Air', 'Lightweight and powerful laptop with M1 chip.', 999.99, new DateTime());
    $product4 = new Product(4, 'Sony WH-1000XM4', 'Industry-leading noise cancelling headphones.', 349.99, new DateTime());
    $product5 = new Product(5, 'GoPro HERO9', 'Waterproof action camera with 5K video.', 399.99, new DateTime());

    // echo json_encode($products);

    $service=new ProductService();
    $service->save($product1);
    $service->save($product2);
    $service->save($product3);
    $service->save($product4);
    $service->save($product5);

    $service->delete(4);

    foreach($service->findAll() as $product){
        echo "id={$product->getId()}<br/>";
        echo "Title={$product->getTitle()}<br/>";
        echo "Description={$product->getDesc()}<br/>";
        echo "Price={$product->getPrice()}<br/>";
        echo "id={$product->getCreatedDate()->format('Y-m-d H:i:s')}<br/>";
        echo"========================<br/>";
    }
    */
?>

