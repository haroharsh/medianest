<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MediaNest</title>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
      --bg:           #e6f9f3;
      --bg2:          #d0f2e8;
      --sidebar-bg:   #ffffff;
      --card-surface: #ffffff;
      --text-h:       #0a2e22;
      --text-body:    #2a6650;
      --text-muted:   #7ab5a0;
      --accent:       #00c896;
      --accent-deep:  #00a67e;
      --border:       rgba(0,200,150,0.18);
      --pill-bg:      rgba(0,200,150,0.10);
      --shadow-sm:    0 4px 18px rgba(0,140,100,0.08);
      --shadow-md:    0 14px 44px rgba(0,140,100,0.13);
      --shadow-lg:    0 30px 80px rgba(0,140,100,0.22);
      --toggle-bg:    #ffffff;
    }

    body.dark {
      --bg:           #060d0a;
      --bg2:          #0b1610;
      --sidebar-bg:   #0e1e16;
      --card-surface: #101e18;
      --text-h:       #e0fff6;
      --text-body:    #8ecfbd;
      --text-muted:   #4a7a6a;
      --accent:       #00c896;
      --accent-deep:  #00a67e;
      --border:       rgba(0,200,150,0.10);
      --pill-bg:      rgba(0,200,150,0.07);
      --shadow-sm:    0 4px 20px rgba(0,0,0,0.35);
      --shadow-md:    0 14px 44px rgba(0,0,0,0.45);
      --shadow-lg:    0 30px 80px rgba(0,0,0,0.60);
      --toggle-bg:    #1a2e26;
    }

    body {
      font-family: 'Manrope', sans-serif;
      background: var(--bg);
      color: var(--text-body);
      height: 100vh;
      overflow: hidden;
      transition: background 0.45s, color 0.45s;
    }

    .container { display: flex; height: 100vh; }
    .sidebar {
      width: 262px;
      min-width: 262px;
      background: var(--sidebar-bg);
      border-right: 1px solid var(--border);
      padding: 30px 18px 24px;
      display: flex;
      flex-direction: column;
      gap: 0;
      box-shadow: 4px 0 32px rgba(0,140,100,0.06);
      transition: background 0.45s, border-color 0.45s;
      z-index: 10;
      animation: slideIn 0.5s ease both;
    }

    @keyframes slideIn {
      from { opacity:0; transform: translateX(-30px); }
      to   { opacity:1; transform: translateX(0); }
    }

    .logo-wrap {
      display: flex;
      align-items: center;
      gap: 10px;
      margin-bottom: 34px;
    }

    .logo-icon {
      width: 38px;
      height: 38px;
      border-radius: 11px;
      background: linear-gradient(135deg, #00c896, #00a67e);
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 6px 20px rgba(0,200,150,0.42);
      flex-shrink: 0;
    }

    .logo-icon svg { width: 20px; height: 20px; }

    .logo-text {
      font-family: 'Outfit', sans-serif;
      font-size: 20px;
      font-weight: 800;
      color: var(--text-h);
      letter-spacing: -0.5px;
      transition: color 0.45s;
    }

    .nav-section-label {
      font-size: 10px;
      font-weight: 700;
      letter-spacing: 2.5px;
      text-transform: uppercase;
      color: var(--text-muted);
      padding: 0 10px;
      margin-bottom: 10px;
    }

    .sidebar nav { display: flex; flex-direction: column; gap: 4px; margin-bottom: 26px; }

    .nav-item {
      display: flex;
      align-items: center;
      gap: 11px;
      padding: 12px 13px;
      border-radius: 14px;
      cursor: pointer;
      font-size: 13.5px;
      font-weight: 600;
      color: var(--text-muted);
      transition: all 0.25s ease;
      position: relative;
    }

    .nav-item:hover { background: var(--pill-bg); color: var(--accent); transform: translateX(4px); }
    .nav-item.active { background: linear-gradient(135deg, #00c896, #00a67e); color: #fff; box-shadow: 0 8px 24px rgba(0,200,150,0.35); }
    .nav-item.active:hover { transform: none; }

    .nav-logo {
      width: 28px;
      height: 28px;
      border-radius: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
      overflow: hidden;
    }

    .nav-logo svg { width: 28px; height: 28px; }

    .nav-badge {
      margin-left: auto;
      font-size: 10px;
      padding: 2px 8px;
      border-radius: 20px;
      font-weight: 700;
      background: rgba(255,255,255,0.25);
      color: rgba(255,255,255,0.9);
    }

    .nav-item:not(.active) .nav-badge { background: var(--pill-bg); color: var(--accent); }

    .sidebar-divider { height: 1px; background: var(--border); margin: 4px 6px 20px; }

    .storage-box {
      background: var(--pill-bg);
      border: 1px solid var(--border);
      border-radius: 16px;
      padding: 16px;
      margin-bottom: 18px;
    }

    .s-label {
      font-size: 10px;
      font-weight: 700;
      letter-spacing: 2px;
      text-transform: uppercase;
      color: var(--text-muted);
      margin-bottom: 10px;
    }

    .storage-bar { height: 6px; background: var(--border); border-radius: 10px; overflow: hidden; margin-bottom: 7px; }
    .storage-fill { height: 100%; width: 42%; background: linear-gradient(90deg, #00c896, #00a67e); border-radius: 10px; }
    .storage-nums { display: flex; justify-content: space-between; font-size: 11px; color: var(--text-muted); }
    .storage-nums strong { color: var(--text-h); font-weight: 700; transition: color 0.45s; }

    .sidebar-footer { margin-top: auto; }

    .avatar-row {
      display: flex;
      align-items: center;
      gap: 11px;
      padding: 10px 10px;
      border-radius: 14px;
      cursor: pointer;
      transition: background 0.25s;
    }

    .avatar-row:hover { background: var(--pill-bg); }

    .avatar {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background: linear-gradient(135deg, #00c896, #00a67e);
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Outfit', sans-serif;
      font-weight: 800;
      font-size: 16px;
      color: white;
      box-shadow: 0 4px 14px rgba(0,200,150,0.38);
      flex-shrink: 0;
    }

    .avatar-info p { font-size: 13px; font-weight: 700; color: var(--text-h); transition: color 0.45s; }
    .avatar-info span { font-size: 11px; color: var(--accent); font-weight: 600; }
    .main {
      flex: 1;
      padding: 34px 44px;
      overflow-y: auto;
      background: var(--bg);
      transition: background 0.45s;
      animation: fadeUp 0.55s ease both;
    }

    .main::-webkit-scrollbar { width: 5px; }
    .main::-webkit-scrollbar-thumb { background: rgba(0,200,150,0.3); border-radius: 4px; }

    @keyframes fadeUp {
      from { opacity:0; transform: translateY(26px); }
      to   { opacity:1; transform: translateY(0); }
    }

    .top-bar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 32px;
    }

    .welcome h1 {
      font-family: 'Outfit', sans-serif;
      font-size: 28px;
      font-weight: 800;
      color: var(--text-h);
      letter-spacing: -0.8px;
      transition: color 0.45s;
    }

    .welcome p { font-size: 14px; color: var(--text-muted); margin-top: 5px; font-weight: 500; }

    .top-right { display: flex; align-items: center; gap: 12px; }

    .icon-btn {
      width: 44px;
      height: 44px;
      border-radius: 13px;
      border: 1.5px solid var(--border);
      background: var(--toggle-bg);
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      box-shadow: var(--shadow-sm);
      transition: all 0.3s;
      position: relative;
    }

    .icon-btn:hover { transform: scale(1.08); box-shadow: var(--shadow-md); }
    .icon-btn svg { width: 18px; height: 18px; stroke: var(--text-body); fill: none; stroke-width: 1.8; stroke-linecap: round; transition: stroke 0.45s; }

    .notif-dot {
      position: absolute;
      top: 9px;
      right: 10px;
      width: 7px;
      height: 7px;
      border-radius: 50%;
      background: var(--accent);
      border: 2px solid var(--toggle-bg);
    }

    .toggle {
      width: 44px;
      height: 44px;
      border-radius: 13px;
      border: 1.5px solid var(--border);
      background: var(--toggle-bg);
      cursor: pointer;
      font-size: 18px;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: var(--shadow-sm);
      transition: all 0.35s ease;
    }

    .toggle:hover { transform: rotate(20deg) scale(1.1); }
    .stats-row {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 14px;
      margin-bottom: 34px;
    }

    .stat-card {
      background: var(--card-surface);
      border: 1px solid var(--border);
      border-radius: 18px;
      padding: 18px 20px;
      display: flex;
      flex-direction: column;
      gap: 5px;
      box-shadow: var(--shadow-sm);
      transition: background 0.45s, border-color 0.45s, transform 0.3s, box-shadow 0.3s;
    }

    .stat-card:hover { transform: translateY(-5px); box-shadow: var(--shadow-md); }

    .stat-icon {
      width: 34px;
      height: 34px;
      border-radius: 10px;
      background: var(--pill-bg);
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 4px;
    }

    .stat-icon svg { width: 17px; height: 17px; stroke: var(--accent); fill: none; stroke-width: 1.8; stroke-linecap: round; }
    .stat-num { font-family: 'Outfit', sans-serif; font-size: 25px; font-weight: 800; color: var(--text-h); letter-spacing: -1px; line-height: 1; transition: color 0.45s; }
    .stat-label { font-size: 11px; color: var(--text-muted); font-weight: 600; text-transform: uppercase; letter-spacing: 1px; }
    .section-head { display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px; }
    .section-head h2 { font-family: 'Outfit', sans-serif; font-size: 19px; font-weight: 800; color: var(--text-h); letter-spacing: -0.3px; transition: color 0.45s; }
    .section-head span { font-size: 12px; color: var(--accent); font-weight: 700; cursor: pointer; }

    .cards {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 20px;
    }

    .card {
      border-radius: 26px;
      overflow: hidden;
      cursor: pointer;
      position: relative;
      min-height: 210px;
      display: flex;
      flex-direction: column;
      justify-content: flex-end;
      box-shadow: var(--shadow-md);
      transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .card:nth-child(1) { animation: fadeUp 0.6s 0.05s ease both; }
    .card:nth-child(2) { animation: fadeUp 0.6s 0.10s ease both; }
    .card:nth-child(3) { animation: fadeUp 0.6s 0.15s ease both; }
    .card:nth-child(4) { animation: fadeUp 0.6s 0.20s ease both; }

    .card:hover { transform: translateY(-10px) scale(1.02); box-shadow: var(--shadow-lg); }
    .card-watermark {
      position: absolute;
      right: -16px;
      top: 50%;
      transform: translateY(-50%);
      width: 130px;
      height: 130px;
      opacity: 0.12;
      transition: opacity 0.4s, transform 0.4s;
      pointer-events: none;
    }

    .card:hover .card-watermark { opacity: 0.22; transform: translateY(-50%) scale(1.1) rotate(-6deg); }

    .card::before {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(110deg, transparent 30%, rgba(255,255,255,0.14) 50%, transparent 70%);
      transform: translateX(-100%);
      transition: transform 0.6s ease;
      z-index: 3;
      pointer-events: none;
    }

    .card:hover::before { transform: translateX(100%); }
    .card-overlay {
      position: absolute;
      inset: 0;
      background: linear-gradient(to top, rgba(0,0,0,0.45) 0%, rgba(0,0,0,0.0) 55%);
      z-index: 1;
    }

    .card-body { position: relative; z-index: 2; padding: 24px 26px; }

    .card-top {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 16px;
    }

    .platform-badge {
      display: flex;
      align-items: center;
      gap: 9px;
      background: rgba(255,255,255,0.18);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      border: 1px solid rgba(255,255,255,0.28);
      border-radius: 50px;
      padding: 6px 14px 6px 8px;
    }

    .badge-logo {
      width: 28px;
      height: 28px;
      border-radius: 50%;
      background: rgba(255,255,255,0.9);
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
      overflow: hidden;
    }

    .badge-logo svg { width: 18px; height: 18px; }
    .badge-name { font-size: 12.5px; font-weight: 700; color: rgba(255,255,255,0.96); letter-spacing: 0.2px; }

    .live-dot {
      width: 9px;
      height: 9px;
      border-radius: 50%;
      background: #4fffb0;
      box-shadow: 0 0 0 3px rgba(79,255,176,0.3);
      animation: livePulse 2s infinite;
    }

    @keyframes livePulse {
      0%, 100% { box-shadow: 0 0 0 3px rgba(79,255,176,0.3); }
      50%       { box-shadow: 0 0 0 7px rgba(79,255,176,0.08); }
    }

    .card h2 {
      font-family: 'Outfit', sans-serif;
      font-size: 20px;
      font-weight: 800;
      color: white;
      margin-bottom: 6px;
      letter-spacing: -0.3px;
    }

    .card p { font-size: 13px; color: rgba(255,255,255,0.70); font-weight: 500; line-height: 1.5; }

    .card-footer {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-top: 18px;
    }

    .card-count {
      display: flex;
      align-items: center;
      gap: 6px;
      background: rgba(0,0,0,0.22);
      border-radius: 10px;
      padding: 6px 12px;
      backdrop-filter: blur(8px);
    }

    .card-count svg { width: 13px; height: 13px; stroke: rgba(255,255,255,0.8); fill: none; stroke-width: 2; stroke-linecap: round; }
    .card-count span { font-size: 12px; color: rgba(255,255,255,0.88); font-weight: 700; }

    .card-btn {
      background: rgba(255,255,255,0.2);
      border: 1px solid rgba(255,255,255,0.32);
      border-radius: 12px;
      padding: 8px 18px;
      font-size: 12px;
      font-weight: 700;
      color: white;
      cursor: pointer;
      backdrop-filter: blur(8px);
      transition: background 0.25s, transform 0.2s;
      letter-spacing: 0.4px;
    }

    .card-btn:hover { background: rgba(255,255,255,0.35); transform: scale(1.05); }
    .insta   { background: linear-gradient(150deg, #8a3ab9, #e95950, #fccc63); }
    .fb      { background: linear-gradient(150deg, #1a6ef5, #1345a8); }
    .twitter { background: linear-gradient(150deg, #14171a, #1d3a5c, #1da1f2); }
    .yt      { background: linear-gradient(150deg, #1a1a1a, #330000, #ff0000); }
  </style>
</head>
<body>

<div class="container">
  <aside class="sidebar">

    <div class="logo-wrap">
      <div class="logo-icon">
        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M12 2L2 7l10 5 10-5-10-5z" stroke="white" stroke-width="2" stroke-linejoin="round"/>
          <path d="M2 17l10 5 10-5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M2 12l10 5 10-5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </div>
      <span class="logo-text">MediaNest</span>
    </div>

    <div class="nav-section-label">Platforms</div>
    <nav>
      <div class="nav-item active" onclick="setActive(this)">
        <div class="nav-logo">
          <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
            <defs>
              <radialGradient id="ig-g1" cx="30%" cy="107%" r="150%">
                <stop offset="0%" stop-color="#fdf497"/>
                <stop offset="5%" stop-color="#fdf497"/>
                <stop offset="45%" stop-color="#fd5949"/>
                <stop offset="60%" stop-color="#d6249f"/>
                <stop offset="90%" stop-color="#285AEB"/>
              </radialGradient>
            </defs>
            <rect width="32" height="32" rx="8" fill="url(#ig-g1)"/>
            <circle cx="16" cy="16" r="6" fill="none" stroke="white" stroke-width="2.2"/>
            <circle cx="23" cy="9" r="1.6" fill="white"/>
            <rect x="4" y="4" width="24" height="24" rx="8" fill="none" stroke="white" stroke-width="2"/>
          </svg>
        </div>
        Instagram
        <span class="nav-badge">a</span>
      </div>
      <div class="nav-item" onclick="setActive(this)">
        <div class="nav-logo">
          <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
            <rect width="32" height="32" rx="8" fill="#1877f2"/>
            <path d="M21 11h-3a1 1 0 00-1 1v3h4l-.6 4h-3.4V28h-4V19h-3v-4h3v-3a5 5 0 015-5h3v4z" fill="white"/>
          </svg>
        </div>
        Facebook
        <span class="nav-badge">b</span>
      </div>

      <div class="nav-item" onclick="setActive(this)">
        <div class="nav-logo">
          <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
            <rect width="32" height="32" rx="8" fill="#14171a"/>
            <path d="M22 7h3.5l-7.5 8.6L27 26h-6.8l-4.7-6.2-5.4 6.2H6.6l8-9.2L5 7h7l4.2 5.6L22 7zm-1.3 17.2h1.9L11.4 8.9H9.4l11.3 15.3z" fill="white"/>
          </svg>
        </div>
        Twitter / X
        <span class="nav-badge">c</span>
      </div>
      <div class="nav-item" onclick="setActive(this)">
        <div class="nav-logo">
          <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
            <rect width="32" height="32" rx="8" fill="#ff0000"/>
            <path d="M27.2 10.6a3 3 0 00-2.1-2.1C23.2 8 16 8 16 8s-7.2 0-9.1.5a3 3 0 00-2.1 2.1C4.3 12.5 4.3 16 4.3 16s0 3.5.5 5.4a3 3 0 002.1 2.1C8.8 24 16 24 16 24s7.2 0 9.1-.5a3 3 0 002.1-2.1c.5-1.9.5-5.4.5-5.4s0-3.5-.5-5.4z" fill="#ff0000" stroke="white" stroke-width="1.5"/>
            <path d="M13.5 19.5l6.5-3.5-6.5-3.5v7z" fill="white"/>
          </svg>
        </div>
        YouTube Music
        <span class="nav-badge">d</span>
      </div>

    </nav>

    <div class="sidebar-divider"></div>

    <div class="storage-box">
      <div class="s-label">Storage</div>
      <div class="storage-bar"><div class="storage-fill"></div></div>
      <div class="storage-nums">
        <span><strong>x.x GB</strong> used</span>
        <span>y.y GB free</span>
      </div>
    </div>

    <div class="sidebar-footer">
      <div class="avatar-row">
        <div class="avatar">H</div>
        <div class="avatar-info">
          <p>You</p>
          <span> Subscription</span>
        </div>
      </div>
    </div>

  </aside>
  <main class="main">

    <div class="top-bar">
      <div class="welcome">
        <h1>Good Morning, You</h1>
        <p>Sunday, 15 Feb 2026 &nbsp;·&nbsp; All platforms are live</p>
      </div>
      <div class="top-right">
        <div class="icon-btn">
          <svg viewBox="0 0 24 24"><path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 01-3.46 0"/></svg>
          <div class="notif-dot"></div>
        </div>
        <button id="themeToggle" class="toggle" aria-label="Toggle theme">🌙</button>
      </div>
    </div>
    <div class="stats-row">
      <div class="stat-card">
        <div class="stat-icon">
          <svg viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78L12 21.23l8.84-8.84a5.5 5.5 0 000-7.78z"/></svg>
        </div>
        <div class="stat-num">k</div>
        <div class="stat-label">Items Saved</div>
      </div>
      <div class="stat-card">
        <div class="stat-icon">
          <svg viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg>
        </div>
        <div class="stat-num">l</div>
        <div class="stat-label">Platforms</div>
      </div>
      <div class="stat-card">
        <div class="stat-icon">
          <svg viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z"/><polyline points="3.27 6.96 12 12.01 20.73 6.96"/><line x1="12" y1="22.08" x2="12" y2="12"/></svg>
        </div>
        <div class="stat-num">m.m GB</div>
        <div class="stat-label">Storage Used</div>
      </div>
      <div class="stat-card">
        <div class="stat-icon">
          <svg viewBox="0 0 24 24"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
        </div>
        <div class="stat-num">n</div>
        <div class="stat-label">Today's Downloads</div>
      </div>
    </div>

    <div class="section-head">
      <h2>Your Platforms</h2>
      <span>View All →</span>
    </div>
    <div class="cards">
      <div class="card insta">
        <div class="card-overlay"></div>
        <svg class="card-watermark" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
          <rect width="32" height="32" rx="8" fill="white"/>
          <circle cx="16" cy="16" r="7" fill="none" stroke="#c13584" stroke-width="2.5"/>
          <circle cx="23" cy="9" r="2" fill="#c13584"/>
          <rect x="4" y="4" width="24" height="24" rx="8" fill="none" stroke="#c13584" stroke-width="2.5"/>
        </svg>
        <div class="card-body">
          <div class="card-top">
            <div class="platform-badge">
              <div class="badge-logo">
                <svg viewBox="0 0 32 32">
                  <defs><radialGradient id="ig-b1" cx="30%" cy="107%" r="150%"><stop offset="0%" stop-color="#fdf497"/><stop offset="45%" stop-color="#fd5949"/><stop offset="60%" stop-color="#d6249f"/><stop offset="90%" stop-color="#285AEB"/></radialGradient></defs>
                  <rect width="32" height="32" rx="8" fill="url(#ig-b1)"/>
                  <circle cx="16" cy="16" r="6" fill="none" stroke="white" stroke-width="2.2"/>
                  <circle cx="23" cy="9" r="1.6" fill="white"/>
                  <rect x="4" y="4" width="24" height="24" rx="8" fill="none" stroke="white" stroke-width="2"/>
                </svg>
              </div>
              <span class="badge-name">Instagram</span>
            </div>
            <div class="live-dot"></div>
          </div>
          <h2>Instagram Saver</h2>
          <p>Save reels, stories, posts &amp; carousels in full resolution</p>
          <div class="card-footer">
            <div class="card-count">
              <svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>
              <span>a saved</span>
            </div>
            <button class="card-btn">Open →</button>
          </div>
        </div>
      </div>
      <div class="card fb">
        <div class="card-overlay"></div>
        <svg class="card-watermark" viewBox="0 0 32 32">
          <rect width="32" height="32" rx="8" fill="white"/>
          <path d="M21 11h-3a1 1 0 00-1 1v3h4l-.6 4h-3.4V28h-4V19h-3v-4h3v-3a5 5 0 015-5h3v4z" fill="#1877f2"/>
        </svg>
        <div class="card-body">
          <div class="card-top">
            <div class="platform-badge">
              <div class="badge-logo">
                <svg viewBox="0 0 32 32">
                  <rect width="32" height="32" rx="8" fill="#1877f2"/>
                  <path d="M21 11h-3a1 1 0 00-1 1v3h4l-.6 4h-3.4V28h-4V19h-3v-4h3v-3a5 5 0 015-5h3v4z" fill="white"/>
                </svg>
              </div>
              <span class="badge-name">Facebook</span>
            </div>
            <div class="live-dot"></div>
          </div>
          <h2>Facebook Downloader</h2>
          <p>Download videos, reels &amp; posts in HD quality</p>
          <div class="card-footer">
            <div class="card-count">
              <svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>
              <span>b saved</span>
            </div>
            <button class="card-btn">Open →</button>
          </div>
        </div>
      </div>
      <div class="card twitter">
        <div class="card-overlay"></div>
        <svg class="card-watermark" viewBox="0 0 32 32">
          <rect width="32" height="32" rx="8" fill="white"/>
          <path d="M22 7h3.5l-7.5 8.6L27 26h-6.8l-4.7-6.2-5.4 6.2H6.6l8-9.2L5 7h7l4.2 5.6L22 7zm-1.3 17.2h1.9L11.4 8.9H9.4l11.3 15.3z" fill="#14171a"/>
        </svg>
        <div class="card-body">
          <div class="card-top">
            <div class="platform-badge">
              <div class="badge-logo">
                <svg viewBox="0 0 32 32">
                  <rect width="32" height="32" rx="8" fill="#14171a"/>
                  <path d="M22 7h3.5l-7.5 8.6L27 26h-6.8l-4.7-6.2-5.4 6.2H6.6l8-9.2L5 7h7l4.2 5.6L22 7zm-1.3 17.2h1.9L11.4 8.9H9.4l11.3 15.3z" fill="white"/>
                </svg>
              </div>
              <span class="badge-name">Twitter / X</span>
            </div>
            <div class="live-dot"></div>
          </div>
          <h2>Twitter Saver</h2>
          <p>Save tweets, threads, GIFs &amp; videos from any account</p>
          <div class="card-footer">
            <div class="card-count">
              <svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>
              <span>c saved</span>
            </div>
            <button class="card-btn">Open →</button>
          </div>
        </div>
      </div>
      <div class="card yt">
        <div class="card-overlay"></div>
        <svg class="card-watermark" viewBox="0 0 32 32">
          <rect width="32" height="32" rx="8" fill="white"/>
          <path d="M27.2 10.6a3 3 0 00-2.1-2.1C23.2 8 16 8 16 8s-7.2 0-9.1.5a3 3 0 00-2.1 2.1C4.3 12.5 4.3 16 4.3 16s0 3.5.5 5.4a3 3 0 002.1 2.1C8.8 24 16 24 16 24s7.2 0 9.1-.5a3 3 0 002.1-2.1c.5-1.9.5-5.4.5-5.4s0-3.5-.5-5.4z" fill="red"/>
          <path d="M13.5 19.5l6.5-3.5-6.5-3.5v7z" fill="white"/>
        </svg>
        <div class="card-body">
          <div class="card-top">
            <div class="platform-badge">
              <div class="badge-logo">
                <svg viewBox="0 0 32 32">
                  <rect width="32" height="32" rx="8" fill="#ff0000"/>
                  <path d="M27.2 10.6a3 3 0 00-2.1-2.1C23.2 8 16 8 16 8s-7.2 0-9.1.5a3 3 0 00-2.1 2.1C4.3 12.5 4.3 16 4.3 16s0 3.5.5 5.4a3 3 0 002.1 2.1C8.8 24 16 24 16 24s7.2 0 9.1-.5a3 3 0 002.1-2.1c.5-1.9.5-5.4.5-5.4s0-3.5-.5-5.4z" fill="#ff0000" stroke="white" stroke-width="1.2"/>
                  <path d="M13.5 19.5l6.5-3.5-6.5-3.5v7z" fill="white"/>
                </svg>
              </div>
              <span class="badge-name">YouTube Music</span>
            </div>
            <div class="live-dot"></div>
          </div>
          <h2>Music Downloader</h2>
          <p>Download songs, albums &amp; full playlists in 320kbps MP3</p>
          <div class="card-footer">
            <div class="card-count">
              <svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>
              <span>d saved</span>
            </div>
            <button class="card-btn">Open →</button>
          </div>
        </div>
      </div>

    </div>

  </main>
</div>

<script>
  const toggle = document.getElementById("themeToggle");

  if (localStorage.getItem("theme") === "dark") {
    document.body.classList.add("dark");
    toggle.textContent = "☀️";
  }

  toggle.addEventListener("click", () => {
    document.body.classList.toggle("dark");
    const isDark = document.body.classList.contains("dark");
    toggle.textContent = isDark ? "☀️" : "🌙";
    localStorage.setItem("theme", isDark ? "dark" : "light");
  });

  function setActive(el) {
    document.querySelectorAll(".nav-item").forEach(n => n.classList.remove("active"));
    el.classList.add("active");
  }
</script>

</body>
</html>