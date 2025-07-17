$(document).ready(function(){
    $('#productSlider').carousel({
      interval: 1000
    });
  });

  const steps = document.querySelectorAll('.step');
    const contents = document.querySelectorAll('.step-content');
    const nextButtons = document.querySelectorAll('.next-btn');

    let currentStep = 0;

    function showStep(index) {
      contents.forEach((content, i) => {
        content.classList.toggle('active', i === index);
        steps[i].classList.toggle('active', i === index);
      });
      currentStep = index;
    }

    nextButtons.forEach((btn, i) => {
      btn.addEventListener('click', () => {
        if (currentStep < contents.length - 1) {
          showStep(currentStep + 1);
        }
      });
    });

    steps.forEach((step, i) => {
      step.addEventListener('click', () => {
        showStep(i);
      });
    });

    document.getElementById('dealershipForm').addEventListener('submit', (e) => {
      e.preventDefault();
      alert('Form submitted successfully!');
      document.getElementById('dealershipForm').reset();
      showStep(0);
    });