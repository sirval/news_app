
  <!-- ======= Footer ======= -->
  <footer id="footer" class="section-bg">
    <div class="footer-top">
      <div class="container">

        <div class="row">

          <div class="col-lg-6">

            <div class="row">

              <div class="col-sm-6">

                <div class="footer-info">
                  <h3>{{ 'News Hub '. config('app.name') }}</h3>
                  <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cupiditate voluptatibus nostrum atque quae reprehenderit assumenda dolor. Fuga cupiditate suscipit minus at, non dolorem doloribus voluptas nostrum reiciendis sapiente aliquid adipisci.</p>
                </div>

                <div class="footer-newsletter">
                  <h4>Our Newsletter</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laudantium, nam, quo, molestiae explicabo exercitationem impedit labore tempora nisi unde quam aliquam. Exercitationem dolorem quod unde reiciendis quos ex laboriosam blanditiis.</p>
                  <form action="" method="post">
                    <input type="email" name="email"><input type="submit" value="Subscribe">
                  </form>
                </div>

              </div>

              <div class="col-sm-6">
                <div class="footer-links">
                  <h4>Useful Links</h4>
                  <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#news">News</a></li>
                    
                  </ul>
                </div>

                <div class="footer-links">
                  <h4>Contact Us</h4>
                  <p>
                    Adewusi Street <br>
                    Fadeyi, Yaba, Lagos<br>
                    Nigeria <br>
                    <strong>Phone:</strong> +234 808 2646 718<br>
                    <strong>Email:</strong> ohukaiv@gmail.com<br>
                  </p>
                </div>

                <div class="social-links">
                  <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                  <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                  <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                  <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                </div>

              </div>

            </div>

          </div>

          <div class="col-lg-6">

            <div class="form">

              <h4>Send us a message</h4>
              <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quam rerum labore voluptatibus commodi rem magni velit, nihil veniam nostrum ex neque consequuntur quae ea itaque, debitis nemo, eligendi incidunt vero.</p>

              <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                <div class="form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="form-group mt-3">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
                <div class="form-group mt-3">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                </div>
                <div class="form-group mt-3">
                  <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                </div>

                <div class="my-3">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>

                <div class="text-center"><button type="submit" title="Send Message">Send Message</button></div>
              </form>

            </div>

          </div>

        </div>

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>{{ 'News Hub '. config('app.name') }}</strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="#">Ohuka Ikenna Val</a>
      </div>
    </div>
  </footer><!-- End  Footer -->
