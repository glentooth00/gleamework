window.submitData = function(e) {
    e.preventDefault();
    
    var form = document.getElementById("addUserForm")
    var formData =  new FormData(form);

    

    fetch('../../public/php/save_user.php', {
        method: 'POST',
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        console.log(data);
        
        showToast(data.message || 'User created', data.success ? 'success' : 'error');

        if(data.success) {
            setTimeout(()=> location.reload(), 10000);
        }
    })
    .catch(err => console.error('Error :',err));
}