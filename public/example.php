<html>
<head>
  <title>
    Example Page
  </title>
</head>
<body>

  <?php
  echo 'This is an example page.</br>';
  echo 'Notice the lack of php tag.</br>';

  $test = 'This is some test text';
  echo $test.'</br>';

  echo str_replace(' t', ' n', $test).'</br>';

  // this comment is fine
  $comment = 'this one too';// see!

  /*
   *
   * Multiline comments are okay, too!

   Seeeeeeeee
   */
  ?>

  Inline tags like <?php echo 'this one';?> work too!
</body>
</html>
