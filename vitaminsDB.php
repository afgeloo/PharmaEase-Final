<?php
// Database connection variables
$servername = "localhost"; // Replace with your database server
$username = "root";        // Replace with your MySQL username
$password = "";            // Replace with your MySQL password
$dbname = "pharmaease_db"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to create the products table
$sql_create_table = "CREATE TABLE IF NOT EXISTS `vitamins & suppliments` (
    id INT AUTO_INCREMENT UNIQUE KEY,
    name VARCHAR(255) NOT NULL,
    label VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    sku INT NOT NULL,
    description TEXT,
    store VARCHAR(255),
    images JSON,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);";

// // Execute query to create the table
if ($conn->query($sql_create_table) === TRUE) {
    echo "Table 'sexual wellness' created successfully.<br>";
} else {
    echo "Error creating table: " . $conn->error . "<br>";
}

// Array of products to inserT

// Array of products to insert
$products = [
    [
        'name' => 'Berroca',
        'label' => 'Multi Vitamins',
        'price' => 590.50,
        'sku' => 5030,
        'description' => "Berocca supports the release of energy so you can be at your best, whatever daily challenges you're facing.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/VITAMINS & SUPPLEMENTS/berroca (2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/VITAMINS & SUPPLEMENTS/berroca.png"
        ])
    ],
    [
        'name' => 'Calci-Aid',
        'label' => 'Multi Vitamins',
        'price' => 546.50,
        'sku' => 5031,
        'description' => "Calcium supplement commonly used to support bone health, help prevent calcium deficiencies, and improve bone density. ",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/VITAMINS & SUPPLEMENTS/calci-aid (2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/VITAMINS & SUPPLEMENTS/calci-aid.png"
        ])
    ],
    [
        'name' => 'Caltrate',
        'label' => 'Multi Vitamins',
        'price' => 200.00,
        'sku' => 5032,
        'description' => "Designed to support bone health, increase bone density, and prevent calcium deficiencies.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/VITAMINS & SUPPLEMENTS/calctrate (2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/VITAMINS & SUPPLEMENTS/calctrate (3).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/VITAMINS & SUPPLEMENTS/calctrate.png"
        ])
    ],
    [
        'name' => 'Cherifer',
        'label' => 'Multi Vitamins',
        'price' => 325.00,
        'sku' => 5033,
        'description' => "Vitamin supplement that supports growth, boosts energy, and enhances overall health, particularly for children and adolescents.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/VITAMINS & SUPPLEMENTS/cherifer (2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/VITAMINS & SUPPLEMENTS/cherifer.png",
        ])
    ],
    [
        'name' => 'Conzace',
        'label' => 'Multi Vitamins',
        'price' => 430.00,
        'sku' => 5034,
        'description' => "Multivitamin supplement that contains vitamins A, C, and E, along with zinc.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/VITAMINS & SUPPLEMENTS/conzace (2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/VITAMINS & SUPPLEMENTS/conzace.png",
        ])
    ],
    [
        'name' => 'Enat',
        'label' => 'Multi Vitamins',
        'price' => 200.50,
        'sku' => 5035,
        'description' => "A supplement containing vitamin E, commonly used for its antioxidant properties to support skin health, prevent oxidative stress, and improve overall cell function.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/VITAMINS & SUPPLEMENTS/enat (2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/VITAMINS & SUPPLEMENTS/enat (3).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/VITAMINS & SUPPLEMENTS/enat.png"
        ])
    ],
    [
        'name' => 'Fern-C',
        'label' => 'Multi Vitamins',
        'price' => 450.00,
        'sku' => 5036,
        'description' => "Vitamin C supplement that also contains zinc and other essential nutrients. It is designed to support immune function, enhance skin health, and promote overall well-being with its antioxidant properties.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/VITAMINS & SUPPLEMENTS/fern-c gold (2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/VITAMINS & SUPPLEMENTS/fern-c gold (3).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/VITAMINS & SUPPLEMENTS/fern-c.png"
        ])
    ],
    [
        'name' => 'Ferro-B',
        'label' => 'Multi Vitamins',
        'price' => 650.25,
        'sku' => 5037,
        'description' => "An iron supplement commonly used to treat or prevent iron deficiency anemia.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/VITAMINS & SUPPLEMENTS/ferro-b.png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/VITAMINS & SUPPLEMENTS/ferro-b (3).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/VITAMINS & SUPPLEMENTS/ferro-b (2).png"
        ])
    ],
    [
        'name' => 'Ferron',
        'label' => 'Multi Vitamins',
        'price' => 650.00,
        'sku' => 5038,
        'description' => "An iron supplement commonly used to treat or prevent iron deficiency anemia.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/VITAMINS & SUPPLEMENTS/ferron.png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/VITAMINS & SUPPLEMENTS/ferron (2).png",
        ])
    ],
    [
        'name' => 'Forti-D',
        'label' => 'Multi Vitamins',
        'price' => 400.00,
        'sku' => 5039,
        'description' => "A vitamin D supplement designed to support bone health, enhance calcium absorption, and boost immune function.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/VITAMINS & SUPPLEMENTS/forti-d (2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/VITAMINS & SUPPLEMENTS/forti-d.png",
        ])
    ],
    [
        'name' => 'Ferrous',
        'label' => 'Multi Vitamins',
        'price' => 801.00,
        'sku' => 5040,
        'description' => "Supplements are used to treat or prevent iron deficiency anemia by increasing iron levels in the body, supporting red blood cell production.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/VITAMINS & SUPPLEMENTS/ferrous.png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/VITAMINS & SUPPLEMENTS/ferrous (2).png",
        ])
    ],
    [
        'name' => 'GrowBibo',
        'label' => 'Multi Vitamins',
        'price' => 400.75,
        'sku' => 5041,
        'description' => "Nutritional supplement, typically marketed for children, designed to support growth and development.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/VITAMINS & SUPPLEMENTS/growbibo (2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/VITAMINS & SUPPLEMENTS/growbibo.png",
        ])
    ],
    [
        'name' => 'Hemarate',
        'label' => 'Multi Vitamins',
        'price' => 450.50,
        'sku' => 5042,
        'description' => "Is an iron supplement used to treat or prevent iron deficiency anemia. ",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/VITAMINS & SUPPLEMENTS/hermate.png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/VITAMINS & SUPPLEMENTS/hermate (3).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/VITAMINS & SUPPLEMENTS/hermate (2).png",
        ])
    ],
    [
        'name' => 'ImmunPro',
        'label' => 'Multi Vitamins',
        'price' => 450.25,
        'sku' => 5043,
        'description' => "A dietary supplement designed to support immune health.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/VITAMINS & SUPPLEMENTS/immunpro (3).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/VITAMINS & SUPPLEMENTS/immunpro (4).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/VITAMINS & SUPPLEMENTS/immunpro.png",
        ])
    ],
    [
        'name' => 'Lactezin',
        'label' => 'Acne Treatment',
        'price' => 500.25,
        'sku' => 5044,
        'description' => "Supplement commonly used to manage acne.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/VITAMINS & SUPPLEMENTS/Lactezin (2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/VITAMINS & SUPPLEMENTS/Lactezin.png",
        ])
    ],
    [
        'name' => 'Pharex-B',
        'label' => 'Multi Vitamins',
        'price' => 540.25,
        'sku' => 5045,
        'description' => "Used to support energy production, improve metabolism, and promote healthy nerve function. ",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/VITAMINS & SUPPLEMENTS/pharexb.png",
        ])
    ],
    [
        'name' => 'Potencee-C',
        'label' => 'Multi Vitamins',
        'price' => 550.25,
        'sku' => 5046,
        'description' => "Used to support energy production, improve metabolism, and promote healthy nerve function. ",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/VITAMINS & SUPPLEMENTS/Potencee-c gold (2).png",
        ])
    ],
    [
        'name' => 'Propan',
        'label' => 'Multi Vitamins',
        'price' => 550.25,
        'sku' => 5047,
        'description' => "Used to support energy production, improve metabolism, and promote healthy nerve function. ",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/VITAMINS & SUPPLEMENTS/propan (2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/VITAMINS & SUPPLEMENTS/propan (3).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/VITAMINS & SUPPLEMENTS/propan.png"
        ])
    ],
];

// Insert each product
foreach ($products as $product) {
    $description = $conn->real_escape_string($product['description']);
    $sql_insert = "INSERT INTO `vitamins & suppliments` (name, label, price, sku, description, store, images)
        VALUES (
            '{$conn->real_escape_string($product['name'])}',
            '{$conn->real_escape_string($product['label'])}',
            {$product['price']},
            {$product['sku']},
            '$description',
            '{$conn->real_escape_string($product['store'])}',
            '{$conn->real_escape_string($product['images'])}'
        );";

    // Execute insert query
    if ($conn->query($sql_insert) === TRUE) {
        echo "Product '{$product['name']}' inserted successfully.<br>";
    } else {
        echo "Error inserting product '{$product['name']}': " . $conn->error . "<br>";
    }
}

// Close connection
$conn->close();
?>