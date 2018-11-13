<?php

namespace App\Controller;



use App\Controller\AppController;

use Cake\Core\Configure;

use Cake\Network\Exception\ForbiddenException;

use Cake\Network\Exception\NotFoundException;

use Cake\View\Exception\MissingTemplateException;

use Cake\ORM\TableRegistry;

use Cake\Datasource\ConnectionManager;
use Cake\Mailer\Email;


class ProfileController extends AppController

{

	  var $helpers = array('Form'); 

	  var $components = array('Session','Flash');
	  
	
      //$this->Auth->allow(['login', 'register','verify_link']);
    
	  
	  //var $components = array('Session','Flash');

public function createProfile()
{
	$asconnectionss=$this->loadModel('AsConnections');
 	$asconnectionsmetas=$this->loadModel('AsConnectionsMetas');
 	$session = $this->request->session();  
 	$userSession=$session->read('userDetails');
 	$conditions['owner']=$userSession['ID'];
 	$results = $this->AsConnections->find('all',['conditions'=>$conditions]);
 	$oldResults1=$results->toArray();
 	if($oldResults1)
 	{
 		return $this->redirect(['controller' => 'users', 'action' => 'dashboard']);
 	}

 $this->viewBuilder()->setLayout("front");
 if(isset($userSession['ID']) && $userSession['ID'] !=""){
 if($this->request->is('post')){

 $data=$this->request->data;
 $data=$data['data'];
 //echo $userSession['ID'];
 //print_r($data);die;
 //echo $data['entry_type'];die;
 $data['owner']=$userSession['ID'];
 $data['added_by']=$userSession['ID'];
 $data['edited_by']=$userSession['ID'];
 $data['user']=$userSession['ID'];
 if($data['entry_type']=='individual'){
 $data['organization']=$data['organization1'];
 if(isset($data['use_credentials']) && $data['use_credentials'] == 1){$data['use_credentials']=1;}else{$data['use_credentials']=0;}
 if($data['title'] != ""){$data['title']=$data['title'];}else{$data['title']="";}
 if(isset($data['use_credentials']) && $data['use_credentials'] != ""){}else{$data['use_credentials']=0;}
 $query = $asconnectionss->query();
 $query->insert(['entry_type', 'first_name', 'last_name','organization','title','visibility','added_by','edited_by','owner','user','use_credentials'])
    ->values($data)
    ->execute();
 }
 if($data['entry_type']=='organization'){
 $data['organization']=$data['organization2'];
 if(!empty($data['locations'])){$data['locations']=implode('|',$data['locations']);}
 $data['first_name']=$data['contact_first_name'];
 $data['last_name']=$data['contact_last_name'];
 $query = $asconnectionss->query();
 $query->insert(['entry_type', 'organization', 'first_name','last_name','visibility','added_by','edited_by','owner','user'])
    ->values($data)
    ->execute();	 
	 }
  $result=$this->AsConnections->find('all',['order'=> ['AsConnections.id' => 'ASC']])->last();
  //$result2=$this->AsConnections->getInsertID();
  //print_r($result);die;
  $query2 = $asconnectionsmetas->query();
  $query2->insert(['entry_id'])
  ->values(['entry_id' => $result->id])
  ->execute();
  //$this->Flash->success(__('Details Updated Successfully.'));
  
  //print_r($result->id);die;
  $session = $this->request->session(); 
  $session->write('entry_id',base64_encode($result->id));
  $this->Flash->success(__('Details Updated Successfully.'));
  return $this->redirect(['controller' => 'Profile', 'action' => 'editProfile']);
 
 }
 }else{
	$this->Flash->success_contact('To see this page please login or register.');  
	return $this->redirect(array('controller'=>'home','action'=>'index')); 	
 }

}
public function cronEmailNotifyIncompleteProfile()
{						// $template_name = 'profile-created-provider-completion-reminder';					// $emailAdmin ='aroraminakshi924@gmail.com'; 					// $AdminName  = 'minakshi';					// $vars = array(                    						// array(							// 'name'=>'NAME',							// 'content'=>'dddd'						// ),                    					// );					// $from_email = 'info@aspenstrong.org';					// $subject = 'Profile Created reminder for complete';		// $this->sendMail($template_name,$from_email,'Aspen Strong Directory',$emailAdmin,$AdminName,$vars,$subject);		// die('hello123');
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

	$user_incProfile =$this->AsConnections->find('all',['conditions'=>['close_status'=>'activated'],'contain' => ['AsConnectionsEmails','AsConnectionsSocials','AsConnectionsLinks','AsConnectionsAddresses','AsConnectionsMetas','AsConnectionsPhones']])->toArray();
	foreach ($user_incProfile as $asConnection) {
	
		if($asConnection->status == "unapproved" && (empty($asConnection->as_connections_meta) || empty($asConnection->as_connections_meta->malpractice_insurance) || empty($asConnection->as_connections_meta->issue) || empty($asConnection->as_connections_meta->personal_statement) || empty($asConnection->as_connections_meta->age_group) || empty($asConnection->as_connections_addresses)  || empty($asConnection->as_connections_emails)  || empty($asConnection->as_connections_phones)))
	  	{
	  		if(!empty($asConnection->owner) && (empty($asConnection->notify_email_year) || date('Y-m-d', strtotime("+3 days", strtotime($asConnection->notify_email_year)))==date('Y-m-d')))
	  		{
				
				$Users = TableRegistry::get('Users');
	  			$usr_deail = $Users->find()->where(['ID'=>$asConnection->owner])->first();
				if(!empty($usr_deail))      
				{
					$query = $this->AsConnections->query();
				    $query->update()->set(['notify_email_year'=>date('Y-m-d')])
				    ->where(['owner' => $asConnection->owner])
				    ->execute();

					$template_name = 'profile-created-provider-completion-reminder';
					$emailAdmin = $usr_deail->user_email; 
					$AdminName  = $usr_deail->display_name;
					$vars = array(                    
						array(
							'name'=>'NAME',
							'content'=>$usr_deail->display_name
						),                    
					);
					$from_email = 'info@aspenstrong.org';
					$subject = 'Profile Created reminder for complete';
					$this->sendMail($template_name,$from_email,'Aspen Strong Directory',$emailAdmin,$AdminName,$vars,$subject);
				}
			}
	  	}
	}
	die('Sent');
}
public function send_profile_complete_email($entry_id)
{
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
	$asConnection = $this->AsConnections->get($entry_id,['contain' => ['ConnectionCredentials','AsConnectionsSocials','AsConnectionsLinks','AsConnectionsAddresses','AsConnectionsPhones','AsConnectionsEmails','AsConnectionsMetas']]);

	if($asConnection->status == "unapproved" && !empty($asConnection->as_connections_meta) && !empty($asConnection->as_connections_meta->malpractice_insurance) && !empty($asConnection->as_connections_meta->issue) && !empty($asConnection->as_connections_meta->personal_statement) && !empty($asConnection->as_connections_meta->age_group) && !empty($asConnection->as_connections_addresses)  && !empty($asConnection->as_connections_emails)  && !empty($asConnection->as_connections_phones))
  	{
  	
  		$this->loadModel('Admins');
		$adminData = $this->Admins->get(1); 
		$this->loadModel('Users');
        $usr_deail=$this->Users->get($asConnection->owner);               
        $template_name = 'profile-completed-admin';
    	$emailAdmin = $adminData['email'];
		$AdminName = $adminData['first_name'].' '.$adminData['last_name']; 
          $vars = array(                    
                    array(
                      'name'=>'ADMIN_NAME',
                      'content'=>$AdminName
                    ),
                    array(
                      'name'=>'NAME',
                      'content'=>$usr_deail->display_name
                    ),
                    array(
                      'name'=>'PERSON_EMAIL',
                      'content'=>$usr_deail->user_email
                    ),                    
                  );
          $subjectAdmin = 'New Profile to Approve';
		  $from_email = 'info@aspenstrong.org';
          $this->sendMail($template_name,$from_email,'Aspen Strong Directory',$emailAdmin,$AdminName,$vars,$subjectAdmin);

          $this->loadModel('Users');
          $usr_deail=$this->Users->get($asConnection->owner);               
          $template_name = 'profile-completed-provider';
          $emailAdmin = $usr_deail->user_email; 
          $AdminName  = $usr_deail->display_name;
          $vars = array(                    
                    array(
                      'name'=>'LIST_NAME',
                      'content'=>$usr_deail->display_name
                    ),                    
                  );
          $subject = 'Profile Completed';
		  $from_email = 'info@aspenstrong.org';
          $this->sendMail($template_name,$from_email,'Aspen Strong Directory',$emailAdmin,$AdminName,$vars,$subject); 
  	} 
  	if($asConnection->status == "unapproved" && (empty($asConnection->as_connections_meta) || empty($asConnection->as_connections_meta->malpractice_insurance) || empty($asConnection->as_connections_meta->issue) || empty($asConnection->as_connections_meta->personal_statement) || empty($asConnection->as_connections_meta->age_group) || empty($asConnection->as_connections_addresses)  || empty($asConnection->as_connections_emails)  || empty($asConnection->as_connections_phones)))
  	{
  		$this->loadModel('Users');
         $usr_deail=$this->Users->get($asConnection->owner);               
          $template_name = 'profile-created-provider-completion-reminder';
          $emailAdmin = $usr_deail->user_email; 
          $AdminName  = $usr_deail->display_name;
          $vars = array(                    
                    array(
                      'name'=>'NAME',
                      'content'=>$usr_deail->display_name
                    ),                    
                  );
          $subject = 'Profile Created reminder for complete';
          //$this->sendMail($template_name,'Aspen Strong Directory','',$emailAdmin,$AdminName,$vars,$subject); 
  	}
  	if($asConnection->status == "approved")
  	{
	  	$this->loadModel('Admins');
		$adminData = $this->Admins->get(1);
		//print_r($adminData['id']);die;
		$this->loadModel('Users');
         $usr_deail=$this->Users->get($asConnection->owner);
		$template_name = 'profile-update-admin';
		$emailAdmin = $adminData['email'];
		$AdminName = $adminData['first_name'].' '.$adminData['last_name'];      
		$vars = array(
		        array(
                      'name'=>'ADMIN_NAME',
                      'content'=>$AdminName
                    ),
                    array(
                      'name'=>'NAME',
                      'content'=>$usr_deail->display_name
                    ),
                    array(
                      'name'=>'PERSON_EMAIL',
                      'content'=>$usr_deail->user_email
                    ), 
		        
		      );
		$subject = 'Provider Profile edits to Approve';
		$from_email = 'info@aspenstrong.org';
		$this->sendMail($template_name,$from_email,'Aspen Strong Directory',$emailAdmin,$AdminName,$vars,$subject); 

		$this->loadModel('Users');
         $usr_deail=$this->Users->get($asConnection->owner);               
          $template_name = 'profile-updated-provider';
          $emailAdmin = $usr_deail->user_email; 
          $AdminName  = $usr_deail->display_name;
          $vars = array(                    
                    array(
                      'name'=>'LIST_NAME',
                      'content'=>$usr_deail->display_name
                    ),                    
                  );
          $subject = 'Profile Updated';
          $this->sendMail($template_name,$from_email,'Aspen Strong Directory',$emailAdmin,$AdminName,$vars,$subject);
	}
}
 public function editProfile($newuser=null)
 {
 $this->viewBuilder()->setLayout("front");
 $session = $this->request->session();  
 $userSession=$session->read('userDetails');
 if(isset($userSession['ID']) && $userSession['ID'] !=""){
 $this->loadModel('AsConnections');
 $this->loadModel('AsConnectionsEdits');
 $conditions['owner']=$userSession['ID'];
 $results = $this->AsConnections->find('all',['conditions'=>$conditions]);
 //print_r($results);die;
 //foreach($results as $result){
 $this->set(compact('results'));	 
	 

//	 }
	

	 if($this->request->is('post')){

		  $data=$this->request->data;
          //print_r($data);die;
		 $oldResults=$results->toArray();
		  
		  //Save old data
		  
		   $old_fields=$oldResults[0];
		   
		   //print_r($old_fields);die;
	  
	  $saveFields=serialize($old_fields);
	 //echo $saveFields;die; 
	 $conditions1['status']=0;
	 $conditions1['entry_id']=$oldResults[0]['id'];
	 $conditions1['step']='step1';
	 $asConnection_fields = $this->AsConnectionsEdits->find('all',['conditions'=>$conditions1])->toArray();
	 if($oldResults[0]['status']=="approved"){
	 if(!empty($asConnection_fields)){
	  
	  $query2 = $this->AsConnectionsEdits->query();

      $query2->update()
	  
	  ->set(['old_fields'=>$saveFields])
	  ->where(['entry_id' => $oldResults[0]['id'],'step'=>'step1'])

	  ->execute();
	 }else{
	//echo $saveData['id'];die;	
	$saveVals['entry_id']= $oldResults[0]['id'];
	$saveVals['step']= 'step1';
	$saveVals['old_fields']= $saveFields;
	$saveVals['status']= 0;
	$query2 = $this->AsConnectionsEdits->query();
    $query2->insert(['entry_id', 'step', 'old_fields','status'])
    ->values($saveVals)
    ->execute();
		 
		 }
	 }
		
		  
		  //Save old data
          if(isset($data['data']['credentials']) && $data['data']['credentials'] !=""){
		  $titles=$data['data']['credentials'];
		  }else{
		  $titles="";	  
		  }
		  //echo $titles;die;
		  
		  if(isset($data['data']['location']) && !empty($data['data']['location'])){
		 $locations=implode('|',$data['data']['location']);

		  $data['data']['locations']=$locations;  
		  }else{
			$locations="";  
			  }

		  $saveData=$data['data'];
		  //print_r($saveData);die;
		  if(isset($saveData['organization1']) && $saveData['organization1']!=""){
			$org=$saveData['organization1'];  
			  }else{
			$org=$saveData['organization2']; 	  
				  }
		 if($saveData['entry_type']=="individual"){
			 $f_name=$saveData['first_name1'];
			 $l_name=$saveData['last_name1'];
			 }else{
			 $f_name=$saveData['first_name2']; 
			 $l_name=$saveData['last_name2'];
				 }
          //foreach($results as $result){
	  if(isset($saveData['use_credentials']) && $saveData['use_credentials'] != ""){$use_credentials=1;}else{$use_credentials=0;}  
	  $query = $this->AsConnections->query();

      $query->update()
	  ->set(['entry_type'=>$saveData['entry_type'],
	  'visibility'=>$saveData['visibility'],
	  'first_name'=>$f_name,
	  'last_name'=>$l_name,
	  'organization'=>$org,
      'contact_first_name'=>$f_name,
	  'contact_last_name'=>$l_name,
	  'title'=>$titles,
	  'locations'=>$locations,
	  'use_credentials'=> $use_credentials
	   ])
	  ->where(['id' => $saveData['id']])

	  ->execute();
	  	self::send_profile_complete_email($oldResults[0]['id']);
	    $this->Flash->success(__('Details Updated Successfully.'));

		return $this->redirect(['controller' => 'Profile', 'action' => 'editProfile']);

		 }

	 	
 }
 else{
	$this->Flash->success_contact('To see this page please login or register.'); 
	return $this->redirect(array('controller'=>'home','action'=>'index')); 	 
	 }
}

public function editProfile2($id=null)
 {
 $this->viewBuilder()->setLayout("front");
 $session = $this->request->session(); 
 $userSession=$session->read('userDetails');
 if(isset($userSession['ID']) && $userSession['ID'] !=""){
 	$conts = TableRegistry::get('as_connections');
    $conts_rcd = $conts->find()->select('id')->where(['owner' => $userSession['ID']])->first();
    $id = $conts_rcd->id;
 if($id != null){
 $session->write('entry_id',$id);
 $encodedId=$id;
 $id= $id;
 }else{
 $sessionuser=$session->read('entry_id');
 $id= $sessionuser; 
 } 
 
        $this->loadModel('AsConnections');

		$this->loadModel('AsConnectionsAddresses');

		$this->loadModel('AsConnectionsPhones');

		$this->loadModel('AsConnectionsEmails');

        $this->loadModel('AsConnectionsMetas');
		
        $this->loadModel('AsConnectionsEdits');
		
	    $asConnection = $this->AsConnections->get($id,['contain' => ['AsConnectionsAddresses','AsConnectionsPhones','AsConnectionsEmails','AsConnectionsMetas']]);

	//$this->viewBuilder()->setLayout("admin");

	$this->set(compact('asConnection'));
	
		if($this->request->is('post')){ // echo "<pre>";print_r($this->request->data);die;
		if(!empty($asConnection['as_connections_addresses'])){	
		$forEdits['as_connections_addresses']=$asConnection['as_connections_addresses'];
		}else{
		$forEdits=array();	
			}
		if(!empty($asConnection['as_connections_phones'])){
		$forEdits['as_connections_phones']=$asConnection['as_connections_phones'];
		}else{
		$forEdits=array();	
			}
		if(!empty($asConnection['as_connections_emails'])){
		$forEdits['as_connections_emails']=$asConnection['as_connections_emails'];
		}else{
		$forEdits=array();	
			}
		//print_r($asConnection['status']);die;
		if(!empty($forEdits) && $asConnection['status']=='approved'){	
		$saveFields=serialize($forEdits);
	 //echo $saveFields;die; 
	 $conditions1['status']=0;
	 $conditions1['entry_id']=$id;
	 $conditions1['step']='step2';
	 $asConnection_fields = $this->AsConnectionsEdits->find('all',['conditions'=>$conditions1])->toArray();
	 
	 if(!empty($asConnection_fields)){
	  
	  $query2 = $this->AsConnectionsEdits->query();

      $query2->update()
	  
	  ->set(['old_fields'=>$saveFields])
	  ->where(['entry_id' => $id,'step'=>'step2'])

	  ->execute();
	 }else{
	//echo $saveData['id'];die;	
	$saveVals['entry_id']= $id;
	$saveVals['step']= 'step2';
	$saveVals['old_fields']= $saveFields;
	$saveVals['status']= 0;
	$query2 = $this->AsConnectionsEdits->query();
    $query2->insert(['entry_id', 'step', 'old_fields','status'])
    ->values($saveVals)
    ->execute();
		 
		 }
		}


		  $data=$this->request->data;

		  $postData=$data['data'];
          //print_r($postData['as_connections_phones']);die;
		  //print_r($postData);die;

		   $add="";

	   
      //print_r($postData['as_connections_addresses']);die;
	
	for($i=1; $i<=$postData['totalAds'];$i++) {
		// echo "<pre>";print_r($postData); 
	}//die;
	  if($postData['totalAds'] > 0){
      $this->AsConnectionsAddresses->deleteAll(['entry_id' => $id]);
	  for($i=1; $i<=$postData['totalAds'];$i++) {
	 // echo $i;
	 // echo $postData['totalAds'];
    // print_r($postData['as_connections_addresses']);die;
	  if(isset($postData['as_connections_addresses'])){
	  if(isset($postData['as_connections_addresses']['address'.$i]) && $postData['as_connections_addresses']['address'.$i]!=""){
	  
	  if(isset($postData['as_connections_addresses']['preferred'.$i]) && $postData['as_connections_addresses']['preferred'.$i]==1){
	  $preferred=1;
	  }else{
	  $preferred=0;
	  } 
	  $postData['as_connections_addresses']['type1']='Mailing';
	  $postData['as_connections_addresses']['type2']='Site';
	  
	 $Newquery = $this->AsConnectionsAddresses->query();

      $Newquery->insert(['entry_id','type','address','city','state','zipcode','country','latitude','longitude','visibility','preferred'])
	  ->values([ 'entry_id' => $id,

        'type' => $postData['as_connections_addresses']['type'.$i],

        'address' => $postData['as_connections_addresses']['address'.$i],

		'city' => $postData['as_connections_addresses']['city'.$i],
		
		'state' => $postData['as_connections_addresses']['state'.$i],
		
		'zipcode' => $postData['as_connections_addresses']['zipcode'.$i],
		
		'country' => 'USA',
		
		'latitude' => $postData['as_connections_addresses']['lat'.$i],
		
		'longitude' => $postData['as_connections_addresses']['long'.$i],
		
		'visibility' => 'public',
		
		'preferred' => $preferred,

      ])

      ->execute();
	   
	  }else{
		echo "Hello".$i; 
		  }
	  }
	 }
		  

	  }

	  

	 // print_r($postData['as_connections_phones']);die;

	  if($postData['totalPhones'] > 0){
      $this->AsConnectionsPhones->deleteAll(['entry_id' => $id]);
	  for($j=1; $j<=($postData['totalPhones']);$j++) {
	  //echo $postData['as_connections_phones']['preferred'.$j];	  
      if(isset($postData['as_connections_phones']['preferred'.$j])){
	  $preferred=1;
	  }else{
	  $preferred=0;
	  }
     
	if(isset($postData['as_connections_phones']['number'.$j]) && $postData['as_connections_phones']['number'.$j] !=""){
	$Newquery2 = $this->AsConnectionsPhones->query();

      $Newquery2->insert(['entry_id','type', 'visibility','preferred','number'])

      ->values([

	    'entry_id' => $id,

        'type' => $postData['as_connections_phones']['type'.$j],

        'visibility' => 'public',
		
		'preferred' => $preferred,

		'number' => $postData['as_connections_phones']['number'.$j]

      ])

      ->execute(); 
	  
		
		  }else{
		echo "Hello".$i; 
		  }
	  
	  
	  }//die;

	  }

	  

	  if($postData['totalEmails'] > 0){
       $this->AsConnectionsEmails->deleteAll(['entry_id' => $id]);
	  for($k=1; $k<=($postData['totalEmails']);$k++) {

     if(isset($postData['as_connections_emails']['address'.$k])&& $postData['as_connections_emails']['address'.$k] !=""){
	$Newquery = $this->AsConnectionsEmails->query();

      $Newquery->insert(['entry_id','type', 'visibility','address'])

      ->values([

	    'entry_id' => $id,

        'type' => 'Work',

        'visibility' => 'public',

		'address' => $postData['as_connections_emails']['address'.$k]

      ])

      ->execute();
	 	
	
	
	}
	 
	 }

	  }

	 self::send_profile_complete_email($id);
	  $this->Flash->success(__('Details Updated Successfully.'));

	   return $this->redirect(['controller' => 'Profile', 'action' => 'editProfile2']);
       //return $this->redirect(['controller' => 'Profile', 'action' => 'editProfile2']);
		 }	
		 
 }else{
	$this->Flash->success_contact('To see this page please login or register.');
	return $this->redirect(array('controller'=>'home','action'=>'index')); 	  
	 }

}
function base64_to_jpeg($base64_string, $output_file) {
    // open the output file for writing
    $ifp = fopen( $output_file, 'wb' ); 
     // split the string on commas
    // $data[ 0 ] == "data:image/png;base64"
    // $data[ 1 ] == <actual base64 string>
    $data = explode( ',', $base64_string );

    // we could add validation here with ensuring count( $data ) > 1
    fwrite( $ifp, base64_decode( $data[ 1 ] ) );

    // clean up the file resource
    fclose( $ifp ); 

    return $output_file; 
}
public function editProfile3($id=null)
 {
 	$this->viewBuilder()->setLayout("front");
 $session = $this->request->session(); 
 $userSession=$session->read('userDetails');
 if(isset($userSession['ID']) && $userSession['ID'] !=""){
 $conts = TableRegistry::get('as_connections');
    $conts_rcd = $conts->find()->select('id')->where(['owner' => $userSession['ID']])->first();
    $id = $conts_rcd->id;
 if($id != null){
 $session->write('entry_id',$id);
 $encodedId=$id;
 $id=($id);
 }else{
 $sessionuser=$session->read('entry_id');
 $id=($sessionuser); 
 }
 //$encodedId=$id;
 
        $this->loadModel('AsConnections');

		$this->loadModel('Socialnets');

		$this->loadModel('AsConnectionsSocials');

		$this->loadModel('AsConnectionsLinks');

		$this->loadModel('AsConnectionsMetas');
		
		$this->loadModel('AsConnectionsEdits');

	    $asConnection = $this->AsConnections->get($id,['contain' => ['AsConnectionsSocials','AsConnectionsLinks','AsConnectionsMetas']]);
	   
		$this->loadModel('LanguageOptions');

		$languages=$this->LanguageOptions->find('all',array('conditions'=>array('status'=>'a'),'order' => array('name' => 'ASC')))->toArray();
		//print_r($languages);die;

		/* Set Data For View */

	    $this->set(compact('asConnection','languages'));	
       
	   /* Post Request */
if($this->request->is('post')){
	
	if(!empty($asConnection['as_connections_socials'])){
	$forEdits['as_connections_socials']=$asConnection['as_connections_socials'];
	}
	if(!empty($asConnection['as_connections_links'])){
	$forEdits['as_connections_links']=$asConnection['as_connections_links'];
	}
	if(!empty($asConnection['as_connections_meta'])){
	$forEdits['as_connections_meta']=$asConnection['as_connections_meta'];
	}
	
	 //print_r($forEdits);die;
	 if(!empty($forEdits) && $asConnection['status']=="approved"){
	 $saveFields=serialize($forEdits);
	 //echo $saveFields;die; 
	 $conditions1['status']=0;
	 $conditions1['entry_id']=$id;
	 $conditions1['step']='step3';
	 $asConnection_fields = $this->AsConnectionsEdits->find('all',['conditions'=>$conditions1])->toArray();
	 //print_r($asConnection_fields);die;
	 if(!empty($asConnection_fields)){
	  
	  $query2 = $this->AsConnectionsEdits->query();

      $query2->update()
	  
	  ->set(['old_fields'=>$saveFields])
	  ->where(['entry_id' => $id,'step'=>'step3'])

	  ->execute();
	 }else{
	//echo $saveData['id'];die;	
	$saveVals['entry_id']= $id;
	$saveVals['step']= 'step3';
	$saveVals['old_fields']= $saveFields;
	$saveVals['status']= 0;
	$query2 = $this->AsConnectionsEdits->query();
    $query2->insert(['entry_id', 'step', 'old_fields','status'])
    ->values($saveVals)
    ->execute();
		 
		 }
	 }
	

		  $data=$this->request->data;

		  $postData=$data['data'];
          //print_r($postData);die;
		  

		/* Upload Logo File */
        //print_r($postData);die;
		if(isset($postData['file_name']) && $postData['file_name']!=""){
		$datafile_name=explode(',',$postData['file_name']);
        $filename_path = md5(time().uniqid()).".jpg"; $decoded=base64_decode($datafile_name[1]);
		
		//echo $decoded;die;
		$query = $this->AsConnections->query(); 

	            $query->update()

	            ->set(['logo'=>$filename_path])

	            ->where(['id' => $id])

	            ->execute(); 
		file_put_contents('./webroot/img/logodirectry/'.$filename_path,$decoded); 
		
		$uploadedfile = './webroot/img/logodirectry/'.$filename_path;
        $src = imagecreatefromjpeg($uploadedfile);
		list($width,$height)=getimagesize($uploadedfile);
        $newwidth=350;
        //$newheight=350;
        $newheight=($height/$width)*$newwidth;
        $tmp=imagecreatetruecolor($newwidth,$newheight);
		imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
		$filename = "./webroot/img/logodirectry/". $filename_path;
        imagejpeg($tmp,$filename,100);
		  
		}

		 /*if(!empty($_FILES) and $_FILES['logo']['error']==0)

        { 

		//echo "Hello";die;

        $imgName=pathinfo($_FILES['logo']['name']);

        $ext = $imgName['extension'];

        $newImgName = rand(10,100000);

        $tempFile = $_FILES['logo']['tmp_name'];

        

        //echo $destination = realpath('../webroot/img/logodirectry').'/';die;
        $destination = './webroot/img/logodirectry/';
        

        if(is_uploaded_file($_FILES['logo']['tmp_name']))

          {

            if(move_uploaded_file($_FILES['logo']['tmp_name'],$destination.$newImgName.".".$ext)){

              $logo['logo']=$newImgName.".".$ext;

			  if($logo['logo'] !=""){

				$query = $this->AsConnections->query(); 

	            $query->update()

	            ->set(['logo'=>$logo['logo']])

	            ->where(['id' => $id])

	            ->execute();  

				  }

              } }

			  

              } */ 
			  
			  
	
 
		  

	  /* Update Social Links */

	   $this->AsConnectionsSocials->deleteAll(['entry_id' => $id]);
	  for($i=1; $i<=$postData['totalSocials'];$i++) {

	  
		if(isset($postData['as_connections_socials']['url'.$i]) && $postData['as_connections_socials']['url'.$i]!=""){
		$Newquery = $this->AsConnectionsSocials->query();
		if (strpos($postData['as_connections_socials']['url'.$i], 'http://') !== false || strpos($postData['as_connections_socials']['url'.$i], 'https://') !== false)
		{
			$scurl = $postData['as_connections_socials']['url'.$i];
		}else
		{
			$scurl = 'http://'.$postData['as_connections_socials']['url'.$i];;
		}
      $Newquery->insert(['entry_id','type','preferred','visibility','url'])

      ->values([

	    'entry_id' => $id,

        'type' => $postData['as_connections_socials']['type'.$i],

        'visibility' => 'public',

		'preferred' => 1,

		'url' => $scurl

      ])

      ->execute();  
	 
	 	 
		}
		  

	  }

	  

	  /* Update Website Links */

	   
		//$entity_vals = $this->AsConnectionsLinks->get($postData['as_connections_links']['link_id'.$j]);
        //$result_vals = $this->AsConnectionsLinks->delete($entity_vals);  
	  $this->AsConnectionsLinks->deleteAll(['entry_id' => $id]);
	  for($j=1; $j<=$postData['totalLinks'];$j++) {
      	
	   if(isset($postData['as_connections_links']['url'.$j]) && $postData['as_connections_links']['url'.$j] !=""){ 

	   if (strpos($postData['as_connections_links']['url'.$j], 'http://') !== false || strpos($postData['as_connections_links']['url'.$j], 'https://') !== false)
		{
			$scurl = $postData['as_connections_links']['url'.$j];
		}else
		{
			$scurl = 'http://'.$postData['as_connections_links']['url'.$j];;
		} 
	  $Newquery2 = $this->AsConnectionsLinks->query();

      $Newquery2->insert(['entry_id','url','title','type'])

      ->values([

	    'entry_id' => $id,

        'url' => $scurl,

		'title'=> $scurl,

		'type'=>'website'

        

      ])

      ->execute();
	  
		  
	  }
		  
		  //}

	  }

	  
     /* Update Personal details and other */

	  

	  if(isset($postData['as_connections_meta']['other_language'])){

		$otherLanguage= $postData['as_connections_meta']['other_language'];

		  }else{

		$otherLanguage="None";	  

			  }
	
	//Multiple language
	
	if(isset($postData['as_connections_meta']['bilingual'])){

		$bilingual= $postData['as_connections_meta']['bilingual'];

		  }else{

		$bilingual=NULL;	  

		 }
	$other_statement = [];
	if(isset($postData['as_connections_meta']['other_lang'])){

		$other_lang= implode('|',$postData['as_connections_meta']['other_lang']);
			foreach($postData['as_connections_meta']['other_lang'] as $lang){
				if (array_key_exists($lang,$postData['as_connections_meta']['other_statement'])){
					array_push($other_statement,$postData['as_connections_meta']['other_statement'][$lang]);
				}
			}
		  }else{

		$other_lang=NULL;	  

		 }
	if(!empty($other_statement)){

		$other_statement= implode('|',$other_statement);

		  }else{

		$other_statement=NULL;	  

		 }


    //Multiple language
	
	  $query = $this->AsConnectionsMetas->query();  

	  $query->update()

	  ->set(['personal_statement'=>$postData['as_connections_meta']['personal_statement'],

	  'other_language'=>$otherLanguage,
	  'bilingual'=>$bilingual,
	  'other_statement'=>$other_statement,
	  'other_lang'=>$other_lang
	  ]

	  )

	  ->where(['id' => $postData['as_connections_meta']['metaId']])

	  ->execute();

	  /*Success Message*/
     //echo $encodedId;die;
	  self::send_profile_complete_email($id);
	 $this->Flash->success(__('Details Updated Successfully.'));
	 //echo $encodedId;die;	
	 return $this->redirect(['controller' => 'Profile', 'action' => 'editProfile3']);	
 }
 
 }else{
	$this->Flash->success_contact('To see this page please login or register.');
	return $this->redirect(array('controller'=>'home','action'=>'index')); 	  
	 }
}

public function editProfile4($id=null)
 {
 $this->viewBuilder()->setLayout("front");
 $session = $this->request->session();  
 $userSession=$session->read('userDetails');
		
 if(isset($userSession['ID']) && $userSession['ID'] !=""){
 	$conts = TableRegistry::get('as_connections');
    $conts_rcd = $conts->find()->select('id')->where(['owner' => $userSession['ID']])->first();
    $id = $conts_rcd->id;
if($id != null){
 $session->write('entry_id',$id);
 $id=($id);
 }else{
 $sessionuser=$session->read('entry_id');
 $id=($sessionuser);
 //print_r($sessionuser);die;	 
 }
        $this->loadModel('AsConnections');
		$this->loadModel('AsConnectionsMetas');

		$this->loadModel('ConnectionCredentials');
		
		$this->loadModel('AsConnectionsEdits');
	    
		$conts = TableRegistry::get('as_connections');
	    $conts_rcd = $conts->find()->select('id')->where(['owner' => $userSession['ID']])->first();
	    $con_metas = TableRegistry::get('as_connections_metas');
	    $record = $con_metas->find()->select(['practice','practice_year'])->where(['entry_id' => $conts_rcd->id])->first();
	   
	 	if($record)
		{
			if(empty($record->practice_year))
			{
				$plus_year = date('Y') - $userSession->user_registered->format('Y');
			}else
			{
				$plus_year = date('Y') - $record->practice_year;		
			}
			$practice = $record->practice+$plus_year;
			$query = $this->AsConnectionsMetas->query();
		    $query->update()->set(['practice'=>$practice,'practice_year' => date('Y')])
		    ->where(['entry_id' => $conts_rcd->id])
		    ->execute();
		}		

		$asConnection = $this->AsConnections->get($id,['contain' => ['AsConnectionsMetas','ConnectionCredentials']]);

		//$this->loadModel('Professionals');

		//$professionals=$this->Professionals->find('all',array('conditions'=>array('status'=>'a')));

		$this->loadModel('Therapists');

		$therapists=$this->Therapists->find('all',array('conditions'=>array('status'=>'a'),'order'=>'name asc'));

	    //$this->set(compact('asConnection','professionals','therapists'));
	    $organizer_type = TableRegistry::get('organizer_type');
	  $org_type = $organizer_type->find('all', array('order'=>array('name'=>'asc')));
		$this->set(compact('asConnection','therapists','org_type'));
		
		/* Post Request */

		

	 	if($this->request->is('post')){
	 if(!empty($asConnection['as_connections_meta'])){
	 $forEdits['as_connections_meta']=$asConnection['as_connections_meta'];
	 }
	 if(!empty($asConnection['connection_credentials'])){
	 $forEdits['connection_credentials']=$asConnection['connection_credentials'];
	 }
	 //print_r($forEdits);die;
	 if(!empty($forEdits)&& $asConnection['status']=="approved"){
	 $saveFields=serialize($forEdits);
	 //echo $saveFields;die; 
	 $conditions1['status']=0;
	 $conditions1['entry_id']=$id;
	 $conditions1['step']='step4';
	 $asConnection_fields = $this->AsConnectionsEdits->find('all',['conditions'=>$conditions1])->toArray();
	 //print_r($asConnection_fields);die;
	 if(!empty($asConnection_fields)){
	  
	  $query2 = $this->AsConnectionsEdits->query();

      $query2->update()
	  
	  ->set(['old_fields'=>$saveFields])
	  ->where(['entry_id' => $id,'step'=>'step4'])

	  ->execute();
	 }else{
	//echo $saveData['id'];die;	
	$saveVals['entry_id']= $id;
	$saveVals['step']= 'step4'; 
	$saveVals['old_fields']= $saveFields;
	$saveVals['status']= 0;
	$query2 = $this->AsConnectionsEdits->query();
    $query2->insert(['entry_id', 'step', 'old_fields','status'])
    ->values($saveVals)
    ->execute();
		 
		 }
	 }
			

		  $data=$this->request->data;
          $postData=$data['data'];
		  
		  /*Pre Licenced*/
		  if(isset($postData['as_connections_meta']['pre_licenced']) && $postData['as_connections_meta']['pre_licenced']!=''){
			$pre_licenced= $postData['as_connections_meta']['pre_licenced']; 
			  }else{
			$pre_licenced= "";	  
				  }
		
		if(isset($postData['as_connections_meta']['prelic_no']) && $postData['as_connections_meta']['prelic_no']!=''){
			$prelic_no= $postData['as_connections_meta']['prelic_no']; 
			  }else{
			$prelic_no= "";	  
				  }
				  
		if(isset($postData['as_connections_meta']['supervisor_phone']) && $postData['as_connections_meta']['supervisor_phone']!=''){
			$supervisor_phone= $postData['as_connections_meta']['supervisor_phone']; 
			  }else{
			$supervisor_phone= "";	  
				  }
				  
		if(isset($postData['as_connections_meta']['supervisor_email']) && $postData['as_connections_meta']['supervisor_email']!=''){
			$supervisor_email= $postData['as_connections_meta']['supervisor_email']; 
			  }else{
			$supervisor_email= "";	  
				  }
				  
		if(isset($postData['as_connections_meta']['mem_no']) && $postData['as_connections_meta']['mem_no']!=''){
			$mem_no= $postData['as_connections_meta']['mem_no']; 
			  }else{
			$mem_no= "";	  
				  }
		if(isset($postData['as_connections_meta']['licence_status']) && $postData['as_connections_meta']['licence_status']=='yes'){
			$lic_status=1;
			}else{
			$lic_status=0;	
				}
		/* Update Other Meta Values */

       if($postData['as_connections_meta']['entry_type']=="individual"){

		  $query = $this->AsConnectionsMetas->query();  

	      $query->update()

	      ->set(['school'=>$postData['as_connections_meta']['school'],

	      'school_year'=>$postData['as_connections_meta']['school_year'],

		  'practice'=>$postData['as_connections_meta']['practice'],

		  'practice_year' => date('Y'),

		  'therapist_type'=>$postData['as_connections_meta']['therapist_type'],

		  'licence'=>$postData['as_connections_meta']['licence'],

		  'supervisor_name'=>$postData['as_connections_meta']['supervisor_name'],

		  'supervisor_licence'=>$postData['as_connections_meta']['supervisor_licence'],

		  'licence_status'=>$lic_status,

		  'malpractice_insurance'=>$postData['as_connections_meta']['malpractice_insurance'],

		  'malpractice_carrer'=>$postData['as_connections_meta']['malpractice_carrer'],
		  
		  'pre_licenced'=>$pre_licenced,
		  
		  'prelic_no'=>$prelic_no,
		  
		  'supervisor_phone'=>$supervisor_phone,
		  
		  'supervisor_email'=>$supervisor_email,
		  
		  'mem_no'=>$mem_no,

		 ]

	      )

	      ->where(['id' => $postData['as_connections_meta']['metaId']])

	      ->execute();
		  
		  
		   if(count($postData['totalCredentials'] > 0)){
	  $this->ConnectionCredentials->deleteAll(['entry_id' => $id]);
	  for($i=1;$i<=$postData['totalCredentials'];$i++) {

	  if(isset($postData['credentialing']['cred_val'.$i]) && $postData['credentialing']['cred_val'.$i] !=""){  
	  $Newquery2 = $this->ConnectionCredentials->query();

      $Newquery2->insert(['entry_id','credentialing'])

      ->values([

	    'entry_id' => $id,

        'credentialing' => $postData['credentialing']['cred_val'.$i]

		])

      ->execute();
	  
	     
	  }
		  
		  

	  }
		}
		  
		  
		  
	   }
	   
	   if($postData['as_connections_meta']['entry_type']=="organization"){

		  $query = $this->AsConnectionsMetas->query();  

	      $query->update()

	      ->set([

		  'malpractice_insurance'=>$postData['as_connections_meta']['malpractice_insurance'],

		  'malpractice_carrer'=>$postData['as_connections_meta']['malpractice_carrer'],
		  
		  'treatment_type'=>$postData['as_connections_meta']['treatment_type'],
		  
		  'prof_org'=>$postData['as_connections_meta']['prof_org'],
		  
		  'accredatation'=>$postData['as_connections_meta']['accredatation'],
		  
		  'accredatation_name'=>$postData['as_connections_meta']['accredatation_name'],
		  
		 ]

	      )

	      ->where(['id' => $postData['as_connections_meta']['metaId']])

	      ->execute();
	   }
	   
	    /*Success Message*/
          self::send_profile_complete_email($id);
	       $this->Flash->success(__('Details Updated Successfully.'));

		   return $this->redirect(['controller' => 'Profile', 'action' => 'editProfile4']);

		  

		  }

 }else{
	 $this->Flash->success_contact('To see this page please login or register.');
	 return $this->redirect(array('controller'=>'home','action'=>'index')); 	
	 }
		
		
}

public function editProfile5($id=null)
 {
 $this->viewBuilder()->setLayout("front");
 $session = $this->request->session();  
 $userSession=$session->read('userDetails');		
 if(isset($userSession['ID']) && $userSession['ID'] !=""){
 	$conts = TableRegistry::get('as_connections');
    $conts_rcd = $conts->find()->select('id')->where(['owner' => $userSession['ID']])->first();
    $id = $conts_rcd->id;
 if($id != null){
 $session->write('entry_id',$id);
 $id=($id);
 }else{
 $sessionuser=$session->read('entry_id');
 $id=($sessionuser);
 //print_r($id);	 
 }
 $this->loadModel('AsConnections');
 $this->loadModel('AsConnectionsEdits');

		$this->loadModel('AsConnectionsMetas');

	    $asConnection = $this->AsConnections->get($id,['contain' => ['AsConnectionsMetas']]);

		$this->loadModel('Issues');

		$issues=$this->Issues->find('all',array('conditions'=>array('status'=>'a'),'order' => array('name' => 'ASC')));

        $this->loadModel('Modalities');

		$modalities=$this->Modalities->find('all',array('conditions'=>array('status'=>'a'),'order' => array('name' => 'ASC')));

        $this->loadModel('MentalHealths');

		$mentalhealths=$this->MentalHealths->find('all',array('conditions'=>array('status'=>'a'),'order' => array('name' => 'ASC')));

        $this->loadModel('Ages');

		$ages=$this->Ages->find('all',array('conditions'=>array('status'=>'a'),'order' => array('name' => 'ASC')));

        $this->loadModel('Payments');

		$payments=$this->Payments->find('all',array('conditions'=>array('status'=>'a'),'order' => array('name' => 'ASC')));

   	    $this->loadModel('SessionCosts');

		$sessioncosts=$this->SessionCosts->find('all',array('conditions'=>array('status'=>'a'),'order' => array('name' => 'ASC')));

        $this->loadModel('InsuranceProviders');

		$insuranceproviders=$this->InsuranceProviders->find('all',array('conditions'=>array('status'=>'a'),'order' => array('name' => 'ASC')));

        $this->loadModel('Treatments');

		$treatments=$this->Treatments->find('all',array('conditions'=>array('status'=>'a'),'order' => array('name' => 'ASC')));

		

	$this->set(compact('asConnection','issues','modalities','mentalhealths','ages','payments','sessioncosts','insuranceproviders','treatments'));
	
	
	
         if($this->request->is('post')){	
	 if(!empty($asConnection['as_connections_meta'])){
	 $forEdits['as_connections_meta']=$asConnection['as_connections_meta'];	 
		 }
	 if(!empty($asConnection['health_fund_status'])){
	 $forEdits['health_fund_status']=$asConnection['health_fund_status'];
	 	 
		 }
	 if(!empty($asConnection['program_status'])){
	 $forEdits['program_status']=$asConnection['program_status'];	 
		 }	 	 
	 if(!empty($forEdits)&& $asConnection['status']=="approved"){	 
	 $saveFields=serialize($forEdits);
	 //echo $saveFields;die;  
	 $conditions1['status']=0;
	 $conditions1['entry_id']=$id;
	 $conditions1['step']='step5';
	 $asConnection_fields = $this->AsConnectionsEdits->find('all',['conditions'=>$conditions1])->toArray();
	 //print_r($asConnection_fields);die;
	 if(!empty($asConnection_fields)){
	  
	  $query2 = $this->AsConnectionsEdits->query();

      $query2->update()
	  
	  ->set(['old_fields'=>$saveFields])
	  ->where(['entry_id' => $id,'step'=>'step5'])

	  ->execute();
	 }else{
	//echo $saveData['id'];die;	
	$saveVals['entry_id']= $id;
	$saveVals['step']= 'step5'; 
	$saveVals['old_fields']= $saveFields;
	$saveVals['status']= 0;
	$query2 = $this->AsConnectionsEdits->query();
    $query2->insert(['entry_id', 'step', 'old_fields','status'])
    ->values($saveVals)
    ->execute();
		 
		 }
	 }

		 

		  $data=$this->request->data;

		  $postData=$data['data'];

		  //print_r($postData);die;

		 /* Update Other Meta Values */

		  if(isset($postData['as_connections_meta']['issue'])){

			$issues=json_encode($postData['as_connections_meta']['issue']);

			}else{

			$issues="";  

			}

		  if(isset($postData['as_connections_meta']['diagnosis'])){

			$diagnosis=json_encode($postData['as_connections_meta']['diagnosis']);

			}else{

			$diagnosis="";  

			}

		 if(isset($postData['as_connections_meta']['treatment'])){

			$treatment=json_encode($postData['as_connections_meta']['treatment']);

			}else{

			$treatment="";  

			}

		if(isset($postData['as_connections_meta']['modality'])){

			$modality=json_encode($postData['as_connections_meta']['modality']);

			}else{

			$modality="";  

			}

		if(isset($postData['as_connections_meta']['age'])){

			$age=json_encode($postData['as_connections_meta']['age']);

			}else{

			$age="";  

			}
	    //echo $age;die;		

		if(isset($postData['as_connections_meta']['payment_method'])){

			$payment_method=json_encode($postData['as_connections_meta']['payment_method']);

			}else{

			$payment_method="";  

			}

		if(isset($postData['as_connections_meta']['insurance_provider'])){

			$insurance_provider=json_encode($postData['as_connections_meta']['insurance_provider']);

			}else{

			$insurance_provider="";  

			}

		  
          if(isset($postData['as_connections_meta']['declaration']) && $postData['as_connections_meta']['declaration']!=""){
		  $dec=$postData['as_connections_meta']['declaration'];
		  }else{
		  $dec=0;  
			  }
		 
		 if(isset($postData['as_connections_meta']['mental_health_fund']) && $postData['as_connections_meta']['mental_health_fund']!=""){
		  $mental_health_fund=$postData['as_connections_meta']['mental_health_fund'];
		  }else{
		  $mental_health_fund=0;  
			  }
		if(isset($postData['as_connections_meta']['program_status']) && $postData['as_connections_meta']['program_status']!=""){
		  $program_status=$postData['as_connections_meta']['program_status'];
		  }else{
		  $program_status=0;  
			  }
	    if(isset($postData['as_connections_meta']['insurance']) && $postData['as_connections_meta']['insurance']!=""){
		  $insurance=$postData['as_connections_meta']['insurance'];
		  }else{
		  $insurance="";  
			  }
		if(isset($postData['as_connections_meta']['other_insurance']) && $postData['as_connections_meta']['other_insurance']!=""){
		  $other_insurance=$postData['as_connections_meta']['other_insurance'];
		  }else{
		  $other_insurance="";  
			  }
		if(isset($postData['as_connections_meta']['service_type']) && $postData['as_connections_meta']['service_type']!=""){
		  $service_type=$postData['as_connections_meta']['service_type'];
		  }else{
		  $service_type="";  
			  }
		
		if(isset($postData['as_connections_meta']['out_of_network']) && $postData['as_connections_meta']['out_of_network']!=""){
		  $out_of_network=$postData['as_connections_meta']['out_of_network'];
		  }else{
		  $out_of_network="";  
			  }
		  //echo $dec;die;
          //print_r($postData);die;
		  $query = $this->AsConnectionsMetas->query();  

	      $query->update()

	      ->set(['issue'=>$issues,

	      'diagnosis'=>$diagnosis,

		  //'other_diagnosis'=>$postData['as_connections_meta']['other_diagnosis'],

		  'treatment'=>$treatment,

		  'video_conference'=>$postData['as_connections_meta']['video_conference'],

		  //'other_language'=>$postData['as_connections_meta']['other_language'],

		  'session_cost'=>$postData['as_connections_meta']['session_cost'],

		  'scale_payment'=>$postData['as_connections_meta']['scale_payment'],
		  
		  'payment_method'=>$payment_method,

		  'mental_health_fund'=>$mental_health_fund,

		  'triad'=>$program_status,

		  'insurance'=>$insurance,

		  'insurance_provider'=>$insurance_provider,

		  'other_insurance'=>$other_insurance,

		  'declaration'=>$dec,

		  'modality'=>$modality,

		  'age_group'=>$age,
		  
		  'service_type'=>$service_type,
		  
		  'out_of_network'=>$out_of_network

		  ]

	      )

	      ->where(['id' => $postData['as_connections_meta']['metaId']])

	      ->execute();

		  
		  $query = $this->AsConnections->query();  

	      $query->update()

	      ->set(['health_fund_status'=>$mental_health_fund,

		  'program_status'=>$program_status])
          ->where(['id' => $id])

	      ->execute();
		  
		  	  

		  /*Success Message*/
		  self::send_profile_complete_email($id);
	      $this->Flash->success_contact(__('Details Updated Successfully.'));

		  return $this->redirect(['controller' => 'Users', 'action' => 'dashboard']);

		}
		
 }else{
	 $this->Flash->success_contact('To see this page please login or register.');
	 return $this->redirect(array('controller'=>'home','action'=>'index')); 	
	 }
	
}	
	
}?>