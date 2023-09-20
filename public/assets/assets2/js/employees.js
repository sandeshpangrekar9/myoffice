var employeeModal = new bootstrap.Modal(document.getElementById('employeeModal'));
var employeeDelModal = new bootstrap.Modal(document.getElementById('employeeDelModal'));

$(document).on('click','#create-emp-btn', function(){
	$('#employeeModalForm').trigger("reset");
	$("#employeeModalTitle").html('Create Employee');
	$("#password-star").html('<sup class="text-danger">*</sup>');
	$("#password-edit-label").html('');
	$("#employeeModalForm").attr('action', $("#employeeModalForm").data('store-url'));
	$('input[name="status"][value="1"]').prop('checked', true);
	resetValidationErrorMsg();
	employeeModal.show();
});

$(document).on('click','.edit-emp-link', function(){
	$('#employeeModalForm').trigger("reset");
	var data = $(this).data('row');
	$("#employeeModalTitle").html('Edit Employee');
	$("#password-star").html('');
	$("#password-edit-label").html('<small class="fw-normal ms-2">(Fill only if you want to update your password, else you can keep it blank.)</small>');
	var formAction = $("#employeeModalForm").data('update-url');
	formAction = formAction.replace("id", data.id);
	$("#employeeModalForm").attr('action', formAction);
	$("#name").val(data.name);
	$("#email").val(data.email);
	$("#phone").val(data.phone);
	$('input[name="status"][value="'+ data.status +'"]').prop('checked', true);
	resetValidationErrorMsg();
	employeeModal.show();
});

$(document).on('click','#employeeFormSubmitBtn', function(){
	if(validateInputs()){
		$("#employeeModalForm").submit();
	}
});

$(document).on('click','.delete-emp-link', function(){
	var data = $(this).data('row');
	var formAction = $("#employeeDelModalForm").attr('action');
	formAction = formAction.replace("id", data.id);
	$("#employeeDelModalForm").attr('action', formAction);
	employeeDelModal.show();
});

$(document).on('click','#employeeDelFormYesBtn', function(){
	$("#employeeDelModalForm").submit();
});

$(document).on("focusin focusout",".form-input",function(){
	$("#"+ $(this).attr('id') +"-msg").html('');
});

function validateInputs(){
	var name = $("#name").val();
	var email = $("#email").val();
	var password = $("#password").val();
	var phone = $("#phone").val();
	var status = $('input[name="status"]:checked').val();
	var employeeModalTitle = $("#employeeModalTitle").text();
	var Regexname = /^[A-Za-z\s]*$/;
	var Regexphoneno = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
	var errors = 0;

	if(name == ""){
		errors++;
		$("#name-msg").html('<span class="text-danger">This field is required!</span>');
	} else if(!(Regexname.test(name))){
		errors++;
		$("#name-msg").html('<span class="text-danger">This field can have only alphabets!</span>');
	} else if(name.length > 20){
		errors++;
		$("#name-msg").html('<span class="text-danger">Name must be of max 20 characters!</span>');
	} else{
		$("#name-msg").html('');
	}

	if(email == ""){
		errors++;
		$("#email-msg").html('<span class="text-danger">This field is required!</span>');
	} else if(email.length > 30){
		errors++;
		$("#email-msg").html('<span class="text-danger">Email must be of max 30 characters!</span>');
	} else{
		$("#email-msg").html('');
	}

	if(employeeModalTitle == "Create Employee" && password == ""){
		errors++;
		$("#password-msg").html('<span class="text-danger">This field is required!</span>');
	} else if(employeeModalTitle == "Create Employee" && password.length > 8){
		errors++;
		$("#password-msg").html('<span class="text-danger">Password must be of max 8 characters!</span>');
	} else{
		$("#password-msg").html('');
	}

	if(phone == ""){
		errors++;
		$("#phone-msg").html('<span class="text-danger">This field is required!</span>');
	} else if(phone.length > 20){
		errors++;
		$("#phone-msg").html('<span class="text-danger">Phone number must be of max 15 characters!</span>');
	} else if(!phone.match(Regexphoneno)){
		errors++;
		$("#phone-msg").html('<span class="text-danger">Please enter a valid phone number!</span>');
	} else{
		$("#phone-msg").html('');
	}

	if(status == ""){
		errors++;
		$("#status-msg").html('<span class="text-danger">This field is required!</span>');
	} else{
		$("#status-msg").html('');
	}

	if(errors > 0){
		return false;
	} else{
		return true;
	}
}

function resetValidationErrorMsg(){
	$(".form-input").each(function() {
		$("#"+ $(this).attr('id') +"-msg").html('');
	});
}