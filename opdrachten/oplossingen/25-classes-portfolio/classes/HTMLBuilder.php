<?php

	class HTMLBuilder {

		protected $header;
		protected $body;
		protected $footer;
	
		public function __construct($header, $body, $footer){
			$this->header	=	$header;
			$this->body		=	$body;
			$this->footer	=	$footer;
			
			$this->buildPage();
		}
		
		public function buildHeader(){
			$cssDir	=	 dirname(dirname(__FILE__)) . '/css/';
			$filesArray	=	$this->findFiles($cssDir, 'css');
			
			$cssLinks	=	$this->createCssLink($filesArray);
		
			include 'HTML/'. $this->header;
		}	
		
		public function buildBody(){
			include 'HTML/'. $this->body;
		}	
		
		public function buildFooter(){
			$jsDir	=	 dirname(dirname(__FILE__)) . '/js/';
			$filesArray	=	$this->findFiles($jsDir, 'js');
			
			$jsScripts	=	$this->createJsScripts($filesArray);
			
			include 'HTML/'. $this->footer;
		}
		
		public function buildPage(){
			$this->buildHeader();
			$this->buildBody();
			$this->buildFooter();
		}
		
		public function findFiles($dir, $file){
			
			return glob($dir . '/*.' . $file);	
		}
		
		public function createCssLink($filesArray){
			$dumpArray	=	array();
			
			foreach ($filesArray as $file){
				$fileInfo	=	pathinfo($file);
				$fileName	=	$fileInfo['basename'];
				
				$dumpArray[] = '<link rel="stylesheet" type="text/css" href="css/' . $fileName . '">';
			}
			
			return implode('', $dumpArray);
		}
		
		public function createJsScripts($filesArray){
			$dumpArray	=	array();
			
			foreach ($filesArray as $file){
				$fileInfo	=	pathinfo($file);
				$fileName	=	$fileInfo['basename'];
				
				$dumpArray[] = '<script src="js/' . $fileName . '"></script>';
			}
			
			return implode('', $dumpArray);
		}
	}


?>