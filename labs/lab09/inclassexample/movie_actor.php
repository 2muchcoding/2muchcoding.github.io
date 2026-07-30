<?php
include('includes/init.inc.php');
include('includes/config.inc.php');
include('includes/functions.inc.php');
?>
<title>PHP &amp; MySQL - ITWS</title>

<?php
include('includes/head.inc.php');
?>

<h1>PHP &amp; MySQL — Movies and Actors</h1>

<?php include('includes/menubody.inc.php'); ?>

<h3>Movies and Their Actors</h3>

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

if ($dbOk) {
   // Get all movies
   $moviesQuery = "SELECT * FROM movies ORDER BY year, title";
   $moviesResult = $db->query($moviesQuery);
   
   if ($moviesResult && $moviesResult->num_rows > 0) {
      
      while ($movie = $moviesResult->fetch_assoc()) {
         echo '<h4>' . htmlspecialchars($movie['title']) . ' (' . $movie['year'] . ')</h4>';
         
         // Query to get actors for this specific movie
         $actorsQuery = "SELECT a.first_names, a.last_name, a.dob
                        FROM actors a
                        INNER JOIN movie_actor ma ON a.actorid = ma.actorid
                        WHERE ma.movieid = ?
                        ORDER BY a.last_name, a.first_names";
         
         $stmt = $db->prepare($actorsQuery);
         $stmt->bind_param("i", $movie['movieid']);
         $stmt->execute();
         $actorsResult = $stmt->get_result();
         
         if ($actorsResult->num_rows > 0) {
            echo '<ul>';
            while ($actor = $actorsResult->fetch_assoc()) {
               echo '<li>' . htmlspecialchars($actor['first_names']) . ' ';
               echo htmlspecialchars($actor['last_name']);
               if ($actor['dob']) {
                  echo ' (born ' . htmlspecialchars($actor['dob']) . ')';
               }
               echo '</li>';
            }
            echo '</ul>';
         } else {
            echo '<p><em>No actors assigned to this movie yet.</em></p>';
         }
         
         $stmt->close();
      }
      
      $moviesResult->free();
   } else {
      echo '<p>No movies found in database.</p>';
   }
   
   $db->close();
}
?>

<?php include('includes/foot.inc.php'); ?>