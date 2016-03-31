<?php

class Wrapper {

	function wrap($text, $lineLength) {
		$text = trim($text);
		if (strlen($text) <= $lineLength)
			return $text;
		if (strpos(substr($text, 0, $lineLength), ' ') != 0)
			return substr ($text, 0, strrpos($text, ' ')) . "\n" . $this->wrap(substr($text, strrpos($text, ' ') + 1), $lineLength);
		return substr ($text, 0, $lineLength) . "\n" . $this->wrap(substr ($text, $lineLength), $lineLength);
	}

}

?>