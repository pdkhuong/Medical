<div class="fusion-sep-clear post"></div>
<div class="fusion-title title">
    <h2 class="title-heading-left">How can Medtour help me?</h2>
    <div class="title-sep-container">
        <div class="title-sep sep-double"></div>
    </div>
</div>
<div class="fusion-sep-clear post"></div>
<div class="fusion-sep-clear"></div>
<?php foreach($this->config->config['medical']['home_boxes'] as $boxes):?>
<div class="fusion-content-boxes content-boxes columns fusion-columns-3 fusion-content-boxes-6 content-boxes-icon-boxed row">
    <?php foreach($boxes['items'] as $item):?>
    <div class="fusion-column content-box-column content-box-column-1 col-lg-4 col-md-4 col-sm-4">
        <div class="col content-wrapper-background content-wrapper-boxed" style="height: auto; min-height: 166px; overflow: visible; background-color: rgb(246, 246, 246);">
            <div class="heading heading-with-icon">
                <a class="heading-link" href="<?php echo $item['link']?>" target="_self">
                    <div class="icon">
                        <i style="border-color:#333333;background-color:#ffffff;color:#333333;" class="fa fontawesome-icon medium <?php echo $item['class']?> circle-yes"></i>
                    </div>
                    <h2 class="content-box-heading"><?php echo $item['name']?></h2>
                </a>
            </div>
            <div class="content-container"><?php echo $item['description']?></div>
        </div>
    </div>
    <?php endforeach?>
    <div class="fusion-clearfix"></div>
    <div class="fusion-clearfix"></div>
</div>
<?php endforeach?>