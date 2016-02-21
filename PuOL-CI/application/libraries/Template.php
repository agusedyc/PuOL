<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template{
    protected $_CI;
    
    // private $setTheme;
    protected $useTheme = array();
    function __construct(array $useTheme = array()){
        $this->_CI=&get_instance();
        // $theme = $this->setTheme(2);
        $this->useTheme =  $useTheme;
        // print_r($this->useTheme);
    }
  
    function setTheme(){
        $useTheme = $this->useTheme;

        $listTheme = new stdClass;
        $listTheme->t1 = 'alt';
        $listTheme->t2 = 'themeV2';
        // $useTheme = 't2';
        return $listTheme->$useTheme['0'];
    }

    function display($view, $data=null){
        
        $data['_header']=$this->_CI->load->view(''.$this->setTheme().'/template/navhome',$data,true);
        
        $data['_sidebar']=$this->_CI->load->view(''.$this->setTheme().'/template/sidehome',$data,true);
        
        $data['_content']=$this->_CI->load->view(''.$this->setTheme().'/'.$view,$data,true);

        $data['_footer']=$this->_CI->load->view(''.$this->setTheme().'/template/footer',$data,true);
               
        $this->_CI->load->view(''.$this->setTheme().'/template',$data);
    }

    function login($view, $data=null){
        
        $data['_header']=null;
        
        $data['_sidebar']=NULL;
        
        $data['_content']=$this->_CI->load->view(''.$this->setTheme().'/'.$view,$data,true);

        $data['_footer']=NULL;
               
        $this->_CI->load->view(''.$this->setTheme().'/template/template',$data);
    }

    
}


/* End of file template.php */
/* Location: ./application/libraries/Template.php */