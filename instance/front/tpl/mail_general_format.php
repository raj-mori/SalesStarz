
<table align="center" bgcolor="#efefef" border="0px" cellpadding="0" cellspacing="0" style="font-family:verdana" width="100%%">

    <tbody>
        <tr>
            <td class="text" style=" font-family:verdana;color:#000000; text-decoration:none;font-size:11px;">
                <span style=" font-family:verdana;color:#000001; text-decoration:none;font-size:12px;line-height:18px;font-weight:bold;">
                    </br> Sales Starz</br> </span>

            </td>
        </tr>
        <tr >
            <td class="text" style=" font-family:verdana;color:#000000; text-decoration:none;font-size:11px;line-height:18px;padding-left:20px;height:50px">

                <?php
                $content = str_replace("{payment_link}", '<a href="' . _U . 'stripe_co?customer_id=' . base64_encode($id) . '">payment_link</a>', $content);
                print $content;
                ?>

            </td>
        </tr>
        <tr>
            <td align="center"  class="text" style=" font-family:verdana;color:#000000; text-decoration:none;font-size:11px;line-height:18px;"><br />
                <a href="#" style=" font-family:verdana;color:#000001; text-decoration:none;font-size:11px;line-height:18px;font-weight:bold" target="_blank">About Us</a>|
                <a href="#" style=" font-family:verdana;color:#000001; text-decoration:none;font-size:11px;line-height:18px;font-weight:bold" target="_blank">Unsubscribe</a>|
                <a href="#" style=" font-family:verdana;color:#000001; text-decoration:none;font-size:11px;line-height:18px;font-weight:bold" target="_blank">Sales Starz</a><br />
            </td>
        </tr>
    </tbody>
</table>