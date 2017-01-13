<?php if ( post_password_required() ) : ?>
	<p class="nopassword"><?php esc_html_e( 'This post is password protected. Enter the password to view any comments.','redart'); ?></p>
<?php  return;
	endif;?>
    
    <?php if ( have_comments() ) : ?>
    
        <h3><?php comments_number(esc_html__('No Comments','redart'), esc_html__('Comment ( 1 )','redart'), esc_html__('Comments ( % )','redart') );?></h3>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
                    <div class="navigation">
                        <div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments','redart'  ) ); ?></div>
                        <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments','redart') ); ?></div>
                    </div> <!-- .navigation -->
        <?php endif; // check for comment navigation ?>
        
        <ul class="commentlist">
     		<?php wp_list_comments( array( 'callback' => 'redart_comment_style' ) ); ?>
        </ul>
    
    <?php endif; ?>
    
	<?php if(!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')): ?>
        <p class="nocomments"><?php esc_html_e( 'Comments are closed.','redart'); ?></p>
    <?php endif;?>    
	
    <!-- Comment Form -->
    <?php if ('open' == $post->comment_status) :
			$comment = "<div class='column dt-sc-one-half first'><textarea id='comment' name='comment' cols='5' rows='3' placeholder='".esc_html__("Comment",'redart')."' ></textarea></div>";
			$author = "<div class='column dt-sc-one-half'><p><input id='author' name='author' type='text' placeholder='".esc_html__("Name",'redart')."' required /></p>";
			$email = "<p> <input id='email' name='email' type='text' placeholder='".esc_html__("Email",'redart')."' required /> </p></div>";

				$comments_args = array(
					'title_reply' => esc_html__( 'Give a Reply','redart' ),
					'fields'=>array('author' => $author,'email' =>	$email),
					'comment_field'=> $comment,
					'comment_notes_before'=>'','comment_notes_after'=>'','label_submit'=>esc_html__('Comment','redart'));
            comment_form($comments_args);?>
	<?php endif; ?>