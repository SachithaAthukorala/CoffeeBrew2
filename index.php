<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee Brew</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="icon" href="img/coffee-icon.png" type="image/x-icon">

</head>

<body data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-smooth-scroll="true" class="rounded-2 bg-black"
    tabindex="0">
    <?php
    require "connection.php";
    ?>
    <div class="container-fluid">

        <nav id="navbar-example2" class="navbar px-2 mb-2 navbar_custom">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-2"><img src="img/coffee-icon.png" style="width: 40px;" /></div>
                        <div class="col-10 mt-2"><a class="navbar-brand text-uppercase font1" href="index.html">Coffee
                                Brew</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-none d-sm-none d-md-none d-lg-block d-xl-block">
                <ul class="navbar nav">
                    <li class="nav-item menu_under me-2" id="menu1"><a class="nav-link menu_item text_orange fw-bold"
                            href="#home_section" onclick="underline(1);" id="m-i1">Home</a></li>
                    <li class="nav-item me-2" id="menu2"><a class="nav-link menu_item text-white-50 fw-bold"
                            href="#about_section" onclick="underline(2);" id="m-i2">About</a></li>
                    <li class="nav-item me-2" id="menu3"><a class="nav-link menu_item text-white-50 fw-bold"
                            href="#service_section" onclick="underline(3);" id="m-i3">Services</a></li>
                    <li class="nav-item me-2" id="menu4"><a class="nav-link menu_item text-white-50 fw-bold"
                            href="#menu_section" onclick="underline(4);" id="m-i4">Menu</a></li>
                    <li class="nav-item me-2" id="menu5"><a class="nav-link menu_item text-white-50 fw-bold"
                            href="#reservation_section" onclick="underline(5);" id="m-i5">Reservation</a></li>
                    <li class="nav-item me-2" id="menu6"><a class="nav-link menu_item text-white-50 fw-bold"
                            href="#contact_section" onclick="underline(6);" id="m-i6">Contact Us</a></li>
                </ul>
            </div>

            <div class="d-block d-sm-block d-md-block d-lg-none d-xl-none">
                <button class="tg_btn rounded-2" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                    <i class="bi bi-list" style="font-size: 25px;"></i>
                </button>

                <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar"
                    aria-labelledby="offcanvasDarkNavbarLabel">
                    <div class="offcanvas-header">
                        <div class="col-10">
                            <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Menu Items</h5>
                        </div>
                        <div class="col-2">
                            <button class="tg_btn rounded-2" type="button" data-bs-dismiss="offcanvas"
                                data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                                <i class="bi bi-x-lg" style="font-size: 22px;"></i>
                            </button>
                        </div>

                    </div>
                    <div class="offcanvas-body text-center fw-bold">
                        <ul class="navbar-nav justify-content-end flex-grow-1 ps-2 pe-2">
                            <li class="nav-item" id="menu1"><a class="nav-link menu_item" href="#home_section"
                                    onclick="underline(1);" data-bs-dismiss="offcanvas"
                                    data-bs-target="#offcanvasDarkNavbar">Home</a></li>
                            <li class="nav-item" id="menu2"><a class="nav-link menu_item" href="#about_section"
                                    onclick="underline(2);" data-bs-dismiss="offcanvas"
                                    data-bs-target="#offcanvasDarkNavbar">About</a></li>
                            <li class="nav-item" id="menu3"><a class="nav-link menu_item" href="#service_section"
                                    onclick="underline(3);" data-bs-dismiss="offcanvas"
                                    data-bs-target="#offcanvasDarkNavbar">Services</a></li>
                            <li class="nav-item" id="menu4"><a class="nav-link menu_item" href="#menu_section"
                                    onclick="underline(4);" data-bs-dismiss="offcanvas"
                                    data-bs-target="#offcanvasDarkNavbar">Menu</a></li>
                            <li class="nav-item" id="menu5"><a class="nav-link menu_item" href="#reservation_section"
                                    onclick="underline(5);" data-bs-dismiss="offcanvas"
                                    data-bs-target="#offcanvasDarkNavbar">Reservation</a></li>
                            <li class="nav-item" id="menu6"><a class="nav-link menu_item" href="#contact_section"
                                    onclick="underline(6);" data-bs-dismiss="offcanvas"
                                    data-bs-target="#offcanvasDarkNavbar">Contact Us</a></li>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>


        <section id="home_section" class="w-100">

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
                    <div class="carousel-item active" style="height: 100vh;">
                        <img src="img/bg_1.jpg" class="d-block w-100"
                            style="object-fit: cover; width: 100%; height: 100vh;">
                        <div class="carosel1_div">
                            <h1>Freshly Brewed Coffee</h1>
                            <p>Start your day with the perfect cup of coffee! From bold espresso to creamy lattes, we serve freshly brewed goodness made just for you.</p>
                        </div>
                    </div>

                    <div class="carousel-item" style="height: 100vh;">
                        <img src="img/bg_2.jpg" class="d-block w-100"
                            style="object-fit: cover; width: 100%; height: 100vh;">
                        <div class="carosel1_div">
                            <h1>Cozy Ambiance</h1>
                            <p>Relax, unwind, and enjoy the warm atmosphere of Your Favorite Coffee Shop. A space where great coffee meets great conversations.</p>
                        </div>
                    </div>

                    <div class="carousel-item" style="height: 100vh;">
                        <img src="img/bg_3.jpg" class="d-block w-100"
                            style="object-fit: cover; width: 100%; height: 100vh;">
                        <div class="carosel1_div">
                            <h1>Delicious Treats</h1>
                            <p>Pair your coffee with our delightful pastries and snacks. Sweet or savory, we’ve got the perfect treat to complement your favorite brew.</p>
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

        <section id="about_section" class="position-relative" style="height: 100vh; overflow: hidden;">

            <img src="img/about.jpg" alt="Background Image" class="position-absolute w-100"
                style="object-fit: cover; z-index: 0; height: 100vh;" data-aos="fade-up" data-aos-duration="3000" />


            <div class="container position-absolute top-50 start-50 translate-middle text-white aboutBgDiv"
                style="z-index: 1;">
                <div class="row align-items-start">

                    <div class="col-md-5 mb-4" data-aos="zoom-in-right" data-aos-duration="3000">
                        <p class="fs-2 mb-3 text-light">
                            <i class="bi bi-cup-hot fs-2 text-light"></i>&nbsp;&nbsp; Who We Are
                        </p>
                        <p class="fs-6 text-light">
                            At Coffee Brew, we are driven by a passion for Coffee & Pastry. Founded in 2024 by a group
                            of
                            visionaries who believe in the power of creativity, we’ve grown into a dedicated team of
                            professionals committed to making the best coffee in the world.
                        </p>
                        <br>
                        <button type="button" class="btn btn-outline-light me-2" onclick="scrollToSection()">Contact
                            Us</button>
                        <button type="button" class="btn btn-light">Menu</button>
                    </div>


                    <div class="col-md-7" data-aos="zoom-in-left" data-aos-duration="3000">
                        <div class="mb-4">
                            <p class="mb-3 text-light fs-2">
                                <i class="bi bi-crosshair fs-3 text-light"></i>&nbsp;&nbsp;Our Mission
                            </p>
                            <p class="fs-6 text-light">
                                Our mission is simple: to serve exceptional coffee, crafted with care, in an atmosphere
                                that
                                feels like home. We’re here to bring joy to your day, one cup at a time.
                            </p>
                        </div>
                        <div>
                            <p class="fs-2 mb-3 text-light">
                                <i class="bi bi-map text-light fs-3"></i>&nbsp;&nbsp;Our Story
                            </p>
                            <p class="fs-6 text-light">
                                It all started with a love for coffee and a dream of building a community. From sourcing
                                the
                                finest beans to perfecting every pour, we’ve poured our heart and soul into every
                                detail. Today,
                                Coffee
                                Brew is a reflection of our passion for quality, creativity, and connection.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section id="service_section" class="text-center py-5 sec position-relative mt-1"
            style="background: url('img/services.jpg') no-repeat center center/cover; color: #fff; min-height: 100vh;">

            <div class="container">
                <h2 class="fw-bold text-light mt-5">Our Services</h2>
                <p class="text-light">At Coffee Brew, we’re here to make your experience delightful. Here’s what we
                    offer:</p>

                <div class="row justify-content-center ms-1 me-1 mt-5">
                    <div class="col-12 col-md-4 mb-3">
                        <div class="service-card bg-dark bg-opacity-75 text-light rounded-3 shadow-lg p-4">
                            <img src="img/bev.jpg" class="rounded mb-3 img-fluid" alt="Beverages">
                            <div class="p-3">
                                <h5 class="fw-bold text-warning">Beverages</h5>
                                <p>Enjoy a variety of expertly crafted coffee, tea, and specialty drinks, perfect for
                                    any mood
                                    or
                                    occasion.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mb-3">
                        <div class="service-card bg-dark bg-opacity-75 text-light rounded-3 shadow-lg p-4">
                            <img src="img/food.jpg" class="rounded mb-3 img-fluid" alt="Bakery Items">
                            <div class="p-3">
                                <h5 class="fw-bold text-warning">Bakery Items</h5>
                                <p>Indulge in freshly baked treats, from flaky pastries to decadent desserts, made with
                                    love
                                    every
                                    day.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mb-3">
                        <div class="service-card bg-dark bg-opacity-75 text-light rounded-3 shadow-lg p-4">
                            <img src="img/reservation.jpg" class="rounded mb-3 img-fluid" alt="Book Reservations">
                            <div class="p-3">
                                <h5 class="fw-bold text-warning">Book Reservations</h5>
                                <p>Planning a special gathering or need a cozy space? Reserve a table and let us make
                                    your visit
                                    extra special.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="btn-container mt-4">
                    <button class="btn btn-warning me-2" onclick="menuLoad();">Check Menu</button>
                    <button class="btn btn-outline-light" onclick="scrollToReservation();">Book Reservation</button>
                </div>
            </div>
        </section>

        <?php
        $popular_rs = Database::search("SELECT * FROM `menu` WHERE `menu_status_id` = 1 AND `menu_rating_top_id` = 1");
        $popular_num = $popular_rs->num_rows;
        ?>
        <section class="popular-section py-5" id="menu_section">
            <div class="container-fluid text-center position-relative z-">
                <h2 class="mb-3 z-3 position-relative text-light">Most Popular</h2>
                <p class=" mb-5 z-3 position-relative text-light">Our Most Popular Items</p>

                <div class="owl-nav-left z-2"></div>
                <div class="row align-items-center mb-3 z-1">
                    <div class="col-12">
                        <div class="owl-carousel owl-theme z-1">

                            <?php
                            for ($x = 0; $x < $popular_num; $x++) {
                                $menu_data = $popular_rs->fetch_assoc();
                                $name = $menu_data["name"];
                                $img_path = $menu_data["img_path"];
                            ?>
                                <div class="item">
                                    <div class="card border-0 shadow handCursor">
                                        <img src="<?php echo ($img_path); ?>" class="card-img-top owlImg"
                                            style="height: 250px;">
                                        <div class="card-body">
                                            <p class="card-text"><?php echo ($name); ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>
                <div class="owl-nav-right z-2"></div>
                <div class="mt-4">
                    <button class="btn btn-menu z-3 position-relative" onclick="menuLoad();">Explore Menu</button>
                </div>
            </div>
        </section>


        <section class="reservation-container d-flex align-items-center sec" id="reservation_section">
            <div class="container">
                <div class="row align-items-center justify-content-center mt-4">
                    <div class="col-lg-6 col-md-10 col-sm-12 reservation-image" data-aos="zoom-in"
                        data-aos-duration="3000"></div>
                    <div class="col-lg-6 col-md-10 col-sm-12 reservation-form p-4 rounded shadow">
                        <h2 class="text-center mb-4">Make Reservation</h2>

                        <div class="mb-3">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="fname" placeholder="First Name">
                        </div>
                        <div class="mb-3">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lname" placeholder="Last Name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Email">
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" class="form-control" id="date" onchange="checkDate()">
                            </div>
                            <div class="col-md-4">
                                <label for="time" class="form-label">Time</label>
                                <input type="time" class="form-control" id="time" onchange="checkTime()">
                            </div>
                            <div class="col-md-4">
                                <label for="mobile" class="form-label">Mobile</label>
                                <input type="tel" class="form-control" id="mobile" placeholder="Mobile">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" rows="3" placeholder="Message"></textarea>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-coffee" onclick="reservation();">Make Reservation</button>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <section id="contact_section" class="position-relative py-5"
            style="background: url('img/bg_3.jpg') no-repeat center center/cover; min-height: 100vh;">

            <div class="container">
                <h1 class="text-center fw-bold mt-5 text-light">Contact Us</h1>

                <div class="row mt-4 p-4 rounded" style="background: rgba(44, 44, 44, 0.8); color: #d7b899;">
                    <div class="col-md-6">
                        <div>
                            <div class="mb-3 me-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="contact_name" name="name" required
                                    placeholder="Name" style="background: #f5f5f5; color: #4e342e; border: none;">
                            </div>
                            <div class="mb-3 me-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="contact_email" name="email" required
                                    placeholder="Email" style="background: #f5f5f5; color: #4e342e; border: none;">
                            </div>
                            <div class="mb-3 me-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control" id="contact_message" name="message" rows="6" required
                                    placeholder="Your Message"
                                    style="background: #f5f5f5; color: #4e342e; border: none;"></textarea>
                            </div>
                            <div class="me-3">
                                <button class="btn w-100 mt-3" onclick="contactUs();"
                                    style="background: #4e342e; color: #f5f5f5; border: none;"
                                    onmouseover="this.style.background='#8d6e63';"
                                    onmouseout="this.style.background='#4e342e';">Send</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mt-sm-3">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <i class="bi bi-telephone me-2" style="color: #e0a96d;"></i>
                                <h5 class="fw-bold d-inline">Phone</h5>
                                <p class="mb-0 ms-4">000 (123) 456 7890</p>
                                <p class="ms-4">000 (123) 456 7890</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <i class="bi bi-clock me-2" style="color: #e0a96d;"></i>
                                <h5 class="fw-bold d-inline">Open</h5>
                                <p class="mb-0 ms-4">Monday - Saturday</p>
                                <p class="ms-4">08:00 A.M - 09:00 P.M</p>
                            </div>
                        </div>

                        <div class="mb-3">
                            <i class="bi bi-envelope me-2" style="color: #e0a96d;"></i>
                            <h5 class="fw-bold d-inline">Email</h5>
                            <p class="ms-4">coffeebrew@gmail.com</p>
                        </div>

                        <div class="mb-3">
                            <i class="bi bi-geo-alt me-2" style="color: #e0a96d;"></i>
                            <h5 class="fw-bold d-inline">Location</h5>
                            <p class="ms-4">456 Coffee Lane, Seattle WA 98101 SL</p>
                        </div>

                        <div class="mt-3">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3947.414684061172!2d80.50076197466394!3d8.360803391676246!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3afc8a63370239cb%3A0xfde408ba97b0d4d3!2sRajarata%20University%20of%20Sri%20Lanka!5e0!3m2!1sen!2slk!4v1737095663729!5m2!1sen!2slk"
                                width="100%" height="170" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <footer class="py-4" style="background-color: #00000080; color: #ecf0f1; border-top: 2px solid #00000080;">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 text-center text-md-start mb-3 mb-md-0">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-2"><img src="img/coffee-icon.png" style="width: 40px;" /></div>
                                <div class="col-10 mt-2"><a class="navbar-brand text-uppercase font1"
                                        href="index.html">Coffee
                                        Brew</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 text-center mb-3 mb-md-0">
                        <ul class="list-inline m-0">
                            <li class="list-inline-item mx-2">
                                <a href="#home_section" class="text-decoration-none" style="color: #ecf0f1;">Home</a>
                            </li>
                            <li class="list-inline-item mx-2">
                                <a href="#about_section" class="text-decoration-none" style="color: #ecf0f1;">About</a>
                            </li>
                            <li class="list-inline-item mx-2">
                                <a href="#service_section" class="text-decoration-none"
                                    style="color: #ecf0f1;">Services</a>
                            </li>
                            <li class="list-inline-item mx-2">
                                <a href="#menu_section" class="text-decoration-none" style="color: #ecf0f1;">Menu</a>
                            </li>
                            <li class="list-inline-item mx-2">
                                <a href="#reservation_section" class="text-decoration-none"
                                    style="color: #ecf0f1;">Reservation</a>
                            </li>
                            <li class="list-inline-item mx-2">
                                <a href="#contact_section" class="text-decoration-none" style="color: #ecf0f1;">Contact
                                    Us</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3 text-center text-md-end">
                        <a href="https://www.linkedin.com/in/sachitha-athukorala/" class="text-decoration-none mx-2">
                            <i class="bi bi-instagram" style="color: #ecf0f1; font-size: 1.5rem;"></i>
                        </a>
                        <a href="https://www.linkedin.com/in/sachitha-athukorala/" class="text-decoration-none mx-2">
                            <i class="bi bi-facebook" style="color: #ecf0f1; font-size: 1.5rem;"></i>
                        </a>
                        <a href="https://www.linkedin.com/in/sachitha-athukorala/" class="text-decoration-none mx-2">
                            <i class="bi bi-linkedin" style="color: #ecf0f1; font-size: 1.5rem;"></i>
                        </a>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <p class="m-0" style="color: #bdc3c7;">&copy; 2025 Your Coffee Brew. All rights reserved by
                        <a href="https://www.linkedin.com/in/sachitha-athukorala"
                            style="color: #3498db; text-decoration: none;">Sachitha
                            Athukorala</a>.
                    </p>
                </div>
            </div>
        </footer>



    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/script.js"></script>
</body>

</html>