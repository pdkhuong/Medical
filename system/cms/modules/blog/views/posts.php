<div class="banner small-banner">
  <div class="container-fluid">
    <div class="row-fluid doctor">

      <h1>Specialist Dental Group<sup>®</sup> Blog</h1>
      <p style="color:#ffffff;">Increase your awareness of the important role that good oral health and beautiful smiles play<br>
        in your overall health and well-being. Read about Life-Transforming dental solutions.</p>

    </div>
  </div>
</div>
<div class="content">
  <div class="container-fluid">
    <div class="row-fluid inner-content">
      <div class="span8 main">


        {{ theme:partial name="breadcrumbs" }}
        <?php if($posts):?>
          <?php foreach($posts as $post):?>
            <?php
            $imgUrl = getImageThumb($post['image'], 669, 796);
            $blogLink = getBlogLink($post['created_on'], $post['slug']);
            ?>
            <div class="row-fluid blog-listing">
              <div class="span4">
                <a href="<?php echo $blogLink?>" title="<?php echo $post['title']?>" class="thumbnail pull-left" style="margin: 0 10px 10px;">
                  <img src="<?php echo $imgUrl?>" title="<?php echo $post['title']?>" alt="<?php echo $post['title']?>">
                </a>
              </div>

              <div class="span8">
                <h3>
                  <a href="<?php echo $blogLink?>" title="<?php echo $post['title']?>"><?php echo $post['title']?></a>
                </h3>
                <small><?php echo date('M jS, Y', $post['created_on'])?> &nbsp;|&nbsp;

                <?php if(isset($post['category'])):?>
                  Category
                  <a href="<?php echo base_url().'blog/category/'.$post['category']['slug']?>" title="<?php echo $post['category']['title']?>" rel="category tag"><?php echo $post['category']['title']?></a>
                  &nbsp;|&nbsp;
                <?php endif;?>
                <fb:comments-count href="<?php echo $blogLink ?>" /></fb:comments-count> Comment(s)
                </small>
                <br>
                <br>
                <?php echo $post['intro'] ?>
                <a href="<?php echo $blogLink ?>" title="Read More" class="read-more btn"> Read More</a>
              </div>
            </div>
          <?php endforeach;?>
        <?php else:?>

          {{ helper:lang line="blog:currently_no_posts" }}

        <?php endif;?>
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
