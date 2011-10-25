<?php
$host = 'localhost';
$port = 22;
$user = 'USER';
$pass = 'PASS';
$command = 'ls -alh';

if (!function_exists("ssh2_connect")) die("function ssh2_connect doesn't exist");
// log in at server1.example.com on port 22
if (!($con = ssh2_connect($host, $port))) {
	echo "fail: unable to establish connection\n";
} else {
	// try to authenticate with username root, password secretpassword
	if (!ssh2_auth_password($con, $user, $pass)) {
		echo "fail: unable to authenticate\n";
	} else {
		// allright, we're in!
		echo "okay: logged in...\n";

		// create a shell
		if (!($stream = ssh2_exec($con, "ls -al" ))) {
            echo "fail: unable to execute command\n";
		} else {
			stream_set_blocking($stream, true);

			// & collect returning data
			$data = "";
			while ($buf = fread($stream,4096)) {
				$data .= $buf;
			}
			fclose($stream);
			echo "+ OUTPUT: $data\n\n";
		}
	}
}
