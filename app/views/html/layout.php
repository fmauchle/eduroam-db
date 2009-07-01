<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Eduroam DB / <?php echo $title ?></title>
    <?php load_css('reset') ?>
    <?php load_css('style') ?>
  </head>
  <body>
    <div id="content">
          <div id="header">
                <h1>Eduroam DB</h1>
          </div>
          <div class="message">
            <?php global $message; echo $message ?>
          </div>
          <div id="main">
          <?php include $runtime['view'] ?>
          </div>
            <div id="footer">
            <p>
            <?php echo "&copy;".date('Y')." <a href=\"http://eduroam.ro\">Eduroam România</a>"; ?>
            </p>
          </div>
    </div>
  </body>
</html>