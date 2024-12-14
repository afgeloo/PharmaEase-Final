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
$sql_create_table = "CREATE TABLE IF NOT EXISTS `products` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    category VARCHAR(255) NOT NULL,
    label VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    stock INT NOT NULL,
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

// Array of products to insert
$products = [
    [
        'name' => 'Betadine Oral Gargle',
        'category' => 'personal care',
        'label' => 'Mouthwash',
        'price' => 232.00,
        'stock' => 1643,
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
        'category' => 'personal care',
        'label' => 'Mouthwash',
        'price' => 132.00,
        'stock' => 1532,
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
        'category' => 'personal care',
        'label' => 'Mouthwash',
        'price' => 147.00,
        'stock' => 1523,
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
        'category' => 'personal care',
        'label' => 'Mouthwash',
        'price' => 322.00,
        'stock' => 1635,
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
        'category' => 'personal care',
        'label' => 'Soap',
        'price' => 37.00,
        'stock' => 1652,
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
        'category' => 'personal care',
        'label' => 'Soap',
        'price' => 45.00,
        'stock' => 1542,
        'description' => "Known for its hypoallergenic properties, Perla Pure Bath Soap is gentle on the skin and suitable for daily use.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/PERLA SOAP.png"
        ])
    ],
    [
        'name' => 'Oxecure',
        'category' => 'personal care',
        'label' => 'Soap',
        'price' => 69.00,
        'stock' => 1542,
        'description' => "Sulfur Soap is recommended for its antibacterial properties and effectiveness in treating acne.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/OXECURE SOAP (3).png",
        ])
    ],
    [
        'name' => 'Silka',
        'category' => 'personal care',
        'label' => 'Soap',
        'price' => 37.00,
        'stock' => 1452,
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
        'category' => 'personal care',
        'label' => 'Conditioner',
        'price' => 521.00,
        'stock' => 1423,
        'description' => "Infused with shea butter oil and vitamin H to keep hair looking straight and silky.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/TRESEMME CONDITIONER.png",
        ])
    ],
    [
        'name' => 'Dove Conditioner',
        'category' => 'personal care',
        'label' => 'Conditioner',
        'price' => 286.00,
        'stock' => 1423,
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
        'category' => 'personal care',
        'label' => 'Conditioner',
        'price' => 195.00,
        'stock' => 1323,
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
        'category' => 'personal care',
        'label' => 'Conditioner',
        'price' => 345.00,
        'stock' => 1233,
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
        'category' => 'personal care',
        'label' => 'Toothpaste',
        'price' => 258.00,
        'stock' => 2134,
        'description' => "This toothpaste helps to whiten teeth, fight cavities, and protect gums from bacterial infections.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/COLGATE TOOTHPASTE.png",
        ])
    ],
    [
        'name' => 'Closeup Red Hot Gel Toothpaste',
        'category' => 'personal care',
        'label' => 'Toothpaste',
        'price' => 186.00,
        'stock' => 1243,
        'description' => "Known for its antibacterial properties, this gel toothpaste helps to fight bad breath and maintain oral health.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/CLOSEUP TOOTHPASTE.png",
        ])
    ],
    [
        'name' => 'Sensodyne Pronamel',
        'category' => 'personal care',
        'label' => 'Toothpaste',
        'price' => 345.00,
        'stock' => 1523,
        'description' => "Specially formulated to protect enamel and provide long-lasting sensitivity relief.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/SENSODYNE TOOTHPASTE.png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/SENSODYNE TOOTHPASTE (2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/PERSONAL CARE/SENSODYNE TOOTHPASTE (3).png"
        ])
    ],
       // OVER THE COUNTER
       [
        'name' => 'Alciflora',
        'category' => 'over the counter',
        'label' => 'Anti-Diarrhea',
        'price' => 44.50,
        'stock' => 5001,
        'description' => "Helps in the recovery of the intestinal microbial flora imbalance of diverse origin.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/OVER THE COUNTER/alcifa.png"
        ])
    ],
    [
        'name' => 'Allerta',
        'category' => 'over the counter',
        'label' => 'Antihistamine & Anti Allergies',
        'price' => 46.50,
        'stock' => 5002,
        'description' => "Long lasting up to 24 hours allergy relief",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/OVER THE COUNTER/allerta (2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/OVER THE COUNTER/allerta.png"
        ])
    ],
    [
        'name' => 'Bactidol',
        'category' => 'over the counter',
        'label' => 'Cough & Cold Preparation',
        'price' => 187.00,
        'stock' => 5003,
        'description' => "For symptomatic relief of productive cough",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/OVER THE COUNTER/bactidol (2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/OVER THE COUNTER/bactidol (3).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/OVER THE COUNTER/bactidol.png"
        ])
    ],
    [
        'name' => 'Biogesic',
        'category' => 'over the counter',
        'label' => 'Cough & Cold Preparation',
        'price' => 85.00,
        'stock' => 5004,
        'description' => "Used and trusted for headache and fever relief.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/OVER THE COUNTER/biogesic (2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/OVER THE COUNTER/biogesic (3).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/OVER THE COUNTER/biogesic.png"
        ])
    ],
    [
        'name' => 'Bonamine Candy',
        'category' => 'over the counter',
        'label' => 'Antiemetics',
        'price' => 70.00,
        'stock' => 5005,
        'description' => "It is an eco-friendly alternative to tampons and pads, offering longer wear time and less environmental waste.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/OVER THE COUNTER/Bonamine candy tablet (2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/OVER THE COUNTER/Bonamine candy tablet (3).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/OVER THE COUNTER/Bonamine candy tablet.png"
        ])
    ],
    [
        'name' => 'Claritin',
        'category' => 'over the counter',
        'label' => 'Antihistamine',
        'price' => 371.50,
        'stock' => 5006,
        'description' => "Anti Allergy Drug.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/OVER THE COUNTER/claritin (2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/OVER THE COUNTER/claritin.png"
        ])
    ],
    [
        'name' => 'Diatabs',
        'category' => 'over the counter',
        'label' => 'Feminine Wash',
        'price' => 150.00,
        'stock' => 5007,
        'description' => "Helps absorb toxins and fluids in the digestive tract, reducing diarrhea and promoting firmer stools.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/OVER THE COUNTER/diatabs (2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/OVER THE COUNTER/diatabs.png"
        ])
    ],
    [
        'name' => 'Erceflora Gut Defense',
        'category' => 'over the counter',
        'label' => 'Anti-Diarrhea',
        'price' => 200.25,
        'stock' => 5008,
        'description' => "Boost your gut health with Erceflora Gut Defense Suspension.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/OVER THE COUNTER/Erceflora Gut Defense Suspension (2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/OVER THE COUNTER/Erceflora Gut Defense Suspension (3).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/OVER THE COUNTER/Erceflora Gut Defense Suspension.png"
        ])
    ],
    [
        'name' => 'Flanax',
        'category' => 'over the counter',
        'label' => 'Cough',
        'price' => 345.00,
        'stock' => 5009,
        'description' => "Relief of moderate to severe pain with or without inflammation.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/OVER THE COUNTER/flanax (2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/OVER THE COUNTER/flanax.png",
        ])
    ],
    [
        'name' => 'Kiddilets',
        'category' => 'over the counter',
        'label' => 'Paracetamol',
        'price' => 63.00,
        'stock' => 5010,
        'description' => "Child-friendly, chewable tablet form of paracetamol, used to relieve pain and reduce fever in children.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/OVER THE COUNTER/flanax (4).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/OVER THE COUNTER/flanax (3).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/OVER THE COUNTER/flanax (5).png",
        ])
    ],
    [
        'name' => 'Omeprazole Risek',
        'category' => 'over the counter',
        'label' => 'Antiulcerants',
        'price' => 801.00,
        'stock' => 5011,
        'description' => "Medications that treat and prevent stomach and duodenal ulcers by reducing acid production or protecting the stomach lining.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/OVER THE COUNTER/omeprasoltablet (2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/OVER THE COUNTER/omeprasoltablet.png",
        ])
    ],
    [
        'name' => 'Pantomide',
        'category' => 'over the counter',
        'label' => 'Anti Acid',
        'price' => 40.75,
        'stock' => 5012,
        'description' => "Used for gastrointestinal issues, such as irritable bowel syndrome (IBS), by regulating intestinal motility and relieving symptoms like abdominal pain and discomfort.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/OVER THE COUNTER/pantomide (2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/OVER THE COUNTER/pantomide.png",
        ])
    ],
    [
        'name' => 'Restime',
        'category' => 'over the counter',
        'label' => 'Antihistamine',
        'price' => 92.50,
        'stock' => 5013,
        'description' => "Medication used to relieve symptoms of allergies, such as runny nose, sneezing, itching, and watery eyes.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/OVER THE COUNTER/resttime tablet (2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/OVER THE COUNTER/resttime tablet (3).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/OVER THE COUNTER/resttime tablet.png",
        ])
    ],
    [
        'name' => 'Sinutab',
        'category' => 'over the counter',
        'label' => 'Headache',
        'price' => 100.25,
        'stock' => 5014,
        'description' => "Used to relieve symptoms of sinus congestion, pressure, headache, and nasal stuffiness, often associated with colds, sinusitis, or allergies.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/OVER THE COUNTER/sinutab (2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/OVER THE COUNTER/sinutab (3).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/OVER THE COUNTER/sinutab.png",
        ])
    ],
    [
        'name' => 'Solux',
        'category' => 'over the counter',
        'label' => 'Cough Relief',
        'price' => 54.25,
        'stock' => 5015,
        'description' => "Reduce the cough reflex, and soothing agents like honey or menthol.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/OVER THE COUNTER/solux (2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/OVER THE COUNTER/solux (3).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/OVER THE COUNTER/solux.png",
        ])
    ],
        // PRESCRIPTION MED
        [
            'name' => 'Bactiv',
            'category' => 'Prescription Medicines',
            'label' => 'Anti Bacterial',
            'price' => 700.50,
            'stock' => 5051,
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
            'category' => 'Prescription Medicines',
            'label' => 'Contraceptive pill',
            'price' => 800.50,
            'stock' => 5052,
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
            'category' => 'Prescription Medicines',
            'label' => 'Anti-Depressant',
            'price' => 850.50,
            'stock' => 5053,
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
            'category' => 'Prescription Medicines',
            'label' => 'Epilepsy Medication',
            'price' => 600.50,
            'stock' => 5054,
            'description' => "It is used to treat epilepsy and certain types of seizures, as well as to manage bipolar disorder.",
            'store' => 'Watsons',
            'images' => json_encode([
                "assets/ProductPics/PRESCRIPTION MEDICINES/Rx_ Fixcom 2 150 mg _ 75 mg mg Tablet (2).png",
                "assets/ProductPics/PRESCRIPTION MEDICINES/Rx_ Fixcom 2 150 mg _ 75 mg mg Tablet (3).png",
                "assets/ProductPics/PRESCRIPTION MEDICINES/Rx_ Fixcom 2 150 mg _ 75 mg mg Tablet.png"
            ])
        ],
        
        [
            'name' => 'Janumet',
            'category' => 'Prescription Medicines',
            'label' => 'Diabetes Medication',
            'price' => 1000.50,
            'stock' => 5055,
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
            'category' => 'Prescription Medicines',
            'label' => 'Diabetes Medication',
            'price' => 1050.50,
            'stock' => 5056,
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
            'category' => 'Prescription Medicines',
            'label' => 'Anti Pregnancy',
            'price' => 500.50,
            'stock' => 5057,
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
            'category' => 'Prescription Medicines',
            'label' => 'Stomach Lining',
            'price' => 750.50,
            'stock' => 5058,
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
            'category' => 'Prescription Medicines',
            'label' => 'Blood Pressure Medication',
            'price' => 550.50,
            'stock' => 5059,
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
            'category' => 'Prescription Medicines',
            'label' => 'Diabetes Medication',
            'price' => 1150.50,
            'stock' => 5060,
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
            'category' => 'Prescription Medicines',
            'label' => 'Anti Depressant',
            'price' => 150.50,
            'stock' => 5061,
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
            'category' => 'Prescription Medicines',
            'label' => 'Blood Pressure Medication',
            'price' => 500.50,
            'stock' => 5062,
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
            'category' => 'Prescription Medicines',
            'label' => 'Anti Bacterial',
            'price' => 540.50,
            'stock' => 5063,
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
            'category' => 'Prescription Medicines',
            'label' => 'Oral Contraceptive',
            'price' => 440.50,
            'stock' => 5064,
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
            'category' => 'Prescription Medicines',
            'label' => 'Anti Epilepsy',
            'price' => 340.50,
            'stock' => 5065,
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
            'category' => 'Prescription Medicines',
            'label' => 'UTI treatment',
            'price' => 340.50,
            'stock' => 5066,
            'description' => "UTI Treatment for patients.",
            'store' => 'Watsons',
            'images' => json_encode([
                "assets/ProductPics/PRESCRIPTION MEDICINES/Ural 4 g Granules (2).png",
                "assets/ProductPics/PRESCRIPTION MEDICINES/Ural 4 g Granules (3).png",
                "assets/ProductPics/PRESCRIPTION MEDICINES/Ural 4 g Granules.png"
            ])
        ],
         //MULTI VITAMINS
    [
        [
            'name' => 'Berroca',
            'category' => 'Vitamins',
            'label' => 'Multi Vitamins',
            'price' => 590.50,
            'stock' => 5030,
            'description' => "Berocca supports the release of energy so you can be at your best, whatever daily challenges you're facing.",
            'store' => 'Watsons',
            'images' => json_encode([
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/berroca (2).png",
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/berroca.png"
            ])
        ],
        [
            'name' => 'Calci-Aid',
            'category' => 'Vitamins',
            'label' => 'Multi Vitamins',
            'price' => 546.50,
            'stock' => 5031,
            'description' => "Calcium supplement commonly used to support bone health, help prevent calcium deficiencies, and improve bone density.",
            'store' => 'Watsons',
            'images' => json_encode([
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/calci-aid (2).png",
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/calci-aid.png"
            ])
        ],
        [
            'name' => 'Caltrate',
            'category' => 'Vitamins',
            'label' => 'Multi Vitamins',
            'price' => 200.00,
            'stock' => 5032,
            'description' => "Designed to support bone health, increase bone density, and prevent calcium deficiencies.",
            'store' => 'Watsons',
            'images' => json_encode([
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/calctrate (2).png",
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/calctrate (3).png",
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/calctrate.png"
            ])
        ],
        [
            'name' => 'Cherifer',
            'category' => 'Vitamins',
            'label' => 'Multi Vitamins',
            'price' => 325.00,
            'stock' => 5033,
            'description' => "Vitamin supplement that supports growth, boosts energy, and enhances overall health, particularly for children and adolescents.",
            'store' => 'Watsons',
            'images' => json_encode([
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/cherifer (2).png",
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/cherifer.png",
            ])
        ],
        [
            'name' => 'Conzace',
            'category' => 'Vitamins',
            'label' => 'Multi Vitamins',
            'price' => 430.00,
            'stock' => 5034,
            'description' => "Multivitamin supplement that contains vitamins A, C, and E, along with zinc.",
            'store' => 'Watsons',
            'images' => json_encode([
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/conzace (2).png",
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/conzace.png",
            ])
        ],
        [
            'name' => 'Enat',
            'category' => 'Vitamins',
            'label' => 'Multi Vitamins',
            'price' => 200.50,
            'stock' => 5035,
            'description' => "A supplement containing vitamin E, commonly used for its antioxidant properties to support skin health, prevent oxidative stress, and improve overall cell function.",
            'store' => 'Watsons',
            'images' => json_encode([
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/enat (2).png",
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/enat (3).png",
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/enat.png"
            ])
        ],
        [
            'name' => 'Fern-C',
            'category' => 'Vitamins',
            'label' => 'Multi Vitamins',
            'price' => 450.00,
            'stock' => 5036,
            'description' => "Vitamin C supplement that also contains zinc and other essential nutrients. It is designed to support immune function, enhance skin health, and promote overall well-being with its antioxidant properties.",
            'store' => 'Watsons',
            'images' => json_encode([
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/fern-c gold (2).png",
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/fern-c gold (3).png",
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/fern-c.png"
            ])
        ],
        [
            'name' => 'Ferro-B',
            'category' => 'Vitamins',
            'label' => 'Multi Vitamins',
            'price' => 650.25,
            'stock' => 5037,
            'description' => "An iron supplement commonly used to treat or prevent iron deficiency anemia.",
            'store' => 'Watsons',
            'images' => json_encode([
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/ferro-b.png",
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/ferro-b (3).png",
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/ferro-b (2).png"
            ])
        ],
        [
            'name' => 'Ferron',
            'category' => 'Vitamins',
            'label' => 'Multi Vitamins',
            'price' => 650.00,
            'stock' => 5038,
            'description' => "An iron supplement commonly used to treat or prevent iron deficiency anemia.",
            'store' => 'Watsons',
            'images' => json_encode([
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/ferron.png",
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/ferron (2).png",
            ])
        ],
        [
            'name' => 'Forti-D',
            'category' => 'Vitamins',
            'label' => 'Multi Vitamins',
            'price' => 400.00,
            'stock' => 5039,
            'description' => "A vitamin D supplement designed to support bone health, enhance calcium absorption, and boost immune function.",
            'store' => 'Watsons',
            'images' => json_encode([
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/forti-d (2).png",
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/forti-d.png",
            ])
        ],
        [
            'name' => 'Ferrous',
            'category' => 'Vitamins',
            'label' => 'Multi Vitamins',
            'price' => 801.00,
            'stock' => 5040,
            'description' => "Supplements are used to treat or prevent iron deficiency anemia by increasing iron levels in the body, supporting red blood cell production.",
            'store' => 'Watsons',
            'images' => json_encode([
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/ferrous.png",
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/ferrous (2).png",
            ])
        ],
        [
            'name' => 'GrowBibo',
            'category' => 'Vitamins',
            'label' => 'Multi Vitamins',
            'price' => 400.75,
            'stock' => 5041,
            'description' => "Nutritional supplement, typically marketed for children, designed to support growth and development.",
            'store' => 'Watsons',
            'images' => json_encode([
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/growbibo (2).png",
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/growbibo.png",
            ])
        ],
        [
            'name' => 'Hemarate',
            'category' => 'Vitamins',
            'label' => 'Multi Vitamins',
            'price' => 450.50,
            'stock' => 5042,
            'description' => "Is an iron supplement used to treat or prevent iron deficiency anemia.",
            'store' => 'Watsons',
            'images' => json_encode([
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/hermate.png",
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/hermate (3).png",
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/hermate (2).png",
            ])
        ],
        [
            'name' => 'ImmunPro',
            'category' => 'Vitamins',
            'label' => 'Multi Vitamins',
            'price' => 450.25,
            'stock' => 5043,
            'description' => "A dietary supplement designed to support immune health.",
            'store' => 'Watsons',
            'images' => json_encode([
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/immunpro (3).png",
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/immunpro (4).png",
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/immunpro.png",
            ])
        ],
        [
            'name' => 'Lactezin',
            'category' => 'Vitamins',
            'label' => 'Acne Treatment',
            'price' => 500.25,
            'stock' => 5044,
            'description' => "Supplement commonly used to manage acne.",
            'store' => 'Watsons',
            'images' => json_encode([
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/Lactezin (2).png",
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/Lactezin.png",
            ])
        ],
        [
            'name' => 'Pharex-B',
            'category' => 'Vitamins',
            'label' => 'Multi Vitamins',
            'price' => 540.25,
            'stock' => 5045,
            'description' => "Used to support energy production, improve metabolism, and promote healthy nerve function.",
            'store' => 'Watsons',
            'images' => json_encode([
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/pharexb.png",
            ])
        ],
        [
            'name' => 'Potencee-C',
            'category' => 'Vitamins',
            'label' => 'Multi Vitamins',
            'price' => 550.25,
            'stock' => 5046,
            'description' => "Used to support energy production, improve metabolism, and promote healthy nerve function.",
            'store' => 'Watsons',
            'images' => json_encode([
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/Potencee-c gold (2).png",
            ])
        ],
        [
            'name' => 'Propan',
            'category' => 'Vitamins',
            'label' => 'Multi Vitamins',
            'price' => 550.25,
            'stock' => 5047,
            'description' => "Used to support energy production, improve metabolism, and promote healthy nerve function.",
            'store' => 'Watsons',
            'images' => json_encode([
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/propan (2).png",
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/propan (3).png",
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/propan.png"
            ])
        ]
     ],

     // BABY CARE

     //BABY CARE
     [
        [
            'name' => 'Berroca',
            'category' => 'Vitamins',
            'label' => 'Multi Vitamins',
            'price' => 590.50,
            'stock' => 5030,
            'description' => "Berocca supports the release of energy so you can be at your best, whatever daily challenges you're facing.",
            'store' => 'Watsons',
            'images' => json_encode([
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/berroca (2).png",
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/berroca.png"
            ])
        ],
        [
            'name' => 'Calci-Aid',
            'category' => 'Vitamins',
            'label' => 'Multi Vitamins',
            'price' => 546.50,
            'stock' => 5031,
            'description' => "Calcium supplement commonly used to support bone health, help prevent calcium deficiencies, and improve bone density.",
            'store' => 'Watsons',
            'images' => json_encode([
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/calci-aid (2).png",
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/calci-aid.png"
            ])
        ],
        [
            'name' => 'Caltrate',
            'category' => 'Vitamins',
            'label' => 'Multi Vitamins',
            'price' => 200.00,
            'stock' => 5032,
            'description' => "Designed to support bone health, increase bone density, and prevent calcium deficiencies.",
            'store' => 'Watsons',
            'images' => json_encode([
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/calctrate (2).png",
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/calctrate (3).png",
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/calctrate.png"
            ])
        ],
        [
            'name' => 'Cherifer',
            'category' => 'Vitamins',
            'label' => 'Multi Vitamins',
            'price' => 325.00,
            'stock' => 5033,
            'description' => "Vitamin supplement that supports growth, boosts energy, and enhances overall health, particularly for children and adolescents.",
            'store' => 'Watsons',
            'images' => json_encode([
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/cherifer (2).png",
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/cherifer.png",
            ])
        ],
        [
            'name' => 'Conzace',
            'category' => 'Vitamins',
            'label' => 'Multi Vitamins',
            'price' => 430.00,
            'stock' => 5034,
            'description' => "Multivitamin supplement that contains vitamins A, C, and E, along with zinc.",
            'store' => 'Watsons',
            'images' => json_encode([
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/conzace (2).png",
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/conzace.png",
            ])
        ],
        [
            'name' => 'Enat',
            'category' => 'Vitamins',
            'label' => 'Multi Vitamins',
            'price' => 200.50,
            'stock' => 5035,
            'description' => "A supplement containing vitamin E, commonly used for its antioxidant properties to support skin health, prevent oxidative stress, and improve overall cell function.",
            'store' => 'Watsons',
            'images' => json_encode([
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/enat (2).png",
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/enat (3).png",
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/enat.png"
            ])
        ],
        [
            'name' => 'Fern-C',
            'category' => 'Vitamins',
            'label' => 'Multi Vitamins',
            'price' => 450.00,
            'stock' => 5036,
            'description' => "Vitamin C supplement that also contains zinc and other essential nutrients. It is designed to support immune function, enhance skin health, and promote overall well-being with its antioxidant properties.",
            'store' => 'Watsons',
            'images' => json_encode([
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/fern-c gold (2).png",
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/fern-c gold (3).png",
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/fern-c.png"
            ])
        ],
        [
            'name' => 'Ferro-B',
            'category' => 'Vitamins',
            'label' => 'Multi Vitamins',
            'price' => 650.25,
            'stock' => 5037,
            'description' => "An iron supplement commonly used to treat or prevent iron deficiency anemia.",
            'store' => 'Watsons',
            'images' => json_encode([
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/ferro-b.png",
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/ferro-b (3).png",
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/ferro-b (2).png"
            ])
        ],
        [
            'name' => 'Ferron',
            'category' => 'Vitamins',
            'label' => 'Multi Vitamins',
            'price' => 650.00,
            'stock' => 5038,
            'description' => "An iron supplement commonly used to treat or prevent iron deficiency anemia.",
            'store' => 'Watsons',
            'images' => json_encode([
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/ferron.png",
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/ferron (2).png",
            ])
        ],
        [
            'name' => 'Forti-D',
            'category' => 'Vitamins',
            'label' => 'Multi Vitamins',
            'price' => 400.00,
            'stock' => 5039,
            'description' => "A vitamin D supplement designed to support bone health, enhance calcium absorption, and boost immune function.",
            'store' => 'Watsons',
            'images' => json_encode([
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/forti-d (2).png",
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/forti-d.png",
            ])
        ],
        [
            'name' => 'Ferrous',
            'category' => 'Vitamins',
            'label' => 'Multi Vitamins',
            'price' => 801.00,
            'stock' => 5040,
            'description' => "Supplements are used to treat or prevent iron deficiency anemia by increasing iron levels in the body, supporting red blood cell production.",
            'store' => 'Watsons',
            'images' => json_encode([
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/ferrous.png",
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/ferrous (2).png",
            ])
        ],
        [
            'name' => 'GrowBibo',
            'category' => 'Baby Care',
            'label' => 'Baby Care',
            'price' => 400.75,
            'stock' => 5041,
            'description' => "Nutritional supplement, typically marketed for children, designed to support growth and development.",
            'store' => 'Watsons',
            'images' => json_encode([
                "assets/ProductPics/BABY CARE/growbibo (2).png",
                "assets/ProductPics/BABY CARE/growbibo.png",
            ])
        ],
        [
            'name' => 'Hemarate',
            'category' => 'Vitamins',
            'label' => 'Multi Vitamins',
            'price' => 450.50,
            'stock' => 5042,
            'description' => "Is an iron supplement used to treat or prevent iron deficiency anemia.",
            'store' => 'Watsons',
            'images' => json_encode([
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/hermate.png",
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/hermate (3).png",
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/hermate (2).png",
            ])
        ],
        [
            'name' => 'ImmunPro',
            'category' => 'Vitamins',
            'label' => 'Multi Vitamins',
            'price' => 450.25,
            'stock' => 5043,
            'description' => "A dietary supplement designed to support immune health.",
            'store' => 'Watsons',
            'images' => json_encode([
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/immunpro (3).png",
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/immunpro (4).png",
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/immunpro.png",
            ])
        ],
        [
            'name' => 'Lactezin',
            'category' => 'Vitamins',
            'label' => 'Acne Treatment',
            'price' => 500.25,
            'stock' => 5044,
            'description' => "Supplement commonly used to manage acne.",
            'store' => 'Watsons',
            'images' => json_encode([
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/Lactezin (2).png",
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/Lactezin.png",
            ])
        ],
        [
            'name' => 'Pharex-B',
            'category' => 'Vitamins',
            'label' => 'Multi Vitamins',
            'price' => 540.25,
            'stock' => 5045,
            'description' => "Used to support energy production, improve metabolism, and promote healthy nerve function.",
            'store' => 'Watsons',
            'images' => json_encode([
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/pharexb.png",
            ])
        ],
        [
            'name' => 'Potencee-C',
            'category' => 'Vitamins',
            'label' => 'Multi Vitamins',
            'price' => 550.25,
            'stock' => 5046,
            'description' => "Used to support energy production, improve metabolism, and promote healthy nerve function.",
            'store' => 'Watsons',
            'images' => json_encode([
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/Potencee-c gold (2).png",
            ])
        ],
        [
            'name' => 'Propan',
            'category' => 'Vitamins',
            'label' => 'Multi Vitamins',
            'price' => 550.25,
            'stock' => 5047,
            'description' => "Used to support energy production, improve metabolism, and promote healthy nerve function.",
            'store' => 'Watsons',
            'images' => json_encode([
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/propan (2).png",
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/propan (3).png",
                "assets/ProductPics/VITAMINS & SUPPLEMENTS/propan.png"
            ])
        ]
     ],
     [
        'name' => 'Modess',
        'category' => 'Sexual Wellness',
        'label' => 'Napkin/Panty Liner',
        'price' => 35.00,
        'stock' => 5234,
        'description' => "Provides discreet protection with a blend of 4 thin flexible layers for leak protection.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/MODESS NAPKIN (2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/MODESS NAPKIN.png"
        ])
    ],
    [
        'name' => 'Sisters',
        'category' => 'Sexual Wellness',
        'label' => 'Napkin/Panty Liner',
        'price' => 45.00,
        'stock' => 3794,
        'description' => "Features a silky top sheet for softness and comfort.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/SISTERS.png"
        ])
    ],
    [
        'name' => 'Whisper',
        'category' => 'Sexual Wellness',
        'label' => 'Napkin/Panty Liner',
        'price' => 40.00,
        'stock' => 2489,
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
        'category' => 'Sexual Wellness',
        'label' => 'Napkin/Panty Liner',
        'price' => 32.00,
        'stock' => 1536,
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
        'category' => 'Sexual Wellness',
        'label' => 'Menstrual Care',
        'price' => 250.00,
        'stock' => 4264,
        'description' => "It is an eco-friendly alternative to tampons and pads, offering longer wear time and less environmental waste.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/MENSTRUAL CUP.png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/MENSTRUAL CUP (2).png"
        ])
    ],
    [
        'name' => 'Tampon',
        'category' => 'Sexual Wellness',
        'label' => 'Menstrual Care',
        'price' => 199.00,
        'stock' => 3125,
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
        'category' => 'Sexual Wellness',
        'label' => 'Feminine Wash',
        'price' => 145.00,
        'stock' => 1254,
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
        'category' => 'Sexual Wellness',
        'label' => 'Feminine Wash',
        'price' => 152.00,
        'stock' => 1342,
        'description' => "Is a gentle, pH-balanced cleanser for freshness and intimate care.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/BETADINE FEMININE WASH.png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/BETADINE FEMININE WASH (2).png"
        ])
    ],
    [
        'name' => 'Lactacyd',
        'category' => 'Sexual Wellness',
        'label' => 'Feminine Wash',
        'price' => 160.00,
        'stock' => 1356,
        'description' => "Their products contain lactic acid, which supports the vagina's natural protection.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/LACTACYD FEMININE WASH (2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/LACTACYD FEMININE WASH .png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/LACTACYD FEMININE WASH (3).png"
        ])
    ],
    [
        'name' => 'Gillette',
        'category' => 'Sexual Wellness',
        'label' => 'Shaving Cream',
        'price' => 133.00,
        'stock' => 1425,
        'description' => "Provides a rich, foamy lather for an easy, comfortable shave.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/GILLETTE SHAVING CREAM.png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/GILLETTE SHAVING CREAM (2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/GILLETTE SHAVING CREAM (3).png"
        ])
    ],
    [
        'name' => 'Nivea Men',
        'category' => 'Sexual Wellness',
        'label' => 'Shaving Cream',
        'price' => 418.00,
        'stock' => 2563,
        'description' => "It is designed to provide a comfortable and clean shave while protecting your skin.",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/NIVEA SHAVING CREAM.png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/NIVEA SHAVING CREAM (2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/NIVEA SHAVING CREAM (3).png"
        ])
    ],
    [
        'name' => 'Trust',
        'category' => 'Sexual Wellness',
        'label' => 'Condom',
        'price' => 32.00,
        'stock' => 1354,
        'description' => "Quality Imported Condoms. Sensitive, Strong, Reliable. Hygienically Sealed",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/TRUST CONDOM.png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/TRUST CONDOM (2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/TRUST CONDOM (3).png"
        ])
    ],
    [
        'name' => 'Durex',
        'category' => 'Sexual Wellness',
        'label' => 'Condom',
        'price' => 43.00,
        'stock' => 1523,
        'description' => "Quality Imported Condoms. Sensitive, Strong, Reliable. Hygienically Sealed",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/DUREX CONDOM.png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/DUREX CONDOM (2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/DUREX CONDOM (3).png"
        ])
    ],
    [
        'name' => 'Durex',
        'category' => 'Sexual Wellness',
        'label' => 'Lubricant',
        'price' => 298.25,
        'stock' => 1534,
        'description' => "Durex Play is a light and silky pleasure gel designed to give you an intensely sensual experience. It contains a specially formulated blend of ingredients which will enhance touch between you and your partner",
        'store' => 'Watsons',
        'images' => json_encode([
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/DUREX LUB.png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/DUREX LUB (2).png",
            "/PharmaEase/PharmaEase-Final/assets/ProductPics/SEXUAL WELLNESS/DUREX LUB (3).png"
        ])
        ],
    //MEDICINAL SUPPLIES
    [
    'name' => 'N95',
    'category' => 'Medicinal Supplies',
    'label' => 'Face Mask',
    'price' => 120.00,
    'stock' => 1432,
    'description' => "Help prevent the spread of COVID-19 by filtering out respiratory droplets.",
    'store' => 'Mercury',
    'images' => json_encode([
        "/PharmaEase/PharmaEase-Final/assets/ProductPics/MEDICINAL SUPPLIES/n95.png",
        "/PharmaEase/PharmaEase-Final/assets/ProductPics/MEDICINAL SUPPLIES/n95 (2).png"
    ])
],
[
    'name' => 'Hand Sanitizer',
    'category' => 'Medicinal Supplies',
    'label' => 'Sanitizer',
    'price' => 55.00,
    'stock' => 1422,
    'description' => "Kills germs on hands when soap and water are not available. Look for sanitizers with at least 60% alcohol content for effective disinfection.",
    'store' => 'SouthStar Drug',
    'images' => json_encode([
        "/PharmaEase/PharmaEase-Final/assets/ProductPics/MEDICINAL SUPPLIES/hand sanitizer.png"
    ])
],
[
    'name' => 'Cleaning Disinfectants',
    'category' => 'Medicinal Supplies',
    'label' => 'Disinfectants',
    'price' => 250.00,
    'stock' => 1211,
    'description' => "Used to clean surfaces and objects that may be contaminated with the virus. Effective against a wide range of pathogens.",
    'store' => 'SouthStar Drug',
    'images' => json_encode([
        "/PharmaEase/PharmaEase-Final/assets/ProductPics/MEDICINAL SUPPLIES/clorox (disinfectant).png",
        "/PharmaEase/PharmaEase-Final/assets/ProductPics/MEDICINAL SUPPLIES/20.png",
        "/PharmaEase/PharmaEase-Final/assets/ProductPics/MEDICINAL SUPPLIES/21.png"
    ])
],
[
    'name' => 'Nitrile Gloves',
    'category' => 'Medicinal Supplies',
    'label' => 'Gloves',
    'price' => 585.00,
    'stock' => 1341,
    'description' => "Provide a barrier to protect hands from contamination. Use disposable gloves and discard after each use to prevent cross-contamination.",
    'store' => 'Mercury',
    'images' => json_encode([
        "/PharmaEase/PharmaEase-Final/assets/ProductPics/MEDICINAL SUPPLIES/30.png"
    ])
],
[
    'name' => 'Face Shields',
    'category' => 'Medicinal Supplies',
    'label' => 'Shields',
    'price' => 12.05,
    'stock' => 1321,
    'description' => "Provide an additional layer of protection by covering the eyes, nose, and mouth. Often used in conjunction with masks for added safety.",
    'store' => 'SouthStar Drug',
    'images' => json_encode([
        "/PharmaEase/PharmaEase-Final/assets/ProductPics/MEDICINAL SUPPLIES/face shield.png",
        "/PharmaEase/PharmaEase-Final/assets/ProductPics/MEDICINAL SUPPLIES/face shield (3).png"
    ])
],
[
    'name' => 'Antigen',
    'category' => 'Medicinal Supplies',
    'label' => 'Covid-19 Test Kits',
    'price' => 150.00,
    'stock' => 1322,
    'description' => "Allow for at-home testing to detect the presence of the virus. Includes nasal swabs and instructions for use.",
    'store' => 'SouthStar Drug',
    'images' => json_encode([
        "/PharmaEase/PharmaEase-Final/assets/ProductPics/MEDICINAL SUPPLIES/antigen.png",
        "/PharmaEase/PharmaEase-Final/assets/ProductPics/MEDICINAL SUPPLIES/antigen (2).png"
    ])
],
[
    'name' => 'N95',
    'category' => 'Medicinal Supplies',
    'label' => 'Face Mask',
    'price' => 120.00,
    'stock' => 1432,
    'description' => "Help prevent the spread of COVID-19 by filtering out respiratory droplets.",
    'store' => 'Mercury',
    'images' => json_encode([
        "/PharmaEase/PharmaEase-Final/assets/ProductPics/MEDICINAL SUPPLIES/n95.png",
        "/PharmaEase/PharmaEase-Final/assets/ProductPics/MEDICINAL SUPPLIES/n95 (2).png"
    ])
],
[
    'name' => 'Hand Sanitizer',
    'category' => 'Medicinal Supplies',
    'label' => 'Sanitizer',
    'price' => 55.00,
    'stock' => 1422,
    'description' => "Kills germs on hands when soap and water are not available. Look for sanitizers with at least 60% alcohol content for effective disinfection.",
    'store' => 'SouthStar Drug',
    'images' => json_encode([
        "/PharmaEase/PharmaEase-Final/assets/ProductPics/MEDICINAL SUPPLIES/hand sanitizer.png"
    ])
],
[
    'name' => 'Cleaning Disinfectants',
    'category' => 'Medicinal Supplies',
    'label' => 'Disinfectants',
    'price' => 250.00,
    'stock' => 1211,
    'description' => "Used to clean surfaces and objects that may be contaminated with the virus. Effective against a wide range of pathogens.",
    'store' => 'SouthStar Drug',
    'images' => json_encode([
        "/PharmaEase/PharmaEase-Final/assets/ProductPics/MEDICINAL SUPPLIES/clorox (disinfectant).png",
        "/PharmaEase/PharmaEase-Final/assets/ProductPics/MEDICINAL SUPPLIES/20.png",
        "/PharmaEase/PharmaEase-Final/assets/ProductPics/MEDICINAL SUPPLIES/21.png"
    ])
],
[
    'name' => 'Nitrile Gloves',
    'category' => 'Medicinal Supplies',
    'label' => 'Gloves',
    'price' => 585.00,
    'stock' => 1341,
    'description' => "Provide a barrier to protect hands from contamination. Use disposable gloves and discard after each use to prevent cross-contamination.",
    'store' => 'Mercury',
    'images' => json_encode([
        "/PharmaEase/PharmaEase-Final/assets/ProductPics/MEDICINAL SUPPLIES/30.png"
    ])
],
[
    'name' => 'Face Shields',
    'category' => 'Medicinal Supplies',
    'label' => 'Shields',
    'price' => 12.05,
    'stock' => 1321,
    'description' => "Provide an additional layer of protection by covering the eyes, nose, and mouth. Often used in conjunction with masks for added safety.",
    'store' => 'SouthStar Drug',
    'images' => json_encode([
        "/PharmaEase/PharmaEase-Final/assets/ProductPics/MEDICINAL SUPPLIES/face shield.png",
        "/PharmaEase/PharmaEase-Final/assets/ProductPics/MEDICINAL SUPPLIES/face shield (3).png"
    ])
],
[
    'name' => 'Antigen',
    'category' => 'Medicinal Supplies',
    'label' => 'Covid-19 Test Kits',
    'price' => 150.00,
    'stock' => 1322,
    'description' => "Allow for at-home testing to detect the presence of the virus. Includes nasal swabs and instructions for use.",
    'store' => 'SouthStar Drug',
    'images' => json_encode([
        "/PharmaEase/PharmaEase-Final/assets/ProductPics/MEDICINAL SUPPLIES/antigen.png",
        "/PharmaEase/PharmaEase-Final/assets/ProductPics/MEDICINAL SUPPLIES/antigen (2).png"
    ])
],

    
];

// Insert each product
foreach ($products as $product) {
    $description = $conn->real_escape_string($product['description']);
    $sql_insert = "INSERT INTO `products` (name, category, label, price, stock, description, store, images)
        VALUES (
            '{$conn->real_escape_string($product['name'])}',
            '{$conn->real_escape_string($product['category'])}',
            '{$conn->real_escape_string($product['label'])}',
            {$product['price']},
            {$product['stock']},
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
