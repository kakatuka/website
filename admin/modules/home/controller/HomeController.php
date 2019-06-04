<?php 
session_start();
class HomeController extends Controller{
	public $modelHome;
	public $fileJson;
	public $callback;
	public $data_settings;
	//public $loadPages;
	public function __construct(){
		parent::__construct();
		$this->modelHome = $this->loadModel('Home');
		$this->data_settings = $this->modelHome->getSettingsOne();
		$this->fileJson = $this->returnFiles($this->data_settings['google_file_json']);
		$this->callback = base_url().'settings/settings/index';
		// 'home/home/oauth2callback';
		//'http://' . $_SERVER['HTTP_HOST'] . '/admin/home/home/oauth2callback';
	}
	public function index(){
		global $_web;
		//$this->view->data  = $this->modelHome->getUserById(1);

		
		try{
		// Create the client object and set the authorization configuration
		// from the client_secretes.json you downloaded from the developer console.
		$client = new Google_Client();
		$client->setAuthConfig($this->fileJson);
		$client->addScope(Google_Service_Analytics::ANALYTICS_READONLY);

		} catch (Exception $e) {
		  	redirect(base_url().'settings/settings/index');
		  }

		// If the user has already authorized this app then get an access token
		// else redirect to ask the user to authorize access to Google Analytics.

		if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
		  // xử lý ngoại lệ khi google analytic chưa cấp quyền
		  try {
					  // Set the access token on the client.
					  $client->setAccessToken($_SESSION['access_token']);
					  // Create an authorized analytics service object.
					  $analytics = new Google_Service_Analytics($client);
					  

					  // Get the first view (profile) id for the authorized user.
					  $profile = $this->getFirstProfileId($analytics);

					  // Get the results from the Core Reporting API and print the results.

					  // lấy dữ liệu tạo biểu đồ
					  // Lấy các trường dữ liệu: tổng lượt truy cập, lượt truy cập , trang
						$metrics = 'ga:visits,ga:pageviews'; //ga:sessions,
						// link xem https://ga-dev-tools.appspot.com/query-explorer/?csw=1#report-end
						//Lấy giá trị theo giờ , theo vị trí, theo , link web, title
						$optParams = array("dimensions" => "ga:day");

					  	try {
						  	$results = $this->getResults($analytics, $profile,$metrics,$optParams,'30daysAgo','today');
						  	
						  }catch (Exception $exc) {
								$results = $this->getResults($analytics, $profile,$metrics,$optParams,'30daysAgo','today');
						}
						//$this->view->data['stats'] = $this->printResults($results);
						//dữ liệu tạo biểu đồ
						$this->view->data['stats'] = $results['rows'];



						// dữ liệu truy cập pages
						$metrics_pages = "ga:sessions,ga:pageviews,ga:avgTimeOnPage";
					 	$optParams_pages = array("dimensions" => "ga:fullReferrer,ga:pagePath,ga:country,ga:dateHour","sort"=>"-ga:dateHour"); // view pages and sort
						try {
						  	$results_pages = $this->getResults($analytics, $profile,$metrics_pages,$optParams_pages);
						  	
						  }catch (Exception $exc) {
							$results_pages = $this->getResults($analytics, $profile,$metrics_pages,$optParams_pages);
						}
						$this->view->data['stats_pages'] = $this->printResults($results_pages);


						// dữ liệu trình duyệt đã truy cập trong tháng
						$metrics_browser = "ga:sessions";
					 	$optParams_browser = array("dimensions" => "ga:browser"); // view pages and sort
						try {
						  	$results_browser = $this->getResults($analytics, $profile,$metrics_browser,$optParams_browser,'30daysAgo','today');
						  	
						  }catch (Exception $exc) {
							$results_browser = $this->getResults($analytics, $profile,$metrics_pages,$optParams_pages,'30daysAgo','today');
						}
						$this->view->data['stats_browser'] = $this->printResults($results_browser);


						// tong lươt truy cap trong thang
						$metrics_count_month = "ga:sessions";
					 	$optParams_count_month = array("dimensions" => ""); // view pages
						try {
						  	$results_pages = $this->getResults($analytics, $profile,$metrics_count_month,$optParams_count_month,'30daysAgo','today');
						  	
						  }catch (Exception $exc) {
							$results_pages = $this->getResults($analytics, $profile,$metrics_count_month,$optParams_count_month,'30daysAgo','today');
						}

						$this->view->data['session_month'] = $this->printResults($results_pages);


						$this->view->data['total_order'] = $this->modelHome->getTotalOrder();
						$this->view->data['new_order'] = $this->modelHome->getNewOrder();
						$this->view->data['user'] = $this->modelHome->getTotalUser();

						//history user and ip login

						$history = $this->modelHome->getUserOnline();
						foreach ($history as $key => $value) {
							//86400 = 1 day
							$time_current = time() - $value['time'];
							if ($time_current > 86400) {
								$day = ceil($time_current/86400);
								$history[$key]['thoigianhienthi'] = 'đã đăng nhập vào hệ thống. <span class="small italic">Cách đây '.$day.' ngày</span>.';
							}else{
								$m = ceil($time_current / 60);
								if ($m>60) {
									$h = ceil($time_current / 3600);
									$history[$key]['thoigianhienthi'] = 'đã đăng nhập vào hệ thống. <span class="small italic">Cách đây '.$h.' giờ</span>.';
								}else{
									$history[$key]['thoigianhienthi'] = 'vừa đăng nhập vào hệ thống. <span class="small italic">Cách đây '.$m.' phút</span>.';
								}
							}
						}
						$this->view->data['history'] = $history;




						$this->view->render('index');

			// xử lý ngoại lệ khi google analytic chưa cấp quyền
			}catch (Exception $e) {
				$this->view->render('error_analytics');
			  	//redirect(base_url().'settings/settings/index');
			}
		  
		

		} else {
		  $redirect_uri = $this->callback;
		  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
		}
	}
	public function oauth2callback(){
		try {
			// Create the client object and set the authorization configuration
			// from the client_secrets.json you downloaded from the Developers Console.
			$client = new Google_Client();
			$client->setAuthConfig($this->fileJson);
			$client->setRedirectUri($this->callback);
			$client->addScope(Google_Service_Analytics::ANALYTICS_READONLY);

			// Handle authorization flow from the server.
			if (! isset($_GET['code'])) {
			  $auth_url = $client->createAuthUrl();
			  header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
			} else {
			  $client->authenticate($_GET['code']);
			  $_SESSION['access_token'] = $client->getAccessToken();
			  $redirect_uri = base_url().'home/home/index';//'http://' . $_SERVER['HTTP_HOST'] . '/admin/home/home/index';
			  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
			}
		} catch (Exception $e) {
			$this->view->render('oauth2callback_error');
		}
		

	}
	public function getFirstProfileId($analytics) {
	  // Get the user's first view (profile) ID.

	  // Get the list of accounts for the authorized user.
	try {
		$accounts = $analytics->management_accounts->listManagementAccounts();
	} catch (Exception $e) {
		redirect(base_url().'login/login/logout');
	}
	  
	  if (count($accounts->getItems()) > 0) {
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
	    throw new Exception('No accounts found for this user.');
	  }
	}
	public function getResults($service, $profileId,$metrics=null,$optParams=null,$startDate = '1daysAgo',$endDate = 'today') {
			if ($metrics==null && $optParams==null) {
				return false;
			}else{
				// Calls the Core Reporting API and queries for the number of sessions
		  		// for the last seven days.
		  				return $service->data_ga->get(
					       'ga:'.$this->data_settings['google_site_verification'],// . $profileId,
					       $startDate,
					       $endDate,
					       $metrics,
					       $optParams
					     );
				   
			}
		
	}
	public function printResults($results) {
	  // Parses the response from the Core Reporting API and prints
	  // the profile name and total sessions.
	  if (count($results->getRows()) > 0) {

	    // Get the profile name.
	    $profileName = $results->getProfileInfo()->getProfileName();

	    // Get the entry for the first entry in the first row.
	    $rows = $results->getRows();
	    return $rows;
	    /*$sessions = $rows[0][0];

	    // Print the results.
	    print "<p>First view (profile) found: $profileName</p>";
	    print "<p>Total sessions: $sessions</p>";*/
	  } else {
	    print_r("<p>No results found.</p>");
	  }
	}
	public function getAjaxAnalytics(){
		if ($this->input->post('end_time') && $this->input->post('start_time')) {
			$start = $this->input->post('start_time');
			$end = $this->input->post('end_time');

			try{
			// Create the client object and set the authorization configuration
			// from the client_secretes.json you downloaded from the developer console.
			$client = new Google_Client();
			$client->setAuthConfig($this->fileJson);
			$client->addScope(Google_Service_Analytics::ANALYTICS_READONLY);

			} catch (Exception $e) {
			  	//redirect(base_url().'settings/settings/index');
			}
			if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
				try{
						  // Set the access token on the client.
						  $client->setAccessToken($_SESSION['access_token']);
						  // Create an authorized analytics service object.
						  $analytics = new Google_Service_Analytics($client);
						  

						  // Get the first view (profile) id for the authorized user.
						  $profile = $this->getFirstProfileId($analytics);

						  	// Get the results from the Core Reporting API and print the results.

						  	// dữ liệu truy cập pages
							$metrics_pages = "ga:sessions,ga:pageviews,ga:avgTimeOnPage";
						 	$optParams_pages = array("dimensions" => "ga:fullReferrer,ga:pagePath,ga:country,ga:dateHour","sort"=>"-ga:dateHour"); // view pages and sort
							try {
							  	$results_pages = $this->getResults($analytics, $profile,$metrics_pages,$optParams_pages,$start,$end);
							  	
							  }catch (Exception $exc) {
								$results_pages = $this->getResults($analytics, $profile,$metrics_pages,$optParams_pages,$start,$end);
							}
							$stats_pages = $this->printResults($results_pages);
							$html='';
							if (!empty($stats_pages)) {
	                          $i=1;
	                          foreach ($stats_pages as $key => $value) { 
	                              $html.='<tr>
	                                <td>'.$i.'</td>
	                                <td>'.$value[0].'</td>
	                                <td>'.$value[2].'</td>
	                                <td><a href="'.replaceAdmin(base_url()).$value[1].'" target="_blank">'.$value[1].'</a></td>
	                                <td>'.$value[4].'</td>
	                                <td>'.$value[5].'</td>
	                                <td>'.$value[6].'</td>
	                                <td>'.slowerDateAnalytics($value[3]).'</td>
	                              </tr>';
	                            $i++;
	                          }
	                        }else{
	                        	$html .='<div class="alert alert-danger alert-dismissable fade in">
										    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										    <strong>Cảnh báo!</strong> Dữ liệu không có sẵn.
										  </div>';
	                        }
	                        echo json_encode(array('status'=>true,'html'=>$html));



				// xử lý ngoại lệ khi google analytic chưa cấp quyền
				}catch (Exception $e) {
					
				  	//redirect(base_url().'settings/settings/index');
				}
			}
		}
	}
	//public function userOnline(){
		//$my_ip = getHostByName(php_uname('n'));
		/*$my_ip = getIp();
		$my_url = $_SERVER['PHP_SELF'];



		$sql = "SELECT * FROM online WHERE ip = '".$my_ip."'";
		$count = $database->count_query($sql);

		$count =$this->modelHome->getCountUser($my_ip);

		$data = array(
		  'ip'  => $my_ip,
		  'url' => $my_url,
		  'time'  => time()
		);
		if ($count>0) {
		  $where = array(
		    array('ip',$my_ip,'and'),
		        array('url',$my_url)
		  );
		  $database->update('online',$data,$where);
		}else{
		  // nếu chưa có ip trong database thì thêm địa chỉ ip mới vào
		  $database->insert('online',$data);

		}
		$time = time();
		$database->delete_sql("DELETE FROM online WHERE `time` + 1 < $time");

		// Select
		$data_ip = $database->query("SELECT * FROM online");


		if (isset($data_ip) && !empty($data_ip)) {
		  echo "<pre>";
		  print_r($data_ip);
		  echo "</pre>";
		}*/
	// }
	public function setLang(){
		$lang = $this->input->post('lang');
		//Session::create(array('lang'=> $lang));
		$cookie_name = "lang";
		$cookie_value = $lang;
		setcookie($cookie_name, $cookie_value, time() + (86400 * 365), "/"); // 86400 = 1 day




		$data = array(
			'status' => true,
			'mess'	 => 'Success'
		);
		
		echo json_encode($data);
	}
	public function notfound(){
		$this->view->render('404',false);
	}

	/*public function __destruct(){
		$this->loadView();
	}*/
	
}