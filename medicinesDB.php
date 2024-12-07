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
$sql_create_table = "CREATE TABLE IF NOT EXISTS `Prescription Medicines` (
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
        'name' => 'Bactiv',
        'label' => 'Anti Bacterial',
        'price' => 700.50,
        'sku' => 5051,
        'description' => "An antibiotic medication commonly used to treat bacterial infections.",
        'store' => 'Watsons',
        'images' => json_encode([
            "assets/ProductPics/PRESCRIPTION MEDICINES/Rx_ Bactiv 625mg Tablet.png",
            "assets/ProductPics/PRESCRIPTION MEDICINES/Rx_ Bactiv 625mg Tablet (3).png",
            "assets/ProductPics/PRESCRIPTION MEDICINES/Rx_ Bactiv 625mg Tablet (2).png"
        ])
    ],
    
    [
        'name' => 'Cybelle',
        'label' => 'Contraceptive pill',
        'price' => 800.50,
        'sku' => 5052,
        'description' => "It is used to prevent pregnancy, regulate menstrual cycles, and sometimes manage conditions like acne or heavy periods.",
        'store' => 'Watsons',
        'images' => json_encode([
            "assets/ProductPics/PRESCRIPTION MEDICINES/Rx_ Cybelle Pill 2mg _ 35mcg Tablet (2).png",
            "assets/ProductPics/PRESCRIPTION MEDICINES/Rx_ Cybelle Pill 2mg _ 35mcg Tablet (3).png",
            "assets/ProductPics/PRESCRIPTION MEDICINES/Rx_ Cybelle Pill 2mg _ 35mcg Tablet.png"
        ])
    ],
    
    [
        'name' => 'Escivex',
        'label' => 'Anti-Depressant',
        'price' => 850.50,
        'sku' => 5053,
        'description' => "Medication primarily used to treat anxiety, depression, and certain mood disorders.",
        'store' => 'Watsons',
        'images' => json_encode([
            "assets/ProductPics/PRESCRIPTION MEDICINES/Rx_ Escivex 10mg Tablet (2).png",
            "assets/ProductPics/PRESCRIPTION MEDICINES/Rx_ Escivex 10mg Tablet (3).png",
            "assets/ProductPics/PRESCRIPTION MEDICINES/Rx_ Escivex 10mg Tablet.png"
        ])
    ],
    
    [
        'name' => 'Fixcom',
        'label' => 'Epilepsy Medication',
        'price' => 600.50,
        'sku' => 5054,
        'description' => " It is used to treat epilepsy and certain types of seizures, as well as to manage bipolar disorder.",
        'store' => 'Watsons',
        'images' => json_encode([
            "assets/ProductPics/PRESCRIPTION MEDICINES/Rx_ Fixcom 2 150 mg _ 75 mg mg Tablet (2).png",
            "assets/ProductPics/PRESCRIPTION MEDICINES/Rx_ Fixcom 2 150 mg _ 75 mg mg Tablet (3).png",
            "assets/ProductPics/PRESCRIPTION MEDICINES/Rx_ Fixcom 2 150 mg _ 75 mg mg Tablet.png"
        ])
    ],
    
    [
        'name' => 'Janumet',
        'label' => 'Diabetes Medication',
        'price' => 1000.50,
        'sku' => 5055,
        'description' => "Medication used to manage type 2 diabetes.",
        'store' => 'Watsons',
        'images' => json_encode([
            "assets/ProductPics/PRESCRIPTION MEDICINES/Rx_ Janumet 50mg _ 1 g Tablet (2).png",
            "assets/ProductPics/PRESCRIPTION MEDICINES/Rx_ Janumet 50mg _ 1 g Tablet (3).png",
            "assets/ProductPics/PRESCRIPTION MEDICINES/Rx_ Janumet 50mg _ 1 g Tablet.png"
        ])
    ],
    
    [
        'name' => 'Jardiace Duo',
        'label' => 'Diabetes Medication',
        'price' => 1050.50,
        'sku' => 5056,
        'description' => "Medication used to manage type 2 diabetes.",
        'store' => 'Watsons',
        'images' => json_encode([
            "assets/ProductPics/PRESCRIPTION MEDICINES/Rx_ Jardiance Duo 12.5mg _ 500mg Tablet (3).png",
            "assets/ProductPics/PRESCRIPTION MEDICINES/Rx_ Jardiance Duo 12.5mg _ 500mg Tablet (2).png",
            "assets/ProductPics/PRESCRIPTION MEDICINES/Rx_ Jardiance Duo 12.5mg _ 500mg Tablet.png"
        ])
    ],
    
    [
        'name' => 'Meliane',
        'label' => 'Anti Pregnancy',
        'price' => 500.50,
        'sku' => 5057,
        'description' => "It is used to prevent pregnancy, regulate menstrual cycles.",
        'store' => 'Watsons',
        'images' => json_encode([
            "assets/ProductPics/PRESCRIPTION MEDICINES/Rx_ Meliane 75mcg _ 20mcg Tablet (2).png",
            "assets/ProductPics/PRESCRIPTION MEDICINES/Rx_ Meliane 75mcg _ 20mcg Tablet (3).png",
            "assets/ProductPics/PRESCRIPTION MEDICINES/Rx_ Meliane 75mcg _ 20mcg Tablet.png"
        ])
    ],
    
    [
        'name' => 'Mucosta',
        'label' => 'Stomach Lining',
        'price' => 750.50,
        'sku' => 5058,
        'description' => "Medication used to treat gastric conditions, such as gastritis or gastric ulcers.",
        'store' => 'Watsons',
        'images' => json_encode([
            "assets/ProductPics/PRESCRIPTION MEDICINES/Rx_ Mucosta 100mg Tablet (2).png",
            "assets/ProductPics/PRESCRIPTION MEDICINES/Rx_ Mucosta 100mg Tablet (3).png",
            "assets/ProductPics/PRESCRIPTION MEDICINES/Rx_ Mucosta 100mg Tablet.png"
        ])
    ],
    
    [
        'name' => 'Nebilet',
        'label' => 'Blood Pressure Medication',
        'price' => 550.50,
        'sku' => 5059,
        'description' => "Medication that contains nebivolol, a beta-blocker used to treat high blood pressure (hypertension) and heart-related conditions.",
        'store' => 'Watsons',
        'images' => json_encode([
            "assets/ProductPics/PRESCRIPTION MEDICINES/Rx_ Nebilet 5mg Tablet_ Piozone 15mg Tablet (2).png",
            "assets/ProductPics/PRESCRIPTION MEDICINES/Rx_ Nebilet 5mg Tablet_ Piozone 15mg Tablet (3).png",
            "assets/ProductPics/PRESCRIPTION MEDICINES/Rx_ Nebilet 5mg Tablet_ Piozone 15mg Tablet.png"
        ])
    ],
    
    [
        'name' => 'Piozone',
        'label' => 'Diabetes Medication',
        'price' => 1150.50,
        'sku' => 5060,
        'description' => "Medication used to manage type 2 diabetes.",
        'store' => 'Watsons',
        'images' => json_encode([
            "assets/ProductPics/PRESCRIPTION MEDICINES/Rx_ Piozone 15mg Tablet (3).png",
            "assets/ProductPics/PRESCRIPTION MEDICINES/Rx_ Piozone 15mg Tablet.png",
            "assets/ProductPics/PRESCRIPTION MEDICINES/Rx_ Piozone 15mg Tablet (2).png"
        ])
    ],
    
    [
        'name' => 'Piozone',
        'label' => 'Anti Depressant',
        'price' => 150.50,
        'sku' => 5061,
        'description' => "Is used to treat depression, anxiety, and other mood disorders, while promethazine helps manage symptoms like allergies or motion sickness.",
        'store' => 'Watsons',
        'images' => json_encode([
            "assets/ProductPics/PRESCRIPTION MEDICINES/Rx_ Prodin Fluoxetine 20mg Capsule (2).png",
            "assets/ProductPics/PRESCRIPTION MEDICINES/Rx_ Prodin Fluoxetine 20mg Capsule (3).png",
            "assets/ProductPics/PRESCRIPTION MEDICINES/Rx_ Prodin Fluoxetine 20mg Capsule.png"
        ])
    ],
    
    [
        'name' => 'Provasc',
        'label' => 'Blood Pressure Medication',
        'price' => 500.50,
        'sku' => 5062,
        'description' => "Medication that contains amlodipine, a beta-blocker used to treat high blood pressure (hypertension) and heart-related conditions.",
        'store' => 'Watsons',
        'images' => json_encode([
            "assets/ProductPics/PRESCRIPTION MEDICINES/Rx_ Provasc 5mg Tablet (2).png",
            "assets/ProductPics/PRESCRIPTION MEDICINES/Rx_ Provasc 5mg Tablet (3).png",
            "assets/ProductPics/PRESCRIPTION MEDICINES/Rx_ Provasc 5mg Tablet.png"
        ])
    ],
    
    [
        'name' => 'Doxycycline',
        'label' => 'Anti Bacterial',
        'price' => 540.50,
        'sku' => 5063,
        'description' => "An antibiotic used to treat a variety of bacterial infections, such as respiratory infections, urinary tract infections, acne, and Lyme disease.",
        'store' => 'Watsons',
        'images' => json_encode([
            "assets/ProductPics/PRESCRIPTION MEDICINES/Rx_ RiteMed Doxycycline 100mg Capsule.png",
            "assets/ProductPics/PRESCRIPTION MEDICINES/Rx_ RiteMed Doxycycline 100mg Capsule (3).png",
            "assets/ProductPics/PRESCRIPTION MEDICINES/Rx_ RiteMed Doxycycline 100mg Capsule (2).png"
        ])
    ],
    
    [
        'name' => 'Slinda',
        'label' => 'Oral Contraceptive',
        'price' => 440.50,
        'sku' => 5064,
        'description' => "It is used to prevent pregnancy and may also help regulate menstrual cycles.",
        'store' => 'Watsons',
        'images' => json_encode([
            "assets/ProductPics/PRESCRIPTION MEDICINES/Rx_ Slinda 4mg Film-coated Tablet 28x1 (2).png",
            "assets/ProductPics/PRESCRIPTION MEDICINES/Rx_ Slinda 4mg Film-coated Tablet 28x1 (3).png",
            "assets/ProductPics/PRESCRIPTION MEDICINES/Rx_ Slinda 4mg Film-coated Tablet 28x1.png"
        ])
    ],
    
    [
        'name' => 'Valpros',
        'label' => 'Anti Epilepsy',
        'price' => 340.50,
        'sku' => 5065,
        'description' => "Used to treat epilepsy (seizure disorders) and bipolar disorder.",
        'store' => 'Watsons',
        'images' => json_encode([
            "assets/ProductPics/PRESCRIPTION MEDICINES/Rx_ Valpros 500mg Tablet (2).png",
            "assets/ProductPics/PRESCRIPTION MEDICINES/Rx_ Valpros 500mg Tablet (3).png",
            "assets/ProductPics/PRESCRIPTION MEDICINES/Rx_ Valpros 500mg Tablet.png"
        ])
    ],
    
    [
        'name' => 'Ural 4',
        'label' => 'UTI treatment',
        'price' => 340.50,
        'sku' => 5065,
        'description' => "UTI Treatment for patients.",
        'store' => 'Watsons',
        'images' => json_encode([
            "assets/ProductPics/PRESCRIPTION MEDICINES/Ural 4 g Granules (2).png",
            "assets/ProductPics/PRESCRIPTION MEDICINES/Ural 4 g Granules (3).png",
            "assets/ProductPics/PRESCRIPTION MEDICINES/Ural 4 g Granules.png"
        ])
    ],  
];

// Insert each product
foreach ($products as $product) {
    $description = $conn->real_escape_string($product['description']);
    $sql_insert = "INSERT INTO `baby care` (name, label, price, sku, description, store, images)
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