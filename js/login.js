window.addEventListener('DOMContentLoaded', function() {
	let formLogin = $('form-login');

	formLogin.addEventListener('submit', function(ev) {
		ev.preventDefault();

		let inputUser = $('user');
		let inputPass = $('password');

		let data = {
			user: inputUser.value,
			pass: inputPass.value
		};

		let datos = JSON.stringify(data);

		ajax({
			method: 'POST',
			url: '../actions/login.php',
			data: datos,
			successCallback: function(rta) {
				let response = JSON.parse(rta);
				if(response.status == 1) {
					location.href = "../index.php";
				} else {
					location.href = "login.php";
				}
			}
		});
	});
});