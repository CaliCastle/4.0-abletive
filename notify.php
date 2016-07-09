<?php
//定义界面顶部区域内容,请注意修改您的主题目录
$email_bg =get_bloginfo('url') .'/wp-content/themes/zanblogtheme/images/email.jpg';
define ('emailbg', $email_bg );
$email_headertop = '
<div class="emailpaged" style="background-image: url('.emailbg.');-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;background-position: center center;background-repeat: no-repeat;">
<div class="emailcontent" style="width:100%;max-width:720px;text-align: left;margin: 0 auto;padding-top: 80px;padding-bottom: 20px">
<div class="emailtitle">
<h1 style="color:#fff;background: #51a0e3;line-height:70px;font-size:24px;font-weight:normal;padding-left:40px;margin:0">
';
define ('emailheadertop', $email_headertop );
$email_headerbot = '
</h1>
<div class="emailtext" style="background:#fff;padding:20px 32px 40px;">
';
define ('emailheaderbot', $email_headerbot );
//定义界面底部区域内容，请注意修改下面广告图片地址
$email_footer = '
<p style="color: #6e6e6e;font-size:13px;line-height:24px;">(此邮件由系统自动发出, 请勿回复。)</p>
</div>
<div class="emailad" style="margin-top: 24px;">
<a href="' . get_bloginfo('url') . '">
<img src="http://abletive.com/wp-content/uploads/2014/12/adv.png" alt="" style="margin: auto;width:100%;max-width:700px;height: auto;">
</a>
</div>
<p style="color: #6e6e6e;font-size:13px;line-height:24px;text-align:right;padding:0 32px">邮件来自：<a href="' . get_bloginfo('url') . '" style="color:#51a0e3;text-decoration:none">' . get_option("blogname") . '</a></p>
</div>
</div>
</div>
';
define ('emailfooter', $email_footer );
//修改网站默认发信人以及邮箱
function new_from_name($email){
$wp_from_name = get_option('blogname');
return $wp_from_name;
}
function new_from_email($email) {
$wp_from_email = get_option('admin_email');
return $wp_from_email;
}
add_filter('wp_mail_from_name', 'new_from_name');
add_filter('wp_mail_from', 'new_from_email');
//评论通过通知评论者
add_action('comment_unapproved_to_approved', 'iwill_comment_approved');
function iwill_comment_approved($comment) {
if(is_email($comment->comment_author_email)) {
$post_link = get_permalink($comment->comment_post_ID);
// 邮件标题，可自行更改
$title = '您在 [' . get_option('blogname') . '] 的评论已通过审核';
// 邮件内容，按需更改。如果不懂改，可以给我留言
$body = emailheadertop.'留言审核通过通知'.emailheaderbot.'<p style="color: #6e6e6e;font-size:13px;line-height:24px;">您在' . get_option('blogname') . '《<a href="'.$post_link.'">'.get_the_title($comment->comment_post_ID).'</a>》发表的评论：</p>
<p style="color: #6e6e6e;font-size:13px;line-height:24px;padding:10px 20px;background:#f8f8f8;margin:0px">'.$comment->comment_content.'</p>
<p style="color: #6e6e6e;font-size:13px;line-height:24px;">已通过管理员审核并显示。<br />
您可在此查看您的评论：<a href="'.get_comment_link( $comment->comment_ID ).'">前往查看</a></p>'.emailfooter;
@wp_mail($comment->comment_author_email, $title, $body, "Content-Type: text/html; charset=UTF-8");
}
}
/* 邮件评论回复美化版 */
function comment_mail_notify($comment_id) {
$admin_email = get_bloginfo ('admin_email');
$comment = get_comment($comment_id);
$comment_author_email = trim($comment->comment_author_email);
$parent_id = $comment->comment_parent ? $comment->comment_parent : '';
$to = $parent_id ? trim(get_comment($parent_id)->comment_author_email) : '';
$spam_confirmed = $comment->comment_approved;
if (($parent_id != '') && ($spam_confirmed != 'spam') && ($to != $admin_email)) {
$wp_email = 'no-reply@' . preg_replace('#^www\.#', '', strtolower($_SERVER['SERVER_NAME']));
$subject = '您在 [' . get_option("blogname") . '] 的留言有了新回复';
$message = emailheadertop.'您在' . get_option("blogname") . '上的留言有回复啦！'.emailheaderbot.'
<p style="color: #6e6e6e;font-size:13px;line-height:24px;">' . trim(get_comment($parent_id)->comment_author) . ', 您好!</p>
<p style="color: #6e6e6e;font-size:13px;line-height:24px;">您在《' . get_the_title($comment->comment_post_ID) . '》的留言:<br />
<p style="color: #6e6e6e;font-size:13px;line-height:24px;padding:10px 20px;background:#f8f8f8;margin:0px">'. trim(get_comment($parent_id)->comment_content) . '</p>
<p style="color: #6e6e6e;font-size:13px;line-height:24px;">' . trim($comment->comment_author) . ' 给你的回复:<br />
<p style="color: #6e6e6e;font-size:13px;line-height:24px;padding:10px 20px;background:#f8f8f8;margin:0px">'. trim($comment->comment_content) . '</p>
<p style="color: #6e6e6e;font-size:13px;line-height:24px;">你可以点击<a href="' . htmlspecialchars(get_comment_link($parent_id, array('type' => 'comment'))) . '">查看完整内容</a></p>
<p style="color: #6e6e6e;font-size:13px;line-height:24px;">欢迎再度光临<a href="' . get_option('home') . '">' . get_option('blogname') . '</a></p>
'.emailfooter;
$from = "From: \"" . get_option('blogname') . "\" <$wp_email>";
$headers = "$from\nContent-Type: text/html; charset=" . get_option('blog_charset') . "\n";
wp_mail( $to, $subject, $message, $headers );
}
}
add_action('comment_post', 'comment_mail_notify');
//用户更新账户通知用户
function user_profile_update( $user_id ) {
$site_url = get_bloginfo('wpurl');
$site_name = get_bloginfo('wpname');
$user_info = get_userdata( $user_id );
$to = $user_info->user_email;
$subject = "".$site_name."账户更新";
$message = emailheadertop.'您在' .$site_name. '账户资料修改成功！'.emailheaderbot.'<p style="color: #6e6e6e;font-size:13px;line-height:24px;">亲爱的 ' .$user_info->display_name . '<br/>您的资料修改成功!<br/>谢谢您的光临</p>'.emailfooter;
wp_mail( $to, $subject, $message, "Content-Type: text/html; charset=UTF-8");
}
add_action( 'profile_update', 'user_profile_update', 10, 2);
//用户账户被删除通知用户
function iwilling_delete_user( $user_id ) {
global $wpdb;
$site_name = get_bloginfo('name');
$user_obj = get_userdata( $user_id );
$email = $user_obj->user_email;
$subject = "帐号删除提示：".$site_name."";
$message = emailheadertop.'您在' .$site_name. '的账户已被管理员删除！'.emailheaderbot.'<p style="color: #6e6e6e;font-size:13px;line-height:24px;">如果您对本次操作有什么异议，请联系管理员反馈！<br/>我们会在第一时间处理您反馈的问题.</p>'.emailfooter;
wp_mail( $email, $subject, $message, "Content-Type: text/html; charset=UTF-8");
}
add_action( 'delete_user', 'iwilling_delete_user' );
add_action('publish_post', 'newPostNotify');
?>