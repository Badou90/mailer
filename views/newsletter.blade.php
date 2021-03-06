<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="format-detection" content="telephone=no"/>

    <!--[if (gte mso 9)|(IE)]>
    <style type="text/css">
        table { border-collapse: collapse; }
        .button { padding:0 !important; }
    </style>
    <![endif]-->
</head>

<body style="background-color: #f1f1f1;">
    <div class="body" style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; background: #f1f1f1; table-layout: fixed; text-align: center;">

    <!--[if (gte mso 9)|(IE)]>
    <table width="600" align="center">
    <tr>
    <td valign="top" width="600" style="padding-left: 50px; padding-right:50px;">
    <![endif]-->

        <table class="layout" cellpadding="0" align="center" style="background: #ffffff; border-collapse: collapse; margin: 0 auto; max-width: 700px; mso-table-lspace: 0; mso-table-rspace: 0; width: 100%;">
            <tr>
                <td class="row content" style="font-size: 0; padding: 0 0; text-align: center;">
                    <div class="column" style="display: inline-block; font-size: 14px; max-width: 650px; vertical-align: top; width: 100%;">
                        <table width="100%" style="border-collapse: collapse; mso-table-lspace: 0; mso-table-rspace: 0;">
                            <tr>
                                <td class="cell" style="padding: 0; text-align: left;">
                                    <div class="header" style="overflow: hidden;">
    <p class="preheader" style="Margin: 0 0 1em 0; color: #999999; display: block; font-family: 'helvetica', arial, sans-serif; font-size: 12px; font-weight: 300; line-height: 16px; text-align: left;">
        <a href="http://amur.net" style="color: #000000 !important; text-decoration: none;"><img src="http://amur.net/main_new/images/logo-kupon.png" alt="" style="-ms-interpolation-mode: bicubic; border: 0; float: left;"/></a>

        <div class="slogan" style="float: right;">
            <p class="date" style="Margin: 1em 0; color: #000000; display: block; font-family: 'helvetica', arial, sans-serif; font-size: 14px; font-weight: bold; line-height: 22px; margin: 0; text-align: right;">{{ date('d.m.Y') }}</p>
            <p style="Margin: 1em 0; color: #000000; display: block; font-family: 'helvetica', arial, sans-serif; font-size: 14px; font-weight: 300; line-height: 22px; margin: 0; text-align: right;">Amur.net Купоны&#160;&#8212; это лучшие предложения<br>Благовещенска с&#160;огромными скидками до&#160;90%!</br></p>
        </div>
    </p>
</div>

@if (!$recommended->isEmpty())
    <h2 style="Margin: 2em 0 0.5em 0; color: #ffc526; display: block; font-family: 'helvetica', arial, sans-serif; font-size: 22px; font-weight: bold; line-height: 28px; margin: 35px 0 5px; text-align: center;">АКЦИЯ ДНЯ</h2>

    @foreach ($recommended as $index => $item)
        <div class="main-coupon coupon" style="border: 1px solid #CCCCCC; margin-bottom: 20px;">
            <p class="title" style="Margin: 1em 0; border-bottom: 1px solid #CCCCCC; color: #000000; display: block; font-family: 'helvetica', arial, sans-serif; font-size: 24px; font-weight: bold; height: auto; line-height: 22px; margin: 0; overflow: hidden; padding: 7px 5px; text-align: left;">
                <a href="{{ $item->present()->showUrl }}" style="color: #000000 !important; text-decoration: none;">{{ $item->present()->title }}</a>
            </p>

            <a href="{{ $item->present()->showUrl }}" style="color: #000000 !important; text-decoration: none;">
                <img src="{{ asset(image_filter($item->present()->mainImage, 'crop-1140x550')) }}" alt="" style="-ms-interpolation-mode: bicubic; border: 0; width: 100%;"/>
            </a>

            <div class="lower-bar" style="border-top: 1px solid #CCCCCC; overflow: hidden; padding: 10px 5px;">
                <table width="100%" style="border-collapse: collapse; mso-table-lspace: 0; mso-table-rspace: 0;">
                    <tr>
                        <td style="padding: 0;">
                            <p style="Margin: 1em 0; color: #000000; display: block; font-family: 'helvetica', arial, sans-serif; font-size: 20px; font-weight: bold; line-height: 22px; margin: 0; text-align: left;">Скидка -50% за&#160;0&#160;руб.</p>
                        </td>
                        <td style="padding: 0; text-align: right;">

            <!--[if (gte mso 9)|(IE)]>
            <table width="auto" align="center">
            <tr>
            <td valign="top" width="auto" style="padding:10px 30px; background-color:#3399ff;">
            <![endif]-->

            <a class="button" href="{{ $item->present()->showUrl }}" target="_blank" style="background-color: #ffc526; border-radius: 30px; color: #ffffff !important; display: inline-block; font-family: 'helvetica', arial, sans-serif; font-size: 10px; font-weight: bold; letter-spacing: 1.2px; line-height: 1.2em; min-width: 40px; padding: 10px 15px; text-align: center; text-decoration: none; text-transform: uppercase;"><span style="color: #ffffff;">ПОСМОТРЕТЬ</span></a>

            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->

                        </td>
                    </tr>
                </table>
            </div>
        </div>
    @endforeach
@endif

@if (!$other->isEmpty())
    <h2 style="Margin: 2em 0 0.5em 0; color: #ffc526; display: block; font-family: 'helvetica', arial, sans-serif; font-size: 22px; font-weight: bold; line-height: 28px; margin: 35px 0 5px; text-align: center;">ТЕКУЩИЕ АКЦИИ</h2>
    <div class="coupons-wrapper" style="margin: 0 -10px;">
        <table width="100%" class="coupons-table" style="border-collapse: collapse; mso-table-lspace: 0; mso-table-rspace: 0;">
            @for ($i = 0; $i < $other->count(); $i++)
            @if ($i % 2 == 0)
                <tr>
            @endif
                <td style="padding: 0 10px 20px; vertical-align: top; width: 50%;">
                    <div class="coupon" style="border: 1px solid #CCCCCC;">
                        <a href="{{ $other[$i]->present()->showUrl }}" style="color: #000000 !important; text-decoration: none;">
                            <img src="{{ asset(image_filter($other[$i]->present()->mainImage, 'crop-760x366')) }}" alt="" style="-ms-interpolation-mode: bicubic; border: 0; width: 100%;"/>
                        </a>
                        <p class="title" style="Margin: 1em 0; color: #000000; display: block; font-family: 'helvetica', arial, sans-serif; font-size: 16px; font-weight: bold; height: 85px; line-height: 22px; margin: 0; overflow: hidden; padding: 7px 5px; text-align: left;">
                            <a href="{{ $other[$i]->present()->showUrl }}" style="color: #000000 !important; text-decoration: none;">{{ $other[$i]->present()->title }}</a>
                        </p>

                        <div class="lower-bar" style="border-top: 1px solid #CCCCCC; overflow: hidden; padding: 10px 5px;">
                            <table width="100%" style="border-collapse: collapse; mso-table-lspace: 0; mso-table-rspace: 0;">
                                <tr>
                                    <td style="padding: 0;">
                                        <p style="Margin: 1em 0; color: #000000; display: block; font-family: 'helvetica', arial, sans-serif; font-size: 14px; font-weight: bold; line-height: 22px; margin: 0; text-align: left;">
                                            Скидка 5% за&#160;0&#160;руб.
                                        </p>
                                    </td>
                                    <td style="padding: 0; text-align: right;">

    <!--[if (gte mso 9)|(IE)]>
    <table width="auto" align="center">
    <tr>
    <td valign="top" width="auto" style="padding:10px 30px; background-color:#3399ff;">
    <![endif]-->

    <a class="button" href="{{ $other[$i]->present()->showUrl }}" target="_blank" style="background-color: #ffc526; border-radius: 30px; color: #ffffff !important; display: inline-block; font-family: 'helvetica', arial, sans-serif; font-size: 10px; font-weight: bold; letter-spacing: 1.2px; line-height: 1.2em; min-width: 40px; padding: 10px 15px; text-align: center; text-decoration: none; text-transform: uppercase;"><span style="color: #ffffff;">ПОСМОТРЕТЬ</span></a>

    <!--[if (gte mso 9)|(IE)]>
    </td>
    </tr>
    </table>
    <![endif]-->

                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </td>
            @if ($i % 2 == 1)
            </tr>
            @endif
        @endfor

        </table>
    </div>
@endif

                                    <table class="contacts-table" width="100%" style="border-collapse: collapse; mso-table-lspace: 0; mso-table-rspace: 0;">
    <tr>
        <td class="contacts" style="padding: 15px 0; vertical-align: top; width: 70%;">
            <p style="Margin: 1em 0; color: #000000; display: block; font-family: 'helvetica', arial, sans-serif; font-size: 14px; font-weight: 300; line-height: 22px; margin: 0; padding: 0; text-align: left;"> По&#160;всем вопросам обращаться в&#160;службу поддержки: </p>
            <p style="Margin: 1em 0; color: #000000; display: block; font-family: 'helvetica', arial, sans-serif; font-size: 14px; font-weight: 300; line-height: 22px; margin: 0; padding: 0; text-align: left;"> 8 (4162) 319-003 | <a href="mailto:kupon@amur.net" style="color: #000000 !important; text-decoration: none;"><span style="color: #ffc526;">kupon@amur.net</span></a> </p>
            <p style="Margin: 1em 0; color: #000000; display: block; font-family: 'helvetica', arial, sans-serif; font-size: 14px; font-weight: 300; line-height: 22px; margin: 0; padding: 0; text-align: left;"> Время работы: Пн. &#8212;&#160;Пт. с&#160;9 до&#160;18 </p>
        </td>
        <td class="social" style="padding: 15px 0; vertical-align: middle; width: 30%;">
            <ul style="padding: 0;">
                <li style="display: inline-block;"><a rel="nofollow" target="_blank" class="icon-icon_38x38_ig" href="https://www.instagram.com/amur_net/" style="background-image: url('http://amur.net/main_new/images/social-icons.png'); background-position: -38px 0; color: #000000 !important; display: inline-block; height: 38px; text-decoration: none; width: 38px;">&#160;</a></li>
                <li style="display: inline-block;"><a rel="nofollow" target="_blank" class="icon-icon_38x38_vk" href="http://vk.com/amur_net" style="background-image: url('http://amur.net/main_new/images/social-icons.png'); background-position: -76px 0; color: #000000 !important; display: inline-block; height: 38px; text-decoration: none; width: 38px;">&#160;</a></li>
                <li style="display: inline-block;"><a rel="nofollow" target="_blank" class="icon-icon_38x38_ok" href="http://www.odnoklassniki.ru/group/47096188371080" style="background-image: url('http://amur.net/main_new/images/social-icons.png'); background-position: 0 -38px; color: #000000 !important; display: inline-block; height: 38px; text-decoration: none; width: 38px;">&#160;</a></li>
                <li style="display: inline-block;"><a rel="nofollow" target="_blank" class="icon-icon_38x38_fb" href="https://www.facebook.com/groups/true.amur.net" style="background-image: url('http://amur.net/main_new/images/social-icons.png'); background-position: 0 0; color: #000000 !important; display: inline-block; height: 38px; text-decoration: none; width: 38px;">&#160;</a></li>
            </ul>
        </td>
    </tr>
</table>

                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="row" style="font-size: 0; padding: 0; text-align: center;">
                    <div class="column" style="display: inline-block; font-size: 14px; max-width: 650px; vertical-align: top; width: 100%;">
                        <table width="100%" style="border-collapse: collapse; mso-table-lspace: 0; mso-table-rspace: 0;">
                            <tr>
                                <td class="cell" style="padding: 0; text-align: left;">
                                    <p class="credits" style="Margin: 0 0 1em 0; color: #999999; display: block; font-family: 'helvetica', arial, sans-serif; font-size: 12px; font-weight: 300; line-height: 16px; text-align: center;">Вы&#160;получили это письмо, потому что были подписаны на&#160;информационную рассылку от&#160;сервиса <a href="http://amur.net" style="color: #000000 !important; text-decoration: none;"><span style="color: #ffc526;">Amur.net</span></a> Купоны при регистрации на&#160;сайте Amur.net согласно пункту 1.6 правил сайта.</p>
<p class="credits" style="Margin: 0 0 1em 0; color: #999999; display: block; font-family: 'helvetica', arial, sans-serif; font-size: 12px; font-weight: 300; line-height: 16px; text-align: center;">Если вы&#160;не&#160;хотите получать эту рассылку, нажмите здесь <a class="unsubscribe" href="{$unsubscribe}" style="color: #ffc526 !important; text-decoration: none;">Отписаться</a></p>

                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
        </table>

    <!--[if (gte mso 9)|(IE)]>
    </td>
    </tr>
    </table>
    <![endif]-->

    </div>
</body>

</html>
