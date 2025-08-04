<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <title>سواح</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: 'Cairo', sans-serif;
            background: linear-gradient(to bottom right, #f0f4f8, #dbeafe);
        }
        nav {
            background-color: #1e293b;
            color: white;
            padding: 15px;
            display: flex;
            justify-content: center;
            gap: 20px;
            font-weight: bold;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            align-items: center;
        }
        nav a {
            color: white;
            text-decoration: none;
            padding: 8px 14px;
            border-radius: 5px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        nav a:hover {
            background-color: #334155;
            transform: scale(1.05);
        }
        nav a, form.logout-form button {
            color: white;
            background-color: transparent;
            padding: 8px 14px;
            border-radius: 5px;
            font-weight: bold;
            font-family: 'Cairo', sans-serif;
            font-size: 1em;
            text-decoration: none;
            cursor: pointer;
            border: none;
            transition: background-color 0.3s ease, transform 0.2s ease;
            display: inline-block;
        }
        nav a:hover, form.logout-form button:hover {
            background-color: #334155;
            transform: scale(1.05);
        }
        form.logout-form {
            background: none !important;
            padding: 0 !important;
            margin: 0 !important;
            box-shadow: none !important;
        }
        .container {
            max-width: 900px;
            margin: 40px auto;
            padding: 0 15px;
        }
        h1 {
            color: #0f172a;
            background: linear-gradient(to right, #0ea5e9, #3b82f6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        p {
            font-size: 1.2em;
            color: #334155;
        }
        form {
            max-width: 400px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-top: 20px;
        }
        label {
            display: block;
            margin-top: 15px;
            color: #1e293b;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #cbd5e1;
            border-radius: 5px;
            font-family: 'Cairo', sans-serif;
        }
        button, .btn {
            background-color: #2563eb;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            font-family: 'Cairo', sans-serif;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            display: inline-block;
        }
        button:hover, .btn:hover {
            background-color: #1e40af;
            transform: scale(1.05);
        }
        .btn-delete {
            background-color: #dc2626;
        }
        .btn-delete:hover {
            background-color: #991b1b;
        }
        .dashboard-box {
            background-color: #f8fafc;
            border: 2px dashed #94a3b8;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 0 8px rgba(0,0,0,0.05);
            margin-top: 20px;
            overflow-x: auto;
        }
        .destination-img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: right;
            vertical-align: middle;
        }
        th {
            background-color: #1e293b;
            color: white;
        }
        .action-buttons a{
            display: inline-block;
        }
        .action-buttons a {
            margin-left: 5px;
            padding: 5px 10px;
            background-color: #2563eb;
            color: white !important;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        .action-buttons a:hover {
            background-color: #1e40af;
            transform: scale(1.05);
        }
       
    </style>
</head>
<body>

    @php
        $page = $page ?? 'home';
    @endphp

    <nav>
        @if($page === 'dashboard')
            <a href="{{ url('/dashboard') }}"><i class="fas fa-chart-line"></i> الصفحة الرئيسية</a>
            <a href="{{ url('/home') }}"><i class="fas fa-globe"></i> الرجوع للموقع</a>
        @else
            <a href="{{ url('/home') }}"><i class="fas fa-home"></i> الرئيسية</a>
            <a href="{{ url('/contact') }}"><i class="fas fa-envelope"></i> تواصل معنا</a>
            <a href="{{ url('/dashboard') }}"><i class="fas fa-cog"></i> لوحة التحكم</a>
        @endif

        @auth
        <form method="POST" action="{{ route('logout') }}" class="logout-form" style="display: inline;">
            @csrf
            <button type="submit">
                <i class="fas fa-sign-out-alt" style="margin-left: 6px;"></i> تسجيل خروج
            </button>
        </form>
        @endauth
    </nav>

    <div class="container">
        @if(Auth::check())
            <h2 style="text-align:center; color:#0f172a;">
                مرحباً، {{ Auth::user()->name }}
            </h2>
        @endif

        @if($page === 'home')
            <h1>أهلا بك في سَوَّاح</h1>
            <p>دليلك الأمثل لتجربة سفر مميزة مع معلومات دقيقة وتخطيط ذكي</p>

            <section style="margin-top: 30px;">
                <h2 style="color:#0f172a; border-bottom: 2px solid #3b82f6; padding-bottom: 5px;">وجهات سياحية مشهورة</h2>
                <div style="display: flex; gap: 15px; flex-wrap: wrap; margin-top: 15px;">
                    <div style="flex: 1 1 250px; background: white; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); padding: 15px;">
                        <img src="images/paris.jpg" alt="باريس" class="destination-img" />
                        <h3 style="color:#2563eb; margin-top:10px;">باريس، فرنسا</h3>
                        <p>استمتع بجولة ساحرة في مدينة الأضواء وزيارة معالمها الشهيرة مثل برج إيفل ومتحف اللوفر</p>
                    </div>
                    <div style="flex: 1 1 250px; background: white; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); padding: 15px;">
                        <img src="images/tokyo.jpg" alt="طوكيو" class="destination-img" />
                        <h3 style="color:#2563eb; margin-top:10px;">طوكيو، اليابان</h3>
                        <p>اكتشف المزج بين الحداثة والتقاليد في العاصمة اليابانية مع معابدها وأسواقها الحيوية</p>
                    </div>
                    <div style="flex: 1 1 250px; background: white; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); padding: 15px;">
                        <img src="images/riyadh.jpg" alt="الرياض" class="destination-img" />
                        <h3 style="color:#2563eb; margin-top: 15px;">الرياض، السعودية</h3>
                        <p style="margin-top: 10px;">استمتع بزيارة العاصمة السعودية مع مزيج رائع من التاريخ والحداثة، واستكشاف الأسواق والمنتزهات العصرية</p>
                    </div>
                </div>
            </section>

            <section style="margin-top: 40px;">
                <h2 style="color:#0f172a; border-bottom: 2px solid #3b82f6; padding-bottom: 5px;">نصائح مهمة للسفر</h2>
                <ul style="list-style-type: square; color: #334155; font-size: 1.1em; margin-top: 15px; padding-left: 20px;">
                    <li>تحقق من جواز سفرك وتأشيرات السفر قبل موعد الرحلة بفترة كافية</li>
                    <li>احزم أغراضك بشكل ذكي وخفيف لتسهيل التنقل</li>
                    <li>تعرف على عادات وتقاليد البلد الذي تزوره لتجنب المواقف المحرجة</li>
                    <li>احرص على حمل نسخة من الوثائق المهمة في هاتفك المحمول</li>
                    <li>استخدم تطبيقات السفر لمتابعة الطقس والخرائط بسهولة</li>
                </ul>
            </section>

            <section style="margin-top: 40px; text-align: center;">
                <h2 style="color:#0f172a; border-bottom: 2px solid #3b82f6; display: inline-block; padding-bottom: 5px;">احجز رحلتك الآن!</h2>
                <p style="font-size: 1.1em; color: #334155; margin-top: 10px;">مع "سواح" يمكنك حجز تذاكر الطيران والفنادق بسهولة وأمان</p>
                <button style="background-color: #2563eb; padding: 12px 25px; font-size: 1.1em; border-radius: 8px; border: none; color: white; cursor: pointer; transition: background-color 0.3s;">
                    احجز الآن <i class="fas fa-plane-departure"></i>
                </button>
            </section>

        @elseif($page === 'contact')
            <h1>تواصل معنا</h1>

            {{-- رسالة نجاح --}}
            @if(session('success'))
                <p style="color: green; font-weight: bold; margin-top: 15px;">{{ session('success') }}</p>
            @endif

            {{-- رسالة أخطاء --}}
            @if($errors->any())
                <div style="color: red; margin-top: 15px;">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('contact.store') }}">
                @csrf
                <label for="name">الاسم</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>

                <label for="message">رسالتك</label>
                <textarea id="message" name="message" rows="4" required>{{ old('message') }}</textarea>

                <button type="submit">إرسال</button>
            </form>

        @elseif($page === 'dashboard')
            <div class="dashboard-box">
                <h1>هنا الصفحة الرئيسية للوحة التحكم</h1>
                <p>يمكنك من هنا إدارة الموقع، الإشعارات، والاطلاع على الإحصائيات المستقبلية</p>

                {{-- عرض الرسائل الواردة --}}
                @if(isset($messages) && $messages->count() > 0)
                   <table>
                        <thead>
                            <tr>
                                <th>الرقم</th>
                                <th>الاسم</th>
                                <th>الرسالة</th>
                                <th>تاريخ الإرسال</th>
                                <th>الإجراء</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($messages as $index => $msg)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $msg->name }}</td>
                                    <td>{{ $msg->message }}</td>
                                    <td>{{ $msg->created_at->format('Y-m-d H:i') }}</td>
                                    <td class="action-buttons">
                                        <a href="{{ route('messages.edit', $msg->id) }}">تعديل</a>

                                        <form action="{{ route('messages.destroy', $msg->id) }}" method="POST"
                                              onsubmit="return confirm('هل أنت متأكد من حذف الرسالة؟');" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-delete">حذف</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>لا توجد رسائل حالياً.</p>
                @endif
            </div>

        @elseif($page === 'edit-message')
    <h1>تعديل رسالة {{ $message->name }}</h1>

    @if($errors->any())
        <div style="color: red; margin-top: 15px;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('messages.update', $message->id) }}">
        @csrf
        @method('PUT')

        <label for="name">الاسم</label>
        <input type="text" id="name" name="name" value="{{ old('name', $message->name) }}" required>

        <label for="message">الرسالة</label>
        <textarea id="message" name="message" rows="4" required>{{ old('message', $message->message) }}</textarea>

        <button type="submit" style="margin-top: 10px;">تحديث</button>
    </form>
@endif

    </div>

</body>
</html>
