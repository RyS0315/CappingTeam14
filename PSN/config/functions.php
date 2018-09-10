<?php
    function print_ary($array){
        $loop = 1;
        echo '<p style="margin:0px">Array=>[ </p>';
        RecursiveArray($array, $loop);
        echo ']';
    }

    function RecursiveArray($array, $loop){
        $paddingamnt = $loop * 60;
        $padding = $paddingamnt.'px';
        $itr = 0;
        foreach($array as $i){
            $key = array_keys($array);
            if(is_array($i)){
                $newloop = $loop +1;
                echo '<p style="margin:0px; padding-left:'.$padding.'">['.$key[$itr].']=>[</p>';
                RecursiveArray($i, $newloop);
                echo '<p style="margin:0px; padding-left:'.$padding.'">]</p>';
            }
            else{
                echo '<p style="margin:0px; padding-left:'.$padding.'">['.$key[$itr].']=>'.$i.'</p>';
                $itr += 1;
            } 
        }
    }

    /**
    * Function to determine if a page is valid based
    * on the get vars being passed
    *
    * $test => An array of all the valid values for a get var
    * $vars => An array of all GET vars allowed for a page
    *
    * If no get vars are on a page set $test[] = [0] and $vars = ['']
    *
    */
    function checkValid($test,$vars){
        $isvalid = array_filter(
            $test,
            function($value,$key){
                return !in_array($key, $value);
            },
            ARRAY_FILTER_USE_BOTH
        );
    
        $varsvalid = true;
        $keys = array_keys($_GET);
        if(isset($_GET)){
    
            foreach($keys as $i){
                $validvar = false;
                foreach($vars as $check){
                    if($validvar){
                    continue;
                }
                if($i == $check){
                    $validvar = true;
                    continue;
                }
            }
                if($validvar){
                    continue;
                }else{
                    $varsvalid = false;
                }
            }
        }
    
        if(!empty($isvalid) || !$varsvalid){
            header('location:index.php');
            exit;
        }
    }
 
?>