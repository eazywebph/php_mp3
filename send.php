<?php
    function post_captcha($user_response) {
        $fields_string = '';
        $fields = array(
            'secret' => '6LeUKCMUAAAAAEfQzvRs6dqY6baXTF-EhZU2Qp9j',
            'response' => $user_response
        );
        foreach($fields as $key=>$value)
        $fields_string .= $key . '=' . $value . '&';
        $fields_string = rtrim($fields_string, '&');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result, true);
    }

	$response = $_POST['g-recaptcha-response'];
	
    if ($response == "") {
		header('Location: contact.php?captcha=fail');
    }
	
	else {
		date_default_timezone_set('Asia/Manila');
		include('include/connect2server.php');
		
        $name = $_POST['txt_name'];
		$email = $_POST['txt_email'];
		$phone = $_POST['txt_phone'];
		$subject = $_POST['txt_subject'];
		$message = $_POST['txt_message'];
		$d_day = date('d');
		$d_month = date('M');
		$d_year = date('Y');
		$t_hour = date('g');
		$t_min = date('i');
		$t_mer = date('A');

		if ( ($subject == "") or ($message == "") ) {
			header('Location: contact.php?captcha=incomplete');
		}
		
		else {
			
			$sql = "INSERT INTO tbl_message (`msg_id`, `msg_name`, `msg_email`, `msg_phone`, `msg_subject`, `msg_message`, `msg_day`, `msg_month`, `msg_year`, `msg_hour`, `msg_minute`, `msg_meridian`) VALUES  (NULL,'$name','$email','$phone','$subject','$message','$d_day','$d_month','$d_year','$t_hour','$t_min','$t_mer')";
		
			if ($connect->connect_error) {
				die("Connection failed: ".$connect->connect_error);
			}
			
			if ($connect->query($sql) === true) {
				$connect->close();
				header('Location: contact.php?captcha=sent');
			} 
			else {
				echo "Error: " . $sql . "<br>" . $connect->error;
			}
		
		}
		
    }
?>