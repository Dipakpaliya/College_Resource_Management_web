<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/favicon.png">
    <title>GECG-Home page</title>
    <link rel="stylesheet" href="home.css">
</head>

<body>
    <?php include "navbar.php"; ?>
    <!-- //home page content will be there -->

    <div class="herosection">
        <div class="slideshowcontainer">
        <div class="mySlides fade">
                <div class="numbertext">1 / 3</div>
                <img src="./images/im3.jpg" class="sliderimg">
                <div class="text">Administrative department</div>
            </div>
           
            <div class="mySlides fade">
                <div class="numbertext">2 / 3</div>
                <img src="./images/im2.jpg" class="sliderimg">
                <div class="text">Library</div>
            </div>
        

            <div class="mySlides fade">
                <div class="numbertext">3 / 3</div>
                <img src="./images/computerdepartment img.webp" class="sliderimg">
                <div class="text">computer Department</div>
            </div>
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <br>
        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>

    </div>
    <script>
        var slideIndex = 1;
        showSlides(slideIndex);
        function plusSlides(n) {
            showSlides(slideIndex += n);
        }
        function currentSlide(n) {
            showSlides(slideIndex = n);
        }
        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            if (n > slides.length) { slideIndex = 1 }
            if (n < 1) { slideIndex = slides.length }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
        }
        setInterval(function () {
            plusSlides(1);
        }, 3000);


    </script>
</body>

</html>