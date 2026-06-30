<?php
session_start();
require_once 'config/database.php';
require_once 'includes/auth.php';

require_employer();

$company_id = $_SESSION['company_id'];

// Every query below is filtered by company_id = the logged-in
// employer's own company. There is no path in this file that
// lets one employer see another company's listings or applicants.

$stmt = $conn->prepare("SELECT is_verified FROM companies WHERE id = :cid");
$stmt->execute(['cid' => $company_id]);
$is_verified = (int) $stmt->fetch()['is_verified'];

$stmt = $conn->prepare("SELECT COUNT(*) AS c FROM internships WHERE company_id = :cid AND status = 'active'");
$stmt->execute(['cid' => $company_id]);
$active_listings = $stmt->fetch()['c'];

$stmt = $conn->prepare(
    "SELECT COUNT(*) AS c FROM applications a
     JOIN internships i ON i.id = a.internship_id
     WHERE i.company_id = :cid"
);
$stmt->execute(['cid' => $company_id]);
$total_applicants = $stmt->fetch()['c'];

$stmt = $conn->prepare(
    "SELECT COUNT(*) AS c FROM applications a
     JOIN internships i ON i.id = a.internship_id
     WHERE i.company_id = :cid AND a.status = 'shortlisted'"
);
$stmt->execute(['cid' => $company_id]);
$shortlisted = $stmt->fetch()['c'];

$stmt = $conn->prepare(
    "SELECT COUNT(*) AS c FROM applications a
     JOIN internships i ON i.id = a.internship_id
     WHERE i.company_id = :cid AND a.status = 'offered'"
);
$stmt->execute(['cid' => $company_id]);
$offered = $stmt->fetch()['c'];

$stmt = $conn->prepare(
    "SELECT i.id, i.title, i.status, i.created_at,
            (SELECT COUNT(*) FROM applications WHERE internship_id = i.id) AS applicant_count
     FROM internships i
     WHERE i.company_id = :cid
     ORDER BY i.created_at DESC"
);
$stmt->execute(['cid' => $company_id]);
$listings = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Employer Dashboard - GeoLink</title>
<link rel="stylesheet" href="assets/employer.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

<div class="dash-shell">
    <aside class="dash-sidebar">
        <div class="s-logo">Geo<span>Link</span></div>
        <ul>
            <li><a class="active" href="employer_dashboard.php"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="post_internship.php"><i class="fas fa-plus"></i> Post Internship</a></li>
            <li><a href="employer_listings.php"><i class="fas fa-list"></i> My Listings</a></li>
            <li><a href="screening.php"><i class="fas fa-magnifying-glass"></i> Screening</a></li>
            <li><a href="employer_profile.php"><i class="fas fa-building"></i> Company Profile</a></li>
            <li><a href="logout.php"><i class="fas fa-right-from-bracket"></i> Log Out</a></li>
        </ul>
        <div class="s-user">
            <div class="s-user-name"><?php echo htmlspecialchars($_SESSION['company_name']); ?></div>
            <div class="s-user-role"><?php echo $is_verified ? 'Verified Employer ✓' : 'Pending Verification'; ?></div>
        </div>
    </aside>

    <main class="dash-main">
        <div class="dash-header">
            <h1>Employer Dashboard</h1>
            <?php if ($is_verified): ?>
                <a href="post_internship.php" class="btn-sm btn-sm-green"><i class="fas fa-plus"></i> Post Internship</a>
            <?php endif; ?>
        </div>

        <div class="dash-body">

            <?php if (!$is_verified): ?>
                <div class="alert alert-warn">
                    <i class="fas fa-triangle-exclamation"></i>
                    Your company is not yet verified. You can browse your dashboard, but you <strong>cannot post internships</strong> until a GeoLink administrator approves your company. This usually takes 1-2 business days.
                </div>
            <?php elseif (isset($_GET['error']) && $_GET['error'] === 'unverified'): ?>
                <div class="alert alert-warn">
                    <i class="fas fa-triangle-exclamation"></i>
                    That action requires a verified company account.
                </div>
            <?php else: ?>
                <div class="alert alert-success">
                    <i class="fas fa-circle-check"></i>
                    Your account is verified. You can post internships and screen applicants.
                </div>
            <?php endif; ?>

            <div class="metric-row">
                <div class="metric"><div class="m-lbl">Active Listings</div><div class="m-val"><?php echo $active_listings; ?></div></div>
                <div class="metric"><div class="m-lbl">Total Applicants</div><div class="m-val"><?php echo $total_applicants; ?></div></div>
                <div class="metric"><div class="m-lbl">Shortlisted</div><div class="m-val"><?php echo $shortlisted; ?></div></div>
                <div class="metric"><div class="m-lbl">Offers Sent</div><div class="m-val"><?php echo $offered; ?></div></div>
            </div>

            <div class="table-card">
                <div class="table-head">
                    <h3>Your Internship Listings</h3>
                    <?php if ($is_verified): ?>
                        <a href="post_internship.php" class="btn-sm btn-sm-green">+ Post New</a>
                    <?php endif; ?>
                </div>
                <table>
                    <thead>
                        <tr><th>Position</th><th>Posted</th><th>Applicants</th><th>Status</th><th>Actions</th></tr>
                    </thead>
                    <tbody>
                        <?php if (empty($listings)): ?>
                            <tr><td colspan="5" style="text-align:center;color:var(--text-muted)">No listings yet.</td></tr>
                        <?php else: foreach ($listings as $job): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($job['title']); ?></td>
                                <td><?php echo date('M j', strtotime($job['created_at'])); ?></td>
                                <td><?php echo $job['applicant_count']; ?></td>
                                <td>
                                    <?php
                                    $badge = $job['status'] === 'active' ? 'badge-green' : ($job['status'] === 'closed' ? 'badge-gray' : 'badge-amber');
                                    ?>
                                    <span class="badge <?php echo $badge; ?>"><?php echo ucfirst($job['status']); ?></span>
                                </td>
                                <td>
                                    <a href="screening.php?internship_id=<?php echo $job['id']; ?>" class="btn-sm btn-sm-green">Screen</a>
                                </td>
                            </tr>
                        <?php endforeach; endif; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </main>
</div>

</body>
</html>
