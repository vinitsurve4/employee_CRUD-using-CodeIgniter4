<form action="<?= base_url('employee/save'); ?>" method="POST" enctype="multipart/form-data">
    <label>First Name:</label><input type="text" name="fname" required><br>
    <label>Middle Name:</label><input type="text" name="mname"><br>
    <label>Last Name:</label><input type="text" name="lname" required><br>
    <label>Gender:</label>
    <select name="gender">
        <option value="male">Male</option>
        <option value="female">Female</option>
    </select><br>
    <label>Email:</label><input type="email" name="mail" required><br>
    <label>Mobile No:</label><input type="text" name="mobile_no" required><br>
    <label>Date of Birth:</label><input type="date" name="date_of_birth"><br>
    <label>Photograph:</label><input type="file" name="photograph"><br>
    <label>Status:</label>
    <input type="radio" name="status" value="1" checked> Active
    <input type="radio" name="status" value="0"> Inactive<br>
    
    <!-- Dynamic Address Section -->
    <div id="address_section">
        <label>Address Line 1:</label><input type="text" name="add_line1[]"><br>
        <label>Address Line 2:</label><input type="text" name="add_line2[]"><br>
        <label>Country:</label><input type="text" name="country[]"><br>
        <label>State:</label><input type="text" name="state[]"><br>
        <label>Pincode:</label><input type="text" name="pincode[]"><br>
    </div>
    
    <button type="button" id="add_more_address">Add More Address</button><br>
    <input type="submit" value="Save">
</form>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>

<script>
    // Add more address fields dynamically
    $('#add_more_address').click(function() {
        $('#address_section').append(`
            <label>Address Line 1:</label><input type="text" name="add_line1[]"><br>
            <label>Address Line 2:</label><input type="text" name="add_line2[]"><br>
            <label>Country:</label><input type="text" name="country[]"><br>
            <label>State:</label><input type="text" name="state[]"><br>
            <label>Pincode:</label><input type="text" name="pincode[]"><br>
        `);
    });
    $(document).ready(function() {
    $('form').submit(function(e) {
        let isValid = true;

        // Validate email
        const email = $('input[name="mail"]').val();
        if (!validateEmail(email)) {
            alert('Please enter a valid email');
            isValid = false;
        }

        // Validate mobile number
        const mobile = $('input[name="mobile_no"]').val();
        if (!mobile.match(/^\d{10}$/)) {
            alert('Please enter a valid mobile number');
            isValid = false;
        }

        if (!isValid) e.preventDefault();
    });

    function validateEmail(email) {
        const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }
});
</script>

