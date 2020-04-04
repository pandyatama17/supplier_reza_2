<?php
  function thousandsToK($num) {

    if($num>1000) {

          $x = round($num);
          $x_number_format = number_format($x);
          $x_array = explode(',', $x_number_format);
          $x_parts = array('K', 'Jt.', 'B', 'T');
          $x_count_parts = count($x_array) - 1;
          $x_display = $x;
          $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
          $x_display .= $x_parts[$x_count_parts - 1];

          return $x_display;

    }

    return $num;
}
  function rupiah($e)
  {
    return "Rp. ".number_format($e,0,',','.').",-";
  }
  function generateRandomString($length = 6)
  {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
  }
  function getPosition(array $arr, $key) {
    $it = new RecursiveIteratorIterator(new RecursiveArrayIterator($arr),
        RecursiveIteratorIterator::SELF_FIRST);
    $pos = array();
    foreach ($it as $k => $v) {
        if (count($pos) - 1 > $it->getDepth()) {
            array_pop($pos);
            $pos[$it->getDepth()]++;
        }
        elseif (count($pos) - 1 < $it->getDepth()) {
            array_push($pos, 0);
        }
        else {
            $pos[$it->getDepth()]++;
        }
        if ($k === $key) {
            return $pos;
        }
    }
}
?>
