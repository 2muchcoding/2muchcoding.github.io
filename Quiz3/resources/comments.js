document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("commentForm");

  form.addEventListener("submit", (e) => {
    const name = form.visitor_name.value.trim();
    const email = form.email.value.trim();
    const comment = form.comment_text.value.trim();

    // Validate name
    if (name.length < 2) {
      alert("Name must be at least 2 characters.");
      e.preventDefault();
      form.visitor_name.focus();
      return;
    }

    // Validate email format
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
      alert("Please enter a valid email address.");
      e.preventDefault();
      form.email.focus();
      return;
    }

    // Validate comment
    if (comment.length < 5) {
      alert("Comment must be at least 5 characters.");
      e.preventDefault();
      form.comment_text.focus();
      return;
    }

    // Feature suggestion is optional, no validation needed
  });
});