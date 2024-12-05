<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sponsor a Meal - PetPals</title>
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
                    <li class="nav-item"><a class="nav-link" href="volDetail.php">Volunteer</a></li>
                    <li class="nav-item"><a class="nav-link" href="./donate.php">Donate</a></li>
                    <li class="nav-item"><a class="nav-link active" href="sponsor_meal.php">Sponsor a Meal</a></li>
                </ul>
                <button class="btn btn-outline-light" onclick="goBack()">Back</button>
            </div>
        </div>
    </nav>

    <!-- Sponsor a Meal Section -->
    <div class="container py-5">
        <h1 class="text-center text-success">Sponsor a Meal for a Pet in Need</h1>
        <p class="text-center mb-5">Help us ensure no pet goes hungry. Sponsor a meal and bring a smile to their faces.
        </p>

        <div class="text-center">
            <img src="media/tabIcon.png" alt="Sponsor a Meal" class="img-fluid rounded shadow-lg mb-4"
                style="max-height: 300px;">
        </div>

        <form action="#" method="POST" class="shadow-lg p-5 bg-white rounded">
            <div class="mb-3">
                <label for="fullName" class="form-label">Your Full Name</label>
                <input type="text" class="form-control" id="fullName" name="fullName" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Your Email Address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="amount" class="form-label">Amount (in USD)</label>
                <input type="number" class="form-control" id="amount" name="amount" required>
            </div>
            <button type="submit" class="btn btn-success btn-lg w-100">Sponsor a Meal</button>
        </form>
    </div>

    <!-- Footer -->
    <footer class="text-center py-4" style="background-color: #006a6a; color: white;">
        <p>&copy; 2024 PetPals. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>