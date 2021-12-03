<!-- load file layout chung -->
<?php $this->layoutPath = "LayoutTrangChu.php"; ?>

<div class="content">
  <div class="container">
    <h1 style="display:none;">DKT Store</h1>
    <div class="row">
      <div class="col-xs-12 col-md-3">
        <div class="row" style="margin-bottom: 5px;">
          <div class="col-md-12"><img src="../assets/frontend/images/img1.jpg" class="img-thumbnail"></div>
        </div>
        <div class="row" style="margin-bottom: 5px;">
          <div class="col-md-12"><img src="../assets/frontend/images/img2.jpg" class="img-thumbnail"></div>
        </div>
        <div class="row">
          <div class="col-md-12"><img src="../assets/frontend/images/img3.jpg" class="img-thumbnail"></div>
        </div>
      </div>
      <div class="col-md-9">         
        <!-- slide -->
        <div class="owl-slider">
          <div class="item"> 
            <!-- ============================ -->
            <div id="myCarousel" class="carousel slide" data-ride="carousel"> 
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
              </ol>
              
              <!-- Wrapper for slides -->
              <div class="carousel-inner">
                <div class="item active"> <img src="../assets/frontend/images/la.jpg" alt="Los Angeles"> </div>
                <div class="item"> <img src="../assets/frontend/images/slideshow1221b.jpg" alt="Los Angeles"> </div>
                <div class="item"> <img src="../assets/frontend/images/chicago.jpg" alt="Chicago"> </div>
                <div class="item"> <img src="../assets/frontend/images/ny.jpg" alt="New York"> </div>
              </div>
              
              <!-- Left and right controls --> 
            </div>
            <!-- ============================ --> 
          </div>
        </div>
        <!-- end slide --> 
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-md-12"> 
        <!-- main -->
        <div class="special-collection">
          <div class="tabs-container">
            <div class="row" style="margin-top:10px;">
              <div class="col-lg-10">
                <h2>HOT PRODUCT</h2>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
          <div class="tabs-content row">
            <div id="content-tabb1" class="content-tab content-tab-proindex" style="display:none">
              <div class="clearfix"> 
              	<?php 
              		$hotProducts = $this->modelHotProducts();
              	 ?>
              	 <?php foreach($hotProducts as $rows): ?>
                <!-- box product -->
                <div class="col-xs-6 col-md-2 col-sm-6 ">
                  <div class="product-grid" id="product-1168979" style="height: 350px; overflow: hidden;">
                    <div class="image"> <a href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>"><img src="../assets/upload/products/<?php echo $rows->photo; ?>" title="<?php echo $rows->name; ?>" alt="<?php echo $rows->name; ?>" class="img-responsive"></a> </div>
                    <div class="info">
                      <h3 class="name"><a href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>"><?php echo $rows->name; ?></a></h3>
                      <p class="price-box"> <span class="special-price"> <span class="price product-price" style="text-decoration:line-through;"> <?php echo number_format($rows->price); ?></span> ₫ </span> </p>
                      <p class="price-box"> <span class="special-price"> <span class="price product-price"> <?php echo number_format($rows->price - ($rows->price*$rows->discount)/100); ?> </span>₫ </span> </p>
                      <p class="price-box"> <a href="index.php?controller=products&action=rating&star=1&id=<?php echo $rows->id; ?>"><img src="../assets/frontend/images/star.jpg"></a> <a href="index.php?controller=products&action=rating&star=2&id=<?php echo $rows->id; ?>"><img src="../assets/frontend/images/star.jpg"></a> <a href="index.php?controller=products&action=rating&star=3&id=<?php echo $rows->id; ?>"><img src="../assets/frontend/images/star.jpg"></a> <a href="index.php?controller=products&action=rating&star=4&id=<?php echo $rows->id; ?>"><img src="../assets/frontend/images/star.jpg"></a> <a href="index.php?controller=products&action=rating&star=5&id=<?php echo $rows->id; ?>"><img src="../assets/frontend/images/star.jpg"></a> (<?php echo $this->modelTotalRating($rows->id); ?>*)</p>
                      <div class="action-btn">
                        <form>
                          <a href="index.php?controller=cart&action=create&id=<?php echo $rows->id; ?>" class="button">Add to Cart</a>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end box product --> 
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-md-12"> <img src="../assets/frontend/images/adv1.jpg" class="img-thumbnail"> </div>
        </div>
        <?php 
        	$categories = $this->modelListCategories();
         ?>
         <?php foreach($categories as $rowsCategories): ?>
        <!-- category product -->
        <div class="special-collection">
          <div class="tabs-container">
            <div class="row" style="margin-top:10px;">
              <div class="head-tabs head-tab1 col-lg-11">
                <h2><?php echo $rowsCategories->name; ?></h2>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
          <div class="tabs-content row">
            <div id="content-taba4" class="content-tab content-tab-proindex"> 
              
              <?php 
              		$products = $this->modelListProducts($rowsCategories->id);
              	 ?>
              	 <?php foreach($products as $rows): ?>
                <!-- box product -->
                <div class="col-xs-6 col-md-2 col-sm-6 ">
                  <div class="product-grid" id="product-1168979" style="height: 350px; overflow: hidden;">
                    <div class="image"> <a href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>"><img src="../assets/upload/products/<?php echo $rows->photo; ?>" title="<?php echo $rows->name; ?>" alt="<?php echo $rows->name; ?>" class="img-responsive"></a> </div>
                    <div class="info">
                      <h3 class="name"><a href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>"><?php echo $rows->name; ?></a></h3>
                      <p class="price-box"> <span class="special-price"> <span class="price product-price" style="text-decoration:line-through;"> <?php echo number_format($rows->price); ?></span> ₫ </span> </p>
                      <p class="price-box"> <span class="special-price"> <span class="price product-price"> <?php echo number_format($rows->price - ($rows->price*$rows->discount)/100); ?> </span>₫ </span> </p>
                      <p class="price-box"> <a href="index.php?controller=products&action=rating&star=1&id=<?php echo $rows->id; ?>"><img src="../assets/frontend/images/star.jpg"></a> <a href="index.php?controller=products&action=rating&star=2&id=<?php echo $rows->id; ?>"><img src="../assets/frontend/images/star.jpg"></a> <a href="index.php?controller=products&action=rating&star=3&id=<?php echo $rows->id; ?>"><img src="../assets/frontend/images/star.jpg"></a> <a href="index.php?controller=products&action=rating&star=4&id=<?php echo $rows->id; ?>"><img src="../assets/frontend/images/star.jpg"></a> <a href="index.php?controller=products&action=rating&star=5&id=<?php echo $rows->id; ?>"><img src="../assets/frontend/images/star.jpg"></a> </p>
                      <div class="action-btn">
                        <form>
                          <a href="index.php?controller=cart&action=create&id=<?php echo $rows->id; ?>" class="button">Add to Cart</a>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end box product --> 
                <?php endforeach; ?>

            </div>
          </div>
        </div>
        <!-- /category product --> 
        <?php endforeach; ?>
        
        
        <!-- adv -->
        <div class="widebanner"> <a href="#"><img src="../assets/frontend/100/047/633/themes/517833/assets/widebanner221b.jpg?1481775169361" alt="#" class="img-responsive"></a> </div>
        <!-- end adv --> 
        
        <!-- hot news -->
        <div class="home-blog">
          <h2 class="title"> <span>Tin tức</span></h2>
          <div class="row">
            <div class="owl-home-blog owl-home-blog-bottompage"> 
            <?php 
            	$news = $this->modelHotNews();
             ?>
             <?php foreach($news as $rows): ?>
              <!-- new item -->
              <div class="item">
                <div class="article"> <a href="index.php?controller=news&action=detail&id=<?php echo $rows->id; ?>" class="image"> <img src="../assets/upload/news/<?php echo $rows->photo; ?>" alt="<?php echo $rows->name; ?>" title="<?php echo $rows->name; ?>" class="img-responsive"> </a>
                  <div class="info">
                    <h3><a class="text3line" href="index.php?controller=news&action=detail&id=<?php echo $rows->id; ?>" style="font-weight: bold;"><?php echo $rows->name; ?></a></h3>
                    <p class="desc"><?php echo $rows->description; ?></p>
                  </div>
                </div>
              </div>
              <!-- /news item --> 
              <?php endforeach; ?>
              
              
            </div>
          </div>
        </div>
        <!-- /hotnews --> 
        
        <!-- end main --> 
      </div>
    </div>
  </div>
</div> 