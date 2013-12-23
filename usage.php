<?php

error_reporting(E_ALL);
   //FOLLOWING MUST CONTAIN YOUR API TOKEN
  	$api_token = '';
  	
   include_once "TogglApiClass.php";
  	$togglObj = new TogglApiClass($api_token);
  	
  	//Change the API Call Here you want to test
  	$apiCall = 'get_report';
  	
   switch($apiCall) {
      case 'authenticate':
         $togglObj->doAuthentication();
         break;
      case 'get_workspaces':
         $togglObj->getWorkspaces();
         break;      
      case 'get_workspace_detail':
         $id = 482143; //Get Detail of this Workspace
         $togglObj->getWorkspaceDetail($id);
         break;  
      case 'edit_workspace':
         $data = array();
         $data['id'] = 482143;    //Workspace id to edit
         $data['name'] = 'Updated Workspace Name';
         $togglObj->editWorkspace($data);
         break;   
      case 'get_workspace_tags':
         $id = 482143; //Get Detail of this Workspace
         $togglObj->getWorkspaceProperties($id, 'tags');
         break;         
      case 'get_workspace_tasks':
         $id = 482143; //Get Detail of this Workspace
         $togglObj->getWorkspaceProperties($id, 'tasks');
         break;
      case 'get_workspace_projects':
         $id = 482143; //Get Detail of this Workspace
         $togglObj->getWorkspaceProperties($id, 'projects');
         break;
      case 'get_workspace_clients':
         $id = 482143; //Get Detail of this Workspace
         $togglObj->getWorkspaceProperties($id, 'clients');
         break;
      case 'get_workspace_users':
         $id = 482143; //Get Detail of this Workspace
         $togglObj->getWorkspaceProperties($id, 'users');
         break;                                        

      case 'add_timeEntry':
         $data = array();
         $data['wid'] = 482143;  //Workspace Id to add time entry to3794389
         $data['pid'] = 3794389;  //Project Id to add time entry to
         $data['start'] = date('c');
         $data['duration'] = 3600; //in secs
         $data['description'] = 'Creating API For Toggl'; 
         $togglObj->addTimeEntry($data);
         break;
      case 'start_timeEntry':
         $data = array();
         $data['wid'] = 482143;  //Workspace Id to add time entry to3794389
         $data['pid'] = 3794389;  //Project Id to add time entry to
         $data['description'] = 'Reading API Docs'; 
         $togglObj->startTimeEntry($data);
         break;  
      case 'stop_timeEntry':
         $id = 107440835; //Time Entry to Stop
         $togglObj->stopTimeEntry($id);
         break;           
      case 'get_timeEntry_detail':
         $id = 107440835; //Get Detail of this Time Entry
         $togglObj->getTimeEntryDetail($id);
         break;   
      case 'edit_timeEntry':
         $data = array();
         $data['id'] = 107440835; //Time Entry Id to update
         $data['description'] = 'Reading API Docs';
         $togglObj->editTimeEntry($data);
         break;
      case 'delete_timeEntry':
         $id = 107440441;
         $togglObj->deleteTimeEntry($id);
         break;                                       
         
      case 'add_client':
         $data = array();
         $data['wid'] = 482143;  //Workspace Id to add client to
         $data['name'] = 'My Client 2';
         $togglObj->addClient($data);
         break;
      case 'get_client_detail':
         $id = 10968629; //Get Detail of this Client
         $togglObj->getClientDetail($id);
         break;     
      case 'edit_client':
         $data = array();
         $data['id'] = 10968629; //Client Id to update
         $data['notes'] = 'Very important Client';
         $togglObj->editClient($data);
         break;
      case 'delete_client':
         $id = 11284510;
         $togglObj->deleteClient($id);
         break;             
      case 'get_client_projects':
         $id = 10968629; //Get Projects of this Client
         $togglObj->getClientProjects($id);
         break;     

      case 'add_project':
         $data = array();
         $data['wid'] = 482143;  //Workspace Id to add Project to
         $data['name'] = 'My Project';
         $data['cid'] = 10968629;  //Client Id to add Project to (Not Mandatory)
         $togglObj->addProject($data);
         break;
      case 'get_project_detail':
         $id = 3794389; //Get Detail of this Project
         $togglObj->getProjectDetail($id);
         break;     
      case 'edit_project':
         $data = array();
         $data['id'] = 3794389; //Project Id to update
         $data['name'] = 'My Updated Project';
         $togglObj->editProject($data);
         break;    
      case 'get_project_users':
         $id = 3794389; //Get Users of this Projects
         $togglObj->getProjectUsers($id);
         break;                        
         
      case 'add_tag':
         $data = array();
         $data['wid'] = 482143;  //Workspace Id to add tag to
         $data['name'] = 'Tag 1';
         $togglObj->addTag($data);
         break;
      case 'edit_tag':
         $data = array();
         $data['id'] = 398417; //Tag Id to update
         $data['name'] = 'Tag Name Updated';
         $togglObj->editTag($data);
         break;
      case 'delete_tag':
         $id = 398417;
         $togglObj->deleteTag($id);
         break;     

      case 'get_report':
         $id = 482143; //Workspace Id
         $options = array(); //All the Default Options are set in the Class. You can override them here. 
         //Pass following additional fields 
            //client_ids
            //project_ids
            //tag_ids
            //task_ids
            //order_field
            //user_ids
         $options['report_type'] = 'details'; 
         $togglObj->getReport($id, $options);
         break;              
                                       
   }
   
  	$a = json_decode($togglObj->response, true);
  	echo '<pre>';
  	print_r($a);
  	echo '</pre>';