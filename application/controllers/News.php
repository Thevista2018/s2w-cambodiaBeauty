<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model("news_model","news");
		$this->load->library("banner");
	}

	public function index($type = 'allnews'){
		$data = array();

		$condition = array();

		$condition['fide'] = "*";

		if($type == 'allnews'){
			$condition['where'] = "(article_type = 1 OR article_type = 2 OR article_type = 3)";
		}else if($type == 'allseminar'){
			$condition['where'] = "(article_type = 4 OR article_type = 5)";
		}

		$condition['where'].= " AND article_status != 0 AND article_show = 1";
		$condition['orderby'] = "article_sort ASC,article_datecreate DESC";
		$data['listnews'] = $this->news->listData($condition);

		$data['typepage'] = $type;

		$this->template->frontend('news/main',$data);
	}

	public function release($type = 'news'){
		$data = array();

		$condition = array();

		$condition['fide'] = "*";
		if($type == 'news'){
			$data['Pages'] = 'News & Press release';
			$condition['where'] = "(article_type = 1 OR article_type = 2)";
		}else if($type == 'publicities'){
			$condition['where'] = "article_type = 3";
			$data['Pages'] = 'Publicities';
		}else if($type == 'seminar_conference'){
			$condition['where'] = "article_type = 4";
			$data['Pages'] = 'Seminar Conference';
		}else if($type == 'special_activity'){
			$condition['where'] = "article_type = 5";
			$data['Pages'] = 'Seminar Activity';
		}
		$condition['where'].= " AND article_status != 0 AND article_show = 1";
		$condition['orderby'] = "article_datecreate DESC,article_sort ASC";
		$data['listnews'] = $this->news->listData($condition);

		$data['typepage'] = $type;

		$this->template->frontend('news/release',$data);
	}

	public function newsdetail($type = 'news',$id = ""){
		$data = array();
		if(!empty($id)){
			$condition = array();

			$condition['fide'] = "*";
			if($type == 'news'){
				$data['Pages'] = 'News & Press release';
				$condition['where'] = "(article_type = 1 OR article_type = 2)";
			}else if($type == 'publicities'){
				$condition['where'] = "article_type = 3";
				$data['Pages'] = 'Publicities';
			}else if($type == 'seminar'){
				$condition['where'] = "article_type = 4";
				$data['Pages'] = 'Seminar Conference';
			}else if($type == 'activity'){
				$condition['where'] = "article_type = 5";
				$data['Pages'] = 'Seminar Activity';
			}

			$data['typepage'] = $type;

			$condition['where'].= " AND article_status != 0 AND article_id = ".$id;
			$data['listnews'] = $this->news->listData($condition);
			if(count($data['listnews']) == 0){
				show_404();
			}
		}else{
			show_404();
		}

		$this->template->frontend('news/newsdetail',$data);
	}

	public function newscontent($id = "",$type = 'news'){

		$data = array();
		if(!empty($id)){
			$condition = array();

			$condition['fide'] = "*";
			if($type == 'news'){
				$data['Pages'] = 'News & Press release';
				$condition['where'] = "(article_type = 1 OR article_type = 2)";
			}else if($type == 'publicities'){
				$condition['where'] = "article_type = 3";
				$data['Pages'] = 'Publicities';
			}else if($type == 'seminar'){
				$condition['where'] = "article_type = 4";
				$data['Pages'] = 'Seminar Conference';
			}else if($type == 'activity'){
				$condition['where'] = "article_type = 5";
				$data['Pages'] = 'Seminar Activity';
			}

			$data['typepage'] = $type;

			$condition['where'].= " AND article_status != 0 AND article_id = ".$id;
			$data['listnews'] = $this->news->listData($condition);

			if(count($data['listnews']) == 0){
				show_404();
			}
		}else{
			show_404();
		}

		$this->template->frontend('news/newsdetail',$data);
	}

	public function publicitiescontent($id = "",$type = 'publicities'){

		$data = array();
		if(!empty($id)){
			$condition = array();

			$condition['fide'] = "*";
			if($type == 'news'){
				$data['Pages'] = 'News & Press release';
				$condition['where'] = "(article_type = 1 OR article_type = 2)";
			}else if($type == 'publicities'){
				$condition['where'] = "article_type = 3";
				$data['Pages'] = 'Publicities';
			}else if($type == 'seminar'){
				$condition['where'] = "article_type = 4";
				$data['Pages'] = 'Seminar Conference';
			}else if($type == 'activity'){
				$condition['where'] = "article_type = 5";
				$data['Pages'] = 'Seminar Activity';
			}

			$data['typepage'] = $type;

			$condition['where'].= " AND article_status != 0 AND article_id = ".$id;
			$data['listnews'] = $this->news->listData($condition);

			if(count($data['listnews']) == 0){
				show_404();
			}
		}else{
			show_404();
		}

		$this->template->frontend('news/newsdetail',$data);
	}
	
	public function seminar($type = 'seminar'){
		$data = array();

		$condition = array();

		$condition['fide'] = "*";

		if($type == 'news'){
			$data['Pages'] = 'News & Press release';
			$condition['where'] = "(article_type = 1 OR article_type = 2)";
		}else if($type == 'publicities'){
			$condition['where'] = "article_type = 3";
			$data['Pages'] = 'Publicities';
		}else if($type == 'seminar'){
			$condition['where'] = "article_type = 4";
			$data['Pages'] = 'Seminar Conference';
		}else if($type == 'activity'){
			$condition['where'] = "article_type = 5";
			$data['Pages'] = 'Seminar Activity';
		}


		$condition['where'].= " AND article_status != 0 AND article_show = 1";
		$condition['orderby'] = "article_sort ASC,article_datecreate DESC";
		$data['listnews'] = $this->news->listData($condition);

		$data['typepage'] = $type;

		$this->template->frontend('news/release',$data);
	}

	public function seminarscontent($id = "",$type = 'seminar'){
		$data = array();
		if(!empty($id)){
			$condition = array();

			$condition['fide'] = "*";
			if($type == 'news'){
				$data['Pages'] = 'News & Press release';
				$condition['where'] = "(article_type = 1 OR article_type = 2)";
			}else if($type == 'publicities'){
				$condition['where'] = "article_type = 3";
				$data['Pages'] = 'Publicities';
			}else if($type == 'seminar'){
				$condition['where'] = "article_type = 4";
				$data['Pages'] = 'Seminar Conference';
			}else if($type == 'activity'){
				$condition['where'] = "article_type = 5";
				$data['Pages'] = 'Seminar Activity';
			}

			$data['typepage'] = $type;

			$condition['where'].= " AND article_status != 0 AND article_id = ".$id;
			$data['listnews'] = $this->news->listData($condition);

			if(count($data['listnews']) == 0){
				show_404();
			}
		}else{
			show_404();
		}

		$this->template->frontend('news/newsdetail',$data);
	}
	
	public function specialactivity($type = 'specialactivity'){
		$data = array();

		$condition = array();

		$condition['fide'] = "*";

		if($type == 'news'){
			$data['Pages'] = 'News & Press release';
			$condition['where'] = "(article_type = 1 OR article_type = 2)";
		}else if($type == 'publicities'){
			$condition['where'] = "article_type = 3";
			$data['Pages'] = 'Publicities';
		}else if($type == 'seminar'){
			$condition['where'] = "article_type = 4";
			$data['Pages'] = 'Seminar Conference';
		}else if($type == 'specialactivity'){
			$condition['where'] = "article_type = 5";
			$data['Pages'] = 'Special Activity';
		}


		$condition['where'].= " AND article_status != 0 AND article_show = 1";
		$condition['orderby'] = "article_sort ASC,article_datecreate DESC";
		$data['listnews'] = $this->news->listData($condition);

		$data['typepage'] = $type;

		$this->template->frontend('news/release',$data);
	}

	public function activitycontent($id = "",$type = 'specialactivity'){
		$data = array();
		if(!empty($id)){
			$condition = array();

			$condition['fide'] = "*";
			if($type == 'news'){
				$data['Pages'] = 'News & Press release';
				$condition['where'] = "(article_type = 1 OR article_type = 2)";
			}else if($type == 'publicities'){
				$condition['where'] = "article_type = 3";
				$data['Pages'] = 'Publicities';
			}else if($type == 'seminar'){
				$condition['where'] = "article_type = 4";
				$data['Pages'] = 'Seminar Conference';
			}else if($type == 'specialactivity'){
				$condition['where'] = "article_type = 5";
				$data['Pages'] = 'Special Activity';
			}

			$data['typepage'] = $type;

			$condition['where'].= " AND article_status != 0 AND article_id = ".$id;
			$data['listnews'] = $this->news->listData($condition);

			if(count($data['listnews']) == 0){
				show_404();
			}
		}else{
			show_404();
		}

		$this->template->frontend('news/newsdetail',$data);
	}
	public function gallery(){
		$data = array();

		$this->template->frontend('news/gallery',$data);
	}

	public function gallerydetail(){
		$data = array();

		$this->template->frontend('news/gallerydetail',$data);
	}

}
