<?php

	namespace google\user\user;
	use \google\user\userValidator as guuV;

	class User
	{
		public function getUserIsValid()
		{
			$validator	=	new guuV\UserValidator();

			$isValid	=	$validator->validate();

			return $isValid;
		}
	}

?>