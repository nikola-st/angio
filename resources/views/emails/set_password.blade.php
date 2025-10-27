<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Postavi lozinku</title>
</head>
<body style="margin:0; padding:0; background-color:#e6f0fa; font-family: Arial, sans-serif; color:#333;">
    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#e6f0fa; padding:20px 0;">
        <tr>
            <td align="center">
                <table width="100%" cellpadding="0" cellspacing="0" border="0" style="max-width:600px; background-color:#ffffff; border-radius:8px; overflow:hidden;">
                    <tr>
                        <td align="center" style="padding:20px; background-color:#007bff;">
                            <img src="https://angio.co.rs/assets/img/logo11.png" alt="Logo Ordinacije" width="150" style="display:block; width:100%; max-width:150px; height:auto;">
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:25px; text-align:left;">
                            <h2 style="color:#007bff; margin-top:0; font-size:22px;">Pozdrav {{ $notifiable->imeprezime }},</h2>
                            <p style="font-size:16px; line-height:1.6; margin:16px 0;">
                                Registrovani ste u našem sistemu. Sada možete da pogledate ili preuzmete Vaše nalaze.
                                Kliknite na dugme ispod da postavite svoju lozinku prvi put.
                            </p>
                            <p style="text-align:center; margin:35px 0;">
                                <a href="{{ url('reset-password/'.$token.'?email='.$email) }}"
                                   style="background-color:#ff4d4f; color:#ffffff; text-decoration:none; padding:12px 24px; border-radius:4px; display:inline-block; font-weight:bold; font-size:16px;">
                                    Postavite lozinku
                                </a>
                            </p>
                            <p style="font-size:15px; line-height:1.6;">
                                Ako ne očekujete ovu poruku, jednostavno ignorišite ovaj mejl.
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:15px; text-align:center; font-size:12px; color:#666; background-color:#f0f0f0;">
                            © 2025 Ordinacija ANGIO. Sva prava zadržana.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>

