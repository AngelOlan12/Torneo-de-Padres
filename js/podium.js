document.addEventListener('DOMContentLoaded', function() {
    // Scroll animations
    const scrollElements = document.querySelectorAll('.scroll-animation');
    
    const elementInView = (el, dividend = 1) => {
        const elementTop = el.getBoundingClientRect().top;
        return (elementTop <= (window.innerHeight || document.documentElement.clientHeight) / dividend);
    };
    
    const displayScrollElement = (element) => {
        element.classList.add('active');
    };
    
    const handleScrollAnimation = () => {
        scrollElements.forEach((el) => {
            if (elementInView(el, 1.25)) {
                displayScrollElement(el);
            }
        });
    };
    
    // Initialize on load
    handleScrollAnimation();
    
    // Add scroll event listener
    window.addEventListener('scroll', () => {
        handleScrollAnimation();
    });
    
    // Confetti effect for first place
    const canvas = document.getElementById('confetti-futbol');
    if (canvas) {
        const ctx = canvas.getContext('2d');
        let confettiAnimation;
        const particles = [];
        const particleCount = 100;
        
        // Resize canvas
        function resizeCanvas() {
            const container = canvas.parentElement;
            canvas.width = container.offsetWidth;
            canvas.height = container.offsetHeight;
        }
        
        window.addEventListener('resize', resizeCanvas);
        resizeCanvas();
        
        // Create particles
        function createParticles() {
            for (let i = 0; i < particleCount; i++) {
                particles.push({
                    x: Math.random() * canvas.width,
                    y: Math.random() * canvas.height - canvas.height,
                    size: Math.random() * 5 + 3,
                    color: `hsl(${Math.random() * 60 + 10}, 100%, 50%)`,
                    rotation: Math.random() * 360,
                    speed: Math.random() * 2 + 1,
                    rotationSpeed: Math.random() * 2 - 1,
                    oscillationSpeed: Math.random() * 0.5 + 0.5,
                    oscillationDistance: Math.random() * 40 + 20
                });
            }
        }
        
        // Animate confetti
        function animateConfetti() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            
            let stillActive = false;
            for (let i = 0; i < particles.length; i++) {
                const p = particles[i];
                ctx.save();
                ctx.translate(p.x, p.y);
                ctx.rotate(p.rotation * Math.PI / 180);
                ctx.fillStyle = p.color;
                ctx.fillRect(-p.size / 2, -p.size / 2, p.size, p.size);
                ctx.restore();
                
                p.y += p.speed;
                p.x += Math.sin(p.y * p.oscillationSpeed) * p.oscillationDistance;
                p.rotation += p.rotationSpeed;
                
                if (p.y < canvas.height) {
                    stillActive = true;
                }
            }
            
            if (stillActive) {
                confettiAnimation = requestAnimationFrame(animateConfetti);
            }
        }
        
        // Start confetti when first place is visible
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    createParticles();
                    animateConfetti();
                    observer.disconnect();
                }
            });
        }, { threshold: 0.5 });
        
        const firstPlace = document.querySelector('.position-1');
        if (firstPlace) {
            observer.observe(firstPlace);
        }
    }
});
