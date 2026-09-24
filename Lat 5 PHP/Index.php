
<!doctype html>
<html lang="en">
    <head>
        <title>Web Portofolio</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="asset/css/bootstrap.min.css">
        <script src="asset/js/jquery.js"></script>
        <script src="asset/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.5.0"></script>

        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }
            
            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }

            .carousel-inner img {
                width: 100%;
                height: 600px;
            }
            
            .grid-container {
                display: grid;
                grid-template-columns: 300px 100px 600px;
                margin-left: 50px;
            }

            html {
                scroll-behavior: smooth;
                scroll-padding-top: 30%;
            }

        </style>
    </head>
    
    <body>
        <?php
        $servername = "localhost";
        $username = "user20242039";
        $password = "OHIvkK";
        $dbname = "user20242039";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        $contents = [];
        $result = $conn->query("SELECT * FROM web_content");
        if ($result && $result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $contents[$row['section_name']] = $row;
            }
        }

        $labels = [];
        $votes = [];

        $chart_result = $conn->query("SELECT star_label, total_votes FROM review_ratings");
        if ($chart_result && $chart_result->num_rows > 0) {
            while($row = $chart_result->fetch_assoc()) {
                $labels[] = $row['star_label'];
                $votes[] = (int)$row['total_votes'];
            }
        }

        $json_labels = json_encode($labels);
        $json_votes = json_encode($votes);
        ?>
            
        <header>
            <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                <!-- Logo Navbar -->
                <a class="navbar-brand" href="#">
                    <img src="asset/img/logo.png" alt="logo" style="width:40px;">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Section Navbar -->
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">      
                            <a class="nav-link" href="#home">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#services">Services</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#about">About</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact</a>
                        </li>
                    </ul>

                    <!-- Search -->
                    <form class="form-inline mt-2 mt-md-0">
                        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </nav>
        </header>
        
        <main role="main">
            <div id="demo" class="carousel slide" data-ride="carousel">
                <ul class="carousel-indicators">
                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                    <li data-target="#demo" data-slide-to="1"></li>
                    <li data-target="#demo" data-slide-to="2"></li>
                </ul>
            
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="asset/img/bg-1.png" alt="BG1" width="1100" height="500">
                        <div class="carousel-caption">
                            <h3>Bg-1</h3>
                        </div>
                    </div>

                    <div class="carousel-item"> 
                        <img src="asset/img/bg-2.png" alt="BG2" width="1100" height="500">
                        <div class="carousel-caption">
                            <h3>Bg-2</h3>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <img src="asset/img/head-bg.png" alt="BG3" width="1100" height="500">
                        <div class="carousel-caption">
                            <h3>Bg-3</h3>
                        </div>   
                    </div>
                        
                </div>
                    
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>

                <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>

            <div class="container mt-5">
                <!-- 3 Images -->
                <section id="home">
                    <div class="row">
                        <div class="col-lg-4">
                            <svg class="rounded" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
                                <title>Services</title>
                                <rect width="100%" height="100%" fill="white"/>
                                <image href="asset/img/services.png" x="0" y="0" width="100%" height="100%" preserveAspectRatio="xMidYMid slice" />
                            </svg>
                            <h2>SERVICES</h2>
                            <p>We deliver expert PLC, C++, and Arduino engineering to turn hardware concepts into robust, production-ready systems.</p>
                            <p><a class="btn btn-secondary" href="#services">View details &raquo;</a></p>
                        </div>
                        
                        <div class="col-lg-4">
                            <svg class="rounded" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
                                <title>About</title>
                                <rect width="100%" height="100%" fill="white"/>
                                <image href="asset/img/waltuh.jpg" x="0" y="0" width="100%" height="100%" preserveAspectRatio="xMidYMid slice" />
                            </svg>
                            <h2>ABOUT</h2>
                            <p>We provide expert PLC, C++, and Arduino programming to turn hardware concepts into robust, production-ready systems.</p>
                            <p><a class="btn btn-secondary" href="#about">View details &raquo;</a></p>
                        </div>
                    
                        <div class="col-lg-4">
                            <svg class="rounded" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
                                <title>Contact</title>
                                <rect width="100%" height="100%" fill="white"/>
                                <image href="asset/img/contact.png" x="0" y="0" width="100%" height="100%" preserveAspectRatio="xMidYMid slice" />
                            </svg>
                            <h2>CONTACT</h2>
                            <p>Contact us for expert PLC, C++, and Arduino programming to turn hardware concepts into robust reality.</p>
                            <p><a class="btn btn-secondary" href="#contact">View details &raquo;</a></p>
                        </div>
                    </div>
                </section>

                <!-- Services -->
                <section id="services">
                    <hr class="featurette-divider">

                    <div class="row featurette">
                        <div class="col-md-10">
                            <!-- dari DB -->
                            <h2 class="featurette-heading"><?php echo $contents['services']['title'] ?? 'SERVICES'; ?><br><span class="text-muted">All Of My Services!</span></h2>
                            <p class="lead"><?php echo $contents['services']['content'] ?? ''; ?></p>
                        </div>
                
                        <div class="col-md-2">
                            <svg class="img-fluid mx-auto" width="180" height="180" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 180x180" preserveAspectRatio="xMidYMid slice" focusable="false">
                                <title>Services</title>
                                <rect width="100%" height="100%" fill="white"/>
                                <image href="asset/img/services2.png" x="0" y="0" width="100%" height="100%" preserveAspectRatio="xMidYMid slice" />
                            </svg>
                        </div>
                    </div>
                    
                    <div class="row text-justify mx-auto">
                        <div class="col-lg">
                            <h2>PLC</h2>
                            <p>A Programmable Logic Controller (PLC) is a rugged industrial computer used to automate electromechanical processes, machinery, and production lines.</p>
                        </div>

                        <div class="col-lg">
                            <h2>C#/C++</h2>
                            <p>C# and C++ are distinct, powerful programming languages derived from the original C language, but they serve completely different purposes.</p>
                        </div>
                        <div class="col-lg">
                            <h2>Arduino</h2>
                            <p>Arduino is an open-source electronics platform made up of easy-to-use physical circuit boards and software used to build digital devices and interactive projects.</p>
                        </div>
                    </div>
                </section>

                <!-- About -->
                <section id="about">
                    <hr class="featurette-divider">

                    <div class="row featurette">
                        <div class="col-md-10 order-md-2">
                            <!-- dari DB -->
                            <h2 class="featurette-heading"><?php echo $contents['about']['title'] ?? 'ABOUT'; ?><br><span class="text-muted">All About Me!</span></h2>
                            <p class="lead"><?php echo $contents['about']['content'] ?? ''; ?></p>
                        </div>

                        <div class="col-md-2 order-md-1">
                            <svg class="img-fluid mx-auto" width="180" height="180" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 180x180" preserveAspectRatio="xMidYMid slice" focusable="false">
                                <title>About</title>
                                <rect width="100%" height="100%" fill="white"/>
                                <image href="asset/img/about2.png" x="0" y="0" width="100%" height="100%" preserveAspectRatio="xMidYMid slice" />
                            </svg>
                        </div>
                    </div>    
                

                    <!-- Performance -->
                    <div class="row mx-auto">
                        <div class="col-lg-4 text-justify">
                            <h2>Performance Review</h2>
                            <p>Demonstrates exceptional technical skill in PLC, C++, and Arduino programming, consistently turning complex hardware concepts into robust systems. Delivers clean, modular code that successfully scales prototypes and eliminates industrial downtime.</p>
                        </div>

                        <!-- Chart -->
                        <div class="col-lg-8">

                            <canvas id="myChart" style="width:100%;max-width:600px"></canvas>

                            <script>
                                // Mengambil data dinamis dari PHP menggunakan json_encode
                                const xValues = <?php echo $json_labels; ?>; 
                                const yValues = <?php echo $json_votes; ?>;
                                
                                const barColors = [
                                    "#b91d47",
                                    "#00aba9",
                                    "#2b5797",
                                    "#e8c3b9",
                                    "#1e7145"
                                ];
                                
                                const ctx = document.getElementById('myChart');
                                new Chart(ctx, {
                                    type: "bar",
                                    data: {
                                        labels: xValues,
                                        datasets: [{
                                            backgroundColor: barColors,
                                            data: yValues
                                        }]
                                    },
                                    options: {
                                        plugins: {
                                            legend: {display:false},
                                            title: {
                                                display: false,
                                                text: "Star Review",
                                                font: {size:16}
                                            }
                                        }
                                    }
                                });
                            </script>

                        </div>
                    </div>
                </section>

                <!-- Contact -->
                <section id="contact">
                    <hr class="featurette-divider">

                    <div class="row featurette">
                        <div class="col-md-10">
                            <!-- dari DB -->
                            <h2 class="featurette-heading"><?php echo $contents['contact']['title'] ?? 'CONTACT'; ?><br><span class="text-muted">Contact Us!</span></h2>
                            <p class="lead"><?php echo $contents['contact']['content'] ?? ''; ?></p>
                        </div>

                        <div class="col-md-2">
                            <svg class="img-fluid mx-auto" width="180" height="180" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 180x180" preserveAspectRatio="xMidYMid slice" focusable="false">
                                <title>Contact</title>
                                <rect width="100%" height="100%" fill="white"/>
                                <image href="asset/img/contact2.png" x="0" y="0" width="100%" height="100%" preserveAspectRatio="xMidYMid slice" />
                            </svg>
                        </div>

                        <div style="width: 100%;">
                            <form action="actionsubmit.php" method="post">
                                <div style="text-align: center;">
                                    <input style="width: 50%; height:25px; border: 1px solid black; border-radius: 3px;" type="text" name="fname" placeholder=" Username" required>
                                </div>

                                <div style="text-align: center;">
                                    <input style="width: 50%; height:25px; border: 1px solid black; border-radius: 3px; margin-top: 20px;" type="text" name="femail" placeholder=" E-mail" required>
                                </div>

                                <div style="text-align: center;">
                                    <textarea style="width: 80%; height:100px; border: 1px solid black; border-radius: 5px; margin-top: 20px;" name="fcomment" placeholder=" Comment"></textarea>
                                </div>
                                
                                <input type="submit" value="Submit" style="width: 100px; margin-left: 10%; margin-top: 20px;" class="btn btn-success">
                                
                            </form>
                        </div>
                    </div>
                </section>

                <hr class="featurette-divider">
            </div>
            
            <!-- FOOTER -->
            <footer class="container">
                <p>&copy; 2026-2026 Seanes, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a> &middot; <a href="#">Copyright</a></p>
            </footer>

        </main>


        <script>
            // 1. Ambil semua elemen section dan link menu
            const sections = document.querySelectorAll('section, div[id]');
            const navLinks = document.querySelectorAll('.nav-link');

            const options = {
            root: null,
            rootMargin: '0px',
            threshold: 1
            };

            const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                const id = entry.target.getAttribute('id');

                navLinks.forEach(link => {
                    link.classList.remove('active');
                    if (link.getAttribute('href') === `#${id}`) {
                    link.classList.add('active');
                    }
                });
                }
            });
            }, options);

            sections.forEach(section => {
            observer.observe(section);
            });
        </script>
    </body>
</html>
