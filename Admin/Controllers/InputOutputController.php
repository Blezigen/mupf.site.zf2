<?php
namespace Controllers;
/**
 * Created by PhpStorm.
 * User: Ильяс
 * Date: 09.07.2016
 * Time: 15:46
 */
class InputOutputController {
    function __construct() {}

    public function array_to_string($array_values, $splitter = " "){
        $array_str = "";
        if (!empty($array_values)) {
            foreach ($array_values as $array_value) {
                if (empty($array_str)){
                    $array_str = $array_value;
                }
                else {
                    $array_str .= $splitter . $array_value;
                }
            }
        }
        return $array_str;
    }

    public function save_file($path_file, $data){
        if (file_exists($path_file)){
            $result = date('Y_m_d_H_i_s');
            copy( $path_file, "../loged/[".$result."].".basename($path_file) );
        }
        $fp = fopen($path_file, "w");
        fwrite($fp, $data);
        fclose($fp);
    }

    public function end_str()
    {
        return "\n";
    }

    public function tab($count_tab = 1)
    {
        $tab = "";
        for ($i = 0; $i < $count_tab; $i++ ){
            $tab = $tab."\t";
        }
        return $tab;
    }

    // Офигенная фукция вытаскивает значение из массива при помощи строки [foo][bar] в массиве foo => array(bar => int(8))) извлечет 8
    public function get_value_in_array_as_string($arr, $string)
    {
        preg_match_all('/\[([^\]]*)\]/', $string, $arr_matches, PREG_PATTERN_ORDER);
        $return = $arr;
        foreach($arr_matches[1] as $dimension)
        {
            $return = $return[$dimension];
        }
        return $return;
    }

    // Вероятно не будет пахать на чужом хостинге из за использования указателей
    public function set_value_in_array_as_string(&$arr, $string, $val)
    {
        preg_match_all('/\[([^\]]*)\]/', $string, $arr_matches, PREG_PATTERN_ORDER);
        $return = &$arr;
        foreach($arr_matches[1] as $dimension)
        {
            $return = &$return[$dimension];
        }
        $return = $val;
    }

    // моя попытка чтобы работала без указателей
    public function get_changed_array_value_as_string(&$arr, $string, $val)
    {
//        Короче пока замороженно
//        preg_match_all('/\[([^\]]*)\]/', $string, $arr_matches, PREG_PATTERN_ORDER);
//        $return = &$arr;
//        foreach($arr_matches[1] as $dimension)
//        {
//            $return = &$return[$dimension];
//        }
//        $return = $val;
    }

}