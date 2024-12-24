// JavaScript to toggle between sections
function showForm(formId) {
    const sections = document.querySelectorAll('.form-section, .info-section');
    sections.forEach(section => section.classList.add('hidden'));
    document.getElementById(formId).classList.remove('hidden');
}

// JavaScript to show specific sections
function showSection(sectionId) {
    showForm(sectionId);
}
