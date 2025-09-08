    <div style="max-width:480px;margin:30px auto;background:#fff;border:1px solid #eee;border-radius:10px;padding:24px">
        <h2 style="margin:0 0 14px">Login</h2>

        @if ($errors->any())
            <div style="background:#fee2e2;border:1px solid #fecaca;color:#991b1b;padding:10px;border-radius:8px;margin-bottom:12px;">
                <ul style="margin:0 0 0 16px;padding:0;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login.post') }}">
            @csrf

            <div style="margin-bottom:10px">
                <label for="email" style="display:block;margin-bottom:6px;">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required
                       style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;">
            </div>

            <div style="margin-bottom:10px">
                <label for="password" style="display:block;margin-bottom:6px;">Password</label>
                <input id="password" name="password" type="password" required
                       style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;">
            </div>

            <div style="margin-bottom:16px">
                <label>
                    <input type="checkbox" name="remember"> Remember me
                </label>
            </div>

            <button type="submit"
                    style="background:#0090E4;color:#fff;border:none;border-radius:10px;padding:10px 14px;font-weight:700;cursor:pointer;">
                Login
            </button>
            <a href="{{ route('register.form') }}" style="margin-left:10px;">Create an account</a>
        </form>
    </div>
