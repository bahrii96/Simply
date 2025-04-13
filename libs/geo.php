<?php


require_once 'vendor/autoload.php';
use GeoIp2\Database\Reader;
$reader = new Reader(__DIR__.'/vendor/GeoLite2-City.mmdb');
$record = $reader->city(getIPAddress());
$iso_code = strtolower($record->country->isoCode);
$current = pll_current_language();
$url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$slug = PLL()->curlang->slug;

if((!strstr(strtolower($_SERVER['HTTP_USER_AGENT']), "googlebot")) and (!isset($_COOKIE['wpb_visit_check']))) {

	if(($current !== $iso_code) and (!is_admin()) and ($_SERVER['HTTP_REFERER'] === null or $_SERVER['HTTP_REFERER'] == 'https://www.google.com/') and (strpos($url, '/admin') === false) and (strpos($url, 'wp-admin') === false)) {
		
		if (($iso_code == 'ua') and (strpos($url, '/ua/') === false)) {
			//PLL()->curlang = PLL()->model->get_language( $iso_code );
			if (('/'.$iso_code.'/') !== $_SERVER['REQUEST_URI']) {
				$ut = str_replace('//', '/', pll_home_url($iso_code).$_SERVER['REQUEST_URI']);
				$ut = str_replace($slug.'/', '', $ut);
				$ut = str_replace('https:/', 'https://', $ut);

				/*if (isUrlValid($ut)) {
					wp_redirect($ut);
					exit;
				}*/
			} else {
				/*wp_redirect(pll_home_url($iso_code));
				exit;*/
			}
		} else if (($iso_code == 'pl') and (strpos($url, '/pl/') === false)) {
			
			//PLL()->curlang = PLL()->model->get_language( $iso_code );
			if ('/'.$iso_code.'/' !== $_SERVER['REQUEST_URI']) {
				$ut = str_replace('//', '/', pll_home_url($iso_code).$_SERVER['REQUEST_URI']);
				$ut = str_replace($slug.'/', '', $ut);
				$ut = str_replace('https:/', 'https://', $ut);

				/*if (isUrlValid($ut)) {
					wp_redirect($ut);
					exit;
				}*/
			} else {
				/*wp_redirect(pll_home_url($iso_code));
				exit;*/
			}
		} else {
			
			if ((strpos($url, '/ua/') !== false) or (strpos($url, '/pl/') !== false)) {
				//PLL()->curlang = PLL()->model->get_language( pll_default_language() );
				if ('/'.$iso_code.'/' !== $_SERVER['REQUEST_URI']) {
					$ut = str_replace('//', '/', pll_home_url(pll_default_language()).$_SERVER['REQUEST_URI']);
					$ut = str_replace($slug.'/', '', $ut);
					$ut = str_replace('https:/', 'https://', $ut);

					/*if (isUrlValid($ut)) {
						wp_redirect($ut);
						exit;
					}*/
				} else {
					/*wp_redirect(pll_home_url(pll_default_language()));
					exit;*/
				}
			}
		}

	}

} else if (($_COOKIE['pll_language_set_user'] !== $_COOKIE['pll_language']) and (!is_admin()) and ($_SERVER['HTTP_REFERER'] === null or $_SERVER['HTTP_REFERER'] == 'https://www.google.com/') and (strpos($url, '/admin') === false) and (strpos($url, 'wp-admin') === false)) {
	
	//PLL()->curlang = PLL()->model->get_language( $_COOKIE['pll_language'] );
	if ('/'.$_COOKIE['pll_language'].'/' !== $_SERVER['REQUEST_URI']) {
		$ut = str_replace('//', '/', pll_home_url($_COOKIE['pll_language']).$_SERVER['REQUEST_URI']);
		$ut = str_replace($slug.'/', '', $ut);
		$ut = str_replace('https:/', 'https://', $ut);		

		/*if (isUrlValid($ut)) {
			setcookie('pll_language_set_user', pll_current_language(), time()+31556926);
			setcookie('wpb_visit_check', true, time()+31556926);
			wp_redirect($ut);
			exit;
		}*/
	} else {		
		/*setcookie('pll_language_set_user', pll_current_language(), time()+31556926);
		setcookie('wpb_visit_check', true, time()+31556926);
		wp_redirect(pll_home_url($_COOKIE['pll_language']));
		exit;		*/
	}
}

//unset($_COOKIE['pll_language_set_user']);
setcookie('pll_language_set_user', pll_current_language(), time()+31556926);
setcookie('wpb_visit_check', true, time()+31556926);

function getIPAddress() {
	if(!empty($_SERVER['HTTP_CLIENT_IP'])) {
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else{
		$ip = $_SERVER['REMOTE_ADDR'];
	}
	return $ip;
}

function isUrlValid($url) {	
	$context = stream_context_create(['http' => ['ignore_errors' => true]]);
	$content = file_get_contents($url, false, $context);
	$headers = $http_response_header;
	foreach ($headers as $header) {
		if ((stripos($header, 'HTTP/1.1 404') !== false) or (stripos($header, 'HTTP/1.1 302') !== false) or (stripos($header, 'HTTP/1.1 301') !== false)) {
            return false;
        }
    }
    return true;
}

