// Load labs.json and dynamically build lab cards on page load
$(document).ready(function() {
  $.getJSON('labs.json', function(labs) {
    const container = $('.portfolio-grid');

    labs.forEach(lab => {
      const card = `
        <a href="${lab.id}/" class="portfolio-card">
          <img src="${lab.image}" alt="${lab.title}">
          <h3>${lab.title}</h3>
          <p>${lab.description}</p>
        </a>
      `;
      container.append(card);
    });
  });
});

// When user hovers over a lab card, the card scales up, glows, and changes background color using jquery
// Used AI to help achieve glow and scale effect
$(document).on('mouseenter', '.portfolio-card', function() {
  $(this).css({
    'transform': 'scale(1.09)',
    'transition': 'all 0.3s',
    'box-shadow': '0 0 20px #000c0cff', // black glow
    'background-color': '#e2e5e9ff'
  });
}).on('mouseleave', '.portfolio-card', function() {
  $(this).css({
    'transform': 'scale(1)',
    'box-shadow': 'none',
    'background-color': ''
  });
});
