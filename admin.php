<?php
/**
 * Admin Panel — Manage portfolio content
 * Login: admin / admin123 (change after first login)
 */
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel — Harshit Gupta Portfolio</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root {
            --bg: #0a0a0f;
            --bg2: #12121a;
            --bg3: #1a1a28;
            --glass-border: rgba(255, 255, 255, 0.08);
            --text: #e4e4e7;
            --text2: #a1a1aa;
            --text3: #71717a;
            --accent: #6c63ff;
            --accent-light: #8b83ff;
            --cyan: #00d4ff;
            --success: #22c55e;
            --error: #ef4444;
            --warning: #f59e0b;
            --gradient: linear-gradient(135deg, #6c63ff, #00d4ff);
            --radius: 12px;
            --font: 'Inter', sans-serif;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: var(--font);
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
        }

        /* Login Screen */
        .login-screen {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: radial-gradient(circle at 50% 50%, rgba(108, 99, 255, 0.08), transparent 60%);
        }

        .login-box {
            background: var(--bg2);
            border: 1px solid var(--glass-border);
            border-radius: var(--radius);
            padding: 40px;
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .login-box h1 {
            font-size: 1.5rem;
            margin-bottom: 8px;
        }

        .login-box .logo {
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 20px;
        }

        .login-box .logo span {
            color: var(--accent);
        }

        .login-box p {
            color: var(--text2);
            font-size: 0.9rem;
            margin-bottom: 24px;
        }

        .login-box input {
            width: 100%;
            padding: 12px 16px;
            background: var(--bg3);
            border: 1.5px solid var(--glass-border);
            border-radius: 8px;
            color: var(--text);
            font-family: var(--font);
            font-size: 0.95rem;
            margin-bottom: 12px;
            outline: none;
            transition: border 0.3s;
        }

        .login-box input:focus {
            border-color: var(--accent);
        }

        .login-box button {
            width: 100%;
            padding: 12px;
            background: var(--gradient);
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            margin-top: 8px;
            font-family: var(--font);
            transition: opacity 0.2s;
        }

        .login-box button:hover {
            opacity: 0.9;
        }

        .login-error {
            color: var(--error);
            font-size: 0.85rem;
            margin-top: 10px;
            display: none;
        }

        /* Dashboard Layout */
        .dashboard {
            display: none;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px 24px;
            background: var(--bg2);
            border-bottom: 1px solid var(--glass-border);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .topbar-logo {
            font-weight: 800;
            font-size: 1.2rem;
        }

        .topbar-logo span {
            color: var(--accent);
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .topbar-user {
            color: var(--text2);
            font-size: 0.85rem;
        }

        .topbar-user i {
            margin-right: 4px;
            color: var(--accent);
        }

        .btn-logout {
            background: transparent;
            border: 1px solid var(--glass-border);
            color: var(--text2);
            padding: 6px 16px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 0.85rem;
            font-family: var(--font);
            transition: all 0.2s;
        }

        .btn-logout:hover {
            border-color: var(--error);
            color: var(--error);
        }

        .back-link {
            color: var(--accent-light);
            text-decoration: none;
            font-size: 0.85rem;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        /* Tabs */
        .tabs {
            display: flex;
            gap: 4px;
            padding: 16px 24px;
            background: var(--bg2);
            border-bottom: 1px solid var(--glass-border);
            flex-wrap: wrap;
        }

        .tab-btn {
            padding: 10px 20px;
            background: transparent;
            border: none;
            color: var(--text2);
            font-size: 0.9rem;
            cursor: pointer;
            border-radius: 8px;
            font-family: var(--font);
            font-weight: 500;
            transition: all 0.2s;
            position: relative;
        }

        .tab-btn:hover {
            background: rgba(108, 99, 255, 0.06);
            color: var(--text);
        }

        .tab-btn.active {
            background: rgba(108, 99, 255, 0.12);
            color: var(--accent-light);
        }

        .tab-btn .badge {
            position: absolute;
            top: 4px;
            right: 4px;
            background: var(--error);
            color: #fff;
            font-size: 0.65rem;
            padding: 1px 6px;
            border-radius: 10px;
        }

        /* Content Area */
        .content {
            padding: 24px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .tab-panel {
            display: none;
        }

        .tab-panel.active {
            display: block;
        }

        /* Cards / Tables */
        .panel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 12px;
        }

        .panel-header h2 {
            font-size: 1.3rem;
        }

        .btn-add {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 10px 20px;
            background: var(--gradient);
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            font-family: var(--font);
            transition: opacity 0.2s;
        }

        .btn-add:hover {
            opacity: 0.9;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            background: var(--bg2);
            border-radius: var(--radius);
            overflow: hidden;
            border: 1px solid var(--glass-border);
        }

        .data-table th {
            background: var(--bg3);
            color: var(--text2);
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 12px 16px;
            text-align: left;
            font-weight: 600;
        }

        .data-table td {
            padding: 12px 16px;
            border-top: 1px solid var(--glass-border);
            font-size: 0.9rem;
            color: var(--text2);
        }

        .data-table tr:hover td {
            background: rgba(108, 99, 255, 0.03);
        }

        .badge-unread {
            background: rgba(239, 68, 68, 0.15);
            color: var(--error);
            padding: 3px 10px;
            border-radius: 10px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .badge-read {
            background: rgba(34, 197, 94, 0.15);
            color: var(--success);
            padding: 3px 10px;
            border-radius: 10px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .action-btn {
            background: transparent;
            border: 1px solid var(--glass-border);
            color: var(--text2);
            padding: 5px 10px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 0.8rem;
            margin-right: 4px;
            font-family: var(--font);
            transition: all 0.2s;
        }

        .action-btn:hover {
            border-color: var(--accent);
            color: var(--accent);
        }

        .action-btn.danger:hover {
            border-color: var(--error);
            color: var(--error);
        }

        /* Modal */
        .modal-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.7);
            z-index: 200;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .modal-overlay.open {
            display: flex;
        }

        .modal {
            background: var(--bg2);
            border: 1px solid var(--glass-border);
            border-radius: var(--radius);
            padding: 30px;
            width: 100%;
            max-width: 550px;
            max-height: 90vh;
            overflow-y: auto;
        }

        .modal h3 {
            margin-bottom: 20px;
            font-size: 1.2rem;
        }

        .modal .form-row {
            margin-bottom: 14px;
        }

        .modal label {
            display: block;
            font-size: 0.8rem;
            color: var(--text2);
            margin-bottom: 4px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .modal input,
        .modal textarea,
        .modal select {
            width: 100%;
            padding: 10px 14px;
            background: var(--bg3);
            border: 1.5px solid var(--glass-border);
            border-radius: 8px;
            color: var(--text);
            font-family: var(--font);
            font-size: 0.9rem;
            outline: none;
        }

        .modal input:focus,
        .modal textarea:focus,
        .modal select:focus {
            border-color: var(--accent);
        }

        .modal textarea {
            resize: vertical;
            min-height: 80px;
        }

        .modal-actions {
            display: flex;
            gap: 10px;
            margin-top: 20px;
            justify-content: flex-end;
        }

        .btn-save {
            padding: 10px 24px;
            background: var(--gradient);
            color: #fff;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            font-family: var(--font);
        }

        .btn-cancel {
            padding: 10px 24px;
            background: transparent;
            border: 1px solid var(--glass-border);
            color: var(--text2);
            border-radius: 8px;
            cursor: pointer;
            font-family: var(--font);
        }

        /* Message detail */
        .msg-detail {
            background: var(--bg3);
            padding: 16px;
            border-radius: 8px;
            margin-top: 10px;
        }

        .msg-detail strong {
            color: var(--accent-light);
        }

        /* Stats */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 16px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: var(--bg2);
            border: 1px solid var(--glass-border);
            border-radius: var(--radius);
            padding: 20px;
            text-align: center;
        }

        .stat-card .stat-number {
            font-size: 2rem;
            font-weight: 800;
            background: var(--gradient);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .stat-card .stat-label {
            color: var(--text3);
            font-size: 0.85rem;
            margin-top: 4px;
        }

        .empty-state {
            text-align: center;
            padding: 40px;
            color: var(--text3);
        }

        .empty-state i {
            font-size: 2.5rem;
            margin-bottom: 12px;
            display: block;
            color: var(--text3);
        }

        @media (max-width:768px) {
            .data-table {
                font-size: 0.8rem;
                display: block;
                overflow-x: auto;
            }

            .tabs {
                gap: 2px;
            }

            .tab-btn {
                padding: 8px 12px;
                font-size: 0.8rem;
            }

            .modal {
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <!-- Login Screen -->
    <div class="login-screen" id="loginScreen">
        <div class="login-box">
            <div class="logo">&lt;<span>HG</span>/&gt;</div>
            <h1>Admin Panel</h1>
            <p>Login to manage your portfolio content</p>
            <form id="loginForm">
                <input type="text" id="loginUser" placeholder="Username" required autocomplete="username">
                <input type="password" id="loginPass" placeholder="Password" required autocomplete="current-password">
                <button type="submit"><i class="fas fa-sign-in-alt"></i> Login</button>
            </form>
            <p class="login-error" id="loginError"></p>
        </div>
    </div>

    <!-- Dashboard -->
    <div class="dashboard" id="dashboard">
        <div class="topbar">
            <div class="topbar-logo">&lt;<span>HG</span>/&gt; Admin</div>
            <div class="topbar-right">
                <a href="index.html" class="back-link"><i class="fas fa-arrow-left"></i> View Site</a>
                <span class="topbar-user"><i class="fas fa-user-shield"></i> admin</span>
                <button class="btn-logout" id="logoutBtn"><i class="fas fa-sign-out-alt"></i> Logout</button>
            </div>
        </div>
        <div class="tabs">
            <button class="tab-btn active" data-tab="messages"><i class="fas fa-envelope"></i> Messages <span
                    class="badge" id="unreadBadge" style="display:none;">0</span></button>
            <button class="tab-btn" data-tab="projects"><i class="fas fa-folder-open"></i> Projects</button>
            <button class="tab-btn" data-tab="skills"><i class="fas fa-tools"></i> Skills</button>
            <button class="tab-btn" data-tab="education"><i class="fas fa-graduation-cap"></i> Education</button>
            <button class="tab-btn" data-tab="settings"><i class="fas fa-cog"></i> Settings</button>
        </div>
        <div class="content">
            <!-- Stats -->
            <div class="stats-grid" id="statsGrid"></div>

            <!-- Messages Tab -->
            <div class="tab-panel active" id="tab-messages">
                <div class="panel-header">
                    <h2><i class="fas fa-envelope"></i> Contact Messages</h2>
                </div>
                <div id="messagesTable"></div>
            </div>

            <!-- Projects Tab -->
            <div class="tab-panel" id="tab-projects">
                <div class="panel-header">
                    <h2><i class="fas fa-folder-open"></i> Projects</h2>
                    <button class="btn-add" onclick="openModal('project')"><i class="fas fa-plus"></i> Add
                        Project</button>
                </div>
                <div id="projectsTable"></div>
            </div>

            <!-- Skills Tab -->
            <div class="tab-panel" id="tab-skills">
                <div class="panel-header">
                    <h2><i class="fas fa-tools"></i> Skills</h2>
                    <button class="btn-add" onclick="openModal('skill')"><i class="fas fa-plus"></i> Add Skill</button>
                </div>
                <div id="skillsTable"></div>
            </div>

            <!-- Education Tab -->
            <div class="tab-panel" id="tab-education">
                <div class="panel-header">
                    <h2><i class="fas fa-graduation-cap"></i> Education</h2>
                    <button class="btn-add" onclick="openModal('education')"><i class="fas fa-plus"></i> Add
                        Education</button>
                </div>
                <div id="educationTable"></div>
            </div>

            <!-- Settings Tab -->
            <div class="tab-panel" id="tab-settings">
                <div class="panel-header">
                    <h2><i class="fas fa-cog"></i> Account Settings</h2>
                </div>
                <div
                    style="background:var(--bg2); border:1px solid var(--glass-border); border-radius:var(--radius); padding:30px; max-width:500px;">
                    <form id="settingsForm" onsubmit="saveCredentials(event)">
                        <div class="form-row" style="margin-bottom:14px;">
                            <label
                                style="display:block; font-size:0.8rem; color:var(--text2); margin-bottom:4px; text-transform:uppercase; letter-spacing:0.5px;">Current
                                Password <span style="color:var(--error)">*</span></label>
                            <input type="password" name="current_password" required
                                style="width:100%; padding:10px 14px; background:var(--bg3); border:1.5px solid var(--glass-border); border-radius:8px; color:var(--text); font-family:var(--font); font-size:0.9rem; outline:none;">
                        </div>
                        <div class="form-row" style="margin-bottom:14px;">
                            <label
                                style="display:block; font-size:0.8rem; color:var(--text2); margin-bottom:4px; text-transform:uppercase; letter-spacing:0.5px;">New
                                Username <span style="color:var(--error)">*</span></label>
                            <input type="text" name="new_username" id="settingsUsername" required
                                style="width:100%; padding:10px 14px; background:var(--bg3); border:1.5px solid var(--glass-border); border-radius:8px; color:var(--text); font-family:var(--font); font-size:0.9rem; outline:none;">
                        </div>
                        <div class="form-row" style="margin-bottom:14px;">
                            <label
                                style="display:block; font-size:0.8rem; color:var(--text2); margin-bottom:4px; text-transform:uppercase; letter-spacing:0.5px;">New
                                Password <span style="color:var(--text3);">(leave blank to keep current)</span></label>
                            <input type="password" name="new_password"
                                style="width:100%; padding:10px 14px; background:var(--bg3); border:1.5px solid var(--glass-border); border-radius:8px; color:var(--text); font-family:var(--font); font-size:0.9rem; outline:none;">
                        </div>
                        <div id="settingsStatus"
                            style="display:none; padding:10px; border-radius:8px; margin-bottom:14px; font-size:0.9rem;">
                        </div>
                        <button type="submit" class="btn-save" style="width:100%;"><i class="fas fa-save"></i> Save
                            Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Add/Edit -->
    <div class="modal-overlay" id="modalOverlay">
        <div class="modal" id="modalContent"></div>
    </div>

    <script>
        const         = 'api.php';

        // ===            =====
                c function checkAuth() {
            try {
                        t res = await fetch(`${API}?typ                `);
                const                     .json();
                        da            nticate d) {
                             showDashboard();
                }
            } catch (e) { }
        }              document.getElemen            oginForm').addEventListener('submit', async (e) => {
                    eventDefault();
            const username = document.getElem            'loginUser').value;
            const password = docum            lement                ass').value;
            cons                cument.getElementById('loginError')                   try {
                const form                ata();
                form.append('username', username);
                form                sword', password);
                              = await fetch(`${AP                    { method: 'POST',                });
                          data = await res.json();

                if (data.s                                  showDashboard();
                               {
                           rEl.textContent = data.message || 'Login failed.';
                        errEl.style.display = 'bl                                   
            } catch (e) {
                errEl.textContent = 'Server error.            running?';
                errEl.st            lay = 'block';
            }
        });

        document.ge            ById('logoutBtn').addEventListener('click', async () => {
                aw        fetch(`${API}?type=logout`)                  document.getElementById('dashboard').style.display = 'non                    document.getElementById('loginScreen').style.display =            
        })                   function showDashboa         {
            document.getElementById('loginScreen').s            play = 'none';
            document.ge                ('dashboard').style.display = 'block';
            loadAll();
        }

        /                 =====
        document.querySelectorAll('.tab-btn').forEach(btn => {
            bt                stener('click', () => {
                     ocument.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('activ                                     ument.querySelectorAll('.        panel').forEach(p => p.clas            move('active'));
                btn.classList.add('active');
                docume            ementById('tab-        btn        aset.tab).classList.add('active');
            });
        });

        // =         LOAD DATA =====
        async f            loadAl                      await Promise.all([loadMessages(), loadProj                Skills(), loadEducation()]);
                  dateStats();
        }

                       ages = [], allProj            ], allS kills = [], allEducation = [];

        asyn        nct        loadMessages() {
            try                                  es = await fetch(`${API}?type=contacts`);
                       st data = await res.json();
                    allMessages = data.data || [];                     renderMessage                      } catch (e) { allMessages = []; renderMess        ();               }

        async functi            roject                      try {
                const res = await f                ?type=projects`);
                             a = await res.json();
                       Projects = data.            [];
                 renderProjects();
                  ca        (e) { allProjects = []; renderPro             }
                       async function loadSkills() {
            try                       const res = await fetch(`                skills`);
                const                  res.json();
                    allSk ills = data.data || [];
                render        ls(                   } catch (e) {             s = []; renderSkills(); }
        }

        async function loadEduca            
            try {
                const res = await fetch(`${API}?type=education`);
                const data = await res.json();
                allEducation = data.data || [];
                renderEducation();
            } catch (e) { allEducation = []; renderEducation(); }
        }

        function updateStats() {
            const unread = allMessages.filter(m => !parseInt(m.is_read)).length;
            document.getElementById('statsGrid').innerHTML = `
            <div class="stat-card"><div class="stat-number">${allMessages.length}</div><div class="stat            Messages</div></div>
            <div class="stat-card            lass="stat-number">${unread}</div><div class="stat-label">Unread</div></div>
                <div class="stat-card"><div class="sta        mbe        {allProjects.length}</div><di        ass="stat-label">Projects</d            >
            <div class="stat-c                ass="stat-number">${allSkills.length}</div><div class="stat-label">Skills</div></div>
        `;
            const badge = document.                Id('unre            );                 if (unread > 0) { badge.textContent = unread; badge.style.display = 'inline'; }
            else { badge.style.display = 'none'; }
        }

        // =            DER TABLES =====
        fu                rMessages() {
            if (allMes                 === 0) {
                document.getElementById('messagesTable').innerHTML = '<div class="empty-state"><i class="fas fa-inbox"></i>No messages yet.</div>';
                return;
            }
            let html = `<table class="data-table"><thead><tr><th>Status</th><th>Name</th><th>Email</th><th>Subject</th><th>Date</th><th>Actions</th></tr></thead><tbody>`;
            allMessages.forEach(m => {
                const isRead = parseInt(m.is_read);
                html += `<tr>
                <td><span class="${isRead ? 'badge-read' : 'badge-unread'}">${isRead ? 'Read' : 'New'}</span></td>
                <td>${m.name}</td><td>${m.email}</td><td>${m.subject}</td>
                <td>${new Date(m.created_at).toLocaleDateString()}</td>
                                                 <button class="action-b            ick="viewMessage(${m.id})" title="View"><i class="fas fa-ey        /i>        tton>
                    ${            ? `<button class="action-btn" on                ead(${m.id})" title="Mark Read"><i class="fas fa-check"></i></button>` : ''}
                    <button class="action-btn danger" onclick                ('contac            .i            le="Delete"><i class="fas fa-trash"></i></button>
                </td>
            </tr>`;
            });
            html += '            </table>';
            docu                entById('messagesTable').innerHTML = html;
        }

        function renderProjects() {
            if (allProjects.length === 0) {
                document.getElementById('projectsTable').innerHTML = '<div class="e mpty-state"><i class="fas fa-folder-open"></i>No projects yet.</div>';
                return;
            }
            let html = `<table class="data-table"><thead><tr><th>Order</th><th>Title</th><th>Tags</th><th>Actions</t            /the            y>`;
            allProjects            (p => {
                html += `<tr>
                <td>$        isp        order}</td><td>${p.title}<            ${p.tags}</td>
                                             <button class="action-btn" onclick='editProject(${JSON.stringify(p).replace(/'/g, "&#39;")})'><i class="fas fa-edi                ton>
                             button class="action-btn danger" onclick="deleteItem('projects', ${p.id})"><i class="fas fa-trash"></i></button>
                </td>
                       
            });
                        '</tbody></table>';
            document.getElementById('projectsTable').innerHTML = html;
        }

        function renderSkills() {
            if (allSkills.length === 0) {
                document.getElementById('skillsTable').innerHTML = '<div class="empty-state"><i class="f as fa-tools"></i>No skills yet.</div>';
                return;
            }
            let html = `<table class="data-table"><thead><tr><th>Order</th><th>Name</th><th>Category</th><th>Level</th><th>Actions</th></tr></the            y>`;                 allSkills.forEach(s =>                       html += `<tr>
                <td>${s.display_o        }</        td><i class="${s.icon_class}"            s.name}</td><td>${s.category}</td                ficiency_level}%</td>
                <td>
                    <button class="action-btn" onclick='editSkill(${JSON.stringify(s).replace(/'/g, "&#39;")                ="fas fa            /i            n>
                    <button class="action-btn danger" onclick="deleteItem('skills', ${s.id})"><i class="fas fa-trash"></i></button>
                                      </tr>`;
                                html += '</tbody></table>';
            document.getElementById('skillsTable').innerHTML = html;
        }

        function renderEducation() {
            if (allEducation.length === 0) {
                document.getElementById('educatio nTable').innerHTML = '<div class="empty-state"><i class="fas fa-graduation-cap"></i>No education entries yet.</div>';
                return;
            }
            let html = `<table class="data-table"><thead><tr><th>Order            >Deg            <th>Institution</th><th>Year            h>Actions</th></tr></thead><tbody>`;
            allEducatio        rEa         => {
                html +        tr>
                <td>${e            _order}</td><td>${e.degree}</td><td>${e.insti            /td><td>${e.year            /td>
                <td>
                    <button class="action-btn" onclick='editEdu(${JSON.stri        y(e        place(/'/g, "&#39;")})'><i cla            fa-edit"></i></button>
                    <button class="actio n-btn danger" o nclick="deleteItem ('education', ${e.id})">< i  class="            rash"></i></button>
                      td>                 </tr>`;
            });
                 tml += '</tbody></table>';
            document.getElementById('educ            le').innerHTML = html;
        }

        // ===== VIEW MESSAGE ===               function        wMe        e(id) {
            co        m = allMessages.find(x =            = id);
            if (!m) return;
            alert(`From: ${m.na        <${        ail}>\nSubject: ${m.subject}\nDate: ${m.created_at}\n\n${m.message}`);
                       async function markRead(id) {
                   it fe        `${API}?type=contacts`, { method: 'PUT',            : { 'Content-Ty            plication/json' }, body: J                y({ id }) });
            loadMessages().then(updateStats);
        }

        async function deleteItem(type,                       if (!confirm('Are you sure you want to delete this item?')) return;
            await fetch(`${API}?type=${type}&id=${id}`, { method: 'DELETE' });
            loadAll();
        }

        // ===== MODALS =====
        function closeModal() {
            document.getElementById('modalOverlay').classList.remove('open');
        }

        document.getElementById('modalOverlay').addEventListener('click', (e) => {
            if (e.target === e.currentTarget) closeModal();
        });

        function openModal(type, data = null) {
            let html = '';
            if (type === 'project') {
                const d = data || { id: 0, title: '', description: '', tags: '', link: '', github_url: '', display_order: 0 };
                html = `
                <h3>${d.id ? 'Edit' : 'Add'} Project</h3>
                <form id="modalForm" onsubmit="saveProject(event)">
                    <input type="hidden" name="id" value="${d.id}">
                    <div class="form-row"><label>Title</label><input name="title" value="${d.title}" required></div>
                    <div class="form-row"><label>Description</label><textarea name="description" requir            escription}</textarea></div>
                        <div class="form-row"><label>Tags (comma separated)</label><input name="tags" value="${d.tags}"></div>
                                 s="form-row"><label>Live Link</label><input name="link" value="${d.link}"></div>
                    <div class="form-row"><label>GitHub URL</label><input name="github_url" value="${d.github_url}"></div>
                    <div class="form-row"><label>Display Order</label><input type="number" name="display_order" value="${d.display_order}"></div>
                    <div class="modal-actions"><button type="button" class="btn-cancel" onclick="closeModal()">Cancel</button><button type="submit" class="btn-save">Save</button></div>
                </form>`;
            } else if (type === 'skill') {
                const d = d ata  || { id:  0 , name: '' ,  icon_class: 'fas fa-code', category: 'other', proficiency_level: 50, display_order: 0  };
                   html  =  `
                <h3>${d.id ? 'Edit' : 'Add'} Skill</h3>
                <form id="m oda lForm" on s ubmit="sav e Skill(event)">
                    <input type="hidden" name="id" value="${d.id}">
                        < d iv class="form-row"><label>Name</label><input name="name" value="${d.name}" requi red ></div> 
                       <div class="form-row"><label>Icon Class (Font Awesome)</label><input name="icon_class" value="${d.icon_class}"></div>
                    <div class="form-row"><label>Category</label>
                        <select name="category">
                            <option value="language" ${d.category === 'language' ? 'selected' : ''}>Language</option>
                            <option value="frontend" ${d.category === 'frontend' ? 'selected' : ''}>Frontend</option>
                            <option value="backend" ${d.category === 'backend' ? 'selected' : ''}>Backend</option>
                                        value="tools" ${d.category === 'too                ted' : ''}>Tools</option>
                            <option value="other" ${d.category === 'other' ? 'selec                ther</option>
                        </select>
                    </div>
                    <div class="form-row"><label>Proficiency Level (0-100)</label><input type="number" name="proficiency_level" value="${d.proficiency_level}" min="0" max="100"></div>
                    <div class="form-row"><label>Display Order</label><input type="number" name="display_order" value="${d.display_order}"></div>
                    <div class="modal-actions"><button type="button" class="btn-cancel" onclick="closeModal()">Cancel</button><button type="submit" class="btn-save">Save</button></div>
                </form>`;
            } else if (type === 'education') {
                const d = data || { id: 0, institution: '', degree: '', year_range: '', description: '', display_order: 0 };
                html = `
                <h3>${d.id ? 'Edit' : 'Add'} Education</h3>
                <form id="modalForm" onsubmit="saveEducation(event)">
                    <input type="hidden" name="id" value="${d.id}">
                    <div class="form-row"><label>Institution</label><input name="institution" value="${d.institut            qu            iv>
                    <div class="form-row"><label>Degre            e</label><input name="degree" value="${d.degree}" required></di                               <div class="form-row"><label>Year Range</        l><input name="year_range" value="${d.year_range}        quired placeholder="e.g. 2023 — Present"></div>
                        <div class="form-r        <label>Description</label><texta            ="description">${d.d            on}</textarea></div>
                             class="form-row"><label>Display Order</label><input type="number" na            lay_order" value="${d.display_order}"></div>
                            <div class="modal-actio            ton type="button" cl            -cancel" onclick="closeModal()">Cance            n><button type="submit" class="btn-save">Save</button></div>
                    </form>`;
            }
            document        El        tById('modalContent').innerHTML =                       document.g            tById('modalOverlay').classList.add('                    }

        function editProject(p) { openModal('project', p);               function editSkill(s) { openM        ('s        ', s); }             functiontEdopenModal('education', e); }

        // ===== SAVE FUNCTIONS =====
        async function saveProject(e) {
            e.preventDefault();
            const form = new FormData(e.target);
            await fetch(`${API}?type=projects`, { method: 'POST', body: form });
            closeModal(); loadProjects().then(updateStats);
        }
        async function saveSkill(e) {
            e.preventDefault();
            const form = new FormData(e.target);
            await fetch(`${API}?type=skills`, { method: 'POST', body: form });
            closeModal(); loadSkills().then(updateStats);
        }
        async function saveEducation(e) {
            e.preventDefault();
            const form = new FormData(e.target);
            await fetch(`${API}?type=education`, { method: 'POST', body: form });
            closeModal(); loadEducation();
        }

        // ===== SETTINGS =====
        async function saveCredentials(e) {
            e.preventDefault();
            const form = new FormData(e.target);
            const statusEl = document.getElementById('settingsStatus');
            try {
                const res = await fetch(`${API}?type=update-credentials`, { method: 'POST', body: form });
                const data = await res.json();
                statusEl.style.display = 'block';
                if (data.success) {
                    statusEl.style.background = 'rgba(34,197,94,0.1)';
                    statusEl.style.color = 'var(--success)';
                    statusEl.style.border = '1px solid rgba(34,197,94,0.2)';
                    statusEl.textContent = '✅ ' + data.message;
                    e.target.reset();
                    document.querySelector('.topbar-user').innerHTML = `<i class="fas fa-user-shield"></i> ${form.get('new_username')}`;
                } else {
                    statusEl.style.background = 'rgba(239,68,68,0.1)';
                    statusEl.style.color = 'var(--error)';
                    statusEl.style.border = '1px solid rgba(239,68,68,0.2)';
                    statusEl.textContent = '❌ ' + data.message;
                }
            } catch (err) {
                statusEl.style.display = 'block';
                statusEl.style.background = 'rgba(239,68,68,0.1)';
                statusEl.style.color = 'var(--error)';
                statusEl.textContent = '❌ Server error.';
            }
        }

        // Init
        checkAuth();
    </script>
</body>

</html>