<!-- 401 Error page -->
<?php
/* Documentation
 * ======================
 * Variables:
 * > $errTitle
 *   Page title.
 * > $errHead
 *   Headings for errors.
 * > $errMsg
 *   Messages for errors.
 * > $errPrevPage
 *   Page accessed before error was thrown.
 *
 * This error page returns a 401 error page with details about the error 
 * encountered.
 */

  http_response_code(401);

  define("MSG_NONE",0);
  define("MSG_AVAILABLE",1);

  if (isset($errHead) && !is_array($errHead))
  {
    $errHead = (array) $errHead; //Make it an array if it's a string.
  }
  if (isset($errMsg) && !is_array($errMsg))
  {
    $errMsg = (array) $errMsg; //Make it an array if it's a string.
  }

  $switchCase = MSG_NONE;
  if (isset($errHead) && isset($errMsg) && count($errHead) == count($errMsg))
  {
    $switchCase = MSG_AVAILABLE;
  }
?>

<head>
  <title>
    <?php
      echo $errTitle;
    ?>
  </title>
  
</head>
<body>
  <h1 class="title" id="title">
    "Identify yourself!"
  </h1>
  <p class="description" id="description">
    In other words, you (yes, <em>you</em>) need to log in before you can do
    what you actually intended to do.
    <?php
      if ($switchCase == MSG_NONE)
      {
    ?>
        We couldn't catch what you were trying to do, though. :V
    <?php
      }
      else if ($switchCase == MSG_AVAILABLE)
      {
    ?>
        Since our server is nice, here's what you need authorization for:
    <?php
      }
    ?>
  </p>
  <?php
    if ($switchCase == MSG_AVAILABLE)
    {
      for ($i = 0; $i < count($errHead); $i++)
      {
  ?>
        <div class="error box" id="error-<?php echo $i; ?>">
          <h2 class="error heading" id="error-<?php echo $i; ?>-heading">
            <?php echo $errHead[$i]; ?>
          </h2>
          <p class="error message" id="error-<?php echo $i; ?>-message">
            <?php echo $errMsg[$i]; ?>
          </p>
        </div>
  <?php
      }
    }
  ?>
  <h6>
    teh geeky stuff
  </h6>
  <p>
    HTTP 401 (Unauthorized)
  </p>
  <p>
    This error page was generated on
    <?php
      echo strftime("%F (a %A) at %r %Z");
    ?>
  </p>
  <p>
    That's all folks!
  </p>
</body>
