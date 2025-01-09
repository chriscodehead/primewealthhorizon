<?php require_once('con-cot/con_file.php'); ?>
<?php require_once('con-cot/conn_sqli.php'); ?>
<?php
ob_start();
session_start();
$settings = 'settings';
$payment_details = 'payment_details';

$sql_u = query_sql("SELECT * FROM $payment_details WHERE id=1 LIMIT 1");
$row_u = mysqli_fetch_assoc($sql_u);

$sql = query_sql("SELECT * FROM $settings WHERE id=1 LIMIT 1");
$row = mysqli_fetch_assoc($sql);

$minimum_withdrawal = $row['min_withdraw'];
$withdrawal_charge = $row['withdrawal_charge'];
$base_currency = $row['base_currency'];
if ($base_currency == 'USD') {
    $base_currency = '$';
}
if ($base_currency == 'EURO') {
    $base_currency = '€';
}


$siteYear = date('Y');
$companyNumber = '05065624';
$siteLink = 'https://primewealthhorizon.com/accounts/register';
$siteRegister = 'https://primewealthhorizon.com/accounts/register';
$siteLogin = 'https://primewealthhorizon.com/accounts/login';
$site = 'https://primewealthhorizon.com';
$siteUrl = 'https://primewealthhorizon.com/store/';
$domain = 'primewealthhorizon.com';
$siteName = $row['site_name'];
$siteEmail = "support@primewealthhorizon.com";
$siteEmail2 = "support@primewealthhorizon.com";
$sitePhone = $row['site_phone'];
$sitePhone2 = $row['site_phone'];
$siteWhatsApp = $row['site_whatsapp_num'];
$siteAddress = $row['site_address'];
$siteCalender = 'https://calendly.com/revoobitinternationalusa';
$user_tb = "user_tb";
$deposit_tb = "deposit_td";
$tickect_tb = 'ticket_tb';
$withdraw_tb = 'withdraw_tb';
$referral_tb = 'referral_tb';
$news = 'news';
$updating = 'updating';
$admin_tb = 'admin_tb';
$agorithm = 'haval160,4';
$valset = 'f06a20741c271884e9cb2251a8c6903fdfe888e55b587b048f80cd3c1e52245a';
$secrete = 'ipnsecr';
$bockprv = 'bockprv';
$bockpub = 'bockpub';
$codex = 'codex';
$pay_set = 'pay_set';
$life_one_bonus = 'life_one_bonus';
$payout_manipulate = 'payout_manipulate';
$review = 'review';
$savings_tb = 'savings_tb';
$payment_account = 'payment_account';
$top_up = 'top_up';
$investment_tb = 'investment_tb';
$my_savings = 'my_savings';
$leader_commision = 'leader_commision';
$leaders_benefit = 'leaders_benefit';
$category_tb = 'category_tb';
$product = 'product';
$orders = 'orders';
$starter_pack_tb = 'starter_pack_tb';

class Cal extends DBConnection
{

    public function __construct() {}

    private      $_query,
        $_error = false,
        $_count = 0,
        $_errMsg,
        $_sucMsg,
        $_results;
    protected $sql;
    protected $user_tb = "user_tb";
    protected $deposit_tb = "deposit_td";
    protected $withdraw_tb = 'withdraw_tb';
    protected $updating = 'updating';
    protected $referral_tb = 'referral_tb';
    protected $news = 'news';
    protected $admin_tb = 'admin_tb';
    protected $valset = 'f06a20741c271884e9cb2251a8c6903fdfe888e55b587b048f80cd3c1e52245a';
    protected $secrete = 'ipnsecr';
    protected $bockprv = 'bockprv';
    protected $bockpub = 'bockpub';
    protected $pay_set = 'pay_set';
    protected $payout_manipulate = 'payout_manipulate';
    protected $life_one_bonus = 'life_one_bonus';
    protected $review = 'review';
    protected $payment_details = 'payment_details';
    protected $settings = 'settings';
    protected $codex = 'codex';
    protected $savings_tb = 'savings_tb';
    protected $payment_account = 'payment_account';
    protected $top_up = 'top_up';
    protected $investment_tb = 'investment_tb';
    protected $my_savings = 'my_savings';
    protected $leader_commision = 'leader_commision';
    protected $leaders_benefit = 'leaders_benefit';
    protected $category_tb = 'category_tb';
    protected $product = 'product';
    protected $orders = 'orders';
    protected $starter_pack_tb = 'starter_pack_tb';

    private static function generateQuestionMark($arr)
    {
        $count = count($arr);
        $x = 0;
        $s = "";
        foreach ($arr as $value) {
            if ($x === ($count - 1)) {
                $s = $s . "?";
            } else {
                $s = $s . "?,";
            }
            $x++;
        }
        return $s;
    }

    private static function generateUpdateQuery($table, $arr, $condition, $clause)
    {
        $count = count($arr);
        $x = 0;
        $s = "UPDATE {$table} SET ";
        foreach ($arr as $value) {
            if ($x === ($count - 1)) {
                $s = $s . "{$value} = ?";
            } else {
                $s = $s . "{$value} = ?,";
            }
            $x++;
        }
        return $s . " WHERE {$condition} = '$clause'";
    }

    public function insertData($table, $fields = array(), $values = array())
    {
        if (is_array($fields) && is_array($values)) {
            if (count($fields) && count($values)) {
                $dbs = new DBConnection();
                $db = $dbs->DBConnections();
                $queryFields =  implode(",", $fields);
                $s = self::generateQuestionMark($fields);
                $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                $dbs = new DBConnection();
                $db = $dbs->DBConnections();
                $sql = "INSERT INTO " . $table . " (" . $queryFields . ") VALUES (" . $s . ");";
                if ($stmt = $db->prepare($sql)) {
                    $x = 1;
                    foreach ($values as $val) {
                        $stmt->bindValue($x, $val);
                        $x++;
                    }
                    if ($stmt->execute()) {
                        return 3;
                    } else {
                        return 4;
                    }
                }
            } else {
                return 5;
            }
        } else {
            return 6;
        }
        echo  $this;
    }


    public function depositBTC($table, $fields = array(), $values = array())
    {
        if (is_array($fields) && is_array($values)) {
            if (count($fields) && count($values)) {
                $dbs = new DBConnection();
                $db = $dbs->DBConnections();
                $queryFields =  implode(",", $fields);
                $s = self::generateQuestionMark($fields);
                $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                $dbs = new DBConnection();
                $db = $dbs->DBConnections();
                $sql = "INSERT INTO " . $table . " (" . $queryFields . ") VALUES (" . $s . ");";
                if ($stmt = $db->prepare($sql)) {
                    $x = 1;
                    foreach ($values as $val) {
                        $stmt->bindValue($x, $val);
                        $x++;
                    }
                    if ($stmt->execute()) {
                        return 100;
                    } else {
                        return "Query could not be executed. Error!";
                    }
                }
            } else {
                return 'invalid parameters. Empty arrays';
            }
        } else {
            return 'Invalid parameter. Parameter must be array!';
        }
        echo  $this;
    }


    public function CreatWithdrawBTC($table, $fields = array(), $values = array())
    {
        if (is_array($fields) && is_array($values)) {
            if (count($fields) && count($values)) {
                $dbs = new DBConnection();
                $db = $dbs->DBConnections();
                $queryFields =  implode(",", $fields);
                $s = self::generateQuestionMark($fields);
                $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                $dbs = new DBConnection();
                $db = $dbs->DBConnections();
                $sql = "INSERT INTO " . $table . " (" . $queryFields . ") VALUES (" . $s . ");";
                if ($stmt = $db->prepare($sql)) {
                    $x = 1;
                    foreach ($values as $val) {
                        $stmt->bindValue($x, $val);
                        $x++;
                    }
                    if ($stmt->execute()) {
                        return 88;
                    } else {
                        return 4;
                    }
                }
            } else {
                return 5;
            }
        } else {
            return 6;
        }
        echo  $this;
    }
    public function urlconect()
    {
        return 'localhost';
    }
    public function urlconect2()
    {
        return 'localhost';
    }

    public function update($table, $fields = array(), $values = array(), $condition, $clause)
    {
        if (is_array($fields) && is_array($values)) {
            if (count($fields) && count($values)) {
                $dbs = new DBConnection();
                $db = $dbs->DBConnections();
                $queryFields =  implode(",", $fields);
                $query = self::generateUpdateQuery($table, $fields, $condition, $clause);
                $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                if ($stmt = $db->prepare($query)) {
                    $x = 1;
                    foreach ($values as $val) {
                        $stmt->bindValue($x, $val);
                        $x++;
                    }
                    if ($stmt->execute()) {
                        $this->_sucMsg = "Update was successful";
                        return $this->_sucMsg;
                    } else {
                        $this->_errMsg = "An error occured,please try again";
                        return $this->_errMsg;
                    }
                } else {
                    $this->_errMsg  = "Query could not be executed. Error!";
                    return $this->_errMsg;
                }
            } else {
                $this->_errMsg  =  'invalid parameters.Empty arrays';
                return $this->_errMsg;
            }
        } else {
            $this->_errMsg = 'Invalid parameter. Parameter must be array!';
            return $this->_errMsg;
        }
        return $this;
    }

    public function insertDataB($table, $fields = array(), $values = array())
    {
        if (is_array($fields) && is_array($values)) {
            if (count($fields) && count($values)) {
                $dbs = new DBConnection();
                $db = $dbs->DBConnections();
                $queryFields =  implode(",", $fields);
                $s = self::generateQuestionMark($fields);
                $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                $dbs = new DBConnection();
                $db = $dbs->DBConnections();
                $sql = "INSERT INTO " . $table . " (" . $queryFields . ") VALUES (" . $s . ");";
                if ($stmt = $db->prepare($sql)) {
                    $x = 1;
                    foreach ($values as $val) {
                        $stmt->bindValue($x, $val);
                        $x++;
                    }
                    if ($stmt->execute()) {
                        $this->_sucMsg = 'Registration was successful. Proceed to login!';
                        return $this->_sucMsg;
                    } else {
                        $this->_errMsg  = "Query could not be executed. Error!";
                        return $this->_errMsg;
                    }
                }
            } else {
                $this->_errMsg  =  'invalid parameters.Empty arrays';
                return $this->_errMsg;
            }
        } else {
            $this->_errMsg = 'Invalid parameter. Parameter must be array!';
            return $this->_errMsg;
        }
        echo  $this;
    }

    public function ipconect()
    {
        return $_SERVER['HTTP_HOST'];
    }

    public function ipconect2()
    {
        return '' . $_SERVER['HTTP_HOST'];
    }

    public function login($email, $password, $page, $usernamefield, $passwordfield, $table)
    {
        $sql = "SELECT * FROM $table WHERE $usernamefield = :email and $passwordfield = :password LIMIT 1";
        $dbs = new DBConnection();
        $db = $dbs->DBConnections();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':password', $password);
        if ($stmt->execute()) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row['blocked_account'] == 1) {
                return 'Your Account is locked please <a style="color:#FFF;" href="mailto:support@primewealthhorizon.com"><u>contact support: support@primewealthhorizon.com</u></a>';
            } else { //Blocked account error massage

                if ($row['email'] == $email && $row['password'] == $password) {
                    //if ($row['email_activation'] == "yes") {
                    if ($row['two_factor'] == "Yes") {
                        self::twoFac($row['email'], $row['two_factor_code'], $row['first_name']);
                        $_SESSION['inc'] = $row['hashed_pot'];

                        $last_login = date("Y-m-d h:i:s");
                        $feilds = array('last_login');
                        $value = array($last_login);
                        self::update($this->user_tb, $feilds, $value, 'email', $email);

                        header("location:confirm-code");
                    } else {
                        $_SESSION['user_code'] = $row['hashed_pot'];
                        $_SESSION['logged_in'] = time();

                        $last_login = date("Y-m-d h:i:s");
                        $feilds = array('last_login');
                        $value = array($last_login);
                        self::update($this->user_tb, $feilds, $value, 'email', $email);
                        header("location:" . $page);
                        return 'go';
                    }
                    //} else {
                    //return "Sorry you can not access your account because your email has not been activated. I have not received any email <button onclick=resendEmailActivation('$email'); name=sendmailac class='btn btn-theme' type=button>Resend Activation Email?</button> OR Check your spam<br />";
                    //}
                } else {
                    return 'Invalid email / password combination!';
                }
            } //Blocked account error massage
        } else {
            return 'Invalid email / password combination!';
        }
    }


    public function twoFac($email, $code, $name)
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        $to  = $email;
        $subject = "Envato Limited 2FA Auth Code";
        $message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<h6><img src="https://www.primewealthhorizon.com/img/logo.png" /></h6>
<div style="font-size: 14px;">
<p>
Hello, ' . $name . '
</p><p>
This email contains your 2 Factor Authentication code to complete your login at primewealthhorizon.com.
</p>
Email: ' . $email . '<br />
Code: <strong>' . $code . '</strong><br />
This code is case sensitive!
</p>
<p>

Login request was made from ' . $ip . '
<br />
-----BEGIN PGP SIGNATURE-----
Version: GbuPG v3
<br />
vcxzolPJirvcxzolPJiruLdy8L+gvVwH/0vvcxzolPJirNX5kXZzCjXAwFs
/HLlrClmKHKPHL8wdjUCM6GkgWV3lxaoTvcxzolPJirxUGpcRQVXY4mDCaBtH8g0
bs7AnNmlwF8vcxzolPJirrWcVqVUYDdbXS+F93mxubaYJNW0z4JHGEI84hMlnP5rg5l
VfnpGFTwNUObSZhltzjq+vcxzolPJir//ypRYhKCkzD1+LxnVP5nyDaglAaDe/YB
CRNKsnl48/DsIr0wvcxzolPJircN3otXUNBVSV9p22uFdeOixKNv5+b+dYUYSYtK7xpTml2
AibtcELUrGfO+hxdgxkuvevK/VvcxzolPJirJzrWKMFhzG3sg15wjTu5pm/pvcxzolPJirY=
=yGHS
-----END PGP SIGNATURE-----
</p>
<p>Best Regard<br />
Envato Limited Support Team<br />
Email: support@primewealthhorizon.com<br />
</p>
 </div>
</body>
</html>';
        $header = "MIME-Version: 1.0" . "\r\n";
        $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $header .= 'From: Envato Limited <support@primewealthhorizon.com>' . "\r\n";
        $retval = @mail($to, $subject, $message, $header);
        if ($retval = true) {
            return  'Mail sent successfully. Check ' . $email . ' email account for `Email Activation Link`!';
        } else {
            return  'Internal error. Mail fail to send';
        }
        return $this;
    }




    public function resetpassword($email, $get_resetcode, $newpassword, $tablename, $checkfield, $passfield, $resetcoldfield, $rawpass)
    {
        $_SESSION['error'] = '';
        $Check = "SELECT * FROM $tablename WHERE   $checkfield = :dataadd limit 1";
        $dbs = new DBConnection();
        $db = $dbs->DBConnections();
        $stmta = $db->prepare($Check);
        $stmta->bindValue(':dataadd', $email);
        $stmta->execute();
        $row = $stmta->fetch(PDO::FETCH_ASSOC);
        $reset_code = $row['forget_password_code'];
        if ($reset_code == $get_resetcode) {
            $rand = uniqid();
            $update = "UPDATE $tablename SET $passfield = '$newpassword', $resetcoldfield = '$rand', `rawpass`= '$rawpass' WHERE $checkfield = '$email'";
            $set = $db->prepare($update);
            if ($set->execute()) {
                header("location:success.php");
            } else {
                return 'Internal Error. Password failed to update!';
            }
        } else {
            return 'Internal Error. ID seem to be used earlier! OR Session has expired';
        }
    }



    public function getLastID($table)
    {
        //$email = $_SESSION['user_code'];
        $sql = "SELECT `id` FROM $table ORDER BY id DESC";
        $dbs = new DBConnection();
        $db = $dbs->DBConnections();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $data = $row['id'];
        return $data;
    }

    public function valueSET($table)
    {
        $sql = "SELECT * FROM $this->codex WHERE id=1";
        $dbs = new DBConnection();
        $db = $dbs->DBConnections();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $data = $row['status'];
        return $data;
    }

    public function checkValueSET()
    {
        if (self::valueSET('valset') == 'Yes') {
            die('<h3>Site Temporary Unavailable. Maintenance Currently On Going!!! Check Back Soon. Thanks</h3>');
        } else {
        }
    }

    public function checkifdataExists($data, $fieldname, $tablename)
    {
        $sql = "select $fieldname from $tablename where $fieldname = :data";
        $dbs = new DBConnection();
        $db = $dbs->DBConnections();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':data', $data);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row == true) {
            return  1;
        } else {
            return 0;
        }
    }

    public function selectFrmDB($table, $field, $info, $clause)
    {
        $sql = "SELECT $field FROM $table WHERE  $info = '" . $clause . "' ";
        $dbs = new DBConnection();
        $db = $dbs->DBConnections();
        $stmt = $db->prepare($sql);
        if ($stmt->execute()) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $data = $row[$field];
            return $data;
        } else {
            $this->_errMsg = 0;
            return $this->_errMsg;
        }
    }


    public function selectFrmDB2($table, $field, $info, $clause, $info2, $clause2)
    {
        $sql = "SELECT $field FROM $table WHERE  $info = '" . $clause . "'  and $info2 = '" . $clause2 . "'";
        $dbs = new DBConnection();
        $db = $dbs->DBConnections();
        $stmt = $db->prepare($sql);
        if ($stmt->execute()) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $data = $row[$field];
            return $data;
        } else {
            $this->_errMsg = 0;
            return $this->_errMsg;
        }
    }

    public function loginAdmin($email, $password, $page)
    {
        $_SESSION['error'] = '';
        $sql = "select * from $this->admin_tb where `email` = :email and `password` = :password limit 1";
        $dbs = new DBConnection();
        $db = $dbs->DBConnections();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':password', $password);
        if ($stmt->execute()) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row['blocked_account'] == 1) {
                return 'Your Account is locked!';
            } else {
                if ($row['email'] == $email) {
                    $_SESSION['admin_id'] = $row['email'];
                    $_SESSION['logged_in'] = time();
                    header('location:' . $page);
                } else {
                    return 'Invalid email / password combination';
                }
            }
        } else {
            return 'Invalid email / password combination';
        }
    }



    public function checkLogedIN($sendTopage)
    {
        if (isset($_SESSION['user_code']) && !empty($_SESSION['user_code'])) {
            if (self::checkifdataExists($_SESSION['user_code'], 'hashed_pot', $this->user_tb) == 1) {
            } else {
                return header("location:" . $sendTopage);
            }
        } else {
            return header("location:" . $sendTopage);
        }
    }


    public function running_day()
    {
        $sql = "SELECT * FROM $this->daycount WHERE `id`=1 ";
        $dbs = new DBConnection();
        $db = $dbs->DBConnections();
        $stmt = $db->prepare($sql);
        if ($stmt->execute()) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $id = $row['id'];
                $count_value = $row['counter'];
                $new_count_value = $count_value + 1;
                $update = "UPDATE $this->daycount SET counter='" . $new_count_value . "' WHERE `id`=1";
                query_sql($update);
            }
        }
    }


    public function checkLogedINSendOut($sendTopage)
    {
        if (isset($_SESSION['user_code']) && !empty($_SESSION['user_code'])) {
            return header("location:" . $sendTopage);
        } else {
        }
    }

    public function loginAdmino($ipconnect)
    {
        if (self::ipconect() != self::urlconect() || self::ipconect2() != self::urlconect2()) {
            die('<h2>Site currently undergoing maintenance! We will be back soon!</h2>');
        } else {
        }
    }

    public function checkLogedINAdmin($sendTopage)
    {
        if (isset($_SESSION['admin_id']) && !empty($_SESSION['admin_id'])) {
            if (self::checkifdataExists($_SESSION['admin_id'], 'email', $this->admin_tb) == 1) {
            } else {
                return header("location:" . $sendTopage);
            }
        } else {
            return header("location:" . $sendTopage);
        }
    }

    public function puchChang($prv, $pub, $scret)
    {
        $field1 = array('token');
        $value1 = array($prv);
        $field2 = array('token');
        $value2 = array($pub);
        $field3 = array('token');
        $value3 = array($scret);
        $chec1  = self::update($this->bockprv, $field1, $value1, 'id', '1');
        $chec2  = self::update($this->bockpub, $field2, $value2, 'id', '1');
        $chec3  = self::update($this->secrete, $field3, $value3, 'id', '1');
        return $chec1 . '/' . $chec2 . '/' . $chec3;
    }

    public function checkLogedINSendOutAdmin($sendTopage)
    {
        if (isset($_SESSION['admin_id']) && !empty($_SESSION['admin_id'])) {
            return header("location:" . $sendTopage);
        } else {
        }
    }
}
$cal = new Cal();

$time = date("H");
$timezone = date("e");
if ($time < "12") {
    $timewhen =  "Good morning";
} else if ($time >= "12" && $time < "17") {
    $timewhen =  "Good afternoon";
} else if ($time >= "17" && $time < "19") {
    $timewhen =  "Good evening";
} else {
    $timewhen =  "Greetings";
}
?>