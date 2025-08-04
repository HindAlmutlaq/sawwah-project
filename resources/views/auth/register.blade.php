<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <title>إنشاء حساب جديد</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Cairo', sans-serif;
            background: #f0f4f8;
            padding: 20px;
            text-align: center;
        }
        h1 {
            font-size: 3em;
            color: #0ea5e9;
            margin-bottom: 5px;
            background: linear-gradient(to right, #0ea5e9, #3b82f6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        h2 {
            margin-bottom: 30px;
            color: #1e293b;
            font-weight: normal;
        }
        form {
            max-width: 400px;
            margin: 0 auto 20px auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            text-align: right;
            direction: rtl;
        }
        label {
            display: block;
            margin-top: 15px;
            color: #1e293b;
            font-weight: 600;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #cbd5e1;
            border-radius: 5px;
            font-family: 'Cairo', sans-serif;
            font-size: 1em;
        }
        button {
            margin-top: 20px;
            width: 100%;
            padding: 10px;
            background-color: #0f172a;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            font-size: 1.1em;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #1e293b;
        }
        p, a {
            font-size: 1em;
            color: #334155;
            margin: 5px 0;
        }
        a {
            color: #2563eb;
            text-decoration: none;
            cursor: pointer;
        }
        a:hover {
            text-decoration: underline;
        }
        .errors {
            color: red;
            max-width: 400px;
            margin: 20px auto;
            text-align: right;
            direction: rtl;
        }
    </style>
</head>
<body>

    <h1>أهلا بكم في سواح</h1>
    <h2>إنشاء حساب جديد</h2>

    <form method="POST" action="/register">
        @csrf
        <label for="name">الاسم:</label>
        <input type="text" id="name" name="name" required autofocus>
        
        <label for="email">البريد الإلكتروني:</label>
        <input type="email" id="email" name="email" required>
        
        <label for="password">كلمة المرور:</label>
        <input type="password" id="password" name="password" required>
        
        <label for="password_confirmation">تأكيد كلمة المرور:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>
        
        <button type="submit">تسجيل</button>
    </form>

    <p>هل لديك حساب؟ <a href="{{ route('login') }}">تسجيل الدخول</a></p>

    @if ($errors->any())
        <div class="errors">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

</body>
</html>
