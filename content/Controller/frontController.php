<?php

		namespace PracticaComposer\Content\Controller;

		use PracticaComposer\Content\Config\ConfigSistema\sysConfig as sysConfig;

		class frontController extends sysConfig{

			private $url;

			public function __construct($url){
				if(isset($url["url"])){
					$this->url = $url["url"];
				}else{
					$this->url = "practica";
				}

				$this->verificarURL();
			}

			private function verificarURL(){
				$pattern = preg_match_all("/^[a-zA-Z0-9-@\/.=:_#$ ]{1,700}$/",$this->url);
				if($pattern == 1){
					$this->_loadPage($this->url);
				}else{
					die("<script>location='?url=practica'</script>");
				}
			}

			private function _loadPage(){
				if(file_exists($this->_Dir_().$this->url.$this->_Contro_())){
					require_once($this->_Dir_().$this->url.$this->_Contro_());
				}else{
					$url = "practica";
					if(file_exists($this->_Dir_().$this->url.$this->_Contro_())){
						require_once($this->_Dir_().$this->url.$this->_Contro_());
					}else{
						require_once($this->_Dir_().$this->url.$this->_Contro_());
					}
				}
			}
		}

?>