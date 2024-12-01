<?php
// Database connection
include 'config.php';


// SQL query to get the top 3 oldest pets
$sql = "SELECT name, photo, id FROM animal_adoption ORDER BY age DESC LIMIT 3";
$result = $conn->query($sql);

$featuredPets = [];

if ($result->num_rows > 0) {
  // Fetch all results into an array
  while ($row = $result->fetch_assoc()) {
    $featuredPets[] = $row;
  }
} else {
  echo "0 results";
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PetPals - An Animal Adoption Website</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=IBM+Plex+Serif:ital,wght@1,600&display=swap"
    rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
  <link rel="icon" href="media/tabIcon.png">
</head>

<body>
  <nav class="navbar navbar-expand-lg" style="background-color: #006a6a;" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="media/navIcon.png" alt="Logo" width="28" height="auto" class="d-inline-block align-text-top">
        PetPals
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="contact.html">Contact us</a>
          </li>
          <li class="nav-item dropdown" id="hoverDropdown">
            <a class="nav-link dropdown-toggle active" href="volunteer.php" role="button" aria-expanded="false">
              How can you help us?
            </a>
            <ul class="dropdown-menu" style="background-color: #006a6a; border: 2px solid black;">
              <li><a class="dropdown-item" style="border-bottom: 2px solid black;" href="volunteer.php">Volunteer</a>
              </li>
              <li><a class="dropdown-item" style="border-bottom: 2px solid black;" href="./donate.php">Donate</a></li>
              <li><a class="dropdown-item" style="border-bottm: 2px solid black;" href="#">Sponsor a Meal</a></li>
              <li><a class="dropdown-item" style="border-top: 2px solid black;" href="petCards.php">Adopt</a></li>
            </ul>

          </li>
        </ul>
        <a class="btn btn-outline-light" href="petCards.php">Furever Home</a>
      </div>
    </div>
  </nav>


  <div class="preloader">
    <div class="brand-logo">
      <img src="media/navIcon.png" alt="Brand Logo" loading="lazy">
      <h1>PetPals-Loading...</h1>
    </div>
  </div>

  <!-- Hero Section -->
  <section class="hero-section text-center text-white py-10"
    style="background-image: url('media/heroBG2.jpg'); background-size: cover; background-position: center; border-bottom: 2px solid black;   border-top: 2px solid black;">
    <div class="container">
      <h1>Find Your New Best Friend Today</h1>
      <p>Join us in our mission to find loving homes for pets in need.</p>
      <a href="petCards.php" class="btn btn-lg btn-outline-dark" style="background-color: #006a6a; color: white;">Adopt
        Now</a>
    </div>
  </section>

  <section class="intro" style="border-bottom: 2px solid black;">
    <div class="row">
      <!-- Left side with Bootstrap carousel -->
      <div class="col-md-6">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="media//p1.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="media/p2.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="media/p3.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="media/p4.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="media/p5.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="media/p6.png" class="d-block w-100" alt="...">
            </div>
          </div>
        </div>
      </div>
      <!-- Right side with note or text -->
      <div class="introNote col-md-6">
        <p><b><u>Welcome to PetPals, your compassionate companion in animal adoption.</u></b> Our platform is dedicated
          to
          connecting loving homes with animals in need of care and shelter. With a mission to promote responsible pet
          ownership and reduce animal homelessness, we provide a seamless experience for both prospective adopters and
          rescue organizations. Start your journey with PetPals today and embark on a rewarding adventure of
          companionship, love, and lifelong friendship.</p>
      </div>
    </div>
  </section>

  <!-- Featured Pets Section -->
  <section class="featured-pets py-5" style="border-bottom: 2px solid black;">
    <div class="container text-center">
      <h5><u><b>Meet Our Featured Pets</b></u></h5>
      <div class="row">
        <?php foreach ($featuredPets as $pet): ?>
          <div class="col-md-4">
            <div class="card" style="border: 2px solid black;">
              <img src="<?php echo $pet['photo']; ?>" class="card-img-top"
                style=" width: 100%; height: 50vh; object-fit: cover;" alt="Pet <?php echo $pet['name']; ?>">
              <div class="card-body">
                <h1 class="card-title">
                  <?php echo $pet['name']; ?>
                </h1>
                <a href="contact.html" class="btn" style="background-color: #006a6a; color: aliceblue;">Adopt
                  <?php echo $pet['name']; ?>
                </a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="campaigns" style="border-bottom: 2px solid black;">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
          aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
          aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
          aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="media/camp1.jpeg" class="d-block w-100 custom-carousel-img" alt="...">
          <div class="carousel-caption fw-bold d-none d-md-block">
            <h1><b>Water Bowl Campaigns</b></h1>
            <p>Distributed free water bowls during summers.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="media/camp2.jpeg" class="d-block w-100 custom-carousel-img" alt="...">
          <div class="carousel-caption text-dark fw-bold d-none d-md-block">
            <h1><b>Vaccination Drives</b></h1>
            <p>Carried out free vaccination drives in underprivileged areas.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="media/camp3.jpeg" class="d-block w-100 custom-carousel-img" alt="...">
          <div class="carousel-caption text-dark fw-bold d-none d-md-block">
            <h1><b>Food for All</b></h1>
            <p>Feeders time to time give food.</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </section>

  <div class="accordion" id="accordionExample" style="border-bottom: 2px solid black;">
    <div class="container mb-3">
      <h5><u>What to do if bitten by a wild animal??</u></h5>
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
            Step 1: Clean the Wound
          </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            Immediately clean the wound with soap and water. Use a clean cloth to stop any bleeding. Apply an antiseptic
            to prevent infection.
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Step 2: Seek Medical Attention
          </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            Even if the wound seems minor, it's important to see a doctor. They can assess the risk of infections like
            rabies and provide necessary treatments.
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Step 3: Follow Up Care
          </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            Follow the doctor's instructions for wound care and complete any prescribed medication. Monitor the wound
            for signs of infection.
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Testimonials Section -->
  <section class="testimonials py-5" style="border-bottom: 2px solid black;">
    <div class="container text-center">
      <h5><u>What Our Adopters Say</u></h5>
      <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <blockquote class="blockquote">
              <p class="mb-0">"Adopting from PetPals was the best decision we ever made. Our new puppy is a joy!"</p>
              <footer class="blockquote-footer">John Doe</footer>
            </blockquote>
          </div>
          <div class="carousel-item">
            <blockquote class="blockquote">
              <p class="mb-0">"The process was smooth and the staff were incredibly supportive."</p>
              <footer class="blockquote-footer">Jane Smith</footer>
            </blockquote>
          </div>
          <div class="carousel-item">
            <blockquote class="blockquote">
              <p class="mb-0">"We found our perfect furry companion thanks to PetPals."</p>
              <footer class="blockquote-footer">Mark Wilson</footer>
            </blockquote>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  </section>

  <section class="cards-section" style="border-bottom: 2px solid black;">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="card" style="border: 2px solid black;">
            <div class="card-body">
              <h5 class="card-title">Donate</h5>
              <p class="card-text">Support our cause by making a donation.</p>
              <a href="./donate.php" class="btn " style="background-color: #006a6a; color: aliceblue;">Donate Now</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card" style="border: 2px solid black;">
            <div class="card-body">
              <h5 class="card-title">Volunteer</h5>
              <p class="card-text">Join us as a volunteer and make a difference.</p>
              <a href="volunteer.php" class="btn " style="background-color: #006a6a; color: aliceblue;">Volunteer</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card" style="border: 2px solid black;">
            <div class="card-body">
              <h5 class="card-title">Adopt</h5>
              <p class="card-text">Find your new furry friend and adopt today.</p>
              <a href="petCards.php" class="btn" style="background-color: #006a6a; color: aliceblue;">Adopt Now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Newsletter Signup Section -->
  <section class="newsletter py-5 bg-light" style="border-bottom: 2px solid black;">
    <div class="container text-center">
      <h5><u>Stay Updated</u></h5>
      <p>Sign up for our newsletter to receive updates on new pets, events, and more.</p>
      <form action="newsletter_signup.php" method="post" class="row g-3 justify-content-center">
        <div class="col-auto">
          <input type="email" class="form-control" placeholder="Enter your email" required>
        </div>
        <div class="col-auto">
          <button type="submit" class="btn" style="background-color: #006a6a; color: aliceblue;">Subscribe</button>
        </div>
      </form>
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