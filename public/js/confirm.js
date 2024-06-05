import 

function confirmModify() {
    
    var myModal = new bootstrap.Modal(document.getElementById('customConfirmModal'), {
        backdrop: 'static'
    });
    myModal.show();

    document.getElementById('confirm-yes').addEventListener('click', function() {
        document.getElementById('Modify').click();
    });

    
}


function confirmLogout(logoutUrl) {
    
    var logoutModal = new bootstrap.Modal(document.getElementById('logoutConfirmModal'), {
        backdrop: 'static'
    });
    logoutModal.show();

    
    document.getElementById('logout-yes').onclick = function() {
        window.location.href = logoutUrl; // Reindirizza all'URL di logout
    };
}
