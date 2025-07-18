<!-- resources/views/components/nav.blade.php -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark-glass fixed-top" style="backdrop-filter: blur(10px); border-bottom: 1px solid rgba(255, 255, 255, 0.1);">
    <div class="container">
        <!-- Brand with Neon Glow -->
        <a class="navbar-brand glow-text d-flex align-items-center" href="/" style="font-family: 'Orbitron', sans-serif;">
            <div class="ai-icon me-2" style="width: 30px; height: 30px;">
                <i class="fas fa-robot fa-sm"></i>
            </div>
            PILUA AI
        </a>

        <!-- Mobile Toggle -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active text-info' : '' }}" href="/">
                        <i class="fas fa-home me-1"></i> Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('crypto-tracker') ? 'active text-info' : '' }}" href="/crypto-tracker">
                        <i class="fas fa-chart-line me-1"></i> Crypto Tracker
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('portfolio') ? 'active text-info' : '' }}" href="/portfolio">
                        <i class="fas fa-coins me-1"></i> Portfolio
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('what-if') ? 'active text-info' : '' }}" href="/what-if">
                        <i class="fas fa-calculator me-1"></i> What-If Analysis
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('loan-vs-sip') ? 'active text-info' : '' }}" href="/loan-vs-sip">
                        <i class="fas fa-balance-scale me-1"></i> Loan vs SIP
                    </a>
                </li>
            </ul>

            <!-- Right-aligned elements -->
            <div class="d-flex align-items-center">
            
                
                
            </div>
        </div>
    </div>
</nav>

<style>
    .bg-dark-glass {
        background: rgba(15, 23, 42, 0.8) !important;
        backdrop-filter: blur(10px);
    }
    
    .nav-link {
        position: relative;
        padding: 0.5rem 1rem;
        transition: all 0.3s ease;
        border-radius: 4px;
    }
    
    .nav-link:hover {
        background: rgba(0, 242, 255, 0.1);
    }
    
    .nav-link.active {
        font-weight: 600;
    }
    
    .nav-link.active::after {
        content: '';
        position: absolute;
        bottom: -1px;
        left: 1rem;
        right: 1rem;
        height: 2px;
        background: var(--primary-glow);
        border-radius: 2px;
    }
</style>

<script>
    // Theme toggle functionality
    document.getElementById('themeToggle').addEventListener('click', function() {
        const html = document.documentElement;
        const icon = this.querySelector('i');
        
        if (html.getAttribute('data-bs-theme') === 'dark') {
            html.removeAttribute('data-bs-theme');
            icon.classList.replace('fa-moon', 'fa-sun');
        } else {
            html.setAttribute('data-bs-theme', 'dark');
            icon.classList.replace('fa-sun', 'fa-moon');
        }
    });
    
    // Connect wallet simulation
    document.getElementById('connectWallet').addEventListener('click', function() {
        const toast = new bootstrap.Toast(document.createElement('div'));
        const toastElement = document.createElement('div');
        toastElement.className = 'toast align-items-center text-white bg-primary border-0';
        toastElement.innerHTML = `
            <div class="d-flex">
                <div class="toast-body">
                    Wallet connection coming soon!
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        `;
        document.body.appendChild(toastElement);
        new bootstrap.Toast(toastElement).show();
    });
</script>