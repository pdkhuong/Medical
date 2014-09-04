{{ theme:partial name="slideshow" }}

<div id="main" class="clearfix " style="">
    <div class="avada-row" style="">		
        <div id="content" class="full-width">
           <div id="posts-container" class="">
             {{ theme:partial name="notices" }}
              <div id="post-1" class="post-1 post type-post status-publish format-standard hentry category-uncategorized  align-left clearfix">
               
                <div class="post-content-container">
                  <?php echo $block_blog?>
                </div>
              </div>
             <?php echo $block_counter ?>
             <?php echo $block_reviews ?>
             <?php echo $block_partner?>
            </div> 
        </div>
    </div>


</div>