document.querySelector('form').addEventListener('submit', function(e) {
    if (!confirm('Are you sure you want to submit this form?')) {
        e.preventDefault();
    }
});
