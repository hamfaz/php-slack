<?php
/**
 * class hook slack
 *
 * @author hamam fajar <hamamfajar@gmail.com> | @hamfaz
 */

class hookSlack
{

  public $api_url = '';

  public function __construct()
  {
    // construct
  }


  /**
   * postCurl
   * @return response
   */
  public function postCurl($txt)
  {

    //set POST variables
    $url = $this->api_url;
    $fields = array(
    	'text' => $txt
    );

    $fields_string = 'payload=' . json_encode($fields);

    //open connection
    $ch = curl_init();

    //set the url, POST data
    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    //execute post
    $result = curl_exec($ch);

    //close connection
    curl_close($ch);

    return $result;

  }


  /**
   * postCurl
   * @return bool
   */
  public function errorhandler($txt)
  {

    if ($this->api_url=='') {
      echo 'Please set hook url <br/>';
      return false;
    }
    if ($txt=='') {
      echo 'Data push empty <br/>';
      return false;
    }

    return true;

  }


  /**
   * postCurl
   * @return response
   */
  public function push($txt='')
  {

    // check errorhandler
    if ($this->errorhandler($txt)==false) exit();

    $this->postCurl($txt);

  }

}


?>
