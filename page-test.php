<?php
/**
 * Template Name: Testing
 * The template for displaying the registration page
 *
 * @package rebalance
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
      <article>
        <div>
          <?php 

            // object(SwpmAuth)#1803 (5) { 
            //   ["protected"]=> object(SwpmProtection)#1802 (12) { 
            //     ["bitmap":protected]=> string(2) "15" 
            //     ["posts":protected]=> array(0) { } 
            //     ["pages":protected]=> array(2) { 
            //       [0]=> int(22) 
            //       [1]=> int(20) } 
            //     ["comments":protected]=> array(0) { } 
            //     ["categories":protected]=> array(0) { } 
            //     ["attachments":protected]=> array(0) { } 
            //     ["custom_posts":protected]=> array(0) { } 
            //     ["details":protected]=> array(18) { 
            //       ["id"]=> string(1) "1" 
            //       ["alias"]=> string(18) "Content Protection" 
            //       ["role"]=> string(13) "administrator" 
            //       ["permissions"]=> string(2) "15" 
            //       ["subscription_period"]=> string(1) "0" 
            //       ["subscription_duration_type"]=> string(1) "0" 
            //       ["subscription_unit"]=> NULL 
            //       ["loginredirect_page"]=> NULL 
            //       ["category_list"]=> string(6) "a:0:{}" 
            //       ["page_list"]=> string(24) "a:2:{i:0;i:22;i:1;i:20;}" 
            //       ["post_list"]=> string(6) "a:0:{}" 
            //       ["comment_list"]=> string(2) "N;" 
            //       ["attachment_list"]=> string(2) "N;" 
            //       ["custom_post_list"]=> string(6) "a:0:{}" 
            //       ["disable_bookmark_list"]=> NULL 
            //       ["options"]=> NULL 
            //       ["protect_older_posts"]=> string(1) "0" 
            //       ["campaign_name"]=> string(0) "" }                  
            //     ["options":protected]=> array(0) { } 
            //     ["msg"]=> string(0) "" 
            //     ["owning_level_id"]=> int(1) 
            //     ["disable_bookmark"]=> array(0) { } } 
            //   ["permitted"]=> object(SwpmPermission)#1805 (11) { 
            //     ["bitmap":protected]=> string(2) "63" 
            //     ["posts":protected]=> array(3) { 
            //       [0]=> int(148) 
            //       [1]=> int(424) 
            //       [2]=> int(425) } 
            //     ["pages":protected]=> array(3) { 
            //       [0]=> int(22) 
            //       [1]=> int(20) 
            //       [2]=> int(435) } 
            //     ["comments":protected]=> array(0) { } 
            //     ["categories":protected]=> array(61) { [0]=> int(5) [1]=> int(53) [2]=> int(24) [3]=> int(10) [4]=> int(62) [5]=> int(6) [6]=> int(30) [7]=> int(73) [8]=> int(9) [9]=> int(29) [10]=> int(71) [11]=> int(55) [12]=> int(57) [13]=> int(58) [14]=> int(72) [15]=> int(8) [16]=> int(22) [17]=> int(54) [18]=> int(59) [19]=> int(69) [20]=> int(7) [21]=> int(32) [22]=> int(52) [23]=> int(61) [24]=> int(63) [25]=> int(64) [26]=> int(68) [27]=> int(1) [28]=> int(27) [29]=> int(37) [30]=> int(46) [31]=> int(50) [32]=> int(65) [33]=> int(66) [34]=> int(70) [35]=> int(19) [36]=> int(20) [37]=> int(28) [38]=> int(31) [39]=> int(33) [40]=> int(34) [41]=> int(35) [42]=> int(36) [43]=> int(39) [44]=> int(40) [45]=> int(41) [46]=> int(42) [47]=> int(45) [48]=> int(49) [49]=> int(51) [50]=> int(56) [51]=> int(67) [52]=> int(23) [53]=> int(26) [54]=> int(38) [55]=> int(43) [56]=> int(44) [57]=> int(47) [58]=> int(48) [59]=> int(60) [60]=> int(25) } 
            //     ["attachments":protected]=> array(0) { } 
            //     ["custom_posts":protected]=> array(3) { [0]=> int(123) [1]=> int(131) [2]=> int(60) } 
            //     ["details":protected]=> array(18) { 
            //       ["id"]=> string(1) "4" 
            //       ["alias"]=> string(27) "Free Test Trial until Sep15" 
            //       ["role"]=> string(10) "subscriber" 
            //       ["permissions"]=> string(2) "63" 
            //       ["subscription_period"]=> string(10) "2020-09-15" 
            //       ["subscription_duration_type"]=> string(1) "5" 
            //       ["subscription_unit"]=> NULL 
            //       ["loginredirect_page"]=> NULL 
            //       ["category_list"]=> string(601) "a:61:{i:0;i:5;i:1;i:53;i:2;i:24;i:3;i:10;i:4;i:62;i:5;i:6;i:6;i:30;i:7;i:73;i:8;i:9;i:9;i:29;i:10;i:71;i:11;i:55;i:12;i:57;i:13;i:58;i:14;i:72;i:15;i:8;i:16;i:22;i:17;i:54;i:18;i:59;i:19;i:69;i:20;i:7;i:21;i:32;i:22;i:52;i:23;i:61;i:24;i:63;i:25;i:64;i:26;i:68;i:27;i:1;i:28;i:27;i:29;i:37;i:30;i:46;i:31;i:50;i:32;i:65;i:33;i:66;i:34;i:70;i:35;i:19;i:36;i:20;i:37;i:28;i:38;i:31;i:39;i:33;i:40;i:34;i:41;i:35;i:42;i:36;i:43;i:39;i:44;i:40;i:45;i:41;i:46;i:42;i:47;i:45;i:48;i:49;i:49;i:51;i:50;i:56;i:51;i:67;i:52;i:23;i:53;i:26;i:54;i:38;i:55;i:43;i:56;i:44;i:57;i:47;i:58;i:48;i:59;i:60;i:60;i:25;}" 
            //       ["page_list"]=> string(34) "a:3:{i:0;i:22;i:1;i:20;i:2;i:435;}" 
            //       ["post_list"]=> string(36) "a:3:{i:0;i:148;i:1;i:424;i:2;i:425;}" 
            //       ["comment_list"]=> string(2) "N;" 
            //       ["attachment_list"]=> string(2) "N;" 
            //       ["custom_post_list"]=> string(35) "a:3:{i:0;i:123;i:1;i:131;i:2;i:60;}" 
            //       ["disable_bookmark_list"]=> NULL 
            //       ["options"]=> NULL 
            //       ["protect_older_posts"]=> string(1) "0" 
            //       ["campaign_name"]=> string(0) "" } 
            //       ["options":protected]=> array(0) { } 
            //       ["owning_level_id"]=> string(1) "4" 
            //       ["disable_bookmark"]=> array(0) { } } 
            //     ["isLoggedIn":"SwpmAuth":private]=> bool(true) 
            //     ["lastStatusMsg":"SwpmAuth":private]=> string(25) "You are logged in as:test" 
            //     ["userData"]=> object(stdClass)#1806 (31) { 
            //       ["member_id"]=> string(2) "16" 
            //       ["user_name"]=> string(4) "test" 
            //       ["first_name"]=> string(5) "Simon" 
            //       ["last_name"]=> string(10) "Flatriorch" 
            //       ["password"]=> string(34) "$P$Bc3R/pSMLQDATvhI3HObQd6p2GWu4o." 
            //       ["member_since"]=> string(10) "2020-06-29" 
            //       ["membership_level"]=> string(1) "4" 
            //       ["more_membership_levels"]=> NULL 
            //       ["account_state"]=> string(7) "expired" 
            //       ["last_accessed"]=> string(19) "2020-09-23 14:11:16" 
            //       ["last_accessed_from_ip"]=> string(12) "192.168.95.1" 
            //       ["email"]=> string(17) "saiminh@gmail.com" 
            //       ["phone"]=> string(0) "" 
            //       ["address_street"]=> string(0) "" 
            //       ["address_city"]=> string(0) "" 
            //       ["address_state"]=> string(0) "" 
            //       ["address_zipcode"]=> string(0) "" 
            //       ["home_page"]=> NULL 
            //       ["country"]=> string(11) "Netherlands" 
            //       ["gender"]=> string(13) "not specified" 
            //       ["referrer"]=> NULL 
            //       ["extra_info"]=> NULL 
            //       ["reg_code"]=> NULL 
            //       ["subscription_starts"]=> string(10) "2020-06-29" 
            //       ["initial_membership_level"]=> NULL 
            //       ["txn_id"]=> string(0) "" 
            //       ["subscr_id"]=> string(0) "" 
            //       ["company_name"]=> string(0) "" 
            //       ["notes"]=> NULL 
            //       ["flags"]=> string(1) "0" 
            //       ["profile_image"]=> string(0) "" } 
            //     }





            
            $member_id = SwpmMemberUtils::get_logged_in_members_id();
            $swpm_user = SwpmMemberUtils::get_user_by_id($member_id);
            //var_dump($swpm_user);
            $subscr_id = SwpmAuth::get_instance()->userData->subscr_id;
            $transaction = SwpmTransactions::get_transaction_row_by_subscr_id($subscr_id);
            var_dump($subscr_id);
            echo $subscr_id;
            var_dump($transaction);
            

            // if ($subscr_id) {
            //   //composer require stripe/stripe-php;
            //   require_once('stripe-php/init.php');
            //   // Set your secret key. Remember to switch to your live secret key in production!
            //   // See your keys here: https://dashboard.stripe.com/account/apikeys
            //   \Stripe\Stripe::setApiKey('TESTSTRIPEAPIKEY');

            //   $stripecall = \Stripe\BillingPortal\Session::create([
            //     'customer' => $subscr_id,
            //     'return_url' => 'http://rebalance.local/membership-profile',
            //   ]);
            //   echo '<a class="button" href="'.$stripecall['url'].'">Stripe</a>';
            // }
          ?>
          
        </div>
      </article>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
