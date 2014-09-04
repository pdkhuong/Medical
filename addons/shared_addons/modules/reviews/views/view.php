{{ theme:partial name="breadcrumbs" }}
{{ post }}
<?php
  $imgUrl = getImageThumb($post[0]['image'], 669, 796);
  $curUrl = current_url();
?>
<div id="main" class="clearfix">
  <div class="avada-row">
    <div id="content">
      <div class="single-navigation clearfix"> 
        <?php if(isset($prevBlog[0])):?>
        <a href="<?php echo getBlogLink($prevBlog[0]->created_on, $prevBlog[0]->slug)?>" rel="prev">Previous</a> 
        <?php endif;?>
        <?php if(isset($nextBlog[0])):?>
        <a href="<?php echo getBlogLink($nextBlog[0]->created_on, $nextBlog[0]->slug)?>" rel="next">Next</a>
        <?php endif;?>
      </div>
      <div class="post-5354 post type-post status-publish format-image has-post-thumbnail hentry category-design category-photography post">
        <div class="fusion-flexslider flexslider post-slideshow">
          <img src="<?php echo $imgUrl ?>">
        </div>
        <h2 class="entry-title">{{ title }}</h2>
        <div class="post-content">
          {{ body }}
        </div>

        <div class="meta-info">
          <div class="vcard"> By 
            <span class="fn">
              <a href="{{ url:site }}user/{{ created_by:user_id }}" title="Posts by {{ created_by:display_name }}" rel="author">{{ created_by:display_name }}</a>
            </span>
            <span class="sep">|</span>
            <span class="published">{{ helper:date timestamp=created_on }}</span>
            {{ if category }}
            <span class="sep">|</span>
            {{ helper:lang line="blog:category_label" }}
            <a href="{{ url:site }}blog/category/{{ category:slug }}">{{ category:title }}</a>
            {{ endif }}
            {{ if keywords }}
            <span class="sep">|</span>
            <span class="meta-tags">Tags: </span>
            {{ keywords }}
            <a href="{{ url:site }}blog/tagged/{{ keyword }}">{{ keyword }}</a>
            {{ /keywords }}
            {{ endif }}
            <span class="sep">|</span>
            <fb:comments-count href="<?php echo $curUrl ?>" /></fb:comments-count>
            Comment(s)
          </div>
        </div>
        <div class="fusion-sharing-box share-box">
          <h4>Share This Blog, Choose Your Platform!</h4>
          <div class="fusion-social-networks boxed-icons">
            <a class="fusion-social-network-icon fusion-tooltip fusion-facebook icon-facebook" href="http://www.facebook.com/sharer.php?m2w&amp;s=100&amp;p[url]=<?php echo $curUrl ?>&[images][0]=<?php echo $imgUrl ?>&[title]={{title}}" target="_blank" data-placement="top" data-title="Facebook" data-toggle="tooltip" data-original-title="" title=""></a>
            <a class="fusion-social-network-icon fusion-tooltip fusion-twitter icon-twitter" href="http://twitter.com/home?status={{title}} <?php echo $curUrl ?>" target="_blank" data-placement="top" data-title="Twitter" data-toggle="tooltip" data-original-title="" title=""></a>
            <a class="fusion-social-network-icon fusion-tooltip fusion-pinterest icon-pinterest" href="http://pinterest.com/pin/create/button/?url=<?php echo $curUrl ?>&description={{title}}&media=<?php echo $imgUrl ?>" target="_blank" data-placement="top" data-title="Pinterest" data-toggle="tooltip" data-original-title="" title=""></a>
            <a class="fusion-social-network-icon fusion-tooltip fusion-tumblr icon-tumblr" href="http://www.tumblr.com/share/link?url=<?php echo $curUrl ?>&name={{title}}&description={{title}}" target="_blank" data-placement="top" data-title="Tumblr" data-toggle="tooltip" data-original-title="" title=""></a>
            <a class="fusion-social-network-icon fusion-tooltip fusion-googleplus icon-googleplus" href="https://plus.google.com/share?url=<?php echo $curUrl ?>&quot; onclick=&quot;javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" target="_blank" data-placement="top" data-title="Google+" data-toggle="tooltip" data-original-title="" title=""></a>
            <a class="fusion-social-network-icon fusion-tooltip fusion-linkedin icon-linkedin" href="http://linkedin.com/shareArticle?mini=true&amp;url=<?php echo $curUrl ?>&title={{title}}" target="_blank" data-placement="top" data-title="Linkedin" data-toggle="tooltip" data-original-title="" title=""></a>
            <a class="fusion-social-network-icon fusion-tooltip fusion-reddit icon-reddit" href="http://reddit.com/submit?url=<?php echo $curUrl ?>&title={{title}}" target="_blank" data-placement="top" data-title="Reddit" data-toggle="tooltip" data-original-title="" title=""></a>
            <a class="fusion-social-network-icon fusion-tooltip fusion-mail icon-mail" href="mailto:?subject={{title}}&body=<?php echo $curUrl ?>" target="_blank" data-placement="top" data-title="Mail" data-toggle="tooltip" data-original-title="" title=""></a>
            <div class="fusion-clearfix"></div>
          </div>
        </div>
        <div id="respond" class="comment-respond">
          <h3 id="reply-title" class="comment-reply-title">
            <div class="title fusion-title">
              <h2 class="title-heading-left">Leave A Comment</h2>
              <div class="title-sep-container">
                <div class="title-sep sep-double"></div> 
              </div>
            </div> 
          </h3>
          <div class="fb-comments" data-href="<?php echo $curUrl ?>" data-width="100%" data-numposts="5" data-colorscheme="light"></div>
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
        <div class="fb-like-box" data-width="220" data-height="300" data-href="https://www.facebook.com/Medicaltourismhcm" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>
      </div>
    </div>


  </div>
</div>

{{ /post }}

