<?php
  $pageTitle = fuel_var('page_title', '');
  if (!empty($is_blog)){
    $pageTitle = $CI->fuel_blog->page_title($page_title, ' : ', 'right');
  }
?>
<!DOCTYPE html>
<!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->  <html> <!--<![endif]-->
<head>
    <title><?php echo $pageTitle?></title>
    <meta charset="utf-8">
    <meta name="keywords" content="<?php echo fuel_var('meta_keywords')?>" />
    <meta name="description" content="<?php echo fuel_var('meta_description')?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $this->load->view('_blocks/css')?>
    <?php $this->load->view('_blocks/top_script')?>
</head>
<body>
    <div id="page-wrapper">
        <?php $this->load->view('_blocks/header')?>
        <?php $this->load->view('_blocks/slideshow')?>
        <?php echo fuel_var('body', '') ?>    
        <?php $this->load->view('_blocks/footer')?>
    </div>
    <?php $this->load->view('_blocks/bottom_script')?>
  
</body>
</html>

