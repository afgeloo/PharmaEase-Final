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
$sql_create_table = "CREATE TABLE IF NOT EXISTS `baby care` (
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

// Execute query to create the table
if ($conn->query($sql_create_table) === TRUE) {
    echo "Table 'baby care' created successfully.<br>";
} else {
    echo "Error creating table: " . $conn->error . "<br>";
}

// Array of products to insert
$products = [
    [
        'name' => 'Aveeno Baby',
        'label' => 'Baby Lotion',
        'price' => 814.00,
        'sku' => 706,
        'description' => "This lotion is formulated with natural colloidal oatmeal and rich emollients to soothe and moisturize baby's delicate skin.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/aveeno lotion.png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/aveeno lotion(2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/aveeno lotion(3).png"
        ])
    ],
    [
        'name' => 'Tommee Tippee',
        'label' => 'Baby Bottles and Nipples',
        'price' => 560.00,
        'sku' => 869,
        'description' => "Features an air-vent system to reduce colic and discomfort",
        'store' => 'Mercury Drug',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/baby bottles.png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/baby bottles(2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/baby bottles(3).png"


        ])
    ],
    [
            'name' => 'Philips Avent',
            'label' => 'Baby Bottles and Nipples',
            'price' => 2349.00,
            'sku' => 5234,
            'description' => "Designed to support natural feeding rhythms with a wide neck and air vent to reduce colic.",
            'store' => 'Watsons',
            'images' => json_encode([
                "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/baby bottles(6).png",
                "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/baby bottles(4).png",
                "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/baby bottles(5).png"

            ])
        ],
        [
            'name' => 'Philips Avent Pacifier',
            'label' => 'Baby Bottles and Nipples',
            'price' => 120.00,
            'sku' => 3417,
            'description' => "Pacifiers are designed to support natural oral development with a symmetrical, collapsible nipple.",
            'store' => 'Mercury Drug',
            'images' => json_encode([
                "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/pacifier.png",
                "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/pacifier (2).png",
                "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/pacifier (3).png"
            ])

            ],
            [
                'name' => 'Aveeno Baby',
                'label' => 'Baby Lotion',
                'price' => 814.00,
                'sku' => 706,
                'description' => "This lotion is formulated with natural colloidal oatmeal and rich emollients to soothe and moisturize baby's delicate skin.",
                'store' => 'Watsons',
                'images' => json_encode([
                    "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/aveeno lotion.png",
                    "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/aveeno lotion(2).png",
                    "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/aveeno lotion(3).png"
                ])
            ],
            [
                'name' => 'Tommee Tippee',
                'label' => 'Baby Bottles and Nipples',
                'price' => 560.00,
                'sku' => 869,
                'description' => "Features an air-vent system to reduce colic and discomfort",
                'store' => 'Mercury Drug',
                'images' => json_encode([
                    "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/baby bottles.png",
                    "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/baby bottles(2).png",
                    "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/baby bottles(3).png"
        
        
                ])
            ],
            [
                'name' => 'Enfamil',
                'label' => 'Formula Milk',
                'price' => 1250.00,
                'sku' => 429,
                'description' => "Enfamil is a milk-based infant formula designed for babies from birth to 12 months. It is fortified with iron and includes DHA, an omega-3 fatty acid, to support brain and eye development.",
                'store' => 'Mercury Drug',
                'images' => json_encode([
                    "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/enfamil milk formula.png",
                    "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/enfamil milk formula (2).png",
                    "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/enfamil milk formula (3).png"
        
        
                ])
            ],
            [
                'name' => 'NAN',
                'label' => 'Formula Milk',
                'price' => 2171.00,
                'sku' => 657,
                'description' => "It is designed to provide complete nutrition for infants from birth to 12 months. NAN formulas are enriched with essential nutrients, including DHA and ARA, to support brain and eye development.",
                'store' => 'Mercury Drug',
                'images' => json_encode([
                    "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/nan milk formula.png",
                    "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/nan milk formula (2).png",
                    "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/nan milk formula (3).png"
        
        
                ])
            ],
            [
                'name' => 'BONNA',
                'label' => 'Formula Milk',
                'price' => 1157.00,
                'sku' => 877,
                'description' => "Bonna is an infant formula specifically formulated for babies from 0 to 6 months. It aims to support the nutritional needs of infants during this critical period.",
                'store' => 'Mercury Drug',
                'images' => json_encode([
                    "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/bonna milk formula.png",
                    "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/bonna milk formula (2).png",
                    "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/bonna milk formula (3).png"
                ])
                ],

    [
    'name' => 'SIMILAC',
    'label' => 'Formula Milk',
    'price' => 1720.00,
    'sku' => 234,
    'description' => "Similac is a popular brand of infant formula that offers a range of products for different stages of a baby's development. Similac formulas are enriched with DHA, ARA, and other nutrients to support brain and eye development.",
    'store' => 'Mercury Drug',
    'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/similac milk formula.png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/similac milk formula (2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/similac milk formula (3).png"
        ])
        ],

        [
        'name' => 'Johnsons Baby', 
        'label' => 'Baby Shampoo and Body Wash',
        'price' => 370.00,
        'sku' => 256,
        'description' => "Gentle on baby's eyes. Moisturizes and protects baby's skin.",
        'store' => 'Watsons',
        'images' => json_encode([
        "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/johnson's shampoo.png",
        "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/johnson's shampoo (2).png",
        "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/johnson's shampoo (3).png"
          ])
        ],

        [
        'name' => 'Cetaphil Shampoo', 
        'label' => 'Baby Shampoo and Body Wash',
        'price' => 449.00,
        'sku' => 2934,
        'description' => "Gentle cleansing with organic calendula.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/cetaphil shampoo.png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/cetaphil shampoo (2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/cetaphil shampoo (3).png"
            ])
        ],

        [
        'name' => 'Mustela Shampoo',
        'label' => 'Baby Shampoo and Body Wash',
        'price' => 380.00,
        'sku' => 2335,
        'description' => "Fun and gentle for bath time",
        'store' => 'Mercury Drug',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/mustela shampoo.png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/mustela shampoo (2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/mustela shampoo (3).png"
                ])
        ],

        [
        'name' => 'Thermometer',
        'label' => 'Health and Safety',
        'price' => 69.00,
        'sku' => 1754,
        'description' => "Measures body temperature to help detect fever and monitor a baby's health.",
        'store' => 'Mercury Drug',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/thermometer.png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/thermometer (2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/thermometer (3).png"
            ])
        ],
        [
        'name' => 'Nasal Aspirator',
        'label' => 'Health and Safety',
        'price' => 359.00,
        'sku' => 1754,
        'description' => "Helps clear a baby's nasal passages by removing mucus, making it easier for them to breathe, especially during colds or allergies.",
        'store' => 'Mercury Drug',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/nasal aspirator.png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/nasal aspirator (2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/nasal aspirator (3).png"
            ])
        ],

        [
        'name' => 'Baby Nail Clippers',
        'label' => 'Health and Safety',
        'price' => 118.00,
        'sku' => 1754,
        'description' => "Trim a baby's nails to prevent them from scratching themselves.",
        'store' => 'Mercury Drug',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/nasal aspirator.png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/nasal aspirator (2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/nasal aspirator (3).png"
            ])
        ],

        [
        'name' => 'Aveeno Baby',
        'label' => 'Baby Lotion',
        'price' => 814.00,
        'sku' => 2346,
        'description' => "This lotion is formulated with natural colloidal oatmeal and rich emollients to soothe and moisturize baby's delicate skin.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/aveeno lotion.png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/aveeno lotion(2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/aveeno lotion(3).png"
            ])
        ],
        [
            'name' => 'Johnsons Baby Lotion',
            'label' => 'Baby Lotion',
            'price' => 418.00,
            'sku' => 3283,
            'description' => "This body lotion is specially formulated for the delicate skin of babies and children. It's made with Avocado Perseose® and sunflower oil to provide immediate and long-lasting hydration.",
            'store' => 'Mercury Drug',
            'images' => json_encode([
                "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/johnson's lotion.png",
                "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/johnson's lotion(2).png",
                "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/johnson's lotion(3).png"
                ])
            ],

            [
            'name' => 'Mustela',
            'label' => 'Baby Lotion',
            'price' => 593.00,
            'sku' => 1756,
            'description' => "This body lotion is specially formulated for the delicate skin of babies and children. It's made with Avocado Perseose and sunflower oil to provide immediate and long-lasting hydration.",
            'store' => 'Watsons',
            'images' => json_encode([
                "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/mustela lotion.png",
                "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/mustela lotion(2).png",
                "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/mustela lotion(3).png"
                    ])
                ],

                [
            'name' => 'Johnsons Baby',
            'label' => 'Baby Powder',
            'price' => 45.00,
            'sku' => 3422,
            'description' => "Johnson's Baby Powder is designed to keep baby's skin comfortable, dry, and feeling soft.",
            'store' => 'Watsons',
            'images' => json_encode([
                "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/johnson's baby powder.png",
                "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/johnson's baby powder (2).png",
                "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/johnson's baby powder (3).png"
                    ])
                ],

                [
            'name' => 'Tender Care',
            'label' => 'Baby Powder',
            'price' => 45.00,
            'sku' => 3422,
            'description' => "is designed to keep your baby's skin clean, fresh, and rash-free.",
            'store' => 'Watsons',
            'images' => json_encode([
                "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/tender care baby powder.png",
                "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/tender care baby powder (2).png",
                "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/tender care baby powder (3).png"
                    ])
                ],

                [
            'name' => 'Mamypoko Diaper',
            'label' => 'Diaper',
            'price' => 377.00,
            'sku' => 1742,
            'description' => "Designed to provide comfort and protection for your baby. They are made with high-quality materials to keep your baby's skin healthy and prevent leakages.",
            'store' => 'Mercury Drug',
            'images' => json_encode([
                "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/mamypoko diaper.png",
                "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/mamypoko diaper (2).png",
                "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/mamypoko diaper (3).png"
                        ])
                    ],
       
        [
            'name' => 'Huggies',
            'label' => 'Diaper',
            'price' => 283.00,
            'sku' => 1875,
            'description' => "These diapers are designed to provide outstanding softness and gentle protection. They are up to 100% leakproof, even from blowouts.",
            'store' => 'Mercury Drug',
            'images' => json_encode([
                "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/huggies diaper.png",
                "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/huggies diaper (2).png",
                "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/huggies diaper (3).png"
        ])
        ],
                    
        [
            'name' => 'Pampers',
            'label' => 'Diaper',
            'price' => 706.00,
            'sku' => 3232,
            'description' => "Is a well-known brand of disposable diapers that offers a range of products for babies of all ages.",
            'store' => 'Mercury Drug',
            'images' => json_encode([
                "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/pampers diaper.png",
                "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/pampers diaper (2).png",
                "/PharmaEase/PharmaEase-Final/assets/ProductPics/BABY CARES/pampers diaper (3).png"
        ])
        ],

];

// Insert each product
foreach ($products as $product) {
    $description = $conn->real_escape_string($product['description']);
    $sql_insert = "INSERT INTO `baby care` (name, label, price, sku, description, store, images)
        VALUES (
            '{$product['name']}',
            '{$product['label']}',
            {$product['price']},
            {$product['sku']},
            '$description',
            '{$product['store']}',
            '{$product['images']}'
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
