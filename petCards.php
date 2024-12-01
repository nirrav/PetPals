<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'config.php';

    $name = $conn->real_escape_string($_POST['name']);
    $animalType = $conn->real_escape_string($_POST['animalType']);
    $color = $conn->real_escape_string($_POST['color']);
    $bloodGroup = $conn->real_escape_string($_POST['bloodGroup']);
    $age = $conn->real_escape_string($_POST['age']);
    $note = $conn->real_escape_string($_POST['note']);
    $location = $conn->real_escape_string($_POST['location']);

    $target_dir = "uploads/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // Handle profile photo upload
    $photo_path = "";
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == UPLOAD_ERR_OK) {
        $photo = $_FILES['photo'];
        $target_file = $target_dir . basename($photo['name']);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $check = getimagesize($photo['tmp_name']);

        if ($check !== false && $photo['size'] <= 50000000 && in_array($imageFileType, ["jpg", "jpeg", "png", "gif"])) {
            if (move_uploaded_file($photo['tmp_name'], $target_file)) {
                $photo_path = $target_file;
            }
        }
    }

    $album_photos_paths = [];
    // Handle multiple album photos upload
    if (isset($_FILES['album_photos'])) {
        foreach ($_FILES['album_photos']['tmp_name'] as $key => $tmp_name) {
            $target_file = $target_dir . basename($_FILES['album_photos']['name'][$key]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $check = getimagesize($tmp_name);

            if ($check !== false && $_FILES['album_photos']['size'][$key] <= 50000000 && in_array($imageFileType, ["jpg", "jpeg", "png", "gif"])) {
                if (move_uploaded_file($tmp_name, $target_file)) {
                    $album_photos_paths[] = $target_file;
                }
            }
        }
    }

    $photo_album_str = implode(',', $album_photos_paths);

    if ($photo_path !== "") {
        $stmt = $conn->prepare("INSERT INTO animal_adoption (name, animalType, color, bloodGroup, age, note, photo, photo_album, location) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssissss", $name, $animalType, $color, $bloodGroup, $age, $note, $photo_path, $photo_album_str, $location);
    } else {
        $stmt = $conn->prepare("INSERT INTO animal_adoption (name, animalType, color, bloodGroup, age, note, photo_album, location) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssisss", $name, $animalType, $color, $bloodGroup, $age, $note, $photo_album_str, $location);
    }

    if ($stmt->execute()) {
        $_SESSION['message'] = "New record created successfully!";
    } else {
        $_SESSION['message'] = "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    header("Location: petCards.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Adopt an Animal - Find a New Family Member</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
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
                        <a class="nav-link dropdown-toggle active" href="" role="button"
                            aria-expanded="false">
                            How can you help us?
                        </a>
                        <ul class="dropdown-menu" style="background-color: #006a6a; border: 2px solid black;">
                            <li><a class="dropdown-item" style="border-bottom: 2px solid black;"
                                    href="volunteer.php">Volunteer</a>
                            </li>
                            <li><a class="dropdown-item" style="border-bottom: 2px solid black;" href="./donate.php">Donate</a>
                            </li>
                            <li><a class="dropdown-item" style="border-bottom: 2px solid black;" href="./sponsor_meal.php">Sponsor a
                                    Meal</a></li>
                            <li>
                                <button class="dropdown-item" style="border-top: 2px solid black;"
                                    data-bs-toggle="modal" data-bs-target="#registerAnimalModal">
                                    Register Animal
                                </button>
                            </li>

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

    <div class="container mt-4">
        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-info">
                <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']);
                ?>
            </div>
        <?php endif; ?>
        <div class="row" id="pet-cards-container">
            <div class="row">
                <?php
                include 'config.php';
                $sql = "SELECT id, name, animalType, color, bloodGroup, age, note, photo FROM animal_adoption";
                $result = $conn->query($sql);
                $conn->close();

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <div class="col-md-4">
                            <div class="pet-card">
                                <img src="<?php echo htmlspecialchars($row["photo"]); ?>"
                                    alt="<?php echo htmlspecialchars($row["name"]); ?>" loading="lazy">
                                <h1><?php echo htmlspecialchars($row["name"]); ?></h1>
                                <p>Animal: <?php echo htmlspecialchars($row["animalType"]); ?></p>
                                <p>Age: <?php echo htmlspecialchars($row["age"]); ?> years</p>
                                <p>Color: <?php echo htmlspecialchars($row["color"]); ?></p>
                                <p>Blood Group: <?php echo htmlspecialchars($row["bloodGroup"]); ?></p>
                                <a class="btn remove-btn text-light" style="  background-color: #006a6a;"
                                    href="pet_profile.php?id=<?php echo htmlspecialchars($row['id']); ?>">View
                                    Profile</a>

                            </div>
                        </div>
                        <?php
                    }

                } else {
                    echo '<p>No animals available for adoption at the moment.</p>';
                }
                ?>
            </div>
        </div>
    </div>

    <div class="modal fade" style="background: #f9d0c2;" id="registerAnimalModal" tabindex="-1"
        aria-labelledby="registerAnimalModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="registerAnimalModalLabel">Register Animal</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="animalType">Animal Type:</label>
                            <input type="text" class="form-control" id="animalType" name="animalType" required>
                        </div>
                        <div class="form-group">
                            <label for="color">Color:</label>
                            <input type="text" class="form-control" id="color" name="color" required>
                        </div>
                        <div class="form-group">
                            <label for="bloodGroup">Blood Group:</label>
                            <input type="text" class="form-control" id="bloodGroup" name="bloodGroup">
                        </div>
                        <div class="form-group">
                            <label for="age">Age:</label>
                            <input type="number" class="form-control" id="age" name="age" required>
                        </div>
                        <div class="form-group">
                            <label for="note">Note:</label>
                            <textarea class="form-control" id="note" name="note"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="photo">Photo:</label>
                            <input type="file" class="form-control-file" id="photo" name="photo" accept="image/*"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="album_photos">Photo Album:</label>
                            <input type="file" class="form-control-file" id="album_photos" name="album_photos[]"
                                accept="image/*" multiple>
                        </div>
                        <div class="form-group">
                            <label for="location">Location:</label>
                            <input type="text" class="form-control" id="location" name="location" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" crossorigin="anonymous">
    </script>
    <script src="script.js"></script>
</body>

</html>