<?php include_once __DIR__ . '/../components/header.php'; ?>
<form id="addUserForm" onsubmit="submitData(event)" method="post">
    <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">
        <legend class="fieldset-legend">Create user</legend>

        <label class="label">Firstname</label>
        <input type="text" name="firstname" class="input" placeholder="" />

        <label class="label">Middlename</label>
        <input type="text" name="middlename" class="input" placeholder="" />

        <label class="label">Lastname</label>
        <input type="text" name="lastname" class="input" placeholder="" />

        <label class="label">Username</label>
        <input type="text" name="username" class="input" placeholder="" />

        <label class="label">Password</label>
        <input type="text" name="password" class="input" placeholder="" />

        <button class="btn btn-neutral mt-4" type="submit">Submit</button>
    </fieldset>
</form>
<div id="toast-container"></div>
<style>
    /* Toast container */
    #toast-container {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 9999;
        width: 100em;
    }

    /* Toast message */
    .toast {
        background-color: #4ade80;
        /* green for success */
        color: white;
        padding: 12px 20px;
        margin-top: 10px;
        border-radius: 6px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        opacity: 0;
        transform: translateX(100%);
        transition: opacity 0.3s ease, transform 0.3s ease;
        font-family: sans-serif;

        display: inline-block;
        /* flex layout */
        align-items: center;
        /* vertically center content */
        justify-content: space-between;
        /* space between message and button */
        min-width: 280px;
        /* minimum width */
        max-width: 400px;
        /* optional max width */
        word-break: break-word;
        /* wrap long messages */
    }

    /* Show toast */
    .toast.show {
        opacity: 1;
        transform: translateX(0);
    }
</style>
<script>
    function showToast(message, type = 'success', duration = 3000) {
        const container = document.getElementById('toast-container');

        const toast = document.createElement('div');
        toast.classList.add('toast');

        // Add the message
        const msg = document.createElement('span');
        msg.textContent = message;
        toast.appendChild(msg);

        // Add close button
        const closeBtn = document.createElement('button');
        closeBtn.textContent = '×'; // multiplication symbol
        closeBtn.style.marginLeft = '10px';
        closeBtn.style.background = 'transparent';
        closeBtn.style.border = 'none';
        closeBtn.style.color = 'white';
        closeBtn.style.fontSize = '16px';
        closeBtn.style.cursor = 'pointer';
        closeBtn.addEventListener('click', () => {
            toast.classList.remove('show');
            setTimeout(() => container.removeChild(toast), 300);
        });
        toast.appendChild(closeBtn);

        // Optional: color for error
        if (type === 'error') toast.style.backgroundColor = '#f87171';

        container.appendChild(toast);

        // Show it
        setTimeout(() => toast.classList.add('show'), 100);

        // Auto-remove after duration
        setTimeout(() => {
            if (container.contains(toast)) {
                toast.classList.remove('show');
                setTimeout(() => container.removeChild(toast), 300);
            }
        }, duration);
    }

</script>
<script src="../../public/scripts/usersAPI.js"></script>
<?php include_once __DIR__ . '/../components/footer.php'; ?>