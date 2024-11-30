<?php
// Include the database connection
include './config.php';  // Ensure this path is correct

// Define the message variable
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize it
    $name = $conn->real_escape_string(trim($_POST['name']));
    $email = $conn->real_escape_string(trim($_POST['email']));
    $messageText = $conn->real_escape_string(trim($_POST['message']));

    // Validate the data (you can add more validation if needed)
    if (empty($name) || empty($email) || empty($messageText)) {
        $message = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Please fill in all fields.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
    } else {
        // Insert data into the database
        $sql = "INSERT INTO appliedvolunteers (name, email, message) VALUES ('$name', '$email', '$messageText')";

        if ($conn->query($sql) === TRUE) {
            // Success message with an icon and animation
            $message = '<div class="alert alert-success alert-dismissible fade show success-message" role="alert">
                            <i class="bi bi-check-circle-fill me-2"></i> 
                            <strong>Thank you for volunteering!</strong> We will get in touch with you soon.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
        } else {
            // Error message
            $message = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Error: ' . $conn->error . '
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
        }
    }
}

// Close the connection
$conn->close();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer | Animal Adoption</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="png" href="media/tabIcon.png">
    <link rel="stylesheet" href="style.css">
    <style>
        /* CSS styles here */
        body {
            font-family: "Nunito Sans", sans-serif;
            margin: 0;
            padding: 0;
            background: #f9d0c2;
            /* Set a light background color */
        }

        body::-webkit-scrollbar {
            display: none;
        }

        header {
            background-color: #f8d8cd;
            padding: 20px;
            text-align: center;
            border-bottom: 2px solid #e39486;
            /* Add a border to separate header */
        }

        header h1 {
            margin: 0;
            /* Remove default margin for h1 */
        }

        main {
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            position: relative;
            /* Position the main content relatively */
        }

        .volunteer-info {
            text-align: center;
            margin-bottom: 40px;
            /* Add some space between sections */
            font-size: 18px;
            /* Set a default font size */
        }

        .volunteer-info img {
            max-width: 100%;
            margin-top: 10px;
            border-radius: 8px;
            /* Add a border radius to the image */
        }

        .volunteer-form-container {
            position: relative;
            width: 100%;
            max-width: 45vw;
            /* Increase the maximum width of the form */
            margin-top: 5%;
            /* Adjust the margin to move the form down */
        }

        .volunteer-form {
            background-color: #fff;
            padding: 5%;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .volunteer-form h2 {
            margin-top: 0;
            /* Remove default margin for h2 */
            text-align: center;
        }

        .volunteer-form label,
        .volunteer-form input,
        .volunteer-form textarea,
        .volunteer-form button {
            display: block;
            width: 100%;
            margin-bottom: 20px;
        }

        .volunteer-form input,
        .volunteer-form textarea,
        .volunteer-form button {
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .volunteer-form button {
            background-color: #006a6a;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .volunteer-form button:hover {
            background-color: #00a2a2;
        }

        footer {
            background-color: #006a6a;
            padding: 10px;
            color: #ccc;
            text-align: center;
            border-top: 2px solid #005454;
            /* Add a border to separate footer */
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .paw-image {
            position: absolute;
            top: -180px;
            /* Adjust the top position to move the image up */
            right: 50%;
            transform: translateX(50%);
            z-index: 1;
        }

        /* Responsive styles */
        @media (max-width: 1200px) {
            .volunteer-form-container {
                max-width: 50vw;
            }
        }

        @media (max-width: 992px) {
            .volunteer-form-container {
                max-width: 60vw;
            }
        }

        @media (max-width: 768px) {
            .volunteer-form-container {
                max-width: 70vw;
            }
        }

        @media (max-width: 576px) {
            .volunteer-form-container {
                max-width: 80vw;
            }

            .paw-image {
                height: auto;
                width: 100%;
                top: -70px;
            }
        }

        @media (max-width: 400px) {
            .volunteer-form-container {
                max-width: 90vw;
            }

            .paw-image {
                height: auto;
                width: 100%;
                top: -80px;
            }
        }

        /* Additional styles for the success message */
        .success-message {
            animation: fadeIn 1s ease-in-out;
            border-radius: 8px;
            padding: 20px;
            font-size: 16px;
            color: #155724;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
        }

        .success-message i {
            font-size: 1.5rem;
            color: #28a745;
            /* Green color for success icon */
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

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
    <header>
        <h1>Volunteer to Help Animals</h1>
    </header>

    <main class="container my-5">
        <!-- Display message if available -->
        <?php if ($message)
            echo $message; ?>

        <section class="volunteer-info">
            <h2>Why Volunteer?</h2>
            <p><b>Volunteering with us is a rewarding experience. You can make a real difference in the lives of animals
                    in
                    need.</b></p>
        </section>

        <!-- Volunteer form section -->
        <div class="volunteer-form-container">
            <img src="media/section1bg-removebg-preview.png" alt="Volunteer" class="paw-image">
            <section class="volunteer-form">
                <h2>Volunteer Sign-up</h2>

                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="volunteerForm">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>

                    <label for="message">Message:</label>
                    <textarea id="message" name="message" rows="4" required></textarea>

                    <button type="submit">Submit</button>
                </form>
            </section>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Animal Adoption. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>