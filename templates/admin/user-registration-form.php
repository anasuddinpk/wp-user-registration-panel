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
                <th scope="row"><label for="user_phone">Phone Number</label></th>
                <td><input name="user_phone" type="number" id="user_phone" value="" class="regular-text" placeholder="03xxxxxxxxx" required></td>
            </tr>
            <tr>
                <th scope="row"><label for="user_dob">Date of Birth</label></th>
                <td><input name="user_dob" type="date" id="user_dob" required></td>
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
