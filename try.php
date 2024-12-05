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

// SQL query to fetch products
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="try.css">
</head>
<body>
    <div id="grid">
        <?php
        // Check if products are available
        if ($result->num_rows > 0) {
            // Loop through each product and display it
            while($row = $result->fetch_assoc()) {
                $images = json_decode($row['images'], true); // Decode the images from JSON format
                ?>
                <div class="product">
                    <div class="info-large">
                        <h4><?php echo $row['name']; ?></h4>
                        <div class="sku">
                            PRODUCT NO.: <strong><?php echo $row['sku']; ?></strong>
                        </div>
                        <div class="price-big">
                            <span>₱<?php echo number_format($row['original_price'], 2); ?></span> ₱<?php echo number_format($row['price'], 2); ?>
                        </div>
                        <h3>DESCRIPTION</h3>
                        <div class="colors-large">
                            <span><?php echo $row['description']; ?></span>
                        </div>
                        <h3>STORE</h3>
                        <div class="sizes-large">
                            <span><?php echo $row['store']; ?></span>
                        </div>
                        <button class="add-cart-large">Add To Cart</button>
                    </div>
                    <div class="make3D">
                        <div class="product-front">
                            <div class="shadow"></div>
                            <?php
                            // Loop through all images and display them
                            foreach ($images as $image) {
                                echo '<img src="' . $image . '" alt="' . $row['name'] . '" />';
                            }
                            ?>
                            <div class="image_overlay"></div>
                            <div class="add_to_cart">Add to cart</div>
                            <div class="view_gallery">View gallery</div>
                            <a href="productview.php?id=<?php echo $row['id']; ?>" class="view_details">View details</a>
                            <div class="stats">
                                <div class="stats-container">
                                    <span class="product_price">₱<?php echo number_format($row['price'], 2); ?></span>
                                    <span class="product_name"><?php echo $row['name']; ?></span>
                                    <p>Essentials</p>
                                    <div class="product-options">
                                        <strong>DESCRIPTION</strong>
                                        <span><?php echo $row['description']; ?></span>
                                        <strong>STORE</strong>
                                        <div class="colors">
                                            <span><?php echo $row['store']; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "No products found.";
        }
        ?>
    </div>

    <?php
    // Close connection
    $conn->close();
    ?>
</body>
</html>
