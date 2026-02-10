<?php
/**
 * Contact Form Handler
 * Receives POST data from the contact form and stores in database
 */

require_once 'config.php';

header('Content-Type: application/json');

// Only accept POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    jsonResponse(['success' => false, 'message' => 'Method not allowed.'], 405);
}

// Get and validate inputs
$name = isset($_POST['name']) ? sanitize($_POST['name']) : '';
$email = isset($_POST['email']) ? sanitize($_POST['email']) : '';
$subject = isset($_POST['subject']) ? sanitize($_POST['subject']) : '';
$message = isset($_POST['message']) ? sanitize($_POST['message']) : '';

// Validation
$errors = [];
if (empty($name) || strlen($name) < 2) {
    $errors[] = 'Name is required (min 2 characters).';
}
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'A valid email address is required.';
}
if (empty($subject) || strlen($subject) < 3) {
    $errors[] = 'Subject is required (min 3 characters).';
}
if (empty($message) || strlen($message) < 10) {
    $errors[] = 'Message is required (min 10 characters).';
}

if (!empty($errors)) {
    jsonResponse(['success' => false, 'message' => implode(' ', $errors)], 400);
}

// Insert into database
try {
    $db = getDB();
    $stmt = $db->prepare("INSERT INTO contacts (name, email, subject, message) VALUES (:name, :email, :subject, :message)");
    $stmt->execute([
        ':name' => $name,
        ':email' => $email,
        ':subject' => $subject,
        ':message' => $message,
    ]);

    jsonResponse(['success' => true, 'message' => 'Message sent successfully!']);

}
catch (PDOException $e) {
    jsonResponse(['success' => false, 'message' => 'Failed to save message. Please try again.'], 500);
}