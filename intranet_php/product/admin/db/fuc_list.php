<?php
    //引数にプレースホルダー(xss対策)
    function h($str)
    {
        return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
    }
    function set_post_flg($post_data){
        h($post_data);
        if(isset($post_data))
            return $post_data;
        else 
            return '';
    }
    
    // array→string
    function Concatenation($string_list){
        $string='';
        for ($i = 0; count($string_list) > $i; $i++) {
            if($i  != count($string_list)-1) $string.= h($string_list[$i]).",";
            else $string.= h($string_list[$i]);
        }
        return $string;
    }
    //string→array
    function array_push_string($String)
    {
        $i = 0;
        $array_list[$i] = '';
        foreach (str_split($String) as $value) {
            if ($value != ',') $array_list[$i] .= $value;
            else {
                $i++;
                $array_list[$i] = '';
            }
        }
        return $array_list;
    }
       // array→string
    function Concatenation_slash($string_list){
        $string='';
        for ($i = 0; count($string_list) > $i; $i++) {
            if($i  != count($string_list)-1) $string.= h($string_list[$i])."/";
            else $string.= h($string_list[$i]);
        }
        return $string;
    }
    //string→array
    function array_push_stringslash($String)
    {
        $i = 0;
        $array_list[$i] = '';
        foreach (str_split($String) as $value) {
            if ($value != '/') $array_list[$i] .= $value;
            else {
                $i++;
                $array_list[$i] = '';
            }
        }
        return $array_list;
    }