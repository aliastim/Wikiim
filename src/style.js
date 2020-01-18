$('#avatar input:radio').addClass('input_radio_hidden');
$('#avatar label').click(function()
{
    $(this).addClass('selected-avatar').siblings().removeClass('selected-avatar');
});