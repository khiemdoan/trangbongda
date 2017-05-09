<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class View extends CI_Controller {
    
    function __construct() {
        parent::__construct();

        $this->load->model('articles_model');
        $this->load->model('videos_model');
    }

    // trang chủ
    public function index() {
        $data['list_articles'] = $this->articles_model->getListArticles(6, 0);
        
        $data['title'] = 'Home';
        $this->load->view('template/header.php', $data);
        $this->load->view('template/slide_bar_index', $data);
        $this->load->view('home', $data);
        $this->load->view('template/footer.php', $data);
    }
    
    // xem danh sách các bài viết
    public function all_articles($page = 1) {
        $per_page = 6;      // số bài viết trên một trang
        
        $mount = $this->articles_model->countArticles();
        
        // cấu hình phân trang
        config_paginator('view/all_articles', $mount, $per_page);
        
        $data['list_articles'] = $this->articles_model->getListArticles($per_page, ($page - 1) * $per_page);
        
        // lấy dữ liệu cho side bar
        $data['articles_sidebar'] = $this->articles_model->getArticlesForSideBar(5);
        $data['videos_sidebar'] = $this->videos_model->getVideosForSideBar(5);
        
        $this->load->view('template/header.php', $data);
        $this->load->view('template/slide_bar', $data);
        $this->load->view('articles/all_articles', $data);
        $this->load->view('template/side_bar', $data);
        $this->load->view('template/footer.php', $data);
    }
    
    // xem chi tiết article
    public function article($alias = '') {
        if (!isset($alias) || empty($alias)) {
            redirect('view/all_articles');
        }
        $data['article'] = $this->articles_model->getArticleByAlias($alias);
        
        // lấy dữ liệu cho side bar
        $data['articles_sidebar'] = $this->articles_model->getArticlesForSideBar(5);
        $data['videos_sidebar'] = $this->videos_model->getVideosForSideBar(5);
        
        $this->load->view('template/header.php', $data);
        $this->load->view('template/slide_bar', $data);
        $this->load->view('articles/article', $data);
        $this->load->view('template/side_bar', $data);
        $this->load->view('template/footer.php', $data);
    }
    
    // xem danh sách các video
    public function all_videos($page = 1) {
        $per_page = 6;      // số bài viết trên một trang
        
        // cấu hình phân trang
        $mount = $this->videos_model->countVideos();
        config_paginator('view/all_videos', $mount, $per_page);
        
        $data['list_videos'] = $this->videos_model->getListVideos($per_page, ($page - 1) * $per_page);
        
        // lấy dữ liệu cho side bar
        $data['articles_sidebar'] = $this->articles_model->getArticlesForSideBar(5);
        $data['videos_sidebar'] = $this->videos_model->getVideosForSideBar(5);
        
        $this->load->view('template/header.php', $data);
        $this->load->view('template/slide_bar', $data);
        $this->load->view('videos/all_videos', $data);
        $this->load->view('template/side_bar', $data);
        $this->load->view('template/footer.php', $data);
    }
    
    // xem chi tiết video
    public function video($alias = '') {
        if (!isset($alias) || empty($alias)) {
            redirect('view/all_videos');
        }

        $data['video'] = $this->videos_model->getVideoByAlias($alias);
        
        // lấy dữ liệu cho side bar
        $data['articles_sidebar'] = $this->articles_model->getArticlesForSideBar(5);
        $data['videos_sidebar'] = $this->videos_model->getVideosForSideBar(5);
        
        $this->load->view('template/header.php', $data);
        $this->load->view('template/slide_bar', $data);
        $this->load->view('videos/video', $data);
        $this->load->view('template/side_bar', $data);
        $this->load->view('template/footer.php', $data);
    }
    
    //Xem bang xep hang
    public function ranking($regional_id = 1){
        $this->load->model('ranking_model');
        $data['regionals'] = $this->ranking_model->getRegional();
        $data['ranking'] = $this->ranking_model->getRankingDataByRegional($regional_id);
        $data['regional'] = $this->ranking_model->getRegionalById($regional_id);
        
        // lấy dữ liệu cho side bar
        $data['articles_sidebar'] = $this->articles_model->getArticlesForSideBar(5);
        $data['videos_sidebar'] = $this->videos_model->getVideosForSideBar(5);
        
        $this->load->view('template/header.php', $data);
        $this->load->view('template/slide_bar', $data);
        $this->load->view('ranking/ranking_table', $data);
        $this->load->view('template/side_bar', $data);
        $this->load->view('template/footer.php', $data);
    }
    
    //Xem thong tin vé của trận đáu bóng.
    public function ticket($match_id = 1) {
        $this->load->model('tickets_model');
        $data['matchs'] = $this->tickets_model->getMatch();
        $data['tickets'] = $this->tickets_model->getTicketForMatch($match_id);
        $data['match'] = $this->tickets_model->getMatchById($match_id);
        
        // lấy dữ liệu cho side bar
        $data['articles_sidebar'] = $this->articles_model->getArticlesForSideBar(5);
        $data['videos_sidebar'] = $this->videos_model->getVideosForSideBar(5);
        
        $this->load->view('template/header.php', $data);
        $this->load->view('template/slide_bar', $data);
        $this->load->view('tickets/ticket_information', $data);
        $this->load->view('template/side_bar', $data);
        $this->load->view('template/footer.php', $data);
    }
}
