<?php
class ImportBlog
{
  CONST BLOG_NUM_PAGE = 35;
  CONST DENTIST_BLOG_NUM_PAGE = 7;
	public $blogModel = null;
	function __construct() {
		$CI =& get_instance();
		$CI->load->model('fe_blog_m',  NULL, TRUE);
		$bModel = $CI->fe_blog_m;
		$this->blogModel = $bModel::getInstance();
    $CI->load->library('simple_html_dom');
    set_time_limit(0);
	}
  public function import(){

    $blogMainLink = "http://www.specialistdentalgroup.com/blog/";
    for($page = 1; $page <= self::BLOG_NUM_PAGE; $page++){
      $link = $page!= 1 ? $blogMainLink.'page/'.$page : $blogMainLink;
      $blockLinkByPages = $this->getLinkList($link);
      //$allBlockLink = array_merge($allBlockLink, $blockLinkByPage) ;
      foreach($blockLinkByPages as $blockLinkByPage){
        $this->saveBlogData($blockLinkByPage, 1);
      }
    }


    $blogMainLink = "http://www.specialistdentalgroup.com/category/dentist-blog/";
    for($page = 1; $page <= self::DENTIST_BLOG_NUM_PAGE; $page++){
      $link = $page!= 1 ? $blogMainLink.'page/'.$page : $blogMainLink;
      $blockLinkByPages = $this->getLinkList($link);
      foreach($blockLinkByPages as $blockLinkByPage){
        $this->saveBlogData($blockLinkByPage, 2);
      }
    }

  }
  public function saveBlogData($link, $categoryId=1){
    print_r($link); echo "<br>";
    $linkArr = explode("/", $link);
    $slug = $linkArr[count($linkArr)-2];
    $content = file_get_html($link);
    if($content){
      $title = $content->find("div.banner", 0)->plaintext;
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
      $body = $content->innertext;
      $data = array();
      $data['title'] = trim($title);
      $data['slug'] = $slug;
      $data['created'] = date("Y/m/d H:i:s", time());;
      $data['intro'] = "Medical tourism Vietnam";
      $data['body'] = trim($body);
      $data['status'] = 'live';
      $data['type'] = 'wysiwyg-advanced';
      $data['author_id'] = 1;
      $data['category_id'] = $categoryId;
      $data['parsed'] = '';
      $data['created_on'] = now();
      $data['created_by'] = 1;
      $data['updated_on'] = 0;
      $this->blogModel->insert($data);
    }
  }
  public function getLinkList($mainPageLink, $type='block'){
    $ret = array();
    $mainPage = file_get_html($mainPageLink);
    $linkElements = $mainPage->find("a.read-more");
    if($linkElements){
      foreach($linkElements as $key => $linkElement){
        if($linkElement){
          $link = $linkElement->href;
          $ret[] = $link;
        }
      }
    }
    return $ret;
  }
	/****************************** VnExpress ************************************/
	//map lai cac link rss
	public function importRssVnExpress(){
		$rssMap = array(
				array(
						'url'=>'http://vnexpress.net/rss/thoi-su.rss',
						'genre_id'=>GENRE_XAHOI//xa hoi
				),
				array(
						'url'=>'http://vnexpress.net/rss/the-gioi.rss',
						'genre_id'=>GENRE_QUOCTE//quoc te
				),
				array(
						'url'=>'http://vnexpress.net/rss/kinh-doanh.rss',
						'genre_id'=>GENRE_KINHTE,//kinh te
				),
				array(
						'url'=>'http://vnexpress.net/rss/giai-tri.rss',
						'genre_id'=>GENRE_NGOISAO
				),
				array(
						'url'=>'http://vnexpress.net/rss/the-thao.rss',
						'genre_id'=>GENRE_THETHAO
				),
				array(
						'url'=>'http://vnexpress.net/rss/phap-luat.rss',
						'genre_id'=>GENRE_PHAPLUAT
				),
				array(
						'url'=>'http://vnexpress.net/rss/so-hoa.rss',
						'genre_id'=>GENRE_CONGNGHE
				),
				array(
						'url'=>'http://vnexpress.net/rss/giao-duc.rss',
						'genre_id'=>GENRE_GIAODUC
				),
				array(
						'url'=>'http://vnexpress.net/rss/oto-xe-may.rss',
						'genre_id'=>GENRE_XE
				),
				array(
						'url'=>'http://vnexpress.net/rss/cuoi.rss',
						'genre_id'=>GENRE_CUOI
				),
		);
		$id = 0;
		foreach($rssMap as $rss){
			$id = $this->importRssVNExpressByUrl($rss['url'], $rss['genre_id']);
		}
		return $id;
	}
	//import tung link rss
	public function importRssVNExpressByUrl($url, $genreId){
		$content = getFileContent($url);
		if(!$content){
		   return false;
		}
		$data = new SimpleXmlElement($content);
		$channel = $data->channel;
		$extraData['genre_id'] = $genreId;
		if(!empty($channel)){
			foreach($channel->item as $item){
				$link = $item->link;
				$pos = strrpos($link, '/tu-van/');
				if(!$pos){
					$pos = strrpos($link, '/hoi-dap/');
				}
				if(!$pos){//ko import nhung muc tu van
					$extraData['title'] = strval($item->title);
					$description = strval($item->description);
					$domDescription = str_get_html($description);
					$imgObj = $domDescription->find('img', 0);
					if($imgObj==NULL){
					    $extraData['image'] = "";
					}else{
					    $extraData['image'] = $imgObj->src;
					}
					
					$extraData['intro'] = $domDescription->plaintext;
					$pubDate = strval($item->pubDate);
					$dateParse = date_parse_from_format("D, d M Y H:i:s", $pubDate);
					$dateFormated = $dateParse['year']."/".$dateParse['month']."/".$dateParse['day']." ".$dateParse['hour'].":".$dateParse['minute'].":0";
					$extraData['created_date'] = strtotime($dateFormated);
					//echo $link;
					$id = $this->importVNExpressFromUrl($link, $extraData);
					//echo "\n$id\n";
				}
			}
		}
		return $id;
	}
	//import tung link bai bao
	public function importVNExpressFromUrl($url, $extraData=array()){
		$isExist = $this->News_model->isExistSource($url);
		$id = 0;
	
		if(!$isExist){
		    $contentUrl = getFileContent($url);
		    if(!$contentUrl){
		        return false;
		    }
			$htmlAll = str_get_html($contentUrl);
			$html = "";
			if($htmlAll){
				$html = $htmlAll->find('div.block_col_480', 0);
			}
			if($html){
	
				$metas = getMetaFromHtml($htmlAll);
				$image = $metas['og:image'];
				if($image){
					$siteImage = isset($extraData['image']) ? $extraData['image'] : str_replace("490x294", "180x108", $image);
					$data['image'] = saveImageFromSite($siteImage, $this->thumbOption);
				}
				if(isset($extraData['created_date'])){
					$data['created_date'] = $extraData['created_date'];
				}else{
					$pubDate = $metas['datePublished'];
					$dateParse = date_parse_from_format("Y-m-d H:i", $pubDate);
					$dateFormated = $dateParse['year']."/".$dateParse['month']."/".$dateParse['day']." ".$dateParse['hour'].":".$dateParse['minute'].":0";
					$data['created_date'] = strtotime($dateFormated);
				}
				$title = isset($extraData['title']) ? $extraData['title'] : $html->find('div.title_news', 0)->innertext;
				$intro = isset($extraData['intro']) ? $extraData['intro'] : $html->find('div.short_intro', 0)->innertext;
				$bodyP = $html->find('p.Normal');
				foreach($bodyP as $k=> $e){
					$eText = strip_tags($e->innertext);
					if($eText){
						$e->outertext = "<p>".$eText."</p>";
					}
				}
				$content = $html->find('div.fck_detail', 0)->innertext;
				$pos = strrpos($content, '<p');
				if($pos){
					$content = substr($content, 0, $pos);
				}
				$data['title'] = filterText($title, true);
				$data['intro'] = filterText($intro, true);
				$data['content'] = filterText($content, false);
				if($data['content'] && $data['intro']){
					$data['status'] = STATUS_SHOW;
				}else{
					$data['status'] = STATUS_WAITING_APPROVE;
				}
				$data['source'] = strip_slashes($url);
				$data['genre_id'] = $extraData['genre_id'];
				$id = $this->News_model->insert($data);
	
			}
		}
		return $id;
	}
	/**************************** End VnExpress *******************/
}