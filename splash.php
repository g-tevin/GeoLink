<?php

session_start();


$splash_duration = 9000; 
$redirect_url = 'login.php'; 
$app_name = 'GeoLink';
$app_tagline = 'Connect. Explore. Innovate.';


// Check if user is already logged in
if (isset($_SESSION['user_id'])) {
    header('Location: dashboard.php');
    exit();
}

// Track splash screen views
if (!isset($_SESSION['splash_views'])) {
    $_SESSION['splash_views'] = 1;
} else {
    $_SESSION['splash_views']++;
}

// Get user's device info
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$is_mobile = preg_match('/(android|iphone|ipad|mobile)/i', $user_agent);

// Generate a unique session ID for tracking
$session_id = session_id();

// Define logo/icon path
$logo_path = 'images/geolink-logo.png';
$use_svg = true; // Set to false to use image instead

// Check if logo file exists
if (!$use_svg && !file_exists($logo_path)) {
    $use_svg = true; // Fallback to SVG if image not found
}

// Array of loading messages to rotate through
$loading_messages = [
    'Loading...',
    'Connecting...',
    'Preparing your experience...',
    'Almost there...',
    'Welcome to GeoLink!'
];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($app_name); ?> - Loading</title>
    <link rel="stylesheet" href="assets/splash.css?v=<?php echo $timestamp; ?>">
    <link rel="icon" type="image/png" href="images/favicon.png">
</head>
<body>
    <div class="splash-container">
        <div class="splash-content">
            <!-- Logo/Icon Placeholder -->
            <div class="splash-icon">
                <div class="icon-placeholder">
                    <?php if ($use_svg): ?>
                        <!-- SVG Icon (default) -->
                        <svg width="80" height="80" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM12 4C16.41 4 20 7.59 20 12C20 16.41 16.41 20 12 20C7.59 20 4 16.41 4 12C4 7.59 7.59 4 12 4ZM11 7H13V13H11V7ZM11 15H13V17H11V15Z" fill="#000000"/>
                        </svg>
                    <?php else: ?>
                        <!-- Image Logo -->
                        <img src="<?php echo htmlspecialchars($logo_path); ?>" 
                             alt="<?php echo htmlspecialchars($app_name); ?> Logo" 
                             width="80" 
                             height="80">
                    <?php endif; ?>
                </div>
            </div>

            
            <h1 class="splash-title"><?php echo htmlspecialchars($app_name); ?></h1>
            
            <p class="splash-tagline"><?php echo htmlspecialchars($app_tagline); ?></p>
            
            // loading dots 
            <div class="splash-loader">
                <div class="loader-dot"></div>
                <div class="loader-dot"></div>
                <div class="loader-dot"></div>
            </div>

            //Loading text
            <p class="splash-text" id="loadingText">
                <?php echo htmlspecialchars($random_message); ?>
            </p>
            <!-- Session info (hidden - for debugging) -->
            <?php if (isset($_SESSION['splash_views'])): ?>
                <p class="splash-debug" style="display: none;">
                    Views: <?php echo $_SESSION['splash_views']; ?>
                </p>
            <?php endif; ?>
        </div>
    </div>

    <script>    
        var splashDuration = <?php echo $splash_duration; ?>;
        var redirectUrl = '<?php echo $redirect_url; ?>';
        var sessionId = '<?php echo $session_id; ?>';
        var isMobile = <?php echo $is_mobile ? 'true' : 'false'; ?>;
        var appName = '<?php echo htmlspecialchars($app_name); ?>';

        
        // Loading messages rotation
        var loadingMessages = <?php echo json_encode($loading_messages); ?>;

      
        //functions
        function updateLoadingText() {
            var textElement = document.getElementById('loadingText');
            if (textElement) {
                var randomIndex = Math.floor(Math.random() * loadingMessages.length);
                var message = loadingMessages[randomIndex];
                
                textElement.style.opacity = '0';
                setTimeout(function() {
                    textElement.textContent = message;
                    textElement.style.opacity = '1';
                }, 300);
            }
        }

        function redirectToPage() {
            var container = document.querySelector('.splash-container');
            if (container) {
                container.style.transition = 'opacity 0.5s ease';
                container.style.opacity = '0';
            }
            
            setTimeout(function() {
                window.location.href = redirectUrl;
            }, 500);
        }

        function trackSplashView() {
            console.log('Splash screen viewed - Session: ' + sessionId);
        }

       
     // Main execution
        trackSplashView();

        var textInterval = setInterval(function() {
            if (splashDuration > 500) {
                updateLoadingText();
            }
        }, 600);

        setTimeout(function() {
            clearInterval(textInterval);
            
            var textElement = document.getElementById('loadingText');
            if (textElement) {
                textElement.textContent = 'Welcome to GeoLink!';
            }
            
            redirectToPage();
        }, splashDuration);
    </script>
</body>
</html>