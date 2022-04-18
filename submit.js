function SubmitFormData() {
    var username = $("#username").val();
    var email = $("#email").val();
    var password = $("#password").val();
    var cpassword = $("#cpassword").val();
    $.post("register.php", { username: username, email: email,password : password ,cpassword:cpassword},
    function(data) {
	 $('#results').html(data);
    });
}