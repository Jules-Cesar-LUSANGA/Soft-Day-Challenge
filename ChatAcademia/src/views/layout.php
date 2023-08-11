<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="src/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <link href="src/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
        <link href="src/assets/vendor/aos/aos.css" rel="stylesheet">
        <link href="src/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="src/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="src/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="src/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
        <link href="src/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
        <link href="src/assets/css/style.css" rel="stylesheet">

</head>

<body style="background-color: #eee;">

    <?php include "src/views/includes/header.php"; ?>
    
    <main class="mt-4 pt-4">

        <?= $content ?>
        
    </main>



    <script src="src/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="src/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="src/assets/vendor/aos/aos.js"></script>
    <script src="src/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="src/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="src/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="src/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="src/assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="src/assets/js/main.js"></script>
    
</body>
</html>