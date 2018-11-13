<?php

/**

 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)

 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)

 *

 * Licensed under The MIT License

 * For full copyright and license information, please see the LICENSE.txt

 * Redistributions of files must retain the above copyright notice.

 *

 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)

 * @link      http://cakephp.org CakePHP(tm) Project

 * @since     0.2.9

 * @license   http://www.opensource.org/licenses/mit-license.php MIT License

 */

namespace App\Controller;



use Cake\Controller\Controller;

use Cake\Event\Event;

use Mandrill;


/**

 * Application Controller

 *

 * Add your application-wide methods in the class below, your controllers

 * will inherit them.

 *

 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller

 */

class AppController extends Controller

{



    /**

     * Initialization hook method.

     *

     * Use this method to add common initialization code like loading components.

     *

     * e.g. `$this->loadComponent('Security');`

     *

     * @return void

     */

    public function initialize()
    {

        parent::initialize();

        //$session = $this->request->session();
        $this->loadComponent('RequestHandler');

        $this->loadComponent('Flash');
       // $this->loadComponent('AutoupdateComponent');
		//$this->Auth->allow(['login','register']);
        

        /*

         * Enable the following components for recommended CakePHP security settings.

         * see http://book.cakephp.org/3.0/en/controllers/components/security.html

         */

        //$this->loadComponent('Security');

        //$this->loadComponent('Csrf');

		

		 

         

    }



    /**

     * Before render callback.

     *

     * @param \Cake\Event\Event $event The beforeRender event.

     * @return \Cake\Network\Response|null|void

     */

    public function beforeRender(Event $event)

    {

		

        if (!array_key_exists('_serialize', $this->viewVars) &&

            in_array($this->response->type(), ['application/json', 'application/xml'])

        ) {

            $this->set('_serialize', true);

        }

    }
	
	
	function sendMail($template_name=null,$from_email=null,$from_name=null,$sender_email=null,$sender_name=null,$vars=array(),$subject=null)
  { 
    //App::import('Vendor','mandrill-api-php/src/Network/Email/Mandrill');
	require_once(ROOT . DS . 'vendor' . DS . "mandrill-api-php" . DS . "src/Mandrill.php");
    $mandrill = new Mandrill('Z_XZwRSvVKCYUXzuSqKokQ');

    /*add Template in to mandrilapp*/
    /*$new_template = "new event";
    $template = $mandrill->templates->add($new_template);*/
    
    /*get the infoformation of Template*/
    $template = $mandrill->templates->info($template_name);
    
    $template_slug = $template['slug'];

    /*Content of the Template*/
    $template_content = array(
        array(
            'name' => $template['name'],
            'content' => $template['code']
        )
    );
    //pr($template);die;

    /*message for the maile eg: sender-information, receiver-information, other information that is required for sending mail */
    $message = array(
        //'html' => '<p>Example HTML content</p>',
        //'text' => 'Example text content',
        'subject' => $subject,
        'from_email' => $from_email,
        'from_name' => $from_name,
        'to' => array(
            array(
                'email' => $sender_email,
                'name' => $sender_name,
                'type' => 'to'
            )
        ),
        //'headers' => array('Reply-To' => 'message.reply@example.com'),
        'important' => false,
        'track_opens' => null,
        'track_clicks' => null,
        'auto_text' => null,
        'auto_html' => null,
        'inline_css' => null,
        'url_strip_qs' => null,
        'preserve_recipients' => null,
        'view_content_link' => null,
        //'bcc_address' => 'message.bcc_address@example.com',
        'tracking_domain' => null,
        'signing_domain' => null,
        'return_path_domain' => null,
        'merge' => true,
        'merge_language' => 'mailchimp',
        /*'global_merge_vars' => array(
            array(
                'name' => 'merge1',
                'content' => 'merge1 content'
            )
        ),*/
        'merge_vars' => array(
            array(
                'rcpt' => $sender_email,
                'vars' => $vars
            )
        ),
        'tags' => array('password-resets'),
        /*'subaccount' => '123',
        'google_analytics_domains' => array('example.com'),
        'google_analytics_campaign' => 'message.from_email@example.com',
        'metadata' => array('website' => 'www.example.com'),
        'recipient_metadata' => array(
            array(
                'rcpt' => 'promatics.sumitjain@gmail.com',
                'values' => array('user_id' => 123456)
            )
        ),
        'attachments' => array(
            array(
                'type' => 'text/plain',
                'name' => 'myfile.txt',
                'content' => 'ZXhhbXBsZSBmaWxl'
            )
        ),
        'images' => array(
            array(
                'type' => 'image/png',
                'name' => 'IMAGECID',
                'content' => 'ZXhhbXBsZSBmaWxl'
            )
        )*/
    );
    $async = false;
    $ip_pool = 'Main Pool';
    $send_at = date('Y-m-d H:i:s');
    $result = $mandrill->messages->sendTemplate($template_name, $template_content, $message, $async, $ip_pool, $send_at);
    return true;
    /*
    Array
    (
        [0] => Array
            (
                [email] => recipient.email@example.com
                [status] => sent
                [reject_reason] => hard-bounce
                [_id] => abc123abc123abc123abc123abc123
            )
    
    )
    */
  }
	
	

}

