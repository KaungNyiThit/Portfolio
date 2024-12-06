
document.addEventListener('DOMContentLoaded', () => {
    let toggleDarkMode = document.querySelector('.toggle-dark-mode');


        toggleDarkMode.addEventListener('click', () => {
            document.body.classList.toggle('dark-mode');
    
            if (document.body.classList.contains('dark-mode')) {
                localStorage.setItem('theme', 'dark');
                toggleDarkMode.textContent = "Dark Mode Off 🌞";
            } else {
                localStorage.setItem('theme', 'light');
                toggleDarkMode.textContent = "Dark Mode On 🌙";
            }
        });

        let theme = localStorage.getItem('theme');
        if (theme === 'dark') {
        document.body.classList.add('dark-mode');
        }
});

    let menu = document.getElementById('menuToggle').onclick;

    let darkMode = document.getElementById('dark-mode');

    darkMode.style.display = "none"
