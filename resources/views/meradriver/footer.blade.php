<footer class="footer-area section-gap">
      <div class="container">
         <div class="row">
            <div class="col-lg-3  col-md-12">
               <div class="single-footer-widget">
                  <h6>Company</h6>
                  <ul class="footer-nav">
                     <li><a href="{{route('company')}}">About Us</a></li>
                     <li><a href="{{route('blog')}}">Tearm and Conditions</a></li>
                     <li><a href="{{route('blog')}}">Privacy policy
                        </a></li>
                     <li><a href="{{route('blog')}}">FAQ</a></li>
                     <li><a href="{{route('contact')}}">Contact Us</a></li>

                  </ul>
               </div>
            </div>
            <div class="col-lg-3  col-md-12">
               <div class="single-footer-widget">
                  <h6>Quick Link</h6>
                  <ul class="footer-nav">
                     <li><a href="{{route('blog')}}">Our Blogs</a></li>
                     <li><a href="{{route('jobs')}}">Search Job</a></li>
                     <li><a href="{{route('blog')}}">Services</a></li>
                     <li><a href="{{route('blog')}}">How It Works</a></li>
                  </ul>
               </div>
            </div>
            <div class="col-lg-3  col-md-12">
               <div class="single-footer-widget">
                  <h6>WHO WE ARE
                  </h6>
                  <ul class="footer-nav">
                     <li><a href="#">Customer Support : <br>
                           +919911138139 , +919266166866</a></li>
                     <li><a href="#">Email :

                           info@meradriver.com</a></li>
                     <!-- <li><a href="#">Power Tools</a></li>
                     <li><a href="#">Marketing Service</a></li> -->
                  </ul>
               </div>
            </div>

            <div class="col-lg-3  col-md-12">
               <div class="single-footer-widget mail-chimp">
                  <h6 class="mb-20">Instragram Feed</h6>
                  <ul class="instafeed d-flex flex-wrap">
                     <li><img src="{{asset('meradriver/img/i1.jpg')}}" alt=""></li>
                     <li><img src="{{asset('meradriver/img/i2.jpg')}}" alt=""></li>
                     <li><img src="{{asset('meradriver/img/i3.jpg')}}" alt=""></li>
                     <li><img src="{{asset('meradriver/img/i4.jpg')}}" alt=""></li>
                     <li><img src="{{asset('meradriver/img/i5.jpg')}}" alt=""></li>
                     <li><img src="{{asset('meradriver/img/i6.jpg')}}" alt=""></li>
                     <li><img src="{{asset('meradriver/img/i7.jpg')}}" alt=""></li>
                     <li><img src="{{asset('meradriver/img/i8.jpg')}}" alt=""></li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="row footer-bottom d-flex justify-content-between">
            <p class="col-lg-8 col-sm-12 footer-text m-0 text-white">
               <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
               Copyright &copy;
               <script>document.write(new Date().getFullYear());</script> All rights reserved | 
               <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://hucpl.com/"
                  target="_blank">HUCPL</a>
               <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
            <div class="col-lg-4 col-sm-12 footer-social">
               <a href="#"><i class="fa fa-facebook"></i></a>
               <a href="#"><i class="fa fa-twitter"></i></a>
               <a href="#"><i class="fa fa-dribbble"></i></a>
               <a href="#"><i class="fa fa-behance"></i></a>
            </div>
         </div>
      </div>
   </footer>

   <!-- End footer Area -->
   <script src="{{asset('meradriver/js/vendor/jquery-2.2.4.min.js')}}"></script>
   <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"></script>
   <script src="{{asset('meradriver/js/vendor/bootstrap.min.js')}}"></script>
   <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
   <script src="{{asset('meradriver/js/easing.min.js')}}"></script>
   <script src="{{asset('meradriver/js/hoverIntent.js')}}"></script>
   <script src="{{asset('meradriver/js/superfish.min.js')}}"></script>
   <script src="{{asset('meradriver/js/jquery.ajaxchimp.min.js')}}"></script>
   <script src="{{asset('meradriver/js/jquery.magnific-popup.min.js')}}"></script>
   <script src="{{asset('meradriver/js/owl.carousel.min.js')}}"></script>
   <script src="{{asset('meradriver/js/jquery.sticky.js')}}"></script>
   <script src="{{asset('meradriver/js/jquery.nice-select.min.js')}}"></script>
   <script src="{{asset('meradriver/js/parallax.min.js')}}"></script>
   <script src="{{asset('meradriver/js/mail-script.js')}}"></script>
   <script src="{{asset('meradriver/js/main.js')}}"></script>
   <script>
      var swiper = new Swiper('.swiper-container', {
         slidesPerView: 1,
         spaceBetween: 30,
         loop: true,
         navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
         },
         pagination: {
            el: '.swiper-pagination',
            clickable: true,
         },
      });
   </script>
   <script>
      var swiper = new Swiper('.swiper-text', {
         slidesPerView: 4,
         spaceBetween: 30,
         loop: true,
         navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
         },
         pagination: {
            el: '.swiper-pagination',
            clickable: true,
         },
         breakpoints: {
            0: {
               slidesPerView: 1,
               spaceBetween: 10,
            },
            426: {
               slidesPerView: 2,
               spaceBetween: 20,
            },
            768: {
               slidesPerView: 3,
               spaceBetween: 30,
            },
            1024: {
               slidesPerView: 4,
               spaceBetween: 30,
            },
         }
      });
   </script>
   <script>
      var swiper = new Swiper('.swiper-upcoming', {
         slidesPerView: 2,
         // spaceBetween: 10,
         loop: true,
         autoplay: {
         delay: 2000, // time in ms between slide transitions (e.g., 2000ms = 2s)
         disableOnInteraction: false, // keep autoplay running after user interaction
    },
         navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
         },
         pagination: {
            el: '.swiper-pagination',
            clickable: true,
         },
         breakpoints: {
            0: {
               slidesPerView: 1,
               spaceBetween: 10,
            },
            426: {
               slidesPerView: 1,
               spaceBetween: 20,
            },
            768: {
               slidesPerView: 2,
               spaceBetween: 30,
            },
            1024: {
               slidesPerView: 2,
               spaceBetween: 30,
            },
         }
      });
   </script>


</body>

</html>