<template>
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6">
          <h3 data-target="#collapse_3">Contáctanos</h3>
          <div class="collapse dont-collapse-sm contacts" id="collapse_3">
            <ul>
              <li><i class="icon_house_alt"></i>San salvador<br> El Salvador</li>
              <li><i class="icon_mobile"></i>+503 77469711</li>
              <li><i class="icon_mail_alt"></i><a href="#0">info@domain.com</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <h3 data-target="#collapse_4">Sigue en contacto</h3>
          <div class="collapse dont-collapse-sm" id="collapse_4">
            <div id="newsletter">
              <div id="message-newsletter"></div>
              <form method="post" action="assets/newsletter.php" name="newsletter_form" id="newsletter_form">
                <div class="form-group">
                  <input type="email" name="email_newsletter" id="email_newsletter" class="form-control" placeholder="Tu email">
                  <button type="submit" id="submit-newsletter"><i class="arrow_carrot-right"></i></button>
                </div>
              </form>
            </div>
            <div class="follow_us">
              <h5>Síguenos</h5>
              <ul>
                <li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="assets/img/twitter_icon.svg" alt="" class="lazy"></a></li>
                <li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="assets/img/facebook_icon.svg" alt="" class="lazy"></a></li>
                <li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="assets/img/instagram_icon.svg" alt="" class="lazy"></a></li>
                <li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="assets/img/youtube_icon.svg" alt="" class="lazy"></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- /row-->
      <hr>
    </div>
  </footer>
  <!--/footer-->
</template>
<script>
import $ from "jquery";

export default {
  mounted() {
    console.log("mounted");
    //Footer collapse
    var $headingFooter = $('footer h3');
    $(window).resize(function() {
      if($(window).width() <= 768) {
        $headingFooter.attr("data-toggle","collapse");
      } else {
        $headingFooter.removeAttr("data-toggle","collapse");
      }
    }).resize();
    $headingFooter.on("click", function () {
      $(this).toggleClass('opened');
    });
  }
}
</script>