<!-- Footer Section -->
<footer class="footer py-5" style="background-color: #1e1836;">
    <div class="container">
        <!-- Social Media Links -->
        <div class="row justify-content-center mb-4">
            <div class="col-auto">
                <div class="social-links d-flex gap-4">
                    <a href="#" class="social-link">
                        <i class="fab fa-facebook-f text-secondary"></i>
                    </a>
                    <a href="#" class="social-link">
                        <i class="fab fa-twitter text-secondary"></i>
                    </a>
                    <a href="#" class="social-link">
                        <i class="fab fa-instagram text-secondary"></i>
                    </a>
                    <a href="#" class="social-link">
                        <i class="fab fa-linkedin-in text-secondary"></i>
                    </a>
                    <a href="#" class="social-link">
                        <i class="fab fa-youtube text-secondary"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Divider -->
        <div class="row">
            <div class="col">
                <hr class="divider opacity-25">
            </div>
        </div>

        <!-- Logo -->
        <div class="row justify-content-center my-4">
            <div class="col-auto">
                <div class="footer-logo">
                    <div class="logo-circle">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2L4 6v12l8 4 8-4V6l-8-4z" stroke="white" stroke-width="2"/>
                            <path d="M12 6l-4 2v8l4 2 4-2V8l-4-2z" fill="#FF6B4A"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="row justify-content-center mb-4">
            <div class="col-auto">
                <p class="text-secondary small mb-0">Copyright &copy; {{ date('Y') }} Healthy Habitat Network. All rights reserved</p>
            </div>
        </div>

        <!-- Footer Links -->
        <div class="row justify-content-center">
            <div class="col-auto">
                <div class="footer-links d-flex gap-4">
                    <a href="#" class="text-secondary small text-decoration-none">Terms of Use</a>
                    <a href="#" class="text-secondary small text-decoration-none">Privacy Policy</a>
                    <a href="#" class="text-secondary small text-decoration-none">Code of Conduct</a>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
    .footer {
        color: #ffffff;
    }

    .text-secondary {
        color: rgba(255, 255, 255, 0.6) !important;
    }

    .social-link {
        font-size: 18px;
        color: rgba(255, 255, 255, 0.6);
        transition: color 0.3s ease;
    }

    .social-link:hover {
        color: rgba(255, 255, 255, 0.9);
    }

    .divider {
        border-color: rgba(255, 255, 255, 0.2);
    }

    .logo-circle {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        background: linear-gradient(135deg, #FF6B4A 0%, #FF8E53 100%);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .footer-links a {
        transition: color 0.3s ease;
    }

    .footer-links a:hover {
        color: rgba(255, 255, 255, 0.9) !important;
    }
</style>
