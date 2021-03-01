<?php
   use App\Helpers\Helpers;
?>
<style>
    body {
        margin: 0;
        padding: 0;
    }

    table {
        color: #da4040;
        font-family: sans-serif;
        font-size: 14px;
        line-height: 140%;
    }

    .container-fluid {
        background-color: #EEE;
    }

    .mini-divider {
        height: 25px;
    }

    .divider {
        height: 30px;
    }

    .table-container {
        background-color: #FFF;
        border-radius: 10px;
        overflow: hidden;
    }

    #codigo {
        border-radius: 10px !important;
    }

    img.logo {
        width: 355px;
        height: 164px;
        margin: 0 auto;
    }

    .footer {
        font-size: 12px;
    }
</style>
<table class="container-fluid" cellpadding="0" cellspacing="0" align="center" border="0" width="100%">
    <tbody>
        <tr>
            <td valign="top" class="divider">&nbsp;</td>
        </tr>
        <tr>
            <td valign="top" align="center">
                <table cellpadding="0" class="table-container" width="550" cellspacing="0" align="center" border="0">
                    <tbody>
                        <tr>
                            <td valign="top" class="divider" style="background-color:  #FFF;">&nbsp;</td>
                        </tr>
                        <tr>
                            <td valign="top" align="center" style=' border-collapse: collapse;
                                font-family:Arial;
                                padding: 10px 15px;
                                background-color:  #FFF;'>
                                <img class="logo" width="110" height="70"
                                    src="{{ Helpers::public_path().'./assets/img/Logo.png' }}" alt="" />
                            </td>
                        </tr>
                        <tr>
                            <td valign="top" class="divider">&nbsp;</td>
                        </tr>
                        <tr>
                            <td valign="top" align="center">
                                <p style="color: #5b5b5b">{{$data->message}}</p>
                            </td>
                        </tr>

                        <tr>
                            <td valign="top" class="divider">&nbsp;</td>
                        </tr>
                        <tr>
                            <td valign="top" align="center">
                                <h2 style="color: #5b5b5b;"><strong>Código de Verificação</strong></h2>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top" class="divider">&nbsp;</td>
                        </tr>
                        <tr>
                            <td valign="top" align="center">
                                <table cellspacing="0" cellpadding="0" border="0" align="center" width="300">
                                    <tr>
                                        <td valign="center" align="center" height="90" id="codigo"
                                            style=" background:#da4040; border-radius:10px;">
                                            <p style="font-size: 40pt; color: #FFF;">{{$data->code}}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="top" class="mini-divider"></td>
                                    </tr>
                                    <tr>
                                        <td valign="top" align="center">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="top" class="divider"></td>
                                    </tr>
                                    <tr>
                                        <td valign="top" align="center">

                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top" class="divider">&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td valign="top" class="divider">&nbsp;</td>
        </tr>
        <tr>
            <td valign="top" align="center">
                <table cellspacing="0" cellpadding="0" border="0" width="385" align="center" class="footer">
                    <tr>
                        <td valign="top" align="center">
                            <p>Wiplay Soluções em Sinalização Digital LTDA - MENUBOARD, Av. Imperatriz Leopoldina, 957,
                                São Paulo - SP, 05305-011 - 31.712.105/0001-05</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td valign="top" class="divider">&nbsp;</td>
        </tr>
    </tbody>
</table>
