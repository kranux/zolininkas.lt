<?php


// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments">Šis įrašas apsaugotas. Norėdami pamatyti komentarus, įveskite slaptažodį.</p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>
	<h3 id="comments"><?php comments_number('Komentarų nėra', 'Vienas komentaras', 'Komentarai: %' );?></h3>

	<ol class="commentlist">
	<?php wp_list_comments(array('avatar_size'=>40, 'reply_text'=>'Reply')); ?>
	</ol>
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->

	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>

<div id="respond">

<h3><?php comment_form_title( 'Komentaro forma', 'Atsakyti %s' ); ?></h3>

<div class="cancel-comment-reply">
	<small><?php cancel_comment_reply_link(); ?></small>
</div>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">prisijunkite</a> noredami komentuoti</p>
</div>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p>Prisijunges <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Atsijungti &raquo;</a></p>


<?php else : ?>
<div class="clearfix">
	<p class="form-element">
	<label for="author">Vardas*</label>
	<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> class="text"/>
	</p>
	
	<p class="form-element">
	<label for="email">E. paštas* (neskelbiamas)</label>
	<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?>  class="text"/>
	</p>
	
	<p class="form-element">
	<label for="url">Svetainė</label>
	<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" class="text"/>
	</p>
</div>
<?php endif; ?>

<p>
	<label for="comment">Komentaras*</label>
	<textarea name="comment" id="comment" cols="100%" rows="4" tabindex="4"></textarea>
</p>

<p><input name="submit" type="submit" id="submit" class="submit" tabindex="5" value="Skelbti komentarą" />
<?php comment_id_fields(); ?>
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>
</div>

<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>
