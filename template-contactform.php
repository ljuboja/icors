<?php
/*
Template Name: Contact Form
*/

$emailto = (get_option('unspoken_cf_email')) ? get_option('unspoken_cf_email') : '';
$subject_prefix = (get_option('unspoken_cf_prefix')) ? get_option('unspoken_cf_prefix') : '';
$nameError = false;
$name = '';
$emailError = false;
$email = '';
$subject = '';
$messageError = false;
$message = '';

if(isset($_POST['submitted'])) {
	if (trim($_POST['cf_name']) === '') {
		$nameError = true;
	} else {
		$name = trim($_POST['cf_name']);
	}

	if (trim($_POST['cf_email']) === '' || !eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['cf_email'])))  {
		$emailError = true;
	} else {
		$email = trim($_POST['cf_email']);
	}

	if (trim($_POST['cf_message']) === '') {
		$messageError = true;
	} else {
		if(function_exists('stripslashes')) {
			$message = stripslashes(trim($_POST['cf_message']));
		} else {
			$message = trim($_POST['cf_message']);
		}
	}

    if (trim($_POST['cf_message'])) $subject = trim($_POST['cf_message']);

	if (!$nameError && !$emailError && !$messageError) {
		$subject = $subject_prefix . ' ' . trim($_POST['cf_subject']);
		$body = __("Name: $name \nEmail: $email \n\nMessage: $message", 'unspoken');
		$headers = 'From: ' . $name . ' <' . $emailto . '>' . "\r\n" . 'Reply-To: ' . $email;

		mail($emailto, $subject, $body, $headers);
		$emailSent = true;
        $name = '';
        $email = '';
        $subject = '';
        $message = '';
	}

} ?>

<?php get_header(); ?>

<div id="content">

    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

    <div id="post-<?php the_ID(); ?>" <?php post_class('contactform'); ?>>
        <div class="hentry-meta">
            <h1><?php the_title(); ?></h1>
        </div>
        <div class="hentry-content clear">
            <?php the_content(); ?>
        </div>
        <div id="contactform">
            <?php if ( !$emailto && $user_ID ) { ?>
                <p class="message"><?php _e('Please enter recipient(s) email address on the <a href="/wp-admin/admin.php?page=unspoken-templates-options">options page</a>', 'unspoken'); ?></p>
            <?php } elseif ( $emailto ) { ?>
                <?php if ( isset($emailSent) && $emailSent == true ): ?><p class="message"><?php _e('Vaša poruka je poslata, hvala!', 'unspoken'); ?></p><?php endif; ?>
                <form action="<?php the_permalink(); ?>" method="post" id="commentform" onSubmit="return validate(false);">
                    <table>
                        <col width="23%"/>
                        <col width="48%"/>
                        <col width="29%"/>
                        <tr>
                            <td class="label"><label for="cf_name"><?php _e('Vaše ime', 'unspoken'); ?></label></td>
                            <td>
                                <p><input type="text" name="cf_name" id="cf_name" value="<?php echo htmlentities($name); ?>" tabindex="1" class="input"/></p>
                                <?php if ( $nameError ) $alert = 'style="display: block;"'; else $alert = ''; ?>
                                <p class="alert" <?php echo $alert; ?>><?php _e('Molimo Vas unesite Vaše ime', 'unspoken'); ?></p>
                            </td>
                            <td><span><?php _e('Vaše ime je obavezno', 'unspoken'); ?></span></td>
                        </tr>
                        <tr>
                            <td class="label"><label for="cf_email"><?php _e('Vaš email', 'unspoken'); ?></label></td>
                            <td>
                                <p><input type="text" name="cf_email" id="cf_email" value="<?php echo htmlentities($email); ?>" tabindex="2" class="input"/></p>
                                <?php if ( $emailError ) $alert = 'style="display: block;"'; else $alert = ''; ?>
                                <p class="alert" <?php echo $alert; ?>><?php _e('Molimo Vas unesite Vaš email', 'unspoken'); ?></p>
                            </td>
                            <td><span><?php _e('Vaš email je obavezan', 'unspoken'); ?></span></td>
                        </tr>
                        <tr>
                            <td class="label"><label for="cf_subject"><?php _e('Tema', 'unspoken'); ?></label></td>
                            <td>
                                <p><input type="text" name="cf_subject" id="cf_subject" value="<?php echo htmlentities($subject); ?>" tabindex="3" class="input"/></p>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td  class="label"><label for="cf_message"><?php _e('Poruka', 'unspoken'); ?></label></td>
                            <td colspan="2">
                                <p><textarea name="cf_message" id="cf_message" cols="30" rows="10" tabindex="4"><?php echo htmlentities($message); ?></textarea></p>
                                <?php if ( $messageError ) $alert = 'style="display: block;"'; else $alert = ''; ?>
                                <p class="alert" <?php echo $alert; ?>><?php _e('Molimo Vas unesite Vašu poruku', 'unspoken'); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td  class="label"></td>
                            <td colspan="2" class="submit"><input id="submit" type="submit" name="submit" value="<?php _e('Pošalji', 'unspoken'); ?>" tabindex="5"/></td>
                            <input type="hidden" name="submitted" id="submitted" value="true" />
                        </tr>
                    </table>

                <?php } ?>

            </form>
        </div><!-- #contactform -->
    </div><!-- .contactform -->

    <?php endwhile; // end of the loop. ?>
<h6>JP Informativni Centar Odžaci | Redakcija 025 5742 743 | Režija 025 5742 742 | Marketing 025 5742 133</h6>
</div> <!-- #content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
