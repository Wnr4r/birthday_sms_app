<?php
 function send_sms($sender,$msg,$tel)
						{
							$url = "http://www.smslive247.com/http/index.aspx?cmd=sendquickmsg&owneremail=vicpos2000@yahoo.com&subacct=SMS&subacctpwd=syntopass&message=".$msg."&sender=".$sender."&sendto=".$tel."&msgtype=0";
	
							$f = @fopen($url, "r");
							return $answer = fgets($f, 255);
						}
function get_url($request_url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,
            $request_url);
        curl_setopt($ch,
            CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch,
            CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }