/*global $*/
$(document).ready(function() {
	$(function() {
		$('select').select2();

	});

	$("#btnSaveNewTeam").click(function(e) {
		e.preventDefault();
		if ($("#t_name").val() === '') {
			alert("Please provide team name!");
			return false;
		}

		$("#btnSaveNewTeam").hide(); //hide submit button

		jQuery.ajax({
			type: "POST", // HTTP method POST or GET
			url: "addTeam", //Where to make Ajax calls
			dataType: "text", // Data type, HTML, json etc.
			data: 'team_name=' + $("#t_name").val(), //Form variable

			success: function(response) {
				$("#t_name").val(''); //empty text field on successful
				$("#btnSaveNewTeam").show(); //show submit button
				$("#LoadingImage").hide(); //hide loading image
				window.open("/team", "_self")

			},
			error: function(xhr, ajaxOptions, thrownError) {
				$("#btnSaveNewTeam").show(); //show submit button
				$("#LoadingImage").hide(); //hide loading image
				alert(thrownError);
			}
		});
	});
});

function invite(id) {
	var iddent = "#i_email" + id;
	//alert($(iddent).val())
	if ($(id).val() === '') {
		alert("Please provide an valid email address!");
		return false;
	}

	$("#btnSendInvite").hide(); //hide submit button
	var selectedVal = "";
	var selected = $("input[type='radio'][name='role']:checked");
	if (selected.length > 0) {
		selectedVal = selected.val();
	}

	jQuery.ajax({
		type: "POST", // HTTP method POST or GET
		url: "inviteOK", //Where to make Ajax calls
		dataType: "text", // Data type, HTML, json etc.
		data: {
			email: $(iddent).val(),
			role: selectedVal
		}, //Form variable

		success: function(response) {
			$(iddent).val(''); //empty text field on successful
			teamdetails(id)
		},
		error: function(xhr, ajaxOptions, thrownError) {
			$("#btnSendInvite").show(); //show submit button
			$("#LoadingImage").hide(); //hide loading image
			alert(thrownError);
		}
	});
}

function leave(id) {
	var conf = confirm("Are you sure?");
	var link = "leaveteam/" + id;

	if (conf) {
		jQuery.ajax({
			type: "GET", // HTTP method POST or GET
			url: link, //Where to make Ajax calls
			dataType: "text", // Data type, HTML, json etc.

			success: function(response) {
				if (response == "NO") {
					alert("You are the last editor. Please promote another user to the editor role before leaving.")
				}
				else {
					jQuery.ajax({
						type: "POST", // HTTP method POST or GET
						url: "check_team_tasks", //Where to make Ajax calls
						dataType: "text", // Data type, HTML, json etc.
						data: {
							task_id: id
						},
						error: function(xhr, ajaxOptions, thrownError) {
							alert(thrownError);
						}
					});
					window.open("/team", "_self")
				}

			},
			error: function(xhr, ajaxOptions, thrownError) {
				$("#btnSendInvite").show(); //show submit button
				$("#LoadingImage").hide(); //hide loading image
				alert(thrownError);
			}
		});
	}
};

function showDialog(id) {
	var dialog = $(id).data('dialog');
	dialog.open();
}

function populateInvite(id) {
	var link = "/invite/" + id;
	var ident = "#i_email" + id;
	$.ajax({ //create an ajax request to load_page.php
		type: "POST",
		url: link,
		dataType: "HTML", //expect html to be returned                
		success: function(response) {
			$(ident).html(response)
		}
	});
}

function remove(user, team) {
	var confirmation = confirm("Are you sure?");
	if (confirmation) {
		var link = "/removeuser/" + team + "/" + user;

		$.ajax({ //create an ajax request to load_page.php
			type: "GET",
			url: link,
			dataType: "html", //expect html to be returned                
			success: function(response) {
				jQuery.ajax({
					type: "POST", // HTTP method POST or GET
					url: "check_team_tasks", //Where to make Ajax calls
					dataType: "text", // Data type, HTML, json etc.
					data: {
						team_id: team
					},
					error: function(xhr, ajaxOptions, thrownError) {
						alert(thrownError);
					}
				});
				teamdetails(team);
			},
			error: function(xhr, ajaxOptions, thrownError) {
				$("#btnSaveNewTeam").show(); //show submit button
				$("#LoadingImage").hide(); //hide loading image
				alert("Error: " + thrownError);
			}
		});
	}
}

function changerole(user, team, role) {

	var link = "/changerole/" + team + "/" + user + "/" + role;

	$.ajax({ //create an ajax request to load_page.php
		type: "GET",
		url: link,
		dataType: "html", //expect html to be returned                
		success: function(response) {
			//alert(response); 

			teamdetails(team);
		},
		error: function(xhr, ajaxOptions, thrownError) {
			$("#btnSaveNewTeam").show(); //show submit button
			$("#LoadingImage").hide(); //hide loading image
			alert("Error: " + thrownError);
		}
	});

}

function teamdetails(id) {
	var link = "team_details/" + id;

	jQuery.ajax({
		type: "GET", // HTTP method POST or GET
		url: link, //Where to make Ajax calls
		dataType: "text", // Data type, HTML, json etc.

		success: function(response) {
			$(".team_details").html('');
			$("#team_details" + id).html(response);
			populateInvite(id);
			//alert(response)

		},
		error: function(xhr, ajaxOptions, thrownError) {
			alert(thrownError);
		}
	});
	populateInvite(id);
}

function close_details() {
	$(".team_details").html('');
}

function close_inv() {
	$(".inv_details").html('');
}

function editname(id) {
	var value = $('#tn_' + id).text();
	var html = '<form class="form-inline">' +
		'<input type="text" id="t_name" class="form-control" value = "' + value.trim() + '" required/>' +
		'<a href="#" onclick="changename(\'' + id + '\'); return false;"class="btn btn-default" aria-label="Left Align">' +
		'<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' +
		'</a>' +
		'<a href="#" onclick="teamdetails(\'' + id + '\'); return false;"class="btn btn-default" aria-label="Left Align">' +
		'<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>' +
		'</a>' +
		'</form>';
	$("#tn_" + id).html(html);

	var buttons = '';
	$("#tnc_" + id).html(buttons);

}

function changename(id) {

	jQuery.ajax({
		type: "POST", // HTTP method POST or GET
		url: "change_team_name", //Where to make Ajax calls
		dataType: "text", // Data type, HTML, json etc.
		data: {
			team_ud: id,
			new_name: $("#t_name").val()
		},

		success: function(response) {
			teamdetails(id)
			$.Notify({
				caption: 'Changed',
				content: 'Task name has been upated successfully.',
				type: 'success',
				timeout: 7000
			});
			details(id);
		},
		error: function(xhr, ajaxOptions, thrownError) {
			alert(thrownError);
		}
	});
}

function populate_inv(id) {
	jQuery.ajax({
		type: "GET", // HTTP method POST or GET
		url: "show_my_team_invitations", //Where to make Ajax calls
		dataType: "text", // Data type, HTML, json etc.

		success: function(response) {
			$("#invitations").html(response);

		},
		error: function(xhr, ajaxOptions, thrownError) {
			alert(thrownError);
		}
	});
}

function invdetails(id) {
	var link = "team_inv_details/" + id;

	jQuery.ajax({
		type: "GET", // HTTP method POST or GET
		url: link, //Where to make Ajax calls
		dataType: "text", // Data type, HTML, json etc.

		success: function(response) {
			$(".inv_details").html('');
			$("#inv_details" + id).html(response);
			//alert(response)

		},
		error: function(xhr, ajaxOptions, thrownError) {
			alert(thrownError);
		}
	});
}
