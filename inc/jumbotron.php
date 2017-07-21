<!-- <div class="" style="padding-top: 52px"></div>
    <div class="jumbotron background-3d-effect-sky  sirajulshop-logo">
      <div class="container">
      <div class="col-md-8 col-md-offset-3">
        <h4 class="tlt" style="color: rgba(240, 240, 248, 0.9); font-style: italic">This is sirajulshop, shoping corner . Here you can buy your product .</h4>
      </div>

      <h2 class="animated  swing " style="color: rgba(240, 240, 248, 0.9); font-style: italic">sirajulshop</h2>
      </div>
      </div>

-->

 <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="http://cdn.bootcss.com/animate.css/3.5.1/animate.min.css">
-->

<style>

     #first-slider .slide1 h3, #first-slider .slide2 h3, #first-slider .slide3 h3, #first-slider .slide4 h3{
         color: #fff;
         font-size: 25px;
         text-transform: uppercase;
         font-weight:300px;
     }

     #first-slider .slide1 h4,#first-slider .slide2 h4,#first-slider .slide3 h4,#first-slider .slide4 h4{
         color: #fff;
         font-size: 30px;
         text-transform: uppercase;
         font-weight:700;
     }
     #first-slider .slide1 .text-left ,#first-slider .slide3 .text-left{
         padding-left: 40px;
     }


     #first-slider .carousel-indicators {
         bottom: 0;
     }
     #first-slider .carousel-control.right,
     #first-slider .carousel-control.left {
         background-image: none;
     }
     #first-slider .carousel .item {
         min-height: 425px;
         height: 100%;
         width:100%;
     }

     .carousel-inner .item .container {
         display: flex;
         justify-content: center;
         align-items: center;
         position: absolute;
         bottom: 0;
         top: 0;
         left: 0;
         right: 0;
     }


     #first-slider h3{
         animation-delay: 1s;
     }
     #first-slider h4 {
         animation-delay: 2s;
     }
     #first-slider h2 {
         animation-delay: 3s;
     }


     #first-slider .carousel-control {
         width: 6%;
         text-shadow: none;
     }


     #first-slider h1 {
         text-align: center;
         margin-bottom: 30px;
         font-size: 30px;
         font-weight: bold;
     }

     #first-slider .p {
         padding-top: 125px;
         text-align: center;
     }

     #first-slider .p a {
         text-decoration: underline;
     }
     #first-slider .carousel-indicators li {
         width: 14px;
         height: 14px;
         background-color: rgba(255,255,255,.4);
         border:none;
     }
     #first-slider .carousel-indicators .active{
         width: 16px;
         height: 16px;
         background-color: #fff;
         border:none;
     }


     .carousel-fade .carousel-inner .item {
         -webkit-transition-property: opacity;
         transition-property: opacity;
     }
     .carousel-fade .carousel-inner .item,
     .carousel-fade .carousel-inner .active.left,
     .carousel-fade .carousel-inner .active.right {
         opacity: 0;
     }
     .carousel-fade .carousel-inner .active,
     .carousel-fade .carousel-inner .next.left,
     .carousel-fade .carousel-inner .prev.right {
         opacity: 1;
     }
     .carousel-fade .carousel-inner .next,
     .carousel-fade .carousel-inner .prev,
     .carousel-fade .carousel-inner .active.left,
     .carousel-fade .carousel-inner .active.right {
         left: 0;
         -webkit-transform: translate3d(0, 0, 0);
         transform: translate3d(0, 0, 0);
     }
     .carousel-fade .carousel-control {
         z-index: 2;
     }

     .carousel-control .fa-angle-right, .carousel-control .fa-angle-left {
         position: absolute;
         top: 50%;
         z-index: 5;
         display: inline-block;
     }
     .carousel-control .fa-angle-left{
         left: 50%;
         width: 38px;
         height: 38px;
         margin-top: -15px;
         font-size: 30px;
         color: #fff;
         border: 3px solid #ffffff;
         -webkit-border-radius: 23px;
         -moz-border-radius: 23px;
         border-radius: 53px;
     }
     .carousel-control .fa-angle-right{
         right: 50%;
         width: 38px;
         height: 38px;
         margin-top: -15px;
         font-size: 30px;
         color: #fff;
         border: 3px solid #ffffff;
         -webkit-border-radius: 23px;
         -moz-border-radius: 23px;
         border-radius: 53px;
     }
     .carousel-control {
         opacity: 1;
         filter: alpha(opacity=100);
     }


     /********************************/
     /*       Slides backgrounds     */
     /********************************/
     #first-slider .slide1 {
         background-image: url(http://localhost/e-shop/images/ecommerce_sales.jpg);
         background-size: cover;
         background-repeat: no-repeat;
     }
     #first-slider .slide2 {
         background-image: url(http://localhost/e-shop/images/e-commerce-deve.jpg);
         background-size: cover;
         background-repeat: no-repeat;
     }
     #first-slider .slide3 {
         background-image:  url(http://localhost/e-shop/images/slider3.jpg);
         background-size: cover;
         background-repeat: no-repeat;

     }
     #first-slider .slide4 {
         background-image: url(http://localhost/e-shop/images/e-commerce-deve.jpg);
         background-size: cover;
         background-repeat: no-repeat;

     }

     .h3-animated{background-color: rgba(18, 20, 18, 0.6);border-radius: 10px;}
     .h4-animated{background-color: rgba(18, 20, 18, 0.6);border-radius: 10px}
     .h6-animated{background-color: rgba(18, 20, 18, 0.6);border-radius: 10px}


          /********************************/
          /*          Media Queries       */
          /********************************/
          @media screen and (min-width: 980px){


          }
          @media screen and (max-width: 640px){

            #first-slider .carousel .item {
                height: 100%;
                width:100%;
            }

            .img-sm1 img{ width:0%;height: 0%;}
            .img-sm2 img{width:0%;height: 0%;}
            .img-sm3 img{width:0%;height: 0%;}
            .img-sm4 img{ width:0%;height: 0%;}


/*on set*/
#first-slider .slide1,#first-slider .slide2,#first-slider .slide3,#first-slider .slide4 {

     background-size:100% 100%;
    background-repeat: no-repeat;

}


              #first-slider .slide1 h3{
                  font-size: 1.5rem;
                  padding-top: 50px;
                  padding-right: 30px;
                  padding-left:10px;

              }
              #first-slider .slide1 h4{
                  font-size: 1.3rem;
                  padding: 10px 60px 10px 60px;

              }
              #first-slider .slide2 h3{
                  font-size: 1.4rem;
                  padding: 5px 60px 5px 60px;

              }
              #first-slider .slide2  h4{
                  font-size: 1.3rem;
                  padding: 5px 60px 5px 60px;
              }
              #first-slider .slide3 h3{
                  font-size: 1.5rem;
                  padding-top: 50px;
                  padding-right: 30px;
                  padding-left:10px;

              }
              #first-slider .slide3  h4{
                  font-size: 1.3rem;
                  padding: 10px 60px 10px 60px;


              }
              #first-slider .slide4 h3{
                  font-size: 1.5rem;
                  padding-top: 50px;
                  padding-right: 30px;
                  padding-left:10px;
                  padding: 20px 30px 20px 30px;

              }

              #first-slider .slide4  h4{
                  font-size: 1.3rem;
                  padding: 10px 60px 10px 60px;

              }
          }



 </style>

 <div id="first-slider">
     <div id="carousel-example-generic" class="carousel slide carousel-fade">
         <!-- Indicators -->
         <ol class="carousel-indicators">
             <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
             <li data-target="#carousel-example-generic" data-slide-to="1"></li>
             <li data-target="#carousel-example-generic" data-slide-to="2"></li>
             <li data-target="#carousel-example-generic" data-slide-to="3"></li>
         </ol>
         <!-- Wrapper for slides -->
         <div class="carousel-inner" role="listbox">
             <!-- Item 1 -->
             <div class="item active slide1">
                 <div class="row">
                     <div class="container">
                        <!-- <style >   .col-sm-6>img{ width: 200px;height: 200px}</style>-->
                         <div class="col-md-3 col-sm-6 text-right img-sm1" style="padding-bottom: 20px;padding-top: 90px">
                             <img   data-animation="animated zoomInLeft" src="http://localhost/e-shop/images/logo/oknewlogo.png">
                         </div>

                         <div class="col-md-9 col-sm-6 text-left">
                             <h3 class="h3-animated" data-animation="animated bounceInDown" >WELCOME ! TO THE ECOMMERCE ONLINE SHOPING  !</h3>
                             <h4 class="h4-animated" data-animation="animated bounceInUp" >Easily here you can buy or make order </h4>
                         </div>

                     </div>
                 </div>
             </div>
             <!-- Item 2 -->
             <div class="item slide2 ">
                 <div class="row"><div class="container">
                         <div class="col-md-7 text-left">
                             <h3 class="h3-animated" data-animation="animated bounceInDown" > 50 animation options A beautiful</h3>
                             <h4 class="h4-animated" data-animation="animated bounceInUp">Create beautiful slideshows </h4>
                         </div>
                         <div class="col-md-5 text-right img-sm2">
                             <img style="max-width: 200px;"  data-animation="animated zoomInLeft" src="http://s20.postimg.org/sp11uneml/rack_server_unlock.png">
                         </div>
                     </div></div>
             </div>
             <!-- Item 3 -->
             <div class="item slide3">
                 <div class="row"><div class="container">
                         <div class="col-md-7 text-left">
                             <h3 class="h3-animated" data-animation="animated bounceInDown" >Simple Bootstrap Carousel</h3>
                             <h4 class="h4-animated" data-animation="animated bounceInUp" >Bootstrap Image Carousel Slider with Animate.css</h4>
                         </div>
                         <div class="col-md-5 text-right img-sm3">
                             <img style="max-width: 200px;"  data-animation="animated zoomInLeft" src="http://s20.postimg.org/eq8xvxeq5/globe_network.png">
                         </div>
                     </div></div>
             </div>
             <!-- Item 4 -->
             <div class="item slide4">
                 <div class="row"><div class="container">
                         <div class="col-md-7 text-left">
                             <h3 class="h3-animated" data-animation="animated bounceInDown" >We are creative</h3>
                             <h4 class="h4-animated" data-animation="animated bounceInUp">Get start your next awesome project</h4>
                         </div>
                         <div class="col-md-5 text-right img-sm4">
                             <img style="max-width: 200px;"  data-animation="animated zoomInLeft" src="http://s20.postimg.org/9vf8xngel/internet_speed.png">
                         </div>
                     </div></div>
             </div>
             <!-- End Item 4 -->

         </div>
         <!-- End Wrapper for slides-->
         <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
             <i class="fa fa-angle-left"></i><span class="sr-only">Previous</span>
         </a>
         <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
             <i class="fa fa-angle-right"></i><span class="sr-only">Next</span>
         </a>
     </div>
 </div>
