<?php
/**.

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

use App\Controller\AppController;

use Cake\Core\Configure;

use Cake\Network\Exception\ForbiddenException;

use Cake\Network\Exception\NotFoundException;

use Cake\View\Exception\MissingTemplateException;

use Cake\ORM\TableRegistry;

use Cake\Datasource\ConnectionManager;

use MandrillApi\Network\Email\MandrillApi;

//use Cake\Datasource\EntityInterface;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */

class HomeController extends AppController

{

    var $helpers = array(
        'Form'
    );

    var $components = array(
        'Session',
        'Flash'
    );

    /**
     * Displays a view
     *
     * @param string ...$path Path segments.
     * @return void|\Cake\Network\Response
     * @throws \Cake\Network\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\Network\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */

    /*------------------------------------------------- Login Screen ------------------------------------------*/

    public function index()

    {
        $this->loadModel('Therapists');
        $this->viewBuilder()
            ->setLayout("front");
        $therapiests = $this
            ->Therapists
            ->find('all', array(
            'conditions' => array(
                'status' => 'a'
            ) ,
            'order' => array(
                'name' => 'ASC'
            )
        ));
        //->where(['status ' => 'a']);
        //$this->sendMail('admin-message-to-user','Aspen Strong Directory','','kirti@frogiez.com','Test',array(),'Test');
        /*$email = new Mandrill(['template_name'=>'as-directory-monthly-update']);
        $email
        ->subject('Mon sujet Mandrill')
        ->from('contact@example.com',"Mon nom d'expéditeur")
        ->data([
        	'kirti.bhat@mailinator.com'=> [
        		'displayname' => 'monsieur 1',
        		'texteperso' => "Lorem ipsum dolor sit amet." 
        	]
        ])
        ->send();*/
        $this->loadModel('LanguageOptions');

        $languages = $this
            ->LanguageOptions
            ->find('all', array(
            'conditions' => array(
                'status' => 'a'
            ) ,
            'order' => array(
                'name' => 'ASC'
            )
        ))
            ->toArray();

        $this->set(compact('therapiests', 'languages'));

    }

    public function termsconditions()

    {
        $this->viewBuilder()
            ->setLayout("front");

    }

    public function searchResults()

    {

        $this->viewBuilder()
            ->setLayout("front");

        $this->loadModel('Treatments');

        $treatments = $this
            ->Treatments
            ->find('all', ['order' => ['name' => 'ASC']])
            ->where(['status ' => 'a']);

        $this->loadModel('Ages');

        $ages = $this
            ->Ages
            ->find('all', ['order' => ['name' => 'ASC']])
            ->where(['status ' => 'a']);

        $this->loadModel('Issues');

        $issues = $this
            ->Issues
            ->find('all', ['order' => ['name' => 'ASC']])
            ->where(['status ' => 'a']);

        $this->loadModel('InsuranceProviders');

        $insuranceProviders = $this
            ->InsuranceProviders
            ->find('all', ['order' => ['name' => 'ASC']])
            ->where(['status ' => 'a']);

        $this->loadModel('Modalities');

        $modalities = $this
            ->Modalities
            ->find('all', ['order' => ['name' => 'ASC']])
            ->where(['status ' => 'a']);

        $this->loadModel('FinancialSupport');
        $financialSupport = $this
            ->FinancialSupport
            ->find('all', ['order' => ['name' => 'ASC']])
            ->where(['status ' => 'a']);

        $this->loadModel('LanguageOptions');
        $languageOptions = $this
            ->LanguageOptions
            ->find('all', ['order' => ['name' => 'ASC']])
            ->where(['status ' => 'a']);

        $this->loadModel('Therapists');
        //$therapiests=$this->Therapists->find('all'['order' => ['name' => 'ASC']])
        $therapiests = $this
            ->Therapists
            ->find('all')
            ->where(['status ' => 'a']);

        $this->loadModel('LanguageOptions');

        $languages = $this
            ->LanguageOptions
            ->find('all', array(
            'conditions' => array(
                'status' => 'a'
            ) ,
            'order' => array(
                'name' => 'ASC'
            )
        ))
            ->toArray();

        $this->set(compact('modalities', 'insuranceProviders', 'issues', 'ages', 'treatments', 'financialSupport', 'languageOptions', 'therapiests', 'languages'));

        $this->loadModel('AsConnections');

        $this->loadModel('Socialnets');

        $this->loadModel('AsConnectionsSocials');

        $this->loadModel('AsConnectionsLinks');

        $this->loadModel('AsConnectionsMetas');

        $this->loadModel('AsConnectionsAddresses');

        $this->loadModel('Therapists');
        $conditions = array();
        if ($this
            ->request
            ->is('post'))
        {

            if (isset($_POST['search_page']) && $_POST['search_page'] == 1)
            {
                //print_r($_POST['data']);die;
                $data = $_POST['data'];

                if (isset($data['asconnections']['entry_type']) && $data['asconnections']['entry_type'] != "")
                {
                    $conditions['entry_type'] = $data['asconnections']['entry_type'];
                }

                if (isset($data['asconnections']['status1']) && $data['asconnections']['status1'] != "")
                {
                    if ($data['asconnections']['status1'] == "MHF")
                    {
                        $conditions['health_fund_status'] = 1;
                    }
                }
                if (isset($data['asconnections']['status2']) && $data['asconnections']['status2'] != "")
                {
                    if ($data['asconnections']['status2'] == "Traid")
                    {

                        $conditions['program_status'] = 1;
                    }
                }
                $conditions['close_status'] = 'activated';
                $conditions['status'] = 'approved';

                if (isset($data['asconnectionsmetas']['lang_session']) && $data['asconnectionsmetas']['lang_session'] == 1)
                {
                    $conditions['AsConnectionsMetas.lang_session'] = $data['asconnectionsmetas']['lang_session'];
                }

                if (isset($data['asconnectionsmetas']['treatment']) && $data['asconnectionsmetas']['treatment'] != "")
                {
                    $conditions['AsConnectionsMetas.treatment LIKE'] = '%' . $data['asconnectionsmetas']['treatment'] . '%';
                }

                if (isset($data['asconnectionsmetas']['age_group']) && $data['asconnectionsmetas']['age_group'] != "")
                {
                    $conditions['AsConnectionsMetas.age_group LIKE'] = '%' . $data['asconnectionsmetas']['age_group'] . '%';
                }

                if (isset($data['asconnectionsmetas']['insurance_provider']) && $data['asconnectionsmetas']['insurance_provider'] != "")
                {
                    $conditions['AsConnectionsMetas.insurance_provider LIKE'] = '%' . $data['asconnectionsmetas']['insurance_provider'] . '%';
                }

                //$allModalities=implode(',',$data['asconnectionsmetas']['modality']);
                if (isset($data['asconnectionsmetas']['modality']) && $data['asconnectionsmetas']['modality'] != "")
                {
                    foreach ($data['asconnectionsmetas']['modality'] as $modality)
                    {
                        $conditions['AsConnectionsMetas.modality LIKE'] = '%' . $modality . '%';
                    }
                }
                //$allIssues=implode(',',$data['asconnectionsmetas']['issue']);
                if (isset($data['asconnectionsmetas']['issue']) && $data['asconnectionsmetas']['issue'] != "")
                {
                    foreach ($data['asconnectionsmetas']['issue'] as $issue)
                    {
                        $conditions['AsConnectionsMetas.issue LIKE'] = '%' . $issue . '%';
                    }
                }

                //echo $_REQUEST['sort_id'];die;
                if (isset($_REQUEST['sort_id']) && $_REQUEST['sort_id'] == 1)
                {
                    $results = $this
                        ->AsConnections
                        ->find('all', ['conditions' => $conditions, 'contain' => ['AsConnectionsSocials', 'AsConnectionsLinks', 'AsConnectionsAddresses', 'AsConnectionsMetas'], 'order' => ['AsConnections.id' => 'DESC']])->where(['status ' => 'approved']);
                }
                else
                {
                    $results = $this
                        ->AsConnections
                        ->find('all', ['conditions' => $conditions, 'contain' => ['AsConnectionsSocials', 'AsConnectionsLinks', 'AsConnectionsAddresses', 'AsConnectionsMetas'], 'order' => ['AsConnections.first_name' => 'ASC']])->where(['status ' => 'approved']);

                }
                //debug($results);die;
                

                
            }

            if (isset($_POST['home_search']) && $_POST['home_search'] == 1)
            {
                //print_r($_POST);die;
                $conditions = array(
                    'status' => 'approved'
                );
                $conditionsnew = [];
                if ($_POST['location'] != "")
                {
                    if (is_numeric($_POST['location']))
                    {
                        $cond1 = $_POST['location'];
                        $conditionsnew['AsConnectionsAddresses.zipcode'] = $_POST['location'];
                    }
                    else
                    {
                        $cond2 = $_POST['location'];
                        $conditionsnew['AsConnectionsAddresses.zipcode'] = $_POST['location'];
                    }
                }

                if (isset($_POST['therapist_type']) && $_POST['therapist_type'] != "")
                {
                    $conditions['AsConnectionsMetas.therapist_type'] = $_POST['therapist_type'];
                }
                if (isset($_POST['lang_session']) && $_POST['lang_session'] != "")
                {
                    //$conditions['AsConnectionsMetas.lang_session']=$_POST['lang_session'];
                    
                }
                //print_r($conditions);die;
                if (isset($_REQUEST['sort_id']) && $_REQUEST['sort_id'] == 1)
                {
                    $results = $this
                        ->AsConnections
                        ->find('all', ['conditions' => $conditions, 'contain' => ['AsConnectionsSocials', 'AsConnectionsLinks', 'AsConnectionsAddresses' => array(
                        'conditions' => $conditionsnew
                    ) , 'AsConnectionsMetas'], 'order' => ['AsConnections.id' => 'DESC']])->where(['status ' => 'approved']);
                }
                else
                {
                    $results = $this
                        ->AsConnections
                        ->find('all', ['conditions' => $conditions, 'contain' => ['AsConnectionsSocials', 'AsConnectionsLinks', 'AsConnectionsAddresses' => array(
                        'conditions' => $conditionsnew
                    ) , 'AsConnectionsMetas'], 'order' => ['AsConnections.first_name' => 'ASC']])->where(['status ' => 'approved']);
                }

                //print_r($results->toArray());die;
                
            }
        }
        else
        {
            if (isset($_REQUEST['sort_id']) && $_REQUEST['sort_id'] == 1)
            {
                $results = $this
                    ->AsConnections
                    ->find('all', ['conditions' => $conditions, 'contain' => ['AsConnectionsSocials', 'AsConnectionsLinks', 'AsConnectionsAddresses' => array(
                    'conditions' => $conditionsnew
                ) , 'AsConnectionsMetas'], 'order' => ['AsConnections.id' => 'DESC']])->where(['status ' => 'approved']);
            }
            else
            {
                $results = $this
                    ->AsConnections
                    ->find('all', ['contain' => ['AsConnectionsSocials', 'AsConnectionsLinks', 'AsConnectionsMetas', 'AsConnectionsAddresses'], 'order' => ['AsConnections.first_name' => 'ASC']])
                    ->where(['status ' => 'approved']);
            }

        }

        $therapiests = $this
            ->Therapists
            ->find('all')
            ->where(['status ' => 'a']);
        if (isset($_POST))
        {
            $cond = $_POST;
            $this->set(compact('cond'));
        }
        $Therapist_category = TableRegistry::get('Therapists_category');
        $Therapist_categories = $Therapist_category->find('all', array(
            'order' => array(
                'name' => 'asc'
            )
        ));
        //$results=$this->paginate($results,array('limit'=>10));
        $this->set(compact('results', 'data'));
        //$resultArray=$results->toArray();
        //$this->set(compact('results', $this->paginate($results,array('limit'=>10))));
        $this->set(compact('therapiests', 'Therapist_categories'));

    }

    public function profileView($id = NULL)
    {
        //echo $id;die;
        $this->loadModel('Users');
        $this->loadModel('AsConnections');
        $this->loadModel('AsConnectionsEmails');
        $session = $this
            ->request
            ->session();
        $sessionuser = $session->read('entry_id');
        $userSession_cur = $session->read('userDetails');
        $this->set('sessionuser', $sessionuser);
        $this->set('id', $id);
        if ($this
            ->request
            ->is('post'))
        {
            $data = $_POST;
            $session = $this
                ->request
                ->session();
            /* if($id != null){
            $session->write('entry_id',$id);
            $encodedId=$id;
            $id=base64_decode($id);
            }else{
            $sessionuser=$session->read('entry_id');
            $id=base64_decode($sessionuser);
            //print_r($session);die;
            }echo $sessionuser;die;*/

            $asConnection_new = $this
                ->AsConnections
                ->get($id, ['contain' => ['AsConnectionsEmails']]);

            $template_name = "contact-message-provider";
            $session = $this
                ->request
                ->session();
            $cap = $session->read('captcha');
            if ($data['captcha'] == $cap)
            {
                $userDetails = $this
                    ->Users
                    ->get($data['userID']);
                $vars = array(
                    array(
                        'name' => 'NAME',
                        'content' => $data['name']
                    ) ,
                    array(
                        'name' => 'EMAIL',
                        'content' => $data['email']
                    ) ,
                    array(
                        'name' => 'MESSAGE',
                        'content' => $data['message']
                    ) ,
                    array(
                        'name' => 'LIST_NAME',
                        'content' => $asConnection_new->first_name . ' ' . $asConnection_new->last_name
                    ) ,
                    array(
                        'name' => 'TO',
                        'content' => $asConnection_new['as_connections_emails'][0]['address']
                    )
                );
                //echo $provider_email;
                //print_r($vars);die;
                //$this->sendMail($template_name,$from_email,'',$provider_email,$sender_name,$vars,$subject);
                $from_email = 'info@aspenstrong.org';
                $this->loadModel('Admins');
                $adminData = $this
                    ->Admins
                    ->get(1);

                $emailAdmin = $adminData['email'];
                $subject = "Client’s Message";
                $subjectadmin = $asConnection_new->first_name . ' ' . $asConnection_new->last_name . " Received a new message";

                $this->sendMail($template_name, $from_email, 'Aspen Strong Directory', $emailAdmin, $data['name'], $vars, $subjectadmin);
                if ($this->sendMail($template_name, $from_email, 'Aspen Strong Directory', $asConnection_new['as_connections_emails'][0]['address'], $data['name'], $vars, $subject))
                {
                    $this
                        ->Flash
                        ->success_contact('Message sent successfully.');
                }

                $template_name = "contact-message-consumer";

                $vars = array(
                    array(
                        'name' => 'NAME',
                        'content' => $data['name']
                    ) ,
                    array(
                        'name' => 'MESSAGE',
                        'content' => 'Your Message is sent successfully'
                    )
                );
                $userDetails = $this
                    ->Users
                    ->get($data['userID']);
                $subject = "We will touch base soon";

                $this->sendMail($template_name, $from_email, 'Aspen Strong Directory', $data['email'], $data['name'], $vars, $subject);

            }
            else
            {
                $this
                    ->Flash
                    ->success_contact('Please enter correct captch code.');
            }
        }
        $this->viewBuilder()
            ->setLayout("front");

        $this->loadModel('Treatments');
        $treatments = $this
            ->Treatments
            ->find('all', ['order' => ['name' => 'ASC']])
            ->where(['status ' => 'a']);

        $this->loadModel('Payments');
        $payments = $this
            ->Payments
            ->find('all', ['order' => ['name' => 'ASC']])
            ->where(['status ' => 'a']);

        $this->loadModel('Ages');
        $ages = $this
            ->Ages
            ->find('all', ['order' => ['name' => 'ASC']])
            ->where(['status ' => 'a']);

        $this->loadModel('Issues');
        $issues = $this
            ->Issues
            ->find('all', ['order' => ['name' => 'ASC']])
            ->where(['status ' => 'a']);

        $this->loadModel('InsuranceProviders');
        $insuranceProviders = $this
            ->InsuranceProviders
            ->find('all', ['order' => ['name' => 'ASC']])
            ->where(['status ' => 'a']);

        $this->loadModel('Modalities');
        $modalities = $this
            ->Modalities
            ->find('all', ['order' => ['name' => 'ASC']])
            ->where(['status ' => 'a']);

        $this->loadModel('Therapists');
        $therapiests = $this
            ->Therapists
            ->find('all')
            ->where(['status ' => 'a']);
        $this->loadModel('MentalHealths');

        $mentalhealths = $this
            ->MentalHealths
            ->find('all', array(
            'conditions' => array(
                'status' => 'a'
            ) ,
            'order' => array(
                'name' => 'ASC'
            )
        ));

        $this->loadModel('AsConnections');
        $this->loadModel('AsConnectionsEdits');
        $this->loadModel('AsConnectionsMetas');
        $this->loadModel('ConnectionCredentials');
        $this->loadModel('Socialnets');
        $this->loadModel('AsConnectionsSocials');
        $this->loadModel('AsConnectionsLinks');
        $this->loadModel('AsConnectionsAddresses');
        $this->loadModel('AsConnectionsPhones');
        $this->loadModel('AsConnectionsEmails');

        //$db = ConnectionManager::getDataSource('default');
        //$result_entry2=$db->query("SELECT * FROM `as_connections_edits` WHERE `status`=0 AND entry_id='".$id."' AND `step`='step2'");
        //$k=0;
        $conditions['status'] = 0;
        $conditions['entry_id'] = $id;
        $conditions['step'] = 'step2';
        $asConnection = $this
            ->AsConnectionsEdits
            ->find('all', ['conditions' => $conditions]);
        foreach ($asConnection as $result)
        {
            $entry_id = $result['id'];
        }

        $con_metas = TableRegistry::get('as_connections_metas');
        $record = $con_metas->find()
            ->select(['practice', 'practice_year'])
            ->where(['entry_id' => $id])->first();
        $con_metas3 = TableRegistry::get('as_connections');
        $record3 = $con_metas3->find('all')
            ->where(['id' => $id])->first();

        if ($record3->close_status == 'deactivated')
        {
            if (!empty($userSession_cur) && $userSession_cur->ID != $record3->owner)
            {
                $this
                    ->Flash
                    ->error('The User no longer exists.');
                $this->redirect(['action' => 'index']);
            }
            if (empty($userSession_cur))
            {
                $this
                    ->Flash
                    ->error('The User no longer exists.');
                $this->redirect(['action' => 'index']);
            }
        }
        if ($record3->close_status == 'deleted')
        {
            $this
                ->Flash
                ->error('The User no longer exists.');
            $this->redirect(['action' => 'index']);
        }
        if ($record)
        {
            $plus_year = date('Y') - $record->practice_year;

            $practice = $record->practice + $plus_year;
            $query = $this
                ->AsConnectionsMetas
                ->query();
            $query->update()
                ->set(['practice' => $practice, 'practice_year' => date('Y') ])->where(['entry_id' => $id])->execute();
        }
        $record2 = $con_metas->find()
            ->select(['practice', 'practice_year'])
            ->where(['entry_id' => $id])->first();
        $practice_year_new = (isset($record2->practice) ? $record2->practice : 0);
        $Query = $this
            ->AsConnectionsEdits
            ->find();
        $Query->select(['id', 'count' => $Query->func()
            ->count('*') ])
            ->where(['entry_id' => $id])->group('id');
        $ediArray = $Query->toList();

        if (!empty($ediArray))
        {
            $this->set('countEdit', 1);
        }
        else
        {
            $this->set('countEdit', '');
        }

        /*if(!empty($asConnection)){
        
        foreach($asConnection as $asConnectio){
        $list_val2=explode('||',$asConnectio['old_fields']);
        $list_valAddress=$list_val2[0];
        $list_valPhone=$list_val2[2];
        $list_valEmail=$list_val2[1];
        print_r($list_val2);die;
        }
        
        
        $k=1;
        }else{*/

        $asConnection = $this
            ->AsConnections
            ->get($id, ['contain' => ['ConnectionCredentials', 'AsConnectionsSocials', 'AsConnectionsLinks', 'AsConnectionsAddresses', 'AsConnectionsPhones', 'AsConnectionsEmails', 'AsConnectionsMetas']]);

        //}
        $conditions1['status'] = 0;
        $conditions1['entry_id'] = $id;
        $conditions1['step'] = 'step1';
        $asConnection_fields = $this
            ->AsConnectionsEdits
            ->find('all', ['conditions' => $conditions1])->toArray();
        if (!empty($asConnection_fields))
        {
            $newVals = unserialize($asConnection_fields[0]['old_fields']);
            //print_r($asConnection);die;
            //Array ( [entry_type] => individual [visibility] => public [first_name] => test33 [last_name] => test22 [organization] => tttttttt11 [contact_first_name] => [contact_last_name] => [title] => testings|eeeeeee [locations] => location1|location2|location3|location4|location5 )
            $asConnection['entry_type'] = $newVals['entry_type'];
            $asConnection['visibility'] = $newVals['visibility'];
            $asConnection['first_name'] = $newVals['first_name'];
            $asConnection['last_name'] = $newVals['last_name'];
            $asConnection['organization'] = $newVals['organization'];
            $asConnection['contact_first_name'] = $newVals['contact_first_name'];
            $asConnection['contact_last_name'] = $newVals['contact_last_name'];
            $asConnection['title'] = $newVals['title'];
            $asConnection['locations'] = $newVals['locations'];
        }

        $conditions2['status'] = 0;
        $conditions2['entry_id'] = $id;
        $conditions2['step'] = 'step2';
        $asConnection_fields2 = $this
            ->AsConnectionsEdits
            ->find('all', ['conditions' => $conditions2])->toArray();
        if (!empty($asConnection_fields2))
        {
            $newVals2 = unserialize($asConnection_fields2[0]['old_fields']);

            $asConnection['as_connections_addresses'] = $newVals2['as_connections_addresses'];

            $asConnection['as_connections_phones'] = $newVals2['as_connections_phones'];

            $asConnection['as_connections_emails'] = $newVals2['as_connections_emails'];

        }

        $conditions3['status'] = 0;
        $conditions3['entry_id'] = $id;
        $conditions3['step'] = 'step3';
        $asConnection_fields3 = $this
            ->AsConnectionsEdits
            ->find('all', ['conditions' => $conditions3])->toArray();
        if (!empty($asConnection_fields3))
        {
            $newVals3 = unserialize($asConnection_fields3[0]['old_fields']);

            if (isset($newVals3['as_connections_socials']))
            {
                $asConnection['as_connections_socials'] = $newVals3['as_connections_socials'];
            }
            if (isset($newVals3['as_connections_links']))
            {
                $asConnection['as_connections_links'] = $newVals3['as_connections_links'];
            }
            $asConnection['as_connections_meta'] = $newVals3['as_connections_meta'];

        }

        $conditions4['status'] = 0;
        $conditions4['entry_id'] = $id;
        $conditions4['step'] = 'step4';
        $asConnection_fields4 = $this
            ->AsConnectionsEdits
            ->find('all', ['conditions' => $conditions4])->toArray();
        if (!empty($asConnection_fields4))
        {
            $newVals4 = unserialize($asConnection_fields4[0]['old_fields']);
            //print_r($newVals4);die;
            $asConnection['as_connections_meta'] = $newVals4['as_connections_meta'];
            if (isset($newVals4['connection_credentials']) && $newVals4['connection_credentials'] != "")
            {
                $asConnection['connection_credentials'] = $newVals4['connection_credentials'];
            }

        }

        $conditions5['status'] = 0;
        $conditions5['entry_id'] = $id;
        $conditions5['step'] = 'step5';
        $asConnection_fields5 = $this
            ->AsConnectionsEdits
            ->find('all', ['conditions' => $conditions5])->toArray();
        if (!empty($asConnection_fields5))
        {
            $newVals5 = unserialize($asConnection_fields5[0]['old_fields']);
            //print_r($newVals5);die;
            $asConnection['as_connections_meta'] = $newVals5['as_connections_meta'];
            if (isset($newVals5['health_fund_status']) && $newVals5['health_fund_status'] != "")
            {
                $asConnection['health_fund_status'] = $newVals5['health_fund_status'];
            }
            if (isset($newVals5['program_status']) && $newVals5['program_status'] != "")
            {
                $asConnection['program_status'] = $newVals5['program_status'];
            }
        }

        $userDetails = $this
            ->Users
            ->get($asConnection->owner);
        $userDeteReg = $userDetails
            ->user_registered
            ->format('Y-m-d');
        $this->set(compact('asConnection', 'issues', 'treatments', 'ages', 'insuranceProviders', 'modalities', 'therapiests', 'payments', 'userDeteReg', 'practice_year_new', 'userSession_cur', 'mentalhealths'));

    }

    public function helpform($id = NULL)
    {
        //echo $id;die;
        $this->loadModel('Users');
        if ($this
            ->request
            ->is('post'))
        {
            $data = $_POST;
            //print_r($data).'</br>';
            $template_name = "contact-message-admin";
            //$session = $this->request->session();
            //$cap=$session->read('captcha');
            $this->loadModel('Admins');
            $adminData = $this
                ->Admins
                ->get(1);

            $emailAdmin = $adminData['email'];
            $AdminName = $adminData['first_name'] . ' ' . $adminData['last_name'];
            $vars = array(
                array(
                    'name' => 'PROVIDER_NAME',
                    'content' => $AdminName,
                ) ,
                array(
                    'name' => 'NAME',
                    'content' => $data['name']
                ) ,
                array(
                    'name' => 'EMAIL',
                    'content' => $data['email']
                ) ,
                array(
                    'name' => 'MESSAGE',
                    'content' => $data['message']
                ) ,
            );

            $subject = "Provider's Query";
            $from_email = 'info@aspenstrong.org';
            $this->sendMail($template_name, $from_email, 'Aspen Strong Directory', $emailAdmin, $AdminName, $vars, $subject);
            if ($data['name'] != "" && $data['email'] != "" && $data['message'] != "" && filter_var($data['email'], FILTER_VALIDATE_EMAIL))
            {

                echo "success";
            }
            else
            {
                echo "Error";
            }
            exit;

        }
    }
}
