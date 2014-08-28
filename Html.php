<?php
	
	class Html {

		private $_directory;
		private $_status = false;

		public function __construct() {
			$this->_directory = "views/";
			$getFiles = scandir($this->_directory);
			if ($getFiles == false) {
				$this->_status = false;
			} else {
				$this->_status = true;
			}
		}

		public function getStatus() {
			return $this->_status;
		}

		public function includeHeader() {
			require_once($this->_directory . "header.php");
		}

		public function includeFooter() {
			require_once($this->_directory . "footer.php");
		}
	}