<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Postavi lozinku</title>
</head>
<body style="margin:0; padding:0; background-color:#e6f0fa; font-family: Arial, sans-serif; color:#333;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#e6f0fa; padding:20px 0;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="background-color:#ffffff; border-radius:8px; overflow:hidden;">
                    <tr>
                        <td align="center" style="padding:20px; background-color:#007bff;">
                            <img src="https://angio.co.rs/assets/img/logo11.png" alt="Logo Ordinacije" width="150" style="display:block;">
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:30px; text-align:left;">
                            <h2 style="color:#007bff; margin-top:0;">Pozdrav {{ $notifiable->imeprezime }},</h2>
                            <p>Registrovani ste u našem sistemu. Sada možete da pogledate ili preuzmete Vaše nalaze. Kliknite na dugme ispod da postavite svoju lozinku prvi put.</p>
                            <p style="text-align:center; margin:40px 0;">
                                <a href="{{ url('reset-password/'.$token.'?email='.$email) }}"
                                   style="background-color:#ff4d4f; color:#ffffff; text-decoration:none; padding:12px 24px; border-radius:4px; display:inline-block; font-weight:bold;">
                                    Postavite lozinku
                                </a>
                            </p>
                            <p>Ako ne očekujete ovu poruku, jednostavno ignorišite ovaj mejl.</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:20px; text-align:center; font-size:12px; color:#666; background-color:#f0f0f0;">
                            © 2025 Ordinacija ANGIO. Sva prava zadržana.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
