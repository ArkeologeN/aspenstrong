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


class UsersController extends AppController

{

	  var $helpers = array('Form'); 

	  var $components = array('Session','Flash');
	  
	
      //$this->Auth->allow(['login', 'register','verify_link']);
    
	  
	  //var $components = array('Session','Flash');
	  
 public function login()

    {
     $this->loadModel('Users');
	 $this->loadModel('AsConnections');
     if($this->request->is('post')){

         $data=$_POST;
		
		
		$conditions['user_email']=$data['email'];
		$conditions['user_pass']=md5($data['password']);
		$conditions['user_status']=1;
        $results = $this->Users->find('all',['conditions'=>$conditions])->toArray();
		 
		 
		 
		 
		// print_r($results->toArray());die;	
     if(!empty($results)){ 
        foreach($results as $re){
		//print_r($re);die;
		if($re['user_status']==1){
        
		
		$conditions2['owner']=$re['ID'];
        $results2 = $this->AsConnections->find('all',['conditions'=>$conditions2])->toArray();
        
		//print_r();die;
		//$this->Flash->success('You have successfully logged In ');  
        //$this->redirect(array('controller'=>'users','action'=>'dashboard'));
		if( ! isset($results2[0]['id'])){
        $session = $this->request->session();
        $session->write('userDetails',$re);
  	    echo "successnew";exit;
		}else{
	      if($results2[0]['close_status']=='deleted')
	      {
	        echo "deleted";exit;
	      }else{
	        $session = $this->request->session();
	        $session->write('userDetails',$re);
	        echo "success";exit;
	      }
		
		} 
		 }else{
        //$this->Flash->success('Please verify your account to get login.');  
        //$this->redirect(array('controller'=>'home','action'=>'index'));
		echo "unverified";exit;
		}
        } 
     }
     else
     {
	   echo "error";exit;
       //$this->Flash->error('Invalid email or password');
       //return $this->redirect(array('controller'=>'home','action'=>'index')); 	  
      }
	}

    }

public function register(){

$this->loadModel('Users');
if($this->request->is('post')){
	$data=$_POST;
	  
      $sender_name=$data['nicename'];
      $sender_email=$data['email'];
	  
	  $Newquery = $this->Users->query();
	  
	  $query = $Newquery->find('all', [
      'conditions' => ['user_email'=>$data['email']]
      ]);
      $number = $query->count();
      //echo $number;die;
	  if($number==0){
      $Newquery->insert(['user_pass','user_status', 'user_registered','user_nicename','user_email','display_name'])

      ->values([

	    'user_pass' => md5($data['password1']),

        'user_status' => 0,

        'user_registered' => date('Y-m-d H:i:s'),

		'user_nicename' => $data['nicename'],
		'user_email' => $data['email'],
		'display_name'=> $data['nicename']

      ])

      ->execute();

	 if(!empty($Newquery)){
	  $result=$this->Users->find('all')->last();
	  $usr_id=base64_encode($result->ID);
      
      $link=HOME_WEB."users/verify_link/".$usr_id;
      $link = "<a href='".$link."' style='text-decoration:none;color:#263E72' target='_blank'>".__('Here .')."</a>";
      $vars = array(
                array(
                    'name' => 'NAME',
                    'content' => $sender_name,
                ),
                array(
                    'name' => 'LINK',
                    'content' => $link
                )
              );
      //$from_name = 'Example Name';
      $template_name = 'as-directory-email-activation-provider';
     // $from_email = 'Aspen Strong Directory';
	   $from_email = 'info@aspenstrong.org';
      $subject = 'Activation Link';
      $this->sendMail($template_name,'info@aspenstrong.org','Aspen Strong Directory',$sender_email,$sender_name,$vars,$subject);
      
      //$this->send_email($replace,$with,'user_registration','support@aspenstrong.com',$email);
      //$replaceAdmin = array('{name}','{email}','{admin_name}');
      $this->loadModel('Admins');
      $adminData = $this->Admins->get(1);
	  //print_r($adminData['id']);die;
      $template_name = 'profile-registration-admin';
      $emailAdmin = $adminData['email'];
      $AdminName = $adminData['first_name'].' '.$adminData['last_name'];      
      $vars = array(
                array(
                  'name'=>'ADMIN_NAME',
                  'content'=>$AdminName
                ), 
                array(
                  'name'=>'NAME',
                  'content'=>$result->display_name
                ),
                array(
                  'name'=>'PERSON_EMAIL',
                  'content'=>$result->user_email
                ),
              );
      //$withAdmin = array($data['User']['display_name'],$data['User']['user_email'],$AdminName);
      $subject = 'New Profile Registration';
      $this->sendMail($template_name,'info@aspenstrong.org','Aspen Strong Directory',$emailAdmin,$AdminName,$vars,$subject); 
      //$this->send_email($replaceAdmin,$withAdmin,'user_registration_admin','support@aspenstrong.com',$emailAdmin);
      $this->Flash->success_contact('You will receive an activation email in the next few minutes. If you don’t see it, please check your junk inbox.');
		 
		//$this->Flash->success('You have successfully Registered , Please check your email to get verified. ');  
		return $this->redirect(array('controller'=>'home','action'=>'index')); 
		 }
	  }else{
		  
	$this->Flash->success_contact('Email already exists.');  
	return $this->redirect(array('controller'=>'home','action'=>'index')); 	  
		  }
	  
	}
		 
		 
	}
	
	
public function verifyLink($id=null)
       {
         $ide=base64_decode($id);
            if(!empty($ide))
             {
             
              $this->loadModel('Users');
              $usr_deail=$this->Users->get($ide);
              if($usr_deail->user_status==1){
                 //$this->Flash->error('Your link has expired');       
                   //$this->redirect(array('action'=>'index'));
				          $this->Flash->error('Your Key is expired.');  
                   $this->redirect(array('controller'=>'home','action'=>'index'));
                }else {
              
			  $Newquery = $this->Users->query();
              $Newquery->update()
              ->set(['user_status' => 1])
              ->where(['ID' => $ide])
              ->execute();
              // $session = $this->request->session();
		      // $session->write('userDetails',$usr_deail);
          $template_name = 'user-activation-provider';
          $emailAdmin = $usr_deail->user_email; 
          $AdminName  = $usr_deail->display_name;
          $vars = array(                    
                    array(
                      'name'=>'NAME',
                      'content'=>$usr_deail->display_name
                    ),                    
                  );
          //$withAdmin = array($data['User']['display_name'],$data['User']['user_email'],$AdminName);
          $subject = 'Profile Activation';
          $this->sendMail($template_name,'info@aspenstrong.org','Aspen Strong Directory',$emailAdmin,$AdminName,$vars,$subject); 
      
               $this->Flash->success_contact('Your Account has been activated successfully');       
               $this->redirect(array('controller'=>'home','action'=>'index?verify=1')); 
              }
              }
             
      }
	  
	 function forgotPassword()
     {
        $this->viewBuilder()->setLayout("front");
        $this->loadModel('Users');
        if($this->request->is('post'))
        {
          $data=$_POST;
		  //print_r($data);die;
          $email=$data['email'];
          $user=$this->Users->find('all',['conditions'=>['user_email'=>$email]]);
		  $user=$user->toArray();
		  //print_r($user[0]['ID']);die;
          if(!empty($user))
          {
            $username=$user[0]['user_nicename'];
            //$email=$data['user_email'];
            $key=rand(6,100000);
            //$user['User']['user_activation_key']=$key;
            /*$this->Users->updateAll(array(
                                'User.user_activation_key'=>'"'.$key.'"'
                                ),array(
                                    'User.ID'=>$user['User']['ID']
                                )
                            );*/
			$query = $this->Users->query();
            $query->update()
			->set(['user_activation_key'=>$key,
	        ])
	        ->where(['ID' => $user[0]['ID']])

	        ->execute();
			
            $enc_id=base64_encode(convert_uuencode($user[0]['ID']));
            $enc_key=base64_encode(convert_uuencode($key));
            $link=HOME_WEB."users/changePassword/".$enc_key.'/'.$enc_id;
            
           $from_email = 'info@aspenstrong.org';
            $vars = array(
                      array(
                        'name'=>'FNAME',
                        'content'=>$user[0]['display_name']
                        ),
                      array(
                        'name'=>'USERNAME',
                        'content'=>$username
                        ),
                      array(
                        'name'=>'LINK',
                        'content'=>$link
                        ),
                    );
            //$this->send_email($replace,$with,'forgot_password','support@aspenstrong.com',$email);
            $subject = 'Reset Password';

            $template_name="reset-directory-password-provider";
            $this->sendMail($template_name,'info@aspenstrong.org','Aspen Strong Directory',$email,$username,$vars,$subject);
			//$this->sendMail($template_name,$from_email,'','kirti@mailinator.com',$username,$vars,$subject);
            $this->Flash->success_contact('A password  reset has been sent on your email please change your password!');       
            return $this->redirect(array('controller'=>'home','action'=>'index')); 
          }else
          {
            $this->Flash->error('Looks like your account is not exists in out system!!!');       
            return $this->redirect(array('controller'=>'home','action'=>'index')); 
          }
        } 
      }
      
      
     function changePassword($enc_key=null,$enc_id=null)
	 {
      $this->viewBuilder()->setLayout("front");
      $key=convert_uudecode(base64_decode($enc_key)); 
      $id=convert_uudecode(base64_decode($enc_id));  
        $this->loadModel('Users');
  		$user=$this->Users->get($id);
		//print_r($user);die;
      if($user['user_activation_key']!=$key){
    
     $this->Flash->success_contact('Sorry this link is expired!');   
     $this->redirect(array('controller'=>'home','action'=>'index'));
    
      }else{
      $this->set('id',$user['ID']);
      }
      
      if($this->request->is('post')){
        $data=$_POST;
        /*$this->User->updateAll(array(
                                'User.user_pass'=>'"'.md5($data['User']['user_pass']).'"',
                                'User.user_activation_key'=>'0'
                                ),array(
                                    'User.ID'=>$data['User']['ID']
                                )
                            );*/
		$query = $this->Users->query();
            $query->update()
			->set(['user_pass'=>md5($data['user_pass']),
			'user_activation_key'=>0
	        ])
	        ->where(['ID' => $user['ID']])

	        ->execute();
            $this->Flash->success_contact('Your password has been updated successfully please Login!');       
            $this->redirect(array('controller'=>'home','action'=>'index'));
          }
        }
		
	function updatePassword()
	 {
		 $session = $this->request->session();  
         $userSession=$session->read('userDetails');
       if(empty($userSession))
       {
          $this->Flash->success_contact('To see this page please login or register!');       
          $this->redirect(array('controller'=>'home','action'=>'index'));
       }
		  $this->viewBuilder()->setLayout("front");
		 //echo $userSession['ID'];die;
		 if(isset($userSession['ID']) && $userSession['ID'] != ""){
		$id=$userSession['ID'];
     
        $this->loadModel('Users');
  		$user=$this->Users->get($id);
		
		 $this->loadModel('AsConnections');
 		 $this->loadModel('AsConnectionsEdits');
 		 $conditions['owner']=$userSession['ID'];
 		 $results = $this->AsConnections->find('all',['conditions'=>$conditions]);
 
 		 $this->set(compact('results'));	 
      
      if($this->request->is('post')){
        $data=$_POST;
        $old_pass=md5($data['old_password']);
		if($old_pass==$user['user_pass']){
		$query = $this->Users->query();
            $query->update()
			->set(['user_pass'=>md5($data['new_password']),
			'user_activation_key'=>0
	        ])
	        ->where(['ID' => $user['ID']])

	        ->execute();
            $this->Flash->success_contact('Your password is updated successfully .');       
            $this->redirect(array('controller'=>'users','action'=>'update_password'));
          
	  }else{
		    $this->Flash->error('Please enter correct previous password.');       
            $this->redirect(array('controller'=>'users','action'=>'update_password'));  
		  }
	  }
		  
		 }
        }
		
	 function updateEmail()
	 {
		 $session = $this->request->session();  
         $userSession=$session->read('userDetails');
         if(empty($userSession))
       {
          $this->Flash->success_contact('To see this page please login or register!');       
          $this->redirect(array('controller'=>'home','action'=>'index'));
       }
		  $this->viewBuilder()->setLayout("front");
		 //echo $userSession['ID'];die;
		 if(isset($userSession['ID']) && $userSession['ID'] != ""){
		$id=$userSession['ID'];
     
        $this->loadModel('Users');
  		$user=$this->Users->get($id);
		 $this->loadModel('AsConnections');
 		 $this->loadModel('AsConnectionsEdits');
 		 $conditions['owner']=$userSession['ID'];
 		 $results = $this->AsConnections->find('all',['conditions'=>$conditions]);
 
 		 $this->set(compact('results','user'));

      $this->render("update_email");

      if($this->request->is('post')){
        $data=$_POST;
	   $Newquery = $this->Users->query();
	   $query = $Newquery->find('all', [
      'conditions' => ['user_email'=>$data['new_email']]
      ]);
      $number = $query->count();
      //echo $number;die;
	  if($number==0){
		
          $query = $this->Users->query();
          $query->update()
			    ->set(['user_email_new'=>$data['new_email']])
	        ->where(['ID' => $user['ID']])
	        ->execute();
                    
              $link=HOME_WEB."users/update_new_email/".$user['ID'];
              $link = "<a href='".$link."' style='text-decoration:none;color:#263E72' target='_blank'>".__('Here .')."</a>";
              $vars = array(
                        array(
                            'name' => 'NAME',
                            'content' => $user->display_name,
                        ),
                        array(
                            'name' => 'LINK',
                            'content' => $link
                        )
                      );
              $template_name = 'as-directory-email-activation-provider';
              $subject = 'Update New Email Link';
              $this->sendMail($template_name,'info@aspenstrong.org','Aspen Strong Directory',$data['new_email'],'',$vars,$subject);

            $this->Flash->success_contact('We have sent you an email, Please follow instruction.');       
            $this->redirect(array('controller'=>'users','action'=>'update_email'));
      } else{
		        $this->Flash->error('Email you enter is already exist.');       
            $this->redirect(array('controller'=>'users','action'=>'update_email'));  
		  }  
	  
	  }
		  
		 }
        }
	 public function updateNewEmail($id)
   {
      $this->loadModel('Users');
      $user = $this->Users->get($id);

      $query = $this->Users->query();
      $query->update()
      ->set(['user_email'=>$user->user_email_new,'user_email_new'=>$user->user_email_new])
      ->where(['ID' => $id])
      ->execute();

      $this->Flash->success_contact('Your email has been updated');       
      $this->redirect(array('controller'=>'home','action'=>'index?verify=2'));
   }
	
     public function dashboard(){
     $this->viewBuilder()->setLayout("front");
	 $session = $this->request->session();  
     $userSession=$session->read('userDetails');
     //echo $userSession['ID'];
	 if(isset($userSession['ID']) && $userSession['ID'] != ""){
	 $this->loadModel('AsConnections');
     $this->loadModel('Socialnets');
     $this->loadModel('AsConnectionsSocials');
     $this->loadModel('AsConnectionsLinks');
     $this->loadModel('AsConnectionsMetas');
     $this->loadModel('AsConnectionsAddresses');
	 $this->loadModel('AsConnectionsPhones');
     $this->loadModel('AsConnectionsEmails');
	 $this->loadModel('AsConnectionsEdits');
	 $this->loadModel('ConnectionCredentials');
	 $conditions['owner']=$userSession['ID'];	
	 $results = $this->AsConnections->find('all',['conditions'=>$conditions,'contain' => ['AsConnectionsSocials','AsConnectionsLinks','AsConnectionsAddresses','AsConnectionsMetas','AsConnectionsPhones','AsConnectionsEmails','ConnectionCredentials']]);
	 foreach($results as $result){ 
	  $entry_id=$result['id'];
	 }

	$Query = $this->AsConnectionsEdits->find();
	$Query->select([ 
				  'id',
				  'count' => $Query->func()->count('*')
				])
		 ->where(['entry_id' => $entry_id])
		 ->group('id');
		 $ediArray=$Query->toList();
		
	  if(!empty($ediArray)){
		$this->set('countEdit',1);
	  }else{
		 $this->set('countEdit','');
	  }
    $this->loadModel('Users');
    $user=$this->Users->get($userSession['ID']);

  
	 foreach($results as $result){ 
	 $entry_id=$result['id'];
	 //print_r();die;
	 if(!empty($result['as_connections_addresses'])){
	 $zip=$result['as_connections_addresses'][0]['zipcode'];
	 }else{
	 $zip=0;	 
	 }
	 $time='30daysAgo';	
	 $_SESSION['entry_id']=$entry_id; 
	 //$_SESSION['entry_id']	 
     $views=$this->dashboard_analytics($time,$entry_id,$zip);
	 //print_r($vals);die;	
	} 
	  
     
	 $this->set(compact('results','views')); 
	 }else{
	 $this->Flash->success_contact('To see this page please login or register.'); 
	 return $this->redirect(array('controller'=>'home','action'=>'index')); 		 
	 }
	 
    }
	
//Analytics

function dashboard_analytics($time=null,$entry_id,$zip=null){
   // $this->layout="admin";
  
   $this->loadModel('AsConnectionsAddresses');
		$zip=$this->AsConnectionsAddresses->find('all',array('conditions'=>array('AsConnectionsAddresses.entry_id'=>$entry_id,'AsConnectionsAddresses.preferred'=>1)));
	if($zip!=""){
    $zipCode=$zip;
	}else{
	$zipCode=0;	
		}
    $startDate = $time;	
    //$startDate = '30daysAgo';
    $endDate = 'today';
    $analytics = $this->getService();
		//print_r($analytics);die;
        $analytics_id = '138844882'; 
        //$profile = $this->getFirstProfileId($analytics);
		//print_r($profile);die;
        //if($profile !=0){
			
        $results = $this->getResultsSession($analytics,$analytics_id,$startDate,$endDate);
		$get_goals=$this->getGoals($analytics,$analytics_id,$startDate,$endDate);
		$get_goals_email=$this->getGoals2($analytics,$analytics_id,$startDate,$endDate);
		$get_goals_share=$this->getGoals3($analytics,$analytics_id,$startDate,$endDate);
		$get_site_search=$this->getSitesearch($analytics,$analytics_id,$startDate,$endDate,$zipCode);
		
        //print_r($get_site_search);die;
		$totalrows=array();
        if (count($results->getRows()) > 0) {
        //$profileName = $results->getProfileInfo()->getProfileName();
		 $views= $results->getTotalsForAllResults();
		
        $totalrows['profileViews']= $views['ga:pageviews'];
			//print_r($totalrows);die;
			//return $totalrows;
		  }
		   //if ($get_goals != NULL) {
			$totalrows['websiteVisit']=$get_goals; 
			$totalrows['emailSent']=$get_goals_email; 
			$totalrows['profileShare']=$get_goals_share; 
			$totalrows['sitesearch_Zip']=$get_site_search; 
		   //}
		   return $totalrows;
	//}

    }
	
function getService()

{
		
 $des = realpath('vendor/google-api-php-client').'/';
 if(is_file($des.'src/Google/autoload.php'))
 { require_once $des.'src/Google/autoload.php';}
  
$url = 'https://directory.aspenstrong.org/analytics/google-api-php-client/examples/service-account.php';
//$url = 'https://aspenstrong.org/analytics/google-api-php-client/examples/service-account.php';
$content = file_get_contents($url);
//print_r($content);die;
$client = new \Google_Client();
$client->setApplicationName("Hello Analytics Reporting");

$first_step = explode( '<div id="presv">' , $content );
$second_step = explode("</div>" , $first_step[1] );

$_SESSION['service_token']=$second_step[0] ;
 /* $_SESSION['service_token']='{"access_token":"ya29.ElnrA39IxMKSt7s4lg7QDaqaRcUrKGvRO3lp72wSVpfWgnGyrOGzzbJECujSct6HOD2l3TIexWBA6gVx1PXT_rNkZGcnA8xNvrHAuIHWPUhxoTk69diKl3g7rw","expires_in":3600,"created":1486474479}';*/
// print_r($_SESSION);die;
 
  if (isset($_SESSION['service_token'])) {
 
  $client->setAccessToken($_SESSION['service_token']);

}

//$key = file_get_contents($key_file_location);

/*$cred = new Google_Auth_AssertionCredentials(

    $service_account_name,

    array('https://www.googleapis.com/auth/analytics.readonly'),

    $key

);*/
/*$cred = new Google_Auth_AssertionCredentials(

    $service_account_name,

    array('https://www.googleapis.com/auth/analytics.readonly')

);

$client->setAssertionCredentials($cred);

if ($client->getAuth()->isAccessTokenExpired()) {

  $client->getAuth()->refreshTokenWithAssertion($cred);

}*/

$_SESSION['service_token'] = $client->getAccessToken();
 $analytics = new \Google_Service_Analytics($client);
//print_r($analytics);die;
 return $analytics;
 
 $analytics_id = 'ga:138844882'; 
 try {
  $optParams = array();
  // metrics
    $_params[] = 'date';
    $_params[] = 'date_year';
    $_params[] = 'date_month';
    $_params[] = 'date_day';
    // dimensions
    $_params[] = 'visits';
    $_params[] = 'pageviews';
  // Required parameter
  /*$metrics    = 'ga:uniquePageviews,ga:avgTimeOnPage';*/
  $metrics = 'ga:visits,ga:pageviews,ga:bounces,ga:entranceBounceRate,ga:visitBounceRate,ga:avgTimeOnSite,ga:fullReferrer';
  $dimensions = 'ga:date,ga:year,ga:month,ga:day,ga:country,ga:city';
  $start_date = '2017-01-19';
  $end_date   = '2017-01-25';
 
  // Optional parameters
  // optParams['filters']      = 'ga:pagePath==/';
  // $optParams['dimensions']  = 'ga:pagePath';
  // $optParams['sort']        = '-ga:pageviews';
  // $optParams['max-results'] = '10';
 
  /*$result = $analytics->data_ga->get( $analytics_id,
            $start_date,
            $end_date, $metrics, $optParams);*/
// print_r($result);
 $data = $analytics->data_ga->get($analytics_id, $start_date, $end_date, $metrics, array('dimensions' => $dimensions));

    $retData = array();
    foreach($data['rows'] as $row)
    {
       $dataRow = array();
       foreach($_params as $colNr => $column)

       {
           $dataRow[$column] = $row[$colNr];
       }
       array_push($retData, $dataRow);
    }
     //var_dump($retData);
    echo json_encode($retData);


} catch (Exception $e) {
    die('An error occured: ' . $e->getMessage()."n");
}
    }

function getResultsSession($analytics, $profileId,$startDate,$endDate,$key=NULL) {

	  // Calls the Core Reporting API and queries for the number of sessions

	  // for the last seven days.
       //$metrics = 'ga:visits,ga:pageviews,ga:bounces,ga:entranceBounceRate,ga:visitBounceRate,ga:avgTimeOnSite,ga:fullReferrer';
       //$dimensions = 'ga:country,ga:city';
	   //https://www.googleapis.com/analytics/v3/data/ga?ids=ga%3A138844882&start-date=30daysAgo&end-date=yesterday&metrics=ga%3Apageviews&dimensions=ga%3ApagePath&sort=ga%3Apageviews&filters=ga%3ApagePath%3D%3D%2Fdirectory%2Flist%2FprofileView%2FIyxDJFUKYAo%3D
	   $optParams = array();
if($key==NULL){
$key=base64_encode(convert_uuencode($_SESSION['entry_id']));
}else{
$key=$key;
	}
   $optParams['filters']      = 'ga:pagePath==/list/profileView/'.$key;
   $optParams['dimensions']  = 'ga:pagePath';
   $optParams['sort']        = '-ga:pageviews';
  return $analytics->data_ga->get(


	       'ga:' . $profileId,

	       $startDate,

	       $endDate,

	       'ga:pageviews',$optParams);
	
}

function getGoals($analytics, $profileId,$startDate,$endDate,$key=NULL){
	$optgoals=array();
$optgoals['dimensions']='ga:goalCompletionLocation';
if($key==NULL){
$key=base64_encode(convert_uuencode($_SESSION['entry_id']));
}else{
$key=$key;
	}
$location='/list/profileView/'.$key;	
	$goal1= $analytics->data_ga->get(


	       'ga:' . $profileId,

	       $startDate,

	       $endDate,

	       'ga:goal1Completions',$optgoals);
 $goals=$goal1->getRows();	   
 foreach($goals as $goal){
	if($goal[0]==$location){
	$wv= $goal[1];	
		}
	
	}
	if(isset($wv)){
	return $wv;	
		}else{
	return 0;		
			}
	
	
	}
	
function getGoals2($analytics, $profileId,$startDate,$endDate,$key=NULL){
	$optgoals=array();
$optgoals['dimensions']='ga:goalCompletionLocation';
if($key==NULL){
$key=base64_encode(convert_uuencode($_SESSION['entry_id']));
}else{
$key=$key;
	}
$location='/list/profileView/'.$key;	
	$goal1= $analytics->data_ga->get(


	       'ga:' . $profileId,

	       $startDate,

	       $endDate,

	       'ga:goal2Completions',$optgoals);
 $goals=$goal1->getRows();	   
 foreach($goals as $goal){
	if($goal[0]==$location){
	$wv= $goal[1];	
		}
	
	}
	//echo $wv;die;
	if(isset($wv)){
	return $wv;	
		}else{
	return 0;		
			}
	
	
	}


function getGoals3($analytics, $profileId,$startDate,$endDate,$key=NULL){
	$optgoals=array();
$optgoals['dimensions']='ga:goalCompletionLocation';
if($key==NULL){
$key=base64_encode(convert_uuencode($_SESSION['entry_id']));
}else{
$key=$key;
	}
$location='/list/profileView/'.$key;	
	$goal1= $analytics->data_ga->get(


	       'ga:' . $profileId,

	       $startDate,

	       $endDate,

	       'ga:goal3Completions',$optgoals);
 $goals=$goal1->getRows();	   
 foreach($goals as $goal){
	if($goal[0]==$location){
	$wv= $goal[1];	
		}
	
	}
	//echo $wv;die; 
	if(isset($wv)){
	return $wv;	
		}else{
	return 0;		
			}
	
	
	}

function getSitesearch($analytics,$profileId,$startDate,$endDate,$zipCode){
	
	$optgoals=array();
$optgoals['dimensions']='ga:searchKeyword';

	$goal1= $analytics->data_ga->get(


	       'ga:' . $profileId,

	       $startDate,

	       $endDate,

	       'ga:searchUniques',$optgoals);

 $goals=$goal1->getRows();	
 //print_r($goals);die;
 $wv=0;
  foreach($goals as $goal){
	if($goal[0]==$zipCode){
	$wv= $goal[1];	
		}
	
	}
	//echo $wv;die; 
	if($wv){
	return $wv;	
		}else{
	return 0;		
			}
	
	
	}


//Analytics	

public function deleteAccount(){
$this->viewBuilder()->setLayout("front");
$this->loadModel('AsConnections');
$this->loadModel('AsConnectionsEdits');
$session = $this->request->session();
$userDetails=$session->read('userDetails');

$this->loadModel('Users');

if(isset($userDetails['ID']) && $userDetails['ID'] !=""){
$conditions['owner']=$userDetails['ID'];
$results = $this->AsConnections->find('all',['conditions'=>$conditions]);	

if($this->request->is('post')){
$data=$_POST;
//print_r($data);
if($data['deleteval']=='yes'){
//Array ( [deleteval] => yes [deletereason] => ffff ) 
if(isset($data['deletereason'])){
$reason=$data['deletereason'];	
	}else{
$reason="";		
		}

//print_r($_SESSION['userDetails']['ID']);die;
/*$Newquery = $this->Users->query();
$Newquery->update()
      ->set(['user_status' => -1,'reason' =>  $reason  ])
      ->where(['ID' => $_SESSION['userDetails']['ID']])
      ->execute();*/
	}

$Newquery = $this->AsConnections->query();
$Newquery->update()
      ->set(['status' => 'unapproved','close_status' => 'deleted' ])
      ->where(['owner' => $_SESSION['userDetails']['ID']])
      ->execute();

$session = $this->request->session();
$session->destroy('userDetails');	
$this->Flash->success_contact('Account Deleted successfully.');
return $this->redirect(array('controller'=>'home','action'=>'index')); 

}else{

if(isset($data['deletereason'])){
$reason=$data['deletereason'];	
	}else{
$reason="";		
		}
$session = $this->request->session();
$userDetails=$session->read('userDetails');
//print_r($_SESSION['userDetails']['ID']);die;
$Newquery = $this->Users->query();
$Newquery->update()
      ->set(['reason' =>  $reason  ])
      ->where(['ID' => $_SESSION['userDetails']['ID']])
      ->execute();
//$this->Flash->success('Account Not Deleted.');
	
}
$this->set(compact('results'));	
}else{
	 $this->Flash->success_contact('To see this page please login or register.');
	 return $this->redirect(array('controller'=>'home','action'=>'index')); 	
	 }

	}

public function deactivateAccount($id=null){
$this->viewBuilder()->setLayout("front");
$this->loadModel('AsConnections');
$this->loadModel('AsConnectionsEdits');
$session = $this->request->session();
$userDetails=$session->read('userDetails');
//account_status
if(isset($userDetails['ID']) && $userDetails['ID'] !=""){
$conditions['owner']=$userDetails['ID'];
$results = $this->AsConnections->find('all',['conditions'=>$conditions]);	
$con_metas3 = TableRegistry::get('as_connections');
$record3 = $con_metas3->find('all')->where(['owner' => $userDetails['ID']])->first();

if($this->request->is('post')){
$data=$_POST;
if($data['account_status']=='yes'){
$Newquery = $this->AsConnections->query();
$Newquery->update()
      ->set(['status' => 'unapproved','close_status' => 'deactivated' ])
      ->where(['id' => $record3->id])
      ->execute();
	  $this->Flash->success('Account Deactivated Successfully.');	
	}
if($data['account_status']=='no'){
$Newquery = $this->AsConnections->query();
$Newquery->update()
      ->set(['status' => 'approved','close_status' => 'activated' ])
      ->where(['id' =>  $record3->id])
      ->execute();
	  $this->Flash->success_contact('Account Activated Successfully.');	
	}
}
$this->set(compact('results'));
}else{
	 $this->Flash->success_contact('To see this page please login or register.');
	 return $this->redirect(array('controller'=>'home','action'=>'index')); 	
	 }

}
	
	
	
	
public function logout(){

$session = $this->request->session();
$session->destroy('userDetails');	
$this->Flash->success_contact('Logged out successfully.');
return $this->redirect(array('controller'=>'home','action'=>'index')); 

	}

}


