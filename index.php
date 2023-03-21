<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LucasFilms - movies collection</title>

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

<body id="top">

  <!-- 
    - #HEADER
  -->

  <header class="header" data-header>
    <div class="container">

      <div class="overlay" data-overlay></div>

      <a href="./index.html" class="logo">
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

          <a href="./index.html" class="logo">
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
            <a href="#movies" class="navbar-link">Movie</a>
          </li>

          <li>
            <a href="#tvshow" class="navbar-link">Tv Show</a>
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
    <article>

      <!-- 
        - #HERO
      -->

      <section class="hero">
        <div class="container">

          <div class="hero-content">

            <p class="hero-subtitle">LucasFilms</p>

            <h1 class="h1 hero-title">
              The Best selection of <strong>Movies</strong>& TV Shows.
            </h1>

            <div class="meta-wrapper">

              <div class="badge-wrapper">
                <div class="badge badge-fill">PG 18</div>

                <div class="badge badge-outline">HD</div>
              </div>

              <div class="ganre-wrapper">
                <a href="#">Romance,</a>

                <a href="#">Drama</a>
              </div>

              <div class="date-time">

                <div>
                  <ion-icon name="calendar-outline"></ion-icon>

                  <time datetime="2022">2022</time>
                </div>

                <div>
                  <ion-icon name="time-outline"></ion-icon>

                  <time datetime="PT128M">128 min</time>
                </div>

              </div>

            </div>

          </div>

        </div>
      </section>

      <!-- 
        - #TOP RATED
      -->

      <section class="top-rated" id="movies">
        <div class="container">

          <p class="section-subtitle">Best Movies</p>

          <h2 class="h2 section-title">World Best Movies</h2>

          <ul class="filter-list">

          </ul>

          <ul class="movies-list">

          <?php

            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_URL => "https://online-movie-database.p.rapidapi.com/title/v2/find?title=a&titleType=movie&limit=20&sortArg=moviemeter%2Casc&genre=Horror",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => [
                    "X-RapidAPI-Host: online-movie-database.p.rapidapi.com",
                    "X-RapidAPI-Key: eaed54e0d5mshcaf2025e300f537p1b4cc3jsn1e893bc3d684"
                ],

                
            ]);

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                echo "cURL Error #:" . $err;
            } else {


            }

            $obj = json_decode($response);


            $total = count((array) $obj->results);
            $total = $total - 1;

            $i = 0;
            while ($i < $total){

                $i++;
                ?>

            <li>
              <div class="movie-card">

                <a href="./booking.php">
                  <figure class="card-banner">
                    <img src="<?php print($obj->results[$i]->image->url) ?>">
                  </figure>
                </a>

                <div class="title-wrapper">
                  <a href="./booking.php">
                    <h3 class="card-title"><?php print($obj->results[$i]->title) ?></h3>
                  </a>

                  <time datetime="2022"><?php print($obj->results[$i]->year) ?></time>
                </div>

                <div class="card-meta">
                  <div class="badge badge-outline"><?php print($obj->results[$i]->titleType) ?></div>


                </div>

              </div>
            </li>
            <?php } ?>
        </div>
      </section>

      <!-- 
        - #TV SERIES
      -->

      <section class="tv-series" id="tvshow">
        <div class="container">

          <p class="section-subtitle">Best TV Series</p>

          <h2 class="h2 section-title">World Best TV Series</h2>

          <ul class="movies-list">

          <?php

              $curl = curl_init();

              curl_setopt_array($curl, [
                CURLOPT_URL => "https://online-movie-database.p.rapidapi.com/title/v2/find?title=a&titleType=tvSeries&limit=20&sortArg=moviemeter%2Casc&genre=Horror",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => [
                  "X-RapidAPI-Host: online-movie-database.p.rapidapi.com",
                  "X-RapidAPI-Key: 555fe5fceamshabf8656454628c2p1603f3jsna6e4f0869154"
                ],
              ]);

              $response = curl_exec($curl);
              $err = curl_error($curl);

              curl_close($curl);

              if ($err) {
                echo "cURL Error #:" . $err;
              } else {
                
              }

               $obj = json_decode($response);


            $total = count((array) $obj->results);
            $total = $total - 1;

            $i = 0;
            while ($i < $total){

                $i++;
                ?>

            <li>
              <div class="movie-card">

                <a href="./booking.php">
                  <figure class="card-banner">
                    <img src="<?php print($obj->results[$i]->image->url) ?>">
                  </figure>
                </a>

                <div class="title-wrapper">
                  <a href="./booking.php">
                    <h3 class="card-title"><?php print($obj->results[$i]->title) ?></h3>
                  </a>

                  <time datetime="2022"><?php print($obj->results[$i]->year) ?></time>
                </div>

                <div class="card-meta">
                  <div class="badge badge-outline"><?php print($obj->results[$i]->titleType) ?></div>


                </div>

              </div>
            </li>

            <?php } ?>

        </div>
      </section>

    </article>
  </main>





  <!-- 
    - #FOOTER
  -->

  <footer class="footer">

    <div class="footer-top">
      <div class="container">

        <div class="footer-brand-wrapper">

          <a href="./index.html" class="logo">
            <img src="https://www.kindpng.com/picc/m/247-2472932_lucas-logo-hd-png-download.png" alt="Filmlane logo">
          </a>

          <ul class="footer-list">

            <li>
              <a href="./index.html" class="footer-link">Home</a>
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