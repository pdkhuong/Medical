{{ theme:partial name="breadcrumbs" }}
<?php if($reviews):?>

<div id="main" class="clearfix">
  <div class="avada-row">
    <div id="content" class="full-width">
      <div class="post-5354 post type-post status-publish format-image has-post-thumbnail hentry category-design category-photography post">
        <div class="post-content">
          <?php $index = 1; ?>
          <?php foreach($reviews as $key => $review):?>
          <div class="fusion-one-third one_third fusion-column <?php if($index%3==0) echo 'last';?>">
            <div class="fusion-testimonials fusion-testimonials-1">
              <style type="text/css">.fusion-testimonials.fusion-testimonials-1 .author:after{border-top-color:#f6f6f6 !important}</style>
              <div class="reviews">
                <div class="review male">
                  <blockquote>
                    <q style="background-color:#f6f6f6;color:#747474;">
                      <?php echo html_entity_decode($review->body) ?>
                    </q>
                  </blockquote>
                  <div class="author">
                    <span class="testimonial-thumbnail doe"></span>
                    <span class="company-name">
                        <strong><?php echo $review->name?></strong>
                      <div class="clearfix"></div>
                      <span><?php echo $review->email?></span>
                      <div class="clearfix"></div>
                      <span><?php echo $review->phone?></span>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php if($index%3==0):?>
          <div class="fusion-clearfix"></div>
          <div class="fusion-sep-clear"></div>
          <?php
            endif;
            $index++;
          endforeach;
          ?>
          <div class="pagination clearfix">
            <?php echo $pagination['links']?>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>


<?php else:?>
	
	{{ helper:lang line="blog:currently_no_posts" }}

<?php endif;?>