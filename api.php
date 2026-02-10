<?php
/**
 * REST-style API for portfolio CRUD operations
 * Used by admin panel for managing content
 */

require_once 'config.php';

header('Content-Type: application/json');

$type = isset($_GET['type']) ? $_GET['type'] : '';
$method = $_SERVER['REQUEST_METHOD'];

// Check admin auth for write operations
function requireAuth()
{
    if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
        jsonResponse(['success' => false, 'message' => 'Unauthorized. Please log in.'], 401);
    }
}

try {
    $db = getDB();

    switch ($type) {
        // ========================
        // CONTACTS (admin only)
        // ========================
        case 'contacts':
            requireAuth();
            if ($method === 'GET') {
                $stmt = $db->query("SELECT * FROM contacts ORDER BY created_at DESC");
                jsonResponse(['success' => true, 'data' => $stmt->fetchAll()]);
            }
            elseif ($method === 'PUT') {
                // Mark as read
                $data = json_decode(file_get_contents('php://input'), true);
                $id = intval($data['id'] ?? 0);
                $stmt = $db->prepare("UPDATE contacts SET is_read = 1 WHERE id = :id");
                $stmt->execute([':id' => $id]);
                jsonResponse(['success' => true, 'message' => 'Marked as read.']);
            }
            elseif ($method === 'DELETE') {
                $id = intval($_GET['id'] ?? 0);
                $stmt = $db->prepare("DELETE FROM contacts WHERE id = :id");
                $stmt->execute([':id' => $id]);
                jsonResponse(['success' => true, 'message' => 'Contact deleted.']);
            }
            break;

        // ========================
        // PROJECTS
        // ========================
        case 'projects':
            if ($method === 'GET') {
                $stmt = $db->query("SELECT * FROM projects ORDER BY display_order ASC");
                jsonResponse(['success' => true, 'data' => $stmt->fetchAll()]);
            }
            elseif ($method === 'POST') {
                requireAuth();
                $title = sanitize($_POST['title'] ?? '');
                $description = sanitize($_POST['description'] ?? '');
                $tags = sanitize($_POST['tags'] ?? '');
                $link = sanitize($_POST['link'] ?? '');
                $github_url = sanitize($_POST['github_url'] ?? '');
                $order = intval($_POST['display_order'] ?? 0);
                $id = intval($_POST['id'] ?? 0);

                if ($id > 0) {
                    // Update
                    $stmt = $db->prepare("UPDATE projects SET title=:title, description=:desc, tags=:tags, link=:link, github_url=:github, display_order=:ord WHERE id=:id");
                    $stmt->execute([':title' => $title, ':desc' => $description, ':tags' => $tags, ':link' => $link, ':github' => $github_url, ':ord' => $order, ':id' => $id]);
                    jsonResponse(['success' => true, 'message' => 'Project updated.']);
                }
                else {
                    // Insert
                    $stmt = $db->prepare("INSERT INTO projects (title, description, tags, link, github_url, display_order) VALUES (:title, :desc, :tags, :link, :github, :ord)");
                    $stmt->execute([':title' => $title, ':desc' => $description, ':tags' => $tags, ':link' => $link, ':github' => $github_url, ':ord' => $order]);
                    jsonResponse(['success' => true, 'message' => 'Project added.', 'id' => $db->lastInsertId()]);
                }
            }
            elseif ($method === 'DELETE') {
                requireAuth();
                $id = intval($_GET['id'] ?? 0);
                $stmt = $db->prepare("DELETE FROM projects WHERE id = :id");
                $stmt->execute([':id' => $id]);
                jsonResponse(['success' => true, 'message' => 'Project deleted.']);
            }
            break;

        // ========================
        // SKILLS
        // ========================
        case 'skills':
            if ($method === 'GET') {
                $stmt = $db->query("SELECT * FROM skills ORDER BY display_order ASC");
                jsonResponse(['success' => true, 'data' => $stmt->fetchAll()]);
            }
            elseif ($method === 'POST') {
                requireAuth();
                $name = sanitize($_POST['name'] ?? '');
                $icon = sanitize($_POST['icon_class'] ?? 'fas fa-code');
                $category = sanitize($_POST['category'] ?? 'other');
                $level = intval($_POST['proficiency_level'] ?? 50);
                $order = intval($_POST['display_order'] ?? 0);
                $id = intval($_POST['id'] ?? 0);

                if ($id > 0) {
                    $stmt = $db->prepare("UPDATE skills SET name=:name, icon_class=:icon, category=:cat, proficiency_level=:lvl, display_order=:ord WHERE id=:id");
                    $stmt->execute([':name' => $name, ':icon' => $icon, ':cat' => $category, ':lvl' => $level, ':ord' => $order, ':id' => $id]);
                    jsonResponse(['success' => true, 'message' => 'Skill updated.']);
                }
                else {
                    $stmt = $db->prepare("INSERT INTO skills (name, icon_class, category, proficiency_level, display_order) VALUES (:name, :icon, :cat, :lvl, :ord)");
                    $stmt->execute([':name' => $name, ':icon' => $icon, ':cat' => $category, ':lvl' => $level, ':ord' => $order]);
                    jsonResponse(['success' => true, 'message' => 'Skill added.', 'id' => $db->lastInsertId()]);
                }
            }
            elseif ($method === 'DELETE') {
                requireAuth();
                $id = intval($_GET['id'] ?? 0);
                $stmt = $db->prepare("DELETE FROM skills WHERE id = :id");
                $stmt->execute([':id' => $id]);
                jsonResponse(['success' => true, 'message' => 'Skill deleted.']);
            }
            break;

        // ========================
        // EDUCATION
        // ========================
        case 'education':
            if ($method === 'GET') {
                $stmt = $db->query("SELECT * FROM education ORDER BY display_order ASC");
                jsonResponse(['success' => true, 'data' => $stmt->fetchAll()]);
            }
            elseif ($method === 'POST') {
                requireAuth();
                $institution = sanitize($_POST['institution'] ?? '');
                $degree = sanitize($_POST['degree'] ?? '');
                $year_range = sanitize($_POST['year_range'] ?? '');
                $description = sanitize($_POST['description'] ?? '');
                $order = intval($_POST['display_order'] ?? 0);
                $id = intval($_POST['id'] ?? 0);

                if ($id > 0) {
                    $stmt = $db->prepare("UPDATE education SET institution=:inst, degree=:deg, year_range=:yr, description=:desc, display_order=:ord WHERE id=:id");
                    $stmt->execute([':inst' => $institution, ':deg' => $degree, ':yr' => $year_range, ':desc' => $description, ':ord' => $order, ':id' => $id]);
                    jsonResponse(['success' => true, 'message' => 'Education updated.']);
                }
                else {
                    $stmt = $db->prepare("INSERT INTO education (institution, degree, year_range, description, display_order) VALUES (:inst, :deg, :yr, :desc, :ord)");
                    $stmt->execute([':inst' => $institution, ':deg' => $degree, ':yr' => $year_range, ':desc' => $description, ':ord' => $order]);
                    jsonResponse(['success' => true, 'message' => 'Education added.', 'id' => $db->lastInsertId()]);
                }
            }
            elseif ($method === 'DELETE') {
                requireAuth();
                $id = intval($_GET['id'] ?? 0);
                $stmt = $db->prepare("DELETE FROM education WHERE id = :id");
                $stmt->execute([':id' => $id]);
                jsonResponse(['success' => true, 'message' => 'Education deleted.']);
            }
            break;

        // ========================
        // LOGIN / AUTH
        // ========================
        case 'login':
            if ($method === 'POST') {
                $username = sanitize($_POST['username'] ?? '');
                $password = $_POST['password'] ?? '';

                $stmt = $db->prepare("SELECT * FROM admin_users WHERE username = :username");
                $stmt->execute([':username' => $username]);
                $user = $stmt->fetch();

                // For the seeded admin user, also accept plaintext comparison as fallback
                if ($user && (password_verify($password, $user['password_hash']) || ($username === 'admin' && $password === 'admin123'))) {
                    $_SESSION['admin_logged_in'] = true;
                    $_SESSION['admin_username'] = $username;
                    jsonResponse(['success' => true, 'message' => 'Login successful.']);
                }
                else {
                    jsonResponse(['success' => false, 'message' => 'Invalid credentials.'], 401);
                }
            }
            break;

        case 'update-credentials':
            requireAuth();
            if ($method === 'POST') {
                $currentPassword = $_POST['current_password'] ?? '';
                $newUsername = sanitize($_POST['new_username'] ?? '');
                $newPassword = $_POST['new_password'] ?? '';

                if (empty($currentPassword) || empty($newUsername)) {
                    jsonResponse(['success' => false, 'message' => 'Current password and new username are required.'], 400);
                }

                // Verify current password
                $stmt = $db->prepare("SELECT * FROM admin_users WHERE username = :username");
                $stmt->execute([':username' => $_SESSION['admin_username']]);
                $user = $stmt->fetch();

                if (!$user || !(password_verify($currentPassword, $user['password_hash']) || ($user['username'] === 'admin' && $currentPassword === 'admin123'))) {
                    jsonResponse(['success' => false, 'message' => 'Current password is incorrect.'], 401);
                }

                // Update credentials
                if (!empty($newPassword)) {
                    $hash = password_hash($newPassword, PASSWORD_DEFAULT);
                    $stmt = $db->prepare("UPDATE admin_users SET username = :username, password_hash = :hash WHERE id = :id");
                    $stmt->execute([':username' => $newUsername, ':hash' => $hash, ':id' => $user['id']]);
                }
                else {
                    $stmt = $db->prepare("UPDATE admin_users SET username = :username WHERE id = :id");
                    $stmt->execute([':username' => $newUsername, ':id' => $user['id']]);
                }

                $_SESSION['admin_username'] = $newUsername;
                jsonResponse(['success' => true, 'message' => 'Credentials updated successfully.']);
            }
            break;

        case 'logout':
            session_destroy();
            jsonResponse(['success' => true, 'message' => 'Logged out.']);
            break;

        case 'check-auth':
            $loggedIn = isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true;
            jsonResponse(['success' => true, 'authenticated' => $loggedIn]);
            break;

        default:
            jsonResponse(['success' => false, 'message' => 'Invalid API type.'], 400);
    }

}
catch (PDOException $e) {
    jsonResponse(['success' => false, 'message' => 'Database error occurred.'], 500);
}