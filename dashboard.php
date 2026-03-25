<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karargah Paneli | Keşif Merkezi</title>
    <style>
        /* Senin istediğin o şık Glassmorphism tasarımı buraya ekledim */
        body { 
            font-family: 'Segoe UI', sans-serif; 
            background: linear-gradient(135deg, #0f2027, #2c5364); 
            margin: 0; padding: 20px; color: white; min-height: 100vh;
        }
        .dashboard-container { max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: 1fr 2fr; gap: 20px; }
        .card { 
            background: rgba(255, 255, 255, 0.1); 
            backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px);
            border-radius: 25px; padding: 25px; 
            border: 1px solid rgba(255, 255, 255, 0.2); 
            box-shadow: 0 8px 32px rgba(0,0,0,0.3);
        }
        h3 { margin-top: 0; color: #00f2fe; border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 10px; }
        .stat-box { display: flex; justify-content: space-between; padding: 12px 0; border-bottom: 1px solid rgba(255,255,255,0.05); }
        .economy-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-top: 20px; }
        .economy-item { background: rgba(255,255,255,0.05); padding: 15px; border-radius: 15px; text-align: center; border: 1px solid rgba(255,255,255,0.1); }
        .economy-item span { display: block; font-size: 11px; color: #ced4da; margin-bottom: 5px; }
        .economy-item strong { font-size: 20px; color: #fccb90; }
        .pedagog-note { font-style: italic; color: #e0f2f1; font-size: 13px; margin-top: 25px; border-left: 3px solid #00f2fe; padding-left: 15px; line-height: 1.4; }
        
        /* Video Alanı Temsili */
        .video-placeholder { 
            background: rgba(0,0,0,0.3); height: 200px; border-radius: 20px; 
            display: flex; align-items: center; justify-content: center; border: 2px dashed rgba(255,255,255,0.2);
        }

        @media (max-width: 768px) { .dashboard-container { grid-template-columns: 1fr; } }
    </style>
</head>
<body>

    <div class="dashboard-container">
        <div class="card">
            <h3>Kişisel Kumbaram</h3>
            <div class="stat-box">
                <span>Bilgi Puanı (XP):</span>
                <strong id="xp-val">1250</strong>
            </div>
            <div class="stat-box">
                <span>Birikmiş PUL:</span>
                <strong id="pul-val">45</strong>
            </div>

            <div class="economy-grid" id="money-distribution">
                </div>

            <div class="pedagog-note">
                "Her bir XP ve PUL, senin merakının ve azminin bir yansıması. Gelişimini izlemek bizi çok mutlu ediyor."
            </div>
        </div>

        <div class="card">
            <h3>Güvenli Keşif Alanı</h3>
            <p style="font-size: 14px; opacity: 0.8;">Bugün kiminle yeni bilgiler paylaşmak istersin? Güvenli hattımız senin için hazırlandı.</p>

            <div class="video-placeholder" id="video-area">
                <button onclick="startCall()" style="padding: 15px 30px; border-radius: 50px; border: none; background: #00f2fe; color: #0f2027; font-weight: bold; cursor: pointer;">
                    Bağlantıyı Başlat
                </button>
            </div>

            <div class="pedagog-note">
                "Burada paylaştığın her şey senin ve arkadaşının arasında. Biz sadece senin güvenliğini sağlıyoruz."
            </div>
        </div>
    </div>

    <script>
        // Ekonomi Mantığı (JS Versiyonu)
        const userStats = {
            xp: 1250,
            pul: 45,
            distribution: {
                "100 PUL (Kağıt)": 10,
                "50 PUL (Kağıt)": 4,
                "20 PUL (Kağıt)": 2,
                "5 PUL (Madeni)": 1
            }
        };

        // Verileri Ekrana Bas
        document.getElementById('xp-val').innerText = userStats.xp;
        document.getElementById('pul-val').innerText = userStats.pul;

        const distContainer = document.getElementById('money-distribution');
        for (const [label, count] of Object.entries(userStats.distribution)) {
            distContainer.innerHTML += `
                <div class="economy-item">
                    <span>${label}</span>
                    <strong>${count} Adet</strong>
                </div>
            `;
        }

        function startCall() {
            document.getElementById('video-area').innerHTML = "<p style='color:#00f2fe; font-weight:bold;'>Güvenli Hat Bağlanıyor... ✨</p>";
            setTimeout(() => {
                alert("Görüşme güvenli bir şekilde başladı. İyi keşifler!");
            }, 1000);
        }
    </script>
</body>
</html>
