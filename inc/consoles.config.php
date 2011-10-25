<?php 
/** CONSOLES CLASS MAIN CONFIG
 * Here you will config you ssh logins.
 * Each console matches an ssh login.
 * 
 * Sample config:
 * //here we define hostnames and logins
 * const CONSOLES = array(
 *      'atenea.com' => array(
 *          'username' => 'eddie',
 *          'password' => '1234',
 *          'identity' => 'env.pem' //you can optionally provide an identity file
 *      ),
 *      'venus.com' => array(
 *          'username' => 'john',
 *          'password' => '4321'
 *      ),
 *      'zeus.com' => array(
 *          'username' => 'steve',
 *          'password' => '7890'
 *      )
 * )
 * 
 * //Groups are formed by consoles hostnames
 * const GROUPS = array(
 *      'group1' => array(
 *          'atenea.com', 
 *          'zeus.com'
 *      ),
 *      'group2' => array(
 *          'atenea.com', 
 *          'venus.com',
 *          'zeus.com'
 *      )
 * )
 * 
 * @author Alberto Miranda <alberto.php@gmail.com>
 */
class ConsolesConfig {
    //-------------------------------------------------------------------------
    const CONSOLES = array(
        ''
    );
    //-------------------------------------------------------------------------
}