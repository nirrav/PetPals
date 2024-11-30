<?php
session_start();  // Start session to store messages
include 'config.php';

// Check if a pet ID is provided in the URL
if (isset($_GET['id'])) {
    $pet_id = $_GET['id'];

    // Fetch data for the selected pet
    $stmt = $conn->prepare("SELECT * FROM animal_adoption WHERE id = ?");
    $stmt->bind_param("i", $pet_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if any row is returned
    if ($result && $result->num_rows > 0) {
        // Fetch the pet details
        $row = $result->fetch_assoc();

        // Fetch photos for the selected pet from the photo_album column
        $photo_album = explode(',', $row['photo_album']);
        $photo_album = array_filter($photo_album); // Remove empty values
    } else {
        echo "Pet not found in the database.";
        exit; // Stop further execution
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "Pet ID not provided.";
    exit; // Stop further execution
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($row["name"] ?? '', ENT_QUOTES, 'UTF-8'); ?>'s Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="media/tabIcon.png">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg" style="background-color: #006a6a;" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="media/navIcon.png" alt="Logo" width="28" height="auto" class="d-inline-block align-text-top">
                PetPals
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item dropdown" id="hoverDropdown">
                        <a class="nav-link dropdown-toggle active" href="volunteer.php" role="button"
                            aria-expanded="false">
                            How can you help us?
                        </a>
                        <ul class="dropdown-menu" style="background-color: #006a6a; border: 2px solid black;">
                            <li><a class="dropdown-item" style="border-bottom: 2px solid black;"
                                    href="volunteer.php">Volunteer</a>
                            </li>
                            <li><a class="dropdown-item" style="border-bottom: 2px solid black;" href="#">Donate</a>
                            </li>
                            <li><a class="dropdown-item" style="border-bottm: 2px solid black;" href="#">Sponsor a
                                    Meal</a></li>
                            <li><a class="dropdown-item" style="border-top: 2px solid black;"
                                    href="petCards.php">Adopt</a></li>
                        </ul>

                    </li>
                </ul>
                <button class="btn btn-outline-light" onclick="goBack()">Back</button>
                <script>
                    function goBack() {
                        window.history.back();
                    }
                </script>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row" id="pet-profile">
            <div class="col-md-6">
                <div class="pet-profile">
                    <img src="<?php echo htmlspecialchars($row["photo"] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                        alt="<?php echo htmlspecialchars($row["name"] ?? '', ENT_QUOTES, 'UTF-8'); ?>" loading="lazy"
                        class="img-fluid">
                    <h2><?php echo htmlspecialchars($row["name"] ?? '', ENT_QUOTES, 'UTF-8'); ?></h2>
                    <p>Animal: <?php echo htmlspecialchars($row["animalType"] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
                    <p>Age: <?php echo htmlspecialchars($row["age"] ?? '', ENT_QUOTES, 'UTF-8'); ?> years</p>
                    <p>Color: <?php echo htmlspecialchars($row["color"] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
                    <p>Blood Group: <?php echo htmlspecialchars($row["bloodGroup"] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
                    <p>Location: <?php echo htmlspecialchars($row["location"] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="pet-note">
                    <h2>Note About <?php echo htmlspecialchars($row["name"] ?? '', ENT_QUOTES, 'UTF-8'); ?>:</h2>
                    <p><?php echo htmlspecialchars($row["note"] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
                </div>
            </div>

        </div>

        <!-- Add the "Adopt [Name]" button just above the photo album -->
        <div class="row mt-4">
            <div class="col-12">
                <a href="adopt_pet.php?id=<?php echo $pet_id; ?>" class="btn btn-primary mb-4">
                    Adopt <?php echo htmlspecialchars($row["name"] ?? '', ENT_QUOTES, 'UTF-8'); ?>
                </a>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <h2>Photo Album:</h2>
                <div class="row">
                    <?php
                    if (!empty($photo_album)) {
                        foreach ($photo_album as $photo_path) {
                            echo '<div class="col-md-4 mb-3">';
                            echo '<img src="' . htmlspecialchars(trim($photo_path), ENT_QUOTES, 'UTF-8') . '" alt="Pet Photo" style="border-radius: 8px; border: 2px solid black;" class="img-fluid">';
                            echo '</div>';
                        }
                    } else {
                        echo "<p>No photos found.</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>