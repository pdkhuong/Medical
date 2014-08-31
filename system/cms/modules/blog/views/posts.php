{{ theme:partial name="breadcrumbs" }}
<?php if($posts):?>

<div id="main" class="clearfix">
  <div class="avada-row">
    <div id="content">
      <div class="post-5354 post type-post status-publish format-image has-post-thumbnail hentry category-design category-photography post">
        <div class="post-content">
          <div class="fusion-blog-shortcode fusion-blog-large fusion-blog-pagination">
            <div class="fusion-posts-container posts-container-pagination">
              <div class="post-213 post type-post status-publish format-gallery has-post-thumbnail hentry category-image category-photography category-wordpress tag-video blog-large">
                <?php foreach($posts as $post):?>
                <?php
                  $imgUrl = getImageThumb($post['image'], 669, 796);
                  $blogLink = getBlogLink($post['created_on'], $post['slug']);
                ?>
                <div class="fusion-flexslider flexslider post-slideshow">
                  <img src="<?php echo $imgUrl ?>">
                </div>
                <div class="post-content-container">
                  <h2 class="entry-title">
                    <a href="<?php echo $blogLink;?>"><?php echo $post['title']?></a>
                  </h2>
                  <div class="excerpt-container strip-html">
                    <?php echo $post['intro'] ?>
                  </div>
                  <div class="fusion-clearfix"></div>
                  <div class="entry-meta">
                    <p class="entry-meta-details">
                      <span class="entry-author fn">By
                          <a href="<?php echo base_url().'user/'.$post['author_id']?>"><?php echo $post['display_name'] ?></a>
                      </span>
                      <span class="meta-separator">|</span>
                      <span class="entry-time">
                          <time class="published"><?php echo date('M jS, Y', $post['created_on'])?></time>
                      </span>
                      <?php if(isset($post['category'])):?>
                      <span class="meta-separator">|</span>
                      <span class="entry-categories">Categories:
                          <a href="<?php echo base_url().'blog/category/'.$post['category']['slug']?>" title="<?php echo $post['category']['title']?>"><?php echo $post['category']['title']?></a>
                      </span>
                      <?php endif;?>
                      <span class="meta-separator">|</span>
                      <span class="entry-comments">
                          <fb:comments-count href="<?php echo $blogLink ?>" /></fb:comments-count> Comment(s)
                      </span>
                      <span class="meta-separator">|</span>
                    </p>
                    <p class="entry-read-more">
                    <a href="<?php echo $blogLink?>">Read More</a>
                    </p>
                  </div>
                </div>
                <?php endforeach;?>
              </div>
            </div>

            <div class="pagination clearfix">
              <?php echo $pagination['links']?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="sidebar" style="float:right;">
      <?php if($topBlogs):?>
        <div id="recent-posts-2" class="widget widget_recent_entries">
          <div class="heading">
            <h3>Top Posts</h3>
          </div>
          <ul>
            <?php foreach($topBlogs as $blog):?>
              <li>
                <a href="<?php echo getBlogLink($blog->created_on, $blog->slug)?>"><?php echo $blog->title?></a>
              </li>
            <?php endforeach;?>
          </ul>
        </div>
      <?php endif;?>
      <?php if($categories):?>
        <div id="categories-2" class="widget widget_categories">
          <div class="heading">
            <h3>Categories</h3>
          </div>
          <ul>
            <?php foreach($categories as $category):?>
              <li class="cat-item cat-item-1">
                <a href="{{ url:site }}blog/category/<?php echo $category->category_slug?>" title="<?php echo $category->category_title?>"><?php echo $category->category_title?>(<?php echo $category->total?>)</a>
              </li>
            <?php endforeach;?>
          </ul>
        </div>
      <?php endif;?>

      <div id="facebook-like-widget-2" class="widget facebook_like">
        <div class="heading"><h3>Find us on Facebook</h3></div>
        <div class="fb-like-box" data-width="220" data-href="https://www.facebook.com/Medicaltourismhcm" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>
      </div>
    </div>

  </div>
</div>


<?php else:?>
	
	{{ helper:lang line="blog:currently_no_posts" }}

<?php endif;?>