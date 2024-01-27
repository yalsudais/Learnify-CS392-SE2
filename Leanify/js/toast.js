window.alert_toast = function($msg = 'TEST', $bg = 'success') {
    $('#alert_toast').removeClass('bg-success bg-danger bg-info bg-warning');

    if ($bg == 'success')
        $('#alert_toast').addClass('bg-success');
    if ($bg == 'danger')
        $('#alert_toast').addClass('bg-danger');
    if ($bg == 'info')
        $('#alert_toast').addClass('bg-info');
    if ($bg == 'warning')
        $('#alert_toast').addClass('bg-warning');

    $('#alert_toast .toast-body').html($msg);
    $('#alert_toast').toast({ delay: 3000 }).toast('show');
};
