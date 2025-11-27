add_action( 'astra_header_before', 'custom_top_bar' );
function custom_top_bar() {
    ?>
    <div id="bf-top-bar">
        <div class="bf-marquee">
            <span>✨ Black Friday Glow Event: 15% OFF all products + FREE shipping on orders $175+ ✨</span>
        </div>

        <div class="bf-bottom-row">
            <div class="bf-offer-text">
                <span class="bf-tagline">Limited-time event • Online + in-studio favorites</span>
            </div>

            <div class="bf-countdown-wrapper">
                <span class="bf-countdown-label">Sale ends in</span>
                <div id="bf-countdown">
                    <div class="bf-time-section">
                        <span class="bf-time-number" id="bf-days">00</span>
                        <span class="bf-time-label">Days</span>
                    </div>
                    <div class="bf-time-section">
                        <span class="bf-time-number" id="bf-hours">00</span>
                        <span class="bf-time-label">Hours</span>
                    </div>
                    <div class="bf-time-section">
                        <span class="bf-time-number" id="bf-minutes">00</span>
                        <span class="bf-time-label">Minutes</span>
                    </div>
                    <div class="bf-time-section">
                        <span class="bf-time-number" id="bf-seconds">00</span>
                        <span class="bf-time-label">Seconds</span>
                    </div>
                </div>
            </div>

            <a href="https://skinbylauralo.com/booking/" id="bf-specials-button">
                Shop the Black Friday Sale
            </a>
        </div>
    </div>

    <style>
        #bf-top-bar {
            background: #000;
            color: #fff;
            padding: 10px 16px 14px;
            font-family: "Helvetica Neue", Arial, sans-serif;
            font-size: 14px;
            position: relative;
            z-index: 9999;
            box-shadow: 0 2px 10px rgba(0,0,0,0.35);
        }

        .bf-marquee {
            overflow: hidden;
            white-space: nowrap;
            border-bottom: 1px solid rgba(255,255,255,0.15);
            padding-bottom: 4px;
            margin-bottom: 8px;
        }

        .bf-marquee span {
            display: inline-block;
            padding-left: 100%;
            animation: bf-marquee 18s linear infinite;
            font-weight: 600;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            font-size: 13px;
        }

        @keyframes bf-marquee {
            0%   { transform: translateX(0%); }
            100% { transform: translateX(-100%); }
        }

        .bf-bottom-row {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px 20px;
        }

        .bf-offer-text {
            color: #f5f5f5;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }

        .bf-countdown-wrapper {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .bf-countdown-label {
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            opacity: 0.8;
        }

        #bf-countdown {
            display: flex;
            align-items: center;
            gap: 6px;
            color: #fff;
            font-weight: 600;
        }

        .bf-time-section {
            text-align: center;
            min-width: 44px;
        }

        .bf-time-number {
            display: block;
            font-size: 16px;
            padding: 4px 8px;
            border-radius: 6px;
            background: linear-gradient(135deg, #ff3b3b, #ff6b6b);
            color: #fff;
            line-height: 1.2;
        }

        .bf-time-label {
            font-size: 10px;
            margin-top: 2px;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            opacity: 0.8;
        }

        #bf-specials-button {
            display: inline-block;
            padding: 9px 18px;
            background: linear-gradient(135deg, #ffffff, #f3f3f3);
            color: #000;
            text-decoration: none;
            border-radius: 999px;
            font-weight: 600;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            border: 1px solid #fff;
            transition: transform 0.3s ease, box-shadow 0.3s ease, background 0.3s ease, color 0.3s ease;
            white-space: nowrap;
        }

        #bf-specials-button:hover {
            background: #ff3b3b;
            color: #fff;
            border-color: #ff3b3b;
            box-shadow: 0 4px 14px rgba(0,0,0,0.4);
            transform: translateY(-1px);
        }

        @media (max-width: 768px) {
            .bf-marquee span {
                font-size: 12px;
            }
            .bf-bottom-row {
                flex-direction: column;
            }
            .bf-countdown-wrapper {
                order: 2;
            }
            #bf-specials-button {
                order: 3;
                width: 100%;
                text-align: center;
            }
        }

        @media (max-width: 480px) {
            #bf-top-bar {
                padding: 8px 10px 10px;
            }
            .bf-time-number {
                font-size: 14px;
            }
            .bf-time-section {
                min-width: 38px;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // TODO: Update this date to match when you want the sale to end.
            var targetDate = new Date('Dec 01, 2025 23:59:59').getTime();

            var daysElement = document.getElementById('bf-days');
            var hoursElement = document.getElementById('bf-hours');
            var minutesElement = document.getElementById('bf-minutes');
            var secondsElement = document.getElementById('bf-seconds');
            var countdownContainer = document.getElementById('bf-countdown');
            var label = document.querySelector('.bf-countdown-label');

            function updateCountdown() {
                var now = new Date().getTime();
                var distance = targetDate - now;

                if (distance <= 0) {
                    clearInterval(countdownInterval);
                    if (countdownContainer && label) {
                        label.textContent = '';
                        countdownContainer.innerHTML = '🔥 Black Friday sale has ended – stay tuned for our next event.';
                    }
                    return;
                }

                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                daysElement.textContent = days.toString().padStart(2, '0');
                hoursElement.textContent = hours.toString().padStart(2, '0');
                minutesElement.textContent = minutes.toString().padStart(2, '0');
                secondsElement.textContent = seconds.toString().padStart(2, '0');
            }

            updateCountdown();
            var countdownInterval = setInterval(updateCountdown, 1000);
        });
    </script>
    <?php
}
