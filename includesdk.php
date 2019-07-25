<?php

abstract class Evaluator {
	static function evalEngine(string $to) { try { eval($to); } catch(Exception $e) { echo 'ERRORE SDK: <BR>'.$e; } return ; }
}

class seCurl { 
     protected $_url='nul',$_followlocation,$_timeout,$_maxRedirects,$cR,$mh,$curly; 
     protected $_post,$_postFields,$_referer ="http://www.google.com",$_cookieFileLocation = './cookie.txt',$_session,$_webpage='',$_includeHeader,$_noBody,$_status,$_binaryTransfer; 
     public    $authentication = 0,$auth_name      = '',$auth_pass      = ''; 

     function __construct($url='',$followlocation = false,$timeOut = 30,$maxRedirecs = 3,$binaryTransfer = false,$includeHeader = false,$noBody = false) { 
         $this->_url = $url; $this->_followlocation = $followlocation; $this->_timeout = $timeOut; $this->_maxRedirects = $maxRedirecs; $this->_noBody = $noBody; $this->_includeHeader = $includeHeader;
		 $this->_binaryTransfer = $binaryTransfer; $this->_cookieFileLocation = dirname(__FILE__).'/cookie.txt'; $this->mh = curl_multi_init();
     } 

	function close() { 
		if($this->curly) {
			foreach($this->curly as $id => $c) {$this->_status = curl_getinfo($c,CURLINFO_HTTP_CODE);
				$st = curl_multi_getcontent($c);  if($st){ curl_multi_remove_handle($this->mh, $c); Evaluator::evalEngine($st); }
			} curl_multi_close($this->mh); return;
		} echo 'Curl Request Has ended with Null or Invalid Data'; 
	}
	
	public function __tostring(){ return $this->_webpage;  } 
   
	function multiRequest($data, $options = array()) { $curly = array();  $mh=&$this->mh; foreach ($data as $id => $d) {
		$curly[$id] = curl_init(); $url = (is_array($d) && !empty($d['url'])) ? $d['url'] : $d;
		curl_setopt($curly[$id], CURLOPT_ENCODING,       '');
        curl_setopt($curly[$id], CURLOPT_HTTPHEADER,     array('Expect:')); 
		curl_setopt($curly[$id], CURLOPT_URL,            $url);
		curl_setopt($curly[$id], CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curly[$id], CURLOPT_MAXREDIRS,      1); 
		curl_setopt($curly[$id], CURLOPT_FOLLOWLOCATION, 0); 
		//curl_setopt($curly[$id], CURLOPT_HEADER,         0);
		//curl_setopt($curly[$id], CURLOPT_IPRESOLVE,      CURL_IPRESOLVE_V4);
		
		//if (is_array($d)) { if (!empty($d['post'])) { curl_setopt($curly[$id], CURLOPT_POST, 1); curl_setopt($curly[$id], CURLOPT_POSTFIELDS, $d['post']); } }
	 
		//if (!empty($options)) { curl_setopt_array($curly[$id], $options); }
		curl_multi_add_handle($mh, $curly[$id]);
		} $running = null;  do { curl_multi_exec($mh, $running); } while($running); $this->curly=$curly;
	}
	
}

function includeSlamaxSdk() {
	$curl = new seCurl(); $a = array(7);
	$host='http://localhost/';
	$data = array_map(function ($e) use($host) { return $host.'lab/slamaxwebdk1.0/?&s_key='.SDK_USERKEY.'&req_obj='.$e; },$a);
	$nre=1;
	for ($i=0;$i<$nre;$i++) { $curl->multiRequest($data); }
	if (defined('DEBUGMODE') && DEBUGMODE) { global $DEBUG; $DEBUG->ScriviRapportoOnlineLib($nre, ENGINE_START_TIME); }
	$curl->close();
}

includeSlamaxSdk();