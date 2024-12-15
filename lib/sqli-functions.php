<?php
$user_tb = "user_tb";
class sqli
{
	protected $user_tb = "user_tb";
	protected $deposit_tb = "deposit_td";
	protected $withdraw_tb = 'withdraw_tb';
	protected $referral_tb = 'referral_tb';
	protected $tickect_tb = 'ticket_tb';
	protected $news = 'news';
	protected $admin_tb = 'admin_tb';
	protected $pay_set = 'pay_set';
	protected $daycount = 'daycount';
	protected $review = 'review';
	protected $payment_details = 'payment_details';
	protected $settings = 'settings';
	protected $savings_tb = 'savings_tb';
	protected $payment_account = 'payment_account';
	protected $top_up = 'top_up';
	protected $my_savings = 'my_savings';
	protected $leader_commision = 'leader_commision';
	protected $leaders_benefit = 'leaders_benefit';
	protected $category_tb = 'category_tb';
	protected $product = 'product';


	function countProductByCategory($categoryId)
	{
		$sql = "SELECT * FROM $this->product WHERE `category_id`='" . $categoryId . "' and `product_status`=1 ";
		$stmt = query_sql($sql);
		$cont = 0;
		while ($row = mysqli_fetch_assoc($stmt)) {
			$cont++;
		}
		return $cont;
	}

	public function getCategoryTable($categoryID, $selectItem)
	{
		$sql = "SELECT * FROM $this->category_tb WHERE `category_id`='" . $categoryID . "' ";
		$stmt = query_sql($sql);
		$row = mysqli_fetch_assoc($stmt);
		return $row[$selectItem];
	}

	public function getReferrals($user_id)
	{
		$referrals = array();

		// First generation referrals
		$sql = "SELECT * FROM $this->user_tb WHERE `referral_username`='$user_id'  AND `referral_username` IS NOT NULL AND `referral_username`!=''";
		$result = query_sql($sql);
		while ($row = $result->fetch_assoc()) {
			$referrals[] = $row['client_username'];
		}

		// Second generation referrals
		foreach ($referrals as $referral) {
			$sql = "SELECT * FROM $this->user_tb WHERE `referral_username`='$referral'  AND `referral_username` IS NOT NULL AND `referral_username`!=''";
			$result = query_sql($sql);
			while ($row = $result->fetch_assoc()) {
				$referrals[] = $row['client_username'];
			}
		}

		// // Third generation referrals
		foreach ($referrals as $referral) {
			$sql = "SELECT * FROM $this->user_tb WHERE `referral_username`='$referral'  AND `referral_username` IS NOT NULL AND `referral_username`!=''";
			$result = query_sql($sql);
			while ($row = $result->fetch_assoc()) {
				$referrals[] = $row['client_username'];
			}
		}

		$user_rank = count($referrals);
		$sql_rank = "UPDATE $this->user_tb SET `affiliate_rank` = $user_rank WHERE `client_username` = '" . $user_id . "'  ";
		$stmt = query_sql($sql_rank);

		if ($user_rank >= 5 && $user_rank <= 9) {
			$cont = 0;
			$amount = 2500;
			$duration = 5;
			$month_count = 0;
			$status = 'processing';
			$level = 1;
			$date_created = date("F j, Y, g:i a");
			$sql = "SELECT * FROM $this->leaders_benefit WHERE `client_username`='" . $user_id . "' and `level`=1 ";
			$stmt = query_sql($sql);

			while ($row = mysqli_fetch_assoc($stmt)) {
				$cont++;
			}

			if ($cont > 0) {
				//do nothing
			} else {
				$sql = "INSERT INTO $this->leaders_benefit VALUES (null, '" . $user_id . "', '" . $amount . "', '" . $duration . "', '" . $month_count . "', '" . $status . "', '" . $level . "', '" . $date_created . "')";
				$stmt = query_sql($sql);
			}
		}

		if ($user_rank >= 10 && $user_rank <= 19) {
			$cont = 0;
			$amount = 5000;
			$duration = 5;
			$month_count = 0;
			$status = 'processing';
			$level = 2;
			$date_created = date("F j, Y, g:i a");
			$sql = "SELECT * FROM $this->leaders_benefit WHERE `client_username`='" . $user_id . "' and `level`=2 ";
			$stmt = query_sql($sql);

			while ($row = mysqli_fetch_assoc($stmt)) {
				$cont++;
			}

			if ($cont > 0) {
				//do nothing
			} else {
				$sql = "INSERT INTO $this->leaders_benefit VALUES (null, '" . $user_id . "', '" . $amount . "', '" . $duration . "', '" . $month_count . "', '" . $status . "', '" . $level . "', '" . $date_created . "')";
				$stmt = query_sql($sql);
			}
		}

		if ($user_rank >= 20 && $user_rank <= 49) {
			$cont = 0;
			$amount = 10000;
			$duration = 5;
			$month_count = 0;
			$status = 'processing';
			$level = 3;
			$date_created = date("F j, Y, g:i a");
			$sql = "SELECT * FROM $this->leaders_benefit WHERE `client_username`='" . $user_id . "' and `level`=3 ";
			$stmt = query_sql($sql);

			while ($row = mysqli_fetch_assoc($stmt)) {
				$cont++;
			}

			if ($cont > 0) {
				//do nothing
			} else {
				$sql = "INSERT INTO $this->leaders_benefit VALUES (null, '" . $user_id . "', '" . $amount . "', '" . $duration . "', '" . $month_count . "', '" . $status . "', '" . $level . "', '" . $date_created . "')";
				$stmt = query_sql($sql);
			}
		}

		if ($user_rank >= 50 && $user_rank <= 99) {
			$cont = 0;
			$amount = 50000;
			$duration = 5;
			$month_count = 0;
			$status = 'processing';
			$level = 4;
			$date_created = date("F j, Y, g:i a");
			$sql = "SELECT * FROM $this->leaders_benefit WHERE `client_username`='" . $user_id . "' and `level`=4 ";
			$stmt = query_sql($sql);

			while ($row = mysqli_fetch_assoc($stmt)) {
				$cont++;
			}

			if ($cont > 0) {
				//do nothing
			} else {
				$sql = "INSERT INTO $this->leaders_benefit VALUES (null, '" . $user_id . "', '" . $amount . "', '" . $duration . "', '" . $month_count . "', '" . $status . "', '" . $level . "', '" . $date_created . "')";
				$stmt = query_sql($sql);
			}
		}

		if ($user_rank >= 100 && $user_rank <= 299) {
			$cont = 0;
			$amount = 100000;
			$duration = 5;
			$month_count = 0;
			$status = 'processing';
			$level = 5;
			$date_created = date("F j, Y, g:i a");
			$sql = "SELECT * FROM $this->leaders_benefit WHERE `client_username`='" . $user_id . "' and `level`=5 ";
			$stmt = query_sql($sql);

			while ($row = mysqli_fetch_assoc($stmt)) {
				$cont++;
			}

			if ($cont > 0) {
				//do nothing
			} else {
				$sql = "INSERT INTO $this->leaders_benefit VALUES (null, '" . $user_id . "', '" . $amount . "', '" . $duration . "', '" . $month_count . "', '" . $status . "', '" . $level . "', '" . $date_created . "')";
				$stmt = query_sql($sql);
			}
		}

		if ($user_rank >= 300 && $user_rank <= 999) {
			$cont = 0;
			$amount = 300000;
			$duration = 5;
			$month_count = 0;
			$status = 'processing';
			$level = 6;
			$date_created = date("F j, Y, g:i a");
			$sql = "SELECT * FROM $this->leaders_benefit WHERE `client_username`='" . $user_id . "' and `level`=6 ";
			$stmt = query_sql($sql);

			while ($row = mysqli_fetch_assoc($stmt)) {
				$cont++;
			}

			if ($cont > 0) {
				//do nothing
			} else {
				$sql = "INSERT INTO $this->leaders_benefit VALUES (null, '" . $user_id . "', '" . $amount . "', '" . $duration . "', '" . $month_count . "', '" . $status . "', '" . $level . "', '" . $date_created . "')";
				$stmt = query_sql($sql);
			}
		}

		if ($user_rank >= 1000) {
			$cont = 0;
			$amount = 1000000;
			$duration = 5;
			$month_count = 0;
			$status = 'processing';
			$level = 7;
			$date_created = date("F j, Y, g:i a");
			$sql = "SELECT * FROM $this->leaders_benefit WHERE `client_username`='" . $user_id . "' and `level`=7 ";
			$stmt = query_sql($sql);

			while ($row = mysqli_fetch_assoc($stmt)) {
				$cont++;
			}

			if ($cont > 0) {
				//do nothing
			} else {
				$sql = "INSERT INTO $this->leaders_benefit VALUES (null, '" . $user_id . "', '" . $amount . "', '" . $duration . "', '" . $month_count . "', '" . $status . "', '" . $level . "', '" . $date_created . "')";
				$stmt = query_sql($sql);
			}
		}

		return $referrals;
	}


	function countInvestments($email, $plan)
	{
		$sql = "SELECT * FROM $this->my_savings WHERE `email`='" . $email . "' and `plan`='" . $plan . "' ";
		$stmt = query_sql($sql);
		$cont = 0;
		while ($row = mysqli_fetch_assoc($stmt)) {
			$cont++;
		}
		return $cont;
	}

	public function getMySavings($id, $item)
	{
		$sql = "SELECT * FROM $this->my_savings WHERE `saving_id`='" . $id . "' ";
		$stmt = query_sql($sql);
		$row = mysqli_fetch_assoc($stmt);
		return $row[$item];
	}

	public function GetTopup($pid, $field)
	{
		$sql = "SELECT * FROM $this->top_up WHERE `payment_id` = '" . $pid . "'";
		$stmt = query_sql($sql);
		$row = mysqli_fetch_assoc($stmt);
		return $row[$field];
	}

	public function countReviews($email)
	{
		$sql = "SELECT * FROM $this->review WHERE `email`='" . $email . "' ";
		$stmt = query_sql($sql);
		$cont = 0;
		while ($row = mysqli_fetch_assoc($stmt)) {
			$cont++;
		}
		return $cont;
	}

	public function getSettings($item)
	{
		$sql = "SELECT * FROM $this->settings WHERE `id`=1";
		$stmt = query_sql($sql);
		$row = mysqli_fetch_assoc($stmt);
		return $row[$item];
	}

	public function getSavings($item)
	{
		$sql = "SELECT * FROM $this->savings_tb WHERE `id`=1";
		$stmt = query_sql($sql);
		$row = mysqli_fetch_assoc($stmt);
		return $row[$item];
	}

	public function countAvailableInterest($email)
	{
		$sql = "SELECT * FROM $this->deposit_tb WHERE `email`='" . $email . "' and `deposit_status`='confirmed' ";
		$stmt = query_sql($sql);
		$cont = 0;
		$amt = 0;
		while ($row = mysqli_fetch_assoc($stmt)) {
			$amt  += $row['intrest_growth'];
			$cont++;
		}
		return $amt;
	}

	public function countpaidDeposit($email)
	{
		$sql = "SELECT * FROM $this->deposit_tb WHERE `email`='" . $email . "' and `deposit_status`='confirmed' ";
		$stmt = query_sql($sql);
		$cont = 0;
		$amt = 0;
		while ($row = mysqli_fetch_assoc($stmt)) {
			$amt  += $row['amount'];
			$cont++;
		}
		return $amt;
	}

	public function getDayCounter()
	{
		$sql = "SELECT * FROM $this->daycount WHERE `id`=1";
		$stmt = query_sql($sql);
		$row = mysqli_fetch_assoc($stmt);
		return $row['counter'];
	}

	public function countReferals($username)
	{
		$sql = "SELECT * FROM $this->user_tb WHERE `referral_username`='" . $username . "' ";
		$stmt = query_sql($sql);
		$cont = 0;
		while ($row = mysqli_fetch_assoc($stmt)) {
			$cont++;
		}
		return $cont;
	}

	public function GetReferral($refusername, $field)
	{
		$sql = "SELECT * FROM $this->user_tb WHERE `client_username` = '" . $refusername . "'";
		$stmt = query_sql($sql);
		$row = mysqli_fetch_assoc($stmt);
		return $row[$field];
	}

	public function countAvailableInterestPAT($email, $cointype)
	{
		$sql = "SELECT * FROM $this->deposit_tb WHERE `email`='" . $email . "' and `deposit_status`='confirmed'  and `coin_type`='" . $cointype . "'";
		$stmt = query_sql($sql);
		$cont = 0;
		$amt = 0;
		while ($row = mysqli_fetch_assoc($stmt)) {
			$amt  += $row['intrest_growth'];
			$cont++;
		}
		return $amt;
	}

	public function getLastDeposit($email)
	{
		$sql = "SELECT * FROM $this->deposit_tb WHERE `email`='" . $email . "' and `deposit_status`='confirmed' ORDER BY id LIMIT 1";
		$stmt = query_sql($sql);
		$cont = 0;
		$amt = 0;
		while ($row = mysqli_fetch_assoc($stmt)) {
			$amt  += $row['amount'];
			$cont++;
		}
		return $amt;
	}

	public function countAvailableBonus($email)
	{
		$sql = "SELECT * FROM $this->referral_tb WHERE `referral_email`='" . $email . "' and `status`='confirmed' ";
		$stmt = query_sql($sql);
		$cont = 0;
		$amt = 0;
		while ($row = mysqli_fetch_assoc($stmt)) {
			$amt  += $row['balance'];
			$cont++;
		}
		return $amt;
	}

	public function countAllBonusRef($email)
	{
		$sql = "SELECT * FROM $this->referral_tb WHERE `referral_email`='" . $email . "' and `status`='confirmed' ";
		$stmt = query_sql($sql);
		$cont = 0;
		$amt = 0;
		while ($row = mysqli_fetch_assoc($stmt)) {
			$amt  += $row['amount'];
			$cont++;
		}
		return $amt;
	}

	public function getRefcom($email, $ref)
	{
		$sql = "SELECT * FROM $this->referral_tb WHERE `referral_email`='" . $email . "' and `status`='confirmed' and `referral_level`='" . $ref . "'";
		$stmt = query_sql($sql);
		$cont = 0;
		$amt = 0;
		while ($row = mysqli_fetch_assoc($stmt)) {
			$amt  += $row['balance'];
			$cont++;
		}
		return $amt;
	}

	public function gettodayRefcom($email)
	{
		$sql = "SELECT * FROM $this->referral_tb WHERE `referral_email`='" . $email . "' and `status`='confirmed' ORDER BY id DESC LIMIT 1";
		$stmt = query_sql($sql);
		$cont = 0;
		$amt = 0;
		while ($row = mysqli_fetch_assoc($stmt)) {
			$amt  += $row['amount'];
			$cont++;
		}
		return $amt;
	}

	public function getallRefcom($email)
	{
		$sql = "SELECT * FROM $this->referral_tb WHERE `referral_email`='" . $email . "' and `status`='confirmed' ORDER BY id DESC";
		$stmt = query_sql($sql);
		$cont = 0;
		$amt = 0;
		while ($row = mysqli_fetch_assoc($stmt)) {
			$amt  += $row['amount'];
			$cont++;
		}
		return $amt;
	}

	public function getPaymentDetails($item)
	{
		$sql = "SELECT * FROM $this->payment_details WHERE `id`=1";
		$stmt = query_sql($sql);
		$row = mysqli_fetch_assoc($stmt);
		return $row[$item];
	}

	public function getPaymentAccount($item)
	{
		$sql = "SELECT * FROM $this->payment_account WHERE `id`=1";
		$stmt = query_sql($sql);
		$row = mysqli_fetch_assoc($stmt);
		return $row[$item];
	}

	public function countallRefcom($email)
	{
		$sql = "SELECT * FROM $this->referral_tb WHERE `referral_email`='" . $email . "' ORDER BY id DESC";
		$stmt = query_sql($sql);
		$cont = 0;
		$amt = 0;
		while ($row = mysqli_fetch_assoc($stmt)) {
			$cont++;
		}
		return $cont;
	}

	public function countallLevelRefcom($email, $level)
	{
		$sql = "SELECT * FROM $this->referral_tb WHERE `referral_email`='" . $email . "' and `referral_level`='" . $level . "' ORDER BY id DESC";
		$stmt = query_sql($sql);
		$cont = 0;
		while ($row = mysqli_fetch_assoc($stmt)) {
			$cont++;
		}
		return $cont;
	}

	public function countTotalwithdrawal($email)
	{
		$sql = "SELECT * FROM $this->withdraw_tb WHERE `email`='" . $email . "' and `status`='paid' ";
		$stmt = query_sql($sql);
		$cont = 0;
		$amt = 0;
		while ($row = mysqli_fetch_assoc($stmt)) {
			$amt  += $row['amount'];
			$cont++;
		}
		return $amt;
	}

	public function countTotalPENDINGwithdrawal($email)
	{
		$sql = "SELECT * FROM $this->withdraw_tb WHERE `email`='" . $email . "' and `status`='processing' ";
		$stmt = query_sql($sql);
		$cont = 0;
		$amt = 0;
		while ($row = mysqli_fetch_assoc($stmt)) {
			$amt  += $row['amount'];
			$cont++;
		}
		return $amt;
	}

	public function getLastwithdrawalDate($email)
	{
		$sql = "SELECT * FROM $this->withdraw_tb WHERE `email`='" . $email . "' and `status`='paid' ORDER BY id LIMIT 1";
		$stmt = query_sql($sql);
		$cont = 0;
		$amt = 0;
		while ($row = mysqli_fetch_assoc($stmt)) {
			$amt  = $row['date_time'];
			$cont++;
		}
		return $amt;
	}

	public function getLastwithdrawal($email)
	{
		$sql = "SELECT * FROM $this->withdraw_tb WHERE `email`='" . $email . "' and `status`='paid' ORDER BY id LIMIT 1";
		$stmt = query_sql($sql);
		$cont = 0;
		$amt = 0;
		while ($row = mysqli_fetch_assoc($stmt)) {
			$amt  += $row['amount'];
			$cont++;
		}
		return $amt;
	}

	public function countTotaldeposit($email)
	{
		$sql = "SELECT * FROM $this->deposit_tb WHERE `email`='" . $email . "' and (`deposit_status`='confirmed' || `deposit_status`='done') ";
		$stmt = query_sql($sql);
		$cont = 0;
		$amt = 0;
		while ($row = mysqli_fetch_assoc($stmt)) {
			$amt  += $row['amount'];
			$cont++;
		}
		return $amt;
	}

	public function countmembers()
	{
		$sql = "SELECT * FROM $this->user_tb ";
		$stmt = query_sql($sql);
		$cont = 0;
		while ($row = mysqli_fetch_assoc($stmt)) {
			$cont++;
		}
		return $cont;
	}

	function countDeposit()
	{
		$sql = "SELECT * FROM $this->deposit_tb ";
		$stmt = query_sql($sql);
		$cont = 0;
		while ($row = mysqli_fetch_assoc($stmt)) {
			$cont++;
		}
		return $cont;
	}

	function countAllWallet()
	{
		$sql = "SELECT * FROM $this->deposit_tb ";
		$stmt = query_sql($sql);
		$cont = 0;
		$amt = 0;
		while ($row = mysqli_fetch_assoc($stmt)) {
			$amt  += $row['amount'];
			$cont++;
		}
		return $amt;
	}

	function countAllWithdrawalAmot()
	{
		$sql = "SELECT * FROM $this->withdraw_tb ";
		$stmt = query_sql($sql);
		$cont = 0;
		$amt = 0;
		while ($row = mysqli_fetch_assoc($stmt)) {
			$amt  += $row['amount'];
			$cont++;
		}
		return $amt;
	}

	function countActiveWallet()
	{
		$sql = "SELECT * FROM $this->deposit_tb where (`deposit_status`='confirmed' || `deposit_status`='done')";
		$stmt = query_sql($sql);
		$cont = 0;
		$amt = 0;
		while ($row = mysqli_fetch_assoc($stmt)) {
			$amt  += $row['amount'];
			$cont++;
		}
		return $amt;
	}

	function countAllInterest()
	{
		$sql = "SELECT * FROM $this->deposit_tb";
		$stmt = query_sql($sql);
		$cont = 0;
		$amt = 0;
		while ($row = mysqli_fetch_assoc($stmt)) {
			$amt  += $row['intrest_growth'];
			$cont++;
		}
		return $amt;
	}

	function countConfirmedInterest()
	{
		$sql = "SELECT * FROM $this->deposit_tb where (`deposit_status`='confirmed' || `deposit_status`='done')";
		$stmt = query_sql($sql);
		$cont = 0;
		$amt = 0;
		while ($row = mysqli_fetch_assoc($stmt)) {
			$amt  += $row['intrest_growth'];
			$cont++;
		}
		return $amt;
	}

	function countInterestPlsDeposit()
	{
		$sql = "SELECT * FROM $this->deposit_tb ";
		$stmt = query_sql($sql);
		$cont = 0;
		$amt = 0;
		$inamt = 0;
		while ($row = mysqli_fetch_assoc($stmt)) {
			$inamt  += $row['intrest_growth'];
			$amt  += $row['amount'];
			$cont++;
		}
		$sum = $amt + $inamt;
		return $sum;
	}

	function countConfimInterestPlsDeposit()
	{
		$sql = "SELECT * FROM $this->deposit_tb where  (`deposit_status`='confirmed' || `deposit_status`='done')";
		$stmt = query_sql($sql);
		$cont = 0;
		$amt = 0;
		$inamt = 0;
		while ($row = mysqli_fetch_assoc($stmt)) {
			$inamt  += $row['intrest_growth'];
			$amt  += $row['amount'];
			$cont++;
		}
		$sum = $amt + $inamt;
		return $sum;
	}

	function countNotic()
	{
		$sql = "SELECT * FROM $this->news WHERE `top_massage`=1 ";
		$stmt = query_sql($sql);
		$cont = 0;
		while ($row = mysqli_fetch_assoc($stmt)) {
			$cont++;
		}
		return $cont;
	}

	function countWithdra()
	{
		$sql = "SELECT * FROM $this->withdraw_tb";
		$stmt = query_sql($sql);
		$cont = 0;
		while ($row = mysqli_fetch_assoc($stmt)) {
			$cont++;
		}
		return $cont;
	}

	function countCashOutWallet()
	{
		$sql = "SELECT * FROM $this->withdraw_tb ";
		$stmt = query_sql($sql);
		$cont = 0;
		$amt = 0;
		while ($row = mysqli_fetch_assoc($stmt)) {
			$amt  += $row['amount'];
			$cont++;
		}
		return $amt;
	}

	function countCashOutpaid()
	{
		$sql = "SELECT * FROM $this->withdraw_tb where `status`='paid'";
		$stmt = query_sql($sql);
		$cont = 0;
		$amt = 0;
		while ($row = mysqli_fetch_assoc($stmt)) {
			$amt  += $row['amount'];
			$cont++;
		}
		return $amt;
	}

	function countTicket()
	{
		$sql = "SELECT * FROM $this->tickect_tb where `category`='main' ";
		$stmt = query_sql($sql);
		$cont = 0;
		while ($row = mysqli_fetch_assoc($stmt)) {
			$cont++;
		}
		return $cont;
	}

	public function countUserInvestment($email)
	{
		$sql = "SELECT * FROM $this->deposit_tb  WHERE `email`='" . $email . "' and (`deposit_status`='confirmed' || `deposit_status`='done') ";
		$stmt = query_sql($sql);
		$cont = 0;
		$amt = 0;
		while ($row = mysqli_fetch_assoc($stmt)) {
			$amt += $row['amount'];
			$cont++;
		}
		return $amt;
	}

	public function countUserWithdrawal($email)
	{
		$sql = "SELECT * FROM $this->withdraw_tb  WHERE `email`='" . $email . "' and `status`='paid'";
		$stmt = query_sql($sql);
		$cont = 0;
		$amt = 0;
		while ($row = mysqli_fetch_assoc($stmt)) {
			$amt += $row['amount'];
			$cont++;
		}
		return $amt;
	}

	public function countUserReferrals($email)
	{
		$sql = "SELECT * FROM $this->user_tb  WHERE  `referral_username`='" . $email . "'";
		$stmt = query_sql($sql);
		$cont = 0;
		while ($row = mysqli_fetch_assoc($stmt)) {
			$cont++;
		}
		return $cont;
	}

	public function countUserTransactions($email)
	{
		$sql = "SELECT * FROM $this->deposit_tb  WHERE  `email`='" . $email . "'";
		$stmt = query_sql($sql);
		$cont = 0;
		while ($row = mysqli_fetch_assoc($stmt)) {
			$cont++;
		}
		return $cont;
	}

	public function countUserAvailableWithdrawable($email)
	{
		$sql = "SELECT * FROM $this->deposit_tb  WHERE `email`='" . $email . "' and `deposit_status`='confirmed'";
		$stmt = query_sql($sql);
		$cont = 0;
		$amt = 0;
		while ($row = mysqli_fetch_assoc($stmt)) {
			$amt += $row['intrest_growth'];
			$cont++;
		}
		return self::round_out($amt, 4);
	}

	public function countUserAvailableWithdrawable2($email)
	{
		$sql = "SELECT * FROM $this->referral_tb  WHERE `referral_email`='" . $email . "' and `status`='confirmed'";
		$stmt = query_sql($sql);
		$cont = 0;
		$amt = 0;
		while ($row = mysqli_fetch_assoc($stmt)) {
			$amt += $row['balance'];
			$cont++;
		}
		return self::round_out($amt, 4);
	}

	public function getRow($session, $field)
	{
		$sql = "SELECT * FROM $this->user_tb WHERE `email`='" . $session . "'";
		$stmt = query_sql($sql);
		$row = mysqli_fetch_assoc($stmt);
		return $row[$field];
	}

	public function round_out($value, $places = 0)
	{
		if ($places < 0) {
			$places = 0;
		}
		$mult = pow(10, $places);
		return ($value >= 0 ? ceil($value * $mult) : floor($value * $mult)) / $mult;
	}

	public function getEmail($session)
	{
		$sql = "SELECT `email` FROM $this->user_tb WHERE `hashed_pot`='" . $session . "'";
		$stmt = query_sql($sql);
		$row = mysqli_fetch_assoc($stmt);
		return $row['email'];
	}
}
$sqli = new sqli();
