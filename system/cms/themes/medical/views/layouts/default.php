
<!DOCTYPE html>
<!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->  <html> <!--<![endif]-->
<head>
    <title><?php echo $template['title']?></title>
    <meta charset="utf-8">
    <meta name="keywords" content="keywords" />
    <meta name="description" content="description">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php theme_partial('css')?>
    <?php theme_partial('top_script')?>
</head>
<body>
    <div id="page-wrapper">
        <?php theme_partial('header')?>
        <?php theme_partial('slideshow')?>
        <?php echo $template['body']; ?>  
        <?php theme_partial('footer')?>
    </div>
    <?php theme_partial('bottom_script')?>
  
</body>
</html>

