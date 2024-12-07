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
$sql_create_table = "CREATE TABLE IF NOT EXISTS `over the counter` (
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
        'name' => 'Alciflora',
        'label' => 'Anti-Diarrhea ',
        'price' => 44.50,
        'sku' => 5001,
        'description' => "Helps in the recovery of the intestinal microbial flora imbalance of diverse origin.",
        'store' => 'Watsons',
        'images' => json_encode([
            "assets\ProductPics\OVER THE COUNTER\alcifa.png"
        ])
    ],
    [
        'name' => 'Allerta',
        'label' => ' Antihistamine & Anti Allergies',
        'price' => 46.50,
        'sku' => 5002,
        'description' => "Long lasting up to 24 hours allergy relief",
        'store' => 'Watsons',
        'images' => json_encode([
            "assets\ProductPics\OVER THE COUNTER\allerta (2).png",
            "assets\ProductPics\OVER THE COUNTER\allerta.png"
        ])
    ],
    [
        'name' => 'Bactidol',
        'label' => 'Cough & Cold Preparation',
        'price' => 187.00        ,
        'sku' => 5003,
        'description' => "For symptomatic relief of productive cough",
        'store' => 'Watsons',
        'images' => json_encode([
            "assets\ProductPics\OVER THE COUNTER\bactidol (2).png",
            "assets\ProductPics\OVER THE COUNTER\bactidol (3).png",
            "assets\ProductPics\OVER THE COUNTER\bactidol.png"
        ])
    ],
    [
        'name' => 'Biogesic',
        'label' => 'Cough & Cold Preparation',
        'price' => 85.00,
        'sku' => 5004,
        'description' => "Used and trusted for headache and fever relief.",
        'store' => 'Watsons',
        'images' => json_encode([
            "assets\ProductPics\OVER THE COUNTER\biogesic (2).png",
            "assets\ProductPics\OVER THE COUNTER\biogesic (3).png",
            "assets\ProductPics\OVER THE COUNTER\biogesic.png"
        ])
    ],
    [
        'name' => 'Bonamine Candy',
        'label' => 'Antiemetics',
        'price' => 70.00,
        'sku' => 5005,
        'description' => "It is an eco-friendly alternative to tampons and pads, offering longer wear time and less environmental waste.",
        'store' => 'Watsons',
        'images' => json_encode([
            "assets\ProductPics\OVER THE COUNTER\Bonamine candy tablet (2).png",
            "assets\ProductPics\OVER THE COUNTER\Bonamine candy tablet (3).png",
            "assets\ProductPics\OVER THE COUNTER\Bonamine candy tablet.png"
        ])
    ],
    [
        'name' => 'Claritin',
        'label' => 'Antihistamine',
        'price' => 371.50,
        'sku' => 5006,
        'description' => "Anti Allergy Drug.",
        'store' => 'Watsons',
        'images' => json_encode([
            "assets\ProductPics\OVER THE COUNTER\claritin (2).png",
            "assets\ProductPics\OVER THE COUNTER\claritin.png"
        ])
    ],
    [
        'name' => 'Diatabs',
        'label' => 'Feminine Wash',
        'price' => 150.00,
        'sku' => 5007,
        'description' => "helps absorb toxins and fluids in the digestive tract, reducing diarrhea and promoting firmer stools.",
        'store' => 'Watsons',
        'images' => json_encode([
            "assets\ProductPics\OVER THE COUNTER\diatabs (2).png",
            "assets\ProductPics\OVER THE COUNTER\diatabs.png"
        ])
    ],
    [
        'name' => 'Erceflora Gut Defense',
        'label' => 'Anti-Diarrhea',
        'price' => 200.25,
        'sku' => 5008,
        'description' => "Boost your gut health with Erceflora Gut Defense Suspension.",
        'store' => 'Watsons',
        'images' => json_encode([
            "assets\ProductPics\OVER THE COUNTER\Erceflora Gut Defense Suspension (2).png",
            "assets\ProductPics\OVER THE COUNTER\Erceflora Gut Defense Suspension (3).png",
            "assets\ProductPics\OVER THE COUNTER\Erceflora Gut Defense Suspension.png"
        ])
    ],
    [
        'name' => 'Flanax',
        'label' => 'Cough',
        'price' => 345.00,
        'sku' => 5009,
        'description' => "Relief of moderate to severe pain with or without inflammation.",
        'store' => 'Watsons',
        'images' => json_encode([
            "assets\ProductPics\OVER THE COUNTER\flanax (2).png",
            "assets\ProductPics\OVER THE COUNTER\flanax.png",
        ])
    ],
    [
        'name' => 'Kiddilets',
        'label' => 'Paracetamol',
        'price' => 63.00,
        'sku' => 5010,
        'description' => "child-friendly, chewable tablet form of paracetamol, used to relieve pain and reduce fever in children.",
        'store' => 'Watsons',
        'images' => json_encode([
            "assets\ProductPics\OVER THE COUNTER\flanax (4).png",
            "assets\ProductPics\OVER THE COUNTER\flanax (3).png",
            "assets\ProductPics\OVER THE COUNTER\flanax (5).png",
        ])
    ],
    [
        'name' => 'Omeprazole Risek',
        'label' => 'Antiulcerants',
        'price' => 801.00,
        'sku' => 5011,
        'description' => "Medications that treat and prevent stomach and duodenal ulcers by reducing acid production or protecting the stomach lining.",
        'store' => 'Watsons',
        'images' => json_encode([
            "assets\ProductPics\OVER THE COUNTER\omeprasoltablet (2).png",
            "assets\ProductPics\OVER THE COUNTER\omeprasoltablet.png",
        ])
    ],
    [
        'name' => 'Pantomide',
        'label' => 'Anti Acid',
        'price' => 40.75,
        'sku' => 5012,
        'description' => "Used for gastrointestinal issues, such as irritable bowel syndrome (IBS), by regulating intestinal motility and relieving symptoms like abdominal pain and discomfort.",
        'store' => 'Watsons',
        'images' => json_encode([
            "assets\ProductPics\OVER THE COUNTER\pantomide (2).png",
            "assets\ProductPics\OVER THE COUNTER\pantomide.png",
        ])
    ],
    [
        'name' => 'Restime',
        'label' => 'Antihistamine ',
        'price' => 92.50        ,
        'sku' => 5013,
        'description' => "Medication used to relieve symptoms of allergies, such as runny nose, sneezing, itching, and watery eyes.",
        'store' => 'Watsons',
        'images' => json_encode([
            "assets\ProductPics\OVER THE COUNTER\resttime tablet (2).png",
            "assets\ProductPics\OVER THE COUNTER\resttime tablet (3).png",
            "assets\ProductPics\OVER THE COUNTER\resttime tablet.png",
        ])
    ],
    [
        'name' => 'Sinutab',
        'label' => 'Headache',
        'price' => 100.25,
        'sku' => 5014,
        'description' => "Used to relieve symptoms of sinus congestion, pressure, headache, and nasal stuffiness, often associated with colds, sinusitis, or allergies.",
        'store' => 'Watsons',
        'images' => json_encode([
            "assets\ProductPics\OVER THE COUNTER\sinutab (2).png",
            "assets\ProductPics\OVER THE COUNTER\sinutab (3).png",
            "assets\ProductPics\OVER THE COUNTER\sinutab.png",
        ])
    ],
    [
        'name' => 'Solux',
        'label' => 'Cough Relief',
        'price' => 54.25,
        'sku' => 5015,
        'description' => "Reduce the cough reflex, and soothing agents like honey or menthol.",
        'store' => 'Watsons',
        'images' => json_encode([
            "assets\ProductPics\OVER THE COUNTER\solux (2).png",
            "assets\ProductPics\OVER THE COUNTER\solux (3).png",
            "assets\ProductPics\OVER THE COUNTER\solux.png",
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