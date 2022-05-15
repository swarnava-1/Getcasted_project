<?php



/*

 * To change this license header, choose License Headers in Project Properties.

 * To change this template file, choose Tools | Templates

 * and open the template in the editor.

 */



/**

 * Description of sendmail

 *

 * @author Aqualeaf

 */

class Sendmail extends CI_Model {



//    private $config;
        function __construct() {

        parent::__construct();


        $config = Array(

            'protocol' => 'smtp',

//            'smtp_host' => $this->page->getextra_link("SMTP_host"),

//            'smtp_port' => $this->page->getextra_link("SMTP_port"),

//            'smtp_user' => $this->page->getextra_link("SMTP_email"),

//            'smtp_pass' => $this->page->getextra_link("SMTP_password"),

             'smtp_host' => "smtp.sendgrid.net",

            'smtp_port' => "587",

            'smtp_user' => "mono",

            'smtp_pass' => "mono1988",

            'mailtype' => 'html',

            'charset' => 'utf-8',

            'wordwrap' => TRUE

        );

        $this->load->library('email', $config);

    }

    function send($name, $email, $sub, $mss, $toEmail) {

        $this->email->from($email, $name);

        $this->email->to($toEmail);

        $this->email->reply_to($email, $name);

        $this->email->subject($sub);

        $this->email->message($mss);

        if ($this->email->send()) {
            return "success";
        } 
        else {
            return "Failed";
        }
    }
}
?>