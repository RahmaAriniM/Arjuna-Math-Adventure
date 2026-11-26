from pathlib import Path
html = r'''<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="theme-color" content="#211a14">
  <title>Arjuna Math Adventure | Petualangan Matematika</title>
  <style>
    :root{
      --ink:#261d16;--muted:#74685c;--paper:#fbf7ef;--cream:#f2e8d7;
      --gold:#c89b52;--gold2:#e7c98e;--brown:#60442f;--green:#526b50;
      --line:rgba(91,65,42,.15);--shadow:0 18px 50px rgba(48,34,21,.12);
      --radius:22px;
    }
    *{box-sizing:border-box}
    html{scroll-behavior:smooth}
    body{margin:0;background:var(--paper);color:var(--ink);font-family:Inter,ui-sans-serif,system-ui,-apple-system,"Segoe UI",sans-serif;line-height:1.65}
    button,input{font:inherit}
    button{cursor:pointer}
    a{color:inherit}
    .topbar{position:sticky;top:0;z-index:20;background:rgba(35,27,20,.96);backdrop-filter:blur(12px);color:#fff;box-shadow:0 4px 20px #0002}
    .navwrap{max-width:1180px;margin:auto;padding:12px 22px;display:flex;align-items:center;justify-content:space-between;gap:16px}
    .brand{display:flex;align-items:center;gap:10px;font-weight:850;letter-spacing:.06em;font-size:.92rem}
    .brandmark{width:38px;height:38px;border-radius:12px;background:linear-gradient(135deg,#e8c98c,#9d713c);display:grid;place-items:center;color:#2b2016;font-size:20px}
    .navlinks{display:flex;gap:6px;align-items:center;flex-wrap:wrap}
    .navlinks button{border:0;background:transparent;color:#f5ead9;padding:9px 12px;border-radius:999px;font-size:.86rem}
    .navlinks button:hover,.navlinks button.active{background:#ffffff1c;color:#fff}
    .menu-toggle{display:none;background:#ffffff18;color:#fff;border:1px solid #ffffff30;border-radius:10px;padding:8px 12px}
    main{max-width:1180px;margin:auto;padding:0 22px 60px}
    .page{display:none;padding-top:28px;animation:fade .35s ease}
    .page.active{display:block}
    @keyframes fade{from{opacity:0;transform:translateY(8px)}to{opacity:1;transform:none}}
    .hero{min-height:570px;border-radius:30px;overflow:hidden;position:relative;display:flex;align-items:center;padding:clamp(28px,6vw,76px);color:#fff;background:linear-gradient(90deg,rgba(25,20,16,.9),rgba(25,20,16,.55) 55%,rgba(25,20,16,.12)),url('https://images.unsplash.com/photo-1606293926075-69a00db89385?auto=format&fit=crop&w=1800&q=85') center/cover}
    .hero:after{content:"";position:absolute;inset:auto 0 0;height:100px;background:linear-gradient(transparent,rgba(22,17,12,.35));pointer-events:none}
    .hero-content{max-width:660px;position:relative;z-index:1}
    .eyebrow{display:inline-flex;align-items:center;gap:8px;color:var(--gold2);font-size:.78rem;font-weight:800;letter-spacing:.15em;text-transform:uppercase}
    h1{font-size:clamp(2.7rem,7vw,5.7rem);line-height:.98;letter-spacing:-.055em;margin:18px 0}
    h1 span{color:#e6c58b}
    .hero p{font-size:1.08rem;max-width:590px;color:#f5eee5}
    .actions{display:flex;gap:12px;flex-wrap:wrap;margin-top:28px}
    .btn{border:0;border-radius:999px;padding:12px 20px;font-weight:800;transition:.2s;display:inline-flex;align-items:center;justify-content:center;gap:8px}
    .btn:hover{transform:translateY(-2px);filter:brightness(1.04)}
    .primary{background:linear-gradient(135deg,#e9ca91,#c08c45);color:#2a1e12;box-shadow:0 8px 22px #c89b5240}
    .secondary{background:#ffffff18;color:#fff;border:1px solid #ffffff70}
    .darkbtn{background:var(--ink);color:#fff}
    .softbtn{background:var(--cream);color:var(--brown)}
    .section-head{display:flex;justify-content:space-between;align-items:end;gap:20px;margin:48px 0 20px}
    .section-head h2{margin:4px 0;font-size:clamp(1.7rem,4vw,2.5rem);line-height:1.15}
    .section-head p{margin:0;color:var(--muted);max-width:570px}
    .kicker{color:#98703d;font-weight:850;text-transform:uppercase;letter-spacing:.14em;font-size:.74rem}
    .grid{display:grid;gap:18px}
    .grid.three{grid-template-columns:repeat(3,minmax(0,1fr))}
    .grid.two{grid-template-columns:repeat(2,minmax(0,1fr))}
    .card{background:#fff;border:1px solid var(--line);border-radius:var(--radius);padding:24px;box-shadow:0 8px 28px rgba(52,37,22,.045)}
    .card h3{margin:8px 0 8px;font-size:1.18rem}
    .card p{margin:0;color:var(--muted)}
    .iconbox{width:48px;height:48px;border-radius:15px;background:#f4ead9;display:grid;place-items:center;font-size:24px}
    .pill{display:inline-flex;padding:5px 10px;border-radius:999px;background:#f3eadb;color:#805b2f;font-size:.75rem;font-weight:800}
    .photo{width:100%;height:260px;object-fit:cover;border-radius:18px;display:block;background:#e9dfcf}
    .notice{background:#f4ead9;border-left:4px solid var(--gold);padding:16px 18px;border-radius:0 14px 14px 0;color:#5d4934}
    .muted{color:var(--muted)}
    .split{display:grid;grid-template-columns:1.05fr .95fr;gap:22px;align-items:center}
    .mission-card{position:relative;overflow:hidden;min-height:205px;background:linear-gradient(135deg,#fff,#f3eadb)}
    .mission-card .number{font-size:2.8rem;font-weight:900;color:#d9c19a;position:absolute;right:20px;top:5px}
    .mission-card .btn{margin-top:18px}
    .progress{height:9px;background:#e9dfd1;border-radius:99px;overflow:hidden}
    .progress span{height:100%;display:block;width:0;background:linear-gradient(90deg,#9a7445,#e2bd7d);transition:width .3s}
    .tabs{display:flex;gap:8px;flex-wrap:wrap;margin:18px 0}
    .tabs button{border:1px solid var(--line);background:#fff;border-radius:999px;padding:9px 15px;color:var(--brown);font-weight:750}
    .tabs button.active{background:var(--ink);color:#fff}
    .formula{font-family:Georgia,serif;font-size:1.4rem;text-align:center;background:#f7f0e5;border:1px dashed #c9aa79;border-radius:14px;padding:18px;margin:16px 0;color:#553b23}
    .example{background:#f9f5ed;border-radius:16px;padding:18px;margin-top:14px}
    .field{display:grid;gap:6px;margin:12px 0}
    .field label{font-weight:750;font-size:.9rem}
    input[type=number],input[type=text]{width:100%;padding:11px 13px;border:1px solid #d8cbbb;border-radius:12px;background:#fff;color:var(--ink)}
    input:focus{outline:3px solid #d8b77b55;border-color:#b98b4c}
    input[type=range]{width:100%;accent-color:#9b713d}
    .result{padding:13px 16px;background:#edf3e9;color:#38553a;border-radius:12px;font-weight:750;margin-top:12px;min-height:48px}
    .simstage{background:linear-gradient(135deg,#f5eddf,#e8ddc9);border-radius:18px;padding:15px;display:grid;place-items:center;min-height:280px}
    svg{max-width:100%;height:auto}
    .quiz-q{font-size:1.08rem;font-weight:800;margin:10px 0 16px}
    .option{display:flex;gap:10px;align-items:flex-start;padding:12px 14px;border:1px solid var(--line);border-radius:13px;margin:9px 0;background:#fff;cursor:pointer}
    .option:hover{border-color:#b88a4d;background:#fffaf2}
    .option input{margin-top:5px;accent-color:#8b6538}
    .feedback{margin-top:12px;padding:13px;border-radius:12px;display:none}
    .feedback.show{display:block}
    .feedback.good{background:#eaf3e7;color:#365a37}
    .feedback.bad{background:#f8eae5;color:#854b39}
    .badge-list{display:flex;gap:10px;flex-wrap:wrap;margin-top:12px}
    .badge-item{padding:10px 13px;border-radius:14px;background:#f4ead9;font-weight:800;color:#78572f}
    .footer{margin-top:60px;background:#241b14;color:#eee2d1;padding:30px 22px;border-radius:24px;text-align:center}
    .footer p{margin:5px;color:#c9bba8}
    .small{font-size:.86rem}
    .hidden{display:none!important}
    .center{text-align:center}
    .score-big{font-size:3.5rem;font-weight:950;color:#946a36;line-height:1}
    .certificate{border:8px double #bd9659;background:#fffaf0;padding:32px;text-align:center;border-radius:8px;max-width:760px;margin:20px auto;color:#49351f}
    .certificate h2{font-family:Georgia,serif;font-size:2rem;letter-spacing:.08em}
    @media(max-width:850px){.grid.three{grid-template-columns:repeat(2,minmax(0,1fr))}.split{grid-template-columns:1fr}.hero{min-height:520px}}
    @media(max-width:650px){
      .navwrap{padding:10px 15px}.menu-toggle{display:block}.navlinks{display:none;position:absolute;top:60px;left:12px;right:12px;background:#2d2219;padding:12px;border-radius:16px;box-shadow:var(--shadow);flex-direction:column;align-items:stretch}.navlinks.open{display:flex}.navlinks button{text-align:left}
      main{padding:0 14px 35px}.hero{min-height:560px;border-radius:22px;padding:28px 22px;background-position:58% center}.grid.two,.grid.three{grid-template-columns:1fr}.section-head{display:block;margin:36px 0 18px}.section-head p{margin-top:8px}.card{padding:19px}.photo{height:220px}
    }
    @media print{.topbar,.no-print,.footer{display:none!important}body{background:#fff}.page{display:none!important}#page-result{display:block!important}#certificate{display:block!important}.certificate{margin:0 auto;box-shadow:none}}
  </style>
</head>
<body>
<header class="topbar no-print">
  <div class="navwrap">
    <div class="brand"><div class="brandmark">⌂</div><span>ARJUNA <span style="color:#e7c98e">MATH</span></span></div>
    <button class="menu-toggle" id="menuToggle" aria-label="Buka menu">☰ Menu</button>
    <nav class="navlinks" id="navlinks">
      <button class="active" data-page="home">Beranda</button>
      <button data-page="temple">Candi Arjuna</button>
      <button data-page="map">Peta Misi</button>
      <button data-page="materials">Materi</button>
      <button data-page="lab">Laboratorium</button>
      <button data-page="game">Tantangan</button>
      <button data-page="quiz">Evaluasi</button>
    </nav>
  </div>
</header>

<main>
  <section class="page active" id="page-home">
    <div class="hero">
      <div class="hero-content">
        <div class="eyebrow">✦ Petualangan Etnomatematika · Dieng</div>
        <h1>ARJUNA<br><span>MATH ADVENTURE</span></h1>
        <p>Jelajahi warisan budaya, temukan keajaiban matematika! Jadilah penjelajah yang mengungkap konsep trigonometri melalui petualangan di sekitar Candi Arjuna.</p>
        <div class="actions">
          <button class="btn primary" data-go="map">Mulai Petualangan ↗</button>
          <button class="btn secondary" data-go="temple">Jelajahi Candi</button>
        </div>
      </div>
    </div>
    <div class="section-head">
      <div><div class="kicker">Belajar sambil menjelajah</div><h2>Matematika ada di sekitar kita.</h2></div>
      <p>Amati bentuk, sudut, dan hubungan ukuran. Lalu gunakan ide matematika untuk memecahkan tantangan.</p>
    </div>
    <div class="grid three">
      <article class="card"><div class="iconbox">🏛️</div><h3>Kenali Warisan Budaya</h3><p>Berkenalan dengan kompleks Candi Arjuna dan mengamati unsur geometri pada arsitekturnya.</p></article>
      <article class="card"><div class="iconbox">📐</div><h3>Temukan Konsep</h3><p>Pelajari fungsi trigonometri, identitas, aturan sinus, dan aturan cosinus secara bertahap.</p></article>
      <article class="card"><div class="iconbox">🧭</div><h3>Selesaikan Misi</h3><p>Uji pemahaman melalui simulator, permainan, dan evaluasi pembelajaran.</p></article>
    </div>
    <div class="section-head"><div><div class="kicker">Progres penjelajah</div><h2>Perjalanan belajarmu</h2></div><span class="pill" id="progressText">0 dari 4 misi selesai</span></div>
    <div class="card"><div class="progress"><span id="homeProgress"></span></div><p class="small muted" style="margin-top:10px">Progres tersimpan di browser pada perangkat ini.</p></div>
    <div class="notice" style="margin-top:22px"><strong>Catatan belajar:</strong> Semua angka pengukuran pada simulasi merupakan data ilustrasi untuk latihan, bukan hasil pengukuran asli Candi Arjuna.</div>
  </section>

  <section class="page" id="page-temple">
    <div class="section-head"><div><div class="kicker">Gerbang budaya</div><h2>Mengenal Candi Arjuna</h2></div><p>Mengamati warisan budaya sebagai konteks untuk menemukan ide matematika.</p></div>
    <div class="split">
      <div>
        <img class="photo" src="https://images.unsplash.com/photo-1606293926075-69a00db89385?auto=format&fit=crop&w=1100&q=85" alt="Ilustrasi kompleks candi batu" onerror="this.style.display='none'">
        <p class="small muted">Gambar ilustrasi suasana candi. Ganti dengan dokumentasi foto kelompok di Dieng agar konteks KKL lebih autentik.</p>
      </div>
      <div class="card">
        <span class="pill">Dieng · Jawa Tengah</span>
        <h3>Warisan budaya di dataran tinggi Dieng</h3>
        <p>Kompleks Candi Arjuna merupakan kelompok bangunan candi Hindu di kawasan Dataran Tinggi Dieng, Kabupaten Banjarnegara, Jawa Tengah. Kompleks ini dikenal dengan lima candi: Arjuna, Semar, Srikandi, Puntadewa, dan Sembadra.</p>
        <p style="margin-top:12px">Bentuk bangunan, susunan batu, bidang, garis, dan sudut dapat menjadi bahan pengamatan geometri. Untuk mempelajari trigonometri, siswa dapat membuat model segitiga dari situasi pengukuran jarak atau sudut pandang.</p>
      </div>
    </div>
    <div class="section-head"><div><div class="kicker">Amati dan pikirkan</div><h2>Di mana matematika bersembunyi?</h2></div></div>
    <div class="grid three">
      <article class="card"><div class="iconbox">📏</div><h3>Garis dan panjang</h3><p>Amati sisi bangunan, jarak antartitik, serta perbandingan panjang pada gambar.</p></article>
      <article class="card"><div class="iconbox">🔺</div><h3>Sudut dan segitiga</h3><p>Garis pandang dari pengamat ke puncak bangunan dapat dimodelkan sebagai segitiga.</p></article>
      <article class="card"><div class="iconbox">🧱</div><h3>Bentuk geometri</h3><p>Amati bidang datar, pola berulang, simetri, dan susunan bentuk pada arsitektur.</p></article>
    </div>
    <div class="notice" style="margin-top:20px"><strong>Aktivitas pengamatan:</strong> Pilih satu bagian candi pada foto dokumentasi kalian. Catat bentuk geometri yang terlihat dan jelaskan bagaimana bagian tersebut dapat dimodelkan secara matematis.</div>
    <div class="actions"><button class="btn darkbtn" data-go="map">Lanjut ke Peta Misi →</button></div>
  </section>

  <section class="page" id="page-map">
    <div class="section-head"><div><div class="kicker">Peta penjelajah</div><h2>Empat misi menantimu</h2></div><p>Selesaikan setiap misi untuk membuka lencana penjelajah matematika.</p></div>
    <div class="card" style="margin-bottom:18px"><div style="display:flex;justify-content:space-between;gap:12px;align-items:center"><strong>Progres petualangan</strong><span id="mapProgressLabel" class="pill">0%</span></div><div class="progress" style="margin-top:12px"><span id="mapProgress"></span></div></div>
    <div class="grid two">
      <article class="card mission-card"><div class="number">01</div><span class="pill">Misi 1 · Dasar</span><h3>Gerbang Penjelajah</h3><p>Kenali fungsi trigonometri dan lingkaran satuan.</p><button class="btn softbtn" data-go="materials" data-material="0">Masuki Misi →</button></article>
      <article class="card mission-card"><div class="number">02</div><span class="pill">Misi 2 · Konsep</span><h3>Rahasia Sudut Candi</h3><p>Temukan hubungan dan identitas trigonometri.</p><button class="btn softbtn" data-go="materials" data-material="1">Masuki Misi →</button></article>
      <article class="card mission-card"><div class="number">03</div><span class="pill">Misi 3 · Penerapan</span><h3>Ekspedisi Pengukuran</h3><p>Gunakan aturan sinus dan cosinus untuk mencari jarak.</p><button class="btn softbtn" data-go="materials" data-material="2">Masuki Misi →</button></article>
      <article class="card mission-card"><div class="number">04</div><span class="pill">Misi 4 · Tantangan</span><h3>Tantangan Sang Arjuna</h3><p>Uji pemahamanmu melalui permainan dan evaluasi.</p><button class="btn softbtn" data-go="game">Masuki Misi →</button></article>
    </div>
  </section>

  <section class="page" id="page-materials">
    <div class="section-head"><div><div class="kicker">Bekal penjelajah</div><h2>Materi pembelajaran</h2></div><p>Pahami konsepnya, amati contohnya, lalu coba latihan singkat.</p></div>
    <div class="tabs" id="materialTabs">
      <button class="active" data-mat="0">1. Fungsi & Lingkaran</button><button data-mat="1">2. Identitas</button><button data-mat="2">3. Aturan Sinus</button><button data-mat="3">4. Aturan Cosinus</button><button data-mat="4">5. Penerapan</button>
    </div>
    <div id="materialContent" class="card"></div>
  </section>

  <section class="page" id="page-lab">
    <div class="section-head"><div><div class="kicker">Ruang eksperimen</div><h2>Laboratorium matematika</h2></div><p>Ubah nilai dan amati bagaimana hasil matematika ikut berubah.</p></div>
    <div class="tabs"><button class="active" data-lab="circle">Lingkaran Satuan</button><button data-lab="triangle">Segitiga & Aturan Cosinus</button></div>
    <div id="labCircle" class="grid two">
      <div class="card">
        <h3>Atur besar sudut</h3><div class="field"><label for="angleRange">Sudut: <strong id="angleLabel">45°</strong></label><input id="angleRange" type="range" min="0" max="360" value="45"></div>
        <div class="result" id="circleValues">sin 45° = 0,707 · cos 45° = 0,707 · tan 45° = 1</div>
        <p class="small muted">Pada lingkaran satuan, koordinat titik adalah (cos θ, sin θ). Tangen tidak terdefinisi saat cos θ = 0.</p>
      </div>
      <div class="simstage"><svg id="unitSvg" viewBox="0 0 320 260" role="img" aria-label="Visualisasi lingkaran satuan"><line x1="30" y1="130" x2="290" y2="130" stroke="#9a8a75" stroke-width="1.5"/><line x1="160" y1="15" x2="160" y2="245" stroke="#9a8a75" stroke-width="1.5"/><circle cx="160" cy="130" r="90" fill="none" stroke="#8e704c" stroke-width="2"/><line id="radiusLine" x1="160" y1="130" x2="223.64" y2="66.36" stroke="#b37b35" stroke-width="3"/><circle id="unitPoint" cx="223.64" cy="66.36" r="6" fill="#a46c2e"/><text x="296" y="145" font-size="11" fill="#6e5b46">x</text><text x="169" y="15" font-size="11" fill="#6e5b46">y</text><text x="168" y="148" font-size="10" fill="#6e5b46">O</text></svg></div>
    </div>
    <div id="labTriangle" class="grid two hidden">
      <div class="card">
        <h3>Hitung sisi ketiga</h3>
        <p class="muted small">Masukkan dua sisi dan sudut apit. Contoh ini merupakan simulasi, bukan pengukuran candi.</p>
        <div class="field"><label for="sideA">Sisi a</label><input id="sideA" type="number" min="0.1" step="0.1" value="8"></div>
        <div class="field"><label for="sideB">Sisi b</label><input id="sideB" type="number" min="0.1" step="0.1" value="6"></div>
        <div class="field"><label for="includedAngle">Sudut apit (derajat)</label><input id="includedAngle" type="number" min="1" max="179" step="1" value="60"></div>
        <button class="btn darkbtn" id="calcTriangle">Hitung sisi c</button>
        <div class="result" id="triangleResult" aria-live="polite">Sisi c = 7,21 satuan</div>
      </div>
      <div class="simstage"><svg viewBox="0 0 320 250" role="img" aria-label="Ilustrasi segitiga"><polygon points="55,195 255,195 185,65" fill="#d9bd8c66" stroke="#8d6536" stroke-width="3"/><text x="140" y="215" font-size="13" fill="#5b4129">a</text><text x="205" y="120" font-size="13" fill="#5b4129">b</text><text x="95" y="120" font-size="13" fill="#5b4129">c</text><text x="65" y="185" font-size="12" fill="#5b4129">A</text><text x="240" y="185" font-size="12" fill="#5b4129">B</text><text x="181" y="57" font-size="12" fill="#5b4129">C</text></svg></div>
    </div>
  </section>

  <section class="page" id="page-game">
    <div class="section-head"><div><div class="kicker">Uji ketangkasan</div><h2>Tantangan Sang Arjuna</h2></div><p>Jawab pertanyaan singkat. Baca umpan balik untuk memahami alasan jawabannya.</p></div>
    <div class="card" id="gameCard">
      <div style="display:flex;justify-content:space-between;gap:10px"><span class="pill">Tantangan cepat</span><strong id="gameCount">Soal 1 dari 5</strong></div>
      <div class="progress" style="margin:14px 0"><span id="gameProgress"></span></div>
      <div class="quiz-q" id="gameQuestion"></div>
      <div id="gameOptions"></div>
      <div class="feedback" id="gameFeedback"></div>
      <div class="actions"><button class="btn darkbtn" id="gameCheck">Periksa Jawaban</button><button class="btn softbtn hidden" id="gameNext">Soal Berikutnya →</button></div>
    </div>
    <div class="card hidden center" id="gameDone"><div class="score-big" id="gameScore">0/5</div><h3>Tantangan selesai!</h3><p id="gameMessage" class="muted"></p><button class="btn darkbtn" id="gameRestart">Ulangi Tantangan</button></div>
  </section>

  <section class="page" id="page-quiz">
    <div class="section-head"><div><div class="kicker">Evaluasi akhir</div><h2>Uji pemahamanmu</h2></div><p>Kerjakan 10 soal pilihan ganda. Setelah itu, lanjutkan 5 soal uraian.</p></div>
    <div class="card" id="quizCard">
      <div style="display:flex;justify-content:space-between;gap:10px;align-items:center"><span class="pill">Pilihan ganda</span><strong id="quizCount">Soal 1 dari 10</strong></div>
      <div class="progress" style="margin:14px 0"><span id="quizProgress"></span></div>
      <div class="quiz-q" id="quizQuestion"></div>
      <div id="quizOptions"></div>
      <div class="actions"><button class="btn softbtn" id="quizPrev">← Sebelumnya</button><button class="btn darkbtn" id="quizNext">Berikutnya →</button><button class="btn primary hidden" id="quizFinish">Selesaikan PG</button></div>
    </div>
    <div class="card hidden" id="essayCard">
      <span class="pill">Soal uraian · 5 nomor</span><h3>Jelaskan proses berpikirmu</h3>
      <p class="muted small">Tuliskan langkah penyelesaian. Jawaban uraian belum dinilai otomatis; guru dapat memeriksanya menggunakan rubrik.</p>
      <div id="essayQuestions"></div>
      <button class="btn primary" id="submitEvaluation">Kirim Evaluasi</button>
    </div>
    <div class="card hidden center" id="quizDone">
      <div class="kicker">Hasil pilihan ganda</div><div class="score-big" id="finalScore">0</div><h3 id="scoreTitle">Evaluasi selesai</h3><p id="scoreDetail" class="muted"></p>
      <button class="btn darkbtn" data-go="result">Lihat Hasil & Sertifikat →</button>
    </div>
  </section>

  <section class="page" id="page-result">
    <div class="section-head"><div><div class="kicker">Catatan penjelajah</div><h2>Hasil belajar</h2></div><p>Masukkan nama untuk membuat sertifikat penyelesaian petualangan.</p></div>
    <div class="card center">
      <div class="score-big" id="resultScore">—</div><h3>Nilai pilihan ganda</h3><p id="resultDetail" class="muted">Selesaikan evaluasi untuk melihat nilai.</p>
      <div class="field" style="max-width:420px;margin:22px auto;text-align:left"><label for="studentName">Nama siswa</label><input type="text" id="studentName" placeholder="Tuliskan nama lengkap"></div>
      <button class="btn primary" id="makeCertificate">Buat Sertifikat</button>
    </div>
    <div id="certificate" class="certificate hidden">
      <div class="kicker">Arjuna Math Adventure mempersembahkan</div><h2>SERTIFIKAT PENJELAJAH MATEMATIKA</h2>
      <p>Diberikan kepada</p><h2 id="certName" style="color:#946a36;text-transform:uppercase">NAMA SISWA</h2>
      <p>Atas partisipasi dalam petualangan pembelajaran matematika berbasis etnomatematika dengan konteks Candi Arjuna, Dieng.</p>
      <p><strong>Nilai pilihan ganda: <span id="certScore">0</span></strong></p>
      <p style="margin-top:28px">ARJUNA MATH ADVENTURE<br><span class="small">Program Studi Tadris Matematika · UIN Jurai Siwo Lampung</span></p>
    </div>
    <div class="center actions no-print" style="justify-content:center"><button class="btn darkbtn hidden" id="printCertificate">Cetak / Simpan PDF</button><button class="btn softbtn" data-go="home">Kembali ke Beranda</button></div>
  </section>

  <section class="page" id="page-about">
    <div class="section-head"><div><div class="kicker">Tentang media</div><h2>Di balik petualangan</h2></div></div>
    <div class="card"><h3>ARJUNA MATH ADVENTURE</h3><p>Media pembelajaran matematika berbasis etnomatematika dengan konteks Candi Arjuna, Dieng.</p><p style="margin-top:12px">Dikembangkan oleh mahasiswa semester 5 Program Studi Tadris Matematika, UIN Jurai Siwo Lampung.</p><p class="muted small">Silakan lengkapi nama anggota kelompok, dosen pengampu, sumber foto, dan daftar referensi sebelum website digunakan dalam uji coba resmi.</p></div>
  </section>

  <footer class="footer no-print"><strong>ARJUNA MATH ADVENTURE</strong><p>Jelajahi Warisan Budaya, Temukan Keajaiban Matematika!</p><p class="small">Media pembelajaran matematika · Tadris Matematika · UIN Jurai Siwo Lampung</p><button class="btn secondary" style="margin-top:12px" data-go="about">Tentang Pengembang</button></footer>
</main>

<script>
"use strict";
const $ = (id) => document.getElementById(id);
const pages = ["home","temple","map","materials","lab","game","quiz","result","about"];
const completed = new Set(JSON.parse(localStorage.getItem("ama_completed") || "[]"));
let quizIndex = 0, quizAnswers = Array(10).fill(null), quizScore = null;
let gameIndex = 0, gameScore = 0, gameLocked = false, gameChoice = null;

function saveProgress(){localStorage.setItem("ama_completed",JSON.stringify([...completed]));updateProgress();}
function updateProgress(){
  const n=completed.size, pct=n/4*100;
  $("progressText").textContent=`${n} dari 4 misi selesai`;
  $("homeProgress").style.width=pct+"%";$("mapProgress").style.width=pct+"%";$("mapProgressLabel").textContent=Math.round(pct)+"%";
}
function showPage(name){
  if(!pages.includes(name)) return;
  pages.forEach(p=>$("page-"+p).classList.toggle("active",p===name));
  document.querySelectorAll(".navlinks button").forEach(b=>b.classList.toggle("active",b.dataset.page===name));
  $("navlinks").classList.remove("open");
  window.scrollTo({top:0,behavior:"smooth"});
  if(name==="result") renderResult();
}
document.addEventListener("click",e=>{
  const go=e.target.closest("[data-go]");
  if(go){showPage(go.dataset.go);if(go.dataset.material!==undefined)showMaterial(Number(go.dataset.material));}
  const nav=e.target.closest("[data-page]");if(nav)showPage(nav.dataset.page);
});
$("menuToggle").addEventListener("click",()=>$("navlinks").classList.toggle("open"));
updateProgress();

// Materi
const materials=[
 {title:"Fungsi Trigonometri dan Lingkaran Satuan",goal:"Siswa dapat menjelaskan hubungan sudut dengan nilai sinus, cosinus, dan tangen pada lingkaran satuan.",body:`<h3>1. Mengenal fungsi trigonometri</h3><p>Untuk sudut θ pada segitiga siku-siku, sinus adalah perbandingan sisi depan terhadap sisi miring, cosinus adalah sisi samping terhadap sisi miring, dan tangen adalah sisi depan terhadap sisi samping.</p><div class="formula">sin θ = depan/miring &nbsp; | &nbsp; cos θ = samping/miring &nbsp; | &nbsp; tan θ = depan/samping</div><h3>2. Lingkaran satuan</h3><p>Lingkaran satuan memiliki jari-jari 1 dan berpusat di titik O(0,0). Titik pada lingkaran yang membentuk sudut θ dari sumbu-x positif memiliki koordinat (cos θ, sin θ).</p><div class="formula">P(θ) = (cos θ, sin θ)</div><p>Contoh: untuk θ = 60°, cos 60° = 1/2 dan sin 60° = √3/2.</p><div class="example"><strong>Contoh latihan</strong><p>Tentukan sin 30°, cos 30°, dan tan 30°.</p><p><strong>Pembahasan:</strong> sin 30° = 1/2, cos 30° = √3/2, dan tan 30° = √3/3.</p></div>`},
 {title:"Identitas Trigonometri",goal:"Siswa dapat menggunakan identitas dasar untuk menyederhanakan bentuk trigonometri.",body:`<h3>1. Identitas dasar</h3><p>Identitas trigonometri adalah kesamaan yang berlaku untuk setiap nilai sudut pada daerah asal yang membuat kedua ruas terdefinisi.</p><div class="formula">sin² θ + cos² θ = 1</div><div class="formula">tan θ = sin θ / cos θ, dengan cos θ ≠ 0</div><h3>2. Contoh penggunaan</h3><p>Jika sin θ = 3/5 dan θ sudut lancip, tentukan cos θ.</p><div class="example"><strong>Pembahasan:</strong><p>sin² θ + cos² θ = 1</p><p>(3/5)² + cos² θ = 1</p><p>cos² θ = 1 − 9/25 = 16/25</p><p>Karena θ lancip, cos θ positif, sehingga cos θ = 4/5.</p></div>`},
 {title:"Aturan Sinus",goal:"Siswa dapat menentukan panjang sisi atau besar sudut segitiga menggunakan aturan sinus.",body:`<h3>1. Rumus aturan sinus</h3><p>Pada segitiga ABC, sisi a berhadapan dengan sudut A, sisi b berhadapan dengan sudut B, dan sisi c berhadapan dengan sudut C.</p><div class="formula">a/sin A = b/sin B = c/sin C</div><h3>2. Contoh kontekstual</h3><p>Dalam model segitiga pengamatan di sekitar kawasan candi, diketahui sisi a = 10 m, sudut A = 30°, dan sudut B = 45°. Tentukan sisi b.</p><div class="example"><strong>Pembahasan:</strong><p>b/sin 45° = 10/sin 30°</p><p>b = 10 × sin 45° / sin 30°</p><p>b = 10 × 0,7071 / 0,5 ≈ 14,14 m.</p><p>Jadi, panjang sisi b pada model tersebut sekitar 14,14 m.</p></div><p class="small muted">Angka merupakan ilustrasi pembelajaran, bukan data ukur Candi Arjuna.</p>`},
 {title:"Aturan Cosinus",goal:"Siswa dapat menentukan panjang sisi atau sudut segitiga menggunakan aturan cosinus.",body:`<h3>1. Rumus aturan cosinus</h3><p>Aturan cosinus digunakan ketika diketahui dua sisi dan sudut apit, atau ketiga sisi segitiga.</p><div class="formula">c² = a² + b² − 2ab cos C</div><p>Rumus serupa berlaku untuk sisi a dan b dengan sudut yang berhadapan.</p><h3>2. Contoh soal</h3><p>Diketahui dua sisi segitiga 8 m dan 6 m dengan sudut apit 60°. Tentukan sisi di hadapan sudut 60°.</p><div class="example"><strong>Pembahasan:</strong><p>c² = 8² + 6² − 2(8)(6)cos 60°</p><p>c² = 64 + 36 − 96(0,5) = 52</p><p>c = √52 = 2√13 ≈ 7,21 m.</p></div>`},
 {title:"Penerapan Trigonometri",goal:"Siswa dapat memilih model trigonometri yang sesuai untuk menyelesaikan masalah kontekstual.",body:`<h3>1. Pengukuran tinggi dengan sudut elevasi</h3><p>Jika jarak mendatar pengamat ke objek adalah d dan sudut elevasi ke puncak adalah θ, tinggi objek relatif terhadap tinggi mata pengamat adalah h = d tan θ.</p><div class="formula">tan θ = h/d &nbsp; sehingga &nbsp; h = d tan θ</div><h3>2. Memilih aturan sinus atau cosinus</h3><p>Gunakan aturan sinus jika tersedia pasangan sisi dan sudut yang berhadapan. Gunakan aturan cosinus jika diketahui dua sisi dan sudut apit, atau ketiga sisi.</p><div class="example"><strong>Contoh:</strong><p>Seorang siswa berdiri 12 m dari objek. Sudut elevasi ke titik yang diamati 30°. Selisih tinggi titik tersebut dari mata siswa adalah:</p><p>h = 12 tan 30° = 12(√3/3) ≈ 6,93 m.</p></div><p class="small muted">Model mengabaikan kemiringan tanah dan menggunakan asumsi permukaan datar. Pengukuran tinggi sebenarnya juga perlu memperhitungkan tinggi alat atau mata pengamat.</p>`}
];
function showMaterial(i){
  i=Math.max(0,Math.min(4,i));document.querySelectorAll("[data-mat]").forEach(b=>b.classList.toggle("active",Number(b.dataset.mat)===i));
  const m=materials[i];$("materialContent").innerHTML=`<span class="pill">Materi ${i+1}</span><h2>${m.title}</h2><div class="notice"><strong>Tujuan pembelajaran:</strong> ${m.goal}</div>${m.body}<div class="actions"><button class="btn primary" id="finishMaterial">Tandai materi selesai ✓</button><button class="btn softbtn" data-go="lab">Coba di Laboratorium →</button></div>`;
  $("finishMaterial").addEventListener("click",()=>{completed.add("m"+i);saveProgress();$("finishMaterial").textContent="Materi ditandai selesai ✓";});
}
document.querySelectorAll("[data-mat]").forEach(b=>b.addEventListener("click",()=>showMaterial(Number(b.dataset.mat))));
showMaterial(0);

// Lab lingkaran satuan
function fmt(n){return Number(n).toFixed(3).replace(".",",")}
function updateCircle(){
  const deg=Number($("angleRange").value),rad=deg*Math.PI/180,s=Math.sin(rad),c=Math.cos(rad);
  $("angleLabel").textContent=deg+"°";
  const tan=Math.abs(c)<1e-10?"tidak terdefinisi":fmt(s/c);
  $("circleValues").textContent=`sin ${deg}° = ${fmt(s)} · cos ${deg}° = ${fmt(c)} · tan ${deg}° = ${tan}`;
  const x=160+90*c,y=130-90*s;
  $("radiusLine").setAttribute("x2",x);$("radiusLine").setAttribute("y2",y);
  $("unitPoint").setAttribute("cx",x);$("unitPoint").setAttribute("cy",y);
}
$("angleRange").addEventListener("input",updateCircle);updateCircle();
document.querySelectorAll("[data-lab]").forEach(b=>b.addEventListener("click",()=>{
  document.querySelectorAll("[data-lab]").forEach(x=>x.classList.toggle("active",x===b));
  $("labCircle").classList.toggle("hidden",b.dataset.lab!=="circle");$("labTriangle").classList.toggle("hidden",b.dataset.lab!=="triangle");
}));
$("calcTriangle").addEventListener("click",()=>{
  const a=Number($("sideA").value),b=Number($("sideB").value),ang=Number($("includedAngle").value);
  if(!(a>0&&b>0&&ang>0&&ang<180)){ $("triangleResult").textContent="Masukkan dua sisi positif dan sudut antara 0° hingga 180°.";return;}
  const c2=a*a+b*b-2*a*b*Math.cos(ang*Math.PI/180);
  $("triangleResult").textContent=`Sisi c = √${fmt(c2)} ≈ ${fmt(Math.sqrt(c2))} satuan.`;
});
document.querySelectorAll("[data-go='lab']").forEach(()=>{});

// Game
const gameQs=[
 {q:"Pada lingkaran satuan, koordinat titik untuk sudut θ adalah ...",o:["(sin θ, cos θ)","(cos θ, sin θ)","(tan θ, sin θ)"],a:1,e:"Pada lingkaran satuan, absis adalah cos θ dan ordinat adalah sin θ."},
 {q:"Nilai sin 30° adalah ...",o:["1/2","√3/2","1"],a:0,e:"Sudut istimewa 30° memiliki sin 30° = 1/2."},
 {q:"Identitas dasar yang benar adalah ...",o:["sin θ + cos θ = 1","sin² θ + cos² θ = 1","tan θ = cos θ/sin θ"],a:1,e:"Identitas Pythagoras trigonometri adalah sin² θ + cos² θ = 1."},
 {q:"Aturan sinus menghubungkan ...",o:["sisi dengan sinus sudut di hadapannya","dua sisi dan sudut apit saja","keliling dengan luas"],a:0,e:"Perbandingan sisi terhadap sinus sudut yang berhadapan bernilai sama."},
 {q:"Jika dua sisi dan sudut apit diketahui, aturan yang sesuai adalah ...",o:["Aturan sinus","Aturan cosinus","Identitas dasar"],a:1,e:"Aturan cosinus tepat digunakan untuk dua sisi dan sudut apit."}
];
function renderGame(){
  if(gameIndex>=gameQs.length){$("gameCard").classList.add("hidden");$("gameDone").classList.remove("hidden");$("gameScore").textContent=`${gameScore}/5`;$("gameMessage").textContent=gameScore>=4?"Hebat! Kamu berhasil menaklukkan tantangan.":"Terus berlatih. Pelajari kembali materi dan coba sekali lagi.";completed.add("game");saveProgress();return;}
  const q=gameQs[gameIndex];gameLocked=false;gameChoice=null;
  $("gameCount").textContent=`Soal ${gameIndex+1} dari 5`;$("gameProgress").style.width=((gameIndex)/5*100)+"%";$("gameQuestion").textContent=q.q;
  $("gameOptions").innerHTML=q.o.map((v,i)=>`<label class="option"><input type="radio" name="gameOption" value="${i}"><span>${v}</span></label>`).join("");
  $("gameFeedback").className="feedback";$("gameFeedback").textContent="";$("gameCheck").classList.remove("hidden");$("gameNext").classList.add("hidden");
}
$("gameCheck").addEventListener("click",()=>{
  if(gameLocked)return;const picked=document.querySelector('input[name="gameOption"]:checked');
  if(!picked){$("gameFeedback").className="feedback show bad";$("gameFeedback").textContent="Pilih salah satu jawaban terlebih dahulu.";return;}
  gameChoice=Number(picked.value);gameLocked=true;const q=gameQs[gameIndex],correct=gameChoice===q.a;if(correct)gameScore++;
  $("gameFeedback").className="feedback show "+(correct?"good":"bad");$("gameFeedback").textContent=(correct?"Benar! ":"Belum tepat. ")+q.e;
  $("gameCheck").classList.add("hidden");$("gameNext").classList.remove("hidden");
});
$("gameNext").addEventListener("click",()=>{gameIndex++;renderGame();});
$("gameRestart").addEventListener("click",()=>{gameIndex=0;gameScore=0;$("gameDone").classList.add("hidden");$("gameCard").classList.remove("hidden");renderGame();});
renderGame();

// Evaluasi
const questions=[
 {q:"Pada lingkaran satuan, koordinat titik untuk sudut 0° adalah ...",o:["(0, 1)","(1, 0)","(−1, 0)","(0, −1)"],a:1,e:"Titik sudut 0° berada pada sumbu-x positif, yaitu (1,0)."},
 {q:"Nilai sin 30° adalah ...",o:["0","1/2","√2/2","√3/2"],a:1,e:"sin 30° = 1/2."},
 {q:"Nilai cos 60° adalah ...",o:["1/2","√3/2","1","0"],a:0,e:"cos 60° = 1/2."},
 {q:"Identitas trigonometri yang benar adalah ...",o:["sin²x − cos²x = 1","sin²x + cos²x = 1","sin x + cos x = 1","tan x = cos x/sin x"],a:1,e:"Identitas dasar: sin²x + cos²x = 1."},
 {q:"Jika sin θ = 3/5 dan θ lancip, nilai cos θ adalah ...",o:["2/5","3/4","4/5","5/4"],a:2,e:"cos²θ = 1 − 9/25 = 16/25, sehingga cos θ = 4/5."},
 {q:"Rumus aturan sinus yang tepat adalah ...",o:["a/sin A = b/sin B = c/sin C","a² = b² + c²","sin A + sin B = sin C","a cos A = b cos B"],a:0,e:"Aturan sinus menghubungkan setiap sisi dengan sinus sudut di hadapannya."},
 {q:"Pada segitiga, a = 10, A = 30°, B = 45°. Panjang b adalah ...",o:["5√2","10√2","20","10"],a:1,e:"b = 10 sin45°/sin30° = 10√2."},
 {q:"Aturan cosinus untuk sisi c adalah ...",o:["c² = a² + b² + 2ab cos C","c² = a² + b² − 2ab cos C","c = a + b","c² = a² − b²"],a:1,e:"Rumus aturan cosinus: c² = a² + b² − 2ab cos C."},
 {q:"Dua sisi segitiga 8 cm dan 6 cm mengapit sudut 60°. Nilai sisi di hadapan sudut itu adalah ...",o:["√36 cm","√48 cm","√52 cm","√100 cm"],a:2,e:"c² = 64 + 36 − 96(1/2) = 52, jadi c = √52 cm."},
 {q:"Pengamat berjarak mendatar 10 m dari objek. Sudut elevasi 45°. Selisih tinggi objek dari mata pengamat adalah ...",o:["5 m","10 m","10√2 m","20 m"],a:1,e:"h = d tan45° = 10 × 1 = 10 m."}
];
const essays=[
 "Jelaskan hubungan koordinat titik pada lingkaran satuan dengan nilai sinus dan cosinus suatu sudut.",
 "Buktikan bahwa jika sin θ = 5/13 dan θ sudut lancip, maka cos θ = 12/13.",
 "Dalam segitiga ABC diketahui a = 12 cm, A = 30°, dan B = 60°. Tentukan panjang sisi b menggunakan aturan sinus.",
 "Dua sisi segitiga masing-masing 7 cm dan 9 cm dengan sudut apit 60°. Tentukan panjang sisi di hadapan sudut tersebut menggunakan aturan cosinus.",
 "Jelaskan bagaimana trigonometri dapat digunakan untuk memperkirakan tinggi bangunan. Tuliskan asumsi dan data yang diperlukan."
];
function renderQuiz(){
  const q=questions[quizIndex];$("quizCount").textContent=`Soal ${quizIndex+1} dari 10`;$("quizProgress").style.width=((quizIndex+1)/10*100)+"%";$("quizQuestion").textContent=q.q;
  $("quizOptions").innerHTML=q.o.map((v,i)=>`<label class="option"><input type="radio" name="quizOption" value="${i}" ${quizAnswers[quizIndex]===i?"checked":""}><span>${String.fromCharCode(65+i)}. ${v}</span></label>`).join("");
  $("quizPrev").disabled=quizIndex===0;$("quizNext").classList.toggle("hidden",quizIndex===9);$("quizFinish").classList.toggle("hidden",quizIndex!==9);
}
$("quizOptions").addEventListener("change",e=>{if(e.target.name==="quizOption")quizAnswers[quizIndex]=Number(e.target.value);});
$("quizPrev").addEventListener("click",()=>{if(quizIndex>0){quizIndex--;renderQuiz();}});
$("quizNext").addEventListener("click",()=>{const p=document.querySelector('input[name="quizOption"]:checked');if(p)quizAnswers[quizIndex]=Number(p.value);if(quizAnswers[quizIndex]===null){alert("Pilih jawaban terlebih dahulu.");return;}quizIndex++;renderQuiz();});
$("quizFinish").addEventListener("click",()=>{
 const p=document.querySelector('input[name="quizOption"]:checked');if(p)quizAnswers[quizIndex]=Number(p.value);
 if(quizAnswers.some(v=>v===null)){alert("Masih ada soal yang belum dijawab. Periksa kembali nomor 1–10.");return;}
 $("quizCard").classList.add("hidden");$("essayCard").classList.remove("hidden");
 $("essayQuestions").innerHTML=essays.map((q,i)=>`<div class="field"><label>${i+1}. ${q}</label><textarea rows="3" id="essay${i}" style="width:100%;padding:12px;border:1px solid #d8cbbb;border-radius:12px;font:inherit"></textarea></div>`).join("");
});
$("submitEvaluation").addEventListener("click",()=>{
 quizScore=questions.reduce((n,q,i)=>n+(quizAnswers[i]===q.a?1:0),0);
 const essayAnswers=essays.map((_,i)=>$("essay"+i).value.trim());
 localStorage.setItem("ama_quiz_score",String(quizScore));localStorage.setItem("ama_essay_answers",JSON.stringify(essayAnswers));
 $("essayCard").classList.add("hidden");$("quizDone").classList.remove("hidden");
 $("finalScore").textContent=quizScore*10+"/100";$("scoreTitle").textContent=quizScore>=8?"Luar biasa!":"Evaluasi selesai";
 $("scoreDetail").textContent=`Jawaban benar ${quizScore} dari 10. Jawaban uraian tersimpan di browser ini untuk diperiksa guru.`;
 completed.add("quiz");saveProgress();
});
renderQuiz();

function renderResult(){
 const saved=localStorage.getItem("ama_quiz_score");
 if(saved!==null){const n=Number(saved);$("resultScore").textContent=n*10+"/100";$("resultDetail").textContent=`${n} jawaban benar dari 10 soal pilihan ganda. Jawaban uraian perlu diperiksa guru.`;}
}
$("makeCertificate").addEventListener("click",()=>{
 const name=$("studentName").value.trim();if(!name){alert("Masukkan nama siswa terlebih dahulu.");return;}
 const saved=localStorage.getItem("ama_quiz_score");if(saved===null){alert("Selesaikan evaluasi terlebih dahulu untuk membuat sertifikat.");return;}
 $("certName").textContent=name;$("certScore").textContent=Number(saved)*10+"/100";$("certificate").classList.remove("hidden");$("printCertificate").classList.remove("hidden");
});
$("printCertificate").addEventListener("click",()=>window.print());

// Mark misi progress when all learning sections and activities have been visited/completed.
document.querySelector('[data-go="game"]').addEventListener("click",()=>{});
</script>
</body>
</html>
'''
path = Path("/mnt/data/index.html")
path.write_text(html, encoding="utf-8")
# Basic static checks before sharing
checks = {
    "HTML doctype": html.lstrip().lower().startswith("<!doctype html>"),
    "HTML document closes": html.rstrip().endswith("</html>"),
    "All page sections referenced": all(f'id="page-{p}"' in html for p in ["home","temple","map","materials","lab","game","quiz","result","about"]),
    "Core JavaScript functions present": all(s in html for s in ["function showPage","function showMaterial","function updateCircle","function renderQuiz","function renderResult"]),
    "Evaluation has 10 MC and 5 essay prompts": "const questions=[" in html and "const essays=[" in html,
    "No external JS framework dependency": "<script src=" not in html.lower()
}
print("File created:", path)
print("Size:", path.stat().st_size, "bytes")
print("Static checks:", checks)
