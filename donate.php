<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donate - PetPals</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="media/tabIcon.png">
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Ensure the body takes full height */
        html,
        body {
            height: 100%;
            margin: 0;
        }

        /* Flexbox layout for the body */
        body {
            display: flex;
            flex-direction: column;
        }

        /* Push footer to the bottom */
        .content {
            flex-grow: 1;
        }

        /* Success Banner */
        .success-banner {
            display: none;
            position: fixed;
            left: 50%;
            bottom: 80px;
            /* Adjust this to set the distance from the footer */
            transform: translateX(-50%);
            z-index: 1050;
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            width: auto;
        }
    </style>
</head>

<body>

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
                    <li class="nav-item"><a class="nav-link active" href="donate.php">Donate</a></li>
                    <li class="nav-item"><a class="nav-link" href="petCards.php">Adopt</a></li>
                </ul>
                <button class="btn btn-outline-light" onclick="goBack()">Back</button>
            </div>
        </div>
    </nav>

    <!-- Donate Section -->
    <div class="container py-5 content">
        <h1 class="text-center text-success">Make a Difference - Donate Today</h1>
        <p class="text-center mb-5">Your donation helps us provide care, shelter, and support to countless animals in
            need.</p>

        <div class="row text-center">
            <div class="col-md-4">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h4 class="card-title">One-Time Donation</h4>
                        <p>Make a one-time donation to support our mission.</p>
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#oneTimeModal">Donate
                            Now</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h4 class="card-title">Monthly Donation</h4>
                        <p>Become a monthly donor and make a lasting impact.</p>
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#monthlyModal">Donate
                            Monthly</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h4 class="card-title">In Memory</h4>
                        <p>Make a donation in honor or memory of a loved one.</p>
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#memoryModal">Donate In
                            Memory</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center py-4" style="background-color: #006a6a; color: white;">
        <p>&copy; 2024 PetPals. All rights reserved.</p>
    </footer>

    <!-- One-Time Donation Modal -->
    <div class="modal fade" id="oneTimeModal" tabindex="-1" aria-labelledby="oneTimeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="oneTimeModalLabel">One-Time Donation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Thank you for your interest in making a one-time donation! Please enter the amount you'd like to
                        donate.</p>
                    <input type="number" class="form-control" id="oneTimeAmount" placeholder="Amount in INR" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success"
                        onclick="showSuccessBannerAndCloseModal('#oneTimeModal')">Donate</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Monthly Donation Modal -->
    <div class="modal fade" id="monthlyModal" tabindex="-1" aria-labelledby="monthlyModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="monthlyModalLabel">Monthly Donation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Thank you for becoming a monthly donor! Please select your monthly contribution amount.</p>
                    <input type="number" class="form-control" id="monthlyAmount"
                        placeholder="Amount per Month in INR" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success"
                        onclick="showSuccessBannerAndCloseModal('#monthlyModal')">Donate Monthly</button>
                </div>
            </div>
        </div>
    </div>

    <!-- In Memory Donation Modal -->
    <div class="modal fade" id="memoryModal" tabindex="-1" aria-labelledby="memoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="memoryModalLabel">In Memory Donation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Make a donation in memory of a loved one. Please enter the name of the person you wish to honor
                        and the amount you'd like to donate.</p>
                    <input type="text" class="form-control mb-2" placeholder="Name of Loved One" />
                    <input type="number" class="form-control" id="memoryAmount" placeholder="Amount in INR" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success"
                        onclick="showSuccessBannerAndCloseModal('#memoryModal')">Donate In Memory</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Banner -->
    <div class="success-banner" id="successBanner">
        <strong>Success!</strong> Your donation has been received.
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Function to show the success banner and auto-close the modal
        function showSuccessBannerAndCloseModal(modalId) {
            // Show the success banner
            var banner = document.getElementById('successBanner');
            banner.style.display = 'block';

            // Hide the banner after 5 seconds
            setTimeout(function () {
                banner.style.display = "none";
            }, 5000); // 5000ms = 5 seconds
        }
    </script>



</body>

</html>