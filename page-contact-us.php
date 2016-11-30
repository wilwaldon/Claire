<?php

/**
 * Template Name: Page - Contact
 * The template used for displaying page content in page.php
 *
 * @author William Waldon - http://www.wilwaldon.com
 * @package Claire 1.0
 */

  //response generation function

  $response = "";

  //function to generate response
  function generate_response($type, $message){

    global $response;

    if($type == "success") $response = "<div class='success'>{$message}</div>";
    else $response = "<div class='error'>{$message}</div>";

  }

  //response messages
  $not_human       = "Human verification incorrect.";
  $missing_content = "Please supply all information.";
  $email_invalid   = "Email Address Invalid.";
  $message_unsent  = "Message was not sent. Try Again.";
  $message_sent    = "Thanks! Your message has been sent.";

  //user posted variables
  $name = $_POST['message_name'];
  $email = $_POST['message_email'];
  $message = $_POST['message_text'];
  $human = $_POST['message_human'];

  //php mailer variables
  $to = get_option('admin_email');
  $subject = "Someone sent a message from ".get_bloginfo('name');
  $headers = 'From: '. $email . "\r\n" .
    'Reply-To: ' . $email . "\r\n";

  if(!$human == 0){
    if($human != 2) generate_response("error", $not_human); //not human!
    else {

      //validate email
      if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        generate_response("error", $email_invalid);
      else //email is valid
      {
        //validate presence of name and message
        if(empty($name) || empty($message)){
          generate_response("error", $missing_content);
        }
        else //ready to go!
        {
          $sent = mail($to, $subject, $message, $headers);
          if($sent) generate_response("success", $message_sent); //message sent!
          else generate_response("error", $message_unsent); //message wasn't sent
        }
      }
    }
  }
  else if ($_POST['submitted']) generate_response("error", $missing_content);

?>

<?php get_header(); ?>


<div class="container wrap">
  <div class="row">


    <!-- Main Content Area -->
    <div class="content col-md-9  col-sm-9  col-xs-12 col-xs-push-0">
      <div class="row logo-wrap">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php echo of_get_option( 'blog_name' ); ?></a>
      </div>

      <div class="row">
        <div id="primary" class="content-area">

          <main id="main" class="site-main" role="main">
            <div class="row">
              <div class="col-md-12"><h1 class="entry-title"><?php the_title(); ?></h1></div>
            </div>
             <div class="entry-content">
              <?php the_content(); ?>

              <div id="respond">
                <?php echo $response; ?>
                <form action="<?php the_permalink(); ?>" method="post" class="contact-form">
                  <p><input type="text" name="message_name" value="<?php echo $_POST['message_name']; ?>" placeholder="Your Name"></p>
                  <p><input type="text" name="message_email" value="<?php echo $_POST['message_email']; ?>"  placeholder="Your Email Address"></p>
                  <p><textarea type="text" name="message_text" rows="20" cols="20" placeholder="Write Your Message"><?php echo $_POST['message_text']; ?></textarea></p>
                  <p><label for="message_human">Human Verification: <span>*</span> <br><input type="text" style="width: 60px;" name="message_human"> + 3 = 5</label></p>
                  <input type="hidden" name="submitted" value="1">
                  <p><input type="submit"></p>
                </form>
              </div>


            </div><!-- .entry-content -->


          </main><!-- #main -->
        </div><!-- #primary -->
      </div> <!-- content area row -->
    </div><!-- .col-md-8 -->

    <!-- Left Sidebar -->
    <div class="sidebar col-md-3  col-sm-3  col-xs-12 col-xs-pull-0">
      <?php get_sidebar(); ?>
    </div><!-- .col-md-4 -->

</div><!-- .row -->
</div><!-- .container -->
<?php get_footer(); ?>