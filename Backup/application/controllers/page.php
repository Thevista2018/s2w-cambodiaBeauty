<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends MY_Controller 
{

    ///////////////////////////////////////////////// Construct /////////////////////////////////////////////////
    function __construct()
    {
        parent::__construct();
        
        $this->load->helper(array('url', 'html'));
    }
    
    ///////////////////////////////////////////////// Industry Ataglance /////////////////////////////////////////////////
    public function industry_ataglance()
    {
        /* -- Load : Template -- */
        $this->load->view('user/head.tpl.php');
        $this->load->view('user/page/industry_ataglance.tpl.php');
        $this->load->view('user/foot.tpl.php');
    }
    
    ///////////////////////////////////////////////// About Myanmar /////////////////////////////////////////////////
    public function about_myanmar()
    {
        /* -- Load : Template -- */
        $this->load->view('user/head.tpl.php');
        $this->load->view('user/page/about_myanmar.tpl.php');
        $this->load->view('user/foot.tpl.php');
    }
    
    ///////////////////////////////////////////////// About Organizer /////////////////////////////////////////////////
    public function about_organizer()
    {
        /* -- Load : Template -- */
        $this->load->view('user/head.tpl.php');
        $this->load->view('user/page/about_organizer.tpl.php');
        $this->load->view('user/foot.tpl.php');
    }

    ///////////////////////////////////////////////// Supporting Organization /////////////////////////////////////////////////
    public function supporting_organization()
    {
        /* -- Load : Template -- */
        $this->load->view('user/head.tpl.php');
        $this->load->view('user/page/supporting_organization.tpl.php');
        $this->load->view('user/foot.tpl.php');
    }

    ///////////////////////////////////////////////// Post Show Report /////////////////////////////////////////////////
    public function post_show_report()
    {
        /* -- Load : Template -- */
        $this->load->view('user/head.tpl.php');
        $this->load->view('user/page/post_show_report.tpl.php');
        $this->load->view('user/foot.tpl.php');
    }
    
    ///////////////////////////////////////////////// About Venue /////////////////////////////////////////////////
    public function about_venue()
    {
        /* -- Load : Template -- */
        $this->load->view('user/head.tpl.php');
        $this->load->view('user/page/about_venue.tpl.php');
        $this->load->view('user/foot.tpl.php');
    }
    
    ///////////////////////////////////////////////// Admission Policy /////////////////////////////////////////////////
    public function admission_policy()
    {
        /* -- Load : Template -- */
        $this->load->view('user/head.tpl.php');
        $this->load->view('user/page/admission_policy.tpl.php');
        $this->load->view('user/foot.tpl.php');
    }
    
    ///////////////////////////////////////////////// Seminar Conference /////////////////////////////////////////////////
    public function seminar_conference()
    {
        /* -- Load : Template -- */
        $this->load->view('user/head.tpl.php');
        $this->load->view('user/page/seminar_conference.tpl.php');
        $this->load->view('user/foot.tpl.php');
    }
    
    ///////////////////////////////////////////////// Participation Fee /////////////////////////////////////////////////
    public function participation_fee()
    {
        /* -- Load : Template -- */
        $this->load->view('user/head.tpl.php');
        $this->load->view('user/page/participation_fee.tpl.php');
        $this->load->view('user/foot.tpl.php');
    }
    
    ///////////////////////////////////////////////// Travel Accommodation /////////////////////////////////////////////////
    public function travel_accommodation()
    {
        /* -- Load : Template -- */
        $this->load->view('user/head.tpl.php');
        $this->load->view('user/page/travel_accommodation.tpl.php');
        $this->load->view('user/foot.tpl.php');
    }
    
    ///////////////////////////////////////////////// Visa Information /////////////////////////////////////////////////
    public function visa_information()
    {
        /* -- Load : Template -- */
        $this->load->view('user/head.tpl.php');
        $this->load->view('user/page/visa_information.tpl.php');
        $this->load->view('user/foot.tpl.php');
    }
    
    ///////////////////////////////////////////////// Visitor Profile /////////////////////////////////////////////////
    public function visitor_profile()
    {
        /* -- Load : Template -- */
        $this->load->view('user/head.tpl.php');
        $this->load->view('user/page/visitor_profile.tpl.php');
        $this->load->view('user/foot.tpl.php');
    }
    
    ///////////////////////////////////////////////// Exhibitors Profile /////////////////////////////////////////////////
    public function exhibitors_profile()
    {
        /* -- Load : Template -- */
        $this->load->view('user/head.tpl.php');
        $this->load->view('user/page/exhibitors_profile.tpl.php');
        $this->load->view('user/foot.tpl.php');
    }

     ///////////////////////////////////////////////// Sponsorship Opportunity /////////////////////////////////////////////////
    public function sponsorship_opportunity()
    {
        /* -- Load : Template -- */
        $this->load->view('user/head.tpl.php');
        $this->load->view('user/page/sponsorship_opportunity.tpl.php');
        $this->load->view('user/foot.tpl.php');
    }
    
    ///////////////////////////////////////////////// Online Exhibitor Manual /////////////////////////////////////////////////
    public function online_exhibitor_manual()
    {
        /* -- Load : Template -- */
        $this->load->view('user/head.tpl.php');
        $this->load->view('user/page/online_exhibitor_manual.tpl.php');
        $this->load->view('user/foot.tpl.php');
    }
    
    ///////////////////////////////////////////////// Special Activity /////////////////////////////////////////////////
    public function special_activity()
    {
        /* -- Load : Template -- */
        $this->load->view('user/head.tpl.php');
        $this->load->view('user/page/special_activity.tpl.php');
        $this->load->view('user/foot.tpl.php');
    }
	///////////////////////////////////////////////// Information will /////////////////////////////////////////////////
	public function Information_will()
    {
        /* -- Load : Template -- */
        $this->load->view('user/head.tpl.php');
        $this->load->view('user/page/Information_will.tpl.php');
        $this->load->view('user/foot.tpl.php');
    }

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

    
    
}
/* End of file page.php */
/* Location: ./application/controllers/page.php */