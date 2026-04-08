const hamburger = document.getElementById('hamburger');
const sidebar = document.getElementById('nav-links');

hamburger.addEventListener('click', () => {
    sidebar.classList.toggle('-translate-x-full');
});

// upload file
const dropArea = document.getElementById('drop-area');
const fileInput = document.getElementById('file-input');

dropArea.addEventListener('click', () => fileInput.click());

fileInput.addEventListener('change', function() {
    if (this.files.length > 0) {
        const fileName = this.files[0].name;
        dropArea.querySelector('p').innerHTML = `File terpilih: <span class="font-bold text-green-600">${fileName}</span>`;
        dropArea.classList.add('border-green-300', 'bg-green-50/30');
    }
});s