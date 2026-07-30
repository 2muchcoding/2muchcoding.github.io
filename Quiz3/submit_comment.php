<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

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
    die('<p>Connection failed: ' . $db->connect_errno . ' - ' . $db->connect_error . '</p>');
} else {
    $dbOk = true;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Sanitize input for display
    $name = htmlspecialchars(trim($_POST["visitor_name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $comment = htmlspecialchars(trim($_POST["comment_text"]));
    $featureSuggestion = isset($_POST["feature_suggestion"]) ? htmlspecialchars(trim($_POST["feature_suggestion"])) : '';

    $errors = '';
    
    // Server-side validation
    if (empty($name)) {
        $errors .= '<li>Name is required.</li>';
    } else if (strlen($name) < 2) {
        $errors .= '<li>Name must be at least 2 characters.</li>';
    }

    if (empty($email)) {
        $errors .= '<li>Email is required.</li>';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors .= '<li>Invalid email format.</li>';
    }

    if (empty($comment)) {
        $errors .= '<li>Comment is required.</li>';
    } else if (strlen($comment) < 5) {
        $errors .= '<li>Comment must be at least 5 characters.</li>';
    }

    if ($errors != '') {
        echo '<div class="messages error"><h4>Please correct the following errors:</h4><ul>';
        echo $errors;
        echo '</ul></div>';
        echo '<p><a href="index.php">← Go Back</a></p>';
    } else if ($dbOk) {
        // Prepare data for database (use raw POST data, not htmlspecialchars version)
        $nameForDb = trim($_POST["visitor_name"]);
        $emailForDb = trim($_POST["email"]);
        $commentForDb = trim($_POST["comment_text"]);
        $featureForDb = isset($_POST["feature_suggestion"]) ? trim($_POST["feature_suggestion"]) : null;

        // Insert with prepared statement - AUTO APPROVE for now (status = 'approved')
        // In the future, you could add an admin panel to moderate comments
        $sql = "INSERT INTO siteComments (visitor_name, email, comment_text, feature_suggestion, status) 
                VALUES (?, ?, ?, ?, 'approved')";
        
        $statement = $db->prepare($sql);
        
        if ($statement === false) {
            die("<p>Error preparing statement: " . $db->error . "</p>");
        }

        // Bind 4 parameters (ssss = 4 strings)
        $statement->bind_param("ssss", $nameForDb, $emailForDb, $commentForDb, $featureForDb);
        
        if ($statement->execute()) {
            echo '<div class="messages success">';
            echo '<h4>Success! Your comment has been posted.</h4>';
            echo '<p>Thank you, <strong>' . $name . '</strong>, for sharing your thoughts!</p>';
            if (!empty($featureSuggestion)) {
                echo '<p>We appreciate your feature suggestion.</p>';
            }
            echo '</div>';
            echo '<p><a href="index.php">← View All Comments</a> | <a href="../index.html">Back to Home</a></p>';
        } else {
            echo '<div class="messages error">';
            echo '<p>Error submitting comment: ' . $statement->error . '</p>';
            echo '</div>';
            echo '<p><a href="index.php">← Go Back</a></p>';
        }

        $statement->close();
    }
    
    if ($dbOk) {
        $db->close();
    }
} else {
    echo '<div class="messages error"><p>Invalid request method.</p></div>';
    echo '<p><a href="index.php">← Go Back</a></p>';
}
?>