<?php
/**
 * Contains all the needed functionality to establish an ssh connection and run
 * commands over it.
 *
 * @author Alberto Miranda <alberto.php@gmail.com>
 */
class Shell {
    private $user = 'USER';
    private $pass = 'PASS';
    private $host = 'localhost';
    private $port = '22';
    private $output;

    /**
     * Construct object assigning shell access data sent as params.
     *
     * @author Alberto Miranda <alberto.php@gmail.com>
     * @param array $params
     */
    public function __construct($params=array()){
        //TODO: validate params

        if(!empty($params)){
            $this->user = $params['user'];
            $this->pass = $params['pass'];
            $this->host = $params['host'];
            $this->port = $params['port'];
        }
    }

    /**
     * Executes passed command on currently configured shell.
     *
     * @author Alberto Miranda <alberto.php@gmail.com>
     * @param string $command
     * @return string
     */
    public function execute($command) {
        //TODO: add logging

        //if ssh2 not available die
        if (!function_exists("ssh2_connect"))
        throw new Exception("function ssh2_connect doesn't exist");

        //if can't login return error
        if (!($con = ssh2_connect($this->host, $this->port)))
        throw new Exception("fail: unable to establish connection");

        //ok, we have ssh2 and we're already connected to the server
        //if authentication fails return error
        if (!ssh2_auth_password($con, $this->user, $this->pass))
        throw new Exception("fail: unable to authenticate");

        //allright, we're in!
        //echo "okay: logged in...\n";

        //return error if unable to execute command
        if (!($stream = ssh2_exec($con, $command )))
        throw new Exception("fail: unable to execute command");

        //collect returning data from command
        stream_set_blocking($stream, true);
        $data = "";
        while ($buf = fread($stream,4096)) $data .= $buf;
        fclose($stream);
        return $data;
    }
}//end class