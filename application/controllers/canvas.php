<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Canvas extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->helper(array('url','form'));
    //Do your magic here
  }

  public function index()
  {
    $file = fopen('csv.csv', 'r');
    $number = array();
    $x1 = array();
    $y1 = array();
    $tan = array();
    $deg = array();

    $first = fgetcsv($file);
    $csv1 = fgetcsv($file);
    $max = array(
      'x'=>(double)$csv1[2],
      'y'=>(double)$csv1[3]
    );
    $min = $max;

    $top[][10] = array();
    $bottom[][10] = array();

    while(! feof($file))
    {
      $csv = fgetcsv($file);

      if($csv[3] >= $max['y']) {
        $max['x'] = (double)$csv[2];
        $max['y'] = (double)$csv[3];
      }

      if($csv[3] <= $min['y']) {
        $min['x'] = (double)$csv[2];
        $min['y'] = (double)$csv[3];
      }

      array_push($number,$csv[0]);
      array_push($x1,(double)$csv[2]);
      array_push($y1,(double)$csv[3]);
      array_push($tan,$csv[4]);
      array_push($deg,$csv[5]);
    }

    for($i=0;$i<count($x1);$i++)
    {
      if($y1[$i] == $max['y'])
      {
        $data['show'][$i] = array($x1[$i],$y1[$i],'MAX');
      }
      else if($y1[$i] == $min['y'])
      {
        $data['show'][$i] = array($x1[$i],$y1[$i],'MIN');
      }
      else
      {
        $data['show'][$i] = array($x1[$i],$y1[$i],null);
      }
    }
    $data['max'] = $max;
    $data['min'] = $min;

    $this->load->view('index',$data);
  }

}

/* End of file canvas.php */
/* Location: ./application/controllers/canvas.php */