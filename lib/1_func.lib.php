<?
/*********************************************************************************************************/
/***************************************** Check PHP Version *********************************************/
/*echo 'Current PHP version: ' . phpversion(); /*if (phpversion()< "4.1.0") { $_GET = $HTTP_GET_VARS; $_POST = $HTTP_POST_VARS; $_SERVER = $HTTP_SERVER_VARS; } /*********************************************************************************************************/
function vietdecode($value)
{
    $value = str_replace("á", "a", $value);
    $value = str_replace("à", "a", $value);
    $value = str_replace("ả", "a", $value);
    $value = str_replace("ã", "a", $value);
    $value = str_replace("ạ", "a", $value);
    $value = str_replace("â", "a", $value);
    $value = str_replace("ă", "a", $value);
    $value = str_replace("Á", "a", $value);
    $value = str_replace("À", "a", $value);
    $value = str_replace("Ả", "a", $value);
    $value = str_replace("Ã", "a", $value);
    $value = str_replace("Ạ", "a", $value);
    $value = str_replace("Â", "a", $value);
    $value = str_replace("Ă", "a", $value);
    $value = str_replace("ấ", "a", $value);
    $value = str_replace("ầ", "a", $value);
    $value = str_replace("ẩ", "a", $value);
    $value = str_replace("ẫ", "a", $value);
    $value = str_replace("ậ", "a", $value);
    $value = str_replace("Ấ", "a", $value);
    $value = str_replace("Ầ", "a", $value);
    $value = str_replace("Ẩ", "a", $value);
    $value = str_replace("Ẫ", "a", $value);
    $value = str_replace("Ậ", "a", $value);
    $value = str_replace("ắ", "a", $value);
    $value = str_replace("ằ", "a", $value);
    $value = str_replace("ẳ", "a", $value);
    $value = str_replace("ẵ", "a", $value);
    $value = str_replace("ặ", "a", $value);
    $value = str_replace("Ắ", "a", $value);
    $value = str_replace("Ằ", "a", $value);
    $value = str_replace("Ẳ", "a", $value);
    $value = str_replace("Ẵ", "a", $value);
    $value = str_replace("Ặ", "a", $value);
    $value = str_replace("é", "e", $value);
    $value = str_replace("è", "e", $value);
    $value = str_replace("ẻ", "e", $value);
    $value = str_replace("ẽ", "e", $value);
    $value = str_replace("ẹ", "e", $value);
    $value = str_replace("ê", "e", $value);
    $value = str_replace("É", "e", $value);
    $value = str_replace("È", "e", $value);
    $value = str_replace("Ẻ", "e", $value);
    $value = str_replace("Ẽ", "e", $value);
    $value = str_replace("Ẹ", "e", $value);
    $value = str_replace("Ê", "e", $value);
    $value = str_replace("ế", "e", $value);
    $value = str_replace("ề", "e", $value);
    $value = str_replace("ể", "e", $value);
    $value = str_replace("ễ", "e", $value);
    $value = str_replace("ệ", "e", $value);
    $value = str_replace("Ế", "e", $value);
    $value = str_replace("Ề", "e", $value);
    $value = str_replace("Ể", "e", $value);
    $value = str_replace("Ễ", "e", $value);
    $value = str_replace("Ệ", "e", $value);
    $value = str_replace("í", "i", $value);
    $value = str_replace("ì", "i", $value);
    $value = str_replace("ỉ", "i", $value);
    $value = str_replace("ĩ", "i", $value);
    $value = str_replace("ị", "i", $value);
    $value = str_replace("Í", "i", $value);
    $value = str_replace("Ì", "i", $value);
    $value = str_replace("Ỉ", "i", $value);
    $value = str_replace("Ĩ", "i", $value);
    $value = str_replace("Ị", "i", $value);
    $value = str_replace("ố", "o", $value);
    $value = str_replace("ồ", "o", $value);
    $value = str_replace("ổ", "o", $value);
    $value = str_replace("ỗ", "o", $value);
    $value = str_replace("ộ", "o", $value);
    $value = str_replace("Ố", "o", $value);
    $value = str_replace("Ồ", "o", $value);
    $value = str_replace("Ổ", "o", $value);
    $value = str_replace("Ô", "o", $value);
    $value = str_replace("Ộ", "o", $value);
    $value = str_replace("ớ", "o", $value);
    $value = str_replace("ờ", "o", $value);
    $value = str_replace("ở", "o", $value);
    $value = str_replace("ỡ", "o", $value);
    $value = str_replace("ợ", "o", $value);
    $value = str_replace("Ớ", "o", $value);
    $value = str_replace("Ờ", "o", $value);
    $value = str_replace("Ở", "o", $value);
    $value = str_replace("Ỡ", "o", $value);
    $value = str_replace("Ợ", "o", $value);
    $value = str_replace("ứ", "u", $value);
    $value = str_replace("ừ", "u", $value);
    $value = str_replace("ử", "u", $value);
    $value = str_replace("ữ", "u", $value);
    $value = str_replace("ự", "u", $value);
    $value = str_replace("Ứ", "u", $value);
    $value = str_replace("Ừ", "u", $value);
    $value = str_replace("Ử", "u", $value);
    $value = str_replace("Ữ", "u", $value);
    $value = str_replace("Ự", "u", $value);
    $value = str_replace("ý", "y", $value);
    $value = str_replace("ỳ", "y", $value);
    $value = str_replace("ỷ", "y", $value);
    $value = str_replace("ỹ", "y", $value);
    $value = str_replace("ỵ", "y", $value);
    $value = str_replace("Ý", "y", $value);
    $value = str_replace("Ỳ", "y", $value);
    $value = str_replace("Ỷ", "y", $value);
    $value = str_replace("Ỹ", "y", $value);
    $value = str_replace("Ỵ", "y", $value);
    $value = str_replace("Đ", "d", $value);
    $value = str_replace("Đ", "d", $value);
    $value = str_replace("đ", "d", $value);
    $value = str_replace("ó", "o", $value);
    $value = str_replace("ò", "o", $value);
    $value = str_replace("ỏ", "o", $value);
    $value = str_replace("õ", "o", $value);
    $value = str_replace("ọ", "o", $value);
    $value = str_replace("ô", "o", $value);
    $value = str_replace("ơ", "o", $value);
    $value = str_replace("Ó", "o", $value);
    $value = str_replace("Ò", "o", $value);
    $value = str_replace("Ỏ", "o", $value);
    $value = str_replace("Õ", "o", $value);
    $value = str_replace("Ọ", "o", $value);
    $value = str_replace("Ô", "o", $value);
    $value = str_replace("Ơ", "o", $value);
    $value = str_replace("ú", "u", $value);
    $value = str_replace("ù", "u", $value);
    $value = str_replace("ủ", "u", $value);
    $value = str_replace("ũ", "u", $value);
    $value = str_replace("ụ", "u", $value);
    $value = str_replace("ư", "u", $value);
    $value = str_replace("Ú", "u", $value);
    $value = str_replace("Ù", "u", $value);
    $value = str_replace("Ủ", "u", $value);
    $value = str_replace("Ũ", "u", $value);
    $value = str_replace("Ụ", "u", $value);
    $value = str_replace("Ư", "u", $value);
    $value = str_replace(".", " ", $value);
    $value = str_replace(",", " ", $value);
    $value = str_replace("!", " ", $value);
    $value = str_replace("/", "-", $value);
    $value = str_replace("?", " ", $value);
    $value = str_replace(":", " ", $value);
    $value = str_replace("'", " ", $value);
    $value = str_replace("%", " ", $value);
    $value = str_replace("“ ”", " ", $value);
    $value = str_replace("m²", " ", $value);
    $value = str_replace("&#039;", " ", $value);
    $value = str_replace("&quot;", " ", $value);
    $value = str_replace("&amp;", "va", $value);
    $value = str_replace("(", " ", $value);
    $value = str_replace(")", " ", $value);
    $value = str_replace("-", " ", $value);
    $value = str_replace("   ", " ", $value);
    $value = str_replace("  ", " ", $value);
    return strtolower(str_replace(" ", "-", trim($value)));
}
/************************************** Public Key Interface *********************************************/
function mo($g, $l)
{
    return $g - ($l * floor($g / $l));
}
function powmod($base, $exp, $modulus)
{
    $accum    = 1;
    $i        = 0;
    $basepow2 = $base;
    while (($exp >> $i) > 0) {
        if ((($exp >> $i) & 1) == 1) {
            $accum = mo(($accum * $basepow2), $modulus);
        }
        $basepow2 = mo(($basepow2 * $basepow2), $modulus);
        $i++;
    }
    return $accum;
}
function PKI_Encrypt($m, $e, $n)
{
    $asci = array();
    for ($i = 0; $i < strlen($m); $i += 3) {
        $tmpasci = "1";
        for ($h = 0; $h < 3; $h++) {
            if ($i + $h < strlen($m)) {
                $tmpstr = ord(substr($m, $i + $h, 1)) - 30;
                if (strlen($tmpstr) < 2) {
                    $tmpstr = "0" . $tmpstr;
                }
            } else {
                break;
            }
            $tmpasci .= $tmpstr;
        }
        array_push($asci, $tmpasci . "1");
    }
    $coded = '';
    for ($k = 0; $k < count($asci); $k++) {
        $resultmod = powmod($asci[$k], $e, $n);
        $coded .= $resultmod . " ";
    }
    return trim($coded);
}
function PKI_Decrypt($c, $d, $n)
{
    $decryptarray = split(" ", $c);
    for ($u = 0; $u < count($decryptarray); $u++) {
        if ($decryptarray[$u] == "") {
            array_splice($decryptarray, $u, 1);
        }
    }
    for ($u = 0; $u < count($decryptarray); $u++) {
        $resultmod = powmod($decryptarray[$u], $d, $n);
        $deencrypt .= substr($resultmod, 1, strlen($resultmod) - 2);
    }
    for ($u = 0; $u < strlen($deencrypt); $u += 2) {
        $resultd .= chr(substr($deencrypt, $u, 2) + 30);
    }
    return $resultd;
}
/************************************************************************************************************/
function killInjection($str)
{
    $bad  = array(
        "\\",
        "=",
        ":"
    );
    $good = str_replace($bad, "", $str);
    return $good;
}
/************************************************************************************************************/
function countPages($total, $n)
{
    if ($total % $n == 0)
        return (int) ($total / $n);
    return (int) ($total / $n) + 1;
}
function createPage($total, $link, $nitem, $itemcurrent, $step = 10)
{
    if ($total < 1) {
        return false;
    }
    global $conn;
    $ret   = "";
    $param = "";
    $pages = countPages($total, $nitem);
    if ($itemcurrent > 0)
        $ret .= '<a title="&#272;&#7847;u ti&ecirc;n" href="' . $link . '0" class="lslink">[&lt;&lt;]</a> ';
    if ($itemcurrent > 1)
        $ret .= '<a title="V&#7873; tr&#432;&#7899;c" href="' . $link . ($itemcurrent - 1) . '" class="lslink">[&lt;]</a> ';
    $from = ($itemcurrent - $step > 0 ? $itemcurrent - $step : 0);
    $to   = ($itemcurrent + $step < $pages ? $itemcurrent + $step : $pages);
    for ($i = $from; $i < $to; $i++) {
        if ($i != $itemcurrent)
            $ret .= '<a href="' . $link . $i . '" class="lslink">' . ($i + 1) . '</a> ';
        else
            $ret .= '<b>' . ($i + 1) . '</b> ';
    }
    if (($itemcurrent < $pages - 2) && ($pages > 1))
        $ret .= '<a title="Ti&#7871;p theo" href="' . $link . ($itemcurrent + 1) . '">[&gt;]</a> ';
    if ($itemcurrent < $pages - 1)
        $ret .= '<a title="Cu&#7889;i c&ugrave;ng" href="' . $link . ($pages - 1) . '">[&gt;&gt;]</a>';
    return $ret;
}
/************************************************************************************************************/
function getLinkSort($order)
{
    $direction = "";
    if ($_REQUEST['direction'] == '' || $_REQUEST['direction'] != '1')
        $direction = "1";
    else
        $direction = "0";
    return "./?act=" . $_REQUEST['act'] . "&cat=" . $_REQUEST['cat'] . "&page=" . $_REQUEST['page'] . "&sortby=" . $order . "&direction=" . $direction;
}
/************************************************************************************************************/
function getFileExtention($filename)
{
    return strrchr($filename, ".");
}
function checkUpload($f, $ext = "", $maxsize = 0, $req = 0)
{
    $fname = strtolower(basename($f['name']));
    $ftemp = $f["tmp_name"];
    $fsize = $f["size"];
    $fext  = getFileExtention($fname);
    if ($fsize == 0) {
        if ($req != 0)
            return "B&#7841;n ch&#432;a ch&#7885;n file !";
        return "";
    } else {
        if ($ext != "")
            if (strpos($ext, $fext) === false)
                return "T&#7853;p tin kh&ocirc;ng &#273;&uacute;ng &#273;&#7883;nh d&#7841;ng : $fname";
        if ($maxsize > 0)
            if ($fsize > $maxsize)
                return "K&iacute;ch th&#432;&#7899;c h&igrave;nh ph&#7843;i nh&#7887; h&#417;n " . $maxsize . " byte";
    }
    return "";
}
function makeUpload($f, $newfile)
{
    if (move_uploaded_file($f["tmp_name"], $newfile))
        return $newfile;
    return false;
}
/************************************************************************************************************/
function getRecord($table, $where = '1=1')
{
    global $conn;
    if ($table == '')
        return false;
    $result = mysql_query("select * from $table where $where limit 1", $conn);
    return @mysql_fetch_assoc($result);
}
function countRecord($table, $where = "")
{
    global $conn;
    if ($table == "")
        return false;
    if ($where == "")
        $where = "1=1";
    $result = mysql_query("select count(*) as cnt from $table where $where", $conn);
    $row    = @mysql_fetch_assoc($result);
    return $row['cnt'];
}
function getParent($table, $id)
{
    global $conn;
    $chuoi  = "";
    $dem    = 1;
    $parent = $id;
    $mang   = "";
    while ($dem > 0) {
        $dem = countRecord($table, " parent in ( " . $parent . " )");
        if ($dem != 0) {
            $chuoi = mysql_query("select id from $table where parent in ('" . $parent . "')", $conn);
            $ddk   = '';
            while ($rows = mysql_fetch_assoc($chuoi)) {
                $ddk = $ddk . "," . $rows['id'];
            }
            $ddk    = substr($ddk, 1);
            $parent = $ddk;
            $mang .= $parent . ",";
            /* $mang=substr($mang,1);*/
        }
    }
    $mang .= $id;
    return $mang;
}
function dateFormat($dateField, $lang = 'vn')
{
    if ($dateField == '') {
        return false;
    }
    $arrVN = array(
        "Chủ nhật",
        "Thứ hai",
        "Thứ Ba",
        "Thứ Tư",
        "Thứ Năm",
        "Thứ Sáu",
        "Thứ bảy"
    );
    $arrEN = array(
        "Sunday",
        "Monday",
        "Tueday",
        "Wednesday",
        "Thuday",
        "Friday",
        "Satuday"
    );
    $date  = strtotime($dateField);
    $arr   = $lang == 'vn' ? $arrVN : $arrEN;
    return $arr[date('w', $date)] . ', ' . date('d/m/Y, H:i (O)', $date);
}
function getArrayCategory($table, $catid = "", $split = "=")
{
    global $conn;
    $hide = "status=0";
    if (isset($_SESSION['log']))
        $hide = "1=1";
    $ret = array();
    if ($catid == "")
        $catid = 0;
    $result = mysql_query("select * from $table where $hide and parent=$catid", $conn);
    while ($row = mysql_fetch_assoc($result)) {
        $ret[]  = array(
            $row['id'],
            ($catid == 0 ? "" : $split) . $row['name']
        );
        $getsub = getArrayCategory($table, $row['id'], $split . '===');
        foreach ($getsub as $sub)
            $ret[] = array(
                $sub[0],
                $sub[1]
            );
    }
    return $ret;
}
function getArrayCategory1($table, $idshop, $catid = "", $split = "=")
{
    global $conn;
    $hide = "status=0";
    if (isset($_SESSION['log']))
        $hide = "1=1";
    $ret = array();
    if ($catid == "")
        $catid = 0;
    $result = mysql_query("select * from $table where $hide and parent=$catid and idshop=$idshop", $conn);
    while ($row = mysql_fetch_assoc($result)) {
        $ret[]  = array(
            $row['id'],
            ($catid == 0 ? "" : $split) . $row['name']
        );
        $getsub = getArrayCategory1($table, $idshop, $row['id'], $split . '===');
        foreach ($getsub as $sub)
            $ret[] = array(
                $sub[0],
                $sub[1]
            );
    }
    return $ret;
}
function getArrayCombo($table, $valueField, $textField, $where = "")
{
    global $conn;
    $ret    = array();
    $hide   = "status=1";
    $where  = $where != "" ? $where : "1=1";
    $result = mysql_query("select $valueField,$textField from $table where $hide and $where", $conn);
    while ($row = mysql_fetch_assoc($result)) {
        $ret[] = array(
            $row[$valueField],
            $row[$textField]
        );
    }
    return $ret;
}
function isHaveChild($table, $id)
{
    global $conn;
    $result = mysql_query("select * from $table where parent=$id", $conn);
    $numRow = mysql_num_rows($result);
    return $numRow > 0 ? true : false;
}
/************************************************************************************************************/
function comboLanguage($name, $langSelected, $class)
{
    global $arrLanguage;
    $name = $name != '' ? $name : 'cmbLang';
    $out  = '';
    $out .= '<select size="1" name="' . $name . '" class="' . $class . '">';
    foreach ($arrLanguage as $lang) {
        if ($lang[0] == $langSelected)
            $out .= '<option value="' . $lang[0] . '" selected>' . $lang[1] . '</option>';
        else
            $out .= '<option value="' . $lang[0] . '">' . $lang[1] . '</option>';
    }
    $out .= '</select>';
    return $out;
}
function comboCategory($name, $arrSource, $class, $index, $all)
{
    $name = $name != '' ? $name : 'cmbParent';
    if (!$arrSource) {
        return false;
    }
    $out = '';
    $out .= '<select size="1" name="' . $name . '" class="' . $class . '">';
    $out .= $all == 1 ? '<option value="">[T&#7845;t c&#7843;]</option>' : '';
    $cats = $arrSource;
    foreach ($cats as $cat) {
        $selected = $cat[0] == $index ? 'selected' : '';
        $out .= '<option value="' . $cat[0] . '" ' . $selected . '>' . $cat[1] . '</option>';
    }
    $out .= '</select>';
    return $out;
}
function comboCategory1($name, $table, $arrSource, $class, $index, $all, $shop)
{
    global $conn;
    $name = $name != '' ? $name : 'cmbParent';
    if (!$arrSource) {
        return false;
    }
    $out = '';
    $out .= '<select size="1" name="' . $name . '" class="' . $class . '">';
    $out .= '<option value="">==Root</option>';
    $cats = $arrSource;
    foreach ($cats as $cat) {
        $selected = $cat[0] == $index ? 'selected' : '';
        $sql      = "select * from " . $table . " where id=" . $cat[0] . " and idshop=" . $shop;
        $result   = mysql_num_rows(mysql_query($sql, $conn));
        if ($result > 0)
            $out .= '<option value="' . $cat[0] . '" ' . $selected . '>' . $cat[1] . '</option>';
    }
    $out .= '</select>';
    return $out;
}
function comboSex($index, $lang = "vn", $name = "cmbSex", $class = "textbox")
{
    $arrValue   = array(
        '0',
        '1'
    );
    $arrTextVN  = array(
        'Nam',
        'N&#7919;'
    );
    $arrTextEN  = array(
        'Male',
        'Female'
    );
    $arrText    = $lang == "vn" ? $arrTextVN : $arrTextEN;
    $firstValue = $lang == "vn" ? "[Ch&#7885;n ph&aacute;i]" : "[Select sex]";
    $out        = '';
    $out .= '<select name="' . $name . '" id="' . $name . '" class="' . $class . '">';
    $out .= '<option value="-1">' . $firstValue . '</option>';
    for ($i = 0; $i < count($arrValue); $i++) {
        $selected = $arrValue[$i] == $index ? 'selected' : '';
        $out .= '<option value="' . $arrValue[$i] . '" ' . $selected . '>' . $arrText[$i] . '</option>';
    }
    $out .= '</select>';
    return $out;
}
function combotime($index, $lang = "vn", $name = "cmbtime", $class = "icon")
{
    $arrValue   = array(
        '0',
        '1',
        '2',
        '3',
        '4',
        '5',
        '6'
    );
    $arrTextVN  = array(
        '1 tuần',
        '1 tháng',
        '2 tháng',
        '3 tháng',
        '6 tháng',
        '9 tháng',
        '1 năm'
    );
    $arrTextEN  = array();
    $arrText    = $lang == "vn" ? $arrTextVN : $arrTextEN;
    $firstValue = $lang == "vn" ? "----Thời gian đăng----" : "Choose time";
    $out        = '';
    $out .= '<select name="' . $name . '" id="' . $name . '" class="' . $class . '">';
    $out .= '<option value="-1">' . $firstValue . '</option>';
    for ($i = 0; $i < count($arrValue); $i++) {
        $selected = $arrTextVN[$i] == $index ? 'selected' : '';
        $out .= '<option value ="' . $arrText[$i] . '" ' . $selected . '>' . $arrText[$i] . '</option>';
    }
    $out .= '</select>';
    return $out;
}
function comborulePL($index, $lang = "vn", $name = "phaply", $class = "icon")
{
    $arrValue   = array(
        '0',
        '1',
        '2',
        '3',
        '4',
        '5'
    );
    $arrTextVN  = array(
        'Sổ đỏ',
        'Sổ hồng',
        'Hợp đồng dự án',
        'Công chứng ủy quyền',
        'Giấy tay',
        'Khác'
    );
    $arrTextEN  = array();
    $arrText    = $lang == "vn" ? $arrTextVN : $arrTextEN;
    $firstValue = $lang == "vn" ? "----Tình trạng pháp lý----" : "Tình trạng pháp lý";
    $out        = '';
    $out .= '<select name="' . $name . '" id="' . $name . '" class="' . $class . '">';
    $out .= '<option value="-1">' . $firstValue . '</option>';
    for ($i = 0; $i < count($arrValue); $i++) {
        $selected = $arrValue[$i] == $index ? 'selected' : '';
        $out .= '<option value ="' . $arrValue[$i] . '" ' . $selected . '>' . $arrText[$i] . '</option>';
    }
    $out .= '</select>';
    return $out;
}
function comboCountry($index, $lang = "vn", $name = "cmbCountry", $class = "textbox")
{
    $arrValue   = array(
        'AF',
        'AL',
        'DZ',
        'AS',
        'AD',
        'AO',
        'AI',
        'AQ',
        'AG',
        'AR',
        'AM',
        'AW',
        'AU',
        'AT',
        'AZ',
        'BS',
        'BH',
        'BD',
        'BB',
        'BY',
        'BE',
        'BZ',
        'BJ',
        'BM',
        'BT',
        'BO',
        'BA',
        'BW',
        'BV',
        'BR',
        'IO',
        'VG',
        'BN',
        'BG',
        'BF',
        'BI',
        'KH',
        'CM',
        'CA',
        'CV',
        'KY',
        'CF',
        'TD',
        'CL',
        'CN',
        'CX',
        'CC',
        'CO',
        'KM',
        'CG',
        'CK',
        'CR',
        'CI',
        'HR',
        'CU',
        'CY',
        'CZ',
        'DK',
        'DJ',
        'DM',
        'DO',
        'TP',
        'EC',
        'EG',
        'SV',
        'GQ',
        'ER',
        'EE',
        'ET',
        'FK',
        'FO',
        'FJ',
        'FI',
        'FR',
        'FX',
        'GF',
        'PF',
        'TF',
        'GA',
        'GM',
        'GE',
        'DE',
        'GH',
        'GI',
        'GR',
        'GL',
        'GD',
        'GP',
        'GU',
        'GT',
        'GN',
        'GW',
        'GY',
        'HT',
        'HM',
        'HN',
        'HK',
        'HU',
        'IS',
        'IN',
        'ID',
        'IQ',
        'IE',
        'IR',
        'IL',
        'IT',
        'JM',
        'JP',
        'JO',
        'KZ',
        'KE',
        'KI',
        'KP',
        'KR',
        'KW',
        'KG',
        'LA',
        'LV',
        'LB',
        'LS',
        'LR',
        'LY',
        'LI',
        'LT',
        'LU',
        'MO',
        'MK',
        'MG',
        'MW',
        'MY',
        'MV',
        'ML',
        'MT',
        'MH',
        'MQ',
        'MR',
        'MU',
        'YT',
        'MX',
        'FM',
        'MD',
        'MC',
        'MN',
        'MS',
        'MA',
        'MZ',
        'MM',
        'NA',
        'NR',
        'NP',
        'NL',
        'AN',
        'NC',
        'NZ',
        'NI',
        'NE',
        'NG',
        'NU',
        'NF',
        'MP',
        'NO',
        'OM',
        'PK',
        'PW',
        'PA',
        'PG',
        'PY',
        'PE',
        'PH',
        'PN',
        'PL',
        'PT',
        'PR',
        'QA',
        'RE',
        'RO',
        'RU',
        'RW',
        'LC',
        'WS',
        'SM',
        'ST',
        'SA',
        'SN',
        'YU',
        'SC',
        'SL',
        'SG',
        'SK',
        'SI',
        'SB',
        'SO',
        'ZA',
        'ES',
        'LK',
        'SH',
        'KN',
        'PM',
        'VC',
        'SD',
        'SR',
        'SJ',
        'SZ',
        'SE',
        'CH',
        'SY',
        'TW',
        'TJ',
        'TZ',
        'TH',
        'TG',
        'TK',
        'TO',
        'TT',
        'TN',
        'TR',
        'TM',
        'TC',
        'TV',
        'UG',
        'UA',
        'AE',
        'GB',
        'US',
        'VI',
        'UY',
        'UZ',
        'VU',
        'VA',
        'VE',
        'VN',
        'WF',
        'EH',
        'YE',
        'ZR',
        'ZM'
    );
    $arrText    = array(
        'Afghanistan',
        'Albania',
        'Algeria',
        'American Samoa',
        'Andorra',
        'Angola',
        'Anguilla',
        'Antarctica',
        'Antigua and Barbuda',
        'Argentina',
        'Armenia',
        'Aruba',
        'Australia',
        'Austria',
        'Azerbaijan',
        'Bahamas',
        'Bahrain',
        'Bangladesh',
        'Barbados',
        'Belarus',
        'Belgium',
        'Belize',
        'Benin',
        'Bermuda',
        'Bhutan',
        'Bolivia',
        'Bosnia and Herzegowina',
        'Botswana',
        'Bouvet Island',
        'Brazil',
        'British Indian Ocean Territory',
        'British Virgin Islands',
        'Brunei Darussalam',
        'Bulgaria',
        'Burkina Faso',
        'Burundi',
        'Cambodia',
        'Cameroon',
        'Canada',
        'Cape Verde',
        'Cayman Islands',
        'Central African Republic',
        'Chad',
        'Chile',
        'China',
        'Christmas Island',
        'Cocos (Keeling) Islands',
        'Colombia',
        'Comoros',
        'Congo',
        'Cook Islands',
        'Costa Rica',
        'Cote D\'ivoire',
        'Croatia',
        'Cuba',
        'Cyprus',
        'Czech Republic',
        'Denmark',
        'Djibouti',
        'Dominica',
        'Dominican Republic',
        'East Timor',
        'Ecuador',
        'Egypt',
        'El Salvador',
        'Equatorial Guinea',
        'Eritrea',
        'Estonia',
        'Ethiopia',
        'Falkland Islands (Malvinas)',
        'Faroe Islands',
        'Fiji',
        'Finland',
        'France',
        'France, Metropolitan',
        'French Guiana',
        'French Polynesia',
        'French Southern Territories',
        'Gabon',
        'Gambia',
        'Georgia',
        'Germany',
        'Ghana',
        'Gibraltar',
        'Greece',
        'Greenland',
        'Grenada',
        'Guadeloupe',
        'Guam',
        'Guatemala',
        'Guinea',
        'Guinea-Bissau',
        'Guyana',
        'Haiti',
        'Heard and McDonald Islands',
        'Honduras',
        'Hong Kong',
        'Hungary',
        'Iceland',
        'India',
        'Indonesia',
        'Iraq',
        'Ireland',
        'Islamic Republic of Iran',
        'Israel',
        'Italy',
        'Jamaica',
        'Japan',
        'Jordan',
        'Kazakhstan',
        'Kenya',
        'Kiribati',
        'Korea',
        'Korea, Republic of',
        'Kuwait',
        'Kyrgyzstan',
        'Laos',
        'Latvia',
        'Lebanon',
        'Lesotho',
        'Liberia',
        'Libyan Arab Jamahiriya',
        'Liechtenstein',
        'Lithuania',
        'Luxembourg',
        'Macau',
        'Macedonia',
        'Madagascar',
        'Malawi',
        'Malaysia',
        'Maldives',
        'Mali',
        'Malta',
        'Marshall Islands',
        'Martinique',
        'Mauritania',
        'Mauritius',
        'Mayotte',
        'Mexico',
        'Micronesia',
        'Moldova, Republic of',
        'Monaco',
        'Mongolia',
        'Montserrat',
        'Morocco',
        'Mozambique',
        'Myanmar',
        'Namibia',
        'Nauru',
        'Nepal',
        'Netherlands',
        'Netherlands Antilles',
        'New Caledonia',
        'New Zealand',
        'Nicaragua',
        'Niger',
        'Nigeria',
        'Niue',
        'Norfolk Island',
        'Northern Mariana Islands',
        'Norway',
        'Oman',
        'Pakistan',
        'Palau',
        'Panama',
        'Papua New Guinea',
        'Paraguay',
        'Peru',
        'Philippines',
        'Pitcairn',
        'Poland',
        'Portugal',
        'Puerto Rico',
        'Qatar',
        'Reunion',
        'Romania',
        'Russian Federation',
        'Rwanda',
        'Saint Lucia',
        'Samoa',
        'San Marino',
        'Sao Tome and Principe',
        'Saudi Arabia',
        'Senegal',
        'Serbia and Montenegro',
        'Seychelles',
        'Sierra Leone',
        'Singapore',
        'Slovakia',
        'Slovenia',
        'Solomon Islands',
        'Somalia',
        'South Africa',
        'Spain',
        'Sri Lanka',
        'St. Helena',
        'St. Kitts and Nevis',
        'St. Pierre and Miquelon',
        'St. Vincent and the Grenadines',
        'Sudan',
        'Suriname',
        'Svalbard and Jan Mayen Islands',
        'Swaziland',
        'Sweden',
        'Switzerland',
        'Syrian Arab Republic',
        'Taiwan',
        'Tajikistan',
        'Tanzania, United Republic of',
        'Thailand',
        'Togo',
        'Tokelau',
        'Tonga',
        'Trinidad and Tobago',
        'Tunisia',
        'Turkey',
        'Turkmenistan',
        'Turks and Caicos Islands',
        'Tuvalu',
        'Uganda',
        'Ukraine',
        'United Arab Emirates',
        'United Kingdom (Great Britain)',
        'United States',
        'United States Virgin Islands',
        'Uruguay',
        'Uzbekistan',
        'Vanuatu',
        'Vatican City State',
        'Venezuela',
        'Vietnam',
        'Wallis And Futuna Islands',
        'Western Sahara',
        'Yemen',
        'Zaire',
        'Zambia'
    );
    $firstValue = $lang == "vn" ? "[Ch&#7885;n qu&#7889;c gia]" : "[Select country]";
    $out        = '';
    $out .= '<select name="' . $name . '" id="' . $name . '" class="' . $class . '">';
    $out .= '<option value="-1">' . $firstValue . '</option>';
    for ($i = 0; $i < count($arrValue); $i++) {
        $selected = $arrValue[$i] == $index ? 'selected' : '';
        $out .= '<option value="' . $arrValue[$i] . '" ' . $selected . '>' . $arrText[$i] . '</option>';
    }
    $out .= '</select>';
    return $out;
}
/***************************************** SQL Query function ************************************************/
function insert($table, $fields_arr)
{
    global $conn;
    if (!$conn) {
        return false;
    }
    $strfields = "";
    $strvalues = "";
    list($key, $val) = each($fields_arr);
    if (is_string($key)) {
        $strfields = " ($key";
        $strvalues = $val;
        while (list($key, $val) = each($fields_arr)) {
            $strfields .= ", $key";
            $strvalues .= "," . $val;
        }
        $strfields .= ")";
    } else {
        $strvalues = $fields_arr[0];
        for ($i = 1; $i < (count($fields_arr)); $i++) {
            $strvalues .= ", $fields_arr[$i]";
        }
    }
    $query = "INSERT INTO $table $strfields VALUES ($strvalues)";
    return mysql_query($query, $conn);
}
function update($table, $fields_arr, $where)
{
    global $conn;
    if (!$conn) {
        return false;
    }
    list($key, $val) = each($fields_arr);
    $strset = " $key = $val";
    while (list($key, $val) = each($fields_arr)) {
        $strset .= ", $key = $val";
    }
    $query  = "UPDATE $table SET $strset WHERE $where";
    $result = mysql_query($query, $conn);
    return !$result ? false : true;
}
function delete_rows($table, $fields_arr, $where_ext = "")
{
    global $conn;
    if (!$conn) {
        return false;
    }
    if (count($fields_arr) > 0) {
        list($key, $val) = each($fields_arr);
        $strwhere = " $key = $val";
        while (list($key, $val) = each($fields_arr)) {
            $strwhere .= "OR $key = $val";
        }
    }
    $query  = "DELETE FROM $table WHERE $strwhere $where_ext";
    $result = mysql_query($query, $conn);
    if (!$result) {
        return false;
    }
    return true;
}
function insert_table($table, $vale1, $vale2, $hinh)
{
    global $conn;
    if ($hinh != ' ' && $hinh == true) {
        $vale3 = $vale1 . ',hinh';
        $vale4 = $vale2 . ",'" . $hinh . "'";
    } else {
        $vale3 = $vale1;
        $vale4 = $vale2;
    }
    $sql = "INSERT INTO $table ($vale3) VALUES ($vale4)";
    mysql_query($sql, $conn) or die(mysql_error());
    $kq = mysql_insert_id();
    return $kq;
}
function update_table($table, $id, $up, $hinh, $dxoa)
{
    global $conn;
    $idx = 'WHERE id=' . "'" . $id . "'";
    if ($hinh != ' ' && $hinh == true) {
        $sql = "SELECT * FROM $table $idx";
        $xoahinh = mysql_query($sql) or die(mysql_error());
        $row_xoahinh = mysql_fetch_assoc($xoahinh);
        if ($dxoa == ' ') {
            $link_hinh = $row_xoahinh['hinh'];
        } elseif ($dxoa != ' ') {
            $link_hinh = $dxoa . $row_xoahinh['hinh'];
        }
        if (file_exists($link_hinh)) {
            unlink($link_hinh);
        }
        $up2 = $up . ",hinh='" . $hinh . "'";
    } else {
        $up2 = $up;
    }
    $sql = "UPDATE $table SET $up2 $idx";
    $kq = mysql_query($sql, $conn) or die(mysql_error());
}
function delete_table($table, $id, $hinh, $dxoa, $kieux)
{
    global $conn;
    if ($kieux == 1) {
        settype($id, "int");
        $id = 'WHERE id=' . "'" . $id . "'";
        if ($hinh == 1) {
            $sql = "SELECT * FROM $table $id";
            $xoahinh = mysql_query($sql) or die(mysql_error());
            $row_xoahinh = mysql_fetch_assoc($xoahinh);
            if ($dxoa == ' ') {
                $link_hinh = $row_xoahinh['hinh'];
            } elseif ($dxoa != ' ') {
                $link_hinh = $dxoa . $row_xoahinh['hinh'];
            }
            $k_d = dem_table($table, 'hinh=' . "'" . $row_xoahinh['hinh'] . "'", ' ');
            if ($k_d == 1) {
                if (file_exists($link_hinh)) {
                    unlink($link_hinh);
                }
            }
            $sql = "DELETE FROM $table $id";
            $kq = mysql_query($sql) or die(mysql_error());
        } elseif ($hinh == 0) {
            $sql = "DELETE FROM $table $id";
            $kq = mysql_query($sql) or die(mysql_error());
        }
    } elseif ($kieux == 2) {
        $listid = explode(",", $id);
        for ($i = 0; $i < count($listid); $i++) {
            $idx = $listid[$i];
            settype($idx, "int");
            $id = 'WHERE id=' . "'" . $idx . "'";
            if ($hinh == 1) {
                $sql = "SELECT * FROM $table $id";
                $xoahinh = mysql_query($sql) or die(mysql_error());
                $row_xoahinh = mysql_fetch_assoc($xoahinh);
                if ($dxoa == ' ') {
                    $link_hinh = $row_xoahinh['hinh'];
                } elseif ($dxoa != ' ') {
                    $link_hinh = $dxoa . $row_xoahinh['hinh'];
                }
                if (file_exists($link_hinh)) {
                    unlink($link_hinh);
                }
                $sql = "DELETE FROM $table $id";
                if ($idx > 0)
                    mysql_query($sql, $conn) or die(mysql_error());
            } elseif ($hinh == 0) {
                $sql = "DELETE FROM $table $id";
                if ($idx > 0)
                    mysql_query($sql, $conn) or die(mysql_error());
            }
        }
    }
}
/************************************************ MAIL *******************************************************/
function check_mail($email)
{
    if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email))
        return false;
    return true;
}
function send_mail($from, $to, $subject, $body)
{
    return mail_smtp($from, $to, $subject, $body, 1);
}
function mail_smtp($from, $to, $subject, $body, $html = 0)
{
    require_once("smtp.php");
    $smtp                           = new smtp_class;
    $smtp->host_name                = "112.78.4.202";
    /* Change this variable to the address of the SMTP server to relay, like "smtp.myisp.com" */
    $smtp->localhost                = "localhost";
    /* Your computer address */
    $smtp->direct_delivery          = 0;
    /* Set to 1 to deliver directly to the recepient SMTP server */
    $smtp->timeout                  = 10;
    /* Set to the number of seconds wait for a successful connection to the SMTP server */
    $smtp->data_timeout             = 0;
    /* Set to the number seconds wait for sending or retrieving data from the SMTP server. Set to 0 to use the same defined in the timeout variable */
    $smtp->debug                    = 0;
    /* Set to 1 to output the communication with the SMTP server */
    $smtp->html_debug               = 1;
    /* Set to 1 to format the debug output as HTML */
    $smtp->pop3_auth_host           = "mail.introvina.com";
    /* Set to the POP3 authentication host if your SMTP server requires prior POP3 authentication */
    $smtp->user                     = "vcthth@gmail.com";
    /* Set to the user name if the server requires authetication */
    $smtp->realm                    = "";
    /* Set to the authetication realm, usually the authentication user e-mail domain */
    $smtp->password                 = "introvina.com";
    /* Set to the authetication password */
    $smtp->workstation              = "";
    /* Workstation name for NTLM authentication */
    $smtp->authentication_mechanism = "";
    /* Specify a SASL authentication method like LOGIN, PLAIN, CRAM-MD5, NTLM, etc.. Leave it empty to make the class negotiate if necessary */
    if ($smtp->direct_delivery) {
        if (!function_exists("GetMXRR")) {
            $_NAMESERVERS = array();
            include("getmxrr.php");
        }
    }
    $header = "";
    if ($html == 0)
        $header = array(
            "From: $from",
            "To: $to",
            "Subject: $subject",
            "Date: " . strftime("%a, %d %b %Y %H:%M:%S %Z")
        );
    else
        $header = array(
            "MIME-Version: 1.0",
            "Content-type: text/html; charset=utf-8",
            /*"Content-type: text/html; charset=iso-8859-1",*/
            "From: $from",
            "To: $to",
            "Subject: $subject",
            "Date: " . strftime("%a, %d %b %Y %H:%M:%S %Z")
        );
    $ret = $smtp->SendMessage($from, array(
        $to
    ), $header, $body);
    return $ret;
}
/*************************************************************************************************************/
function convertnum($chuoi)
{
    $b = intval($chuoi);
    return $b;
}
function get_field($table, $where, $id, $name)
{
    global $conn;
    if ($where != ' ') {
        $where = 'WHERE ' . $where . "='" . $id . "'";
    } else
        $where = ' ';
    $sql = "SELECT * FROM $table $where";
    $gt = mysql_query($sql, $conn) or die(mysql_error());
    $row = mysql_fetch_assoc($gt);
    $kq  = $row["$name"];
    return $kq;
}
function check_table($table, $where, $id)
{
    global $conn;
    $where  = 'WHERE ' . $where;
    $sql    = "SELECT $id FROM $table $where";
    $rs     = mysql_query($sql, $conn);
    $row_rs = mysql_fetch_row($rs);
    if ($row_rs[0] >= 1)
        return false;
    else
        return true;
}

function pagesLinks($totalRows, $pageSize = 5)
{
    if ($totalRows <= 0)
        return "";
    $totalPages = ceil($totalRows / $pageSize);
    if ($totalPages <= 1)
        return "";
    $currentURL = $_SERVER['PHP_SELF'];
    if (isset($_GET["pageNum"]) == true)
        $currentPage = $_GET["pageNum"];
    else
        $currentPage = 1;
    settype($currentPage, "int");
    if ($currentPage <= 0)
        $currentPage = 1;
    $querystring = "";
    foreach ($_GET as $k => $v) {
        if ($k != 'pageNum')
            $querystring = $querystring . "&{$k}={$v}";
    }
    $firstLink = "";
    $prevLink  = "";
    $lastLink  = "";
    $nextLink  = "";
    if ($currentPage > 1) {
        $firstLink = "<a href={$currentURL}?{$querystring}> Trang đầu </a>";
        $prevPage  = $currentPage - 1;
        $prevLink  = "<a href={$currentURL}?{$querystring}&pageNum={$prevPage}> Trang trước </a>";
    }
    if ($currentPage < $totalPages) {
        $lastLink = "<a href={$currentURL}?{$querystring}&pageNum={$totalPages}> Trang cuối </a>";
        $nextPage = $currentPage + 1;
        $nextLink = "<a href={$currentURL}?{$querystring}&pageNum={$nextPage}> Trang kế </a>";
    }
    return $firstLink . $prevLink . $nextLink . $lastLink;
}
function pagesListLimit_new($totalRows, $pageSize = 5, $offset = 5, $host_link_full, $tukhoa, $get_p)
{
    if ($totalRows <= 0)
        return "";
    $totalPages = ceil($totalRows / $pageSize);
    if ($totalPages <= 1)
        return "";
    $currentURL = $host_link_full;
    if (isset($_GET["pageNum"]) == true)
        $currentPage = $_GET["pageNum"];
    else
        $currentPage = 1;
    settype($currentPage, "int");
    if ($currentPage <= 0)
        $currentPage = 1;
    $querystring = "";
    foreach ($_GET as $k => $v) {
        if ($k != 'pageNum')
            $querystring .= "&{$k}={$v}";
    }
    $querystring = substr($querystring, 1);
    $links       = "";
    $from        = $currentPage - $offset;
    $to          = $currentPage + $offset;
    if ($from <= 0) {
        $from = 1;
        $to   = $offset * 2;
    }
    if ($to > $totalPages) {
        $to = $totalPages;
    }
    for ($j = $from; $j <= $to; $j++) {
        if ($j == $currentPage)
            $links = $links . "<span>{$j}</span>";
        else {
            $qt    = $querystring . "&pageNum={$j}";
            $links = $links . '<a href = ' . $currentURL . '/' . $get_p . '/' . $tukhoa . '/' . $j . '/>' . $j . '</a>';
        }
    }
    return $links;
}
function pagesLinks_new_full($totalRows, $pageSize = 5, $host_link_full, $tukhoa, $get_p)
{
    if ($totalRows <= 0)
        return "";
    $totalPages = ceil($totalRows / $pageSize);
    if ($totalPages <= 1)
        return "";
    $currentURL = $host_link_full;
    if (isset($_GET["pageNum"]) == true)
        $currentPage = $_GET["pageNum"];
    else
        $currentPage = 1;
    settype($currentPage, "int");
    if ($currentPage <= 0)
        $currentPage = 1;
    $querystring = "";
    foreach ($_GET as $k => $v) {
        if ($k != 'pageNum')
            $querystring = $querystring . "&{$k}={$v}";
    }
    $firstLink = "";
    $prevLink  = "";
    $lastLink  = "";
    $nextLink  = "";
    if ($currentPage > 1) {
        $firstLink = '<a href = ' . $currentURL . '/' . $get_p . '/' . $tukhoa . '/1/> &laquo; </a>';
        $prevPage  = $currentPage - 1;
        $prevLink  = '<a href = ' . $currentURL . '/' . $get_p . '/' . $tukhoa . '/' . $prevPage . '/> &lsaquo; </a>';
    }
    if ($currentPage < $totalPages) {
        $lastLink = '<a href = ' . $currentURL . '/' . $get_p . '/' . $tukhoa . '/' . $totalPages . '/> &raquo; </a>';
        $nextPage = $currentPage + 1;
        $nextLink = '<a href = ' . $currentURL . '/' . $get_p . '/' . $tukhoa . '/' . $nextPage . '/> &rsaquo; </a>';
    }
    return $firstLink . $prevLink . pagesListLimit_new($totalRows, $pageSize, $offset = 5, $host_link_full, $tukhoa, $get_p) . $nextLink . $lastLink;
}
function cat_kytu_dacbiet($str, $bodautiengviet, $chuhoasangthuong, $catkhoangtrang, $ktrangthanhngang, $catphay)
{
    $str = trim($str);
    $str = preg_replace('/[^a-zA-Z0-9\-,áàảãạăắằẳẵặâấầẩẫậÁÀẢÃẠĂẮẰẲẴẶÂẤẦẨẪẬđĐéèẻẽẹêếềểễệÉÈẺẼẸÊẾỀỂỄỆíìỉĩịÍÌỈĨỊóòỏõọôốồổỗộơớờởỡợÓÒỎÕỌÔỐỒỔỖỘƠỚỜỞỠỢúùủũụưứừửữựÚÙỦŨỤƯỨỪỬỮỰýỳỷỹỵÝỲỶỸỴ]/', ' ', $str);
    $str = preg_replace('/^[\-]+/', '', $str);
    $str = preg_replace('/[\-]+$/', '', $str);
    $str = preg_replace('/[\-]{1,}/', ' ', $str);
    if ($bodautiengviet == 1) {
        $str = stripunicode($str);
    }
    if ($chuhoasangthuong == 1) {
        $str = mb_strtolower($str, 'UTF-8');
    }
    if ($catkhoangtrang == 1) {
        $str = str_replace(" ", "", $str);
    }
    if ($catphay == 1) {
        $str = str_replace(",", "", $str);
    }
    if ($ktrangthanhngang == 1) {
        $str = str_replace(" ", "-", $str);
        $str = preg_replace('/--+/', '-', $str);
    }
    for ($i = 0; $i < 20; $i++) {
        $str = str_replace("  ", " ", $str);
    }
    return $str;
}
function stripunicode($str)
{
    if (!$str)
        return false;
    $unicode = array(
        'a' => 'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
        'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
        'd' => 'đ',
        'D' => 'Đ',
        'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
        'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
        'i' => 'í|ì|ỉ|ĩ|ị',
        'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
        'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
        'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
        'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
        'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
        'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
        'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
    );
    foreach ($unicode as $khongdau => $codau) {
        $arr = explode("|", $codau);
        $str = str_replace($arr, $khongdau, $str);
    }
    return $str;
}
function chuoingaunhien($sokytu)
{
    $chuoi = "ABCDEFGHIJKLMNOPQRSTUVWXYZWabcdefghijklmnopqrstuvwxyzw0123456789";
    for ($i = 0; $i < $sokytu; $i++) {
        $vitri  = mt_rand(0, strlen($chuoi));
        $giatri = $giatri . substr($chuoi, $vitri, 1);
    }
    return $giatri;
}
function luu_hinh($filechon, $dthem, $uploaddir, &$error)
{
    if ($dthem != ' ') {
        $uploaddir = $dthem . $uploaddir;
    } else {
        $uploaddir = $uploaddir;
    }
    $error     = "";
    $choupload = array(
        "image/gif",
        "image/jpeg",
        "image/pjpeg",
        "image/png",
        'image/x-png',
        'image/x-icon'
    );
    $maxsize   = 1024 * 5000;
    $f         = $_FILES[$filechon];
    $tmp_name  = $f["tmp_name"];
    if ($tmp_name == "")
        return "";
    $tenfile   = $f["name"];
    $kieufile  = $f["type"];
    $cocuafile = $f["size"];
    if (in_array($kieufile, $choupload) == false)
        $error = "<br>Kiểu file không chấp nhận ";
    if ($cocuafile > $maxsize)
        $error = "<br>Kích thước file quá lớn";
    if ($error != "")
        return "";
    $date         = date("Y-m-d H:i:s");
    $datedaloc    = cat_kytu_dacbiet($date, 1, 1, 1, 0, 1);
    $tenfiledaloc = cat_kytu_dacbiet($tenfile, 1, 1, 1, 0, 1);
    $chuoingau    = chuoingaunhien(10);
    if ($kieufile == "image/png" || $kieufile == "image/x-png")
        $ext = ".png";
    elseif ($kieufile == "image/gif")
        $ext = ".gif";
    elseif ($kieufile == "image/x-icon")
        $ext = ".ico";
    else
        $ext = ".jpg";
    $pathfile = $uploaddir . $datedaloc . $chuoingau . $ext;
    if (file_exists($uploaddir) == false)
        mkdir($uploaddir, NULL, true);
    move_uploaded_file($tmp_name, $pathfile);
    if ($dthem != ' ') {
        if ((strpos($pathfile, $dthem)) !== false) {
            $hinh_full  = explode($dthem, $pathfile);
            $hinh_xong0 = $hinh_full[0];
            $hinh_xong1 = $hinh_full[1];
            $kq         = $hinh_xong1;
        } else {
            $kq = $pathfile;
        }
    } else {
        $kq = $pathfile;
    }
    return $kq;
}

function luu_hinh_flash($filechon, $dthem, $uploaddir, &$error)
{
    if ($dthem != ' ') {
        $uploaddir = $dthem . $uploaddir;
    } else {
        $uploaddir = $uploaddir;
    }
    $error     = "";
    $choupload = array(
        "image/gif",
        "image/jpeg",
        "image/pjpeg",
        "application/x-shockwave-flash",
        "image/png",
        'image/x-png'
    );
    $maxsize   = 1024 * 5000;
    $f         = $_FILES[$filechon];
    $tmp_name  = $f["tmp_name"];
    if ($tmp_name == "")
        return "";
    $tenfile   = $f["name"];
    $kieufile  = $f["type"];
    $cocuafile = $f["size"];
    if (in_array($kieufile, $choupload) == false)
        $error = "<br>Kiểu file không chấp nhận";
    if ($cocuafile > $maxsize)
        $error = "<br>Kích thước file quá lớn";
    if ($error != "")
        return "";
    $date         = date("Y-m-d H:i:s");
    $datedaloc    = cat_kytu_dacbiet($date, 1, 1, 1, 0, 1);
    $tenfiledaloc = cat_kytu_dacbiet($tenfile, 1, 1, 1, 0, 1);
    $chuoingau    = chuoingaunhien(10);
    if ($kieufile == "image/png" || $kieufile == "image/x-png")
        $ext = ".png";
    elseif ($kieufile == "image/gif")
        $ext = ".gif";
    elseif ($kieufile == "image/jpeg" || $kieufile == "image/pjpeg")
        $ext = ".jpg";
    else
        $ext = ".swf";
    $pathfile = $uploaddir . $datedaloc . $chuoingau . $ext;
    if (file_exists($uploaddir) == false)
        mkdir($uploaddir, NULL, true);
    move_uploaded_file($tmp_name, $pathfile);
    if ($dthem != ' ') {
        if ((strpos($pathfile, $dthem)) !== false) {
            $hinh_full  = explode($dthem, $pathfile);
            $hinh_xong0 = $hinh_full[0];
            $hinh_xong1 = $hinh_full[1];
            $kq         = $hinh_xong1;
        } else {
            $kq = $pathfile;
        }
    } else {
        $kq = $pathfile;
    }
    return $kq;
}
function thongbao($url, $thongbao = 'B&#7841;n &#273;ã th&#7921;c hi&#7879;n thành công..!')
{
    if ($thongbao == ' ') {
        $kq = '<script type="text/javascript">window.location = "' . $url . '";</script>';
    } else {
        $kq = '<script type="text/javascript">alert("' . $thongbao . '"); window.location = "' . $url . '";</script>';
    }
    return $kq;
}
function location($url)
{
?><script type="text/javascript"> window.location = "<?php
    echo $url;
?>"; </script><?php
}
function get_records($table, $where, $order, $limit, $lang)
{
    global $conn;
    settype($lang, "int");
    if ($lang != ' ') {
        if ($where != ' ') {
            $where = 'WHERE ' . $where . ' AND (lang=' . $lang . ' or ' . $lang . '=-1)';
        } else
            $where = ' ';
    } else {
        if ($where != ' ') {
            $where = 'WHERE ' . $where;
        } else
            $where = ' ';
    }
    if ($order != ' ') {
        $order = 'ORDER BY ' . $order;
    } else
        $order = ' ';
    if ($limit != ' ') {
        $limit = 'LIMIT ' . $limit;
    } else
        $limit = ' ';
    $sql = "SELECT * FROM $table $where $order $limit";
    $gt = mysql_query($sql, $conn) or die(mysql_error());
    return $gt;
}
function number_in_list($list_so, $so_kt)
{
    $kq_so = explode(",", $list_so);
    for ($i = 0; $i < count($kq_so); $i++) {
        $so = $kq_so[$i];
        settype($so, "int");
        settype($so_kt, "int");
        if ($so_kt == $so) {
            $kq = 1;
            break;
        } else {
            $kq = 0;
        }
    }
    return $kq;
}
function check_permiss($sec_id, $table_id, $link_nhay)
{
    settype($sec_id, "int");
    $list_sec = get_field('tbl_users', 'id', $sec_id, 'list');
    if ($list_sec == -1) {
        $table_id_moi = '-1';
    } elseif ($list_sec != -1) {
        $table_id_moi = (string) $table_id;
    }
    $_SESSION['back'] = $_SERVER['REQUEST_URI'];
    if ($sec_id == false) {
        $_SESSION['error'] = "Bạn không có quyền vào phần này..!";
        header("location: $link_nhay");
    } elseif ($sec_id != false) {
        if ($list_sec == 0) {
            $_SESSION['error'] = "Bạn không có quyền vào phần này..!";
            header("location: $link_nhay");
        } elseif ($list_sec != 0) {
            $kt = number_in_list($list_sec, $table_id_moi);
            if ($kt == 0) {
                $_SESSION['error'] = "Bạn không có quyền vào phần này..!";
                header("location: $link_nhay");
            }
        }
    }
}
function get_video_youtobe($link_youtobe)
{
    $link_goc = 'http://www.youtube.com/embed/';
    $LK1      = explode("=", $link_youtobe);
    $ls1      = $LK1[1];
    $LK2      = explode("&", $ls1);
    $ls2      = $link_goc . $LK2[0];
    return $ls2;
}
function cat_tags($noidung)
{
    $noidung   = cat_kytu_dacbiet($noidung, 0, 1, 0, 0, 0);
    $dem_chuoi = substr_count($noidung, ',');
    if ($dem_chuoi >= 1) {
        $dauhieu = ',';
    } else {
        $dauhieu = ' ';
    }
    $len = strlen($noidung);
    $cut = explode($dauhieu, $noidung);
    foreach ($cut as $ch) {
        $kq = $kq . '' . $ch . ' , ';
    }
    $kq = cat_kytu_cuoichuoi($kq, 2);
    return $kq;
}
function cat_kytu_cuoichuoi($chuoi, $sokytu)
{
    $len = strlen($chuoi);
    $len = $len - $sokytu;
    $kq  = substr($chuoi, 0, $len);
    return $kq;
}
function catchuoi_tuybien($string, $sochu)
{
    $cut = explode(" ", $string);
    for ($i = 0; $i <= $sochu; $i++) {
        $stringall = $stringall . $cut[$i] . ' ';
    }
    if ($cut[$sochu + 1] == true) {
        $cham = '...';
    }
    return $stringall . $cham;
}
function convert_character_db_search($tukhoa, $kieu) /*1:bien ky tu db thanh bieu chu, 2: nguoc lai */ 
{
    if ($kieu == 1) {
        $tukhoa = trim($tukhoa);
        $tukhoa = str_replace("%", "-1n-", $tukhoa);
        $tukhoa = str_replace("/", "-2n-", $tukhoa);
        $tukhoa = str_replace(",", "-3n-", $tukhoa);
        $tukhoa = str_replace("?", "-4n-", $tukhoa);
        $tukhoa = str_replace("+", "-5n-", $tukhoa);
        $tukhoa = str_replace("@", "-6n-", $tukhoa);
        $tukhoa = str_replace("#", "-7n-", $tukhoa);
        $tukhoa = str_replace("$", "-8n-", $tukhoa);
        $tukhoa = str_replace("&", "-9n-", $tukhoa);
        $tukhoa = str_replace(" ", "-", $tukhoa);
    } elseif ($kieu == 2) {
        $tukhoa = trim($tukhoa);
        $tukhoa = str_replace('-1n-', "%", $tukhoa);
        $tukhoa = str_replace("-2n-", "/", $tukhoa);
        $tukhoa = str_replace("-3n-", ",", $tukhoa);
        $tukhoa = str_replace("-4n-", "?", $tukhoa);
        $tukhoa = str_replace("-5n-", '+', $tukhoa);
        $tukhoa = str_replace("-6n-", "@", $tukhoa);
        $tukhoa = str_replace("-7n-", "#", $tukhoa);
        $tukhoa = str_replace("-8n-", "$", $tukhoa);
        $tukhoa = str_replace("-9n-", "&", $tukhoa);
        $tukhoa = str_replace("-", " ", $tukhoa);
    }
    return $tukhoa;
}

function guimail($ng_ten, $ng_email, $ch_email, $ch_pass, $nn_ten, $nn_email, $tieude, $noidung)
{
    $mail          = new PHPMailer();
    $mail->CharSet = "UTF-8";
    $mail->IsSMTP();
    $mail->Host     = "localhost";
    $mail->Port     = 25;
    $mail->SMTPAuth = true;
    $mail->Username = $ch_email;
    $mail->Password = $ch_pass;
    $mail->From     = $ng_email;
    $mail->FromName = $ng_ten;
    $mail->AddAddress($nn_email, $nn_ten);
    $mail->AddReplyTo($ng_email, $ng_ten);
    $mail->WordWrap = 50;
    $mail->IsHTML(true);
    $mail->Subject = $tieude;
    $mail->Body    = $noidung;
    $mail->AltBody = $tieude;
    if (!$mail->Send()) {
        $kq = 0;
    } else {
        $kq = 1;
    }
    return $kq;
}

function delete_image($table, $id, $dxoa)
{
    global $conn;
    
    settype($id, "int");
    $id = "WHERE iditem='" . $id . "'";
    
    $sql = "SELECT * FROM $table $id";
    $kq = mysql_query($sql) or die(mysql_error());
    while ($row_xoahinh = mysql_fetch_assoc($kq)) {
        echo $id1 = 'WHERE id=' . "'" . $row_xoahinh['id'] . "'";
        if ($dxoa == ' ') {
            $link_hinh = $row_xoahinh['image'];
        } elseif ($dxoa != ' ') {
            $link_hinh = $dxoa . $row_xoahinh['image'];
        }
        
        if (file_exists($link_hinh)) {
            unlink($link_hinh);
        }
        
        $sql = "DELETE FROM $table $id1";
        $kq1 = mysql_query($sql) or die(mysql_error());
    }
    
}
?>