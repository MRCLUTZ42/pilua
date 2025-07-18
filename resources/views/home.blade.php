<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pilua AI - Crypto Trading Assistant</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Pilua AI - Your advanced crypto trading assistant with real-time insights and risk analysis">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700&family=Exo+2:wght@300;400;600&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Lottie Animation -->
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

    <style>

        .ticker-container {
    overflow: hidden;
    background: #000;
    color: #fff;
    padding: 10px 0;
}

.ticker-wrap {
    display: flex;
    animation: scroll 30s linear infinite;
    white-space: nowrap;
}

.ticker-item {
    margin-right: 40px;
    font-size: 16px;
}

.ticker-symbol {
    font-weight: bold;
}

.ticker-price.up {
    color: #4caf50;
}

.ticker-price.down {
    color: #f44336;
}

@keyframes scroll {
    0% { transform: translateX(100%); }
    100% { transform: translateX(-100%); }
}

        :root {
            --primary-glow: #00f2ff;
            --secondary-glow: #9600ff;
            --accent-color: #00e1ff;
            --dark-bg: #0a0a1a;
            --darker-bg: #050510;
            --glass-bg: rgba(15, 23, 42, 0.7);
            --text-primary: #e2e8f0;
            --text-secondary: #94a3b8;
        }
        
        body {
            font-family: 'Exo 2', sans-serif;
            background: var(--dark-bg);
            color: var(--text-primary);
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
        }
        
        /* Animated Crypto Background */
        .crypto-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            opacity: 0.15;
            pointer-events: none;
        }
        
        /* Crypto Ticker */
        .ticker-container {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(10px);
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            z-index: 10;
            overflow: hidden;
            height: 40px;
        }
        
        .ticker-wrap {
            display: flex;
            white-space: nowrap;
            animation: ticker 60s linear infinite;
        }
        
        .ticker-item {
            display: inline-flex;
            align-items: center;
            padding: 0 20px;
            font-family: 'Orbitron', sans-serif;
            font-size: 0.9rem;
            color: var(--text-primary);
        }
        
        .ticker-symbol {
            color: var(--accent-color);
            margin-right: 8px;
            font-weight: 700;
        }
        
        .ticker-price.up {
            color: #00ff9d;
        }
        
        .ticker-price.down {
            color: #ff4d4d;
        }
        
        @keyframes ticker {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        
        /* Glassmorphism Card */
        .glass-card {
            background: var(--glass-bg);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-radius: 16px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.36);
            transition: all 0.3s ease;
        }
        
        .glass-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px 0 rgba(0, 242, 255, 0.2);
        }
        
        /* Neon Glow Effects */
        .glow-text {
            text-shadow: 0 0 8px var(--primary-glow);
        }
        
        .glow-border {
            position: relative;
        }
        
        .glow-border::after {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            border-radius: inherit;
            background: linear-gradient(45deg, var(--primary-glow), var(--secondary-glow));
            z-index: -1;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .glow-border:hover::after {
            opacity: 0.7;
        }
        
        /* Input Styling - UPDATED */
        .input-glow {
            background: rgba(15, 23, 42, 0.5);
            border: 1px solid rgba(0, 242, 255, 0.3);
            color: white;
            transition: all 0.3s ease;
            padding: 1rem 1.5rem;
            font-size: 1.1rem;
            border-radius: 12px !important;
        }
        
        .input-glow::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }
        
        .input-glow:focus {
            background: rgba(15, 23, 42, 0.8);
            border-color: var(--accent-color);
            box-shadow: 0 0 0 0.25rem rgba(0, 242, 255, 0.25);
            color: white;
        }
        
        /* Button Styling */
        .btn-neon {
            background: linear-gradient(45deg, var(--primary-glow), var(--secondary-glow));
            border: none;
            color: white;
            font-weight: 600;
            letter-spacing: 1px;
            position: relative;
            overflow: hidden;
            z-index: 1;
            transition: all 0.3s ease;
            padding: 1rem 1.5rem;
            border-radius: 12px !important;
            font-size: 1.1rem;
        }
        
        .btn-neon::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: all 0.5s ease;
            z-index: -1;
        }
        
        .btn-neon:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 242, 255, 0.4);
        }
        
        .btn-neon:hover::before {
            left: 100%;
        }
        
        /* Response Cards */
        .response-card {
            border-left: 4px solid var(--accent-color);
            transition: all 0.3s ease;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.5s forwards;
        }
        
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .question-card {
            border-left-color: #6366f1;
        }
        
        .answer-card {
            border-left-color: #10b981;
        }
        
        /* Typing Animation */
        .typing-animation {
            display: inline-block;
        }
        
        .typing-animation::after {
            content: '...';
            animation: typing 1.5s infinite;
        }
        
        @keyframes typing {
            0% { content: '.'; }
            33% { content: '..'; }
            66% { content: '...'; }
        }
        
        /* Scrollable History */
        .history-container {
            max-height: 400px;
            overflow-y: auto;
            scroll-behavior: smooth;
        }
        
        .history-container::-webkit-scrollbar {
            width: 6px;
        }
        
        .history-container::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
        }
        
        .history-container::-webkit-scrollbar-thumb {
            background: var(--accent-color);
            border-radius: 10px;
        }
        
        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .glass-card {
                padding: 20px;
            }
            
            .ticker-item {
                padding: 0 12px;
                font-size: 0.8rem;
            }
        }
        
        /* Special Elements - UPDATED LOGO */
        .ai-icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-glow), var(--secondary-glow));
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            flex-shrink: 0;
            box-shadow: 0 0 20px rgba(0, 242, 255, 0.5);
            border: 2px solid rgba(255, 255, 255, 0.1);
        }
        
        .ai-icon i {
            font-size: 2rem;
            color: white;
        }
        
        .risk-badge {
            background: rgba(239, 68, 68, 0.2);
            color: #ef4444;
            border: 1px solid #ef4444;
        }
        
        .opportunity-badge {
            background: rgba(16, 185, 129, 0.2);
            color: #10b981;
            border: 1px solid #10b981;
        }
        
        /* UPDATED HEADER STYLES */
        .header-title {
            font-family: 'Orbitron', sans-serif;
            font-size: 2.5rem;
            background: linear-gradient(90deg, var(--primary-glow), var(--secondary-glow));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 0.5rem;
            letter-spacing: 2px;
        }
        
        .header-subtitle {
            color: var(--text-secondary);
            font-size: 1.1rem;
            letter-spacing: 1px;
            position: relative;
            display: inline-block;
        }
        
        .header-subtitle::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, var(--primary-glow), transparent);
        }
        
        /* UPDATED FORM STYLING */
        .input-group-glow {
            border-radius: 12px;
            overflow: hidden;
            background: rgba(15, 23, 42, 0.5);
            border: 1px solid rgba(0, 242, 255, 0.3);
            transition: all 0.3s ease;
        }
        
        .input-group-glow:hover {
            border-color: var(--accent-color);
            box-shadow: 0 0 15px rgba(0, 242, 255, 0.2);
        }
        
        .input-group-text-glow {
            background: rgba(0, 0, 0, 0.3);
            border: none;
            color: var(--accent-color);
            font-size: 1.2rem;
            padding: 0 1.5rem;
        }

        .pilua-logo {
    width: 100px; /* or any size */
    height: 100px;
    border-radius: 50%;
    object-fit: cover;
    background-color: #0a0f1c; /* optional: match site bg */
    box-shadow: 0 0 10px rgba(0, 255, 255, 0.3);
}

    </style>
</head>
<body>
    @include('nav') 
    <!-- Animated Crypto Background -->
    <div class="crypto-bg">
        <lottie-player src="https://assets9.lottiefiles.com/packages/lf20_5tkzkblw.json" background="transparent" speed="0.5" loop autoplay></lottie-player>
    </div>

    <!-- Crypto Ticker -->
   <div class="ticker-container">
    <div class="ticker-wrap" id="crypto-ticker">
        <!-- Dynamic ticker items will be inserted here -->
    </div>
</div>


    <div class="container my-5 py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Header - UPDATED -->
                <div class="text-center mb-5">
                    <div class="ai-icon">
    <img src="{{ asset('1000142684.png') }}" alt="Pilua Logo" class="pilua-logo">
</div>


                    
                    <h1 class="header-title mb-2">PILUA AI</h1>
                    <div class="glass-card p-4 mb-4 glow-border">
                    <form method="POST" action="{{ route('ask.pilua') }}" class="mb-0">
                        @csrf
                        <input type="hidden" name="system_prompt" value="You are Pilua, an AI Crypto Advisor. Always answer in concise, numbered points. Focus on returns, risks, smart crypto moves, and avoid hype. Give a balanced view like an expert trader. Never repeat the question.">
                        
                        <div class="input-group input-group-glow mb-3">
                            <span class="input-group-text input-group-text-glow">
                                <i class="fas fa-search-dollar"></i>
                            </span>
                            <input 
                                type="text" 
                                name="question" 
                                class="form-control input-glow border-0" 
                                placeholder="Ask about market trends, portfolio strategy, or risk analysis..." 
                                required
                                autofocus
                            >
                            <button class="btn btn-neon px-4" type="submit">
                                <i class="fas fa-paper-plane me-2"></i> Analyze
                            </button>
                        </div>
                    </form>
                </div>
                    <p class="header-subtitle">Advanced Crypto Trading Intelligence</p>
                </div>
                
                <!-- Main Card - UPDATED -->
                
                
                <!-- Loading State (hidden by default) -->
                <div id="loadingIndicator" class="text-center py-4" style="display: none;">
                    <div class="spinner-border text-info" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <p class="mt-3 text-muted typing-animation">Pilua is analyzing the markets</p>
                </div>
                
                <!-- Current Response -->
                @isset($answer)
                <div class="glass-card p-4 mb-4">
                    <!-- Question -->
                    <div class="response-card question-card mb-4 p-3" style="animation-delay: 0.1s;">
                        <div class="d-flex align-items-start">
                            <span class="badge bg-dark text-info me-3"><i class="fas fa-question me-1"></i> QUESTION</span>
                            <p class="mb-0">{{ $prompt }}</p>
                        </div>
                    </div>
                    
                    <!-- Answer -->
                    <div class="response-card answer-card p-3" style="animation-delay: 0.3s;">
                        <div class="d-flex align-items-start">
                            <span class="badge bg-dark text-success me-3"><i class="fas fa-robot me-1"></i> PILUA</span>
                            <div>
                                {!! nl2br(e($answer)) !!}
                            </div>
                        </div>
                    </div>
                </div>
                @endisset
                
                <!-- Conversation History -->
                @if(isset($history) && count($history) > 0)
                <div class="glass-card p-4">
                    <h5 class="mb-3 d-flex align-items-center">
                        <i class="fas fa-history me-2 text-info"></i> Conversation History
                    </h5>
                    
                    <div class="history-container">
                        @foreach(array_reverse($history) as $item)
                        <div class="response-card mb-3 p-3 {{ $item['type'] === 'question' ? 'question-card' : 'answer-card' }}" 
                             style="animation-delay: {{ 0.1 + ($loop->index * 0.1) }}s;">
                            <div class="d-flex align-items-start">
                                <span class="badge bg-dark {{ $item['type'] === 'question' ? 'text-info' : 'text-success' }} me-3">
                                    <i class="fas {{ $item['type'] === 'question' ? 'fa-question' : 'fa-robot' }} me-1"></i> 
                                    {{ strtoupper($item['type']) }}
                                </span>
                                <div>
                                    @if($item['type'] === 'answer')
                                        {!! nl2br(e($item['content'])) !!}
                                    @else
                                        {{ $item['content'] }}
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center py-4 text-muted small">
        <div class="container">
            <p class="mb-1">Pilua AI Crypto Advisor v1.0</p>
            <p class="mb-0">Data is not financial advice. Always do your own research.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    

    <script>
    async function loadTicker() {
        try {
            const response = await fetch("https://api.coingecko.com/api/v3/simple/price?ids=bitcoin,ethereum,solana,ripple,cardano,polkadot,avalanche-2,chainlink,polygon,binancecoin&vs_currencies=usd&include_24hr_change=true");
            const data = await response.json();

            const symbolMap = {
                bitcoin: 'BTC',
                ethereum: 'ETH',
                solana: 'SOL',
                ripple: 'XRP',
                cardano: 'ADA',
                polkadot: 'DOT',
                'avalanche-2': 'AVAX',
                chainlink: 'LINK',
                polygon: 'MATIC',
                binancecoin: 'BNB'
            };

            let tickerHTML = '';

            Object.keys(data).forEach((key) => {
                const symbol = symbolMap[key];
                const price = data[key].usd.toFixed(2);
                const change = data[key].usd_24h_change.toFixed(2);
                const up = change >= 0;
                const cssClass = up ? 'up' : 'down';
                tickerHTML += `
                    <div class="ticker-item">
                        <span class="ticker-symbol">${symbol}</span>
                        <span class="ticker-price ${cssClass}">$${price} (${up ? '+' : ''}${change}%)</span>
                    </div>`;
            });

            document.getElementById('crypto-ticker').innerHTML = tickerHTML;

        } catch (error) {
            console.error("Ticker load error:", error);
        }
    }

    loadTicker();
    setInterval(loadTicker, 30000); // Update every 30 seconds
</script>

    <script>




        // Form submission handler
        document.querySelector('form').addEventListener('submit', function() {
            document.getElementById('loadingIndicator').style.display = 'block';
        });
        
        // Simulate ticker updates
        setInterval(() => {
            const prices = document.querySelectorAll('.ticker-price');
            prices.forEach(price => {
                const isUp = price.classList.contains('up');
                const change = (Math.random() * 2).toFixed(2);
                const newPrice = isUp 
                    ? (parseFloat(price.textContent.match(/\d+\.\d+/)[0]) * (1 + Math.random() * 0.01))
                    : (parseFloat(price.textContent.match(/\d+\.\d+/)[0]) * (1 - Math.random() * 0.01));
                
                price.textContent = `$${newPrice.toFixed(2)} (${isUp ? '+' : '-'}${change}%)`;
            });
        }, 5000);
        
        // Animate cards on scroll
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animationPlayState = 'running';
                }
            });
        }, { threshold: 0.1 });
        
        document.querySelectorAll('.response-card').forEach(card => {
            observer.observe(card);
        });
    </script>
</body>
</html>