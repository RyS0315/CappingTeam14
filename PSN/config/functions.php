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
        $currentTime = getDate();
        $formattedDate;
        if ($currentTime[year] == $date.substring(0,4)) {
            if ($currentTime[month] == $date.substring(5,7)) {
                if ($currentTime[mday] == $date.substring(8,10)) {
                    if ($currentTime[hours] == $date.substring(11,13)) {
                        if ($currentTime[minutes] == $date.substring(14,16)) {
                            $formattedDate = $currentTime[seconds] - $date.substring(17,19) + " seconds ago";
                        }
                        else {
                            $formattedDate = $currentTime[minutes] - $date.substring(14,16) + " minutes ago";
                        }
                    }
                    else {
                        $formattedDate = $currentTime[hours] - $date.substring(11,13) + " hours ago";
                    }
                }
            }
        }
        else {
            $formattedDate = $currentTime[month] + " " + $currentTime[mday] + ", " + $currentTime[year];
        }
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
