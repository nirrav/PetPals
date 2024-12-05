<?php
// Include the database connection
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetPals - Volunteer Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=IBM+Plex+Serif:ital,wght@1,600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="media/tabIcon.png">
    <style>
        .container h1 p {
            color: black;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg" style="background-color: #006A6AFF;" data-bs-theme="dark">
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
                        <a class="nav-link" href="contact.html">Contact us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                </ul>
                <a class="btn btn-outline-light" href="petCards.php">Furever Home</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section text-center text-white py-20"
        style="background-image: url('media/volunteer.jpg'); background-size: cover; background-position: center; border-bottom: 2px solid black; position: relative; height: 100vh;">

        <div class="container text" style="position: absolute; bottom: 20px; left: 50%; transform: translateX(-50%); z-index: 1; 
           background-color: rgba(0, 0, 0, 0.5); backdrop-filter: blur(8px); 
           padding: 20px; border-radius: 10px;">
            <h1>Ways You Can Help</h1>
            <p>Join us in our mission to support the animals in need. Your time and love can make a big difference.</p>
        </div>


    </section>


    <section class="volunteer-options py-5">
        <div class="container text-center">
            <h2><u><b>How You Can Volunteer</b></u></h2>
            <div class="row mt-5">
                <!-- Option 1: Foster a Pet -->
                <div class="col-md-4 mb-4">
                    <div class="card" style="border: 2px solid black;">
                        <img src="media/card1.jpg" class="card-img-top" alt="Foster a Pet"
                            style="height: 250px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">Foster a Pet</h5>
                            <p class="card-text">Give a loving home to a pet in need. Fostering provides a temporary
                                safe space for pets until they find their forever homes.</p>
                            <a href="fosterPet.php" class="btn"
                                style="background-color: #006a6a; color: aliceblue;">Foster Now</a>
                        </div>
                    </div>
                </div>

                <!-- Option 2: Take a Pet for a Walk -->
                <div class="col-md-4 mb-4">
                    <div class="card" style="border: 2px solid black;">
                        <img src="media/card2.jpg" class="card-img-top" alt="Take a Pet for a Walk"
                            style="height: 250px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">Take a Pet for a Walk</h5>
                            <p class="card-text">Don't have much time? Take just 15 minutes of your day to walk a pet
                                and give them the exercise they need. A small act that can bring so much joy!</p>
                            <a href="walk.php" class="btn"
                                style="background-color: #006a6a; color: aliceblue;">Take a Walk</a>
                        </div>
                    </div>
                </div>

                <!-- Option 3: Spend Time with Injured or Terminal Pets -->
                <div class="col-md-4 mb-4">
                    <div class="card" style="border: 2px solid black;">
                        <img src="media/card3.jpg" class="card-img-top"
                            alt="Spend Time with Injured or Terminal Pets" style="height: 250px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">Spend Time with Injured or Terminal Pets</h5>
                            <p class="card-text">If you have more time to give, spend it with pets who are injured or on
                                their final days. Your love and presence can provide comfort and hope during their most
                                difficult times.</p>
                            <a href="spendTime.php" class="btn"
                                style="background-color: #006a6a; color: aliceblue;">Give Comfort</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cta-section py-5 text-center" style="background-color: #f4f4f4;">
        <div class="container">
            <h3><u><b>Ready to Make a Difference?</b></u></h3>
            <p>Your contribution, no matter how small, can change a life. Become a part of our volunteer community
                today!</p>
            <a href="volunteer.php" class="btn btn-lg" style="background-color: #006a6a; color: white;">Join Us as
                a Volunteer</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer bg-dark text-white py-3">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-6">
                    <p>&copy; 2024 PetPals. All rights reserved.</p>
                </div>
                <div class="col-md-6">
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="#" class="text-white">Facebook</a></li>
                        <li class="list-inline-item"><a href="#" class="text-white">Twitter</a></li>
                        <li class="list-inline-item"><a href="#" class="text-white">Instagram</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
    <script src="index.js"></script>
</body>

</html>