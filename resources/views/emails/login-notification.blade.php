<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Notifikasi Login - {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="font-family: Arial, Helvetica, sans-serif; margin: 0; padding: 0; background-color: #f8fafc; color: #374151; line-height: 1.5;">
    <!--[if mso]>
    <style type="text/css">
        .fallback-font {
            font-family: Arial, sans-serif;
        }
    </style>
    <![endif]-->
    
    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #f8fafc;">
        <tr>
            <td align="center" valign="top">
                <table width="600" cellpadding="0" cellspacing="0" border="0" style="margin: 24px auto; background: #ffffff; border-radius: 16px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); border: 1px solid #e5e7eb;">
                    <!-- Header -->
                    <tr>
                        <td bgcolor="#4f46e5" style="background: linear-gradient(135deg, #6366f1, #4f46e5); color: white; padding: 32px 20px; text-align: center; border-radius: 16px 16px 0 0;">
                            <h2 style="margin: 0; font-size: 24px; font-weight: 700;">{{ config('app.name') }}</h2>
                            <p style="margin: 8px 0 0; font-size: 14px; opacity: 0.9; font-weight: 500;">Aktivitas Login Terdeteksi</p>
                        </td>
                    </tr>
                    
                    <!-- Content -->
                    <tr>
                        <td style="padding: 40px;">
                            <p style="font-size: 18px; margin-bottom: 24px; font-weight: 600;">Halo <strong>{{ $name }}</strong>,</p>
                            
                            <p style="margin: 0 0 20px 0;">Kami mendeteksi login baru ke akun Anda pada <strong>{{ config('app.name') }}</strong> dengan detail berikut:</p>
                            
                            <!-- Info Card -->
                            <table width="100%" cellpadding="0" cellspacing="0" style="background: #f3f4f6; border-radius: 12px; margin: 24px 0; padding: 20px;">
                                <tr>
                                    <td width="120" style="padding: 0 0 12px 0; font-weight: 600; color: #6b7280;">Nama</td>
                                    <td style="padding: 0 0 12px 0; font-weight: 500;">{{ $name }}</td>
                                </tr>
                                <tr>
                                    <td width="120" style="padding: 0 0 12px 0; font-weight: 600; color: #6b7280;">Email</td>
                                    <td style="padding: 0 0 12px 0; font-weight: 500;">{{ $email }}</td>
                                </tr>
                                <tr>
                                    <td width="120" style="padding: 0 0 12px 0; font-weight: 600; color: #6b7280;">Waktu</td>
                                    <td style="padding: 0 0 12px 0; font-weight: 500;">{{ $time }}</td>
                                </tr>
                            </table>
                            
                            <!-- Alert Card -->
                            <table width="100%" cellpadding="0" cellspacing="0" style="background: #fef2f2; border-radius: 12px; margin: 32px 0; border-left: 4px solid #ef4444;">
                                <tr>
                                    <td style="padding: 16px; display: flex; gap: 12px;">
                                        <div style="color: #ef4444; font-weight: 700;">⚠️</div>
                                        <div>
                                            <p style="margin:0;font-weight:600;color:#b91c1c;">Perhatian!</p>
                                            <p style="margin:8px 0 0;font-size:14px;">Jika ini bukan Anda, segera ubah password untuk mengamankan akun.</p>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            
                            <!-- Button -->
                            <table width="100%" cellpadding="0" cellspacing="0" style="margin: 32px 0;">
                                <tr>
                                    <td align="center">
                                        <a href="https://bagus-project.my.id" style="display: inline-block; background: linear-gradient(135deg, #6366f1, #4f46e5); color: white; text-decoration: none; padding: 14px 28px; border-radius: 8px; font-weight: 600; font-size: 15px; box-shadow: 0 4px 6px -1px rgba(79, 70, 229, 0.2);">Ubah Password Sekarang</a>
                                    </td>
                                </tr>
                            </table>
                            
                            <!-- Footer -->
                            <table width="100%" cellpadding="0" cellspacing="0" style="margin-top: 40px; padding-top: 24px; border-top: 1px solid #e5e7eb;">
                                <tr>
                                    <td style="font-size: 13px; color: #6b7280; text-align: center;">
                                        <p style="margin: 0 0 8px 0;">Email ini dikirim otomatis. Abaikan jika Anda merasa tidak melakukan login ini.</p>
                                        <p style="margin: 0;">© {{ date('Y') }} <a href="{{ config('app.url') }}" style="font-weight: 700; color: #6366f1; text-decoration: none;">{{ config('app.name') }}</a>. All rights reserved.</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>