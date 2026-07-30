<?php
require 'includes/config.inc.php';

// Create database connection
$dbOk = false;

@$db = new mysqli(
   $GLOBALS['DB_HOST'],
   $GLOBALS['DB_USERNAME'],
   $GLOBALS['DB_PASSWORD'],
   $GLOBALS['DB_NAME']
);

if ($db->connect_error) {
   echo '<p>Could not connect to database.</p>';
   $dbOk = false;
} else {
   $dbOk = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor Comments</title>
    <link rel="stylesheet" href="resources/style.css">
    <script src="resources/comments.js" defer></script>
</head>
<body>

<div id="bodyBlock">
    <h1>Visitor Comments</h1>

    <!-- Display existing approved comments -->
    <?php
    if ($dbOk) {
        $query = "SELECT visitor_name, comment_text, feature_suggestion, created_at 
                  FROM siteComments 
                  WHERE status = 'approved' 
                  ORDER BY created_at DESC";
        $result = $db->query($query);

        if ($result && $result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="comment">';
                echo '<div class="comment-header">' . htmlspecialchars($row["visitor_name"]) . ' - ';
                echo '<span class="comment-date">' . date('M d, Y g:i A', strtotime($row["created_at"])) . '</span></div>';
                echo '<p>' . htmlspecialchars($row["comment_text"]) . '</p>';
                
                if (!empty($row["feature_suggestion"])) {
                    echo '<p class="feature-suggestion"><em>Feature: ' . htmlspecialchars($row["feature_suggestion"]) . '</em></p>';
                }
                echo '</div>';
            }
            $result->free();
        } else {
            echo '<div class="no-comments">No comments yet. Be the first to comment!</div>';
        }
    } else {
        echo '<div class="no-comments">Unable to load comments at this time.</div>';
    }
    ?>

    <h2>Leave a Comment</h2>

    <form id="commentForm" action="submit_comment.php" method="POST">
        <label>Name *</label>
        <input type="text" name="visitor_name" id="visitor_name" required>

        <label>Email *</label>
        <input type="email" name="email" id="email" required>

        <label>Comment *</label>
        <textarea name="comment_text" id="comment_text" rows="4" required></textarea>

        <label>Feature Suggestion (optional)</label>
        <textarea name="feature_suggestion" id="feature_suggestion" rows="3" placeholder="Suggest a new feature for this site"></textarea>

        <input type="submit" value="Submit Comment">
    </form>

    <p style="margin-top: 2em;"><a href="../index.html">← Back to Home</a></p>
</div>

</body>
</html>

<?php 
if ($dbOk) {
    $db->close();
}
include("includes/footer.php"); 
?>