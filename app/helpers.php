<?php

/**
 * @param $object
 * @return mixed
 */
function objectToArray($object)
{
    return json_decode(json_encode($object), true);
}

/**
 * @param $Array
 * @return mixed
 */
function arrayToobject($Array)
{
    return json_decode(json_encode($Array));
}

/**
 * @param $Item
 */
function sp($Item)
{
    echo "<pre>";
    print_r($Item);
    echo "</pre>";
}

/**
 * @param $Item
 */
function spd($Item)
{
    echo "<pre>";
    print_r($Item);
    echo "</pre>";
    die();
}

/**
 * @param $Item
 */
function sda($Item)
{
    if (!Request::ajax()) {
        sd($Item);
    }
}

/**
 * @param $Item
 */
function sa($Item)
{
    if (!Request::ajax()) {
        s($Item);
    }
}

/**
 * @param $seconds
 * @return string
 */
function formatDuration($seconds)
{

    $hours = floor($seconds / 3600);
    $minutes = floor(($seconds / 60) % 60);
    $seconds = $seconds % 60;
    $returnTime = [0 => 0, 1 => 0];
    if ($hours > 0) $returnTime[0] = $hours;
    if ($minutes > 0) $returnTime[1] = $minutes;
    if ($seconds > 0 && $minutes == 0 && $hours == 0) $returnTime[2] = $seconds;
    return $returnTime[0] . ' Hours and ' . $returnTime[1] . ' Minutes';
}

/**
 * @param $meter
 * @param bool $show_meter
 * @return string
 */
function formatDistance($meter, $show_meter = true)
{

    $km = floor(($meter / 1000) % 1000);
    $m = $meter % 1000;


    $returnDistance = [0 => 0, 1 => 0];
    if ($km > 0) $returnDistance[0] = $km;
    if ($m > 0 && $show_meter) $returnDistance[1] = $m;


    return $returnDistance[0] . '.' . $returnDistance[1] . ' KM';
}

/**
 * @param $ptime
 * @return string
 */
function getTimeago($ptime)
{
    $estimate_time = time() - $ptime;
    if ($estimate_time < 1) {
        return 'Just now';
    }

    $condition = array(
        12 * 30 * 24 * 60 * 60 => 'year',
        30 * 24 * 60 * 60 => 'month',
        24 * 60 * 60 => 'day',
        60 * 60 => 'hour',
        60 => 'minute',
        1 => 'second'
    );
    foreach ($condition as $secs => $str) {
        $d = $estimate_time / $secs;
        if ($d >= 1) {
            $r = round($d);
            return $r . '&nbsp;' . $str . ($r > 1 ? 's' : '') . '&nbsp;ago';
        }
    }
}

/**
 * @param $url
 * @return mixed
 */
function urldecode_array($url)
{
    parse_str($url, $arr);
    return $arr;
}

/**
 * @param string $function
 * @param $Array
 * @param int $empty_val
 * @return array
 * @throws ReflectionException
 */
function arrayMapMulti($function = 'intval', $Array, $empty_val = 0)
{
    $ReturnArray = [];//return array

    if (!is_array($Array)) return [];//if  $Array  is not an array return empty array

    foreach ($Array as $Key => $ArrayItem) {//loop array
        if (is_array($ArrayItem)) {//check array item is a array
            $ReturnArray[$Key] = arrayMapMulti($function, $ArrayItem);//if its a array recursive
        } else {
            if (is_array($function)) {//check function list is a array or not

                $lastText = $ArrayItem;
                foreach ($function as $FunctionName) {//if it's a array loop it

                    $fct = new ReflectionFunction($FunctionName);
                    if ($fct->getNumberOfRequiredParameters() == 1)//check   function expect parameters, if it's expect only one
                        $lastText = $FunctionName($lastText);
                    elseif ($fct->getNumberOfRequiredParameters() > 1)//if its expect more than one
                        $lastText = $FunctionName($lastText, $empty_val);

                }
                $ReturnArray[$Key] = $lastText;
            } else {//if function list is not an array
                $fct = new ReflectionFunction($function);
                $ReturnArray[$Key] = $function($ArrayItem, $empty_val);
                if ($fct->getNumberOfRequiredParameters() == 1)//check   function expect parameters, if it's expect only one
                    $ReturnArray[$Key] = $function($ArrayItem);
                elseif ($fct->getNumberOfRequiredParameters() > 1)//if its expect more than one
                    $ReturnArray[$Key] = $function($ArrayItem, $empty_val);
            }
        }

    }


    return $ReturnArray;


}

/**
 * @param $value
 * @param $markup
 * @param int $type
 * @return float|int
 */
function addMarkup($value, $markup, $type = 1)
{
    if ($type == 2) {//%
        return $value + ($value * $markup / 100);
    } else {
        return $value + $markup;
    }
}

/**
 * @param $str
 * @return bool
 */
function is_date($str)
{
    try {
        $dt = new DateTime(trim($str));
    } catch (Exception $e) {
        return false;
    }
    $month = $dt->format('m');
    $day = $dt->format('d');
    $year = $dt->format('Y');
    if (checkdate($month, $day, $year)) {
        return true;
    } else {
        return false;
    }
}


/**
 * @param $Data
 * @param int $empty_val
 * @return int|string
 */
function getActualDataType($Data, $empty_val = 0)
{

    $Data = trim($Data);


    if (is_numeric($Data)) {
        return $Data + 0;
    } elseif (empty($Data))
        return $empty_val;
    else
        return (string)$Data;
}

/**
 * @param $array
 * @return array
 */
function flatten($array)
{
    $return = array();
    while (count($array)) {
        $value = array_shift($array);
        if (is_array($value))
            foreach ($value as $sub)
                $array[] = $sub;
        else
            $return[] = $value;
    }
    return $return;
}

/**
 * @param $array
 * @return mixed
 */
function toObject($array)
{
    return json_decode(json_encode($array));
}

/**
 * @param $object
 * @return array
 */
function objectFlatten($object)
{
    $return = [];
    foreach ($object as $name => $item) {
        if (!is_object($item)) {
            $return[$name] = $item;
        } else {
            if (count((array)$item) == 1) {
                reset($item);
                $return[$name] = $item->{key($item)};
            } else {
                foreach ($item as $subItemName => $subItemValue) {
                    $return[$name . "." . $subItemName] = $subItemValue;
                }
            }
        }
    }

    return $return;
}

/**
 * @param $arr1
 * @param $arr2
 * @return mixed
 */
function array_combine2($arr1, $arr2)
{

    foreach ($arr2 as $k => $val) {
        $arr1[$k] = $val;
    }
    return $arr1;
}

/**
 * @param $arr
 * @return array
 */
function filter_array_false($arr)
{

    $r_array = [];
    foreach ($arr as $k => $val) {
        if ($val)
            $r_array[$k] = $val;

    }
    return $r_array;

}

/**
 * @return array
 */
function getHiddenColumn()
{
    return [
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
        'deleted_at',
        'upload_id'
    ];
}

/**
 * @return string
 */
function lastCommit()
{
    return \App\Updates::lastUpdate()->id;
}


/**
 * @param $content
 * @param $status
 * @return \Illuminate\Http\JsonResponse
 */
function jsona($content, $status = 200)
{
    return response()->json($content, $status, [], JSON_NUMERIC_CHECK);
}

/**
 * @param $MainCollection
 * @param $SubCollection
 * @return bool
 */
function isCollectionAvailable($MainCollection, $SubCollection)
{

    foreach ($MainCollection as $CollectionItem) {
        $diff = collect($SubCollection)->diffAssoc($CollectionItem);
        if ($diff->isEmpty()) {
            return true;
        }
    }

    return false;
}

/**
 * @param $text
 * @return string
 */
function upWord($text)
{
    return ucwords(strtolower($text));
}

/**
 * @param $array
 * @param $q
 * @return bool|mixed
 */
function search_multidimensional($array, $q)
{

    foreach ($array as $array_item) {

        if (is_object($array_item))
            $array_item = objectToArray($array_item);

        if (array_search($q, $array_item))
            return $array_item;
    }
    return false;
}

/**
 * @param $key
 * @return Closure
 */
function build_sorter($key)
{
    return function ($a, $b) use ($key) {
        return strnatcmp($a[$key], $b[$key]);
    };
}


function aipDateToHumanDate($date, $type = "date")
{
    $dateArr = array();
    if (isset($date)) {
        $dateArr = explode("T", $date);
        if ($type == "time") {
            return substr($dateArr[1], 0, -3);
        } elseif ($type == "datetime") {
            return date("D, j M, ", strtotime($dateArr[0])) . substr($dateArr[1], 0, -3);
        } else {
            return $dateArr[0];
        }
    }
}

function formatMoney($number, $fractional = false)
{
    if ($fractional) {
        $number = sprintf('%.2f', $number);
    }
    while (true) {
        $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
        if ($replaced != $number) {
            $number = $replaced;
        } else {
            break;
        }
    }
    return $number;
}

function getGenderCode($code)
{
    if (isset($code) && $code != "") {
        $gender = array("M" => "Male", "F" => "Female", "MI" => "Male Infant", "FI" => "Female Infant");
        return $gender[$code];
    }
}

function getPaxTypeCode($code)
{
    if (isset($code) && $code != "") {
        $paxType = array("ADT" => "Adult", "CNN" => "Child", "INF" => "Infant");
        return $paxType[$code];
    }
}

function replaceNullWithEmptyString($array)
{
    foreach ($array as $key => $value) {
        if (is_array($value))
            $array[$key] = replaceNullWithEmptyString($value);
        else {
            if (is_null($value))
                $array[$key] = "";
        }
    }
    return $array;
}

function toArray($array)
{
    return json_decode(json_encode($array, true), true);
}

function sortByOrder($a, $b)
{
    return $a['quotation_main_confirm'] - $b['quotation_main_confirm'];
}

function ordinal($number)
{
    $ends = array('th', 'st', 'nd', 'rd', 'th', 'th', 'th', 'th', 'th', 'th');
    if ((($number % 100) >= 11) && (($number % 100) <= 13))
        return $number . 'th';
    else
        return $number . $ends[$number % 10];
}

function removeSpecialChars($string)
{
    $string = str_replace(' ', '', $string); // Replaces all spaces with hyphens.
    $string = str_replace('-', '', $string); // Replaces all spaces with hyphens.
    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

function array_remove_null($item)
{
    if (!is_array($item)) {
        return $item;
    }

    return collect($item)
        ->reject(function ($item) {
            return is_null($item);
        })
        ->flatMap(function ($item, $key) {

            return is_numeric($key)
                ? [array_remove_null($item)]
                : [$key => array_remove_null($item)];
        })
        ->toArray();
}
function apiResponse($data,$status){
    $response = array(
        'status' => $status,
        'data' => $data,
    );
    return response($response);
}
 function IDGenerator($model, $trow, $length = 4, $prefix){
    $data = $model::orderBy('id','desc')->first();
    if(!$data){
        $og_length = $length;
        $last_number = '1';
    } else {
        $code = substr($data->$trow, strlen($prefix)+1);
        $actual_last_number = ($code/1)*1;
        $increment_last_number = ((int)$actual_last_number)+1;
        $last_number_length = strlen($increment_last_number);
        $og_length = $length - $last_number_length;
        $last_number = $increment_last_number;
    }
    $zeros = "";
    for($i = 0;$i < $og_length; $i++){
        $zeros.= "0";
    }
    return $prefix.'-'.$zeros.$last_number;
}
 function generateReg($model,$prefix,$length = 4) {
    $maxID = $model::max('id') + 1 ;
    $userCode = str_pad($maxID, $length, '0', STR_PAD_LEFT);
    return $prefix.'-'.$userCode;
}
