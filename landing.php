<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GeoLink - Graduate Internship Platform</title>
    <link rel="stylesheet" href="assets/landing.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- ===== HEADER ===== -->
    <header class="header">
        <div class="container">
            <div class="logo">Geo<span>Link</span></div>
           <nav class="nav-links" id="navLinks">
    <a href="#about">About</a>
    <a href="#features">Features</a>
    <a href="#how-it-works">How It Works</a>
    <a href="#testimonials">Testimonials</a>
    <a href="choice.php" class="btn-nav">Get Started</a>
</nav>
            <button class="hamburger" id="hamburger" aria-label="Toggle menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </header>

    <!-- ===== HERO ===== -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>
                    Bridge the Gap<br>
                    <span class="highlight">From Graduate</span><br>
                    to Employment
                </h1>
                <p>
                    GeoLink is a centralized web-based platform that connects young graduates 
                    to suitable internship opportunities while supporting application, screening, 
                    and follow-up throughout the recruitment process in Nairobi County.
                </p>
                <div class="hero-buttons">
                  <a href="account-type.php" class="btn-primary">
                    <i class="fas fa-user-graduate"></i> Get Started
                     </a>
                    <a href="choice.php" class="btn-secondary">
                    <i class="fas fa-building"></i> For Employers
                   </a>
                </div>
                <div class="hero-stat">
                    <div class="hero-stat-item">
                        <span class="number">40%+</span>
                        <span class="label">Graduate Unemployment Rate</span>
                    </div>
                    <div class="hero-stat-item">
                        <span class="number">100K+</span>
                        <span class="label">Annual Graduates in Kenya</span>
                    </div>
                    <div class="hero-stat-item">
                        <span class="number">195</span>
                        <span class="label">Countries in Scope</span>
                    </div>
                </div>
            </div>
            <div class="hero-image">
                <div class="mockup">
                    <div class="mockup-header">
                        <div class="mockup-dots">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <span class="mockup-badge">v1.0</span>
                    </div>
                    <div class="mockup-content">
                        <div class="mockup-stat-box">
                            <div class="stat-item">
                                <span class="stat-label">Active Internships</span>
                                <span class="stat-value">1,284</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-label">Registered Graduates</span>
                                <span class="stat-value">4,327</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-label">Partner Employers</span>
                                <span class="stat-value">156</span>
                            </div>
                        </div>
                        <div class="mockup-features">
                            <div class="feature-tag">
                                <i class="fas fa-check-circle"></i> Profile Management
                            </div>
                            <div class="feature-tag">
                                <i class="fas fa-check-circle"></i> Application Tracking
                            </div>
                            <div class="feature-tag">
                                <i class="fas fa-check-circle"></i> Screening & Feedback
                            </div>
                        </div>
                    </div>
                    <div class="mockup-footer">
                        <div class="mockup-stat">
                            <span>Transparent</span>
                            <strong>Fair Process</strong>
                        </div>
                        <div class="mockup-stat">
                            <span>Structured</span>
                            <strong>Screening System</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== ABOUT / PROBLEM ===== -->
    <section class="about" id="about">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">About GeoLink</span>
                <h2>Addressing Graduate Unemployment in Kenya</h2>
                <p>Every year, universities and colleges produce over hundreds of thousands of graduates, yet less than 40% secure a job.</p>
            </div>
            <div class="about-grid">
                <div class="about-card">
                    <div class="about-icon" style="background: rgba(15,34,60,0.08); color: #0f223c;">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <h3>The Challenge</h3>
                    <p>Graduates struggle to find internships that align with their qualifications and career aspirations due to limited exposure, lack of structured screening, and limited visibility for entry-level candidates.</p>
                </div>
                <div class="about-card">
                    <div class="about-icon" style="background: rgba(22,102,83,0.08); color: #166653;">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h3>Our Solution</h3>
                    <p>GeoLink provides a centralized, structured, and reliable digital system that associates young graduates to organizations offering internships, improving accessibility, fairness, and efficiency for all stakeholders.</p>
                </div>
                <div class="about-card">
                    <div class="about-icon" style="background: rgba(67,84,93,0.08); color: #43545d;">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <h3>Our Mission</h3>
                    <p>To bridge the gap between education and employment by creating a transparent platform that supports SDG 8, Kenya's Vision 2030, and the African Union Agenda 2063.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== FEATURES ===== -->
    <section class="features" id="features">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Features</span>
                <h2>Platform Capabilities</h2>
                <p>Everything you need to connect, apply, and succeed in your career journey.</p>
            </div>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-user-circle"></i>
                    </div>
                    <h3>Profile Management</h3>
                    <p>Create comprehensive profiles with qualifications, skills, and experience to showcase your potential to employers.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <h3>Internship Listings</h3>
                    <p>Browse and discover internship opportunities from vetted employers across Nairobi County.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-paper-plane"></i>
                    </div>
                    <h3>Application Submission</h3>
                    <p>Submit applications seamlessly with a structured process that ensures all required information is captured.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-filter"></i>
                    </div>
                    <h3>Screening System</h3>
                    <p>Applications undergo a structured screening process with clear status: pending, rejected, or shortlisted.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-comment-dots"></i>
                    </div>
                    <h3>Feedback Handling</h3>
                    <p>Receive transparent feedback on your applications, helping you understand and improve your candidacy.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-chart-pie"></i>
                    </div>
                    <h3>Recruitment Analytics</h3>
                    <p>Access reports on application and recruitment analytics for transparency and informed decision-making.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== HOW IT WORKS ===== -->
    <section class="how-it-works" id="how-it-works">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">How It Works</span>
                <h2>Simple. Transparent. Effective.</h2>
                <p>GeoLink streamlines the internship recruitment process for both graduates and employers.</p>
            </div>
            <div class="steps-grid">
                <div class="step-card">
                    <div class="step-number">01</div>
                    <div class="step-icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <h3>Register & Create Profile</h3>
                    <p>Graduates create profiles with qualifications, skills, and career aspirations. Employers register and set up their organization profile.</p>
                </div>
                <div class="step-card">
                    <div class="step-number">02</div>
                    <div class="step-icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <h3>Browse & Apply</h3>
                    <p>Graduates search and apply for internships that match their qualifications. Employers post opportunities and manage listings.</p>
                </div>
                <div class="step-card">
                    <div class="step-number">03</div>
                    <div class="step-icon">
                        <i class="fas fa-clipboard-check"></i>
                    </div>
                    <h3>Screening & Shortlisting</h3>
                    <p>Applications are screened using standardized criteria. Candidates are shortlisted or rejected with clear feedback provided.</p>
                </div>
                <div class="step-card">
                    <div class="step-number">04</div>
                    <div class="step-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h3>Placement & Follow-up</h3>
                    <p>Successful candidates are placed in internships. The platform supports follow-up and feedback throughout the process.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== TESTIMONIALS ===== -->
    <section class="testimonials" id="testimonials">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Testimonials</span>
                <h2>What Our Users Say</h2>
                <p>Real experiences from graduates and employers using GeoLink.</p>
            </div>
            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <div class="testimonial-stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p>"GeoLink helped me find an internship that actually matched my qualifications. The screening process was transparent and I received clear feedback on my application."</p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar" style="background: var(--emerald-depths);">JM</div>
                        <div>
                            <h4>James Mwangi</h4>
                            <span>Computer Science Graduate, Strathmore University</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p>"As an employer, GeoLink streamlined our recruitment process. We found qualified graduates quickly and the structured screening saved us valuable time and resources."</p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar" style="background: var(--charcoal-blue);">SO</div>
                        <div>
                            <h4>Sarah Odhiambo</h4>
                            <span>HR Manager, Safaricom PLC</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p>"The platform's transparency gave me confidence in the process. I could track my application status and the feedback helped me improve for future opportunities."</p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar" style="background: var(--prussian-blue);">AK</div>
                        <div>
                            <h4>Anne Kariuki</h4>
                            <span>Business Administration Graduate, University of Nairobi</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p>"GeoLink has been instrumental in helping us connect with young talent. The platform is user-friendly and the analytics features help us make informed recruitment decisions."</p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar" style="background: #166653;">PO</div>
                        <div>
                            <h4>Peter Ochieng</h4>
                            <span>Recruitment Lead, Equity Bank</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p>"The feedback mechanism on GeoLink is a game-changer. I received clear reasons when I wasn't shortlisted, which helped me understand areas I needed to improve."</p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar" style="background: var(--charcoal-blue);">FN</div>
                        <div>
                            <h4>Faith Njoroge</h4>
                            <span>Engineering Graduate, JKUAT</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p>"We've reduced our hiring time by over 40% since adopting GeoLink. The structured screening and access to qualified graduates has been invaluable for our organization."</p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar" style="background: var(--emerald-depths);">DM</div>
                        <div>
                            <h4>David Muthama</h4>
                            <span>Operations Director, KCB Group</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== CTA ===== -->
    <section class="cta">
        <div class="container">
            <div class="cta-content">
                <h2>Ready to Start Your Career Journey?</h2>
                <p>Join thousands of graduates and employers already using GeoLink to connect, apply, and recruit.</p>
                <div class="cta-buttons">
                    <a href="#" class="btn-primary">
                        <i class="fas fa-user-graduate"></i> Create Graduate Account
                    </a>
                    <a href="#" class="btn-secondary">
                        <i class="fas fa-building"></i> Register as Employer
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== FOOTER ===== -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <div class="logo">Geo<span>Link</span></div>
                    <p>Bridging the gap from graduate to employment through transparent internship recruitment.</p>
                    <div class="footer-social">
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-github"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="footer-links">
                    <h4>Platform</h4>
                    <a href="#features">Features</a>
                    <a href="#how-it-works">How It Works</a>
                    <a href="#">For Graduates</a>
                    <a href="#">For Employers</a>
                </div>
                <div class="footer-links">
                    <h4>Company</h4>
                    <a href="#about">About</a>
                    <a href="#">Contact</a>
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms of Service</a>
                </div>
                <div class="footer-links">
                    <h4>Support</h4>
                    <a href="#">Help Center</a>
                    <a href="#">FAQs</a>
                    <a href="#">Documentation</a>
                    <a href="#">Feedback</a>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2026 GeoLink. All rights reserved. | Strathmore University - Bachelor of Business Information Technology</p>
            </div>
        </div>
    </footer>

    <!-- ===== JAVASCRIPT ===== -->
    <script>
        // Mobile menu toggle
        const hamburger = document.getElementById('hamburger');
        const navLinks = document.getElementById('navLinks');

        hamburger.addEventListener('click', () => {
            navLinks.classList.toggle('active');
            hamburger.classList.toggle('active');
        });

        // Close menu on link click
        document.querySelectorAll('.nav-links a').forEach(link => {
            link.addEventListener('click', () => {
                navLinks.classList.remove('active');
                hamburger.classList.remove('active');
            });
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });

        // Header shadow on scroll
        window.addEventListener('scroll', () => {
            const header = document.querySelector('.header');
            if (window.scrollY > 50) {
                header.style.boxShadow = '0 4px 30px rgba(15, 34, 60, 0.25)';
            } else {
                header.style.boxShadow = '0 2px 20px rgba(15, 34, 60, 0.15)';
            }
        });
    </script>
</body>
</html>