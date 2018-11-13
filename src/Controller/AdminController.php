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

use App\Controller\AppController;

use Cake\Core\Configure;

use Cake\Network\Exception\ForbiddenException;

use Cake\Network\Exception\NotFoundException;

use Cake\View\Exception\MissingTemplateException;

use Cake\ORM\TableRegistry;

use Cake\Datasource\ConnectionManager;

//use Cake\Datasource\EntityInterface;

/**

 * Static content controller

 *

 * This controller will render views from Template/Pages/

 *

 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html

 */

class AdminController extends AppController

{

	  var $helpers = array('Form');

	  var $components = array('Session','Flash');

		public function initialize()
		{
			if ($_SERVER['REQUEST_URI']!='/admin') 
		  	{ 	  		
			  	$session = $this->request->session();
				$whole_session=$session->read('admin');
				if(empty($whole_session[0]['id'])){
					$this->redirect(['action' => 'index']);
				}
			}
		} 

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


		$this->viewBuilder()->setLayout("admin");

		

		/* Check admin credentials */ 

		

		if($this->request->is('post')){

		$data=$_POST;

		$connection = ConnectionManager::get('default');

        $results = $connection

    	->newQuery()

    	->select('*')

    	->from('admins')

    	->where(['username' => $data['username']],['password' => md5($data['password'])])

    	->execute()

    	->fetchAll('assoc');

		

		/* Set admin session */ 

		

		$session = $this->request->session();

		$session->write('admin',$results ); 

		$whole_session=$session->read('admin');

		

		/* Set admin session */ 

		

		if(!empty($whole_session[0]['id'])){

		

		/* Redirect to Admin Dashboard */ 

		

		$this->redirect(['action' => 'dashboard']);

		

		}else{

		$this->redirect(['action' => 'index']);

		$this->Flash->error('Wrong Credentials.');

		}

		}

		

		/* Check admin credentials */ 

       

    }

	

	/*--------------------------------------------- Admin Dashboard Screen ---------------------------------------*/

	

	 public function dashboard()

    {

		$this->viewBuilder()->setLayout("admin");
		$session = $this->request->session();
		$whole_session=$session->read('admin');
        $resultsTotal=$this->getResultsReport();
		$contactTotal=$this->homedashboardAnalytics();
		$this->loadModel('Users');
        $this->loadModel('AsConnections');
        $this->loadModel('AsConnectionsMetas');
		$this->loadModel('AsConnectionsEdits');
		$alluserpro=$this->AsConnections->find('all',['conditions'=>['close_status'=>'activated']],['contain' => ['Users']],['order' => ['AsConnections.id' => 'DESC']])->toArray();
		$profile=$this->AsConnections->find('all')->toArray();		
		$alluserNew=$this->Users->find('all',['contain' => ['AsConnections'],'order' => ['Users.id' => 'DESC']])->toArray();
		$this->set('alluserNew',$alluserNew);
        $alluser=$this->Users->find('all')->toArray();
        $last_30_date = date('Y-m-d',strtotime('-30 days',strtotime(date('Y-m-d'))));
        $current_date = date('Y-m-d');
        $alluser_in_30day = [];
        $alluser_in_30day_varify = [];
        $alluser_in_30day_unvarify = [];
        foreach ($alluser as $ct_user) {
        	$user_date = date('Y-m-d', strtotime($ct_user->user_registered));
        	if($user_date>=$last_30_date && $user_date<=$current_date)
        	{
        		$alluser_in_30day[] = $ct_user;
        		if($ct_user->user_status==1){
        			$alluser_in_30day_varify[] = $ct_user;
        		}
        		if($ct_user->user_status==0){
        			$alluser_in_30day_unvarify[] = $ct_user;
        		}
        	}
        }
        
        $alluser_sts=$this->Users->find('all')->where(['user_status'=>1])->toArray();
		$user=$this->Users->find()->count();
		$alluser_newT=$this->Users->find('all')->count();
		$userpro=$this->AsConnections->find('all')->count();
		$userindidaxs=$this->AsConnections->find('all',['conditions'=>['status'=>'approved','entry_type'=>'individual', 'close_status'=>'activated']])->toArray();
		$userorgdnfvsdfn=$this->AsConnections->find('all',['conditions'=>['status'=>'approved','entry_type'=>'organization', 'close_status'=>'activated']])->toArray();
		
	    $userapr=$this->AsConnections->find('all',['conditions'=>['status'=>'unapproved', 'close_status'=>'activated']])->count();
	    $user_dect=$this->AsConnections->find('all',['conditions'=>['close_status'=>'deactivated']])->count();
	    
	    $alluser_del=$this->AsConnections->find('all',['conditions'=>['close_status'=>'deleted']])->count();
		$userapprovedaxs=$results =$this->AsConnections->find('all',['conditions'=>['status'=>'approved','close_status'=>'activated'],'contain' => ['AsConnectionsEmails','AsConnectionsSocials','AsConnectionsLinks','AsConnectionsAddresses','AsConnectionsMetas','AsConnectionsPhones'],'order'=> ['AsConnections.id' => 'DESC']])->toArray();	
		$useradedited=$this->AsConnectionsEdits->find('all',['conditions'=>['status'=>0]])->count();

		$user_incProfile =$this->AsConnections->find('all',['conditions'=>['close_status'=>'activated'],'contain' => ['AsConnectionsEmails','AsConnectionsSocials','AsConnectionsLinks','AsConnectionsAddresses','AsConnectionsMetas','AsConnectionsPhones'],'order'=> ['AsConnections.id' => 'DESC']])->toArray();
		$user_incaprProfile =$this->AsConnections->find('all',['conditions'=>['status'=>'unapproved','close_status'=>'activated'],'contain' => ['AsConnectionsEmails','AsConnectionsSocials','AsConnectionsLinks','AsConnectionsAddresses','AsConnectionsMetas','AsConnectionsPhones'],'order'=> ['AsConnections.id' => 'DESC']])->toArray();
		$deleted =$this->AsConnections->find('all')->where(['close_status'=>'deleted'])->toArray();
		if(!empty($deleted))
		{
			foreach ($deleted as $dl) {
				$ban_id[] = $dl->owner;
			}
		}
		$deactivated =$this->AsConnections->find('all')->where(['close_status'=>'deactivated'])->toArray();
		if(!empty($deactivated))
		{
			foreach ($deactivated as $dl) {
				$ban_id[] = $dl->owner;
			}
		}
		$ban_id = array_unique($ban_id);
		$alluser_un_left=$this->Users->find('all')->where(['user_status'=>0])->toArray();
		$alluser_un = [];
		foreach ($alluser_un_left as $alluser_un_leftjdsf) {
			if(!in_array($alluser_un_leftjdsf->ID, $ban_id))
			{
				$alluser_un[] = $alluser_un_leftjdsf->ID;
			}
		}
		$alluser_un = count($alluser_un);
		$userapproved = [];
		foreach($alluser_sts as $sts_usr)
		{
			foreach ($userapprovedaxs as $userapprovedddff) {
				if($sts_usr->ID == $userapprovedddff->owner)
				{
					if(!empty($sts_usr->user_email))
					{
						$userapproved[] = $userapprovedddff->owner;
					}
				}
			}
		}
		$userapproved = count($userapproved);
		$userindi = [];
		foreach($alluser_sts as $sts_usr)
		{
			foreach ($userindidaxs as $userindidddff) {
				if($sts_usr->ID == $userindidddff->owner)
				{
					if(!empty($sts_usr->user_email))
					{
						$userindi[] = $userindidddff->owner;
					}
				}
			}
		}
		
		$userindi = count($userindi);

		$userorg = [];
		foreach($alluser as $sts_usr)
		{
			foreach ($userorgdnfvsdfn as $userorgdddff) {
				if($sts_usr->ID == $userorgdddff->owner)
				{
					if(!empty($sts_usr->user_email))
					{
						$userorg[] = $userorgdddff->owner;
					}
				}
			}
		}
		
		$userorg = count($userorg);
		
		$total_user = $alluser_newT - ($user_dect + $alluser_del);

        $this->set(compact('alluserNew','user','userpro','userindi','userorg','userapr','useradedited','resultsTotal','alluser','alluser_un','alluserpro','contactTotal','userapproved','user_dect','alluser_del','profile','alluser_sts','user_incProfile','user_incaprProfile', 'total_user', 'alluser_in_30day', 'alluser_in_30day_varify', 'alluser_in_30day_unvarify'));
		if(!empty($whole_session[0]['id'])){

		}else{
			$this->redirect(['action' => 'index']);
			$this->Flash->error('Wrong Credentials.');
		}
    }

	/*---------------------------------------- All users list -------------------------------------------*/

	

	public function userslist()
    {
    	if(!empty($this->request->query['vars'])){
           $vars=$this->request->query['vars'];
		}else{
			 $vars='';
		}
		$this->set('vars',$vars);
		if(!empty($this->request->query['noprofile'])){
			$noprofile=$this->request->query['noprofile'];
		}else{
			$noprofile=0;
		}
		$this->set('noprofile',$noprofile);
		$this->viewBuilder()->setLayout("admin");		
		$this->loadModel('users');
		$this->loadModel('AsConnections');
		$this->loadModel('Socialnets');
		$this->loadModel('AsConnectionsSocials');
		$this->loadModel('AsConnectionsLinks');
		$this->loadModel('AsConnectionsMetas');
		$this->loadModel('AsConnectionsAddresses');		
		$this->loadModel('Therapists');		
		$this->loadModel('AsConnectionsEmails');
		$this->loadModel('AsConnectionsPhones');
		$connection = ConnectionManager::get('default');
		if(isset($_POST['status']) || $this->request->query('vars') != "" )
		{
			$condition="";
			$newcondtion = '';
			$newvalue  = '';
			if((isset($_POST['status']) && $_POST['status']=='approved') || $this->request->query('vars')== 'approved')
			{	
				$condition='status';
				$value='approved';
			}
			if((isset($_POST['status']) && $_POST['status']=='unapproved') || $this->request->query('vars')== 'unapproved')
			{
				$condition='status';
				$value='unapproved';
			}
			if((isset($_POST['status']) && $_POST['status']=='triad') || $this->request->query('vars')== 'triad')
			{
				$condition='program_status';
				$value=1;
			}
			if((isset($_POST['status']) && $_POST['status']=='mhf') || $this->request->query('vars')== 'mhf')
			{
				$condition='health_fund_status';
				$value=1;
			}
			if((isset($_POST['status']) && $_POST['status']=='organization') || $this->request->query('vars')== 'organization')
			{
				$condition='entry_type';
				$value='organization';
				$newcondtion = 'status';
				$newvalue  = 'approved';
			}
			if((isset($_POST['status']) && $_POST['status']=='individual') || $this->request->query('vars')== 'individual')
			{
				$condition='entry_type';
				$value='individual';
				$newcondtion = 'status';
				$newvalue  = 'approved';
			}				
			/*if((isset($_POST['status']) && $_POST['status']=='unverified') || $this->request->query('vars')== 'unverified')
			{
				$condition='verified_status';
				$value=0;
			}*/
			if((isset($_POST['status']) && $_POST['status']=='verified') || $this->request->query('vars')== 'verified')
			{	
				$condition='verified_status';
				$value=1;
			}
			if((isset($_POST['status']) && $_POST['status']=='deactivated') || $this->request->query('vars')== 'deactivated')
			{	
				$condition='close_status';
				$value='deactivated';
			}
			if((isset($_POST['status']) && $_POST['status']=='deleted') || $this->request->query('vars')== 'deleted')
			{	
				$condition='close_status';
				$value='deleted';
			}
			if($condition != "")
			{	
				$cnd = [];
				if(!empty($newcondtion))
				{
					$cnd[$newcondtion] = $newvalue;
				}
				$results =$this->AsConnections->find('all',['conditions'=>[$condition=>$value, $cnd],'contain' => ['AsConnectionsEmails','AsConnectionsSocials','AsConnectionsLinks','AsConnectionsAddresses','AsConnectionsMetas','AsConnectionsPhones'],'order'=> ['AsConnections.id' => 'DESC']])->toArray();
			}else{
				$results =$this->AsConnections->find('all',[ 'contain' => ['AsConnectionsEmails','AsConnectionsSocials','AsConnectionsLinks','AsConnectionsAddresses','AsConnectionsMetas','AsConnectionsPhones'],'order'=> ['AsConnections.id' => 'DESC']])->toArray();
			}
	        if(isset($_POST['status']))
	        {
				$chng_status=$_POST['status'];
			}else
			{
				$chng_status=$this->request->query('vars');	
			}
		}else
		{	
			$results =$this->AsConnections->find('all',['contain' => ['AsConnectionsEmails','AsConnectionsSocials','AsConnectionsLinks','AsConnectionsAddresses','AsConnectionsMetas'],'order'=> ['AsConnections.id' => 'DESC']])->toArray();
			$chng_status="";	

		}
		$ban_id = [];
		
		if((isset($_POST['status']) && $_POST['status'] != 'deactivated') || $this->request->query('vars') != 'deactivated')
		{
			$deleted =$this->AsConnections->find('all')->where(['close_status'=>'deleted'])->toArray();
			if(!empty($deleted))
			{
				foreach ($deleted as $dl) {
					$ban_id[] = $dl->owner;
				}
			}
			$deactivated =$this->AsConnections->find('all')->where(['close_status'=>'deactivated'])->toArray();
			if(!empty($deactivated))
			{
				foreach ($deactivated as $dl) {
					$ban_id[] = $dl->owner;
				}
			}
		}
		if((isset($_POST['status']) && $_POST['status'] != 'deleted') || $this->request->query('vars') != 'deleted')
		{
			$deleted =$this->AsConnections->find('all')->where(['close_status'=>'deleted'])->toArray();
			if(!empty($deleted))
			{
				foreach ($deleted as $dl) {
					$ban_id[] = $dl->owner;
				}
			}
			$deactivated =$this->AsConnections->find('all')->where(['close_status'=>'deactivated'])->toArray();
			if(!empty($deactivated))
			{
				foreach ($deactivated as $dl) {
					$ban_id[] = $dl->owner;
				}
			}
		}
		if((!isset($_POST['status'])) || $this->request->query('vars') != 'deleted')
		{
			$deleted =$this->AsConnections->find('all')->where(['close_status'=>'deleted'])->toArray();
			if(!empty($deleted))
			{
				foreach ($deleted as $dl) {
					$ban_id[] = $dl->owner;
				}
			}
			$deactivated =$this->AsConnections->find('all')->where(['close_status'=>'deactivated'])->toArray();
			if(!empty($deactivated))
			{
				foreach ($deactivated as $dl) {
					$ban_id[] = $dl->owner;
				}
			}
		}
		
		$unvarify_id = [];
		if((isset($_POST['status']) && $_POST['status']=='unvarify') || $this->request->query('vars')== 'unvarify')
		{
        	$users =$this->users->find('all', array('order'=>array('ID DESC')))->where(['user_status'=>'0'])->toArray();     	

        }elseif((isset($_POST['noprofile']) && $_POST['noprofile']=='1') || $this->request->query('noprofile')== '1')
		{
        	$users =$this->users->find('all', array('order'=>array('ID DESC')))->where(['user_status'=>1])->toArray(); 
        }else
        {
        	$users =$this->users->find('all', array('order'=>array('ID DESC')))->toArray();
        }
    	if($this->request->query('vars') =='deleted' || $this->request->query('vars') == 'deactivated')
    	{
        	$ban_id = [];
        }
        if((isset($_POST['status']) && $_POST['status']=='stepinccmt') || $this->request->query('vars')== 'stepinccmt')
		{
	        $results =$this->AsConnections->find('all',['conditions'=>['close_status'=>'activated'],'contain' => ['AsConnectionsEmails','AsConnectionsSocials','AsConnectionsLinks','AsConnectionsAddresses','AsConnectionsMetas','AsConnectionsPhones'],'order'=> ['AsConnections.id' => 'DESC']])->toArray();
	    }
	    if((isset($_POST['status']) && $_POST['status']=='unapproved') || $this->request->query('vars')== 'unapproved')
		{
			$results =$this->AsConnections->find('all',['conditions'=>['status'=>'unapproved','close_status'=>'activated'],'contain' => ['AsConnectionsEmails','AsConnectionsSocials','AsConnectionsLinks','AsConnectionsAddresses','AsConnectionsMetas','AsConnectionsPhones'],'order'=> ['AsConnections.id' => 'DESC']])->toArray();
		}
		$ban_id = array_unique($ban_id);
		
		$this->set(compact('results','chng_status','users','ban_id','unvarify_id'));
    }
    

	/*----------------------------------------- Edit user step1 ------------------------------------------------*/

	

	 public function edituser($id)

    {

	$this->loadModel('AsConnections');

	$result = $this->AsConnections->get($id);

	$this->viewBuilder()->setLayout("admin");

	$entry_id=$result['id'];

	$this->set(compact('result','entry_id'));

	 if($this->request->is('post')){

		  $data=$this->request->data;

		  

		  /*$titles=implode('|',$data['data']['credentials']);

		  $data['data']['title']=$titles;
		  if(isset($data['data']['use_credentials'])){
          $data['data']['use_credentials']=1;
		  }else{
		  $data['data']['use_credentials']=0;  
			  }*/
          $titles=$data['data']['credentials'];
		  $saveData=$data['data'];
		  
		  //print_r($saveData);die;
          if($saveData['entry_type']=="individual"){
			 $f_name=$saveData['first_name1'];
			 $l_name=$saveData['last_name1'];
			 $org=$saveData['organization1'];
			 }else{
			 $f_name=$saveData['first_name2']; 
			 $l_name=$saveData['last_name2'];
			 $org=$saveData['organization2'];
				 }
		  //$result = $this->AsConnections->patchEntity($result, $saveData);
          if(isset($saveData['use_credentials']) && $saveData['use_credentials'] != ""){$use_credentials=1;}else{$use_credentials=0;}  
	  $query = $this->AsConnections->query();

      $query->update()
	  ->set(['entry_type'=>$saveData['entry_type'],
	  'visibility'=>'public',
	  'first_name'=>$f_name,
	  'last_name'=>$l_name,
	  'organization'=>$org,
      'contact_first_name'=>$f_name,
	  'contact_last_name'=>$l_name,
	  'title'=>$titles,
	  'use_credentials'=> $use_credentials
	   ])
	  ->where(['id' => $id])

	  ->execute();
            

		  //$this->AsConnections->save($result);

		  $this->Flash->success(__('Details Updated Successfully.'));

		   return $this->redirect(['controller' => 'Admin', 'action' => 'edituser2/'.$id]);

		 }

	 	

	}

	

	/*--------------------------------------------------- Edit user step2 -----------------------------------------*/

	

	 public function edituser2($id=null)

    {   

	    

		$this->loadModel('AsConnections');

		$this->loadModel('AsConnectionsAddresses');

		$this->loadModel('AsConnectionsPhones');

		$this->loadModel('AsConnectionsEmails');

        $this->loadModel('AsConnectionsMetas');
		

	    $asConnection = $this->AsConnections->get($id,['contain' => ['AsConnectionsAddresses','AsConnectionsPhones','AsConnectionsEmails','AsConnectionsMetas']]);

	

	$this->viewBuilder()->setLayout("admin");

	$this->set(compact('asConnection'));

	

	if($this->request->is('post')){

		  $data=$this->request->data;

		  $postData=$data['data'];

		  //print_r($postData['new_email']);die;

		   $add="";

		   

      //print_r($postData['as_connections_addresses']);die();
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

	  $this->Flash->success(__('Details Updated Successfully.'));

	    return $this->redirect(['controller' => 'Admin', 'action' => 'edituser3/'.$id]);

		 }

	 	

	}

	

	/*---------------------------------------------- Edit user step3 ----------------------------------------- */

	

	 public function edituser3($id=null)

    {   

	    

		$this->viewBuilder()->setLayout("admin");

		$this->loadModel('AsConnections');

		$this->loadModel('Socialnets');

		$this->loadModel('AsConnectionsSocials');

		$this->loadModel('AsConnectionsLinks');

		$this->loadModel('AsConnectionsMetas');

	    $asConnection = $this->AsConnections->get($id,['contain' => ['AsConnectionsSocials','AsConnectionsLinks','AsConnectionsMetas']]);

		$this->loadModel('LanguageOptions');

		$languages=$this->LanguageOptions->find('all',array('conditions'=>array('status'=>'a'),'order' => array('name' => 'ASC')))->toArray();

		/* Set Data For View */

	    $this->set(compact('asConnection','languages'));

		

		

		/* Post Request */

		

	 	if($this->request->is('post')){

		  $data=$this->request->data;

		  $postData=$data['data'];

		  //print_r($postData);die;

		/* Upload Logo File */

		//print_r($_FILES);die;

		 if(!empty($_FILES) and $_FILES['logo']['error']==0)

        { 

		

        $imgName=pathinfo($_FILES['logo']['name']);

        $ext = $imgName['extension'];

        $newImgName = rand(10,100000);

        $tempFile = $_FILES['logo']['tmp_name'];

        

        //$destination = realpath('../webroot/img/logodirectry').'/';

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

			  

              }  

 /* Update Social Links */

	   $this->AsConnectionsSocials->deleteAll(['entry_id' => $id]);
	  for($i=1; $i<=$postData['totalSocials'];$i++) {

	  
		if(isset($postData['as_connections_socials']['url'.$i]) && $postData['as_connections_socials']['url'.$i]!=""){
			if (strpos($postData['as_connections_socials']['url'.$i], 'http://') !== false || strpos($postData['as_connections_socials']['url'.$i], 'https://') !== false)
		{
			$scurl = $postData['as_connections_socials']['url'.$i];
		}else
		{
			$scurl = 'http://'.$postData['as_connections_socials']['url'.$i];;
		}
		$Newquery = $this->AsConnectionsSocials->query();

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
	  

	  if(isset($postData['new_links']) AND ! empty($postData['new_links'])){

	  $total_links=(count($postData['new_links']['url'])-1);

	  for($l=0;$l<=$total_links;$l++){

	  $Newquery2 = $this->AsConnectionsLinks->query();

      $Newquery2->insert(['entry_id','url'])

      ->values([

	    'entry_id' => $id,

        'url' => $postData['new_links']['url'][$l],

		'title'=> $postData['new_links']['url'][$l],

		'type'=>'website'

        

      ])

      ->execute();

	  }

		  }

	  /* Update Personal details and other */

	  
	  
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

	 $this->Flash->success(__('Details Updated Successfully.'));

	 return $this->redirect(['controller' => 'Admin', 'action' => 'edituser4/'.$id]);

		}

		 

	}

	

	/*---------------------------------------------- Edit user step4--------------------------------------------*/

	

	 public function edituser4($id=null)

    {   
    	$this->loadModel('AsConnections');

		$this->loadModel('AsConnectionsMetas');

		$this->loadModel('ConnectionCredentials');
	    //$id=59;
	    $con_metas = TableRegistry::get('as_connections_metas');
	    $record = $con_metas->find()->select(['practice','practice_year'])->where(['entry_id' => $id])->first();
	   
	 	if($record)
		{
			$plus_year = date('Y') - $record->practice_year;		
			
			$practice = $record->practice+$plus_year;
			$query = $this->AsConnectionsMetas->query();
		    $query->update()->set(['practice'=>$practice,'practice_year' => date('Y')])
		    ->where(['entry_id' => $id])
		    ->execute();
		}

		$this->viewBuilder()->setLayout("admin");

		

		$asConnection = $this->AsConnections->get($id,['contain' => ['AsConnectionsMetas','ConnectionCredentials']]);

		//$this->loadModel('Professionals');

		//$professionals=$this->Professionals->find('all',array('conditions'=>array('status'=>'a')));

		$this->loadModel('Therapists');

		$therapists=$this->Therapists->find('all',['order' => ['name' => 'ASC']],array('conditions'=>array('status'=>'a')));
		$organizer_type = TableRegistry::get('organizer_type');
	  $org_type = $organizer_type->find('all', array('order'=>array('name'=>'asc')));
	    

	    $this->set(compact('asConnection', 'therapists', 'org_type'));

		

		/* Post Request */

		

	 	if($this->request->is('post')){

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

		  

	      $this->Flash->success(__('Details Updated Successfully.'));

		   return $this->redirect(['controller' => 'Admin', 'action' => 'edituser5/'.$id]);

		  

		  }

	 	

	}

	

	

	/*------------------------------------------------- Edit user step5 ---------------------------------------*/

	

	 public function edituser5($id=null)

    {   

	    

		$this->loadModel('AsConnections');

		$this->loadModel('AsConnectionsMetas');

	    $asConnection = $this->AsConnections->get($id,['contain' => ['AsConnectionsMetas']]);

		$this->loadModel('Issues');

		$issues=$this->Issues->find('all',['order' => ['name' => 'ASC']],array('conditions'=>array('status'=>'a')));

        $this->loadModel('Modalities');

		$modalities=$this->Modalities->find('all',['order' => ['name' => 'ASC']],array('conditions'=>array('status'=>'a')));

        $this->loadModel('MentalHealths');

		$mentalhealths=$this->MentalHealths->find('all',['order' => ['name' => 'ASC']],array('conditions'=>array('status'=>'a')));

        $this->loadModel('Ages');

		$ages=$this->Ages->find('all',['order' => ['name' => 'ASC']],array('conditions'=>array('status'=>'a')));

        $this->loadModel('Payments');

		$payments=$this->Payments->find('all',['order' => ['name' => 'ASC']],array('conditions'=>array('status'=>'a')));

   	    $this->loadModel('SessionCosts');

		$sessioncosts=$this->SessionCosts->find('all',['order' => ['name' => 'ASC']],array('conditions'=>array('status'=>'a')));

        $this->loadModel('InsuranceProviders');

		$insuranceproviders=$this->InsuranceProviders->find('all',['order' => ['name' => 'ASC']],array('conditions'=>array('status'=>'a')));

        $this->loadModel('Treatments');

		$treatments=$this->Treatments->find('all',['order' => ['name' => 'ASC']],array('conditions'=>array('status'=>'a')));

		

	$this->viewBuilder()->setLayout("admin");

	$this->set(compact('asConnection','issues','modalities','mentalhealths','ages','payments','sessioncosts','insuranceproviders','treatments'));

	

	    /* Post Request */

		

	 	if($this->request->is('post')){

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
            //print_r($postData['as_connections_meta']['age']);die;
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
		if(isset($postData['as_connections_meta']['triad']) && $postData['as_connections_meta']['triad']!=""){
		  $program_status=$postData['as_connections_meta']['triad'];
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

		  

	      $this->Flash->success(__('Details Updated Successfully.'));

		  return $this->redirect(['controller' => 'Admin', 'action' => 'edituser5/'.$id]);

		}

	 	

	}

	
	/*----------------------------------------- Approve user step1 ------------------------------------------------*/

	

	 public function step1($id)

    {

	$this->loadModel('AsConnections');
    $this->loadModel('AsConnectionsEdits');
	
	$result = $this->AsConnections->get($id);

	$this->viewBuilder()->setLayout("admin");

	$entry_id=$result['id'];

	$this->set(compact('result','entry_id'));

	 if($this->request->is('post')){

		  //$data=$this->request->data;
          $query5 = $this->AsConnectionsEdits->query(); 
          $query5->delete()->where(['entry_id' => $id,'step' => 'step1'])->execute();

          $this->loadModel('Users');
          $usr_deail=$this->Users->get($result->owner);               
          $template_name = 'provider-profile-edits-approved-provider';
          $emailAdmin = $usr_deail->user_email; 
          $AdminName  = $usr_deail->display_name;
          $vars = array(                    
                    array(
                      'name'=>'NAME',
                      'content'=>$usr_deail->display_name
                    ),                    
                  );
          $subject = 'Profile Edits Approved';
		  $from_email = 'info@aspenstrong.org';
          $this->sendMail($template_name,$from_email,'Aspen Strong Directory',$emailAdmin,$AdminName,$vars,$subject);
          
		  $this->Flash->success(__('Record Approved Successfully.'));

		   return $this->redirect(['controller' => 'Admin', 'action' => 'edituserslist/']);

		 }

	 	

	}

	

	/*--------------------------------------------------- Approve user step2 -----------------------------------------*/

	

	 public function step2($id=null)

    {   

	    

		$this->loadModel('AsConnections');

		$this->loadModel('AsConnectionsAddresses');

		$this->loadModel('AsConnectionsPhones');

		$this->loadModel('AsConnectionsEmails');

        $this->loadModel('AsConnectionsMetas');
		
		$this->loadModel('AsConnectionsEdits');

	    $asConnection = $this->AsConnections->get($id,['contain' => ['AsConnectionsAddresses','AsConnectionsPhones','AsConnectionsEmails','AsConnectionsMetas']]);

	

	$this->viewBuilder()->setLayout("admin");

	$this->set(compact('asConnection'));

	

	if($this->request->is('post')){

		  $data=$this->request->data;

		  $query5 = $this->AsConnectionsEdits->query(); 
          $query5->delete()->where(['entry_id' => $id,'step' => 'step2'])->execute();

          $this->loadModel('Users');
          $usr_deail=$this->Users->get($asConnection->owner);               
          $template_name = 'provider-profile-edits-approved-provider';
          $emailAdmin = $usr_deail->user_email; 
          $AdminName  = $usr_deail->display_name;
          $vars = array(                    
                    array(
                      'name'=>'NAME',
                      'content'=>$usr_deail->display_name
                    ),                    
                  );
          $subject = 'Profile Edits Approved';
		  $from_email = 'info@aspenstrong.org';
          $this->sendMail($template_name,$from_email,'Aspen Strong Directory',$emailAdmin,$AdminName,$vars,$subject);
          
        $this->Flash->success(__('Record Approved Successfully.'));

	     return $this->redirect(['controller' => 'Admin', 'action' => 'edituserslist/']);

		 }

	 	

	}

	

	/*---------------------------------------------- Approve user step3 ----------------------------------------- */

	

	 public function step3($id=null)

    {   

	    

		$this->viewBuilder()->setLayout("admin");

		$this->loadModel('AsConnections');

		$this->loadModel('Socialnets');

		$this->loadModel('AsConnectionsSocials');

		$this->loadModel('AsConnectionsLinks');

		$this->loadModel('AsConnectionsMetas');
		
		$this->loadModel('AsConnectionsEdits');

	    $asConnection = $this->AsConnections->get($id,['contain' => ['AsConnectionsSocials','AsConnectionsLinks','AsConnectionsMetas']]);

		

		/* Set Data For View */

	    $this->set(compact('asConnection'));

		

		

		/* Post Request */

		

	 	if($this->request->is('post')){

		  $data=$this->request->data;

		   $query5 = $this->AsConnectionsEdits->query(); 
          $query5->delete()->where(['entry_id' => $id,'step' => 'step3'])->execute();

          $this->loadModel('Users');
          $usr_deail=$this->Users->get($asConnection->owner);               
          $template_name = 'provider-profile-edits-approved-provider';
          $emailAdmin = $usr_deail->user_email; 
          $AdminName  = $usr_deail->display_name;
          $vars = array(                    
                    array(
                      'name'=>'NAME',
                      'content'=>$usr_deail->display_name
                    ),                    
                  );
          $subject = 'Profile Edits Approved';
		  $from_email = 'info@aspenstrong.org';
          $this->sendMail($template_name,$from_email,'Aspen Strong Directory',$emailAdmin,$AdminName,$vars,$subject);
          
		  $this->Flash->success(__('Record Approved Successfully.'));

		   return $this->redirect(['controller' => 'Admin', 'action' => 'edituserslist/']);


		}

		 

	}

	

	/*---------------------------------------------- Approve user step4--------------------------------------------*/

	

	 public function step4($id=null)

    {   
		$this->loadModel('AsConnectionsMetas');
	    //$id=59;
	    $con_metas = TableRegistry::get('as_connections_metas');
	    $record = $con_metas->find()->select(['practice','practice_year'])->where(['entry_id' => $id])->first();
	   
	 	if($record)
		{
			$plus_year = date('Y') - date('Y', strtotime($record->practice_year));		
			
			$practice = $record->practice+$plus_year;
			$query = $this->AsConnectionsMetas->query();
		    $query->update()->set(['practice'=>$practice,'practice_year' => date('Y')])
		    ->where(['entry_id' => $id])
		    ->execute();
		}

		$this->viewBuilder()->setLayout("admin");

		$this->loadModel('AsConnections');

		$this->loadModel('AsConnectionsMetas');

		$this->loadModel('ConnectionCredentials');
		
		$this->loadModel('AsConnectionsEdits');

		$asConnection = $this->AsConnections->get($id,['contain' => ['AsConnectionsMetas','ConnectionCredentials']]);

		//$this->loadModel('Professionals');

		//$professionals=$this->Professionals->find('all',array('conditions'=>array('status'=>'a')));

		$this->loadModel('Therapists');

		$therapists=$this->Therapists->find('all',array('conditions'=>array('status'=>'a')));

	    $organizer_type = TableRegistry::get('organizer_type');
	  	$org_type = $organizer_type->find('all', array('order'=>array('name'=>'asc')));

	    $this->set(compact('asConnection','therapists', 'org_type'));

		

		/* Post Request */

		

	 	if($this->request->is('post')){

		  $data=$this->request->data;

		  $query5 = $this->AsConnectionsEdits->query(); 
          $query5->delete()->where(['entry_id' => $id,'step' => 'step4'])->execute();

          $this->loadModel('Users');
          $usr_deail=$this->Users->get($asConnection->owner);               
          $template_name = 'provider-profile-edits-approved-provider';
          $emailAdmin = $usr_deail->user_email; 
          $AdminName  = $usr_deail->display_name;
          $vars = array(                    
                    array(
                      'name'=>'NAME',
                      'content'=>$usr_deail->display_name
                    ),                    
                  );
          $subject = 'Profile Edits Approved';
		  $from_email = 'info@aspenstrong.org';
          $this->sendMail($template_name,$from_email,'Aspen Strong Directory',$emailAdmin,$AdminName,$vars,$subject);
          
		  $this->Flash->success(__('Record Approved Successfully.'));

		   return $this->redirect(['controller' => 'Admin', 'action' => 'edituserslist/']);


		  

		  }

	 	

	}

	

	

	/*------------------------------------------------- Approve user step5 ---------------------------------------*/

	

	 public function step5($id=null)

    {   

	    

		$this->loadModel('AsConnections');

		$this->loadModel('AsConnectionsMetas');
		
		$this->loadModel('AsConnectionsEdits');

	    $asConnection = $this->AsConnections->get($id,['contain' => ['AsConnectionsMetas']]);

		$this->loadModel('Issues');

		$issues=$this->Issues->find('all',array('conditions'=>array('status'=>'a')));

        $this->loadModel('Modalities');

		$modalities=$this->Modalities->find('all',array('conditions'=>array('status'=>'a')));

        $this->loadModel('MentalHealths');

		$mentalhealths=$this->MentalHealths->find('all',array('conditions'=>array('status'=>'a')));

        $this->loadModel('Ages');

		$ages=$this->Ages->find('all',array('conditions'=>array('status'=>'a')));

        $this->loadModel('Payments');

		$payments=$this->Payments->find('all',array('conditions'=>array('status'=>'a')));

   	    $this->loadModel('SessionCosts');

		$sessioncosts=$this->SessionCosts->find('all',array('conditions'=>array('status'=>'a')));

        $this->loadModel('InsuranceProviders');

		$insuranceproviders=$this->InsuranceProviders->find('all',array('conditions'=>array('status'=>'a')));

        $this->loadModel('Treatments');

		$treatments=$this->Treatments->find('all',array('conditions'=>array('status'=>'a')));

		

	$this->viewBuilder()->setLayout("admin");

	$this->set(compact('asConnection','issues','modalities','mentalhealths','ages','payments','sessioncosts','insuranceproviders','treatments'));

	

	    /* Post Request */

		

	 	if($this->request->is('post')){

		  $data=$this->request->data;

		  $query5 = $this->AsConnectionsEdits->query(); 
          $query5->delete()->where(['entry_id' => $id,'step' => 'step5'])->execute();
          
          $this->loadModel('AsConnections');		
	      $asConnection = $this->AsConnections->get($id);
	      
          $this->loadModel('Users');
          $usr_deail=$this->Users->get($asConnection->owner);               
          $template_name = 'provider-profile-edits-approved-provider';
          $emailAdmin = $usr_deail->user_email; 
          $AdminName  = $usr_deail->display_name;
          $vars = array(                    
                    array(
                      'name'=>'NAME',
                      'content'=>$usr_deail->display_name
                    ),                    
                  );
          $subject = 'Profile Edits Approved';
		  $from_email = 'info@aspenstrong.org';
          $this->sendMail($template_name,$from_email,'Aspen Strong Directory',$emailAdmin,$AdminName,$vars,$subject);

		  $this->Flash->success(__('Record Approved Successfully.'));

		   return $this->redirect(['controller' => 'Admin', 'action' => 'edituserslist/']);

		}

	 	

	}

	

	/* Admin update Info */

	

	public function changeStatusAjax($type=null,$status=null, $id=null,$req_stat=NULL)

    {

      //echo $type.$status.$id.$req_stat;die;

     // $read = $this->Session->read('start_users');

      //echo $read;die; 

      $this->loadModel('AsConnections');

      $this->loadModel('Users');

      //$id = convert_uudecode(base64_decode($id));

      if(isset($type) && isset($status) && isset($id))

      {

        if($type == "verified")

        {

          $query = $this->AsConnections->query();  

	      $query->update()

	      ->set(['verified_status'=>$status])

		  ->where(['id' => $id])

	      ->execute();

      

        }

        else if($type == "program")

        {

          $query = $this->AsConnections->query();  

	      $query->update()

	      ->set(['program_status'=>$status])

		  ->where(['id' => $id])

	      ->execute();

        }

        else if($type == "health")

        {

          $query = $this->AsConnections->query();  

	      $query->update()

	      ->set(['health_fund_status'=>$status])

		  ->where(['id' => $id])

	      ->execute();

        }

        else if($type == "display")

        {

          $query = $this->AsConnections->query();  

	      $query->update()

	      ->set(['status'=>$status])

		  ->where(['id' => $id])

	      ->execute();
	     
	      if($status=='approved')
	      {
		      $this->loadModel('Users');
		      $AsConnectionsdd=$this->AsConnections->get($id);
	          $usr_deail=$this->Users->get($AsConnectionsdd->owner); 
	                      
	          $template_name = 'profile-approved-provider';
	          $emailAdmin = $usr_deail->user_email;
	          $AdminName  = $usr_deail->display_name;
	          $vars = array(                    
	                    array(
	                      'name'=>'NAME',
	                      'content'=>$usr_deail->display_name
	                    ),                    
	                  );
	          $subject = 'Your Profile Approved';
			  $from_email = 'info@aspenstrong.org';
	          $this->sendMail($template_name,$from_email,'Aspen Strong Directory',$emailAdmin,$AdminName,$vars,$subject);
	      }

        }

        if($type == "emailverified")

        {

          $query = $this->Users->query();  

	      $query->update()

	      ->set(['user_status'=>$status])

		  ->where(['id' => $id])

	      ->execute();

      

        }

		  $chng_status=$req_stat;

        //$this->Session->write('new_session',$read);

        echo 1;

        //$this->Flash->success('You have changed status succesfully' );

        //$this->redirect($this->referer()); 



      }

      else

      {

      		echo 2;

       	// $this->Flash->error('Some errors have been occured');

        //$this->redirect($this->referer());

      }

      

      die;

    }

	

	/* Change Password */

	

	function savepassword(){

				

		//$this->layout="admin";

		$data = $_POST['data'];

		//echo print_r($data);die;

		if(!empty($data)){

		$this->loadModel('Users');

		$id=$data['user']['id']; 

		//$this->User->updateAll(array('User.user_pass'=>'"'.md5($data['user']['password']).'"'),array('User.ID'=>$id));

		$query = $this->Users->query();  

	    $query->update()

	    ->set(['user_pass'=>md5($data['user']['password'])])

		->where(['id' => $id])

	    ->execute();

		

		

        /*$user= $this->User->find('first',array('conditions'=>array('User.ID'=>$id),'fields'=>array('User.ID','User.user_email','User.display_name','User.user_pass')));

  	    $sender_name = $user['User']['display_name'];

        $vars = array(

                array(

                    'name' => 'name',

                    'content' => $sender_name,

                ),

                array(

                    'name' => 'password',

                    'content' => $data['user']['password']

                )

            );

            $sender_email = $user['User']['user_email'];

            $this->loadModel('EmailTemplates');

            $mailchimp=$this->EmailTemplates->find('first',array('conditions'=>array('EmailTemplates.alias'=>'changed_password_user'),'fields'=>array('EmailTemplates.mailchimp_template')));

              if(!empty($mailchimp))

              {

                $template_name=$mailchimp['EmailTemplates']['mailchimp_template'];

              }

            $from_email = 'Aspen Strong Directory';

            $subject = 'Admin Message';

            $this->sendMail($template_name,$from_email,'',$sender_email,$sender_name,$vars,$subject);*/

                echo 1;

				}else{

					echo 2;	

				}

				

				die;

		}

	

	

	/* Delete User */

	

	function deleteUser($id=null , $action = Null){

    //$id = convert_uudecode(base64_decode($id));

    //$this->loadModel('AsConnections');

    $this->loadModel('Users');

    /*$this->loadModel('AsConnectionsPhones');

    $this->loadModel('AsConnectionsEmails');

    $this->loadModel('AsConnectionsSocials');

    $this->loadModel('AsConnectionsAddresses');

    $this->loadModel('AsConnectionsMetas');

    $this->loadModel('ConnectionCredentials');

    $this->loadModel('AsConnectionsLinks');

    $this->loadModel('ViewUserLogs');*/

  

   /*$query = $this->Users->query(); 

   $query->delete()

    ->where(['ID' => $id])

    ->execute();*/
	
	if($action == 'unvarify') {
		  $query = $this->Users->query(); 

   $query->delete()

    ->where(['ID' => $id])

    ->execute();
	}
 $this->loadModel('AsConnections');
$this->loadModel('AsConnectionsEdits');
$Newquery = $this->AsConnections->query();
$Newquery->update()
      ->set(['status' => 'approved','close_status' => 'deleted' ])
      ->where(['owner' => $id])
      ->execute();

$Newquery = $this->Users->query();
$Newquery->update()
      ->set(['user_status' => 0,'reason' =>  'By Admin'  ])
      ->where(['ID' => $id])
      ->execute();
	//}

/*   if(!empty($id) && !empty($asID)) {

	   

   $query1 = $this->AsConnections->query(); 

   $query1->delete()->where(['id' => $asID])->execute();

   

   $query2 = $this->AsConnectionsPhones->query(); 

   $query2->delete()->where(['entry_id' => $asID])->execute();

   

   $query3 = $this->AsConnectionsEmails->query(); 

   $query3->delete()->where(['entry_id' => $asID])->execute();

   

   $query4 = $this->AsConnectionsSocials->query(); 

   $query4->delete()->where(['entry_id' => $asID])->execute();

   

   $query5 = $this->AsConnectionsLinks->query(); 

   $query5->delete()->where(['entry_id' => $asID])->execute();

   

   $query6 = $this->AsConnectionsAddresses->query(); 

   $query6->delete()->where(['entry_id' => $asID])->execute();

   

   $query7 = $this->AsConnectionsMetas->query(); 

   $query7->delete()->where(['entry_id' => $asID])->execute();

   

   $query8 = $this->ConnectionCredential->query(); 

   $query8->delete()->where(['entry_id' => $asID])->execute();

   

   $query9 = $this->ViewUserLog->query(); 

   $query9->delete()->where(['connection_id' => $asID])->execute();

   

}*/

        $this->Flash->success('You have deleted user successfully' );
		if(!empty($action)){	
		    return $this->redirect(array('action'=>'userslist','vars' => $action,'admin'=>true));
		}
        return $this->redirect(array('action'=>'userslist','admin'=>true));

   

  }
function activateUser($id=null){

$this->loadModel('AsConnections');
$this->loadModel('AsConnectionsEdits');
$Newquery = $this->AsConnections->query();
$Newquery->update()
      ->set(['status' => 'approved','close_status' => 'activated' ])
      ->where(['owner' => $id])
      ->execute();
      	$this->loadModel('Users');
         $usr_deail=$this->Users->get($id); 
         print_r($usr_deail);
         die('dsk');              
          $template_name = 'profile-approved-provider';
          $emailAdmin = $usr_deail->user_email; 
          $AdminName  = $usr_deail->display_name;
          $vars = array(                    
                    array(
                      'name'=>'NAME',
                      'content'=>$usr_deail->display_name
                    ),                    
                  );
          //$withAdmin = array($data['User']['display_name'],$data['User']['user_email'],$AdminName);
          $subject = 'Your Profile Approved';
		  $from_email = 'info@aspenstrong.org';
          $this->sendMail($template_name,$from_email,'Aspen Strong Directory',$emailAdmin,$AdminName,$vars,$subject); 
        $this->Flash->success('You have activated user successfully' );

        return $this->redirect(array('action'=>'userslist','admin'=>true));

   

  }
  
  
  /*Treatment options*/
  
   function treatment(){
     $this->viewBuilder()->setLayout("admin");
     $this->loadModel('Treatments');
     $results=$this->Treatments->find('all', array('order'=>array('name'=>'asc')));
	 $module="Treatments";
	 $heading="Treatment";
	 $name="treatment";
	 $topname='treatment';
	 $this->set(compact('results','module','heading','name','topname'));
   }
   
    function addTreatment(){
     $this->viewBuilder()->setLayout("admin");
     $this->loadModel('Treatments');
	 $module="Treatment";
	 $this->set(compact('module'));
     if($this->request->is('post')){
     $data=$_POST['data'];
	 $Newquery = $this->Treatments->query();

      $Newquery->insert(['name','status', 'name_spanish'])

      ->values([

	    'name' => $data['name'],

        'status' => $data['status'],

        'name_spanish' => $data['name_spanish'],

		])

      ->execute();
     //$this->Treatment->save($data);
     $this->Flash->success('You have successfully updated the data');
     return $this->redirect(array('action'=>'treatment','admin'=>true));
     }}
	 
    function editTreatment($en_id=null){
     $id=$en_id;
	 $this->viewBuilder()->setLayout("admin");
     $this->loadModel('Treatments');
     $result= $this->Treatments->get($id);
	 //print_r($result);die;
	 $module="Treatment";
     $this->set(compact('result','module'));
     if($this->request->is('post')){
     $data=$_POST['data'];
	 $dataSave['status']=$data['status'];
	 $dataSave['name']=$data['name'];
	 $dataSave['name_spanish']=$data['name_spanish'];
	 //print_r($data);die;
	 $result = $this->Treatments->patchEntity($result, $dataSave);
     $this->Treatments->save($result);
     $this->Flash->success('You have successfully updated the data');
     return $this->redirect(array('action'=>'treatment'));
    }
    
    }
	
    function deleteTreatment($en_id=null){
     $id=$en_id;  
     $this->viewBuilder()->setLayout("admin");
     $this->loadModel('Treatments');
     $query5 = $this->Treatments->query(); 
     $query5->delete()->where(['id' => $id])->execute();
     $this->Flash->success('You have successfully deleted the record');
     return $this->redirect(array('action'=>'treatment','admin'=>true));
    }
	
	
	
	/*Ages options*/
  
   function ages(){
     $this->viewBuilder()->setLayout("admin");
     $this->loadModel('Ages');
     $results=$this->Ages->find('all', array('order'=>array('name'=>'asc')));
	 $module="Age Groups";
	 $heading="Age Group";
	 $name="age";
	 $topname='age';
	 $this->set(compact('results','module','heading','name','topname'));
	 $this -> render('treatment');
   }
   
    function addAge(){
     $this->viewBuilder()->setLayout("admin");
     $this->loadModel('Ages');
	 $module="Age Group";
	 $this->set(compact('module'));
     if($this->request->is('post')){
     $data=$_POST['data'];
	 $Newquery = $this->Ages->query();

      $Newquery->insert(['name','status', 'name_spanish'])

      ->values([

	    'name' => $data['name'],

        'status' => $data['status'],

        'name_spanish' => $data['name_spanish'],

		])

      ->execute();
     //$this->Treatment->save($data);
     $this->Flash->success('You have successfully updated the data');
     return $this->redirect(array('action'=>'ages','admin'=>true));
     }
	 $this ->render('add_treatment');
	 }
	 
    function editAge($en_id=null){
     $id=$en_id;
	 $this->viewBuilder()->setLayout("admin");
     $this->loadModel('Ages');
     $result= $this->Ages->get($id);
	 $module="Age Group";
	 //print_r($result);die;
     $this->set(compact('result','module'));
     if($this->request->is('post')){
     $data=$_POST['data'];
	 $dataSave['status']=$data['status'];
	 $dataSave['name']=$data['name'];
	 $dataSave['name_spanish']=$data['name_spanish'];
	 //print_r($data);die;
	 $result = $this->Ages->patchEntity($result, $dataSave);
     $this->Ages->save($result);
     $this->Flash->success('You have successfully updated the data');
     return $this->redirect(array('action'=>'ages'));
    }
	$this ->render('edit_treatment');
    
    }
	
    function deleteAge($en_id=null){
     $id=$en_id;  
     $this->viewBuilder()->setLayout("admin");
     $this->loadModel('Ages');
     $query5 = $this->Ages->query(); 
     $query5->delete()->where(['id' => $id])->execute();
     $this->Flash->success('You have successfully deleted the record');
     return $this->redirect(array('action'=>'treatment','admin'=>true));
    }
	
	
	
   /*Issues options*/
  
   function issues(){
     $this->viewBuilder()->setLayout("admin");
     $this->loadModel('Issues');
     $results=$this->Issues->find('all', array('order'=>array('name'=>'asc')));
	 $module="Issues";
	 $heading="Issue";
	 $name="issue";
	 $topname='issue';
	 $this->set(compact('results','module','heading','name','topname'));
	 $this -> render('treatment');
   }
   
    function addIssue(){
     $this->viewBuilder()->setLayout("admin");
     $this->loadModel('Issues');
	 $module="Issue";
	 $this->set(compact('module'));
     if($this->request->is('post')){
     $data=$_POST['data'];
	 $Newquery = $this->Issues->query();

      $Newquery->insert(['name','status', 'name_spanish'])

      ->values([

	    'name' => $data['name'],

        'status' => $data['status'],

        'name_spanish' => $data['name_spanish'],

		])

      ->execute();
     //$this->Treatment->save($data);
     $this->Flash->success('You have successfully updated the data');
     return $this->redirect(array('action'=>'issues','admin'=>true));
     }
	 $this ->render('add_treatment');
	 }
	 
    function editIssue($en_id=null){
     $id=$en_id;
	 $this->viewBuilder()->setLayout("admin");
     $this->loadModel('Issues');
     $result= $this->Issues->get($id);
	 $module="Issue";
	 //print_r($result);die;
     $this->set(compact('result','module'));
     if($this->request->is('post')){
     $data=$_POST['data'];
	 $dataSave['status']=$data['status'];
	 $dataSave['name']=$data['name'];
	 $dataSave['name_spanish']=$data['name_spanish'];
	 //print_r($data);die;
	 $result = $this->Issues->patchEntity($result, $dataSave);
     $this->Issues->save($result);
     $this->Flash->success('You have successfully updated the data');
     return $this->redirect(array('action'=>'issues'));
    }
	$this ->render('edit_treatment');
    
    }
	
    function deleteIssue($en_id=null){
     $id=$en_id;  
     $this->viewBuilder()->setLayout("admin");
     $this->loadModel('Issues');
     $query5 = $this->Issues->query(); 
     $query5->delete()->where(['id' => $id])->execute();
     $this->Flash->success('You have successfully deleted the record');
     return $this->redirect(array('action'=>'issues','admin'=>true));
    }
	
	
	/*Modalities Options*/

    function modalities(){
     $this->viewBuilder()->setLayout("admin");
     $this->loadModel('Modalities');
	 $results=$this->Modalities->find('all', array('order'=>array('name'=>'asc')));
	 $module="Modalities";
	 $heading="Modality";
	 $name="modality";
	 $topname='modality';
	 $this->set(compact('results','module','heading','name','topname'));
	 $this -> render('treatment');
   }
   
    function addModality(){
     $this->viewBuilder()->setLayout("admin");
     $this->loadModel('Modalities');
	 $module="Modalities";
	 $this->set(compact('module'));
     if($this->request->is('post')){
     $data=$_POST['data'];
	 $Newquery = $this->Modalities->query();

      $Newquery->insert(['name','status', 'name_spanish'])

      ->values([

	    'name' => $data['name'],

        'status' => $data['status'],

        'name_spanish' => $data['name_spanish'],

		])

      ->execute();
     //$this->Treatment->save($data);
     $this->Flash->success('You have successfully updated the data');
     return $this->redirect(array('action'=>'modalities','admin'=>true));
     }
	 $this ->render('add_treatment');
	 }
	 
    function editModality($en_id=null){
     $id=$en_id;
	 $this->viewBuilder()->setLayout("admin");
     $this->loadModel('Modalities');
     $result= $this->Modalities->get($id);
	 $module="Modality";
	 //print_r($result);die;
     $this->set(compact('result','module'));
     if($this->request->is('post')){
     $data=$_POST['data'];
	 $dataSave['status']=$data['status'];
	 $dataSave['name']=$data['name'];
	 $dataSave['name_spanish']=$data['name_spanish'];
	 //print_r($data);die;
	 $result = $this->Modalities->patchEntity($result, $dataSave);
     $this->Modalities->save($result);
     $this->Flash->success('You have successfully updated the data');
     return $this->redirect(array('action'=>'modalities'));
    }
	$this ->render('edit_treatment');
    
    }
	
    function deleteModality($en_id=null){
     $id=$en_id;  
     $this->viewBuilder()->setLayout("admin");
     $this->loadModel('Modalities');
     $query5 = $this->Modalities->query(); 
     $query5->delete()->where(['id' => $id])->execute();
     $this->Flash->success('You have successfully deleted the record');
     return $this->redirect(array('action'=>'modalities','admin'=>true));
    }
	
	/* Insureance Providers */
	
	

    function insuranceProviders(){
     $this->viewBuilder()->setLayout("admin");
     $this->loadModel('InsuranceProviders');
	 $results=$this->InsuranceProviders->find('all', array('order'=>array('name'=>'asc')));
	 $module="Insurance Providers";
	 $heading="Insurance Provider";
	 $name="insuranceprovider";
	  $topname='insurance provider';
	 $this->set(compact('results','module','heading','name','topname'));
	 $this -> render('treatment');
   }
   
    function addInsuranceprovider(){
     $this->viewBuilder()->setLayout("admin");
     $this->loadModel('InsuranceProviders');
	 $module="Insurance Providers";
	 $this->set(compact('module'));
     if($this->request->is('post')){
     $data=$_POST['data'];
	 $Newquery = $this->InsuranceProviders->query();

      $Newquery->insert(['name','status', 'name_spanish'])

      ->values([

	    'name' => $data['name'],

        'status' => $data['status'],

        'name_spanish' => $data['name_spanish'],

		])

      ->execute();
     //$this->Treatment->save($data);
     $this->Flash->success('You have successfully updated the data');
     return $this->redirect(array('action'=>'insuranceProviders'));
     }
	 $this ->render('add_treatment');
	 }

	 
    function editInsuranceprovider($en_id=null){
     $id=$en_id;
	 $this->viewBuilder()->setLayout("admin");
     $this->loadModel('InsuranceProviders');
     $result= $this->InsuranceProviders->get($id);
	 $module="Insurance Provider";
	 //print_r($result);die;
     $this->set(compact('result','module'));
     if($this->request->is('post')){
     $data=$_POST['data'];
	 $dataSave['status']=$data['status'];
	 $dataSave['name']=$data['name'];
	 $dataSave['name_spanish']=$data['name_spanish'];
	 //print_r($data);die;
	 $result = $this->InsuranceProviders->patchEntity($result, $dataSave);
     $this->InsuranceProviders->save($result);
     $this->Flash->success('You have successfully updated the data');
     return $this->redirect(array('action'=>'insuranceProviders'));
    }
	$this ->render('edit_treatment');
    
    }
	
    function deleteInsuranceprovider($en_id=null){
     $id=$en_id;  
     $this->viewBuilder()->setLayout("admin");
     $this->loadModel('InsuranceProviders');
     $query5 = $this->InsuranceProviders->query(); 
     $query5->delete()->where(['id' => $id])->execute();
     $this->Flash->success('You have successfully deleted the record');
     return $this->redirect(array('action'=>'insuranceProviders'));
    }

    
	
	
	
	/*Financial Support Options*/

    function financialSupport(){
     $this->viewBuilder()->setLayout("admin");
     $this->loadModel('FinancialSupport');
	 $results=$this->FinancialSupport->find('all', array('order'=>array('name'=>'asc')));
	 $module="Financial Supports";
	 $heading="Financial Support";
	 $name="financialsupport";
	 $topname='financial support';
	 $this->set(compact('results','module','heading','name','topname'));
	 $this -> render('treatment');
   }
   
    function addFinancialsupport(){
     $this->viewBuilder()->setLayout("admin");
     $this->loadModel('FinancialSupport');
	 $module="Financial Supports";
	 $this->set(compact('module'));
     if($this->request->is('post')){
     $data=$_POST['data'];
	 $Newquery = $this->FinancialSupport->query();

      $Newquery->insert(['name','status', 'name_spanish'])

      ->values([

	    'name' => $data['name'],

        'status' => $data['status'],

        'name_spanish' => $data['name_spanish'],

		])

      ->execute();
     //$this->Treatment->save($data);
     $this->Flash->success('You have successfully updated the data');
     return $this->redirect(array('action'=>'financialSupport','admin'=>true));
     }
	 $this ->render('add_treatment');
	 }
	 
    function editFinancialsupport($en_id=null){
     $id=$en_id;
	 $this->viewBuilder()->setLayout("admin");
     $this->loadModel('FinancialSupport');
     $result= $this->FinancialSupport->get($id);
	 $module="Financial Supports";
	 //print_r($result);die;
     $this->set(compact('result','module'));
     if($this->request->is('post')){
     $data=$_POST['data'];
	 $dataSave['status']=$data['status'];
	 $dataSave['name']=$data['name'];
	 $dataSave['name_spanish']=$data['name_spanish'];
	 //print_r($data);die;
	 $result = $this->FinancialSupport->patchEntity($result, $dataSave);
     $this->FinancialSupport->save($result);
     $this->Flash->success('You have successfully updated the data');
     return $this->redirect(array('action'=>'financialSupport'));
    }
	$this ->render('edit_treatment');
    
    }
	
    function deleteFinancialsupport($en_id=null){
     $id=$en_id;  
     $this->viewBuilder()->setLayout("admin");
     $this->loadModel('FinancialSupport');
     $query5 = $this->FinancialSupport->query(); 
     $query5->delete()->where(['id' => $id])->execute();
     $this->Flash->success('You have successfully deleted the record');
     return $this->redirect(array('action'=>'financialSupport'));
    }
	
	
	/*Language Options*/

    function languageOptions(){
     $this->viewBuilder()->setLayout("admin");
     $this->loadModel('LanguageOptions');
	 $results=$this->LanguageOptions->find('all', array('order'=>array('name'=>'asc')));
	 $module="Language Options";
	 $heading="Language Option";
	 $name="languageoptions";
	 $topname='language options';
	 $this->set(compact('results','module','heading','name','topname'));
	 $this -> render('treatment');
   }
   
    function addLanguageoptions(){
     $this->viewBuilder()->setLayout("admin");
     $this->loadModel('LanguageOptions');
	 $module="Language Options";
	 $this->set(compact('module'));
     if($this->request->is('post')){
     $data=$_POST['data'];
	 $Newquery = $this->LanguageOptions->query();

      $Newquery->insert(['name','status', 'name_spanish'])

      ->values([

	    'name' => $data['name'],

        'status' => $data['status'],

        'name_spanish' => $data['name_spanish'],

		])

      ->execute();
     //$this->Treatment->save($data);
     $this->Flash->success('You have successfully updated the data');
     return $this->redirect(array('action'=>'languageOptions','admin'=>true));
     }
	 $this ->render('add_treatment');
	 }
	 
    function editLanguageoptions($en_id=null){
     $id=$en_id;
	 $this->viewBuilder()->setLayout("admin");
     $this->loadModel('LanguageOptions');
     $result= $this->LanguageOptions->get($id);
	 $module="Language Options";
	 //print_r($result);die;
     $this->set(compact('result','module'));
     if($this->request->is('post')){
     $data=$_POST['data'];
	 $dataSave['status']=$data['status'];
	 $dataSave['name']=$data['name'];
	 $dataSave['name_spanish']=$data['name_spanish'];
	 //print_r($data);die;
	 $result = $this->LanguageOptions->patchEntity($result, $dataSave);
     $this->LanguageOptions->save($result);
     $this->Flash->success('You have successfully updated the data');
     return $this->redirect(array('action'=>'languageOptions'));
    }
	$this ->render('edit_treatment');
    
    }
	
    function deleteLanguageoptions($en_id=null){
     $id=$en_id;  
     $this->viewBuilder()->setLayout("admin");
     $this->loadModel('LanguageOptions');
     $query5 = $this->LanguageOptions->query(); 
     $query5->delete()->where(['id' => $id])->execute();
     $this->Flash->success('You have successfully deleted the record');
     return $this->redirect(array('action'=>'languageOptions'));
    }
	

	

	/* Admin Logout */

	

	public function logout(){

		

		$session = $this->request->session();

		$session->delete('admin');	

		$this->redirect(['action' => 'index']);

		$this->Flash->success('Logged out successfully.');

		

	}
	
	//Google Reports
	
    public function sessionReports(){ 
        
		$this->viewBuilder()->setLayout("admin");

    	   if(!empty($this->request->query)){

    	  		$request = $this->request->query;
                if(! empty($request)){
				$dateRange = $request['daterange'];

				$showDateRange = $request['daterange'];

				$dateRange = explode('-',$dateRange);
				//print_r($dateRange);
				}else{
				$dateRange ="";	
					}

				if(!empty($dateRange)){

					

					$startDate= date('Y-m-d',strtotime($dateRange[0]));

					$endDate= date('Y-m-d',strtotime($dateRange[1]));

				}else{

					

					$startDate = '30daysAgo';

					$endDate = 'today';

				}

    	  }else{

    	  		$showDateRange = '';

    	  		$startDate = '30daysAgo';

				$endDate = 'today';	

    	  }
		
        
        $analytics = $this->getService();
		//print_r($analytics);die;
        $analytics_id = '138844882'; 
        //$profile = $this->getFirstProfileId($analytics);
		//print_r($profile);die;
        //if($profile !=0){
			
        $results = $this->getResultsSession($analytics,$analytics_id,$startDate,$endDate);
         //print_r($results);die;
        if (count($results->getRows()) > 0) {

	

		    $profileName = $results->getProfileInfo()->getProfileName();

			 //echo '<pre>'; print_r($results);die;

		    // Get the entry for the first entry in the first row.

		    $rows = $results->getRows();
            //echo $rows[0][0];die;
		    $totalrows= $results->getTotalsForAllResults();

		    $columns = $results->getColumnHeaders();

		    $this->set(compact('rows','totalrows','columns','showDateRange'));

		  }else{
			$rows = 0;

		    $totalrows= 0;

		    $columns = 0;

		    $this->set(compact('rows','totalrows','columns','showDateRange'));  
			  }
	//}

    }

    

	 public function sessionUserReports(){


    	  $this->viewBuilder()->setLayout("admin");

    	  if(!empty($this->request->query)){

    	  		$request = $this->request->query;
				

				$dateRange = $request['daterange'];

				$showDateRange = $request['daterange'];

				$dateRange = explode('-',$dateRange);

				if(!empty($dateRange)){

					

					$startDate= date('Y-m-d',strtotime($dateRange[0]));

					$endDate= date('Y-m-d',strtotime($dateRange[1]));

				}else{

					

					$startDate = '30daysAgo';

					$endDate = 'today';

				}

    	  }else{

    	  		$showDateRange = '';

    	  		$startDate = '30daysAgo';

				$endDate = 'today';	

    	  }

        $analytics = $this->getService();
		$analytics_id = '138844882';

       // $profile = $this->getFirstProfileId($analytics);
       // print_r($profile);die;
        
        //if($profile !=0){
			//echo "bye";die;
			$results = $this->getResultsUser($analytics, $analytics_id,$startDate,$endDate);
			//print_r($results);die;
        if (count($results->getRows()) > 0) {

	

		    $profileName = $results->getProfileInfo()->getProfileName();

			 //echo '<pre>'; print_r($results); die;

		    // Get the entry for the first entry in the first row.

		    $rows = $results->getRows();

		    $totalrows= $results->getTotalsForAllResults();

		    $columns = $results->getColumnHeaders();

		    $this->set(compact('rows','totalrows','columns','showDateRange'));

		  } 
	 

    }

    

    function getService()

    {
		


        // Creates and returns the Analytics service object.

        // Load the Google API PHP Client Library.

        $des = realpath('vendor/google-api-php-client').'/';
        if(is_file($des.'src/Google/autoload.php'))
        { require_once $des.'src/Google/autoload.php';}

        /*$url = 'https://aspenstrong.org/analytics/google-api-php-client/examples/service-account.php';
        $content = file_get_contents($url);*/
		
  $client = new \Google_Client();
  
  $client->setApplicationName("Hello Analytics Reporting");
 /* $URL='https://aspenstrong.org/analytics/google-api-php-client/examples/service-account.php';
  $ch = curl_init();
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_URL, $URL);
      $data = curl_exec($ch);
      curl_close($ch);
	  print_r($data);die;*/
$url = 'https://directory.aspenstrong.org/analytics/google-api-php-client/examples/service-account.php';
$content = file_get_contents($url);
//print_r($content);
$first_step = explode( '<div id="presv">' , $content );

$second_step = explode("</div>" , (isset($first_step[1])?$first_step[1]:[]));

$_SESSION['service_token']=$second_step[0] ;

 /* $_SESSION['service_token']='{"access_token":"ya29.ElnrA39IxMKSt7s4lg7QDaqaRcUrKGvRO3lp72wSVpfWgnGyrOGzzbJECujSct6HOD2l3TIexWBA6gVx1PXT_rNkZGcnA8xNvrHAuIHWPUhxoTk69diKl3g7rw","expires_in":3600,"created":1486474479}';*/
// print_r($_SESSION);die;
 
  if (isset($_SESSION['service_token'])) {
 
  $client->setAccessToken($_SESSION['service_token']);

}


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



	 function getFirstProfileId($analytics) {

	  // Get the user's first view (profile) ID.

	/*$analyticsService = new Google_Service_Analytics($analytics);
    $accounts = $analyticsService->accounts;
     print_r($accounts);die;*/
	  // Get the list of accounts for the authorized user.

	  //$accounts = $analytics->management_accounts->listManagementAccounts();
      //$accounts = $analytics->management_accounts;
	 // print_r($accounts);die;
	  $accounts = $analytics->accounts;
	 //print_r($accounts);die;
	  if ($accounts != "" && count($accounts->getItems()) > 0) {

	    $items = $accounts->getItems();

	   $firstAccountId = $items[0]->getId();

	

	    // Get the list of properties for the authorized user.

	    $properties = $analytics->management_webproperties

	        ->listManagementWebproperties($firstAccountId);

	

	    if (count($properties->getItems()) > 0) {

	      $items = $properties->getItems();

	      $firstPropertyId = $items[0]->getId();

	

	      // Get the list of views (profiles) for the authorized user.

	      $profiles = $analytics->management_profiles

	          ->listManagementProfiles($firstAccountId, $firstPropertyId);

	

	      if (count($profiles->getItems()) > 0) {

	        $items = $profiles->getItems();

	

	        // Return the first view (profile) ID.

	        return $items[0]->getId();

	

	      } else {

	        throw new Exception('No views (profiles) found for this user.');

	      }

	    } else {

	      throw new Exception('No properties found for this user.');

	    }

	  } else {
         //print "No results found.\n";
	    //throw new Exception('No accounts found for this user.');
        return 0;
	  }

	}



	function getResultsSession($analytics, $profileId,$startDate,$endDate) {

	  // Calls the Core Reporting API and queries for the number of sessions
      /*print_r($analytics);echo '</br>';
	  print_r($profileId);echo '</br>';
	  print_r($startDate);echo '</br>';*/
	  
	  // for the last seven days.
       //$metrics = 'ga:visits,ga:pageviews,ga:bounces,ga:entranceBounceRate,ga:visitBounceRate,ga:avgTimeOnSite,ga:fullReferrer';
       //$dimensions = 'ga:country,ga:city';
	   return $analytics->data_ga->get(


	       'ga:' . $profileId,

	       $startDate,

	       $endDate,

	       'ga:users,ga:sessions,ga:bounceRate,ga:avgSessionDuration,ga:visits',array('dimensions' => ''),'ga:pagePath==/');
		   //'ga:sessions,ga:bounces,ga:bounceRate,ga:sessionDuration,ga:avgSessionDuration,ga:hits,ga:visits',array('dimensions' => ''),'ga:pagePath==/');
		   
		   

	}



	function getResultsUser($analytics, $profileId,$startDate,$endDate) {

	  // Calls the Core Reporting API and queries for the number of sessions

	  // for the last seven days.
      //print_r($analytics);die;
	    return $analytics->data_ga->get(

	       'ga:' . $profileId,

	       $startDate,

	       $endDate,

	       'ga:users,ga:newUsers,ga:sessionsPerUser,ga:percentNewSessions');

	}
	
	//Google Reports
//Analytics

function dashboardAnalytics(){
   $this->viewBuilder()->setLayout("admin");
   $this->loadModel('Users');
   $this->loadModel('AsConnections');
   $this->loadModel('AsConnectionsAddresses');
   $userpro=$this->Users->find('all')->toArray();
   $totalrows=array();
   
   foreach($userpro as $user){
	
	$zip=$this->AsConnectionsAddresses->find('all',array('conditions'=>array('AsConnectionsAddresses.entry_id'=>$user['ID'],'AsConnectionsAddresses.preferred'=>1)));
	if($zip!=""){
    $zipCode=$zip;
	}else{
	$zipCode=0;	
	}
    //$startDate = $time;
    $startDate = '30daysAgo';
    $endDate = 'today';
    $analytics = $this->getService();
		//print_r($analytics);die;
        $analytics_id = '138844882'; 
        //$profile = $this->getFirstProfileId($analytics);
		//print_r($profile);die;
        //if($profile !=0){
			
        $results = $this->getResultsSession2($analytics,$analytics_id,$startDate,$endDate,base64_encode(convert_uuencode($user['ID'])));
		$get_goals=$this->getGoals($analytics,$analytics_id,$startDate,$endDate,base64_encode(convert_uuencode($user['ID'])));
		$get_goals_email=$this->getGoals2($analytics,$analytics_id,$startDate,$endDate,base64_encode(convert_uuencode($user['ID'])));
		$get_goals_share=$this->getGoals3($analytics,$analytics_id,$startDate,$endDate,base64_encode(convert_uuencode($user['ID'])));
		$get_site_search=$this->getSitesearch($analytics,$analytics_id,$startDate,$endDate,$zipCode);
		
        //print_r($get_site_search);die;
		
        if (count($results->getRows()) > 0) {
        //$profileName = $results->getProfileInfo()->getProfileName();
		 $views= $results->getTotalsForAllResults();
		
        $totalrows2['profileViews']= $views['ga:pageviews'];
			//print_r($totalrows);die;
			//return $totalrows;
		  }
		   //if ($get_goals != NULL) {
			$totalrows2['user']=$user['user_email'];
			$totalrows2['websiteVisit']=$get_goals; 
			$totalrows2['emailSent']=$get_goals_email; 
			$totalrows2['profileShare']=$get_goals_share; 
			$totalrows2['sitesearch_Zip']=$get_site_search; 
		   //}
		   $totalrows[]=$totalrows2;
		   //print_r($totalrows);die;
	//}
  }
  //print_r($totalrows);die;
  $this->set(compact('totalrows'));

    }
public function homedashboardAnalytics(){
   $this->viewBuilder()->setLayout("admin");
   $this->loadModel('Users');
   $this->loadModel('AsConnections');
   $this->loadModel('AsConnectionsAddresses');
   $userpro=$this->Users->find('all')->toArray();
   $totalrows=array();
   
   foreach($userpro as $user){
	
	$zip=$this->AsConnectionsAddresses->find('all',array('conditions'=>array('AsConnectionsAddresses.entry_id'=>$user['ID'],'AsConnectionsAddresses.preferred'=>1)));
	if($zip!=""){
    $zipCode=$zip;
	}else{
	$zipCode=0;	
	}
    //$startDate = $time;
    $startDate = '30daysAgo';
    $endDate = 'today';
    $analytics = $this->getService();
		//print_r($analytics);die;
        $analytics_id = '138844882'; 
        //$profile = $this->getFirstProfileId($analytics);
		//print_r($profile);die;
        //if($profile !=0){
			
        /*$results = $this->getResultsSession2($analytics,$analytics_id,$startDate,$endDate,base64_encode(convert_uuencode($user['ID'])));
		$get_goals=$this->getGoals($analytics,$analytics_id,$startDate,$endDate,base64_encode(convert_uuencode($user['ID'])));*/
		$get_goals_email=$this->getGoals2($analytics,$analytics_id,$startDate,$endDate,base64_encode(convert_uuencode($user['ID'])));
		/*$get_goals_share=$this->getGoals3($analytics,$analytics_id,$startDate,$endDate,base64_encode(convert_uuencode($user['ID'])));
		$get_site_search=$this->getSitesearch($analytics,$analytics_id,$startDate,$endDate,$zipCode);*/
		
        //print_r($get_site_search);die;
		
        //if (count($results->getRows()) > 0) {
//        //$profileName = $results->getProfileInfo()->getProfileName();
//		 $views= $results->getTotalsForAllResults();
//		
//        $totalrows2['profileViews']= $views['ga:pageviews'];
//			//print_r($totalrows);die;
//			//return $totalrows;
//		  }
		   //if ($get_goals != NULL) {
			$totalrows2['user']=$user['ID'];
			/*$totalrows2['websiteVisit']=$get_goals;*/ 
			$totalrows2['emailSent']=$get_goals_email; 
			/*$totalrows2['profileShare']=$get_goals_share; 
			$totalrows2['sitesearch_Zip']=$get_site_search;*/ 
		   //}
		   $totalrows[]=$totalrows2;
		   //print_r($totalrows);die;
	//}
  }
  //print_r($totalrows);die;
  //$this->set(compact('totalrows'));
  return $totalrows ;exit;

    }
	
public function getResultsReport() {
		$this->viewBuilder()->setLayout("admin");

    	 

    	  		$showDateRange = '';

    	  		$startDate = '30daysAgo';

				$endDate = 'today';	

    	 

        $analytics = $this->getService();
		$analytics_id = '138844882';

			$results=$analytics->data_ga->get(

	       'ga:' . $analytics_id,

	       $startDate,

	       $endDate,

	       'ga:sessions',
  array(
    'dimensions'  => 'ga:city',
    'sort'        => '-ga:sessions',
    'max-results' => 10
  ));
			//print_r($results->getRows());die;
        if (count($results->getRows()) > 0) {
		 $color=array("#FF0F00","#FF6600","#FF9E01","#FCD202","#F8FF01","#B0DE09","#04D215","#0D8ECF","#0D52D1","#2A0CD0");
         $data = array(); 
		 $i=0; 
	     foreach($results->getRows() as $row){
          $data[] = array(
           'country'   => $row[0],
           'visits'  => $row[1],
		   'color'=> $color[$i]
           );
		   $i++;
		 }
		 return json_encode( $data );exit;
		   

		  } 


	}
	
function getResultsSession2($analytics, $profileId,$startDate,$endDate,$key=NULL) {

	  // Calls the Core Reporting API and queries for the number of sessions

	  // for the last seven days.
       //$metrics = 'ga:visits,ga:pageviews,ga:bounces,ga:entranceBounceRate,ga:visitBounceRate,ga:avgTimeOnSite,ga:fullReferrer';
       //$dimensions = 'ga:country,ga:city';
	   //https://www.googleapis.com/analytics/v3/data/ga?ids=ga%3A138844882&start-date=30daysAgo&end-date=yesterday&metrics=ga%3Apageviews&dimensions=ga%3ApagePath&sort=ga%3Apageviews&filters=ga%3ApagePath%3D%3D%2Fdirectory%2Flist%2FprofileView%2FIyxDJFUKYAo%3D
	   $optParams = array();

$key=$key;

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


$key=$key;

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
return 0;	
	}


function getGoals3($analytics, $profileId,$startDate,$endDate,$key=NULL){
	$optgoals=array();
$optgoals['dimensions']='ga:goalCompletionLocation';

$key=$key;

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

public function viewPdf($id = null) {
	//$id=convert_uudecode(base64_decode($id));
$this->redirect('https://directory.aspenstrong.org/topdf/create.php?id='.$id);
}
public function viewExcel($id = null) {
	//$id=convert_uudecode(base64_decode($id));
$this->redirect('https://directory.aspenstrong.org/topdf/generate_excel.php');
}	

public function userlistcsv()
  {

      $this->loadModel('users');
      $results=$this->users->find('all')->toArray();
	  
      $filename = "users_list.csv";
      $fp = fopen('php://output', 'w');
      $title = array('NO','Name','Email','Registration Time');
      
      fputcsv($fp,$title);
      header('Content-type: text/csv');
      header('Content-Disposition: attachment; filename='.$filename);     
       $i=1;
      foreach($results as $result)
      {
        $userlistcsv = array();

        $userlistcsv['No'] = $i;
        $userlistcsv['name'] = $result['display_name'];
        $userlistcsv['email'] = $result['user_email'];
        $userlistcsv['date'] = $result['user_registered'];
        fputcsv($fp, $userlistcsv);
        $i++;
      }

      die;
}

public function sendmailbyadmin(){
	        //print_r($_POST['data']);die;
	        $data=$_POST['data'];
			$emails=$data['emails'];
			$names=$data['names'];
			$url=$data['url'];
			if(strpos($emails,',')){
			$allMails=explode(',',$emails);
			$allNames=explode(',',$names);
			$i=0;
			
			foreach($allMails as $mail){
			$vars = array(
                array(
                    'name' => 'NAME',
                    'content' => $allNames[$i],
                ),
                array(
                    'name' => 'MESSAGE',
                    'content' => $data['message']
                )
            );
	        $from_email = 'info@aspenstrong.org';
            $subject = 'Admin Message';
            $this->sendMail('admin-message-to-user',$from_email,'Aspen Strong Directory',$mail,$allNames[$i],$vars,$subject);
            $i++;
			}
			}else{
			$names=str_replace('|',' ',$names);
			$vars = array(
                array(
                    'name' => 'NAME',
                    'content' => $names,
                ),
                array(
                    'name' => 'MESSAGE',
                    'content' => $data['message']
                )
            );
	        $from_email = 'info@aspenstrong.org';
            $subject = 'Admin Message';
            $this->sendMail('admin-message-to-user',$from_email,'Aspen Strong Directory',$emails,$names,$vars,$subject);
				
				}
            $this->Flash->success('Your message has sent to the users'); 
           if($url=='1'){
		   return $this->redirect(['controller' => 'Admin', 'action' => 'userslist','?' => array('noprofile' => $url)]);
		   }else{			   
            return $this->redirect(['controller' => 'Admin', 'action' => 'userslist','?' => array('vars' => $url)]);
		   }
	}	
	
function edituserslist($id=null,$step=""){
	 $this->viewBuilder()->setLayout("admin");
	 $this->loadModel('AsConnections');
     $this->loadModel('AsConnectionsMetas');
	 $this->loadModel('AsConnectionsEdits');
	 
	 $result_entry=$this->AsConnectionsEdits->find('all',array('conditions'=>array('status'=>0),'order'=>array('id DESC')))->toArray();
	 $results=$this->AsConnections->find('all',array('order'=>array('id DESC')))->toArray();
	 //print_r($result_entry);die;
	 
	  /*if($this->request->is('post')){
  	     $data=$this->data;
  	     if(!empty($data['email']['to'])){
  	         $message=$data['email']['message'];
            $user= $this->User->find('first',array('conditions'=>array('User.user_email'=>$data['email']['to'])));
  	       
			$profile=$this->AsConnection->find('first',array('conditions'=>array('AsConnection.owner'=>$user['User']['ID'])));
			$sender_name = $profile['AsConnection']['organization'];
            $vars = array(
                array(
                    'name' => 'name',
                    'content' => $sender_name,
                ),
                array(
                    'name' => 'message',
                    'content' => $message
                )
            );
            //pr($vars);die;
            $sender_email = $data['email']['to'];
            //$template_name = 'Admin Message To User';
            $this->loadModel('EmailTemplates');
            $mailchimp=$this->EmailTemplates->find('first',array('conditions'=>array('EmailTemplates.alias'=>'contact_user'),'fields'=>array('EmailTemplates.mailchimp_template')));
              if(!empty($mailchimp))
              {
                $template_name=$mailchimp['EmailTemplates']['mailchimp_template'];
              }
            $from_email = 'Aspen Strong Directory';
            $subject = 'Admin Message';
            $this->sendMail($template_name,$from_email,'',$sender_email,$sender_name,$vars,$subject);
            $this->Flash->success('Your message has sent to the user');       
            $this->redirect($this->referer());
  	         } else{
  		        $this->Flash->error('Sorry User has not shared email');       
                $this->redirect($this->referer());
		  	}
  	}*/
	 
	 
	 $this->set(compact('result_entry','results')); 
	 
	}
	
	public function profileView($id=NULL)
    {
	 //echo $id;die;
	 $this->loadModel('Users');

	$this->viewBuilder()->setLayout("admin");
	
	    $this->loadModel('Treatments');
	    $treatments=$this->Treatments->find('all',['order' => ['name' => 'ASC']])                   
		->where(['status ' => 'a']);
		
		$this->loadModel('Payments');
	    $payments=$this->Payments->find('all',['order' => ['name' => 'ASC']])                   
		->where(['status ' => 'a']);
		
		$this->loadModel('Ages');
	    $ages=$this->Ages->find('all',['order' => ['name' => 'ASC']])                   
		->where(['status ' => 'a']);
		
		$this->loadModel('Issues');
	    $issues=$this->Issues->find('all',['order' => ['name' => 'ASC']])                   
		->where(['status ' => 'a']);
		
	   $this->loadModel('InsuranceProviders');
	   $insuranceProviders=$this->InsuranceProviders->find('all',['order' => ['name' => 'ASC']])                   
		->where(['status ' => 'a']);
		
	   $this->loadModel('Modalities');
	   $modalities=$this->Modalities->find('all',['order' => ['name' => 'ASC']])                   
		->where(['status ' => 'a']);
		
		$this->loadModel('Therapists');
		$therapiests=$this->Therapists->find('all')                   
		->where(['status ' => 'a']);

	
	
	  
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
	 $conditions['status']=0;
	 $conditions['entry_id']=$id;
	 $conditions['step']='step2';
	 $asConnection = $this->AsConnectionsEdits->find('all',['conditions'=>$conditions]);
	 
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
	
	$asConnection = $this->AsConnections->get($id,['contain' => ['ConnectionCredentials','AsConnectionsSocials','AsConnectionsLinks','AsConnectionsAddresses','AsConnectionsPhones','AsConnectionsEmails','AsConnectionsMetas']]);
	
	 //}
	
	 $conditions1['status']=0;
	 $conditions1['entry_id']=$id;
	 $conditions1['step']='step1';
	 $asConnection_fields = $this->AsConnectionsEdits->find('all',['conditions'=>$conditions1])->toArray();
	 if(!empty($asConnection_fields)){
	 $newVals=unserialize($asConnection_fields[0]['old_fields']);
	 //print_r($asConnection);die;
	 //Array ( [entry_type] => individual [visibility] => public [first_name] => test33 [last_name] => test22 [organization] => tttttttt11 [contact_first_name] => [contact_last_name] => [title] => testings|eeeeeee [locations] => location1|location2|location3|location4|location5 )
	 
	 $asConnection['entry_type']=$newVals['entry_type'];
	 $asConnection['visibility']=$newVals['visibility'];
	 $asConnection['first_name']=$newVals['first_name'];
	 $asConnection['last_name']=$newVals['last_name'];
	 $asConnection['organization']=$newVals['organization'];
	 $asConnection['contact_first_name']=$newVals['contact_first_name'];
	 $asConnection['contact_last_name']=$newVals['contact_last_name'];
	 $asConnection['title']=$newVals['title'];
	 $asConnection['locations']=$newVals['locations'];
	 }
	 
	 $conditions2['status']=0;
	 $conditions2['entry_id']=$id;
	 $conditions2['step']='step2';
	 $asConnection_fields2 = $this->AsConnectionsEdits->find('all',['conditions'=>$conditions2])->toArray();
	 if(!empty($asConnection_fields2)){
	 $newVals2=unserialize($asConnection_fields2[0]['old_fields']);
	 
	
	 
	 $asConnection['as_connections_addresses']=$newVals2['as_connections_addresses'];
	 
	 
	 $asConnection['as_connections_phones']=$newVals2['as_connections_phones'];
	 
	 
	 $asConnection['as_connections_emails']=$newVals2['as_connections_emails'];
	 
	 
	 }
	 
	 
	 $conditions3['status']=0;
	 $conditions3['entry_id']=$id;
	 $conditions3['step']='step3';
	 $asConnection_fields3 = $this->AsConnectionsEdits->find('all',['conditions'=>$conditions3])->toArray();
	 if(!empty($asConnection_fields3)){
	 $newVals3=unserialize($asConnection_fields3[0]['old_fields']);
	 
	 if(isset($newVals3['as_connections_socials'])){
	 $asConnection['as_connections_socials']=$newVals3['as_connections_socials'];
	 }
	 if(isset($newVals3['as_connections_links'])){
	 $asConnection['as_connections_links']=$newVals3['as_connections_links'];
	 }
	 $asConnection['as_connections_meta']=$newVals3['as_connections_meta'];
	 
	 }
	 
	 $conditions4['status']=0;
	 $conditions4['entry_id']=$id;
	 $conditions4['step']='step4';
	 $asConnection_fields4 = $this->AsConnectionsEdits->find('all',['conditions'=>$conditions4])->toArray();
	 if(!empty($asConnection_fields4)){
	 $newVals4=unserialize($asConnection_fields4[0]['old_fields']);
	 //print_r($newVals4);die;
	 $asConnection['as_connections_meta']=$newVals4['as_connections_meta'];
	 if(isset($newVals4['connection_credentials']) && $newVals4['connection_credentials'] !=""){
	 $asConnection['connection_credentials']=$newVals4['connection_credentials'];
	 }
		 
	 }
	 
	 $conditions5['status']=0;
	 $conditions5['entry_id']=$id;
	 $conditions5['step']='step5';
	 $asConnection_fields5 = $this->AsConnectionsEdits->find('all',['conditions'=>$conditions5])->toArray();
	 if(!empty($asConnection_fields5)){
	 $newVals5=unserialize($asConnection_fields5[0]['old_fields']);
	 //print_r($newVals5);die;
	 $asConnection['as_connections_meta']=$newVals5['as_connections_meta'];
	 if(isset($newVals5['health_fund_status']) && $newVals5['health_fund_status'] !=""){
	 $asConnection['health_fund_status']=$newVals5['health_fund_status'];
	 }
	 if(isset($newVals5['program_status']) && $newVals5['program_status'] !=""){
	 $asConnection['program_status']=$newVals5['program_status'];
	 }
	 }
	 
	 
	 	 if($this->request->is('post')){
	 $data=$_POST;
	//print_r($data).'</br>';
	$template_name="admin-message-to-user";
	//$session = $this->request->session();
	//$cap=$session->read('captcha');
	//if($data['captcha']==$cap){
	$data['name']=$asConnection['first_name'].' '.$asConnection['last_name'];
	$vars = array(
                array(
                    'name' => 'NAME',
                    'content' => $data['name']
                ),
                array(
                    'name' => 'MESSAGE',
                    'content' => $data['message']
                )
              );
			  //echo $provider_email;
			  //print_r($vars);die;
             
            //$this->sendMail($template_name,$from_email,'',$provider_email,$sender_name,$vars,$subject);
			$userDetails = $this->Users->get($data['userID']);
			//print_r($userDetails['user_email']);die;
			$subject="Aspenstrong Team";
			$from_email = 'info@aspenstrong.org';
			if($this->sendMail($template_name,$from_email,'Aspen Strong Directory',$userDetails['user_email'],$data['name'],$vars,$subject)){
			$this->Flash->success('Message sent successfully.');
			}
	
	//}else{
	
		//}
	 }
	 
	 
		 $this->set(compact('asConnection','issues','treatments','ages','insuranceProviders','modalities','therapiests','payments'));	

   }
   
        function changePassword($enc_key=null,$enc_id=null)
	 {
      $this->loadModel('Users');
      if($this->request->is('post')){
        $data=$_POST['data'];
		$user=$data['user'];
        //print_r($user);die;
		$query = $this->Users->query();
            $query->update()
			->set(['user_pass'=>md5($user['password'])])
	        ->where(['ID' => $user['id']])

	        ->execute();
            $this->Flash->success('Your password has been updated successfully.');       
            $this->redirect(array('controller'=>'admin','action'=>'userslist'));
          }
        }
   
	/*payment options*/
  
   function paymentMethod(){
     $this->viewBuilder()->setLayout("admin");
     $this->loadModel('Payments');
     $results=$this->Payments->find('all', array('order'=>array('name'=>'asc')));
	 $module="Payment Method";
	 $heading="Payment Method";
	 $name="";
	 $topname='payment method';
	 $this->set(compact('results','module','heading','name','topname'));
	 $this -> render('payment');
   }
   
    function addPayMethod(){
     $this->viewBuilder()->setLayout("admin");
     $this->loadModel('Payments');
	 $module="Payment Method";
	 $this->set(compact('module'));
     if($this->request->is('post')){
     $data=$_POST['data'];
	 $Newquery = $this->Payments->query();

      $Newquery->insert(['name','status', 'name_spanish'])

      ->values([

	    'name' => $data['name'],

        'status' => $data['status'],

        'name_spanish' => $data['name_spanish'],

		])

      ->execute();
     //$this->Treatment->save($data);
     $this->Flash->success('You have successfully updated the data');
     return $this->redirect(array('action'=>'payment_method','admin'=>true));
     }
	 $this ->render('add_pay_method');
	 }
	 
    function editPayMethod($en_id=null){
     $id=$en_id;
	 $this->viewBuilder()->setLayout("admin");
     $this->loadModel('Payments');
     $result= $this->Payments->get($id);
	 $module="Payment Method";
	 //print_r($result);die;
     $this->set(compact('result','module'));
     if($this->request->is('post')){
     $data=$_POST['data'];
	 $dataSave['status']=$data['status'];
	 $dataSave['name']=$data['name'];
	 $dataSave['name_spanish']=$data['name_spanish'];
	 //print_r($data);die;
	 $result = $this->Payments->patchEntity($result, $dataSave);
     $this->Payments->save($result);
     $this->Flash->success('You have successfully updated the data');
     return $this->redirect(array('action'=>'payment_method'));
    }
	$this ->render('edit_pay_method');
    
    }
	
    function deletePayMethod($en_id=null){
     $id=$en_id;  
     $this->viewBuilder()->setLayout("admin");
     $this->loadModel('Ages');
     $query5 = $this->Ages->query(); 
     $query5->delete()->where(['id' => $id])->execute();
     $this->Flash->success('You have successfully deleted the record');
     return $this->redirect(array('action'=>'treatment','admin'=>true));
    }
	
	/*specialities options*/
  
   function specialities(){
     $this->viewBuilder()->setLayout("admin");
     $this->loadModel('MentalHealths');
     $results=$this->MentalHealths->find('all', array('order'=>array('name'=>'asc')));
	 $module="Speciality";
	 $heading="Speciality";
	 $name="";
	 $topname='specialities';
	 $this->set(compact('results','module','heading','name','topname'));
	 $this->render('specialities');
   }
   
    function addSpecialities(){
     $this->viewBuilder()->setLayout("admin");
     $this->loadModel('MentalHealths');
	 $module="Speciality";
	 $this->set(compact('module'));
     if($this->request->is('post')){
     $data=$_POST['data'];
	 $Newquery = $this->MentalHealths->query();

      $Newquery->insert(['name','status', 'name_spanish'])

      ->values([

	    'name' => $data['name'],

        'status' => $data['status'],

        'name_spanish' => $data['name_spanish'],

		])

      ->execute();
     //$this->Treatment->save($data);
     $this->Flash->success('You have successfully updated the data');
     return $this->redirect(array('action'=>'specialities','admin'=>true));
     }
	 $this ->render('add_specialities');
	 }
	 
    function editSpecialities($en_id=null){
     $id=$en_id;
	 $this->viewBuilder()->setLayout("admin");
     $this->loadModel('MentalHealths');
     $result= $this->MentalHealths->get($id);
	 $module="Speciality";
	 //print_r($result);die;
     $this->set(compact('result','module'));
     if($this->request->is('post')){
     $data=$_POST['data'];
	 $dataSave['status']=$data['status'];
	 $dataSave['name']=$data['name'];
	 $dataSave['name_spanish']=$data['name_spanish'];
	 //print_r($data);die;
	 $result = $this->MentalHealths->patchEntity($result, $dataSave);
     $this->MentalHealths->save($result);
     $this->Flash->success('You have successfully updated the data');
     return $this->redirect(array('action'=>'specialities'));
    }
	$this ->render('edit_specialities');
    
    }
	/*provider options*/
  
   function provider(){
     $this->viewBuilder()->setLayout("admin");
     $this->loadModel('Therapists');
     $results=$this->Therapists->find('all', array('order'=>array('name'=>'asc')));
	 $module="provider Type";
	 $heading="provider Type";
	 $name="";
	 $this->set(compact('results','module','heading','name'));
	 $this->render('provider');
   }
   
    function addProvider(){
     $this->viewBuilder()->setLayout("admin");
     $this->loadModel('Therapists');
	 $module="provider Type";
	 $Therapist_category = TableRegistry::get('Therapists_category');
	  $parent_ct = $Therapist_category->find()->all();

	 $this->set(compact('module','parent_ct'));
     if($this->request->is('post')){
     $data=$_POST['data'];
	 $Newquery = $this->Therapists->query();

      $Newquery->insert(['name','status','parent_id', 'name_spanish'])

      ->values([

	    'name' => $data['name'],

        'status' => $data['status'],

        'parent_id' => $data['parent_id'],

        'name_spanish' => $data['name_spanish'],

		])

      ->execute();
     //$this->Treatment->save($data);
     $this->Flash->success('You have successfully updated the data');
     return $this->redirect(array('action'=>'provider','admin'=>true));
     }
	 $this ->render('add_provider');
	 }
	 
    function editProvider($en_id=null){
     $id=$en_id;
	 $this->viewBuilder()->setLayout("admin");
     $this->loadModel('Therapists');
     $result= $this->Therapists->get($id);

	 $module="provider Type";
	 //print_r($result);die;
	 $Therapist_category = TableRegistry::get('Therapists_category');
	  $parent_ct= $Therapist_category->find()->all();
     $this->set(compact('result','module','parent_ct'));
     if($this->request->is('post')){
     $data=$_POST['data'];
	 $dataSave['status']=$data['status'];
	 $dataSave['name']=$data['name'];
	 $dataSave['parent_id']=$data['parent_id'];
	 $dataSave['name_spanish']=$data['name_spanish'];
	 //print_r($data);die;
	 $result = $this->Therapists->patchEntity($result, $dataSave);
     $this->Therapists->save($result);
     $this->Flash->success('You have successfully updated the data');
     return $this->redirect(array('action'=>'provider'));
    }
	$this ->render('edit_provider');
    
    }
    /*provider options*/
  
   function providerCategory(){
     $this->viewBuilder()->setLayout("admin"); 
     $Therapist_category = TableRegistry::get('Therapists_category');
	  $results= $Therapist_category->find('all', array('order'=>array('name'=>'asc')));
	 $module="provider Category";
	 $heading="provider Category";
	 $name="";
	 $this->set(compact('results','module','heading','name'));
	 $this->render('provider_category');
   }
   
    function addProviderCategory(){
     $this->viewBuilder()->setLayout("admin");
     $this->loadModel('Therapists_category');
	 $module="provider Category";
	 $this->set(compact('module'));
     if($this->request->is('post')){
     $data=$_POST['data'];
	 $Newquery = $this->Therapists_category->query();

      $Newquery->insert(['name','status', 'name_spanish','color'])

      ->values([

	    'name' => $data['name'],

        'status' => $data['status'],

        'name_spanish' => $data['name_spanish'],
        'color'=>$data['color'],
		])

      ->execute();
     //$this->Treatment->save($data);
     $this->Flash->success('You have successfully updated the data');
     return $this->redirect(array('action'=>'provider_category','admin'=>true));
     }
	 $this ->render('add_provider_category');
	 }
	 
    function editProviderCategory($en_id=null){
     $id=$en_id;
	 $this->viewBuilder()->setLayout("admin");
     $this->loadModel('Therapists_category');
     $result= $this->Therapists_category->get($id);
	 $module="provider Category";
	 //print_r($result);die;
     $this->set(compact('result','module'));
     if($this->request->is('post')){
     $data=$_POST['data'];
	 $dataSave['status']=$data['status'];
	 $dataSave['name']=$data['name'];
	 $dataSave['name_spanish']=$data['name_spanish'];
	 $dataSave['color']=$data['color'];
	 //print_r($data);die;
	 $result = $this->Therapists_category->patchEntity($result, $dataSave);
     $this->Therapists_category->save($result);
     $this->Flash->success('You have successfully updated the data');
     return $this->redirect(array('action'=>'provider_category'));
    }
	$this ->render('edit_provider_category');
    
    }

    function organizerType(){
     $this->viewBuilder()->setLayout("admin"); 
     $organizer_type = TableRegistry::get('organizer_type');
	  $results= $organizer_type->find('all', array('order'=>array('name'=>'asc')));
	 $module="Organizer Type";
	 $heading="Organizer Type";
	 $name="";
	 $this->set(compact('results','module','heading','name'));
	 $this->render('organizer_type');
   }
   
    function addOrganizerType(){
     $this->viewBuilder()->setLayout("admin");
     $this->loadModel('organizer_type');
	 $module="Organizer Type";
	 $this->set(compact('module'));
     if($this->request->is('post')){
     $data=$_POST['data'];
	 $Newquery = $this->organizer_type->query();

      $Newquery->insert(['name','status', 'name_spanish'])

      ->values([

	    'name' => $data['name'],

        'status' => $data['status'],

        'name_spanish' => $data['name_spanish']
		])

      ->execute();
     //$this->Treatment->save($data);
     $this->Flash->success('You have successfully updated the data');
     return $this->redirect(array('action'=>'organizer_type','admin'=>true));
     }
	 $this ->render('add_organizer_type');
	 }
	 
    function editOrganizerType($en_id=null){
     $id=$en_id;
	 $this->viewBuilder()->setLayout("admin");
     $this->loadModel('organizer_type');
     $result= $this->organizer_type->get($id);
	 $module="Organizer Type";
	 //print_r($result);die;
     $this->set(compact('result','module'));
     if($this->request->is('post')){
     $data=$_POST['data'];
	 $dataSave['status']=$data['status'];
	 $dataSave['name']=$data['name'];
	 $dataSave['name_spanish']=$data['name_spanish'];
	 //print_r($data);die;
	 $result = $this->organizer_type->patchEntity($result, $dataSave);
     $this->organizer_type->save($result);
     $this->Flash->success('You have successfully updated the data');
     return $this->redirect(array('action'=>'organizer_type'));
    }
	$this ->render('edit_organizer_type');
    
    }
	
}

	