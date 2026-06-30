<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GeoLink - Home</title>
    <link rel="stylesheet" href="assets/home.css">
</head>
<body>

<div class="container">
     <nav class="navbar">

        <div class="logo"> GeoLink</div>

        <ul class="nav-links">
            <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="#"><i class="fas fa-paperclip"></i> Internships</a></li>
            <li><a href="#"><i class="fas fa-briefcase"></i> Applications</a></li>
            <li><a href="#"><i class="fas fa-file"></i> Attachments</a></li>
            <li><a href="#"><i class="fas fa-circle-info"></i> About Us</a></li>
            <li><a href="#"><i class="fas fa-user"></i> Profile</a></li>

        </ul>

    </nav>

    <section class="hero">
        <h1>Welcome, Graduate User!</h1>
        <p>
            Explore the latest technology and internship opportunities on
            GeoLink. We're here to help you connect with your future.
        </p>
    </section>

 

    <section class="banner"> <!-- <img src="images/banner.jpg"-->  alt="Technology Banner"></section>


    <section class="featured">
        <h2>Featured Organizations</h2>
        <div class="cards">
            <div class="card">
                <!--<img src="images/company1.png" alt="Company"> -->
                <h3>Tech Solutions Inc.</h3>
                <p>
                    Leading innovator in software engineering and
                    digital transformation.
                </p>

                <a href="#" class="btn">
                    Learn More
                </a>
            </div>

            <div class="card">
                <!--<img src="images/company2.png" alt="Company"> -->
                <h3>Global Data Corp.</h3>
                <p>
                    Specializing in big data analytics and cloud
                    infrastructure.
                </p>
                <a href="#" class="btn">
                    Learn More
                </a>
            </div>

            <div class="card">
                <!--<img src="images/company3.png" alt="Company"> -->
                <h3>CyberSecure Ltd.</h3>
                <p>
                    Providing cutting-edge cybersecurity solutions
                    worldwide.
                </p>
                <a href="#" class="btn">
                    Learn More
                </a>
            </div>

        </div>

    </section>


    <section class="news">
        <h2>Latest Industry News</h2>
        <div class="news-grid">
            <div class="news-card">
                <h3>The Rise of Quantum Computing</h3>
                <p>
                    Exploring the impact of quantum computing on
                    future industries and career opportunities.
                </p>
                <a href="#">Read More</a>
            </div>

            <div class="news-card">
                <h3>AI in Healthcare: A New Frontier</h3>
                <p>
                    Artificial Intelligence continues to transform
                    diagnosis, treatment and patient care.
                </p>
                <a href="#">Read More</a>
            </div>

        </div>
    </section>
</div>

</body>
</html>