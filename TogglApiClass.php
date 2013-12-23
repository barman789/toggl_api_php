<?php

/**
* @author Sandeep <barman789@gmail.com>
*/

Class TogglApiClass{
	

/**
 * This is the api token
 *
 * @var string
 * @access public
 */
	public $api_token = '';

/**
 * This is the response from the API
 *
 * @var json
 * @access public
 */
	public $response = '';	
	
/**
 * This is the base URL 
 *
 * @var string
 * @access private
 */
	private $_base_url = 'https://www.toggl.com/api/v8/';

/**
 * Constructor
 */
 function __construct( $api_token = null ) {
        $this->api_token = $api_token;  
 }


/**
 * does the Authentication and returns User Details
 *
 * @return void
 * @access public
 */
  public function doAuthentication( $api_token = null ) { 	

        $url = $this->_base_url . 'me';
        $this->_callAPI($url);
 }    

/**
 * get all Workspaces belonging to the given User
 *
 * @return void
 * @access public
 */
  public function getWorkspaces() { 	

        $url = $this->_base_url . 'workspaces';
        $this->_callAPI($url);
 }    

/**
 * get Workspace Detail
 *
 * @return void
 * @access public
 */
  public function getWorkspaceDetail( $workspace_id = null ) { 	

        $url = $this->_base_url . 'workspaces/' . $workspace_id;
        $this->_callAPI($url);
 }   
 
/**
 * Edit Workspace
 *
 * @return array
 * @access void
 */
  public function editWorkspace( $data = array() ) { 	

        $url = $this->_base_url . 'workspaces/' . $data['id'];
        $options['data']['workspace'] = $data;
        $options['put'] = true;
        $this->_callAPI($url, $options);
 }

/**
 * get Workspace Properties
 *
 * @return void
 * @access public
 */
  public function getWorkspaceProperties( $workspace_id = null , $property = 'tags') { 	

        $url = $this->_base_url . 'workspaces/' . $workspace_id . '/' . $property;
        $this->_callAPI($url);
 }                  

/**
 * Add a Project to Workspace
 *
 * @return void
 * @access public
 */
  public function addProject( $data = array() ) { 	

        $url = $this->_base_url . 'projects';
        $options['data']['project'] = $data;
        $options['post'] = true;
        $this->_callAPI($url, $options);
 } 

/**
 * Edit a Project
 *
 * @return void
 * @access public
 */
  public function editProject( $data = array() ) { 	

        $url = $this->_base_url . 'projects/' . $data['id'];
        $options['data']['project'] = $data;
        $options['put'] = true;
        $this->_callAPI($url, $options);
 }
 
/**
 * get Project Detail
 *
 * @return void
 * @access public
 */
  public function getProjectDetail( $project_id = null ) { 	

        $url = $this->_base_url . 'projects/' . $project_id;
        $this->_callAPI($url);
 }

/**
 * get Project Users
 *
 * @return void
 * @access public
 */
  public function getProjectUsers( $project_id = null ) { 	

        $url = $this->_base_url . 'projects/' . $project_id . '/project_users';
        $this->_callAPI($url);
 }         

/**
 * Add a Time Entry
 *
 * @return void
 * @access public
 */
  public function addTimeEntry( $data = array() ) { 	

        $url = $this->_base_url . 'time_entries';
        $options['data']['time_entry'] = $data;
        $options['post'] = true;
        $this->_callAPI($url, $options);
 }

/**
 * Edit a Time Entry
 *
 * @return void
 * @access public
 */
  public function editTimeEntry( $data = array() ) { 	

        $url = $this->_base_url . 'time_entries/' . $data['id'];
        $options['data']['time_entry'] = $data;
        
        $options['put'] = true;
        $this->_callAPI($url, $options);
 }  

/**
 * start a Time Entry
 *
 * @return void
 * @access public
 */
  public function startTimeEntry( $data = array() ) { 	

        $url = $this->_base_url . 'time_entries/start';
        $options['data']['time_entry'] = $data;
        $options['post'] = true;
        $this->_callAPI($url, $options);
 } 


/**
 * stop a Time Entry
 *
 * @return void
 * @access public
 */
  public function stopTimeEntry( $id = null ) { 	

        $url = $this->_base_url . 'time_entries/'. $id . '/stop';
        $options['put'] = true;
        $this->_callAPI($url, $options);
 }  

/**
 * Delete a Time Entry
 *
 * @return void
 * @access public
 */
  public function deleteTimeEntry( $id ) { 	

        $url = $this->_base_url . 'time_entries/' . $id;
        $options['delete'] = true;
        $this->_callAPI($url, $options);
 }  

 
/**
 * get Time Entry Detail
 *
 * @return void
 * @access public
 */
  public function getTimeEntryDetail( $time_entry_id = null ) { 	

        $url = $this->_base_url . 'time_entries/' . $time_entry_id;
        $this->_callAPI($url);
 }    
 
/**
 * Add a client to Workspace
 *
 * @return void
 * @access public
 */
  public function addClient( $data = array() ) { 	

        $url = $this->_base_url . 'clients';
        $options['data']['client'] = $data;
        $options['post'] = true;
        $this->_callAPI($url, $options);
 }

/**
 * Edit a Client
 *
 * @return void
 * @access public
 */
  public function editClient( $data = array() ) { 	

        $url = $this->_base_url . 'clients/' . $data['id'];
        $options['data']['client'] = $data;
        $options['put'] = true;
        $this->_callAPI($url, $options);
 } 
 
/**
 * get Client Detail
 *
 * @return void
 * @access public
 */
  public function getClientDetail( $client_id = null ) { 	

        $url = $this->_base_url . 'clients/' . $client_id;
        $this->_callAPI($url);
 }   

/**
 * Delete a Client
 *
 * @return void
 * @access public
 */
  public function deleteClient( $id ) { 	

        $url = $this->_base_url . 'clients/' . $id;
        $options['delete'] = true;
        $this->_callAPI($url, $options);
 } 
 
/**
 * get Client Projects
 *
 * @return void
 * @access public
 */
  public function getClientProjects( $client_id = null ) { 	

        $url = $this->_base_url . 'clients/' . $client_id . '/projects';
        $this->_callAPI($url);
 }    

/**
 * Add a Tag to Workspace
 *
 * @return void
 * @access public
 */
  public function addTag( $data = array() ) { 	

        $url = $this->_base_url . 'tags';
        $options['data']['tag'] = $data;
        $options['post'] = true;
        $this->_callAPI($url, $options);
 } 

/**
 * Edit a Tag
 *
 * @return void
 * @access public
 */
  public function editTag( $data = array() ) { 	

        $url = $this->_base_url . 'tags/' . $data['id'];
        $options['data']['tag'] = $data;
        $options['put'] = true;
        $this->_callAPI($url, $options);
 }  

/**
 * Delete a Tag
 *
 * @return void
 * @access public
 */
  public function deleteTag( $id ) { 	

        $url = $this->_base_url . 'tags/' . $id;
        $options['delete'] = true;
        $this->_callAPI($url, $options);
 } 
 

/**
 * get Report
 *
 * @return void
 * @access public
 */
  public function getReport( $workspace_id, $options = array() ) { 	

        $defaults = array(
                       'report_type'           => 'weekly', 
                       'user_agent'            => 'barman789@gmail.com',
                       'since'                 => date('c', strtotime('-6 Days')),
                       'until'                 => date('c'),
                       'billable'              => 'both',
                       'order_desc'            => 'on',
                       'distinct_rates'        => 'off',
                       'rounding'              => 'off',   
                       'display_hours'         => 'minutes'
                    );
        $options = array_merge($defaults, $options);
        $url = 'https://toggl.com/reports/api/v2/';
        $url .= $options['report_type'];
        unset($options['report_type']);
        
        $api_options = array();
        foreach($options as $key => $option) {
            $api_options[]= $key.'='.$option;
        }
        
        $query_string = implode('&', $api_options);
        
        $url .= '?workspace_id=' . $workspace_id;
        $url .= '&' . $query_string;
        
        $this->_callAPI($url);
 }
  
/**
 * calls the API
 *
 * @return void
 * @access private
 */
  private function _callAPI( $url, $options = array() ) { 

        $headers = $this->api_token.':api_token';
        $ch = curl_init();
        
        if(isset($options['data'])) {
             curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($options['data']));
             curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
        }
        
        if(isset($options['put'])) {
             curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        }

        if(isset($options['post'])) {
             curl_setopt($ch, CURLOPT_POST, true);
        }        
        
        if(isset($options['delete'])) {
             curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
        }        
        
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC ) ;
        curl_setopt($ch, CURLOPT_USERPWD, $headers);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);        		
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        
        $this->response = curl_exec($ch);
        curl_close($ch);
  }
}
?>