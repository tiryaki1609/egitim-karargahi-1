<?php
/**
 * Dashboard Modülü - Karargah Merkezi
 */

require_once 'economy.php';
require_once 'security.php';

$economy = new Economy(150, 456); // Başlangıç XP ve PUL
$security = new SecurityModule();

?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karargah Paneli | Keşif Merkezi</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f0f4f8; margin: 0; padding: 20px; color: #333; }
        .dashboard-container { max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: 1fr 2fr; gap: 20px; }
        .card { background: white; border-radius: 20px; padding: 25px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); border: 1px solid #e1e8ed; }
        .card h3 { margin-top: 0; color: #1e3c72; }
        .stat-box { display: flex; justify-content: space-between; padding: 10px 0; border-bottom: 1px solid #eee; }
        .stat-box:last-child { border-bottom: none; }
        .economy-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-top: 15px; }
        .economy-item { background: #f8fafc; padding: 10px; border-radius: 10px; text-align: center; }
        .economy-item span { display: block; font-size: 12px; color: #64748b; }
        .economy-item strong { font-size: 18px; color: #1e3c72; }
        .btn-call { background: #4facfe; color: white; border: none; padding: 15px; border-radius: 15px; font-weight: bold; cursor: pointer; width: 100%; transition: transform 0.2s; }
        .btn-call:hover { transform: translateY(-2px); }
        .pedagog-note { font-style: italic; color: #666; font-size: 14px; margin-top: 20px; border-left: 4px solid #4facfe; padding-left: 15px; }
    </style>
</head>
<body>

    <div class="dashboard-container">

        <!-- Ekonomi Paneli -->
        <div class="card">
            <h3>Kişisel Kumbaram</h3>
            <div class="stat-box">
                <span>Bilgi Puanı (XP):</span>
                <strong><?php echo $economy->getXP(); ?></strong>
            </div>
            <div class="stat-box">
                <span>Birikmiş PUL:</span>
                <strong><?php echo $economy->getPUL(); ?></strong>
            </div>

            <div class="economy-grid">
                <?php foreach ($economy->getPULDistribution() as $label => $count): ?>
                    <div class="economy-item">
                        <span><?php echo $label; ?></span>
                        <strong><?php echo $count; ?></strong>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="pedagog-note">
                "Her bir XP ve PUL, senin merakının ve azminin bir yansıması. Gelişimini izlemek bizi çok mutlu ediyor."
            </div>
        </div>

        <!-- Video Görüşme ve Güvenlik -->
        <div class="card">
            <h3>Güvenli Keşif Alanı</h3>
            <p>Bugün kiminle yeni bilgiler paylaşmak istersin? Güvenli hattımız senin için hazırlandı.</p>

            <div id="video-interface-wrapper">
                <?php renderVideoCallUI(); ?>
            </div>

            <div class="pedagog-note" style="margin-top: 30px;">
                "Burada paylaştığın her şey, senin ve karşındaki arkadaşının arasında. Biz sadece senin güvenliğini sağlıyoruz."
            </div>
        </div>

    </div>

    <script src="star_dust.js"></script>
    <script>
        function toggleMic() {
            const btn = document.getElementById('mic-btn');
            btn.classList.toggle('mic-active');
            if (btn.classList.contains('mic-active')) {
                btn.textContent = "Mikrofon Açık";
            } else {
                btn.textContent = "Mikrofon Kapalı";
            }
        }

        function endCall() {
            if(confirm("Görüşmeyi bitirmek ve tüm izleri 'Yıldız Tozu' ile silmek ister misin?")) {
                startStarDust();
                document.getElementById('video-stream').innerHTML = "<p>Görüşme başarıyla tamamlandı. İzler siliniyor...</p>";
            }
        }
    </script>
</body>
</html>
