<?php
$var = ""; 
if(isset($_POST['moviename'])) 
     $movieTitle = $_POST['movieTitle'];
     $movieImg = $_POST['movieImg']; 
     $movieYear = $_POST['movieYear']; 

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> <?php echo $movieTitle ?></title>

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="./assets/css/style.css">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body id="#top">

  <!-- 
    - #HEADER
  -->

  <header class="header" data-header>
    <div class="container">

      <div class="overlay" data-overlay></div>

      <a href="./index.php" class="logo">
        <img src="https://www.kindpng.com/picc/m/247-2472932_lucas-logo-hd-png-download.png" alt="Filmlane logo">
      </a>

      <div class="header-actions">

        <button class="btn btn-primary">Cart</button>

      </div>

      <button class="menu-open-btn" data-menu-open-btn>
        <ion-icon name="reorder-two"></ion-icon>
      </button>

      <nav class="navbar" data-navbar>

        <div class="navbar-top">

          <a href="./index.php" class="logo">
            <img src="https://www.kindpng.com/picc/m/247-2472932_lucas-logo-hd-png-download.png" alt="Filmlane logo">
          </a>

          <button class="menu-close-btn" data-menu-close-btn>
            <ion-icon name="close-outline"></ion-icon>
          </button>

        </div>

        <ul class="navbar-list">

          <li>
            <a href="./index.php" class="navbar-link">Home</a>
          </li>

          <li>
            <a href="#" class="navbar-link">Movie</a>
          </li>

          <li>
            <a href="#" class="navbar-link">Tv Show</a>
          </li>

          <li>
            <a href="./booking.php" class="navbar-link">My Bookings</a>
          </li>

        </ul>

        <ul class="navbar-social-list">

          <li>
            <a href="#" class="navbar-social-link">
              <ion-icon name="logo-twitter"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="navbar-social-link">
              <ion-icon name="logo-facebook"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="navbar-social-link">
              <ion-icon name="logo-pinterest"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="navbar-social-link">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="navbar-social-link">
              <ion-icon name="logo-youtube"></ion-icon>
            </a>
          </li>

        </ul>

      </nav>

    </div>
  </header>





  <main>
    

      <!-- 
        - #MOVIE DETAIL
      -->

  
    <article>
      <section class="movie-detail">
        <div class="container">

          <figure class="movie-detail-banner">

            <img src="<?php echo $movieImg ?>" alt="<?php echo $movieTitle; ?>">

            <button class="play-btn">
              <ion-icon name="play-circle-outline"></ion-icon>
            </button>

          </figure>

          <div class="movie-detail-content">

            <p class="detail-subtitle">Ready to Book?</p>

            <h1 class="h1 detail-title">
              <?php echo $movieTitle; ?>
            </h1>

            <div class="meta-wrapper">

              <div class="date-time">

                <div>
                  <ion-icon name="calendar-outline"></ion-icon>

                  <time datetime="2021"><?php echo $movieYear ?></time>
                </div>

                <div>
                  <ion-icon name="time-outline"></ion-icon>
                  <a>23/03/2023 19:00</a>
                  
                </div>
                <div class="title-wrapper">
                    <div class="badge badge-outline">Dublin</div>
                  </div>
                  <div>
                    <h3 class="card-price">€ 10.99</h3>
                  </div>

              </div>

            </div>

            <div class="details-actions">

              <button id="myBtn" class="btn btn-primary">
                <ion-icon name="cart-outline"></ion-icon>

                <span>Book it</span>
              </button>
      

            </div>

          </div>

          <div id="myModal" class="modal">
          
            <!-- Modal content -->
            <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <div id="booking">
								<div>
									<p>Please complete the booking form below.</p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-8 col-sm-8 col-xs-12">
									<!-- form -->
									<form style="text-align: center;" method="POST" id="bookingForm" name="bookingform" action="movie_bookings.php">
										<fieldset class="form">
                      <h2>Booking Detail:</h2>
											<div style="display:none;" id="user">
												<label for="username">Username</label>
												<input type="text" name="username">
											</div>
											<div>
												<label class="label1" for="contactEmail"><span class="required"></span></label>
												<input type="text" onkeyup="this.value=this.value.replace(/[^A-Za-z.' ']/g,'')" placeholder="Name" size="35" id="namebook" name="name" required>
											</div>
                      <br>
											<div>
												<label class="label1" for="contactEmail"><span class="required"></span></label>
												<input type="email" placeholder="Email" id="email" name="email" style="color:black;" required>
											</div>
											<div style="align-items: center;">
                        <button class="btn btn-primary" value="Submit" onclick="confirm()">
                          <ion-icon name="cart-outline"></ion-icon>
                          <span>Book it</span>
                        </button>
											</div>
										</fieldset>
									</form>
                  
								</div>
							</div>
						</div>
            </div>

          </div>

        </div>
      </section>




      

  <!-- 
    - #FOOTER
  -->

  <footer class="footer">

<div class="footer-top">
  <div class="container">

    <div class="footer-brand-wrapper">

      <a href="./index.php" class="logo">
        <img src="https://www.kindpng.com/picc/m/247-2472932_lucas-logo-hd-png-download.png" alt="Filmlane logo">
      </a>

      <ul class="footer-list">

        <li>
          <a href="./index.php" class="footer-link">Home</a>
        </li>

        <li>
          <a href="#" class="footer-link">Movie</a>
        </li>

        <li>
          <a href="#" class="footer-link">TV Show</a>
        </li>

        <li>
          <a href="#" class="footer-link">My Bookings</a>
        </li>



      </ul>

    </div>

    <div class="divider"></div>

    <div class="quicklink-wrapper">

      <ul class="quicklink-list">

        <li>
          <a href="#" class="quicklink-link">Faq</a>
        </li>

        <li>
          <a href="#" class="quicklink-link">Help center</a>
        </li>

        <li>
          <a href="#" class="quicklink-link">Terms of use</a>
        </li>

        <li>
          <a href="#" class="quicklink-link">Privacy</a>
        </li>

      </ul>

      <ul class="social-list">

        <li>
          <a href="#" class="social-link">
            <ion-icon name="logo-facebook"></ion-icon>
          </a>
        </li>

        <li>
          <a href="#" class="social-link">
            <ion-icon name="logo-twitter"></ion-icon>
          </a>
        </li>

        <li>
          <a href="#" class="social-link">
            <ion-icon name="logo-pinterest"></ion-icon>
          </a>
        </li>

        <li>
          <a href="#" class="social-link">
            <ion-icon name="logo-linkedin"></ion-icon>
          </a>
        </li>

      </ul>

    </div>

  </div>
</div>

<div class="footer-bottom">
  <div class="container">

    <p class="copyright">
      &copy; 2023 <a href="#">LucasFilms</a>. All Rights Reserved
    </p>
  </div>
</div>

</footer>





  <!-- 
    - #GO TO TOP
  -->

  <a href="#top" class="go-top" data-go-top>
    <ion-icon name="chevron-up"></ion-icon>
  </a>





  <!-- 
    - custom js link
  -->
  <script src="./assets/js/script.js"></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>