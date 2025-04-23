<!doctype html>
<html>

<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="style.css">
  <link rel="icon" type="image/x-icon" href="img/Logo2.png">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <title>97CAR</title>
</head>

<body>


  <?php include('entete.php'); ?>

  <div class="slideshow-container">

    <!-- Full-width images with number and caption text -->
    <div class="mySlides fade" style="text-align:center">
      <div class="numbertext">1 / 3</div>
      <img src="img/Logo1.jpg" style="width:50%">
      <div class="text"></div>
    </div>

    <div class="mySlides fade" style="text-align:center">
      <div class="numbertext">2 / 3</div>
      <img src="img/garage.jpg" style="width:50%">
      <div class="text"></div>
    </div>

    <div class="mySlides fade" style="text-align:center">
      <div class="numbertext">3 / 3</div>
      <img src="img/Logo2.png" style="width:50%">
      <div class="text"></div>
    </div>

    <!-- Next and previous buttons -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
  </div>
  <br>

  <!-- The dots/circles -->
  <div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
  </div>


  <script>
    let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
      showSlides(slideIndex += n);
    }

    function currentSlide(n) {
      showSlides(slideIndex = n);
    }

    function showSlides(n) {
      let i;
      let slides = document.getElementsByClassName("mySlides");
      let dots = document.getElementsByClassName("dot");
      if (n > slides.length) {
        slideIndex = 1
      }
      if (n < 1) {
        slideIndex = slides.length
      }
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex - 1].style.display = "block";
      dots[slideIndex - 1].className += " active";
    }
  </script>



  <!-- Footer -->

</body>

</html>