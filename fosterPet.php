<?php
// This is a basic PHP page to handle fostering pet requests
// You can add more functionality or style as needed.
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Foster a Pet</title>
    <!-- You can link to your CSS here if you have any external stylesheets -->
    <link rel="stylesheet" href="path/to/your/styles.css">
    <style>
        /* You can also add inline CSS styles for this page */
        body {
            font-family: Arial, sans-serif;
            background: #f9d0c2;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .page-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .card {
            border: 2px solid #006a6a;
            border-radius: 5px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            background-color: white;
            margin-top: 20px;
        }

        .card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        .card-body {
            padding: 20px;
        }

        .btn {
            background-color: #006a6a;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn:hover {
            background-color: #004e4e;
        }

        .form-group {
            margin-bottom: 15px;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .submit-btn {
            background-color: #006a6a;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .submit-btn:hover {
            background-color: #004e4e;
        }
    </style>
</head>

<body>
    <div class="container">
        <header class="page-header">
            <h1>Foster a Pet</h1>
            <p>Provide a safe and loving home for a pet in need. Fostering is a temporary arrangement that gives animals
                a place to stay until they find their forever homes. Your help can make a big difference in their lives!
            </p>
        </header>

        <!-- Information Section -->
        <div class="card">
            <img src="media/card1.jpg" alt="Foster a Pet">
            <div class="card-body">
                <h2>Why Foster?</h2>
                <p>By fostering a pet, you provide a safe and nurturing environment for an animal that might otherwise
                    be in a shelter. Fostering is a rewarding experience for both you and the animal, and it helps
                    ensure pets are ready for adoption into permanent homes.</p>
                <p>Fostering can also help reduce overcrowding in shelters and give the animal a better chance at being
                    adopted. Whether you're fostering a dog, cat, or other animal, your time and care are invaluable!
                </p>
            </div>
        </div>

        <!-- Foster Application Form -->
        <section>
            <h2>Interested in Fostering?</h2>
            <p>If you're interested in fostering a pet, please fill out the form below. Our team will contact you with
                more details.</p>

            <form action="submitFosterApplication.php" method="POST">
                <div class="form-group">
                    <label for="name">Your Name</label>
                    <input type="text" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>

                <div class="form-group">
                    <label for="message">Why do you want to foster a pet?</label>
                    <textarea id="message" name="message" rows="5" required></textarea>
                </div>

                <button type="submit" class="submit-btn">Submit Application</button>
            </form>
        </section>
    </div>
</body>

</html>