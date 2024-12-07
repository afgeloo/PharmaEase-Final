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
$sql_create_table = "CREATE TABLE IF NOT EXISTS `personal care` (
    id INT AUTO_INCREMENT PRIMARY KEY,
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
    echo "Table 'personal care' created successfully.<br>";
} else {
    echo "Error creating table: " . $conn->error . "<br>";
}

// Array of products to inserT

// Array of products to insert
$products = [
    [
        'name' => 'Betadine Oral Gargle',
        'label' => 'Mouthwash',
        'price' => 232.00,
        'sku' => 1643,
        'description' => "An antiseptic mouthwash that helps to reduce bacteria and soothe sore throats.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/BETADINE MOUTHWASH.png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/BETADINE MOUTHWASH (2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/BETADINE MOUTHWASH (3).png"
        ])
    ],
    [
        'name' => 'Colgate Plax Antibacterial Mouthwash',
        'label' => 'Mouthwash',
        'price' => 132.00,
        'sku' => 1532,
        'description' => "Freshens breath and kills bacteria to help prevent plaque and gingivitis.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/COLGATE MOUTHWASH.png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/COLGATE MOUTHWASH (2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/COLGATE MOUTHWASH (3).png"
        ])
    ],
    [
        'name' => 'Listerine Cool Mint Mouthwash',
        'label' => 'Mouthwash',
        'price' => 147.00,
        'sku' => 1523,
        'description' => "An antiseptic mouthwash that kills germs to help prevent bad breath, plaque, and gum problems.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/LISTERINE MOUTHWASH.png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/LISTERINE MOUTHWASH (2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/LISTERINE MOUTHWASH (3).png"
        ])
    ],
    [
        'name' => 'Oral-B Duo Mouthwash',
        'label' => 'Mouthwash',
        'price' => 322.00,
        'sku' => 1635,
        'description' => "Combines the benefits of toothpaste and mouthwash to provide a deep clean and fresh breath.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/ORAL B MOUTHWASH.png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/ORAL B MOUTHWASH (2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/ORAL B MOUTHWASH (3).png"
        ])
    ],
    [
        'name' => 'Safeguard',
        'label' => 'Soap',
        'price' => 37.00,
        'sku' => 1652,
        'description' => "Safeguard Pure White Bar Soap is an antibacterial soap that is gentle on the skin.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/SAFEGUARD SOAP (3).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/SAFEGUARD SOAP.png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/SAFEGUARD SOAP (2).png"
        ])
    ],
    [
        'name' => 'Perla',
        'label' => 'Soap',
        'price' => 45.00,
        'sku' => 1542,
        'description' => "Known for its hypoallergenic properties, Perla Pure Bath Soap is gentle on the skin and suitable for daily use.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/PERLA SOAP.png"
        ])
    ],
    [
        'name' => 'Oxecure',
        'label' => 'Soap',
        'price' => 69.00,
        'sku' => 1542,
        'description' => "Sulfur Soap is recommended for its antibacterial properties and effectiveness in treating acne.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/OXECURE SOAP (3).png",
        ])
    ],
    [
        'name' => 'Silka',
        'label' => 'Soap',
        'price' => 37.00,
        'sku' => 1452,
        'description' => "Silka Papaya Whitening Soap is popular for its skin-brightening effects.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/SILKA SOAP (3).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/SILKA SOAP.png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/SILKA SOAP (2).png"
        ])
    ],
    [
        'name' => 'TRESemmé Conditioner',
        'label' => 'Conditioner',
        'price' => 521.00,
        'sku' => 1423,
        'description' => "Infused with shea butter oil and vitamin H to keep hair looking straight and silky.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/TRESEMME CONDITIONER.png",
        ])
    ],
    [
        'name' => 'Dove Conditioner',
        'label' => 'Conditioner',
        'price' => 286.00,
        'sku' => 1423,
        'description' => "Works deep within the cuticles to help repair damage from weather or heat styling.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/DOVE CONDITIONER.png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/DOVE CONDITIONER (2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/DOVE CONDITIONER (3).png"
        ])
    ],
    [
        'name' => 'Cream Silk',
        'label' => 'Conditioner',
        'price' => 195.00,
        'sku' => 1323,
        'description' => "Fortifies weak and brittle hair from roots to tips. Contains marula oil, argan oil, and natural shea oil to moisturize, strengthen, and smooth hair.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/CREAMSILK CONDITIONER.png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/CREAMSILK CONDITIONER (2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/CREAMSILK CONDITIONER (3).png"
        ])
    ],
    [
        'name' => 'Palmolive Naturals Conditioner',
        'label' => 'Conditioner',
        'price' => 345.00,
        'sku' => 1233,
        'description' => "Provides deep hydration and nourishment for dry and damaged hair with coconut cream and keratin.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/PALMOLIVE CONDITIONER (3).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/PALMOLIVE CONDITIONER (2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/PALMOLIVE CONDITIONER.png"
        ])
    ],
    [
        'name' => 'Colgate Total Whitening',
        'label' => 'Toothpaste',
        'price' => 258.00,
        'sku' => 2134,
        'description' => "This toothpaste helps to whiten teeth, fight cavities, and protect gums from bacterial infections.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/COLGATE TOOTHPASTE.png",
        ])
    ],
    [
        'name' => 'Closeup Red Hot Gel Toothpaste',
        'label' => 'Toothpaste',
        'price' => 186.00,
        'sku' => 1243,
        'description' => "Known for its antibacterial properties, this gel toothpaste helps to fight bad breath and maintain oral health.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/CLOSEUP TOOTHPASTE.png",
        ])
    ],
    [
        'name' => 'Pepsodent Whitening Toothpaste',
        'label' => 'Toothpaste',
        'price' => 139.00,
        'sku' => 1243,
        'description' => "Contains mild abrasives and peroxide to help whiten teeth and remove surface stains.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/PEPSODENT TOOTHPASTE.png",
        ])
    ],
    [
        'name' => 'Sensodyne Rapid Relief Toothpaste',
        'label' => 'Toothpaste',
        'price' => 190.00,
        'sku' => 1243,
        'description' => "Designed for sensitive teeth, this toothpaste provides quick relief from sensitivity and discomfort.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/SENSODYNE TOOTHPASTE.png",
        ])
    ],
    [
        'name' => 'Nivea Women Anti-Perspirant INVISIBLE Black & White Fresh',
        'label' => 'Deodorant',
        'price' => 302.00,
        'sku' => 1542,
        'description' => "Offers 48-hour protection while preventing stains on skin and clothes. It has a fresh scent and is gentle on the skin.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/NIVEA WOMEN DEO.png"
        ])
    ],
    [
        'name' => 'Dove Radiant + Care Deodorant Dry Serum',
        'label' => 'Deodorant',
        'price' => 182.00,
        'sku' => 1232,
        'description' => "Features niacinamide and vitamin C to help reduce dark marks and keep you feeling fresh.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/DOVE DEO (3).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/DOVE DEO (2).png"
        ])
    ],
    [
        'name' => 'Dove Men+Care Deodorant Stick',
        'label' => 'Deodorant',
        'price' => 254.00,
        'sku' => 1242,
        'description' => "Provides long-lasting freshness and is designed to be gentle on the skin.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/DOVE MEN DEO (3).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/DOVE MEN DEO (2).png"
        ])
    ],
    [
        'name' => 'Nivea Extra Brightening 8 Super Food Roll-On',
        'label' => 'Deodorant',
        'price' => 124.00,
        'sku' => 1243,
        'description' => "Contains natural ingredients like papaya and calamansi to help brighten underarms and keep you fresh.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/NIVEA DEO.png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/NIVEA DEO (2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/NIVEA DEO (3).png"
        ])
    ],
    [
        'name' => 'Colgate 360°',
        'label' => 'Toothbrush',
        'price' => 279.00,
        'sku' => 1243,
        'description' => "Features a multi-angle head and soft bristles to clean hard-to-reach areas and provide a thorough clean. gentle on the skin..",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/COLGATE TOOTHBRUSH.png"
        ])
    ],
    [
        'name' => 'Oral-B CrossAction',
        'label' => 'Toothbrush',
        'price' => 975.00,
        'sku' => 1564,
        'description' => "Uses Pro-Health Advanced design to clean 5x more plaque than a regular manual toothbrush. gentle on the skin.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/ORAL-B TOOTHBRUSH.png"
        ])
    ],
    [
        'name' => 'Oral-B Pro 1000',
        'label' => 'Toothbrush',
        'price' => 1299.00,
        'sku' => 1431,
        'description' => "A rechargeable electric toothbrush that provides a superior clean with its CrossAction brush head.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/ORAL-B PRO TOOTHBRUSH.png"
        ])
    ],
    [
        'name' => 'Sensodyne',
        'label' => 'Toothbrush',
        'price' => 146.00,
        'sku' => 1243,
        'description' => "Designed for sensitive teeth, this toothbrush has soft bristles to gently clean without causing discomfort.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/SENSODYNE TOOTHBRUSH.png"
        ])
    ],
    [
        'name' => 'Celeteque Cleanser',
        'label' => 'Cleanser',
        'price' => 155.00,
        'sku' => 1523,
        'description' => "A gentle yet effective cleanser that removes dirt, oil, and impurities without stripping the skin of its natural moisture. Suitable for all skin types.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/CELETEQUE CLEANSER (3).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/CELETEQUE CLEANSER (2).png"
        ])
    ],
    [
        'name' => 'Cetaphil Cleanser',
        'label' => 'Cleanser',
        'price' => 269.00,
        'sku' => 4211,
        'description' => "A mild, non-irritating cleanser that effectively removes makeup, dirt, and oil. It's perfect for sensitive skin and helps maintain the skin's natural moisture barrier..",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/CETAPHIL CLEANSER (3).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/CETAPHIL CLEANSER.png"
        ])
    ],
    [
        'name' => 'Nivea Cleanser',
        'label' => 'Cleanser',
        'price' => 155.00,
        'sku' => 1232,
        'description' => "A gentle yet effective cleanser that removes dirt, oil, and impurities without stripping the skin of its natural moisture. Suitable for all skin types.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/NIVEA CLEANSER.png",
        ])
    ],
    [
        'name' => 'Celeteque Facial Wash',
        'label' => 'Facial Wash',
        'price' => 109.00,
        'sku' => 4211,
        'description' => "A gentle yet effective cleanser that removes dirt, oil, and impurities without stripping the skin of its natural moisture. Suitable for all skin types.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/CELETEQUE FACIAL.png",
        ])
    ],
    [
        'name' => 'Ponds Bright Miracle Facial Wash',
        'label' => 'Facial Wash',
        'price' => 169.00,
        'sku' => 3124,
        'description' => "A gentle cleanser that helps to brighten the skin and improve its texture.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/PONDS FACIAL WASH (3).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/PONDS FACIAL WASH (2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/PONDS FACIAL WASH.png"
        ])
    ],
    [
        'name' => 'Nivea Sun Protect & Moisture Lotion SPF 50',
        'label' => 'Sunscreen',
        'price' => 554.00,
        'sku' => 1312,
        'description' => "Offers high SPF protection while keeping the skin moisturized. It is a great option for those who need both sun protection and hydration..",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/NIVEA SUNSCREEN (2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/NIVEA SUNSCREEN (3).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/NIVEA SUNSCREEN.png"
        ])
    ],
    [
        'name' => 'Luxe Organix Aqua Daily Sunscreen SPF 50',
        'label' => 'Sunscreen',
        'price' => 349.00,
        'sku' => 1224,
        'description' => "Offers high SPF protection while keeping the skin moisturized. It is a great option for those who need both sun protection and hydration..",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/LUXE SUNSCREEN (2).png"
        ])
    ],
];

// Insert each product
foreach ($products as $product) {
    $description = $conn->real_escape_string($product['description']);
    $sql_insert = "INSERT INTO `personal care` (name, label, price, sku, description, store, images)
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
