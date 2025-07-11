<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ismail Khalile - Full Stack Developer</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-logo">
                <a href="#home">khalile ismail</a>
            </div>
            <div class="nav-menu" id="nav-menu">
                <a href="#home" class="nav-link active">Home</a>
                <a href="#about" class="nav-link">About</a>
                <a href="#portfolio" class="nav-link">Portfolio</a>
                <a href="#contact" class="nav-link">Contact</a>
            </div>
            <div class="hamburger" id="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="hero-container">
            <div class="hero-content">
                <div class="hero-badge">
                    <i class="fas fa-rocket"></i>
                    <span>Ready to Innovate</span>
                </div>
                
                <h1 class="hero-title">
                    Full Stack<br>
                    <span class="gradient-text">Developer</span>
                </h1>
                
                <p class="hero-subtitle">Junior développer</p>
                
                <p class="hero-description">
                    Enhancing digital experiences that are smooth, scalable, and made to impress.
                </p>
                
                <div class="tech-stack">
                    <span class="tech-tag">HTML</span>
                    <span class="tech-tag">CSS</span>
                    <span class="tech-tag">Javascript</span>
                    <span class="tech-tag">PHP</span>
                    <span class="tech-tag">MySQL</span>
                </div>
                
                <div class="hero-buttons">
                    <a href="#portfolio" class="btn btn-primary">
                        <span>Projects</span>
                        <i class="fas fa-external-link-alt"></i>
                    </a>
                    <a href="#contact" class="btn btn-secondary">
                        <span>Contact</span>
                        <i class="fas fa-envelope"></i>
                    </a>
                </div>
                
                <div class="social-links">
                    <a href="https://github.com/khalileismail" target="_blank" class="social-link">
                        <i class="fab fa-github"></i>
                    </a>
                    <a href="http://linkedin.com/in/ismail-khalile-567191341/" target="_blank" class="social-link">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="https://www.instagram.com/khalile_ismail?igsh=bHFyd3lkcHhqbGF5" target="_blank" class="social-link">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
            
            <div class="hero-visual">
                <div class="floating-elements">
                    <div class="floating-card card-1">
                        <i class="fas fa-cog"></i>
                    </div>
                    <div class="floating-card card-2">
                        <i class="fas fa-code"></i>
                    </div>
                    <div class="floating-card card-3">
                        <i class="fas fa-download"></i>
                    </div>
                    <div class="floating-card card-4">
                        <i class="fas fa-database"></i>
                    </div>
                    <div class="floating-card card-5">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                </div>
                <div class="main-illustration">
                    <div class="laptop">
                        <div class="laptop-screen">
                            <div class="code-lines">
                                <div class="code-line"></div>
                                <div class="code-line"></div>
                                <div class="code-line"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Animated Background -->
        <div class="bg-animation">
            <div class="floating-shape shape-1"></div>
            <div class="floating-shape shape-2"></div>
            <div class="floating-shape shape-3"></div>
            <div class="floating-shape shape-4"></div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">About Me</h2>
                <p class="section-subtitle">Get to know me better</p>
            </div>
            
            <div class="about-content">
                <div class="about-text">
                    <p>
                        I'm a passionate full-stack developer with expertise in modern web technologies. 
                        I love creating digital solutions that combine beautiful design with powerful functionality.
                    </p>
                    <p>
                        My journey in web development started with curiosity and has evolved into a dedication 
                        to crafting exceptional user experiences using cutting-edge technologies.
                    </p>
                    
                    <div class="skills-grid">
                        <div class="skill-item">
                            <i class="fab fa-html5"></i>
                            <span>HTML5</span>
                        </div>
                        <div class="skill-item">
                            <i class="fab fa-css3-alt"></i>
                            <span>CSS3</span>
                        </div>
                        <div class="skill-item">
                            <i class="fab fa-js-square"></i>
                            <span>JavaScript</span>
                        </div>
                        <div class="skill-item">
                            <i class="fab fa-php"></i>
                            <span>PHP</span>
                        </div>
                        <div class="skill-item">
                            <i class="fas fa-database"></i>
                            <span>MySQL</span>
                        </div>
                        <div class="skill-item">
                            <i class="fab fa-bootstrap"></i>
                            <span>Bootstrap</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">My Portfolio</h2>
                <p class="section-subtitle">Recent projects I've worked on</p>
            </div>
            
            <div class="portfolio-grid">
                <div class="portfolio-item">
                    <div class="portfolio-image">
                        <img src="maalem.png" alt="E-commerce Platform">
                        <div class="portfolio-overlay">
                            <h3>artisan Platform</h3>
                            <p>Full-stack artisan solution with PHP and MySQL</p>
                            <div class="portfolio-links">
                                <a href="#" class="portfolio-link">
                                    <i class="fas fa-external-link-alt"></i>
                                </a>
                                <a href="#" class="portfolio-link">
                                    <i class="fab fa-github"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="portfolio-tech">
                        <span>PHP</span>
                        <span>MySQL</span>
                        <span>JavaScript</span>
                    </div>
                </div>
                
                <div class="portfolio-item">
                    <div class="portfolio-image">
                        <img src="portfolio.png" alt="Task Manager">
                        <div class="portfolio-overlay">
                            <h3>Portfolio</h3>
                            <p>Responsive portfolio</p>
                            <div class="portfolio-links">
                                <a href="#" class="portfolio-link">
                                    <i class="fas fa-external-link-alt"></i>
                                </a>
                                <a href="#" class="portfolio-link">
                                    <i class="fab fa-github"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="portfolio-tech">
                        <span>HTML</span>
                        <span>CSS</span>
                        <span>JavaScript</span>
                    </div>
                </div>
                

            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Get In Touch</h2>
                <p class="section-subtitle">Let's work together on your next project</p>
            </div>
            
            <div class="contact-content">
                <div class="contact-info">
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Email</h4>
                            <p>ismail12345khalile@gmail.com</p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Phone</h4>
                            <p>+212 675544998</p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Location</h4>
                            <p>Morocco</p>
                        </div>
                    </div>
                </div>
                
                <form class="contact-form" id="contact-form" action="contact.php" method="POST">
                    <div class="form-row">
                        <div class="form-group">
                            <input type="text" name="name" placeholder="Your Name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Your Email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" name="subject" placeholder="Subject" required>
                    </div>
                    <div class="form-group">
                        <textarea name="message" placeholder="Your Message" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <span>Send Message</span>
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </form>
            </div>
        </div>
    </section>

    <script src="script.js"></script>
</body>
</html>