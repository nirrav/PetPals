<?php
session_start();
include 'config.php';

// Check if the pet ID is provided
if (isset($_GET['id'])) {
    $pet_id = $_GET['id'];

    // Fetch the pet's details from the database
    $stmt = $conn->prepare("SELECT * FROM animal_adoption WHERE id = ?");
    if (!$stmt) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("i", $pet_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Pet not found!";
        exit;
    }

    // Close statement
    $stmt->close();
} else {
    echo "Pet ID not provided.";
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $full_name = $_POST['fullName'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $message = $_POST['message'] ?? '';

    // Validate required fields
    if (empty($full_name) || empty($email) || empty($phone) || empty($message)) {
        echo "All fields are required.";
        exit;
    }

    // Insert adoption request into the database
    $stmt = $conn->prepare("INSERT INTO adoption_requests (pet_id, full_name, email, phone, message) VALUES (?, ?, ?, ?, ?)");
    if (!$stmt) {
        die("Error preparing insertion statement: " . $conn->error);
    }

    $stmt->bind_param("issss", $pet_id, $full_name, $email, $phone, $message);

    if ($stmt->execute()) {
        // Success message
        $_SESSION['success_message'] = "Your request was sent successfully! Our Pet Pals will contact you for the next steps in the adoption process. Thank you for choosing to adopt " . htmlspecialchars($row["name"], ENT_QUOTES, 'UTF-8') . "!";
        header("Location: adopt_pet.php?id=" . $pet_id); // Redirect to the same page to show the message
        exit;
    } else {
        echo "Error inserting adoption request: " . $stmt->error;
    }

    // Close statement
    $stmt->close();

    // Close connection explicitly
    $conn->close();

    // Stop further processing
    exit;
}

// Ensure the connection is closed if the script ends unexpectedly
if (isset($conn) && $conn->ping()) {
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adopt <?php echo htmlspecialchars($row["name"] ?? '', ENT_QUOTES, 'UTF-8'); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="media/tabIcon.png">
    <link rel="stylesheet" href="styles.css">
</head>

<body style="background-color: #f0f8ff;">

    <!-- Navigation Bar -->
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
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="volunteer.php">Volunteer</a></li>
                    <li class="nav-item"><a class="nav-link" href="./donate.php">Donate</a></li>
                    <li class="nav-item"><a class="nav-link" href="petCards.php">Adopt</a></li>
                </ul>
                <button class="btn btn-outline-light" onclick="goBack()">Back</button>
            </div>
        </div>
    </nav>

    <!-- Main Content Section -->
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-6">
                <!-- Pet Image and Info -->
                <div class="card shadow-lg">
                    <img src="<?php echo htmlspecialchars($row["photo"] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                        alt="<?php echo htmlspecialchars($row["name"] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                        class="card-img-top" style="height: 400px; object-fit: cover;">
                    <div class="card-body">
                        <h2 class="card-title"><?php echo htmlspecialchars($row["name"] ?? '', ENT_QUOTES, 'UTF-8'); ?>
                        </h2>
                        <p><strong>Animal Type:</strong>
                            <?php echo htmlspecialchars($row["animalType"] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
                        <p><strong>Age:</strong> <?php echo htmlspecialchars($row["age"] ?? '', ENT_QUOTES, 'UTF-8'); ?>
                            years</p>
                        <p><strong>Color:</strong>
                            <?php echo htmlspecialchars($row["color"] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
                        <p><strong>Location:</strong>
                            <?php echo htmlspecialchars($row["location"] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <!-- Adoption Form -->
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h3>Adopt <?php echo htmlspecialchars($row["name"] ?? '', ENT_QUOTES, 'UTF-8'); ?>!</h3>
                        <form action="adopt_pet.php?id=<?php echo $pet_id; ?>" method="POST">
                            <input type="hidden" name="pet_id" value="<?php echo $pet_id; ?>">

                            <div class="mb-3">
                                <label for="fullName" class="form-label">Your Full Name</label>
                                <input type="text" class="form-control" id="fullName" name="fullName" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Your Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Your Phone Number</label>
                                <input type="text" class="form-control" id="phone" name="phone" required>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Why do you want to adopt this pet?</label>
                                <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-success btn-lg w-100 mt-3">Adopt Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center py-4" style="background-color: #006a6a; color: white;">
        <p>&copy; 2024 PetPals. All rights reserved.</p>
    </footer>
    <!-- Success Message Alert -->
    <?php if (isset($_SESSION['success_message'])): ?>
        <div id="successAlert" class="alert alert-success alert-dismissible fade show" role="alert"
            style="position: fixed; top: 10px; left: 50%; transform: translateX(-50%); z-index: 1050;">
            <?php echo $_SESSION['success_message']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['success_message']); ?>
    <?php endif; ?>

    <script>
        // Automatically hide the success alert after 5 seconds
        const successAlert = document.getElementById('successAlert');
        if (successAlert) {
            setTimeout(() => {
                successAlert.classList.remove('show');
                setTimeout(() => successAlert.remove(), 150); // Remove after fade-out
            }, 5000);
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>