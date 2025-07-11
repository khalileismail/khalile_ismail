// Enhanced form submission handling
const contactForm = document.getElementById('contact-form');
if (contactForm) {
    contactForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Get form data
        const formData = new FormData(this);
        
        // Client-side validation
        const name = formData.get('name').trim();
        const email = formData.get('email').trim();
        const subject = formData.get('subject').trim();
        const message = formData.get('message').trim();
        
        // Validate fields
        if (name.length < 2) {
            showNotification('Name must be at least 2 characters long', 'error');
            return;
        }
        
        if (!isValidEmail(email)) {
            showNotification('Please enter a valid email address', 'error');
            return;
        }
        
        if (subject.length < 3) {
            showNotification('Subject must be at least 3 characters long', 'error');
            return;
        }
        
        if (message.length < 10) {
            showNotification('Message must be at least 10 characters long', 'error');
            return;
        }
        
        // Show loading state
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<span>Sending...</span><i class="fas fa-spinner fa-spin"></i>';
        submitBtn.disabled = true;
        
        // Add honeypot field (hidden from users, catches bots)
        const honeypot = document.createElement('input');
        honeypot.type = 'hidden';
        honeypot.name = 'website';
        honeypot.value = '';
        this.appendChild(honeypot);
        
        // Submit form
        fetch('contact.php', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                showNotification(data.message || 'Message sent successfully!', 'success');
                this.reset();
                
                // Optional: Track successful submission
                if (typeof gtag !== 'undefined') {
                    gtag('event', 'form_submit', {
                        'event_category': 'Contact',
                        'event_label': 'Success'
                    });
                }
            } else {
                showNotification(data.message || 'Error sending message. Please try again.', 'error');
            }
        })
        .catch(error => {
            console.error('Form submission error:', error);
            showNotification('There was a problem sending your message. Please try again or contact me directly at alex.johnson@email.com', 'error');
        })
        .finally(() => {
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
            
            // Remove honeypot field
            if (honeypot.parentNode) {
                honeypot.parentNode.removeChild(honeypot);
            }
        });
    });
}

// Email validation function
function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

// Enhanced notification system
function showNotification(message, type) {
    // Remove existing notifications
    const existingNotifications = document.querySelectorAll('.notification');
    existingNotifications.forEach(notification => {
        notification.remove();
    });
    
    const notification = document.createElement('div');
    notification.className = `notification ${type}`;
    notification.innerHTML = `
        <i class="fas ${type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle'}"></i>
        <span>${message}</span>
        <button class="notification-close" onclick="this.parentElement.remove()">
            <i class="fas fa-times"></i>
        </button>
    `;
    
    // Add styles
    notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        max-width: 400px;
        padding: 1rem 2rem;
        border-radius: 10px;
        color: white;
        font-weight: 500;
        z-index: 10000;
        transform: translateX(100%);
        transition: transform 0.3s ease;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        backdrop-filter: blur(10px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        ${type === 'success' 
            ? 'background: rgba(16, 185, 129, 0.9); border: 1px solid rgba(16, 185, 129, 0.3);' 
            : 'background: rgba(239, 68, 68, 0.9); border: 1px solid rgba(239, 68, 68, 0.3);'
        }
    `;
    
    // Style the close button
    const closeBtn = notification.querySelector('.notification-close');
    closeBtn.style.cssText = `
        background: none;
        border: none;
        color: white;
        cursor: pointer;
        margin-left: auto;
        padding: 0.25rem;
        border-radius: 50%;
        transition: background 0.2s ease;
    `;
    
    closeBtn.addEventListener('mouseenter', () => {
        closeBtn.style.background = 'rgba(255,255,255,0.2)';
    });
    
    closeBtn.addEventListener('mouseleave', () => {
        closeBtn.style.background = 'none';
    });
    
    document.body.appendChild(notification);
    
    // Animate in
    setTimeout(() => {
        notification.style.transform = 'translateX(0)';
    }, 100);
    
    // Auto remove after 5 seconds
    setTimeout(() => {
        if (document.body.contains(notification)) {
            notification.style.transform = 'translateX(100%)';
            setTimeout(() => {
                if (document.body.contains(notification)) {
                    document.body.removeChild(notification);
                }
            }, 300);
        }
    }, 5000);
}

// Test contact form functionality
function testContactForm() {
    console.log('Testing contact form...');
    
    // Check if PHP file exists
    fetch('contact.php', {
        method: 'GET'
    })
    .then(response => {
        if (response.ok) {
            console.log('✅ contact.php is accessible');
        } else {
            console.log('❌ contact.php returned status:', response.status);
        }
    })
    .catch(error => {
        console.log('❌ Error accessing contact.php:', error);
    });
}

// Run test on page load (remove in production)
window.addEventListener('load', testContactForm);