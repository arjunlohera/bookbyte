<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//Library to add the Header and Footer to the Website 
class Layout {

    // Get the CI Instance
    public $core;

    function __construct() {
        $this->core = &get_instance();
    } 


    public $baseDir = "";
    public $ini = APPPATH."/layouts/layouts.ini";
    public $title = "Book Byte";
    public $body_class = "";
    public $page = "HOME";
    public $meta = array();
    public $css = array(); 
    public $js = array();
    public $desc = array();
    public $keywords = array();

    public function header($page, $show = true, $sidebar = true) {

        //$data is Var for Tunneling Between the Views and Controller Through Layout Class  
        // Pack Header Data from the ini file
        $ini = parse_ini_file($this->ini,true);

        if(isset($ini[$page])) { // Pack 

            $this->page = $page;
            $this->title = (isset($ini[$page]['page_title']))       ?  $ini[$page]['page_title'] : $ini['GLOBAL']['page_title']; 
            $this->body_class = (isset($ini[$page]['body_class']))       ?  $ini[$page]['body_class'] : $ini['GLOBAL']['body_class']; 
            $this->desc = (isset($ini[$page]['description'])) ?  $ini[$page]['description'] : $ini['GLOBAL']['description']; 
            $this->keywords = (isset($ini[$page.'-KEYWORDS']))    ?  $ini[$page.'-KEYWORDS'] : $ini['GLOBAL-KEYWORDS'] ; 
     
           // Pack Css Files
           $this->css = array_unique(array_merge($ini['GLOBAL-CSS'] , (isset($ini[$page.'-CSS'])) ? $ini[$page.'-CSS'] : array()  ));
           $this->js  = array_unique(array_merge($ini['GLOBAL-JS'] ,  (isset($ini[$page.'-JS'])) ? $ini[$page.'-JS'] : array()  ));

        } else { // Pack Meta from Globals 
            $this->title = $ini['GLOBAL']['page_title']; 
            $this->body_class = $ini['GLOBAL']['body_class']; 
            $this->desc = $ini['GLOBAL']['description'];
            $this->keywords = $ini['GLOBAL-KEYWORDS'];  
            $this->css = array_unique(array_merge($ini['GLOBAL-CSS'] ,  (isset($ini[$page.'-CSS'])) ? $ini[$page.'-CSS'] : array() ));
            $this->js  = array_unique(array_merge($ini['GLOBAL-JS'] ,   (isset($ini[$page.'-JS'])) ? $ini[$page.'-JS'] : array() ));
        }

        //Address External urls  
        foreach($this->css as &$c) {
            if($c[0] == '*') { $c = str_replace("*","",trim($c));  } else { $c = base_url().$c.".css";  }  
            $c =  preg_replace('/([^:])(\/{2,})/',"/",$c); //Fix malformed url 
        }

        foreach($this->js as &$j) {
            if($j[0] == '*') { $j = str_replace("*","",trim($j));  } else { $j = base_url().$j.".js";  }  
            $j =  preg_replace('/([^:])(\/{2,})/',"/",$j); //Fix malformed url : remove unwanted slashes 
        }

        $data = array( //Deliver package to header 

                   'pageId'        => $page,
                   'page_title'   => $this->title,
                   'description'  => $this->desc,
                   'keywords'     => $this->keywords,
                   'css'          => $this->css, 
                   'js'           => $this->js,
                   'body_class'   => $this->body_class,
                   'show_header'  => $show,
                   'sidebar'      => $sidebar

                );


        $this->core->load->view('layouts/header', $data);
    }
    
 
    public function footer($page, $show = true) {

        //$data is Var for Tunneling Between the Views and Controller Through Layout Class  
        // Pack Header Data from the ini file
        $ini = parse_ini_file($this->ini,true);

 
        if(isset($ini[$page])) { // Pack 
            $this->js  = array_unique(array_merge($ini['GLOBAL-JS'] , (isset($ini[$page.'-JS'])) ? $ini[$page.'-JS'] : array() ));
        } else { // Pack Meta from Globals 
            $this->js  = array_unique($ini['GLOBAL-JS']);
        }


        foreach($this->js as &$j) {
        if($j[0] == '*') { $j = str_replace("*","",trim($j));  } else { $j = base_url().$j.".js";  }  
            $j =  preg_replace('/([^:])(\/{2,})/',"/",$j); //Fix malformed url : remove unwanted slashes 
        }

 

        $data = array( //Deliver package to header 
                   'js'           => $this->js,
                   'body_class'   => $this->body_class,
                   'show_footer'  => $show
                );

        $this->core->load->view('layouts/footer.php', $data);

    }

    public function site_header($page, $show_header = true) {
        $ini = parse_ini_file($this->ini, true);

        if(isset($ini[$page])) { // Pack 

            $this->page = $page;
            $this->title = (isset($ini[$page]['page_title']))       ?  $ini[$page]['page_title'] : $ini['GLOBAL']['page_title']; 
            $this->body_class = (isset($ini[$page]['body_class']))       ?  $ini[$page]['body_class'] : $ini['GLOBAL']['body_class']; 
            $this->desc = (isset($ini[$page]['description'])) ?  $ini[$page]['description'] : $ini['GLOBAL']['description']; 
            $this->keywords = (isset($ini[$page.'-KEYWORDS']))    ?  $ini[$page.'-KEYWORDS'] : $ini['GLOBAL-KEYWORDS'] ; 
     
           // Pack Css Files
           $this->css = array_unique(array_merge($ini['GLOBAL-CSS'] , (isset($ini[$page.'-CSS'])) ? $ini[$page.'-CSS'] : array()  ));
           $this->js  = array_unique(array_merge($ini['GLOBAL-JS'] ,  (isset($ini[$page.'-JS'])) ? $ini[$page.'-JS'] : array()  ));

        } else { // Pack Meta from Globals 
            $this->title = $ini['GLOBAL']['page_title']; 
            $this->body_class = $ini['GLOBAL']['body_class']; 
            $this->desc = $ini['GLOBAL']['description'];
            $this->keywords = $ini['GLOBAL-KEYWORDS'];  
            $this->css = array_unique(array_merge($ini['GLOBAL-CSS'] ,  (isset($ini[$page.'-CSS'])) ? $ini[$page.'-CSS'] : array() ));
            $this->js  = array_unique(array_merge($ini['GLOBAL-JS'] ,   (isset($ini[$page.'-JS'])) ? $ini[$page.'-JS'] : array() ));
        }

        //Address External urls  
        foreach($this->css as &$c) {
            if($c[0] == '*') { $c = str_replace("*","",trim($c));  } else { $c = base_url().$c.".css";  }  
            $c =  preg_replace('/([^:])(\/{2,})/',"/",$c); //Fix malformed url 
        }

        foreach($this->js as &$j) {
            if($j[0] == '*') { $j = str_replace("*","",trim($j));  } else { $j = base_url().$j.".js";  }  
            $j =  preg_replace('/([^:])(\/{2,})/',"/",$j); //Fix malformed url : remove unwanted slashes 
        }

        $data = array( //Deliver package to header 

                   'pageId'        => $page,
                   'page_title'   => $this->title,
                   'description'  => $this->desc,
                   'keywords'     => $this->keywords,
                   'css'          => $this->css, 
                   'js'           => $this->js,
                   'body_class'   => $this->body_class,
                   'show_header'  => $show_header

                );


        $this->core->load->view('site/header', $data);

    }

    public function site_footer($page, $show_footer = true) {

        // Pack Header Data from the ini file
        $ini = parse_ini_file($this->ini,true);

        if(isset($ini[$page])) { // Pack 
            $this->js  = array_unique(array_merge($ini['GLOBAL-JS'] , (isset($ini[$page.'-JS'])) ? $ini[$page.'-JS'] : array() ));
        } else { // Pack Meta from Globals 
            $this->js  = array_unique($ini['GLOBAL-JS']);
        }

        foreach($this->js as &$j) {
        if($j[0] == '*') { $j = str_replace("*","",trim($j));  } else { $j = base_url().$j.".js";  }  
            $j =  preg_replace('/([^:])(\/{2,})/',"/",$j); //Fix malformed url : remove unwanted slashes 
        }

        $data = array( //Deliver package to header 
                   'js'           => $this->js,
                   'show_footer'  => $show_footer
                );

        $this->core->load->view('site/footer', $data);

    }
    
 
}
?>