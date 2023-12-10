<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <link rel="stylesheet" href="{{ asset('assets/customerAssets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/customerAssets/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/customerAssets/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/customerAssets/css/owl.carousel.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/customerAssets/css/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/customerAssets/css/magnific-popup.css') }}" />

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('assets/customerAssets/css/templatemo-style.css') }}" />
    <!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="utf-8" />
        <meta
          name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=0"
        />
        <meta name="description" content="POS - Bootstrap Admin Template" />
        <meta
          name="keywords"
          content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects"
        />
        <meta name="author" content="Dreamguys - Bootstrap Admin Template" />
        <meta name="robots" content="noindex, nofollow" />
        <title>Leonidas Restaurant</title>

        <link
          rel="shortcut icon"
          type="image/x-icon"
          href="{{ asset('assets/customerAssets/assets/img/favicon.png') }}"
        />
      </head>
      <body>
        <!-- PRE LOADER -->
        <section class="preloader">
          <div class="spinner">
            <span class="spinner-rotate"></span>
          </div>
        </section>

        <!-- MENU -->
        <section
          class="navbar custom-navbar navbar-fixed-top"
          role="navigation"
        >
          <div class="container">
            <div class="navbar-header">
              <button
                class="navbar-toggle"
                data-toggle="collapse"
                data-target=".navbar-collapse"
              >
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
              </button>

              <!-- lOGO TEXT HERE -->
              <a href="index.html" class="navbar-brand"
                ><img
                  src="{{ asset('assets/customerAssets/images/logo2.png') }}"
                  alt="Leonidas Restaurant"
                  class="navbar-logo"
              /></a>
            </div>

            <!-- MENU LINKS -->
            <div class="collapse navbar-collapse">
              <ul class="nav navbar-nav navbar-nav-first">
                <li><a href="#home" class="smoothScroll">Home</a></li>
                <li><a href="#menu" class="smoothScroll">Menu</a></li>
                <li><a href="#location" class="smoothScroll">Location</a></li>
                <li><a href="#footer" class="smoothScroll">About Us</a></li>
              </ul>

              <ul class="nav navbar-nav navbar-right">
                <a href="{{ route('signin') }}" class="section-btn">Sign In</a>
              </ul>
            </div>
          </div>
        </section>

        <!-- HOME -->
        <section id="home" class="slider" data-stellar-background-ratio="10">
          <div class="row">
            <div class="owl-carousel owl-theme">
              <div class="item item-first">
                <div class="caption">
                  <div class="container">
                    <div class="col-md-8 col-sm-12">
                      <h3>Leonidas Restaurant</h3>
                      <h1>
                        A place where you can just relax and eat good food.
                      </h1>
                      <a href="#menu" class="section-btn btn btn-default smoothScroll" >Menu</a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="item item-second">
                <div class="caption">
                  <div class="container">
                    <div class="col-md-8 col-sm-12">
                      <h3>Leonidas Restaurant</h3>
                      <h1>
                        The best dinning quality and you can eat indoor or al fresco.
                      </h1>
                      <a
                        href="#location"
                        class="section-btn btn btn-default smoothScroll" >Location</a
                      >
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <!-- MENU-->
        <section id="menu" data-stellar-background-ratio="0.5">
          <div class="container">
            <div class="row">
              <div class="col-md-12 col-sm-12">
                <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                  <h2>Our Menu</h2>
                  <h4>Meals, Pasta, Burgers &amp; Beverages</h4>
                </div>
              </div>

              <div class="col-md-4 col-sm-6">
                <!-- MENU THUMB -->
                <div class="menu-thumb">
                  <a
                    href="{{ asset('assets/customerAssets/images/01.jpg') }}"
                    class="image-popup"
                    title="Cheesy Burger"
                  >
                    <img src="{{ asset('assets/customerAssets/images/01.jpg') }}" class="img-responsive" alt="" />

                    <div class="menu-info">
                      <div class="menu-item">
                        <h3>Cheesy Burger</h3>
                        <p>Beef / Totato / Lettuce / Onion / Cheese Sauce</p>
                      </div>
                    </div>
                  </a>
                </div>
              </div>

              {{-- <div class="col-md-4 col-sm-6">
                <!-- MENU THUMB -->
                <div class="menu-thumb">
                  <a
                    href="{{ asset('assets/customerAssets/images/04.jpg') }}"
                    class="image-popup"
                    title="Maiz Con Yelo"
                  >
                    <img src="{{ asset('assets/customerAssets/images/04.jpg') }}" class="img-responsive" alt="" />

                    <div class="menu-info">
                      <div class="menu-item">
                        <h3>Maiz Con Yelo</h3>
                        <p>Corn / Corn Flakes/ Sweet Milk / Tapioca Pearls</p>
                      </div>
                    </div>
                  </a>
                </div>
              </div> --}}

              {{-- <div class="col-md-4 col-sm-6">
                <!-- MENU THUMB -->
                <div class="menu-thumb">
                  <a
                    href="{{ asset('assets/customerAssets/images/03.jpg') }}"
                    class="image-popup"
                    title="Chicken Fillet with Mixed Vegetables"
                  >
                    <img src="{{ asset('assets/customerAssets/images/03.jpg') }}" class="img-responsive" alt="" />

                    <div class="menu-info">
                      <div class="menu-item">
                        <h3>Chicken Fillet with Mixed Vegetables</h3>
                        <p>
                          Chiken / Creamy Sauce / Garlic Rice / Corn / Carrots
                        </p>
                      </div>
                    </div>
                  </a>
                </div>
              </div> --}}

              <div class="col-md-4 col-sm-6">
                <!-- MENU THUMB -->
                <div class="menu-thumb">
                  <a
                    href="{{ asset('assets/customerAssets/images/05.jpg') }}"
                    class="image-popup"
                    title="Spaghetti Pasta"
                  >
                    <img src="{{ asset('assets/customerAssets/images/05.jpg') }}" class="img-responsive" alt="" />

                    <div class="menu-info">
                      <div class="menu-item">
                        <h3>Spaghetti Pasta</h3>
                        <p>Pasta / Tomato Sauce / Cheese</p>
                      </div>
                    </div>
                  </a>
                </div>
              </div>

              {{-- <div class="col-md-4 col-sm-6">
                <!-- MENU THUMB -->
                <div class="menu-thumb">
                  <a
                    href="{{ asset('assets/customerAssets/images/07.jpg') }}"
                    class="image-popup"
                    title="Chicken Adobo"
                  >
                    <img src="{{ asset('assets/customerAssets/images/07.jpg') }}" class="img-responsive" alt="" />

                    <div class="menu-info">
                      <div class="menu-item">
                        <h3>Chicken Adobo</h3>
                        <p>Chicken / Soy Sauce / Pepper / Egg / Chili</p>
                      </div>
                    </div>
                  </a>
                </div>
              </div> --}}

              <div class="col-md-4 col-sm-6">
                <!-- MENU THUMB -->
                <div class="menu-thumb">
                  <a
                    href="images/08.jpg"
                    class="image-popup"
                    title="Bulalo Soup"
                  >
                    <img src="images/08.jpg" class="img-responsive" alt="" />

                    <div class="menu-info">
                      <div class="menu-item">
                        <h3>Bulalo Soup</h3>
                        <p>Beef Bone Marrow / Corn / Potato</p>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <!-- MENU THUMB -->
                <div class="menu-thumb">
                  <a
                    href="{{ asset('assets/customerAssets/images/06.jpg') }}"
                    class="image-popup"
                    title="Creamy Halo-Halo"
                  >
                    <img src="{{ asset('assets/customerAssets/images/06.jpg') }}" class="img-responsive" alt="" />

                    <div class="menu-info">
                      <div class="menu-item">
                        <h3>Creamy Halo-Halo</h3>
                        <p>
                          Sweet Milk / Tapioca Pearls / Sago / Sugar / Banana /
                          Leche Flan
                        </p>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <!-- MENU THUMB -->
                <div class="menu-thumb">
                  <a
                    href="images/02.jpg"
                    class="image-popup"
                    title="Pork Menudo"
                  >
                    <img src="images/02.jpg" class="img-responsive" alt="" />

                    <div class="menu-info">
                      <div class="menu-item">
                        <h3>Pork Menudo</h3>
                        <p>
                          Pork / Tomato Sauce / Carrot / Potato / Green Peas /
                          Hotdog
                        </p>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <!-- MENU THUMB -->
                <div class="menu-thumb">
                  <a
                    href="images/09.jpg"
                    class="image-popup"
                    title="Pork Sisig"
                  >
                    <img src="images/09.jpg" class="img-responsive" alt="" />

                    <div class="menu-info">
                      <div class="menu-item">
                        <h3>Pork Sisig</h3>
                        <p>Pork / Egg / Onions / Chili</p>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </section>

        <!-- TESTIMONIAL -->

        <section id="testimonial" data-stellar-background-ratio="0.5">
          <a href="{{ route('signin') }}" class="section-btn btn btn-default smoothScroll"
            >View Our Menu</a
          >
        </section>

        <!-- CONTACT -->

        <section id="location" data-stellar-background-ratio="0.5">
          <div class="container">
            <div class="row">
              <div class="col-md-6 col-sm-12">
                <div class="about-info">
                  <div class="section-title wow fadeInUp" data-wow-delay="0.2s">
                    <h4>Our Branches</h4>
                    <h2>Leonidas Restaurant</h2>
                  </div>

                  <div class="wow fadeInUp" data-wow-delay="0.4s">
                    <p>
                      The First Branch of <b>Leonidas Restaurant</b> is located
                      in Bgy. Pamantolon, Taytay Palawan, Philippines
                    </p>
                    <br />
                    <p>
                      The Second Branch of <b>Leonidas Restaurant</b> is located
                      in Poblacion of Taytay Palawan, Philippines
                    </p>
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-sm-12">
                <div
                  class="wow fadeInUp col-md-6 col-sm-12"
                  data-wow-delay="0.4s"
                >
                  <div id="google-map">
                    <p>Leonidas Restaurant Branch 1</p>
                    <iframe
                      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3270.825838209878!2d119.48118939065456!3d10.897055859259233!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33b6f5f20164622d%3A0x8cbc5b86dd8c797e!2sLEONIDA&#39;S!5e0!3m2!1sen!2sph!4v1700906175823!5m2!1sen!2sph"
                      width="400"
                      height="300"
                      style="border: 0"
                      allowfullscreen=""
                      loading="lazy"
                      referrerpolicy="no-referrer-when-downgrade"
                    ></iframe>
                  </div>
                </div>

                <div
                  class="wow fadeInUp col-md-6 col-sm-12"
                  data-wow-delay="0.4s"
                >
                  <div id="google-map">
                    <p>Leonidas Restaurant Branch 2</p>
                    <iframe
                      src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1959.4287405150192!2d119.5066620519984!3d10.82221678301723!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33b68b2e0a88a2ed%3A0xf9d016c205023dfe!2sLeonidas!5e0!3m2!1sen!2sph!4v1700906076076!5m2!1sen!2sph"
                      width="400"
                      height="300"
                      style="border: 0"
                      allowfullscreen=""
                      loading="lazy"
                      referrerpolicy="no-referrer-when-downgrade"
                    ></iframe>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <!-- FOOTER -->
        <footer id="footer" data-stellar-background-ratio="0.5">
          <div class="container">
            <div class="row">
              <div class="col-md-3 col-sm-8">
                <div class="footer-info">
                  <div class="section-title">
                    <h2 class="wow fadeInUp" data-wow-delay="0.2s">
                      About Leonidas
                    </h2>
                  </div>
                  <address class="wow fadeInUp" data-wow-delay="0.4s">
                    <p>
                      Leonidas Restaurant offers you a cozy and relaxing place
                      to hangout and eat with your friends and family.
                      <br /><br />Leonidas Restaurant offers breakfast, pasta,
                      beverages and more
                    </p>
                  </address>
                </div>
              </div>

              <div class="col-md-3 col-sm-8">
                <div class="footer-info">
                  <div class="section-title">
                    <ul class="wow fadeInUp social-icon" data-wow-delay="0.4s">
                      <h2 class="wow fadeInUp" data-wow-delay="0.2s">
                        Contact us
                      </h2>
                      <a
                        href="https://mail.google.com/mail/?view=cm&fs=1&to=madamepean@gmail.com"
                        class="fa fa-envelope"
                        attr="email icon"
                      ></a
                      >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <a
                        href=""
                        class="fa fa-phone-square"
                        attr="email icon"
                      ></a>

                      <address class="wow fadeInUp" data-wow-delay="0.4s">
                        <p>0997 064 0532</p>
                        <p>madamepean@gmail.com</p>
                      </address>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="col-md-4 col-sm-8">
                <div class="footer-info footer-open-hour">
                  <div class="section-title">
                    <h2 class="wow fadeInUp" data-wow-delay="0.2s">
                      Open Hours
                    </h2>
                  </div>
                  <div class="wow fadeInUp" data-wow-delay="0.4s">
                    <p>Monday: Closed</p>
                    <div>
                      <strong>Tuesday to Friday</strong>
                      <p>7:00 AM - 9:00 PM</p>
                    </div>
                    <div>
                      <strong>Saturday - Sunday</strong>
                      <p>11:00 AM - 10:00 PM</p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-2 col-sm-8">
                <div class="footer-info">
                  <div class="section-title">
                    <ul class="wow fadeInUp social-icon" data-wow-delay="0.4s">
                      <h2 class="wow fadeInUp" data-wow-delay="0.2s">
                        Follow us
                      </h2>
                      <a
                        href="https://www.facebook.com/leonidastaytay/"
                        class="fa fa-facebook-square"
                        attr="facebook icon"
                      ></a
                      >&nbsp;&nbsp;&nbsp;&nbsp;
                      <a
                        href="https://www.instagram.com/leonidastaytay/"
                        class="fa fa-instagram"
                        attr="facebook icon"
                      ></a>
                    </ul>
                  </div>

                  <div
                    class="wow fadeInUp copyright-text"
                    data-wow-delay="0.8s"
                  >
                    <p>
                      facebook.com/leonidastaytay
                      <br />instagram.com/leonidastaytay <br /><br />&copy;
                      Leonidas Restaurant Web Based System
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </footer>

        <!-- SCRIPTS -->
        <script src="{{ asset('assets/customerAssets/js/jquery.js') }}"></script>
        <script src="{{ asset('assets/customerAssets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/customerAssets/js/jquery.stellar.min.js') }}"></script>
        <script src="{{ asset('assets/customerAssets/js/wow.min.js') }}"></script>
        <script src="{{ asset('assets/customerAssets/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('assets/customerAssets/js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('assets/customerAssets/js/smoothscroll.js') }}"></script>
        <script src="{{ asset('assets/customerAssets/js/custom.js') }}"></script>
      </body>
    </html>
  </head>
</html>
