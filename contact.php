<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Check if request method is POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

// Sanitize and validate input
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Get form data
$name = isset($_POST['name']) ? sanitizeInput($_POST['name']) : '';
$email = isset($_POST['email']) ? sanitizeInput($_POST['email']) : '';
$subject = isset($_POST['subject']) ? sanitizeInput($_POST['subject']) : '';
$message = isset($_POST['message']) ? sanitizeInput($_POST['message']) : '';

// Validation
$errors = [];

if (empty($name)) {
    $errors[] = 'Name is required';
}

if (empty($email)) {
    $errors[] = 'Email is required';
} elseif (!validateEmail($email)) {
    $errors[] = 'Invalid email format';
}

if (empty($subject)) {
    $errors[] = 'Subject is required';
}

if (empty($message)) {
    $errors[] = 'Message is required';
}

// Check for spam (simple honeypot and rate limiting)
if (isset($_POST['website']) && !empty($_POST['website'])) {
    // Honeypot field filled - likely spam
    echo json_encode(['success' => false, 'message' => 'Spam detected']);
    exit;
}

if (!empty($errors)) {
    echo json_encode(['success' => false, 'message' => implode(', ', $errors)]);
    exit;
}

// Email configuration
$to = 'ismail12345khalile@email.com'; 
$email_subject = 'Portfolio Contact: ' . $subject;

// Email headers
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: ' . $email . "\r\n";
$headers .= 'Reply-To: ' . $email . "\r\n";
$headers .= 'X-Mailer: PHP/' . phpversion();

// Email body with modern styling
$email_body = "
<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <title>New Contact Form Submission</title>
    <style>
        body {
            font-family: 'Inter', Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background: #f8f9fa;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .content {
            padding: 30px;
        }
        .field {
            margin-bottom: 20px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 8px;
            border-left: 4px solid #667eea;
        }
        .field strong {
            color: #667eea;
            display: block;
            margin-bottom: 5px;
        }
        .message-content {
            background: white;
            padding: 20px;
            border-radius: 8px;
            border: 1px solid #e9ecef;
            margin-top: 10px;
        }
        .footer {
            background: #f8f9fa;
            padding: 20px;
            text-align: center;
            color: #6c757d;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class='container'>
        <div class='header'>
            <h1>New Contact Form Submission</h1>
            <p>You have received a new message from your portfolio website</p>
        </div>
        <div class='content'>
            <div class='field'>
                <strong>Name:</strong>
                {$name}
            </div>
            <div class='field'>
                <strong>Email:</strong>
                {$email}
            </div>
            <div class='field'>
                <strong>Subject:</strong>
                {$subject}
            </div>
            <div class='field'>
                <strong>Message:</strong>
                <div class='message-content'>
                    " . nl2br($message) . "
                </div>
            </div>
        </div>
        <div class='footer'>
            <p>This message was sent from your portfolio contact form on " . date('F j, Y \a\t g:i A') . "</p>
        </div>
    </div>
</body>
</html>
";

// Send email
$mail_sent = mail($to, $email_subject, $email_body, $headers);

if ($mail_sent) {
    // Log successful submission
    logSubmission($name, $email, $subject, true);
    
    echo json_encode([
        'success' => true, 
        'message' => 'Thank you for your message! I\'ll get back to you soon.'
    ]);
} else {
    // Log failed submission
    logSubmission($name, $email, $subject, false);
    
    echo json_encode([
        'success' => false, 
        'message' => 'Sorry, there was an error sending your message. Please try again or contact me directly.'
    ]);
}

// Function to log submissions
function logSubmission($name, $email, $subject, $success) {
    $log_entry = date('Y-m-d H:i:s') . " - " . 
                ($success ? "SUCCESS" : "FAILED") . " - " .
                "Name: {$name}, Email: {$email}, Subject: {$subject}" . PHP_EOL;
    
    file_put_contents('contact_log.txt', $log_entry, FILE_APPEND | LOCK_EX);
}

// Optional: Save contact form submissions to database
function saveToDatabase($name, $email, $subject, $message) {
    // Database configuration
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "portfolio";
    
    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $stmt = $pdo->prepare("
            INSERT INTO contact 
            (name, email, subject, message, ip_address, user_agent, created_at) 
            VALUES (?, ?, ?, ?, ?, ?, NOW())
        ");
        
        $stmt->execute([
            $name, 
            $email, 
            $subject, 
            $message,
            $_SERVER['REMOTE_ADDR'] ?? 'Unknown',
            $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown'
        ]);
        
    } catch(PDOException $e) {
        // Log error (don't expose to user)
        error_log("Database error: " . $e->getMessage());
    }
}

?>