<?php
require_once("detail_message.php");
class MessageFactory{
	static function init($post_data) {
		$postObj = simplexml_load_string($post_data, 'SimpleXMLElement', LIBXML_NOCDATA);
        $keyword = trim($postObj->Content);	
        $clas_name = self::_get_class_name($keyword);
        return new $clas_name($postObj);
	}


	private static function _get_class_name($keyword) {
		$messageObj = null;
		if($keyword=="detail") {
			$messageObj = "DetailMessage";
		}
		return $messageObj;
	}
}

?>