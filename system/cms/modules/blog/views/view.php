{{ post }}
<?php
$imgUrl = getImageThumb($post[0]['image'], 669, 796);
$curUrl = current_url();
?>
<div class="banner small-banner">
  <div class="container-fluid">
    <div class="row-fluid doctor">
      <h1>{{title}} </h1>
    </div>
  </div>
</div>
<div class="content">
  <div class="container-fluid">
    <div class="row-fluid inner-content">
      <div class="span8 main">
        {{ theme:partial name="breadcrumbs" }}
        <div class="social-link" style="float: left">
          <div style="float: left" class="fb-like" data-href="<?php echo $curUrl ?>" data-layout="button" data-action="like" data-show-faces="false" data-share="false" data-width="78"></div>
          &nbsp;
          <div style="float: left" class="g-plusone" data-href="<?php echo $curUrl ?>" data-size="tall" data-annotation="none"></div>
          <div style="float: left">
            &nbsp;
            <a class="twitter-share-button" href="<?php echo $curUrl ?>"
               data-related="twitterdev"
               data-size="small"
               data-count="none">
              Tweet
            </a>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="main-content-div">
          {{body}}
        </div>
        <div class="fb-comments" data-href="<?php echo $curUrl ?>" data-width="100%" data-numposts="5" data-colorscheme="light"></div>
      </div>

      <div class="span4 side-bar">
        <?php if($topBlogs):?>
          <div class="services">
            <h2>Top Posts</h2>
            <ul>
              <?php foreach($topBlogs as $blog):?>
                <li>
                  <i>
                    <a href="<?php echo getBlogLink($blog->created_on, $blog->slug)?>"><?php echo $blog->title?></a>
                  </i>
                </li>
                <div class="clearfix"></div>
              <?php endforeach;?>
            </ul>
          </div>
          <div class="clearfix"></div>
        <?php endif;?>

        <?php if($categories):?>
          <div class="services">
            <h2>Categories</h2>
            <ul>
              <?php foreach($categories as $category):?>
                <li>
                  <i>
                    <a href="{{ url:site }}blog/category/<?php echo $category->category_slug?>" title="<?php echo $category->category_title?>"><?php echo $category->category_title?>(<?php echo $category->total?>)</a>
                  </i>
                </li>
              <?php endforeach;?>
            </ul>
          </div>
          <div class="clearfix"></div>
        <?php endif;?>

        <div class="services">
          <h2>Find us on Facebook</h2>
          <div class="fb-like-box" data-width="250" data-height="350" data-href="https://www.facebook.com/Medicaltourismhcm" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>
        </div>
      </div>

    </div>
  </div>
  <div class="scrol">
    <a href="#" class="pull-right scrollup" style="display: none;"><img src="<?php echo file_path('images/scrol-btn.png')?>" alt=""></a>
  </div>
</div>




{{ /post }}

