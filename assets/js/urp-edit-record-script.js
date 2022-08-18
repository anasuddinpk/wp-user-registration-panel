jQuery(document).ready(

    function ($) {
        $('.edit-record').click(
            function () {
                var id2 = 'val-' + $(this).attr("id") + '-2';
                var id3 = 'val-' + $(this).attr("id") + '-3';
                var id4 = 'val-' + $(this).attr("id") + '-4';
                var id5 = 'user-name-' + $(this).attr("id");

                $('#user_name').val($('#' + id5 + '').text())
                $('#user_email').val($('#' + id2 + '').text())
                $('#user_email').attr("readonly", "");
                $('#user_phone').val($('#' + id3 + '').text())
                $('#user_dob').val($('#' + id4 + '').text())
            }
        );

        $('.print-record').click(
            function () {
                id = $(this).attr("id").slice(6);

                var pid1 = 'user-img-' + id;
                var pid2 = 'val-' + id + '-2';
                var pid3 = 'val-' + id + '-3';
                var pid4 = 'val-' + id + '-4';
                var pid5 = 'user-name-' + id;

                var name = document.getElementById(pid5).innerText
                var email = document.getElementById(pid2).innerText
                var phone = document.getElementById(pid3).innerText
                var dob = document.getElementById(pid4).innerText
                var profile_url = document.getElementById(pid1).src

                to_be_print = window.open("");

                to_be_print.document.write(
                    
                    `<div style="padding:50px">
                        <h3><u>User's Summary</u></h3>
                        <img src="${profile_url}" width="100" height="100" style="float:right; margin: 0 0 30px 0;"/>
                        <table cellpadding="10" cellspacing="0" width="100%" style="text-align: left; border: 1px solid black; background-color:#f0f0f1">
                            <tr style="border: 1px solid black;">
                                <th style="border: 1px solid black;">Name</th>
                                <th style="border: 1px solid black;">Email</th>
                                <th style="border: 1px solid black;">Phone</th>
                                <th style="border: 1px solid black;">Date of Birth</th>
                            </tr>
                            <tr style="border: 1px solid black;">
                                <td style="border: 1px solid black;">${name}</td>
                                <td style="border: 1px solid black;">${email}</td>
                                <td style="border: 1px solid black;">${phone}</td>
                                <td style="border: 1px solid black;">${dob}</td>
                            </tr>
                        </table>
                    </div>`

                );

                to_be_print.print();
                to_be_print.close();

            }
        );
    }
);