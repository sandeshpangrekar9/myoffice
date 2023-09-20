var clientModal = new bootstrap.Modal(document.getElementById('clientModal'));
var clientDelModal = new bootstrap.Modal(document.getElementById('clientDelModal'));

$(document).on('click','#create-client-btn', function(){
	$('#clientModalForm').trigger("reset");
	$("#clientModalTitle").html('Create Client');
	$("#clientModalForm").attr('action', $("#clientModalForm").data('store-url'));
	$('input[name="status"][value="1"]').prop('checked', true);
	resetValidationErrorMsg();
	clientModal.show();
});

$(document).on('click','.edit-client-link', function(){
	$('#clientModalForm').trigger("reset");
	var data = $(this).data('row');
	$("#clientModalTitle").html('Edit Client');
	var formAction = $("#clientModalForm").data('update-url');
	formAction = formAction.replace("id", data.id);
	$("#clientModalForm").attr('action', formAction);
	$("#name").val(data.name);
	$("#email").val(data.email);
	$("#address").val(data.address);
	$("#city").val(data.city);
	$("#notes").val(data.notes);
	$('input[name="status"][value="'+ data.status +'"]').prop('checked', true);
	resetValidationErrorMsg();
	clientModal.show();
});

$(document).on('click','#clientFormSubmitBtn', function(){
	if(validateInputs()){
		$("#clientModalForm").submit();
	}
});

$(document).on('click','.delete-client-link', function(){
	var data = $(this).data('row');
	var formAction = $("#clientDelModalForm").attr('action');
	formAction = formAction.replace("id", data.id);
	$("#clientDelModalForm").attr('action', formAction);
	clientDelModal.show();
});

$(document).on('click','#clientDelFormYesBtn', function(){
	$("#clientDelModalForm").submit();
});

$(document).on("focusin focusout",".form-input",function(){
	$("#"+ $(this).attr('id') +"-msg").html('');
});

function validateInputs(){
	var name = $("#name").val();
	var email = $("#email").val();
	var address = $("#address").val();
	var city = $("#city").val();
	var notes = $("#notes").val();
	var status = $('input[name="status"]:checked').val();
	var clientModalTitle = $("#clientModalTitle").text();
	var Regexname = /^[A-Za-z\s]*$/;
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

	if(address == ""){
		errors++;
		$("#address-msg").html('<span class="text-danger">This field is required!</span>');
	} else{
		$("#address-msg").html('');
	}

	if(city == ""){
		errors++;
		$("#city-msg").html('<span class="text-danger">This field is required!</span>');
	} else if(city.length > 15){
		errors++;
		$("#city-msg").html('<span class="text-danger">City must be of max 15 characters!</span>');
	} else{
		$("#city-msg").html('');
	}

	if(notes == ""){
		errors++;
		$("#notes-msg").html('<span class="text-danger">This field is required!</span>');
	} else{
		$("#notes-msg").html('');
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