<?php
// Basic PHP page for users to sign up to spend time with injured or terminal pets
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Spend Time with Injured or Terminal Pets</title>

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
            <h1>Spend Time with Injured or Terminal Pets</h1>
            <p>If you have more time to give, spend it with pets who are injured or on their final days. Your love and
                presence can provide comfort and hope during their most difficult times.</p>
            <a href="#spend-time-form" class="btn btn-primary">Give Comfort</a>
        </section>

        <!-- Information Section -->
        <section>
            <div class="card">
                <img src="media/card3.jpg" alt="Spend Time with Injured or Terminal Pets">
                <div class="card-body">
                    <h2>Why Spend Time with Injured or Terminal Pets?</h2>
                    <p>Many pets face their most difficult moments when they are injured or terminally ill. The love and
                        companionship of a kind human can provide comfort during these hard times. Your presence can
                        bring peace to their final days and help them feel loved.</p>
                    <p>If you're looking to make a profound impact on the life of a pet in need, this opportunity can be
                        incredibly rewarding. Just a little time and attention can bring immense joy and hope to these
                        animals.</p>
                </div>
            </div>
        </section>

        <!-- Spend Time Application Form -->
        <section id="spend-time-form">
            <h2>Sign Up to Spend Time with a Pet</h2>
            <p>If you're interested in offering your time to a pet in need, please fill out the form below. Our team
                will get in touch with you shortly.</p>

            <form action="submitSpendTimeApplication.php" method="POST">
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
                    <label for="message">Why do you want to spend time with injured or terminal pets?</label>
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