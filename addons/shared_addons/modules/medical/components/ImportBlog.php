<?php
class ImportBlog
{
  CONST BLOG_NUM_PAGE = 1;
  CONST DENTIST_BLOG_NUM_PAGE = 7;
	public $blogModel = null;
  public $fileModel = null;
	function __construct() {
		$CI =& get_instance();
		$CI->load->model('fe_blog_m',  NULL, TRUE);
		$bModel = $CI->fe_blog_m;
		$this->blogModel = $bModel::getInstance();
    $CI->load->library('simple_html_dom');

    $CI->load->model('fe_file_m', null, true);
    $fModel = $CI->fe_file_m;
    $this->fileModel = $fModel::getInstance();

    set_time_limit(0);
	}
  public function downloadFile($fileUrl){
    $fileId = 0;
    $fileExt = 'jpg';
    $fileUniqId = substr(md5(microtime() . rand(0,100)), 0, 12).substr($fileExt,1);
    $fileName = $fileUniqId.$fileExt.'.'.$fileExt;
    $fileFolder = FCPATH."uploads/default/files/";

    $result = file_put_contents($fileFolder.$fileName, file_get_contents($fileUrl));
    if($result){
      $info = image_get_info($fileFolder.$fileName);
      $data = array(
        'id'=>$fileUniqId,
        'folder_id'		=> FILE_BLOG_FOLDER_ID,
        'user_id'		=> 1,
        'type'			=> 'i',
        'name'			=> $fileName,
        'path'			=> '{{ url:site }}files/large/'.$fileName,
        'description'	=> 'import',
        'alt_attribute'	=> '',
        'filename'		=> $fileName,
        'extension'		=> $info['extension'],
        'mimetype'		=> $info['mime_type'],
        'filesize'		=> $info['file_size'],
        'width'			=> $info['width'],
        'height'		=> $info['height'],
        'date_added'	=> now()
      );
      $this->fileModel->insert($data);
      $fileId = $fileUniqId;
    }
    return $fileId;

  }
  public function import(){

    $blogMainLink = "http://www.specialistdentalgroup.com/blog/";
    for($page = 1; $page <= self::BLOG_NUM_PAGE; $page++){
      $link = $page!= 1 ? $blogMainLink.'page/'.$page : $blogMainLink;
      $blockLinkByPages = $this->getLinkList($link);
      foreach($blockLinkByPages as $blockLinkByPage){
        $this->saveBlogData($blockLinkByPage, 1);
      }
    }
die();
    $blogMainLink = "http://www.specialistdentalgroup.com/category/dentist-blog/";
    for($page = 1; $page <= self::DENTIST_BLOG_NUM_PAGE; $page++){
      $link = $page!= 1 ? $blogMainLink.'page/'.$page : $blogMainLink;
      $blockLinkByPages = $this->getLinkList($link);
      foreach($blockLinkByPages as $blockLinkByPage){
        $this->saveBlogData($blockLinkByPage, 2);
      }
    }

  }
  public function saveBlogData($elementInfo, $categoryId=1){
    $link = $elementInfo['link'];
    $linkArr = explode("/", $link);
    $slug = $linkArr[count($linkArr)-2];
    $content = file_get_html($link);
    if($content){
      $title = $elementInfo['title'];
      $content = $content->find('div.main-content-div', 0);
      /*
      $body = $content->find('p');
      foreach($body as $k=> $e){
        if($k==0){
          $title = $e->plaintext;
          $e->outertext = "";
        }
        if($k==count($body)-1){
          $e->outertext = "";
        }
      }*/
      //$body = str_replace("specialistdentalgroup.com", "medtour.com.au" ,$content->innertext);
      $fileUrl = $elementInfo['thumbnail'];
      $fileId = $this->downloadFile($fileUrl);
      $body = $content->innertext;
      $data = array();
      $data['title'] = trim($title);
      $data['slug'] = $slug;
      $data['created'] = date("Y/m/d H:i:s", time());;
      $data['intro'] = "";
      $data['body'] = trim($body);
      $data['status'] = 'live';
      $data['type'] = 'wysiwyg-advanced';
      $data['author_id'] = 1;
      $data['category_id'] = $categoryId;
      $data['parsed'] = '';
      $data['created_on'] = now();
      $data['created_by'] = 1;
      $data['updated_on'] = 0;
      $data['image'] = $fileId;
      $this->blogModel->insert($data);
    }
  }
  public function getLinkList($mainPageLink, $type='block'){
    $ret = array();
    $mainPage = file_get_html($mainPageLink);
    //$linkElements = $mainPage->find("a.read-more");
    $linkElements = $mainPage->find("a.thumbnail");
    if($linkElements){
      foreach($linkElements as $key => $linkElement){
        if($linkElement){
          $link = $linkElement->href;
          $title = $linkElement->title;
          $thumbnail = $linkElement->find("img", 0)->src;
          $ret[] = array('link'=>$link, 'title'=>$title, 'thumbnail'=>$thumbnail);
        }
      }
    }
    return $ret;
  }
}