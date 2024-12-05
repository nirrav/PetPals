<?php
// Basic PHP page for users to sign up for walking a pet
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Take a Pet for a Walk</title>

    <!-- Import Google Fonts (Pacifico and Quicksand) -->
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Quicksand:wght@500&display=swap"
        rel="stylesheet">
    <style>
        /* Custom Font Styles */
        .pacifico-regular {
            font-family: "Pacifico", cursive;
            font-weight: 400;
            font-style: normal;
        }

        /* Global Styles */
        html,
        body {
            background: #f9d0c2;
            font-family: "Quicksand", sans-serif !important;
            font-weight: 500 !important;
            padding: 0;
            margin: 0;
            line-height: 1.4em;
        }

        /* Preloader Styles (Optional) */
        .preloader {
            background: linear-gradient(to right, #000000, #3b3b3b);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        /* Hero Section */
        .hero-section {
            background: url('media/hero-bg.jpg') no-repeat center center/cover;
            color: #fff;
            padding: 100px 0;
            text-align: center;
        }

        .hero-section h1 {
            font-size: 3rem;
            font-weight: 600;
        }

        .hero-section p {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        .hero-section .btn-primary {
            background-color: #ff6f61;
            border: none;
        }

        /* Cards Section */
        .cards-section {
            padding: 50px 0;
        }

        .card {
            margin-bottom: 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            border-radius: 16px;
            border: 1px solid #ccc;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        .card-title {
            font-size: 24px;
            margin-top: 20px;
        }

        .card-body {
            padding: 20px;
        }

        .card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-radius: 10px;
        }

        .card-text {
            font-size: 18px;
            margin-bottom: 5px;
        }

        .btn {
            background-color: #006a6a;
            color: aliceblue;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1.1em;
        }

        .btn:hover {
            background-color: #004e4e;
        }

        /* Form Styles */
        form {
            margin-top: 30px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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

        /* Responsive Styles */
        @media (max-width: 768px) {
            .hero-section {
                padding: 50px 0;
            }

            .hero-section h1 {
                font-size: 2rem;
            }

            .hero-section p {
                font-size: 1.2rem;
            }

            .card img {
                height: auto;
            }
        }

        /* Footer */
        .footer {
            background-color: #006a6a !important;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

        .footer ul {
            padding: 0;
            list-style: none;
        }

        .footer ul li {
            display: inline;
            margin-right: 10px;
        }

        .footer ul li a {
            color: #fff;
            text-decoration: none;
        }

        .footer ul li a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    
    <div class="container">
        <!-- Hero Section -->
        <section class="hero-section">
            <h1>Take a Pet for a Walk</h1>
            <p>Don't have much time? Just 15 minutes of your day can provide a pet with the exercise they need. A small
                act that can bring so much joy to both you and the pet!</p>
            <a href="#walk-form" class="btn btn-primary">Take a Walk</a>
        </section>

        <!-- Information Section -->
        <section>
            <div class="card">
                <img src="media/card2.jpg" alt="Take a Pet for a Walk">
                <div class="card-body">
                    <h2>Why Take a Pet for a Walk?</h2>
                    <p>Taking a pet for a walk not only provides them with much-needed exercise but also offers a change
                        of scenery and a bonding experience. Whether you’re walking a dog, cat, or another animal, your
                        time and attention are invaluable.</p>
                    <p>Your simple act of walking a pet can help reduce stress and promote a healthy lifestyle for both
                        you and the animal. Plus, it’s a great way to meet new furry friends!</p>
                </div>
            </div>
        </section>

        <!-- Walk Application Form -->
        <section id="walk-form">
            <h2>Sign Up for a Walk</h2>
            <p>If you're interested in walking a pet, please fill out the form below. Our team will contact you with
                more details.</p>

            <form action="submitWalkApplication.php" method="POST">
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
                    <label for="message">Why do you want to take a pet for a walk?</label>
                    <textarea id="message" name="message" rows="5" required></textarea>
                </div>

                <button type="submit" class="submit-btn">Submit Application</button>
            </form>
        </section>

        <!-- Footer -->
        <footer class="footer">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">About Us</a></li>
            </ul>
        </footer>
    </div>
</body>

</html>