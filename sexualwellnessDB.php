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
$sql_create_table = "CREATE TABLE IF NOT EXISTS `sexual wellness` (
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
        'name' => 'Modess',
        'label' => 'Napkin/Panty Liner',
        'price' => 35.00,
        'sku' => 5234,
        'description' => "Provides discreet protection with a blend of 4 thin flexible layers for leak protection.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/MODESS NAPKIN (2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/MODESS NAPKIN.png"
        ])
    ],
    [
        'name' => 'Sisters',
        'label' => 'Napkin/Panty Liner',
        'price' => 45.00,
        'sku' => 3794,
        'description' => "Features a silky top sheet for softness and comfort.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/SISTERS.png"
        ])
    ],
    [
        'name' => 'Whisper',
        'label' => 'Napkin/Panty Liner',
        'price' => 40.00,
        'sku' => 2489,
        'description' => "Features germ-lock technology to lock wetness, odor, and germs.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/WHISPER NAPKIN.png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/WHISPER NAPKIN (2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/WHISPER NAPKIN (3).png"
        ])
    ],
    [
        'name' => 'Charmee',
        'label' => 'Napkin/Panty Liner',
        'price' => 32.00,
        'sku' => 1536,
        'description' => "Individually wrapped panty liners with Air through Channels.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/CHARMEE NAPKIN.png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/CHARMEE NAPKIN (2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/CHARMEE NAPKIN (3).png"
        ])
    ],
    [
        'name' => 'Menstrual Cup',
        'label' => 'Menstrual Care',
        'price' => 250.00,
        'sku' => 4264,
        'description' => "It is an eco-friendly alternative to tampons and pads, offering longer wear time and less environmental waste.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/MENSTRUAL CUP.png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/MENSTRUAL CUP (2).png"
        ])
    ],
    [
        'name' => 'Tampon',
        'label' => 'Menstrual Care',
        'price' => 199.00,
        'sku' => 3125,
        'description' => "Typically made of cotton, rayon, or a blend of both, available in various sizes and absorbencies.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/TAMPON.png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/TAMPON (2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/TAMPON (3).png"
        ])
    ],
    [
        'name' => 'Ph Care',
        'label' => 'Feminine Wash',
        'price' => 145.00,
        'sku' => 1254,
        'description' => "They include feminine washes and wipes with a pH level of 5, which matches the natural pH of the intimate area. This helps to cleanse and protect without causing irritation or discomfort.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/PH CARE FEMININE WASH.png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/PH CARE FEMININE WASH (2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/PH CARE FEMININE WASH (3).png"
        ])
    ],
    [
        'name' => 'Betadine Feminine Wash',
        'label' => 'Feminine Wash',
        'price' => 152.00,
        'sku' => 1342,
        'description' => "Is a gentle, pH-balanced cleanser for freshness and intimate care.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/BETADINE FEMININE WASH.png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/BETADINE FEMININE WASH (2).png"
        ])
    ],
    [
        'name' => 'Lactacyd',
        'label' => 'Feminine Wash',
        'price' => 160.00,
        'sku' => 1356,
        'description' => "Their products contain lactic acid, which supports the vagina's natural protection.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/LACTACYD FEMININE WASH (2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/LACTACYD FEMININE WASH .png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/LACTACYD FEMININE WASH (3).png",
        ])
    ],
    [
        'name' => 'Gillette',
        'label' => 'Shaving Cream',
        'price' => 133.00,
        'sku' => 1425,
        'description' => "Provides a rich, foamy lather for an easy, comfortable shave.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/GILLETTE SHAVING CREAM.png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/GILLETTE SHAVING CREAM (2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/GILLETTE SHAVING CREAM (3).png",
        ])
    ],
    [
        'name' => 'Nivea Men',
        'label' => 'Shaving Cream',
        'price' => 418.00,
        'sku' => 2563,
        'description' => "It is designed to provide a comfortable and clean shave while protecting your skin.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/NIVEA SHAVING CREAM.png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/NIVEA SHAVING CREAM (2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/NIVEA SHAVING CREAM (3).png",
        ])
    ],
    [
        'name' => 'Trust',
        'label' => 'Condom',
        'price' => 32.00,
        'sku' => 1354,
        'description' => "Quality Imported Condoms. Sensitive, Strong, Reliable. Hygienically Sealed",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/TRUST CONDOM.png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/TRUST CONDOM (2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/TRUST CONDOM (3).png",
        ])
    ],
    [
        'name' => 'Durex',
        'label' => 'Condom',
        'price' => 43.00,
        'sku' => 1523,
        'description' => "Quality Imported Condoms. Sensitive, Strong, Reliable. Hygienically Sealed",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/DUREX CONDOM.png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/DUREX CONDOM (2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/DUREX CONDOM (3).png",
        ])
    ],
    [
        'name' => 'Durex',
        'label' => 'Lubricant',
        'price' => 298.25,
        'sku' => 1534,
        'description' => "Durex Play is a light and silky pleasure gel designed to give you an intensely sensual experience. It contains a specially formulated blend of ingredients which will enhance touch between you and your partner",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/DUREX LUB.png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/DUREX LUB (2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/DUREX LUB (3).png",
        ])
    ],
];

// Insert each product
foreach ($products as $product) {
    $description = $conn->real_escape_string($product['description']);
    $sql_insert = "INSERT INTO `sexual wellness` (name, label, price, sku, description, store, images)
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