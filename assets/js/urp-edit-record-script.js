/**
 * Script for all.
 *
 * @package users-registration-panel
 */
jQuery(document).ready(

    function ($) {

        //Changing multiple select dropdown to Select2 dropdown.
        $( "#user_lang" ).select2( {
            placeholder: "Select user's languages"
        } );

        $('.edit-record').click(
            function () {
                var id2 = 'val-' + $(this).attr("id") + '-2';
                var id3 = 'val-' + $(this).attr("id") + '-3';
                var id4 = 'val-' + $(this).attr("id") + '-4';
                var id5 = 'val-' + $(this).attr("id") + '-5';
                var id6 = 'val-' + $(this).attr("id") + '-6';
                var id7 = 'val-' + $(this).attr("id") + '-7';
                var id8 = 'user-name-' + $(this).attr("id");

                $('#user_name').val($('#' + id8 + '').text())

                $('#user_role').val($('td#' + id2 + '').text())

                $('#user_email').val($('td#' + id3 + '>span.email').text())
                //Making email field Readonly.
                $('#user_email').attr("readonly", "");

                $('#user_phone').val( ($('td#' + id3 + '>span.phone').text()).slice(7) )

                $('#user_web').val( $('td#' + id5 + '').text() )

                $('#user_dob').val( $('td#' + id4 + '>span.dob').text() )

                //Selecting radio by getting values from entry (Edit).
                var $radios = $('input:radio[name=user_gender]');
                var selected_gender = ($('td#' + id4 + '>span.gender').text()).slice(8)
                $radios.filter('[value='+selected_gender+']').prop('checked', true);

                //Selecting checkboxes by getting values from entry (Edit).
                var $checkboxes = $('input[name="user_tech[]"]');
                var selected_tech = $('td#' + id7 + '').text()
                if(selected_tech == '—'){
                    $checkboxes.filter('input[name="user_tech[]"]').prop('checked', false);
                }
                else{
                    selected_tech = selected_tech.split(',')
                    selected_tech.forEach(element => {
                        $checkboxes.filter('[value="' + element+ '"]').prop('checked', true);
                    });
                }

                //Selecting multi-dropdown values by getting values from entry (Edit).
                var selected_lang = $('td#' + id6 + '').text()
                selected_lang = selected_lang.split(',')
                $('#user_lang').val(selected_lang)
                $('#user_lang').trigger('change')

            }
        );

        $('.print-record').click(
            function () {
                id = $(this).attr("id").slice(6);

                var pid0 = 'user-name-' + id;
                var pid1 = 'user-img-' + id;
                var pid2 = 'val-' + id + '-2';
                var pid3 = 'val-' + id + '-3';
                var pid4 = 'val-' + id + '-4';
                var pid5 = 'val-' + id + '-5';
                var pid6 = 'val-' + id + '-6';
                var pid7 = 'val-' + id + '-7';

                var name = document.getElementById(pid0).innerText

                var email = document.getElementById(pid3)
                email = email.getElementsByClassName('email')[0]
                email = email.innerText

                var phone = document.getElementById(pid3)
                phone = phone.getElementsByClassName('phone')[0]
                phone = phone.innerText

                var role = document.getElementById(pid2).innerText

                var dob = document.getElementById(pid4)
                dob = dob.getElementsByClassName('dob')[0]
                dob = dob.innerText

                var gender = document.getElementById(pid4)
                gender = gender.getElementsByClassName('gender')[0]
                gender = gender.innerText

                var website = document.getElementById(pid5)
                website = website.getElementsByTagName('a')[0]
                website = website.innerText

                var profile_url = document.getElementById(pid1).src

                var languages = document.getElementById(pid6).innerText

                var technicalities = document.getElementById(pid7).innerText;

                to_be_print = window.open("");

                to_be_print.document.write(
                    
                `<div style="padding:50px">
                    <h3 style="margin-left:15px"><u>User's Summary</u></h3>
                    <img src="${profile_url}" width="100" height="100" style="float:right; margin: 0 20px 30px 0;" />
                    <table cellpadding="15" cellspacing="0" width="100%" style="text-align: left;">
                        <tr>
                            <th style="width: 30%;">Name</th>
                            <td style="width: 5%;">:</td>
                            <td style="">${name}</td>
                        </tr>
                        <tr>
                            <th style="width: 30%;">Gender</th>
                            <td style="width: 5%;">:</td>
                            <td style="">${gender.slice(8)}</td>
                        </tr>
                        <tr>
                            <th style="width: 30%;">Date of Birth</th>
                            <td style="width: 5%;">:</td>
                            <td style="">${dob}</td>
                        </tr>
                        <tr>
                            <th style="width: 30%;">Email</th>
                            <td style="width: 5%;">:</td>
                            <td style="">${email}</td>
                        </tr>
                        <tr>
                            <th style="width: 30%;">Phone</th>
                            <td style="width: 5%;">:</td>
                            <td style="">${phone.slice(6)}</td>
                        </tr>
                        <tr>
                            <th style="width: 30%;">Website</th>
                            <td style="width: 5%;">:</td>
                            <td style=""><a href="${website}">${website}</a></td>
                        </tr>
                        <tr>
                            <th style="width: 30%;">Role</th>
                            <td style="width: 5%;">:</td>
                            <td style="">${role}</td>
                        </tr>
                        <tr>
                            <th style="width: 30%;">Languages(s)</th>
                            <td style="width: 5%;">:</td>
                            <td style="">${languages}</td>
                        </tr>
                        <tr>
                            <th style="width: 30%;">Technicalities</th>
                            <td style="width: 5%;">:</td>
                            <td style="">${technicalities}</td>
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

