<?php
    function print_ary($array){
        $loop = 1;
        echo '<p style="margin:0px">Array=>[ </p>';
        RecursiveArray($array, $loop);
        echo ']</br>';
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
    function checkValidPage($test,$vars){
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


    /**
     *
     * This function will take a variable and make sure it is safe from sql injection
     *
     * Example of sql injection => ';DROP TABLES; --
     *
     *
     */
    function cleanForSQL($var){
        return true;
    }

    /**
     *
     * This function will strip all html/js tags from a variriable
     * to make it safe from xss
     *
     * Example of xss => <script>alert('xss')</script>
     *
     */
    function cleanforHTML($var){
        return htmlspecialchars($var);
    }

    /**
     *
     * If date is within today, return how long ago it occured as a string ex: '2 hrs'
     * otherwise return the date as mon dd, yyyy ex: Jan 1, 2018
     *
     */
     function formatDate($date){
         $currentDate = new DateTime(null, new DateTimeZone('America/New_York'));
         $currentTime = $currentDate->format('Y-m-d H:i:s');
         $formattedDate;
         $month;
         switch (substr($date,5,2)) {
             case "01":
                 $month = "January";
                 break;
             case "02":
                 $month = "February";
                 break;
             case "03":
                 $month = "March";
                 break;
             case "04":
                 $month = "April";
                 break;
             case "05":
                 $month = "May";
                 break;
             case "06":
                 $month = "June";
                 break;
             case "07":
                 $month = "July";
                 break;
             case "08":
                 $month = "August";
                 break;
             case "09":
                 $month = "September";
                 break;
             case "10":
                 $month = "October";
                 break;
             case "11":
                 $month = "November";
                 break;
             case "12":
                 $month = "December";
                 break;
         }
         if (substr($currentTime,0,4) == substr($date,0,4)) {
             if (substr($currentTime,5,2) == substr($date,5,2)) {
                 if (substr($currentTime,8,2) == substr($date,8,2)) {
                     if (substr($currentTime,11,2) == substr($date,11,2)) {
                         if (substr($currentTime,14,2) == substr($date,14,2)) {
                             $formattedDate = intval(substr($currentTime,17,2)) - intval(substr($date,17,2))." seconds ago";
                             return $formattedDate;
                         }
                         else {
                             $formattedDate = intval(substr($currentTime,14,2)) - intval(substr($date,14,2))." minutes ago";
                             return $formattedDate;
                         }
                     }
                     else {
                         $formattedDate = intval(substr($currentTime,11,2)) - intval(substr($date,11,2))." hours ago";
                         return $formattedDate;
                     }
                 }
             }
         }
         $formattedDate = $month." ".substr($date,8,2).", ".substr($date,0,4)." ".substr($date,11,2).":".substr($date,14,2).":".substr($date,17,2);
         return $formattedDate;
     }

    /**
     *
     * Return the root of the current page so we can call any page from any folder
     *
     */
    function getRoot(){
        $root = ROOT_DIR;
        $root = str_replace("\\", "/", $root);
        $root = str_replace('/config', '',$root);
        $pageroot = getcwd() ."/";
        $pageroot = str_replace("\\", "/", $pageroot);
        $root = str_replace($root."/", '' , $pageroot);
        $root = preg_replace("#(/.*?).*?(/)#", '/../', "/".$root);
        $root = substr($root, 1);
        return $root;
    }
?>
