<h2>Users Registration Panel</h2>
<table class="form-table" role="presentation">
    <tbody>
        <p>Enter user details to be registered, WordPress will also notify the user after registration via email:</p>
        <form method="POST" enctype="multipart/form-data">

            <tr>
                <th scope="row"><label for="user_name">Full Name</label></th>
                <td><input name="user_name" type="text" id="user_name" value="" placeholder="Enter full name" class="regular-text" required></td>
            </tr>

            <tr>
                <th scope="row"><label for="user_email">Email Address</label></th>
                <td><input name="user_email" type="email" id="user_email" value="" class="regular-text" placeholder="example@wordpress.org" required></td>
            </tr>

            <tr>
                <th scope="row"><label for="user_role">User Role</label></th>
                <td>
                    <select name="user_role" id="user_role">
                        <option value="Subscriber">Subscriber</option>
                        <option value="Contributor">Contributor</option>
                        <option value="Author">Author</option>
                        <option value="Editor">Editor</option>
                        <option value="Administrator">Administrator</option>
                    </select>
                </td>
            </tr>

            <tr>
                <th scope="row"><label for="user_phone">Phone Number</label></th>
                <td><input name="user_phone" type="number" id="user_phone" value="" class="regular-text" placeholder="03xxxxxxxxx" required></td>
            </tr>

            <tr>
                <th scope="row"><label for="user_web">User's Website</label></th>
                <td><input name="user_web" type="url" id="user_web" value="" class="regular-text" placeholder="http://www.example.com" required></td>
            </tr>

            <tr>
                <th scope="row"><label>Gender</label></th>
                <td>
                    <div id="user_gender">
                        <input name="user_gender" type="radio" id="gender_male" value="Male" class="regular-text" checked>
                        <label for="gender_male" style="margin-right:20px">Male</label>

                        <input name="user_gender" type="radio" id="gender_female" value="Female" class="regular-text">
                        <label for="gender_female" style="margin-right:20px">Female</label>

                        <input name="user_gender" type="radio" id="gender_other" value="Other" class="regular-text">
                        <label for="gender_other">Other</label>
                    </div>
                </td>
            </tr>

            <tr>
                <th scope="row"><label for="user_dob">Date of Birth</label></th>
                <td><input name="user_dob" type="date" id="user_dob" required></td>
            </tr>

            <tr>
                <th scope="row"><label for="user_lang[]">Language(s)</label></th>
                <td>
                    <select name="user_lang[]" id="user_lang" multiple="multiple" class="regular-text" required>
                        <option value="English">English</option>
                        <option value="Français">Français</option>
                        <option value="اردو">اردو</option>
                        <option value="العربية">العربية</option>
                        <option value="español">español</option>
                    </select>
                </td>
            </tr>

            <tr>
                <th scope="row"><label for="user_tech">User's Technicality(s)</label></th>
                <td>
                    <div style="margin: 0 0 10px 0">
                        <input name="user_tech[]" type="checkbox" id="developer" value="A Developer">
                        <label >A Developer</label><br>
                    </div>

                    <div style="margin: 0 0 10px 0">
                        <input name="user_tech[]" type="checkbox" id="designer" value="A Designer">
                        <label>A Designer</label><br>
                    </div>

                    <div style="margin: 0 0 10px 0">
                        <input name="user_tech[]" type="checkbox" id="tester" value="A Tester">
                        <label>A Tester</label><br>
                    </div>  

                    <div style="margin: 0 0 10px 0">
                        <input name="user_tech[]" type="checkbox" id="content_writer" value="A Content Writer">
                        <label>A Content Writer</label><br>
                    </div>
                </td>
            </tr>

            <tr>
                <th scope="row"><label for="user_profile">Profile Image</label></th>
                <td><input name="user_profile" type="file" id="user_profile" accept="image/png, image/gif, image/jpeg, image/jpg" class="" required></td>
            </tr>

            <tr>
                <th><input name="submit" type="submit" id="submit" class="button button-primary" required></th>
            </tr>

        </form>
    </tbody>
</table>
