
 <hr>

    <!--   <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">  -->
    <!--font-awesome.min.css 41 New Icons in 4.7-->
      <link href="css/font-awesome.min.css" rel="stylesheet">
<footer>
    <div class="footer" id="footer" style="border-top: 3px solid #C1D4D4;">
        <div class="container">
            <div class="row">
                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                    <h3> Help Us </h3>
                    <ul>
                        <li> <a href="#"> Lorem Ipsum </a> </li>
                        <li> <a href="#"> Lorem Ipsum </a> </li>
                        <li> <a href="#"> Lorem Ipsum </a> </li>
                        <li> <a href="#"> Lorem Ipsum </a> </li>
                    </ul>
                </div>
                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                    <h3> Contact Us</h3>
                    <ul>
                        <li> <a href="#"> Lorem Ipsum </a> </li>
                        <li> <a href="#"> Lorem Ipsum </a> </li>
                        <li> <a href="#"> Lorem Ipsum </a> </li>
                        <li> <a href="#"> Lorem Ipsum </a> </li>
                    </ul>
                </div>
                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                    <h3> Make Order</h3>
                    <ul>
                        <li> <a href="#"> Lorem Ipsum </a> </li>
                        <li> <a href="#"> Lorem Ipsum </a> </li>
                        <li> <a href="#"> Lorem Ipsum </a> </li>
                        <li> <a href="#"> Lorem Ipsum </a> </li>
                    </ul>
                </div>
                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                    <h3> Our Services</h3>
                    <ul>
                        <li> <a href="#"> Lorem Ipsum </a> </li>
                        <li> <a href="#"> Lorem Ipsum </a> </li>
                        <li> <a href="#"> Lorem Ipsum </a> </li>
                        <li> <a href="#"> Lorem Ipsum </a> </li>
                    </ul>
                </div>

                 <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                    <h3 ><i class="glyphicon glyphicon-hand-down"></i> Helpline</h3>
                    <ul class="text-center">
                        <li> <a href="#">+88018329339 </a> </li>
                        <li> <a href="#">bu.edu@bu.com </a> </li>
                        <li> <a href="#">www.bu.edu.bd </a> </li>
                        <li> <a href="#">www.fb.com/bu-cse-family</a> </li>
                    </ul>
                </div>


            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
    </div>
    <!--/.footer-->

    <div class="footer-bottom">
        <div class="container">
            <p class="pull-left"> Copyright ©  2017. All right reserved. </p>
            <div class="pull-right">
                <ul class="nav nav-pills payments">
                    <li><i class="fa fa-cc-visa"></i></li>
                    <li><i class="fa fa-cc-mastercard"></i></li>
                    <li><i class="fa fa-cc-amex"></i></li>
                    <li><i class="fa fa-cc-paypal"></i></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
    <!--/.footer-bottom-->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.js"></script>

    <script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
    <script src="<?= BASE_URL ;?>/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?= BASE_URL ;?>/js/ie10-viewport-bug-workaround.js"></script>

    <!-- <script src="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>  -->
    <script type="text/javascript" src="<?= BASE_URL ;?>/js/textillate/jquery.lettering.js"></script>
    <script type="text/javascript" src="<?= BASE_URL ;?>/js/textillate/jquery.textillate.js"></script>
    <script src="<?= BASE_URL ;?>/js/fotorama.js"></script>
    <!-- parsely.css -->
      <script src="<?=BASE_URL ;?>/js/parsley/parsley.min.js"></script>
    <!--./ parsely.css -->



    <script>

    $('.tlt').textillate({
      in:{effect:'rollIn',delay:20},
      out:{effect:'rollOut',sync:true, delay:5},
      loop:true
    });

    </script>


  </body>
</html>


<script>

$(document).on('click', '.panel-heading span.clickable', function(e){
    var $this = $(this);
  if(!$this.hasClass('panel-collapsed')) {
    $this.parents('.panel').find('.panel-body').slideDown();
    $this.addClass('panel-collapsed');
    $this.find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
  } else {
    $this.parents('.panel').find('.panel-body').slideUp();
    $this.removeClass('panel-collapsed');
    $this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
  }
})
</script>

 <script>(function( $ ) {

         //Function to animate slider captions
         function doAnimations( elems ) {
             //Cache the animationend event in a variable
             var animEndEv = 'webkitAnimationEnd animationend';

             elems.each(function () {
                 var $this = $(this),
                     $animationType = $this.data('animation');
                 $this.addClass($animationType).one(animEndEv, function () {
                     $this.removeClass($animationType);
                 });
             });
         }

         //Variables on page load
         var $myCarousel = $('#carousel-example-generic'),
             $firstAnimatingElems = $myCarousel.find('.item:first').find("[data-animation ^= 'animated']");

         //Initialize carousel
         $myCarousel.carousel();

         //Animate captions in first slide on page load
         doAnimations($firstAnimatingElems);

         //Pause carousel
         $myCarousel.carousel('pause');


         //Other slides to be animated on carousel slide event
         $myCarousel.on('slide.bs.carousel', function (e) {
             var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");
             doAnimations($animatingElems);
         });
         $('#carousel-example-generic').carousel({
             interval:3000,
             pause: "false"
         });

     })(jQuery);
 </script>
