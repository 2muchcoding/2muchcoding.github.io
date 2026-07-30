<?php
include('includes/init.inc.php');
include('includes/config.inc.php');
include('includes/functions.inc.php');
?>
<title>PHP &amp; MySQL - ITWS</title>

<?php
include('includes/head.inc.php');
?>

<h1>PHP &amp; MySQL — Movies</h1>

<?php include('includes/menubody.inc.php'); ?>

<?php
$dbOk = false;

@$db = new mysqli(
   $GLOBALS['DB_HOST'],
   $GLOBALS['DB_USERNAME'],
   $GLOBALS['DB_PASSWORD'],
   $GLOBALS['DB_NAME']
);

if ($db->connect_error) {
   echo '<div class="messages">Could not connect: ';
   echo $db->connect_errno . ' - ' . $db->connect_error . '</div>';
} else {
   $dbOk = true;
}

// Process form
$havePost = isset($_POST["save"]);
$errors = '';

if ($havePost) {
   $title = htmlspecialchars(trim($_POST["title"]));
   $year = htmlspecialchars(trim($_POST["year"]));

   $focusId = '';

   if ($title == '') {
      $errors .= '<li>Title may not be blank</li>';
      if ($focusId == '') $focusId = '#title';
   }

   if ($year == '') {
      $errors .= '<li>Year may not be blank</li>';
      if ($focusId == '') $focusId = '#year';
   }

   // Year must be exactly 4 digits
   if (!preg_match('/^[0-9]{4}$/', $year)) {
      $errors .= '<li>Enter a valid 4-digit year</li>';
      if ($focusId == '') $focusId = '#year';
   }

   if ($errors != '') {
      echo '<div class="messages"><h4>Please correct the following errors:</h4><ul>';
      echo $errors;
      echo '</ul></div>';
      echo '<script>$(document).ready(function() {$("' . $focusId . '").focus();});</script>';
   } else if ($dbOk) {
      $titleForDb = trim($_POST["title"]);
      $yearForDb  = trim($_POST["year"]);

      $insQuery = "INSERT INTO movies (`title`, `year`) VALUES(?, ?)";
      $statement = $db->prepare($insQuery);
      $statement->bind_param("ss", $titleForDb, $yearForDb);
      $statement->execute();

      echo '<div class="messages"><h4>Success: ' . $statement->affected_rows . ' movie added.</h4>';
      echo $title . ' (' . $year . ')</div>';

      $statement->close();
   }
}
?>

<h3>Add Movie</h3>
<form id="addForm" name="addForm" action="movies.php" method="post">
   <fieldset>
      <div class="formData">

         <label class="field" for="title">Movie Title:</label>
         <div class="value">
            <input type="text" size="60"
               value="<?php if ($havePost && $errors != '') echo $title; ?>"
               name="title" id="title"/>
         </div>

         <label class="field" for="year">Release Year:</label>
         <div class="value">
            <input type="text" size="4" maxlength="4"
               value="<?php if ($havePost && $errors != '') echo $year; ?>"
               name="year" id="year"/> <em>yyyy</em>
         </div>

         <input type="submit" value="save" id="save" name="save"/>
      </div>
   </fieldset>
</form>

<h3>Movies</h3>
<table id="movieTable">
<?php
if ($dbOk) {

   $query = "SELECT * FROM movies ORDER BY title";
   $result = $db->query($query);
   $numRecords = $result->num_rows;

   echo '<tr><th>Title</th><th>Year</th><th></th></tr>';

   for ($i = 0; $i < $numRecords; $i++) {
      $record = $result->fetch_assoc();

      $rowClass = ($i % 2 == 0) ? '' : ' class="odd"';
      echo "\n" . '<tr' . $rowClass . ' id="movie-' . $record['movieid'] . '"><td>';

      echo htmlspecialchars($record['title']);
      echo '</td><td>';
      echo htmlspecialchars($record['year']);
      echo '</td><td>';
      echo '<img src="resources/delete.png" class="deleteMovie" width="16" height="16" alt="delete movie"/>';
      echo '</td></tr>';
   }

   $result->free();
   $db->close();
}
?>
</table>

<?php include('includes/foot.inc.php'); ?>


