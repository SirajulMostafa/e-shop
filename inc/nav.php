
 <?php
       $category_table = "SELECT *FROM category where parent =0";
       $categories = mysqli_query($db, $category_table);

   ?>


<nav class="navbar navbar-default navbar-fixed-top" >
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header ">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <a class="navbar-brand sirajulshop-logo-small" href="#"> <img src="images/logo/logo2.png"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?=BASE_URL ?>">Home<span class="sr-only">(current)</span></a></li>

        <?php foreach ($categories as  $parent_cat): ?>
          <?php
                 $parent_id = $parent_cat['id'];
                 $childSql = "SELECT *FROM category where parent ='$parent_id'";
                 $childs = mysqli_query($db, $childSql);
                ?>
        <li class="dropdown">

          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?=$parent_cat['category']   ?><span class="caret"></span></a>
          <ul class="dropdown-menu">

          <?php foreach ($childs as $child): ?>
             <li><a href="category.php?category=<?= $child['id'] ?>"><?= $child['category'] ?></a></li>
          <?php endforeach ?>
          </ul>
        </li>
        <?php endforeach ?>
         <li class="dropdown">
          <a href="mycart.php" role="button" > Shoping cart <span class="glyphicon glyphicon-shopping-cart text-warning "></span ><sup class="badge">3</sup></a>

        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span><span class="caret"></span></a>
          <ul class="dropdown-menu space-padd">
            <li>
              <div class="container-fluid col-md-12">
  <div class="row">

    <div class="main">

      <h5>Please Log In, or <a href="#">Sign Up</a></h5>
      <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6" >
          <a href="#" class="btn btn-lg btn-primary btn-block" style="font-size: 1.5rem;">Facebook</a>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
          <a href="#" class="btn btn-lg btn-info btn-block"  style="font-size: 1.5rem;">Google</a>
        </div>
      </div>
      <div class="login-or">
        <hr class="hr-or">
        <span class="span-or">or</span>
      </div>

      <form role="form" action="admin/login.php">
        <div class="form-group">
          <label for="inputUsernameEmail">Username or email</label>
          <input type="text" class="form-control" id="inputUsernameEmail">
        </div>
        <div class="form-group">
          <a class="pull-right" href="#">Forgot password?</a>
          <label for="inputPassword">Password</label>
          <input type="password" class="form-control" id="inputPassword">
        </div>
        <div class="checkbox pull-right">
          <label>
            <input type="checkbox">
            Remember me </label>
        </div>
        <button type="submit" class="btn btn btn-primary">
          Log In
        </button>
      </form>

    </div>

  </div>
</div>

  </li>
   </ul>
    </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
