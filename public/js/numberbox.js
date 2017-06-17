$('form').on('focus', 'input[type=number]', function(e) {
$(this).on('wheel', function(e) {
e.preventDefault();
});
});

// Restore scroll on number inputs.
$('form').on('blur', 'input[type=number]', function(e) {
$(this).off('wheel');
});

// Disable up and down keys.
$('form').on('keydown', 'input[type=number]', function(e) {
e = (e) ? e : window.event;
var charCode = (e.which) ? e.which : e.keyCode;
if (charCode > 31 && (charCode < 48 || charCode > 57)) {
return false;
}
return true;
});